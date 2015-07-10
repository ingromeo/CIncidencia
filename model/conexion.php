<?php

function conexion() {

    $con = mysql_connect("localhost", "root", "123");

    if (!$con) {

        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("incidencias", $con);

    return($con);
}
?>