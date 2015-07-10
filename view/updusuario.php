<?php
include_once '../model/musuario.php';
$pro = new Usuario();
$id = $_REQUEST["id"];
$lista = $pro->buscarusuario($id);
$lia = $pro->listararea();
$lip = $pro->listarpersona();
$li = $pro->listartusuario();
$ni = $pro->listarnivel();
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
    </head>

    <body onLoad="redimensiona();" class="blurBg-false">
        <br/>
        <form action="../controller/usuariocon.php" method="POST" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:400px;min-width:50px">
            
            <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr>
                    <td colspan="2" height="50" bgcolor="#1fbba6" style="color:#FFF;">&nbsp;&nbsp;EDICI&Oacute;N DE USUARIOS </td>
                </tr>
                
                <tr style="display: none;">
                <td><span class="style2">&nbsp;</span>C&oacute;digo:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="idi" id="idi" required="required" placeholder="Ingrese C&oacute;digo" value="<?php echo ($lista[0]['id_usuario']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Usuario:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="usuario" id="usuario" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['usu_usuario']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Clave:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="clave" id="clave" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['pas_usuario']); ?>"/>
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
                <td></td>
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
                <td></td>
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
                <?php for ($a = 0; $a < (count($lip)); $a++) { ?>
                <option value="<?php echo ($lip[$a]['id_persona']); ?>">
                <?php echo ($lip[$a]['nombres_persona']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                <td></td>
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
                <td></td>
                </tr>

            </table>
            <br/>
            <div class="submit" align="center">
            <p align="center">
            <input type="submit" id="modificar" name="modificar" value="Guardar"/> 
            </p>
            </div>
        </form>

    </body>
</html>