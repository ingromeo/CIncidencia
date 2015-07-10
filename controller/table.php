<?php
include_once '../model/mtabla.php';
$pro = new Por();
    
$codigo = $_POST['codigo'];

$rp = $pro->buscar($codigo);
    require '../view/diagnosticor.php';

?>