<?php
include_once '../model/masuinc.php';
$pro = new Asuinc();
$li = $pro->listarcatinc();
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

        <form method="POST" action="../controller/asuinccon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:500px;min-width:50px">
            
            <table align="center" cellspacing="2" cellpadding="2" border="0" class="borde_table" width="100%">
                <tr>
                    <td colspan="2" height="54" bgcolor="#1fbba6" style="color:#FFF;">&nbsp;&nbsp;INGRESO DE ASUNTO DE INCIDENCIAS</td>
                </tr>

                <tr >
                   
                <td ><span class="style2">&nbsp;</span>Descripci&oacute;n:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" class="large" name="nombres" id="nombres" required="required" placeholder="Ingrese a. incidencias"/>
        <span class="icon-place"></span>
    </div>
    </div>
    </td>         
                </tr>
                
                <tr>
                <td><span class="style2">&nbsp;</span>C. Inc.:</td>
                <td style="width:250px;">                
                    <div class="element-select">
                    <label class="title"></label>
                    <div class="item-cont">
                    <div class="large">
                    <span>
                    <select id="catinc" name="catinc" required="required">
                     <?php
                      for ($a = 0; $a < (count($li)); $a++) {
                                ?>
                                <option value="<?php echo ($li[$a]['id_catinc']); ?>"><?php echo ($li[$a]['descripcion_catinc']); ?></option>
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
        <a href="asuinc.php"><img src="../img/check.png" width="25px" height="25px"/></a>
        </div> </div> </center>
                    <?php
                  } 
                  ?>
    </body>
</html>