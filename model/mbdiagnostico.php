<?php

include_once '../util/config.php';
$q = $_POST['q'];

$sql = "select * from persona where nombres_persona LIKE '" . $q . "%'";
$res = mysql_query($sql);

if (count($res) > 0) {

    echo '<b>No hay sugerencias</b>';
} else {

    while ($fila = mysql_fetch_array($res)) {

        echo '<div class="sugerencias" onclick="myFunction2(' . $fila["id_persona"] . ')">' . $fila['nombres_persona'] . '</div>';
    }
}
?>