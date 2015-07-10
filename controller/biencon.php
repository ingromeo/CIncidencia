<?php

include_once '../model/mbien.php';
require_once "../util/class_sql_inject.php";
$pro = new Bien();
$sql = new sql_inject('sqlinject.log');

$accion = $_GET['accion'];
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';
if ($_POST['enviar'] != null) {
    $codigo = $sql->protect(stripslashes($_POST["codigo"]));
    $serie = $sql->protect(stripslashes($_POST["serie"]));    
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $precio = $sql->protect(stripslashes($_POST["precio"]));    
    $fecha = date("Y-m-d");        
    $fech = date("H:i:s");
    $nuevafecha = strtotime ( '-1 hour' , strtotime ( $fech ) ) ;
    $nueva = date("H:i:s", $nuevafecha);
    $hora = $nueva;
    $cantidad = $sql->protect(stripslashes($_POST["cantidad"]));
    $estado = "1";
    $modelo = $sql->protect(stripslashes($_POST["modelo"]));
    $marca = $sql->protect(stripslashes($_POST["marca"]));
    $catb = $sql->protect(stripslashes($_POST["catb"]));

    $rpta = $pro->insertarbien($codigo,$serie,$nombres, $precio, $fecha, $hora, $cantidad, $estado, $modelo, $marca, $catb);
    if ($rpta) {
        header("Location: ../view/ingbien.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingbien.php?bien=".$rep);
           echo $rep;  
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $codigo = $sql->protect(stripslashes($_POST["codigo"]));
    $serie = $sql->protect(stripslashes($_POST["serie"])); 
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));
    $precio = $sql->protect(stripslashes($_POST["precio"]));
    $fecha = $sql->protect(stripslashes($_POST["fecha"]));
    $hora = $sql->protect(stripslashes($_POST["hora"]));
    $cantidad = $sql->protect(stripslashes($_POST["cantidad"]));
    $estado = "1";
    $modelo = $sql->protect(stripslashes($_POST["modelo"]));
    $marca = $sql->protect(stripslashes($_POST["marca"]));
    $catb = $sql->protect(stripslashes($_POST["catb"]));

    $rptas = $pro->actualizarbien($idi, $codigo, $serie, $nombres, $precio, $fecha, $hora, $cantidad, $estado, $modelo, $marca, $catb);
    if ($rptas) {
        header("Location: ../view/bien.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/ingbien.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarbien($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/bien.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingbien.php");
    }
}//fin guardar

if ($_POST['cancelar'] != null) {
    header("Location: ../view/bien.php");
}//fin guardar

if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingbien.php");
}//fin guardar
?>