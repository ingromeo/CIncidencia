<?php
include_once '../model/mricon.php';
$pro = new Rricon();

$datei = $_POST['datei'];
$datef = $_POST['datef'];
$cati = $_POST['cati'];
$asu =  $_POST['asu'];
$responsable = $_POST['responsable'];
$estado = $_POST['estado'];
$prioridad = $_POST['prioridad'];
                    
$rp = $pro->buscar($datei,$datef,$cati, $asu, $responsable, $estado, $prioridad);
    require '../view/rriconr.php';

?>