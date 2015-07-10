<?php

include_once '../model/mmodelo.php';
require_once "../util/class_sql_inject.php";
$pro = new Modelo();
$sql = new sql_inject('sqlinject.log');

$accion = $_GET['accion'];
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $estado = "1";

    $rpta = $pro->insertarmodelo($nombres, $estado);
    if ($rpta) {
        header("Location: ../view/ingmodelo.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingmodelo.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $nombresw = $sql->protect(stripslashes($_REQUEST["nombres"]));
    $estadow = "1";

    $rptas = $pro->actualizarmodelo($idi, $nombresw, $estadow);
    if ($rptas) {
        header("Location: ../view/modelo.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingmodelo.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarmodelo($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/modelo.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingmodelo.php");
    }
}//fin guardar
if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingmodelo.php");
}//fin guardar
if ($_POST['cancelar'] != null) {
    header("Location: ../view/modelo.php");
}//fin guardar
?>