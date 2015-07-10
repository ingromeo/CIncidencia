<?php
session_start();
?>
<?php $dato = $_SESSION["idusu"]; ?>
<?php

include_once '../model/mrequerimiento.php';
require_once "../util/class_sql_inject.php";
$pro = new requerimiento();
$sql = new sql_inject('sqlinject.log');

if ($_POST['modificares'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $estado = $sql->protect(stripslashes($_POST["estado"]));

    $rptas = $pro->actualizarrequerimientoest($idi,$estado);
    if ($rptas) {
        header("Location: ../view/requerimientotec.php?id=$dato");
    } else {
        header("Location: ../view/requerimiento.php");
    }
}//fin guardar


?>