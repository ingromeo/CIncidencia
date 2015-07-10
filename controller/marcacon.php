<?php

include_once '../model/mmarca.php';
require_once "../util/class_sql_inject.php";
$pro = new Marca();
$sql = new sql_inject('sqlinject.log');

$accion = $_GET['accion'];
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $estado = "1";

    $rpta = $pro->insertarmarca($nombres, $estado);
    if ($rpta) {
        header("Location: ../view/ingmarca.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingmarca.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $nombresw = $sql->protect(stripslashes($_REQUEST["nombres"]));
    $estadow = "1";

    $rptas = $pro->actualizarmarca($idi, $nombresw, $estadow);
    if ($rptas) {
        header("Location: ../view/marca.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingmarca.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarmarca($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/marca.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingmarca.php");
    }
}//fin guardar
if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingmarca.php");
}//fin guardar
if ($_POST['cancelar'] != null) {
    header("Location: ../view/marca.php");
}//fin guardar
?>