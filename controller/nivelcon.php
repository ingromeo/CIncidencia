<?php

include_once '../model/mnivel.php';
require_once "../util/class_sql_inject.php";
$pro = new Nivel();
$sql = new sql_inject('sqlinject.log');

$accion = $_GET['accion'];
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $nivel = $sql->protect(stripslashes($_POST["nivel"]));
    $des = $sql->protect(stripslashes($_POST["descripcion"]));
    $estado = "1";

    $rpta = $pro->insertarnivel($nivel, $des, $estado);
    if ($rpta) {
        header("Location: ../view/ingnivel.php?bien=".$ing);
           echo $ing;
    } else {
        header("Location: ../view/ingnivel.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $nivel = $sql->protect(stripslashes($_POST["nivel"]));
    $des = $sql->protect(stripslashes($_POST["descripcion"]));
    $estado = "1";

    $rptas = $pro->actualizarnivel($idi, $nivel, $des, $estado);
    if ($rptas) {
        header("Location: ../view/nivel.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingnivel.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarnivel($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/nivel.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingnivel.php");
    }
}//fin guardar

if ($_POST['cancelar'] != null) {
    header("Location: ../view/nivel.php");
}//fin guardar

if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingnivel.php");
}//fin guardar
?>