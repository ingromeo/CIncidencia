<?php
session_start();
?>
<?php
include_once '../model/mincidencia.php';
$pro = new Incidencia();
$id = $_REQUEST["id"];
$lip = $pro->listarprioridad();
$lie = $pro->listarestado();
$licc = $pro->listarcatasuinc();
$lic = $pro->listarasuinc();
$licb = $pro->listarcatbien();
$lib = $pro->listarbien();
$liu = $pro->listarusuario();
$lil = $pro->listarcliente();
$lir = $pro->listarresponsable();
$lia = $pro->listarareas();
$sal = $_GET['bien'];
$lista = $pro->buscarincidencia($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="utf-8" />
	<title>INGRESO DE INCIDENCIA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       <link rel="stylesheet" href="../formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
       <script type="text/javascript" src="../formoid_files/formoid1/jquery.min.js"></script>
    <script type="text/javascript" src="../formoid_files/formoid1/formoid-solid-green.js"></script>
        <script>
            function redimensiona(){
                top.grand(document.body.scrollHeight);}
        </script>
        <script type="text/javascript">
  $(document).ready(function(){
    $("#cbien").change(function(){
    $.ajax({
      url:"../model/combo.php",
      type: "POST",
      data:"idmarca="+$("#cbien").val(),
      success: function(opciones){
        $("#bien").html(opciones);
      }
    })
  });
});

$(document).ready(function(){
    $("#cati").change(function(){
    $.ajax({
      url:"../model/combo.php",
      type: "POST",
      data:"idasu="+$("#cati").val(),
      success: function(opciones){
        $("#asu").html(opciones);
      }
    })
  });
});

$(document).ready(function(){
    $("#areas").change(function(){
    $.ajax({
      url:"../model/combo.php",
      type: "POST",
      data:"idareas="+$("#areas").val(),
      success: function(opciones){
        $("#solicitante").html(opciones);
      }
    })
  });
});
</script>
<style type="text/css">
	      .bs-example{
           margin: 50px;
           height: 10px;
           width: 200px;
	       }
         </style>
    </head>
    <body onLoad="redimensiona();" class="blurBg-false">
        <form method="POST" action="../controller/incidenciacon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:710px;min-width:210px">
            
            <div class="title" align="center"><h2>INGRESO DE INCIDENCIA</h2></div>
            
            <table border="0">
                  <tr>
                  
                  <tr style="display: none;">
                <td><span class="style2">&nbsp;</span>C&oacute;digo:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="idi" id="idi" required="required" placeholder="Ingrese C&oacute;digo" value="<?php echo ($lista[0]['id_incidencia']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                  <td><span class="style2">&nbsp;</span>C. Bien:</td>
<td style="width:100px;">
	<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span>
    <select id="cbien" name="cbien" required="required">
		<?php
           for ($a = 0; $a < (count($licb)); $a++) {
          ?>
       <option value="<?php echo ($licb[$a]['id_catb']); ?>">
       <?php echo ($licb[$a]['descripcion_catb']); ?></option>
           <?php } ?>
        </select>
        <i></i><span class="icon-place"></span></span></div></div>
     </div>    
    </td>      
<td><span class="style2">&nbsp;</span>Bien:</td>
<td style="width:250px;">
<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span><select id="bien" name="bien" required="required" ></select>
        <i></i><span class="icon-place"></span></span></div></div>
    </div>
    </td>
    </tr>
                
                <tr>
                  <td><span class="style2">&nbsp;</span>C. Asunto:</td>
<td style="width:100px;">
	<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span>
    <select id="cati" name="cati" required="required">
		<?php
          for ($a = 0; $a < (count($licc)); $a++) {
          ?>
         <option value="<?php echo ($licc[$a]['id_catinc']); ?>">
         <?php echo ($licc[$a]['descripcion_catinc']); ?></option>
          <?php } ?>
        </select>
        <i></i><span class="icon-place"></span></span></div></div>
     </div>    
    </td>      
<td><span class="style2">&nbsp;</span>Asunto:</td>
<td style="width:250px;">
<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span><select id="asu" name="asu" required="required" ></select>
        <i></i><span class="icon-place"></span></span></div></div>
    </div>
    </td>
    </tr>
              
              <tr>
                  <td><span class="style2">&nbsp;</span>&Aacute;rea:</td>
<td style="width:100px;">
	<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span>
    <select id="areas" name="areas" required="required">
		<?php
         for ($a = 0; $a < (count($lia)); $a++) {
          ?>
        <option value="<?php echo ($lia[$a]['id_areas']); ?>">
        <?php echo ($lia[$a]['descripcion_areas']); ?></option>
         <?php } ?>
        </select>
        <i></i><span class="icon-place"></span></span></div></div>
     </div>    
    </td>      
<td><span class="style2">&nbsp;</span>Solicitante:</td>
<td style="width:250px;">
<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span><select id="solicitante" name="solicitante" required="required" ></select>
        <i></i><span class="icon-place"></span></span></div></div>
    </div>
    </td>
    </tr>  
          
 
               <tr style="display: none;">               
                
               <td>Tipo:</td>
<td style="width:250px;">
<div class="element-input">      
    <div class="item-cont">
      <input class="large" type="text" name="tipo" id="tipo" value="incidencia" required="required" placeholder="Tipo"/>
        <span class="icon-place"></span>
    </div>
    </div>
    </td>
    
                  <td>Usuario:</td>

<td style="width:250px;">
<div class="element-input">      
    <div class="item-cont">
      <input class="large" type="text" name="usuario" id="usuario" value="<?php echo $_SESSION["idusu"]; ?>" required="required" placeholder="Usuario"/>
        <span class="icon-place"></span>
    </div>
    </div>
    </td>
    
    <td>Estado:</td>
<td style="width:250px;">
<div class="element-input">      
    <div class="item-cont">
      <input class="large" type="text" name="estado" id="estado" value="1" required="required" placeholder="Estado"/>
        <span class="icon-place"></span>
    </div>
    </div>
    </td>     

    </tr>  
           
                <tr>
                       
<td><span class="style2">&nbsp;</span>Prioridad:</td>
<td style="width:250px;">
<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span><select id="prioridad" name="prioridad" required="required" >
    <?php
       for ($a = 0; $a < (count($lip)); $a++) {
     ?>
     <option value="<?php echo ($lip[$a]['id_prioridad']); ?>"><?php echo ($lip[$a]['descripcion_prioridad']); ?></option>
    <?php } ?>
    </select>
        <i></i><span class="icon-place"></span></span></div></div>
    </div>
    </td>
    <td><span class="style2">&nbsp;</span>Canal:</td>
<td style="width:100px;">
	<div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span>
    <select id="canal" name="canal" required="required">
		<option value="Presencial">Presencial</option>
        <option value="E-mail">E-mail</option>
        <option value="Vía Telefónica">V&iacute;a Telef&oacute;nica</option>
        </select>
        <i></i><span class="icon-place"></span></span></div></div>
     </div>    
    </td> 
    </tr>
                
                <tr rowspan="4">
               <td rowspan="4"><span class="style2">&nbsp;</span>Descripci&oacute;n:</td>
<td style="width:250px;" rowspan="4">
<div class="element-input">      
    <div class="item-cont">
      <input style="width:250px;" type="text" class="large" name="idi" id="idi" required="required" placeholder="Ingrese C&oacute;digo" value="<?php echo ($lista[0]['descripcion_incidencia']); ?>"/>
                <span class="icon-place"></span>
    </div>
    </div>
    </td>                          

    </tr>                
            </table>
            <br/>
            <div class="submit" align="center">
                <p align="center">
                <form method="POST" action="../controller/incidenciacon.php">
                <input type="submit" id="modificar" name="modificar" value="Guardar"/>               
                </form>
                </p>
             </div>                        
        </form>
                        
    </body>
</html>