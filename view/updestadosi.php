<?php
include_once '../model/mincidencia.php';
$user = new Incidencia();
$id = $_REQUEST["id"];

$lie = $user->listarestador();

$lista = $user->buscarincidencia($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Ingreso de personal</title>
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
        <br />

        <form method="POST" action="../controller/incidenciaecon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:400px;min-width:50px">
            <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr align="center">
                    <td colspan="2" height="54" bgcolor="#1fbba6" style="color:#FFF;">ACTUALIZACI&Oacute;N DE ESTADO DE INCIDENCIAS</td>
                </tr>
                
                <tr>
                <td ><span class="style2">&nbsp;</span>Id:</td>
                <td style="width:250px;" >
                <div class="element-input">      
                <div class="item-cont">
                <input type="text" name="idino" id="idino" value="<?php echo ($lista[0]['id_incidencia']); ?>" style="width:250px;" readonly />
                <span class="icon-place"></span>
                </div>
                </div>
                </td>
                
                
                
                </tr>
                
                <tr style="display: none;">
                    <td height="50" class=" border-bottom"><span class="style1">Id:</span> </td>
                    <td class=" border-bottom"><input type="text" name="idi" id="idi" value="<?php echo ($lista[0]['id_incidencia']); ?>" style="width:50px;"/></td>
                </tr>
                
                <tr>                     
                <td><span class="style2">&nbsp;</span>Estado:</td>
                <td style="width:250px;">                
                <div class="element-select">
                <label class="title"></label>
                <div class="item-cont">
                <div class="large">
                <span>
                <select id="estado" name="estado" required="required">
                <?php for ($a = 0; $a < (count($lie)); $a++) { ?>
                <option value="<?php echo ($lie[$a]['id_estado']); ?>">
                <?php echo ($lie[$a]['descripcion_estado']); ?></option>
                <?php } ?>		
                </select>
                <i></i><span class="icon-place"></span>
                </span></div></div></div>
                </td>                       
                        
                </tr>
                                
                
            </table>
            <br/>
            <div align="center" class="submit">
            <p align="center">
                <input type="submit" id="modificares" name="modificares" value="Modificar Estado" />
            </p>
            </div>
        </form>

    </body>
</html>