<?php
//Configuracion de la conexion a base de datos
include_once '../util/config.php';
include_once '../model/mrcbien.php';

$pro = new Rcproducto();

$datei = $_POST['datei'];
$datef = $_POST['datef'];
$codigo = $_POST['codigo'];
$serie = $_POST['serie'];
$nombres = $_POST['nombres'];

$catb = $_POST['catb'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];

    $rp = $pro->buscar($datei,$datef,$codigo,$serie,$nombres,$catb,$modelo,$marca);
    require '../view/rbienr.php';
?>