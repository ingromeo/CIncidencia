<?php
session_start();
?>
<?php $dato = $_SESSION["idusu"]; ?>
<?php

include_once '../model/mincidencia.php';
require_once "../util/class_sql_inject.php";
$pro = new Incidencia();
$sql = new sql_inject('sqlinject.log');

if ($_POST['modificarres'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $estado = $sql->protect(stripslashes($_POST["estado"]));
    $responsable = $sql->protect(stripslashes($_POST["responsable"]));
    $demo = $sql->protect(stripslashes($_POST["demo"]));

    $rptas = $pro->actualizartecnico($idi,$estado,$responsable,$demo);
    if ($rptas) {
        header("Location: ../view/incidencia.php?id=$dato");
    } else {
        header("Location: ../view/incidencia.php");
    }
}//fin guardar

?>