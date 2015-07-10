<?php
include_once '../util/config.php';
$db = new DB_Class();
 //***************BIENES****************************************************************************
 if(isset($_POST["idmarca"]))
 {
    $strConsulta = "select id_bien, descripcion_bien from bien where estado_bien = 1 and id_catb = ".$_POST["idmarca"];
    $result = mysql_query($strConsulta);
    while ($fila = mysql_fetch_array($result)) {
       $opciones.='<option value="'.$fila["id_bien"].'">'.$fila["descripcion_bien"].'</option>';
     }    
 echo $opciones;
 }
 //****************CATEGORIA ASUNTO*****************************************************************
  if(isset($_POST["idasu"]))
 {
    $strConsulta = "select id_asuinc, descripcion_asuinc from asuntoincidencia where estado_asuinc = 1 and id_catinc = ".$_POST["idasu"];
    $result = mysql_query($strConsulta);
    while ($fila = mysql_fetch_array($result)) {
       $opciones.='<option value="'.$fila["id_asuinc"].'">'.$fila["descripcion_asuinc"].'</option>';
     }    
 echo $opciones;
 }
 //**********************AREA POR USUARIO***********************************************************
  if(isset($_POST["idareas"]))
 {
    $strConsulta = "select p.nombres_persona as nombres,p.apepat_persona as ap, p.apeat_persona as am
         from persona p inner join usuario u on p.id_persona = u.id_persona inner join areas a on
         a.id_areas = u.id_areas where p.estado_persona = 1 and a.id_areas = ".$_POST["idareas"];
    $result = mysql_query($strConsulta);
    while ($fila = mysql_fetch_array($result)) {
       $opciones.='<option value="'.$fila["nombres"]." ".$fila["ap"]." ".$fila["am"].'">'
                                   .$fila["nombres"]." ".$fila["ap"]." ".$fila["am"].'</option>';
     }    
 echo $opciones;
 }
  //**********************NIVEL***********************************************************
  if(isset($_POST["idnivel"]))
 {
    $strConsulta = " SELECT u.id_usuario as id, 
                     concat(p.nombres_persona,' ',p.apepat_persona,' ',p.apeat_persona) as responsable
                     FROM nivel n inner join usuario u on u.id_nivel = n.id_nivel
                     inner join persona p on p.id_persona = u.id_persona
                     where n.nivel_nivel = ".$_POST["idnivel"];
    $result = mysql_query($strConsulta);
     $opciones.='<option value = ""></option>';
    while ($fila = mysql_fetch_array($result)) {
       $opciones.='<option value="'.$fila["id"].'">'
                                   .$fila["responsable"].'</option>';
     }    
 echo $opciones;
 }
  //**********************AREA POR USUARIO USUARIO***********************************************************
  if(isset($_POST["idarea"]))
 {
    $strConsulta = "select p.id_persona as idp, p.nombres_persona as nombres,p.apepat_persona as ap,
                           p.apeat_persona as am
         from persona p inner join usuario u on p.id_persona = u.id_persona inner join areas a on
         a.id_areas = u.id_areas where p.estado_persona = 1 and a.id_areas = ".$_POST["idarea"];
    $result = mysql_query($strConsulta);
    $opciones = "<option value = ' '> </option>";
    while ($fila = mysql_fetch_array($result)) {
       $opciones.='<option value="'.$fila["idp"].'">'
                                   .$fila["nombres"]." ".$fila["ap"]." ".$fila["am"].'</option>';
     }    
 echo $opciones;
 }
 
 
 
 
 
?>