<?php
include_once '../model/mincidencia.php';
$user = new Incidencia();
$id = $_REQUEST["id"];
$listadiag = $user->buscarincidencia($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Ingreso de Diagnostico</title>        
        <link rel="stylesheet" href="../assets/css/styles.css"/>
        <script type="text/javascript" src="../js/fecha/jquery-191.js"></script>
        <link rel="stylesheet" href="../formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
       <script type="text/javascript" src="../formoid_files/formoid1/jquery.min.js"></script>
    <script type="text/javascript" src="../formoid_files/formoid1/formoid-solid-green.js"></script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $("#rProducto").click(function (event) {
                    
                    var codigo = document.getElementById("codigo").value;
                    
                    //alert(datei+","+datef+","+codigo+","+serie+","+nombres+","+catb+","+marca+","+modelo);
                    
                    $("#capa1").load("../controller/table.php", {codigo:codigo}, function (response, status, xhr) {
                        if (status == "error") {
                            var msg = "Error!, No se pudo cargar la pagina ";
                            alert
                            $("#capa1").html(msg + xhr.status + " " + xhr.statusText);
                        }
                    });
                });
            });
        </script>        
        <style>
          .content {width: 100%;}        
          .left {padding-left: 10px;
                 padding-top: 10px;
                 margin-left: 57px;
                 float: left;
                 position: relative;
                 width: 45%;
                 border: white solid 1px;
                 height: auto;}        
          .right {padding-top: 10px;
                  padding-left: 10px;
                  margin-left: 10px;
                  position: relative;
                  float: left;
                  width: 45%;
                  border: white solid 1px;
                  height: auto;}
        </style>                                                                                                
    </head>
    <body onLoad="redimensiona();" class="blurBg-false">    
    
   <div class="content"> 
    
    <div class="left">
     <form action="../controller/diagnosticocon.php" method="POST" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:350px;min-width:50px">
        <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr>
                    <td colspan="4" align="center" height="20" bgcolor="#1fbba6" style="color:#FFF;">DIAGN&Oacute;STICO</td>
                </tr>                
                <tr style="display: none;">
                    <td height="50" class=" border-bottom"><span class="style1">Id:</span> </td>
                    <td class=" border-bottom"><input type="text" name="id" id="id" style="width:250px;" value="<?php echo ($listadiag[0]['id_incidencia']); ?>"/></td>
                </tr>
                <tr>
                    <td height="50" class=" border-bottom"><span class="style1">Incidencia:</span> </td>
                    <td class=" border-bottom"><input type="text" name="des" id="des" style="width:250px;" value="<?php echo ($listadiag[0]['descripcion_incidencia']); ?>"/></td>
                </tr>
                <tr>
                    <td height="50" class=" border-bottom"><span class="style1">Diagn&oacute;stico:</span> </td>
                    <td class=" border-bottom"><input type="text" name="diag" id="diag" style="width:250px;" value=""/></td>
                </tr>
                <tr style="display: none;">
                    <td height="50" class=" border-bottom"><span class="style1">Estado:</span> </td>
                    <td class=" border-bottom"><input type="text" name="estado" id="estado" style="width:250px;" value="5"/></td>
                </tr>
            </table>
            <br/>
            <div class="submit" align="center">
            <p align="center">
            <input type="submit" id="guardar" name="guardar" value="Guardar"/> 
            </p>
            </div>
      </form>              
    </div>
    
    <div class="right">
        <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr>
                    <td colspan="4" align="center" height="20" bgcolor="#1fbba6" style="color:#FFF;">Historial de Incidencias Resueltas</td>
                </tr>                
                <tr>
                    <td height="50" class=" border-bottom"><span class="style1">Descripci&oacute;n:</span> </td>
                    <td class=" border-bottom"><input type="text" name="codigo" id="codigo" style="width:250px;"/></td>
                </tr>
            </table>
           <br/>
            <p align="center">
            <button type="submit" name="rProducto" id="rProducto">Enviar</button>
            </p>
        <div class="box-body">
          <div id="capa1"></div>
          </div>    
    </div>
    
   </div>   
   
    </body>
</html>