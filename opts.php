<?php
define('NOERROR',0);
define('EMPTYERROR',1);
define('MINLONGERROR',2);
define('MAXLONGERROR',3);
define('EXISTERROR',4);
define('REPASSWORDERROR',2);
define('EXTENSIONERROR',2);
define('WEIGHTERROR',3);
define('PXSIZEERROR',4);
define('FILERROR',1);
define('MAXUSERNAMELENGTH',55);
define('MINUSERNAMELENGTH',5);
define('MAXCONSOLENAMELENGTH',60);
define('MINCONSOLENAMELENGTH',5);
define('MAXMAKERLENGTH',50);
define('MINMAKERLENGTH',4);
define('MAXPRICE',10000);
define('MINPRICE',0);
define('MINPRICEERROR',2);
define('MAXPRICEERROR',3);
define('INVALIDDATE',2);
define('PORTRAITSDIR','uploads/portraits/');
define('CONSOLESDIR','uploads/consoles/');
define('IMAGEEXTENSIONS',array("jpg", "jpeg", "png"));
define('MAXWIDTHPX',1000);
define('MAXHEIGTHPX',1000);
define('MAXCOMMENTLENGTH',500);
define('MAXCOMMENTLENGTHERROR',1);
define('ITEMSPERPAGE',8);
define('PAGESPERPAGINATION',5);
define('PORTRAITS',0);
define('CONSOLES',1);
define('VIDEOGAMES',1);
$connectionData = ["host"=>"localhost","dbUser"=>"root","dbPassword"=>"root","db"=>"inventory"];

$messages = [
    "username" => "",
    "password" => "",
    "repassword" => "",
    "portrait" => "",
    "consolename" => "",
    "price" => "",
    "consoleimage" => "",
    "comment" => "",
    "dateadquisition" => "",
    "maker" => ""
];
$consolenameErrors = [
    "",
    "El nombre de la consola no debe estar vacío",
    "La longitud mínima del nombre de la consola debe ser 5",
    "La longitud máxima del nombre de la consola debe ser 60",
    "El nombre de consola ya existe"
];
$makerErrors = [
    "",
    "El nombre del fabricante no debe estar vacío",
    "La longitud mínima del fabricante debe ser 5",
    "La longitud máxima del fabricante debe ser 50"
];
$commentErrors = [
    "",
    "La longitud mínima del comentario no puede ser de 500 caracteres"
];
$priceErrors = [
    "",
    "El precio no debe estar vacío",
    "El precio no puede ser menor que 0",
    "El precio no puede ser mayor que 100000"
];
$usernameErrors = [
    "",
    "El nombre de usuario no debe estar vacío",
    "La longitud mínima del nombre de usuario debe ser 5",
    "La longitud máxima del nombre de usuario debe ser 55",
    "El nombre de usuario ya existe"
];
$passwordErrors = [
    "",
    "La contraseña no puede estar vacía"
];
$repasswordErrors = [
    "",
    "Debe repetir la contraseña",
    "Las contraseñas no coinciden"
];
$imageErrors = [
    "",
    "Error al subir el archivo",
    "Las extensiones válidas son jpeg, jpg, y png",
    "El archivo no debe superar los 1.5Mb",
    "El archivo no pude superar los 1000x1000px"
];
$dateAdquisitionErrors = [
    "",
    "La fecha no puede estar vacía",
    "La fecha no es válida"
];

?>