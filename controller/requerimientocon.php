<?php

include_once '../model/mrequerimiento.php';
require_once "../util/class_sql_inject.php";
$pro = new requerimiento();
$sql = new sql_inject('sqlinject.log');

$accion = $_GET['accion'];
$ing = 'Ingreso Correcto.';
$act = 'Edicion Correcta.';
$eli = 'Eliminacion Correcta.';
$rep = 'Registro Existente.';

if ($_POST['enviar'] != null) {
    date_default_timezone_set('America/Lima');
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));    
    $fec1 = date("Y-m-d");    
    $hora1 = date("H:i:s");    
    $fec2 = date("Y-m-d");    
    $hora2 = date("H:i:s");    
    $canal = $sql->protect(stripslashes($_POST["canal"]));
    $solicitante = $sql->protect(stripslashes($_POST["solicitante"]));
    //$responsable = $sql->protect(stripslashes($_POST["responsable"]));
    //$tresponsable = $sql->protect(stripslashes($_POST["demo"]));
    $tipo = $sql->protect(stripslashes($_POST["tipo"]));
    $est = "1";
    $prioridad = $sql->protect(stripslashes($_POST["prioridad"]));
    $estado = $sql->protect(stripslashes($_POST["estado"]));    
    $asu = $sql->protect(stripslashes($_POST["asu"]));    
    $bien = $sql->protect(stripslashes($_POST["bien"]));    
    $usuario = $sql->protect(stripslashes($_POST["usuario"]));
    
    $rpta = $pro->insertarrequerimiento($nombres,$fec1,$hora1,$fec2,$hora2,$canal,$solicitante,
                                     $tipo,$est,$prioridad,$estado,$asu,$bien,$usuario);
    if ($rpta) {
        header("Location: ../view/ingrequerimiento.php?bien=".$ing);
           echo $ing;  
    } else {
        header("Location: ../view/ingrequerimiento.php?bien=".$rep);
           echo $rep;
    }
}//fin guardar

if ($_POST['modificar'] != null) {
    date_default_timezone_set('America/Lima');
    $idi = $sql->protect($_REQUEST["idi"]);
    $nombres = $sql->protect(stripslashes($_POST["nombres"]));    
    $fec1 = date("Y-m-d");    
    $hora1 = date("H:i:s");    
    $fec2 = date("Y-m-d");    
    $hora2 = date("H:i:s");    
    $canal = $sql->protect(stripslashes($_POST["canal"]));
    $solicitante = $sql->protect(stripslashes($_POST["solicitante"]));
    //$responsable = $sql->protect(stripslashes($_POST["responsable"]));
    //$tresponsable = $sql->protect(stripslashes($_POST["demo"]));
    $tipo = $sql->protect(stripslashes($_POST["tipo"]));
    $est = "1";
    $prioridad = $sql->protect(stripslashes($_POST["prioridad"]));
    $estado = $sql->protect(stripslashes($_POST["estado"]));    
    $asu = $sql->protect(stripslashes($_POST["asu"]));    
    $bien = $sql->protect(stripslashes($_POST["bien"]));    
    $usuario = $sql->protect(stripslashes($_POST["usuario"]));

    $rptas = $pro->actualizarrequerimiento($idi,$nombres,$fec1,$hora1,$fec2,$hora2,$canal,$solicitante,
                                     $tipo,$est,$prioridad,$estado,$asu,$bien,$usuario);
    if ($rptas) {
        header("Location: ../view/requerimiento.php?bien=".$act);
        echo $act;
    } else {
        header("Location: ../view/requerimiento.php");
    }
}//fin guardar

if ($_POST['modificares'] != null) {
    $idi = $sql->protect($_REQUEST["idi"]);
    $estado = $sql->protect(stripslashes($_POST["estado"]));

    $rptas = $pro->actualizarrequerimientoest($idi,$estado);
    if ($rptas) {
        header("Location: ../view/requerimiento.php");
    } else {
        header("Location: ../view/requerimiento.php");
    }
}//fin guardar

if ($accion = 'eliminar') {
    $idi = $sql->protect($_REQUEST["idqwe"]);
    $estadow = "0";

    $rptas = $pro->eliminarrequerimiento($idi, $estadow);
    if ($rptas) {
        header("Location: ../view/requerimiento.php?el=".$eli);
        echo $act;
    } else {
        header("Location: ../view/ingrequerimiento.php");
    }
}//fin guardar

if ($_POST['cancelar'] != null) {
    header("Location: ../view/requerimiento.php");
}//fin guardar

if ($_POST['nuevo'] != null) {
    header("Location: ../view/ingrequerimiento.php");
}//fin guardar

?>