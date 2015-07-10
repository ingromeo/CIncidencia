<?php
include_once '../model/mrequerimiento.php';
require_once "../util/class_sql_inject.php";
$pro = new Requerimiento();
$sql = new sql_inject('sqlinject.log');

if ($_POST['guardar'] != null) {
    date_default_timezone_set('America/Lima');
    $id = $sql->protect(stripslashes($_POST["id"]));
    $diag = $sql->protect(stripslashes($_POST["diag"])); 
    $fec1 = date("Y-m-d");    
    $hora1 = date("H:i:s");
    
    $rpta = $pro->insertardiag($diag,$fec1,$hora1, $id);
           
    $est = $sql->protect(stripslashes($_POST["estado"]));
    $estado = "0";
    $rpta1 = $pro->actualizardiag($id, $fec1, $hora1, $est, $estado);
    
    if ($rpta) {
        header("Location: ../view/home.php");
    } else {
        header("Location: ../view/login.php");
    }
    
}//fin guardar


?>