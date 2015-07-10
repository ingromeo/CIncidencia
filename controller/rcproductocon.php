<?php
//Configuracion de la conexion a base de datos
include_once '../util/config.php';
include_once '../model/mrcproducto.php';

$pro = new Rcproducto();

$datei = $_POST['datei'];
$datef = $_POST['datef'];
$codigo = $_POST['codigo'];

    $rp = $pro->buscar($datei,$datef,$codigo);
    require '../view/rcproductor.php';
?>