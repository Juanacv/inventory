<?php
function createConnection($connectionData) {
    $connection = new mysqli($connectionData["host"], $connectionData["dbUser"], $connectionData["dbPassword"], $connectionData["db"]);
    if ($connection->connect_error) {
        die("Conexión fallida: " . $connection->connect_error);
        return false;
    }   
    return $connection;
}
function getHash($connection, $username) {
    $sql = "SELECT hash FROM users where username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $hash = isset($row[0]) ? $row[0] : 0;
    $stmt->close();
    return $hash;    
}
function getId($connection, $username) {
    $sql = "SELECT id FROM users where username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $id =  isset($row[0]) ? $row[0] : 0;
    $stmt->close();
    return $id;    
}
function getProfile($connection, $ownerId) {
    $sql = "SELECT username, image FROM users where id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i',$ownerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;    
}
function setUser($connection, $username, $hash, $portrait) {
    $sql = "INSERT INTO users (username, hash, image, date) VALUES (?, ?, ?, NOW())";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('sss',$username, $hash, $portrait);
    $stmt->execute();
    $stmt->close();
}
function setConsole($connection, $consoleName, $maker, $price, $image, $comment, $dateAdquisition, $ownerId) {
    $sql = "INSERT INTO consoles (consolename, maker, price, image, comment, dateadquisition, ownerid) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssdsssi',$consoleName, $maker, $price, $image, $comment, $dateAdquisition, $ownerId);
    $stmt->execute();
    $stmt->close();
}
function setVideogame($connection, $videogamename, $console, $genre, $image, $comment, $digital, $played, $price, $dateAdquisition, $ownerId) {
    $sql = "INSERT INTO videogames (videogamename, console, genre, image, comment, digital, played, price, dateadquisition, ownerid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('siissiidsi',$videogamename, $console, $genre, $image, $comment, $digital, $played, $price, $dateAdquisition, $ownerId);
    $stmt->execute();
    $stmt->close();
}
function setGenre($connection, $genre, $image) {
    $sql = "INSERT INTO genres (genre, image) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ss', $genre, $image);
    $stmt->execute();
    $stmt->close();
}
function updateConsoleData($connection, $consoleName, $maker, $price, $image, $comment, $dateAdquisition, $id, $oldImage, $ownerId) {    
    $sql = "UPDATE consoles SET consolename=?, maker=?, price=?, image=?, comment=?, dateadquisition=? WHERE id = ? ANd ownerid = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssdsssii', $consoleName, $maker, $price, $image, $comment, $dateAdquisition, $id, $ownerId);
    $stmt->execute();
    $stmt->close();
    deleteImage(CONSOLESDIR.$oldImage);
}
function updateVideogame($connection, $videogamename, $console, $genre, $image, $comment, $digital, $played, $price, $dateAdquisition, $id, $oldImage, $ownerId) {
    $sql = "UPDATE videogames SET videogames videogamename=?, console=?, genre=?, image=?, comment=?, digital=?, played=?, price=?, dateadquisition=? WHERE id = ? AND ownerid = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('siissiidsii',$videogamename, $console, $genre, $image, $comment, $digital, $played, $price, $dateAdquisition, $id, $ownerId);
    $stmt->execute();
    $stmt->close();
    deleteImage(VIDEOGAMESDIR.$oldImage);
}
function checkIfUserExists($connection, $username) {
    if (empty($username)) return EMPTYERROR;
    $stmt = $connection->prepare("SELECT count(*) FROM users where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    if ($count !== 0) return EXISTSERROR;
    return NOERROR;
}
function checkIfConsoleExists($connection, $consolename, $ownerId) {
    if (empty($consolename)) return EMPTYERROR;
    $stmt = $connection->prepare("SELECT count(*) FROM consoles where consolename = ? and ownerid = ?");
    $stmt->bind_param("si", $consolename, $ownerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    if ($count !== 0) return EXISTSERROR;
    return NOERROR;
}
function checkIfGenreExists($connection, $genre) {
    if (empty($genre)) return EMPTYERROR;
    $stmt = $connection->prepare("SELECT count(*) FROM genres where genre = ?");
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    if ($count !== 0) return EXISTSERROR;
    return NOERROR;
}
function countConsoles($connection, $ownerId) {
    $stmt = $connection->prepare("SELECT count(*) FROM consoles where ownerid = ?");
    $stmt->bind_param("i", $ownerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    return $count;
}
function countGenres($connection) {
    $stmt = $connection->prepare("SELECT count(*) FROM genres");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    return $count;
}
function countVideogames($connection) {
    $stmt = $connection->prepare("SELECT count(*) FROM videogames");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    return $count;
}
function getConsolesPagination($connection, $ownerId, $init, $search = '') {
    $sql = "SELECT id, consolename, maker, price, image, dateadquisition FROM consoles where ownerid = ?";
    if (!empty($search)) {
        $tmp = " AND (consolename LIKE ? OR maker LIKE ?)";
        $search = "%".$search."%";
        $sql .= $tmp;
    }
    $sql .= " LIMIT $init, ".ITEMSPERPAGE;
    $stmt = $connection->prepare($sql);
    if (!empty($search)) $stmt->bind_param("iss", $ownerId, $search, $search);
    else $stmt->bind_param("i", $ownerId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function getGenres($connection, $search = '') {
    $sql = "SELECT id, genre, image FROM genres WHERE 1=1";
    if (!empty($search)) {
        $tmp = " AND (genre LIKE ?)";
        $search = "%".$search."%";
        $sql .= $tmp;
    }    
    $sql .= " ORDER BY genre";
    $stmt = $connection->prepare($sql);
    if (!empty($search)) $stmt->bind_param("s", $search);    
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function getConsoleById($connection, $consoleId) {
    $stmt = $connection->prepare("SELECT * FROM consoles where id = ?");
    $stmt->bind_param("i", $consoleId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
function getGenreById($connection, $genreId) {
    $stmt = $connection->prepare("SELECT * FROM genres where id = ?");
    $stmt->bind_param("i", $genreId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
function getSumPricesConsoles($connection, $ownerId) {
    $stmt = $connection->prepare("SELECT sum(price) FROM consoles where ownerid = ?");
    $stmt->bind_param("i", $ownerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $sum = intval($row[0]);
    $stmt->close();
    return $sum; 
}
function countUsersWithSameConsole($connection, $consoleName) {
    $stmt = $connection->prepare("SELECT count(*) FROM consoles where consolename = ?");
    $stmt->bind_param("s", $consoleName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $count = intval($row[0]);
    $stmt->close();
    return $count;
}
function getLastConsoleAdquisition($connection, $ownerId) {
    $stmt = $connection->prepare("SELECT dateadquisition FROM consoles where ownerid = ? ORDER BY dateadquisition DESC LIMIT 1");
    $stmt->bind_param("i", $ownerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    return date('d-m-Y',strtotime($row[0]));
}
function deleteConsole($connection, $consoleId, $ownerId) {
    $sql = "DELETE FROM consoles WHERE id = ? AND ownerid = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ii',$consoleId, $ownerId);
    $stmt->execute();
    $stmt->close();
}
function deleteGenre($connection, $genreId) {
    $sql = "DELETE FROM genres WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i',$genreId);
    $stmt->execute();
    $stmt->close();
}
?>