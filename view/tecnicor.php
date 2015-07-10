<?php
include_once '../model/mrequerimiento.php';
$user = new Requerimiento();
$id = $_REQUEST["id"];

$lie = $user->listarnivel();

$lista = $user->buscarrequerimiento($id);
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
        
                                    <script>
function ocombo() {
    var combo = document.getElementById("responsable");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementById("demo").value = selected;
}
</script>
        
        <script type="text/javascript">
  $(document).ready(function(){
    $("#nivel").change(function(){
    $.ajax({
      url:"../model/combo.php",
      type: "POST",
      data:"idnivel="+$("#nivel").val(),
      success: function(opciones){
        $("#responsable").html(opciones);
      }
    })
  });
});

</script>
        
    </head>

    <body onLoad="redimensiona();" class="blurBg-false">
        <br />

        <form method="POST" action="../controller/tecnicorcon.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:500px;min-width:50px">
            <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="80%">
                <tr align="center">
                    <td colspan="2" height="54" bgcolor="#1fbba6" style="color:#FFF;">ACTUALIZACI&Oacute;N DE T&Eacute;CNICO</td>
                </tr>
                
                <tr>
                    <td height="50" > <span class="style1">Id:</span> </td>
                    <td class=" border-bottom"><input type="text" name="idino" id="idino" value="<?php echo ($lista[0]['id_incidencia']); ?>" style="width:100px;" readonly /></td>
                </tr>
                
                <tr style="display: none;">
                    <td height="50" class=" border-bottom"> <span class="style1">Id:</span> </td>
                    <td class=" border-bottom"><input type="text" name="idi" id="idi" value="<?php echo ($lista[0]['id_incidencia']); ?>" style="width:100px;"/></td>
                    <td height="50" class=" border-bottom"> <span class="style1">Estado:</span> </td>
                    <td class=" border-bottom"><input type="text" name="estado" id="estado" value="2" style="width:100px;"/></td>
                <td>Responsable texto:</td>
<td style="width:250px;">
<div class="element-input">      
    <div class="item-cont">
      <input class="large" type="text" name="demo" id="demo" value="" required="required" placeholder="demo"/>
        <span class="icon-place"></span>
    </div>
    </div>
    </td>
                </tr>
                                
                <tr>
                <td height="50" class=" border-bottom"> <span class="style1">Nivel:</span> </td>
                    <td class=" border-bottom"><select id="nivel" name="nivel"><option value = ""></option><?php
                            for ($a = 0; $a < (count($lie)); $a++) {
                                ?>                                
                                <option value="<?php echo ($lie[$a]['nivel_nivel']); ?>"><?php echo ($lie[$a]['descripcion_nivel']); ?></option>
                            <?php } ?>
                        </select></td>
                </tr>
                                
                <tr>
                    <td height="50" class=" border-bottom"> <span class="style1">Responsable:</span> </td>
                    <td class=" border-bottom"><select id="responsable" name="responsable" onchange="ocombo()">
                            
                        </select></td>
                </tr>
                
            </table>
            <br/>
                        
            <p class="submit" align="center">
                <input type="submit" id="modificarres" name="modificarres" value="Modificar Responsable"/>
                
            </p>
        </form>

    </body>
</html>