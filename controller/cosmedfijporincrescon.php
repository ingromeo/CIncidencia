<?php
include_once '../model/mcosmedfijporincres.php';
$pro = new Por();

$datei = $_POST['datei'];
$datef = $_POST['datef'];

$rp = $pro->buscar($datei,$datef);
    require '../view/cosmedfijporincresr.php';
    

$v1 = $pro->listartotales($datei,$datef);
$v2 = $pro->listarresueltas($datei,$datef);


$r1 = ($v1[0]['sueldo']);
$r2 = ($v2[0]['registros']);
//$r3 = (number_format($v3[0]['totales'], 2, ',', ' '));
//$r3 = round(($r1/$r2), 0);
//$r3 = (number_format(($r1/$r2), 2, ',', ' '));
$r3 = ($r1/$r2);
echo $r1."||".$r2."||".$r3;

?>