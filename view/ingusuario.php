<?php
include_once '../model/musuario.php';
$user = new Usuario();
$lia = $user->listararea();
$lip = $user->listarpersona();
$li = $user->listartusuario();
$ni = $user->listarnivel();
$sal = $_GET['bien'];
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
            function redimensiona()
            {
                top.grand(document.body.scrollHeight);
            }
        </script>     
         <style type="text/css">
	      .bs-example{
           margin: 50px;
           height: 10px;
           width: 200px;
	       }
         </style>
         <script type="text/javascript">
            $(document).ready(function(){
            $("#area").change(function(){
            $.ajax({
              url:"../model/combo.php",
              type: "POST",
              data:"idarea="+$("#area").val(),
              success: function(opciones){
                $("#persona").html(opciones);
              }
            })
          });
        });
        </script>
    </head>

    <body onLoad="redimensiona();" class="blurBg-false">
        <br />

        <form method="POST" action="../controller/usuariocon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:500px;min-width:50px">
            
            <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="80%">
                <tr>
                <td colspan="2" height="54" bgcolor="#1fbba6" style="color:#FFF;">&nbsp;&nbsp;INGRESO DE USUARIOS</td>
                </tr>
                
                <tr>                   
                <td ><span class="style2">&nbsp;</span>Usuario:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" class="large" name="usuario" id="usuario" required="required" placeholder="Ingrese usuario"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>                   
                <td ><span class="style2">&nbsp;</span>Clave:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" class="large" name="clave" id="clave" required="required" placeholder="Ingrese clave"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Nivel:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="nivel" name="nivel" required="required">
                <?php for ($a = 0; $a < (count($ni)); $a++) { ?>
                <option value="<?php echo ($ni[$a]['id_nivel']); ?>">
                <?php echo ($ni[$a]['descripcion_nivel']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>T. Usuario:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="tusuario" name="tusuario" required="required">
                <?php for ($a = 0; $a < (count($li)); $a++) { ?>
                <option value="<?php echo ($li[$a]['id_tipousuario']); ?>">
                <?php echo ($li[$a]['descripcion_tipousuario']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>&Aacute;rea:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="area" name="area" required="required">
                <?php for ($a = 0; $a < (count($lia)); $a++) { ?>
                <option value="<?php echo ($lia[$a]['id_areas']); ?>">
                <?php echo ($lia[$a]['descripcion_areas']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Persona:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="persona" name="persona" required="required">                
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                </tr>
                
                <tr style="display: none;">
                <td><span class="style2">&nbsp;</span>Persona:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="persona" name="persona" required="required">
                <?php for ($a = 0; $a < (count($lip)); $a++) { ?>
                <option value="<?php echo ($lip[$a]['id_persona']); ?>">
                <?php echo ($lip[$a]['nombres_persona']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                </tr>
                
            </table>
            <br/>
            <div class="submit" align="center">
            <p align="center">
            <input type="submit" id="enviar" name="enviar" value="Guardar"/> 
            </p>
            </div>
        </form>
               <?php if ($sal != null){ ?>
               <center> <div id="capa1" class='bs-example'>
               <div class='alert alert-success'><?php echo $sal; ?>
               <a href="usuario.php"><img src="../img/check.png" width="25px" height="25px"/></a>
               </div></div> </center><?php } ?>               
    </body>
</html>