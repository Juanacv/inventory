<?php
if (isset($_SESSION['user'])) {
    $connection = createConnection($connectionData);
    $countConsoles = countConsoles($connection, base64_decode($_SESSION['user']));
    $sumConsoles = getSumPricesConsoles($connection, base64_decode($_SESSION['user']));
    $lastAdquisition = getLastConsoleAdquisition($connection, base64_decode($_SESSION['user']));
    $currentPage = 1;   
    if (isset($_GET['page'])) {
        $currentPage = intval($_GET['page']);
    }         

    $init = ($currentPage - 1) * 8;
    $search = "";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }  
    $search = filtering($search);
    $results = getConsolesPagination($connection, base64_decode($_SESSION['user']),$init, $search);

    $currentPage = max($currentPage, 1); // Asegura que $currentPage sea al menos 1
    $realConsolesShowed = $results->num_rows;
    $totalPages = ceil($realConsolesShowed/ITEMSPERPAGE);
    $currentPage = min($currentPage, $totalPages);
    $next = $currentPage + 1;
    $prev = $currentPage - 1;  
}
