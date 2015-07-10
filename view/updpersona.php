<?php
include_once '../model/mpersona.php';
$pro = new Persona();
$id = $_REQUEST["id"];
$lista = $pro->buscarPersona($id);
$li = $pro->listardistrito();
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
        <form action="../controller/personacon.php" method="POST" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:400px;min-width:50px">
            
            <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr>
                    <td colspan="2" height="50" bgcolor="#1fbba6" style="color:#FFF;">&nbsp;&nbsp;EDICI&Oacute;N DE PERSONAL </td>
                </tr>
                
                <tr style="display: none;">
                <td><span class="style2">&nbsp;</span>C&oacute;digo:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="idi" id="idi" required="required" placeholder="Ingrese C&oacute;digo" value="<?php echo ($lista[0]['id_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Nombres:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="nombres" id="nombres" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['nombres_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>A. Paterno:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="apepat" id="apepat" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['apepat_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>A. Materno:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="apeat" id="apeat" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['apeat_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>D.N.I.:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="dni" id="dni" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['dni_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>T. Fijo:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="telf" id="telf" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['telf_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>T. M&oacute;vil:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="telm" id="telm" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['telm_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Correo:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="correo" id="correo" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['correo_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Direcci&oacute;n:</td>
                <td style="width:250px;">
                <div class="element-input">      
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="direccion" id="direccion" required="required" placeholder="Ingrese &aacute;rea" value="<?php echo ($lista[0]['direccion_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Sueldo:</td>
                <td style="width:250px;">
                <div class="element-input">
                <div class="item-cont">
                <input style="width:250px;" type="text" class="large" name="sueldo" id="sueldo" required="required" placeholder="Ingrese sueldo" value="<?php echo ($lista[0]['sueldo_persona']); ?>"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Distrito:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="distrito" name="distrito" required="required">
                <?php for ($a = 0; $a < (count($li)); $a++) { ?>
                <option value="<?php echo ($li[$a]['id_distrito']); ?>">
                <?php echo ($li[$a]['descripcion_distrito']); ?></option>
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