<?php
include_once '../model/musuario.php';
require_once "../util/class_sql_inject.php";
$pro = new Usuario();
$sql = new sql_inject('sqlinject.log');

$accion = $_GET['accion'];
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $usuario = $sql->protect(stripslashes($_POST["usuario"]));
    $clave = $sql->protect(stripslashes($_POST["clave"]));
    $estado = "1";    
    $area = $sql->protect(stripslashes($_POST["area"]));
    $persona = $sql->protect(stripslashes($_POST["persona"]));
    $tusuario = $sql->protect(stripslashes($_POST["tusuario"]));
    $nivel = $sql->protect(stripslashes($_POST["nivel"]));

    $rpta = $pro->insertarusuario($usuario, $clave, $estado, $area, $persona, $tusuario, $nivel);
    if ($rpta) {
        header("Location: ../view/ingusuario.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingusuario.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $usuario = $sql->protect(stripslashes($_POST["usuario"]));
    $clave = $sql->protect(stripslashes($_POST["clave"]));
    $estado = "1";    
    $area = $sql->protect(stripslashes($_POST["area"]));
    $persona = $sql->protect(stripslashes($_POST["persona"]));
    $tusuario = $sql->protect(stripslashes($_POST["tusuario"]));
    $nivel = $sql->protect(stripslashes($_POST["nivel"]));

    $rptas = $pro->actualizarusuario($idi, $usuario, $clave, $estado, $area, $persona, $tusuario, $nivel);
    if ($rptas) {
        header("Location: ../view/usuario.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingusuario.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarusuario($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/usuario.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingusuario.php");
    }
}//fin guardar
if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingusuario.php");
}//fin guardar
if ($_POST['cancelar'] != null) {
    header("Location: ../view/usuario.php");
}//fin guardar
?>