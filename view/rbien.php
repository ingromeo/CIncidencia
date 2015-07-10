<?php
include '../model/mbien.php';
$user = new Bien();
$lia = $user->listarmodelo();
$lip = $user->listarmarca();
$li = $user->listarcatb();
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
                    var serie = document.getElementById("serie").value;
                    var nombres = document.getElementById("nombres").value;
                    
                    var catb = document.getElementById("catb").value;
                    var marca = document.getElementById("marca").value;
                    var modelo = document.getElementById("modelo").value;
                    
                    //alert(datei+","+datef+","+codigo+","+serie+","+nombres+","+catb+","+marca+","+modelo);
                    
                    $("#capa1").load("../controller/consultacon.php", {datei:datei,datef:datef,codigo:codigo,
                                                                    serie:serie,nombres:nombres,catb:catb,
                                        marca:marca,modelo:modelo}, function (response, status, xhr) {
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
          
          var catb = document.getElementById("catb").value;
          var marca = document.getElementById("marca").value;
          var modelo = document.getElementById("modelo").value;
           	
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
             function serie (){
                var f2 = document.getElementById('serie').value;
                document.getElementById('t4').value = f2;
             }
             ////////////////////////////////////////////////////
             /////////////////////////////////////////////////////////
             ////////////////////////////////////////////////////
             function nombres (){                
                var f1 = document.getElementById('nombres').value;
                document.getElementById('t5').value = f1;
             }
             
             function modelo (){
                var f2 = document.getElementById('modelo').value;
                document.getElementById('t6').value = f2;
             }
             
             function marca (){
                var f2 = document.getElementById('marca').value;
                document.getElementById('t7').value = f2;
             }
             function catb (){
                var f2 = document.getElementById('catb').value;
                document.getElementById('t8').value = f2;
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
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">F. Inicio:</span> </td>
                    <td class=" border-bottom"><input type="text" name="datei" id="datei" style="width:250px;" onchange="fecha1()"/></td>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">F. Fin:</span> </td>
                    <td class=" border-bottom"><input type="text" name="datef" id="datef" style="width:250px;" onchange="fecha2()"/></td>
                </tr> 
                <tr>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">C&oacute;digo:</span> </td>
                    <td class=" border-bottom"><input type="text" name="codigo" id="codigo" style="width:250px;" onchange="codigo()"/></td>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Serie:</span> </td>
                    <td class=" border-bottom"><input type="text" name="serie" id="serie" style="width:250px;" onchange="serie()"/></td>
                </tr>                
                <tr >
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Nombres:</span> </td>
                    <td class=" border-bottom"><input type="text" name="nombres" id="nombres" style="width:250px;" onchange="nombres()"/></td>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Modelo:</span> </td>
                    <td class=" border-bottom"><select id="modelo" name="modelo" onchange="modelo()">
                    <option value=" ">Seleccione</option>
                    <?php for ($a = 0; $a < (count($lia)); $a++) { ?>
                    <option value="<?php echo ($lia[$a]['descripcion_modelo']); ?>">
                    <?php echo ($lia[$a]['descripcion_modelo']); ?></option>
                    <?php } ?></select>
                    </td>
                </tr>
                <tr>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Marca:</span> </td>
                    <td class=" border-bottom"><select id="marca" name="marca" onchange="marca()">
                    <option value=" ">Seleccione</option>
                    <?php for ($a = 0; $a < (count($lip)); $a++) { ?>
                    <option value="<?php echo ($lip[$a]['descripcion_marca']); ?>">
                    <?php echo ($lip[$a]['descripcion_marca']); ?></option>
                    <?php } ?></select>
                    </td>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">C. Bien:</span> </td>
                    <td class=" border-bottom"><select id="catb" name="catb" onchange="catb()">
                    <option value=" ">Seleccione</option>
                    <?php for ($a = 0; $a < (count($li)); $a++) { ?>
                    <option value="<?php echo ($li[$a]['descripcion_catb']); ?>">
                    <?php echo ($li[$a]['descripcion_catb']); ?></option>
                    <?php } ?></select>
                    </td>
                </tr>
            </table>
           <br/>
            <p align="center">
            <button type="submit" name="rProducto" id="rProducto" onclick="valida_envia()">Enviar</button>
            <div>
        <form action="../reportes/reportepdf/rrcbien.php" method="POST" target="_blank">
           <input style="display: none;" type='text' id='t1' name='t1'/> <br /> 
           <input style="display: none;" type='text' id='t2' name='t2'/> <br />
           <input style="display: none;" type='text' id='t3' name='t3'/> <br />
           <input style="display: none;" type='text' id='t4' name='t4'/> <br /> 
           <input style="display: none;" type='text' id='t5' name='t5'/> <br />
           <input style="display: none;" type='text' id='t6' name='t6'/> <br />
           <input style="display: none;" type='text' id='t7' name='t7'/> <br /> 
           <input style="display: none;" type='text' id='t8' name='t8'/>
           <input type="submit" name="enviar" id="enviar" value="Reporte" />
        </form>
        </div>
            </p>
        <div id="capa1"></div>
        </center>
        </form>
    </body>
</html>