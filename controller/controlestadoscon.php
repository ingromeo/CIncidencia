<?php
//include_once '../model/mcontrolestados.php';
include_once '../util/config.php';
$db = new DB_Class();
$tabla = $_GET['tabla'];

    //$rpta = $pro->buscarcontrolestados($tabla, $des);
    //if ($rpta) {
   //     header("Location: ../view/ingareas.php");
   //     echo $rpta;
  //  } else {
  //      header("Location: ../view/ingareas.php?error=Error.");
  //  }
  
  $scon = "select * from $tabla";
            
$sql=mysql_query($scon);

echo "<table align='center' border='1' width='50%' class='table table-bordered table-striped'>";
echo "<tr height='50'>";
echo "<td>id areas</td>";
echo "</tr>";
while($row = mysql_fetch_array($sql)){
	echo "<tr>";
    echo "<td>".$row['descripcion_areas']."</td>";
    echo "</tr>";
}
echo "</table>";
?>