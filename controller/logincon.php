<?php

session_start();
include_once '../model/mlogin.php';
require_once "../util/class_sql_inject.php";
$user = new User();

$sql = new sql_inject('sqlinject.log');
$ing = 'Verifique su Usuario y/o Clave.';
$usuario = $sql->protect(stripslashes($_POST["usuario"]));
$password = $sql->protect(stripslashes($_POST["password"]));

if ($user->get_session()) {
    header("location:../view/menu.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $user->login($usuario, $password);
    if ($login) {
        // Registration Success
        header("location:../view/principal.php");
    } else {
        header("location:../view/login.php?bien=".$ing);
           echo $ing;
    }
}
?>