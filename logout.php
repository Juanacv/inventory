<?php
session_start();
session_unset();
session_destroy();
header('Location: http://localhost/inventario/dist/index.php');
exit();