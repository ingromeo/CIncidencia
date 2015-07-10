<?php
include_once '../model/mpersona.php';
$pro = new Persona();
$li = $pro->listardistrito();
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
    </head>

    <body onLoad="redimensiona();" class="blurBg-false">
        <br />

        <form method="POST" action="../controller/personacon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:550px;min-width:50px">
        
            <table align="center" cellspacing="2" cellpadding="2" border="0" class="borde_table" width="100%">
                <tr>
                    <td colspan="2" align="center" height="54" bgcolor="#1fbba6" style="color:#FFF;">&nbsp;&nbsp;INGRESO DE PERSONAL</td>
                </tr>

                <tr>                
                <td>                
                <div class="element-name">
                <label class="title">
                <span class="required">&nbsp;</span>
                </label>
                <span class="nameFirst">
                <input style="width:250px;" placeholder="A. Paterno" type="text" name="apepat" id="apepat" required="required"/>
                <span class="icon-place"></span></span>
                </div>	            
                </td>
                
                <td>                
                <div class="element-name">                
                <label class="title"><span class="required">&nbsp;</span>
                </label>
                <span class="nameLast">
                <input style="width:250px;" placeholder="A. Materno" type="text" name="apeat" id="apeat" required="required"/>
                <span class="icon-place"></span></span>                
                </div>	            
                </td>
                </tr>
                  
                <tr>                
                <td style="width:250px;">
                <div class="element-name">
                <label class="title"></label>
                <span class="nameFirst">
                <input style="width:250px;" placeholder="Nombres" type="text" name="nombres" id="nombres" required="required"/>
                <span class="icon-place"></span></span></div>
                </td>
                
                <td style="width:250px;">
                <div class="element-number">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="text" min="0" max="90000000" name="dni" id="dni" required="required" placeholder="D.N.I." />
                <span class="icon-place"></span></div></div>
	            </td>
                </tr>
                
                <tr>                
                <td style="width:250px;">
                <div class="element-phone">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telf" id="telf" required="required" placeholder="T. Fijo" />
                <span class="icon-place"></span></div></div>
	
                </td>
                
                <td style="width:250px;">
                <div class="element-phone">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telm" id="telm" required="required" placeholder="T. M&oacute;vil"/>
                <span class="icon-place"></span></div></div>
	
	            </td>
                </tr>
                
                <tr>                
                <td style="width:250px;">
                <div class="element-email">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="email" name="correo" id="correo" required="required" placeholder="E-mail"/>
                <span class="icon-place"></span></div></div>
	            </td>
                
                <td style="width:250px;">
                <div class="element-address">
                <label class="title"></label>
                <span class="addr1">
                <input style="width:250px;" placeholder="Street Address" type="text" name="direccion" id="direccion" required="required"/>
                <span class="icon-place"></span></span>                
                </div>
	            </td>
                </tr>
                
                <tr>
                <td style="width:250px;">
                <div class="element-number">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="text" min="0" max="90000000000000000000000000000000000000000000" name="sueldo" id="sueldo" required="required" placeholder="Sueldo" />
                <span class="icon-place"></span></div></div>
	            </td>
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
            <input type="submit" id="enviar" name="enviar" value="Guardar"/> 
            </p>
            </div>
        </form>
<?php
                  if ($sal != null){
                     ?>
        <center> <div id="capa1" class='bs-example'>
        <div class='alert alert-success'><?php echo $sal; ?>
        <a href="persona.php"><img src="../img/check.png" width="25px" height="25px"/></a>
        </div> </div> </center>
                    <?php
                  } 
                  ?>
    </body>
</html>