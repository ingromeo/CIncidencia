<?php
include '../model/mbien.php';
$user = new Bien();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Ingreso de personal</title>
        <script language="javascript" src="../js/asignar.js"></script>
        <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../assets/plugins/iCheck/skins/all.css"/>
        <link rel="stylesheet" href="../assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css"/>
        <link rel="stylesheet" href="../assets/css/styles.css"/>
        <script type="text/javascript" src="../js/ajax.js"></script>
        <script type="text/javascript" src="../js/fecha/jquery-191.js"></script>
        <script type="text/javascript" src="../js/fecha/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/fecha/jquery-ui.css" />        
        <script type="text/javascript">
            $(document).ready(function () {
                $("#datei").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
                $("#datef").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $("#rProducto").click(function (event) {
                    var datei = document.getElementById("datei").value;
                    var datef = document.getElementById("datef").value;
                    var codigo = document.getElementById("codigo").value;
                    
                    //alert(datei+","+datef+","+codigo+","+serie+","+nombres+","+catb+","+marca+","+modelo);
                    
                    $("#capa1").load("../controller/rcproductocon.php", {datei:datei,datef:datef,codigo:codigo}, function (response, status, xhr) {
                        if (status == "error") {
                            var msg = "Error!, No se pudo cargar la pagina ";
                            alert
                            $("#capa1").html(msg + xhr.status + " " + xhr.statusText);
                        }
                    });
                });
            });
        </script>
        
        <script type="text/javascript">
        function valida_envia(){ 
   	      var datei = document.getElementById("datei").value;
          var datef = document.getElementById("datef").value;
          
           	
            /**/if (datei.length == 0 && datef.length == 0) {
                    alert("Debe ingresar ambas fechas");
                    document.getElementById("datei").focus;
                    return false;
                }
                else {
                    if (datei > datef) {
                        alert("La fecha inicial no puede ser mayor a la final");
                        document.getElementById("datei").focus;
                        return false;
                    } else {
                        return true;
                    }
                }  
                      
        }//fin clase
        </script>
           <script type="text/javascript">
             function fecha1 (){                
                var f1 = document.getElementById('datei').value;
                document.getElementById('t1').value = f1;
             }
             
             function fecha2 (){
                var f2 = document.getElementById('datef').value;
                document.getElementById('t2').value = f2;
             }
             
             function codigo (){
                var f2 = document.getElementById('codigo').value;
                document.getElementById('t3').value = f2;
             }
             </script>                                                                                     
    </head>
    <body onLoad="redimensiona();">
    
    <center>
        <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr>
                    <td colspan="4" align="center" height="20" bgcolor="#1fbba6" style="color:#FFF;">REPORTE DE BIENES</td>
                </tr>
                <tr>
                    <td height="50" class=" border-bottom"><span class="style1">F. Inicio:</span> </td>
                    <td class=" border-bottom"><input type="text" name="datei" id="datei" style="width:250px;" onchange="fecha1()"/></td>
                    <td height="50" class=" border-bottom"><span class="style1">F. Fin:</span> </td>
                    <td class=" border-bottom"><input type="text" name="datef" id="datef" style="width:250px;" onchange="fecha2()"/></td>
                </tr> 
                <tr>
                    <td height="50" class=" border-bottom"><span class="style1">C&oacute;digo:</span> </td>
                    <td class=" border-bottom"><input type="text" name="codigo" id="codigo" style="width:250px;" onchange="codigo()"/></td>
                    <td></td><td></td>
                </tr>                
            </table>
           <br/>
            <p align="center">
            <button type="submit" name="rProducto" id="rProducto" onclick="valida_envia()">Enviar</button>
            <div>
        <form action="../reportes/reportepdf/rrcproducto.php" method="POST" target="_blank">
           <input style="display: none;" type='text' id='t1' name='t1'/> <br /> 
           <input style="display: none;" type='text' id='t2' name='t2'/> <br />
           <input style="display: none;" type='text' id='t3' name='t3'/>
           <input type="submit" name="enviar" id="enviar" value="Reporte" />
        </form>
        </div>
            <!--button type="submit" name="cancelar" id="cancelar">Atras</button-->
            </p>
        <div class="box-body">
          <div id="capa1"></div>
          </div>
    </center>        
    </body>
</html>