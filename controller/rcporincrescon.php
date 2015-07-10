<?php
include_once '../model/mporincres.php';
$pro = new Por();

$datei = $_POST['datei'];
$datef = $_POST['datef'];

$rp = $pro->buscar($datei,$datef);
    require '../view/rcporincresr.php';
    
$v1 = $pro->listarnoresueltas($datei,$datef);
$v2 = $pro->listarresueltas($datei,$datef);
$v3 = $pro->listartotales($datei,$datef);

$r1 = ($v1[0]['noresueltas']);
$r2 = ($v2[0]['registros']);
//$r3 = (number_format($v3[0]['totales'], 2, ',', ' '));
$r3 = round($v3[0]['totales'], 0);

echo $r1."||".$r2."||".$r3;

?>