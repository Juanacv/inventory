<?php
if (isset($_SESSION['user'])) {
    $portrait = PORTRAITSDIR.$profile['portrait'];
    $connection = createConnection($connectionData);
    $search = "";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    } 
    $search = filtering($search);
    $results = getGenres($connection, $search);
}