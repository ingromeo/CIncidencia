<?php

include_once '../util/config.php';

$codigo = $_POST['vcod'];

$sql = "select * from persona where id_persona='" . $codigo . "'";
$res = mysql_query($sql);

if (mysql_num_rows($res) == 0) {

    echo '<b>No hay dato</b>';
} else {

    $fila = mysql_fetch_array($res);

    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Codigo</th>';
    echo '<th>Nombre</th>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>' . $fila['id_persona'] . '</th>';
    echo '<th>' . $fila['nombres_persona'] . '</th>';
    echo '</tr>';

    echo '</table>';
}
?>