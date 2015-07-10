<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Ingreso de personal</title>
        <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../assets/plugins/iCheck/skins/all.css"/>
        <link rel="stylesheet" href="../assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css"/>
        <link rel="stylesheet" href="../assets/css/styles.css"/>
        
        
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Morris charts -->
        <link href="../chart/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../chart/AdminLTE.css" rel="stylesheet" type="text/css" />
               
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
            /*$(document).ready(function () {
                $("#rProducto").click(function (event) {
                    var datei = document.getElementById("datei").value;
                    var datef = document.getElementById("datef").value;
                    var costo = document.getElementById("costo").value;
                    //alert(datei+","+datef+","+codigo+","+serie+","+nombres+","+catb+","+marca+","+modelo);
                    
                    $("#capa1").load("../controller/cosmedfijporincrescon.php", {datei:datei,datef:datef,costo:costo}, function (response, status, xhr) {
                        if (status == "error") {
                            var msg = "Error!, No se pudo cargar la pagina ";
                            alert
                            $("#capa1").html(msg + xhr.status + " " + xhr.statusText);
                        }
                    });
                });
            });*/
        
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
                        $.ajax({
                       type: "POST",
                              url: "../controller/cosmedfijporincrescon.php",
                              data: $('#re').serialize(),
                              success: function(a) {
                                var a=a.split('</html>');
                                //alert(a[1]);
                                
                                $('#capa').html(a[0]);
                                var res=a[1].split('||');
                                
                                document.getElementById('noresueltas').value = res[0];
                                document.getElementById('resueltas').value = res[1];
                                document.getElementById('total').value = res[2];
                                
                                document.getElementById('grafico').style.display = 'block';
                                document.getElementById('capa1').style.display = 'block';
                              }
                        });
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
             </script>
             <style type="text/css">
            #bloque{  /*padre*/
                      width: 100%;
            }
            #bloque .A, #bloque .B{  /*hijos*/
                                     display: inline-block;
            }
        </style> 
    </head>
    <body onLoad="redimensiona();">
    
    <center>
    <form id="re" name="re">
        <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="50%">
                <tr>
                    <td colspan="4" align="center" height="20" bgcolor="#1fbba6" style="color:#FFF;">REPORTE DE COSTO MEDIO FIJO POR INCIDENCIAS RESUELTAS</td>
                </tr>
                <tr>
                    <td height="50" class=" border-bottom"><span class="style1">F. Inicio:</span> </td>
                    <td class=" border-bottom"><input type="date" name="datei" id="datei" style="width:250px;" onchange="fecha1()"/></td>
                    <td height="50" class=" border-bottom"><span class="style1">F. Fin:</span> </td>
                    <td class=" border-bottom"><input type="date" name="datef" id="datef" style="width:250px;" onchange="fecha2()"/></td>
                </tr>
            </table>
     </form>
           <br/>
            <p align="center">
            <button type="submit" name="rProducto" id="rProducto" onclick="valida_envia()">Enviar</button>
            <button style="display: none;" type="submit" name="grafico" id="grafico" onclick="dato()">Ver Gr&aacute;fico</button>
            <button type="submit" name="nuevo" id="nuevo" onClick=" window.location.href='rccosmedfijporincres.php' ">Nuevo</button>
            </p>
            <br />
            <div id="capa1" align = 'center' style="display: none;">
        
                <div>
        <form action="../reportes/reportepdf/rrcosmedfijporincres.php" method="POST" target="_blank">
           <input style="display: none;" type='text' id='t1' name='t1'/> <br /> 
           <input style="display: none;" type='text' id='t2' name='t2'/> <br />
           <input type="submit" name="enviar" id="enviar" value="Reporte" />
        </form>
        </div>
        
                <div id="bloque">
                <div class="A">
                <img alt="" src="../img/inc2.jpg" height="140px" height="140px"/>
                </div>                
                <div class="B">
                <br /><br /><br /><br /> 
                Costo Fijo   
                <input type='text' id='noresueltas' name='noresueltas'/> <br /> 
                Total de Incidencias Resueltas   
                <input type='text' id='resueltas' name='resueltas'/> <br />   
                CFM x IR
                <input type='text' id='total' name='total' />   
                </div>
                </div>
        </div>
        <br />
        <div class="box-body">
          <div id="capa"></div>
          </div>
        
        <br />
        <center>
        <!-- DONUT CHART -->
              <div class="box box-danger" style="display: none;" id="gra">
                <div class="box-body chart-responsive">
                  <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </center>
    </center>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../chart/js/plugins/morris/morris.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../chart/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- page script -->
        <script type="text/javascript">
       // jQuery.noConflict();
       function dato(){
        document.getElementById('gra').style.display = 'block';
        $(function () {
                "use strict";
                //DONUT CHART
                var punto1=parseFloat(document.getElementById('noresueltas').value);
                var punto2=parseFloat(document.getElementById('resueltas').value);
                var donut = new Morris.Donut({
                    
                    element: 'sales-chart',
                    resize: true,
                    colors: ["#3c8dbc", "#f56954", "#00a65a"],
                    data: [
                        {label: "Costo Fijo", value: punto1},
                        {label: "Inc. Totales", value: punto2}
                    ],
                    hideHover: 'auto'
                });                
            });
       }
            
        </script> 
    </body>
</html>