<?php
include_once '../model/mrcinc.php';
$pro = new Rcinc();

$datei = $_POST['datei'];
$datef = $_POST['datef'];
$cati = $_POST['cati'];
$asu =  $_POST['asu'];
$responsable = $_POST['responsable'];
$estado = $_POST['estado'];
$prioridad = $_POST['prioridad'];
                    
$rp = $pro->buscar($datei,$datef,$cati, $asu, $responsable, $estado, $prioridad);
    require '../view/rcincr.php';

?>