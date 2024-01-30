<?php
function checkSession($connectionData) {
    session_start(); 
    $profile = array();
    if (isset($_SESSION['user'])) { 
        $id = base64_decode($_SESSION['user']);
        $connection = createConnection($connectionData);
        $profile = getProfile($connection, $id);
        $connection->close();
        $profile['ownerIdEncoded'] = $_SESSION['user'];
    }
    return $profile;
}