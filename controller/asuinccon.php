<?php

include_once '../model/masuinc.php';
require_once "../util/class_sql_inject.php";
$pro = new Asuinc();
$sql = new sql_inject('sqlinject.log');
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $estado = "1";
    $catinc = $sql->protect(stripslashes($_POST["catinc"]));

    $rpta = $pro->insertarasuinc($nombres, $estado, $catinc);
    if ($rpta) {
        header("Location: ../view/ingasuinc.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingasuinc.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $id = $sql->protect(stripslashes($_POST["idi"]));
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $estado = "1";
    $catinc = $sql->protect(stripslashes($_POST["catinc"]));

    $rpta = $pro->actualizarasuinc($id, $nombres, $estado, $catinc);
    if ($rpta) {
        header("Location: ../view/asuinc.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingasuinc.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarasuinc($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/asuinc.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingasuinc.php");
    }
}//fin guardar

if ($_POST['cancelar'] != null) {
    header("Location: ../view/asuinc.php");
}//fin guardar

if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingasuinc.php");
}//fin guardar
?>