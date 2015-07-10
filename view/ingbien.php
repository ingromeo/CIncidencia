<?php
include_once '../model/mbien.php';
$user = new Bien();
$lia = $user->listarmodelo();
$lip = $user->listarmarca();
$li = $user->listarcatb();
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
         <script type="text/javascript">
            $(document).ready(function () {
                $("#fecha").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
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
        <form method="POST" action="../controller/biencon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:700px;min-width:50px">
        
            <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="80%">
                <tr>
                <td colspan="4" align="center" height="54" bgcolor="#1fbba6" style="color:#FFF;">&nbsp;&nbsp;INGRESO DE BIENES</td>
                </tr>
                <tr>
                <td ><span class="style2">&nbsp;</span>C&oacute;digo:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" class="large" name="codigo" id="codigo" required="required" placeholder="Ingrese c&oacute;digo"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>                
                <td ><span class="style2">&nbsp;</span>Serie:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" class="large" name="serie" id="serie" required="required" placeholder="Ingrese serie"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>
                </tr>
                               
                <tr>                                
                <td ><span class="style2">&nbsp;</span>Nombres:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" class="large" name="nombres" id="nombres" required="required" placeholder="Ingrese nombre"/>
                <span class="icon-place"></span>
                </div>
                </div>
                </td>                
                <td><span class="style2">&nbsp;</span>Precio:</td>
                <td style="width:250px;">
                <div class="element-number">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="text" min="0" max="999999" name="precio" id="precio" required="required" placeholder="Precio" />
                <span class="icon-place"></span></div></div>
	            </td>                
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>Cantidad:</td>
                <td style="width:250px;">
                <div class="element-number">
                <label class="title"></label>
                <div class="item-cont">
                <input style="width:250px;" class="large" type="text" min="0" max="90000000" name="cantidad" id="cantidad" required="required" placeholder="Cantidad" />
                <span class="icon-place"></span></div></div>
	            </td>                
                <td><span class="style2">&nbsp;</span>Modelo:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="modelo" name="modelo" required="required">
                <?php for ($a = 0; $a < (count($lia)); $a++) { ?>
                <option value="<?php echo ($lia[$a]['id_modelo']); ?>">
                <?php echo ($lia[$a]['descripcion_modelo']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>           
                </tr> 
                
                <tr>
                <td><span class="style2">&nbsp;</span>C. Bien:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="catb" name="catb" required="required">
                <?php for ($a = 0; $a < (count($li)); $a++) { ?>
                <option value="<?php echo ($li[$a]['id_catb']); ?>">
                <?php echo ($li[$a]['descripcion_catb']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>
                <td><span class="style2">&nbsp;</span>Marca:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="marca" name="marca" required="required">
                <?php for ($a = 0; $a < (count($lip)); $a++) { ?>
                <option value="<?php echo ($lip[$a]['id_marca']); ?>">
                <?php echo ($lip[$a]['descripcion_marca']); ?></option>
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
        <?php
                  if ($sal != null){
                     ?>
        <center> <div id="capa1" class='bs-example'>
        <div class='alert alert-success'><?php echo $sal; ?>
        <a href="bien.php"><img src="../img/check.png" width="25px" height="25px"/></a>
        </div> </div> </center>
                    <?php
                  } 
                  ?>
    </body>
</html>