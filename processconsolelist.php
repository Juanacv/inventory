<?php
$portrait = PORTRAITSDIR.$profile['portrait'];
$connection = createConnection($connectionData);
$countConsoles = countConsoles($connection, $profile['ownerIdEncoded']);
$sumConsoles = getSumPricesConsoles($connection, $profile['ownerIdEncoded']);
$lastAdquisition = getLastConsoleAdquisition($connection, $profile['ownerIdEncoded']);
$currentPage = 1;   
if (isset($_GET['page'])) {
    $currentPage = intval($_GET['page']);
}         

$init = ($currentPage - 1) * 8;
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}  
$results = getConsolesPagination($connection, $profile['ownerIdEncoded'],$init, $search);

$currentPage = max($currentPage, 1); // Asegura que $currentPage sea al menos 1
$realConsolesShowed = $results->num_rows;
$totalPages = ceil($realConsolesShowed/ITEMSPERPAGE);
$currentPage = min($currentPage, $totalPages);
$next = $currentPage + 1;
$prev = $currentPage - 1;  

