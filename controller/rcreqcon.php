<?php
include_once '../util/config.php';
include_once '../model/mporincres.php';
$pro = new Por();
$db = new DB_Class();

$datei = $_POST['datei'];
$datef = $_POST['datef'];
$cati = $_POST['cati'];
$asu =  $_POST['asu'];
$responsable = $_POST['responsable'];
$estado = $_POST['estado'];
$prioridad = $_POST['prioridad'];
                    
$scon = "select i.id_incidencia as incidenciainc,
                i.descripcion_incidencia as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                i.canal_incidencia as canal,
                i.cliente_incidencia as cliente,
                i.tresponsable_incidencia as responsable,
                i.tipo_incidencia as tipoinc,
                e.descripcion_estado as estado,
                d.descripcion_diagnostico as diag
         from incidencia i inner join asuntoincidencia ai on i.id_asuinc = ai.id_asuinc
              inner join categoriaincidencia ci on ci.id_catinc = ai.id_catinc
              inner join estado e on e.id_estado = i.id_estado
              inner join prioridad p on p.id_prioridad = i.id_prioridad
              inner join diagnostico d on d.id_diagnostico = i.id_incidencia
         where i.tipo_incidencia = 'requerimiento' and
              ai.id_asuinc = '$asu' and ci.id_catinc = '$cati' and
              i.tresponsable_incidencia = '$responsable' and
              e.id_estado = '$estado' and p.id_prioridad = '$prioridad' and
              i.ffin_incidencia between '$datei' and '$datef'";
            
$sql=mysql_query($scon);

echo "<table align='center' border='1' width='50%' class='table table-bordered table-striped'>";
echo "<tr height='50'>";
echo "<td>C. Inc.</td>
      <td>Des. Inc.</td>
      <td>F. I. Inc.</td>
      <td>H. I. Inc.</td>
      <td>F. F. Inc.</td>
      <td>H. F. Inc.</td>
      <td>Canal</td>
      <td>Cliente</td>
      <td>Responsable</td>
      <td>T. Inc.</td>
      <td>Estado</td>
      <td>Diagn&oacute;tico</td>";
echo "</tr>";
while($row = mysql_fetch_array($sql)){
	echo "<tr>";
    echo "<td>".$row['incidenciainc']."</td>
          <td>".$row['descripcioninc']."</td>
          <td>".$row['fincioinc']."</td>
          <td>".$row['hinicioinc']."</td>
          <td>".$row['ffininc']."</td>
          <td>".$row['hfininc']."</td>
          <td>".$row['canal']."</td>
          <td>".$row['cliente']."</td>
          <td>".$row['responsable']."</td>
          <td>".$row['tipoinc']."</td>
          <td>".$row['estado']."</td>
          <td>".$row['diag']."</td>";
    echo "</tr>";
}
echo "</table>";

?>