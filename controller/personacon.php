<?php

include_once '../model/mpersona.php';
require_once "../util/class_sql_inject.php";
$pro = new Persona();
$sql = new sql_inject('sqlinject.log');
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $apepat = $sql->protect(stripslashes($_POST["apepat"]));
    $apeat = $sql->protect(stripslashes($_POST["apeat"]));
    $dni = $sql->protect(stripslashes($_POST["dni"]));
    $telf = $sql->protect(stripslashes($_POST["telf"]));
    $telm = $sql->protect(stripslashes($_POST["telm"]));
    $correo = $sql->protect(stripslashes($_POST["correo"]));
    $direccion = $sql->protect(stripslashes($_POST["direccion"]));
    $sueldo = $sql->protect(stripslashes($_POST["sueldo"]));
    $estado = "1";
    $distrito = $sql->protect(stripslashes($_POST["distrito"]));

    $rpta = $pro->insertarPersona($nombres, $apepat, $apeat, $dni, $telf, $telm, $correo, $direccion, $sueldo, $estado, $distrito);
    if ($rpta) {
        header("Location: ../view/ingpersona.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingpersona.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $id = $sql->protect(stripslashes($_POST["idi"]));
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $apepat = $sql->protect(stripslashes($_POST["apepat"]));
    $apeat = $sql->protect(stripslashes($_POST["apeat"]));
    $dni = $sql->protect(stripslashes($_POST["dni"]));
    $telf = $sql->protect(stripslashes($_POST["telf"]));
    $telm = $sql->protect(stripslashes($_POST["telm"]));
    $correo = $sql->protect(stripslashes($_POST["correo"]));
    $direccion = $sql->protect(stripslashes($_POST["direccion"]));
    $sueldo = $sql->protect(stripslashes($_POST["sueldo"]));
    $estado = "1";
    $distrito = $sql->protect(stripslashes($_POST["distrito"]));

    $rpta = $pro->actualizarPersona($id, $nombres, $apepat, $apeat, $dni, $telf, $telm, $correo, $direccion, $sueldo, $estado, $distrito);
    if ($rpta) {
        header("Location: ../view/persona.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingpersona.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarPersona($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/persona.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingpersona.php");
    }
}//fin guardar

if ($_POST['cancelar'] != null) {
    header("Location: ../view/persona.php");
}//fin guardar

if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingpersona.php");
}//fin guardar
?>