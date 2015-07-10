<?php
include_once '../model/mrequerimiento.php';
$user = new Requerimiento();

$lista = $user->listarrequ();

$lip = $user->listarprioridad();
$lie = $user->listarestado();
$licc = $user->listarcatasuinc();
$lic = $user->listarasuinc();
$lir = $user->listarresponsable();
$sal = $_GET['bien'];
$el = $_GET['el'];
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Gesti&oacute;n de Registro</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <!-- Bootstrap 3.3.2 -->
        <link href="../table/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../table/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../table/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="../table/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
       <script type="text/javascript" src="../formoid_files/formoid1/jquery.min.js"></script>
    <script type="text/javascript" src="../formoid_files/formoid1/formoid-solid-green.js"></script>     
         <style type="text/css">
	      .bs-example{
           margin: 40px;
           height: 6px;
           width: 150px;
	       }
           .bs-examplee{
           margin: 40px;
           height: 6px;
           width: 150px;
	       }
         </style>
<!-- PESTAÑA -->
<script src="../js/jquery.min.js"></script>
	<style>
	/*body{font-size:75%;}*/
	*{font-family:sans-serif;outline:none;text-rendering: optimizelegibility;
    -webkit-box-sizing: border-box;-moz-box-sizing: border-box;
    -ms-box-sizing: border-box;box-sizing: border-box;}
	ul.tabs{height:30px;width:100%;margin:0;padding:0;list-style:none}
	.tabs li{float:left;height:30px;background:#f5f5f5;border-radius:6px 6px 0 0}
	.tabs li.selected{background:#fff;border:solid #f5f5f5;border-width:1px 1px 0 1px}
			
	.tabs li a:link,.tabs li a:active,.tabs li a:visited,
    .tabs li a:hover{line-height:30px;font-size:1.1em;text-decoration:none;
    display:block;color:#000;padding:0 30px}
	.tabs li.selected a:link,.tabs li.selected a:active,
    .tabs li.selected a:visited,.tabs li.selected a:hover{font-weight:bold}
	        
    div.pestana{width:100%;margin:0;padding:0;border:1px solid #f5f5f5;padding:20px;
        /*position:relative;*/top:-1px;z-index:-1;border-radius:0 0 6px 6px}
	.pestana p{font-size:1em;line-height:500%;margin:0;}
    
	pre{padding:20px;border:5px solid #f5f5f5;white-space: pre-wrap; /* css-3 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */}
</style>
<script type="text/javascript">
	$(document).ready(function() 
	{
		$('.pestana').hide().eq(0).show();
		$('.tabs li').click(function(e)
		{
			e.preventDefault();
			$('.pestana').hide();
			$('.tabs li').removeClass("selected");
			var id = $(this).find("a").attr("href");
			$(id).fadeToggle();
			$(this).addClass("selected");
		});
	});
	</script>

	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-266167-20");
pageTracker._setDomainName(".martiniglesias.eu");
pageTracker._trackPageview();
} catch(err) {}</script>
<!-- PESTAÑA -->
<!-- FECHA -->        
        <script type="text/javascript">
            $(document).ready(function () {
                $("#rProducto").click(function (event) {
                    var datei = document.getElementById("datei").value;
                    var datef = document.getElementById("datef").value;                    
                    var cati = document.getElementById("cati").value;
                    var asu = document.getElementById("asu").value;
                    var responsable = document.getElementById("responsable").value;
                    var estado = document.getElementById("estado").value;
                    var prioridad = document.getElementById("prioridad").value;
                    
                    $("#capa1").load("../controller/rrcon.php", {datei:datei,datef:datef,
                                    cati:cati,asu:asu,responsable:responsable,estado:estado,
                                    prioridad:prioridad}, function (response, status, xhr) {
                        if (status == "error") {
                            var msg = "Error!, No se pudo cargar la pagina ";
                            alert
                            $("#capa1").html(msg + xhr.status + " " + xhr.statusText);
                        }
                    });
                });
            });
        </script>
<!-- FECHA -->

    </head>
    <body class="blurBg-false">
        <br/>
        
  <div align="center">	
	<ul class="tabs">
		<li class="selected"><a href="#tab-1">Pendientes</a></li>
		<li ><a href="#tab-2">Todos</a></li>
	</ul>
	   <div class="pestana" id="tab-1">
        <!-- menu pendientes -->
        <div align="center">
        <?php
                  if ($sal != null){
                     ?>
        <center> <div id="capa1" class='bs-example'>
        <div class='alert alert-success'><?php echo $sal; ?>
        </div> </div> </center>
                    <?php
                  } 
                  ?>
                  <?php
                  if ($el != null){
                     ?>
        <center> <div id="capa1" class='bs-examplee'>
        <div class='alert alert-success'><?php echo $el; ?>
        </div> </div> </center>
                    <?php
                  } 
                  ?>
        <form action="../controller/requerimientocon.php" method="POST">  

            <!-- /.box-header -->
            <div class="box-header">
                <h3 class="box-title">GESTION DE REQUERIMIENTOS</h3>
                
                <br />
       <div align ="left">            
     <input type="submit" id="nuevor" name="nuevor" value="Nuevo"/>
     <a href="../reportes/reportejas/jasper/rrequerimiento.php?rep=requerimiento" target="_blank">Reporte</a>
                  </div>                     
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripci&oacute;n</th>
                            <th>F.Inicio</th>
                            <th>F.Fin</th>
                            <th>Canal</th>
                            <th>C.Inci</th>
                            <th>A.Inci</th>                            
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Solicitante</th>
                            <th>Responsable</th>
                            <th>Opciones</th>						
                        </tr>
                    </thead>
                    <tbody>	
                        <?
                        if(count($lista)>0){
                        for($i=0;$i<(count($lista));$i++) {
                        $dirTecnico="tecnicor.php?id=".$lista[$i]['codigo'];
                        $dirModifica="updrequerimiento.php?id=".$lista[$i]['codigo'];
                        $dirComentario="comentario.php?id=".$lista[$i]['codigo'];
                        $dirEliminar="diagnostico.php?id=".$lista[$i]['codigo'];
                        ?>
                        <tr>
                            <td align="center"><? echo ($lista[$i]['codigo']); ?></td>
                            <td align="center"><? echo ($lista[$i]['requerimiento']); ?></td>
                            <td align="center" width="9%"><? echo ($lista[$i]['fechai']); ?></td>
                            <td align="center" width="9%"><? echo ($lista[$i]['fechaf']); ?></td>
                            <td align="center"><? echo ($lista[$i]['canal']); ?></td>
                            
                            <td align="center"><? echo ($lista[$i]['catinc']); ?></td>
                            <td align="center"><? echo ($lista[$i]['asuinc']); ?></td>
                            
                            <td align="center"><? echo "<table class='borde_table'>
                                                         <tr>
                                                          <td>
                                                            <img src='../img/".($lista[$i]['prioridad']).".gif' width=80% height=100%
                                                            alt=".$lista[$i]['prioridad']."/>
                                                           </td>
                                                           </tr>
                                                           </table>"; ?></td>
                            <td align="center"><? echo ($lista[$i]['estado']);?></td>
                            <td align="center"><? echo ($lista[$i]['usuario']); ?></td>                            
                            <td align="center"><? echo ($lista[$i]['cliente']); ?></td>
                            <td align="center"><? echo ($lista[$i]['responsable']); ?></td>

                            <td width="9%" align="center">
                                <a href="<?php echo $dirTecnico; ?>">
                                    <img src="../img/tecnico.png" width="20%" height="10%" alt="Editar pregunta del sistema"  border="0"/></a>
                                
                                <a href="<?php echo $dirModifica; ?>">
                                    <img src="../img/editar.gif" width="20%" height="50%" alt="Editar pregunta del sistema"  border="0"/></a>

                                <a href="<?php echo $dirComentario; ?>">
                                    <img src="../img/comentarios.png" width="15%" height="15%" alt="Editar pregunta del sistema"  border="0"/></a>
                                       
                                <a href="<? echo $dirEliminar; ?>">
                                    <img src="../img/eliminar.jpg" width="30%" height="50%" border="0" alt="Eliminar registro del sistema"/></a></td>
                        </tr>
                        <?}
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->

        </form>
</div>
        <!-- jQuery 2.1.3 -->
        <script src="../table/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../table/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../table/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../table/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="../table/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../table/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="../table/app.min.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
<!-- menu perndientes *********************************************************************************-->
	   </div>
	   <div class="pestana" id="tab-2">
		  
          <form class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:700px;min-width:50px">
           
          <table align="center" cellspacing="2" cellpadding="4" border="0" class="borde_table" width="100%">
                <tr>
                    <td align="center" colspan="4" height="10" bgcolor="#1fbba6" style="color:#FFF;">REQURIMIENTOS</td>
                </tr>
                <tr align="center">
                    <td style="width:150px;" class=" border-bottom"><span class="style2">*</span> <span class="style1">F. Inicio:</span> </td>
                    <td style="width:150px;" class=" border-bottom"><input type="date" name="datei" id="datei" style="width:250px;"/></td>
                    <td style="width:150px;" class=" border-bottom"><span class="style2">*</span> <span class="style1">F. Fin:</span> </td>
                    <td style="width:150px;" class=" border-bottom"><input type="date" name="datef" id="datef" style="width:250px;"/></td>
                </tr>                
                <tr align="center">
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">C. Asunto:</span> </td>
                    <td class=" border-bottom"><select id="cati" name="cati">
                    <option value=" ">Seleccione...</option><?php
                            for ($a = 0; $a < (count($licc)); $a++) {
                                ?>
                                <option value="<?php echo ($licc[$a]['id_catinc']); ?>"><?php echo ($licc[$a]['descripcion_catinc']); ?></option>
                            <?php } ?>
                        </select></td>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Asunto:</span> </td>
                    <td class=" border-bottom"><select id="asu" name="asu">
                    <option value=" ">Seleccione...</option><?php
                            for ($a = 0; $a < (count($lic)); $a++) {
                                ?>
                                <option value="<?php echo ($lic[$a]['id_asuinc']); ?>"><?php echo ($lic[$a]['descripcion_asuinc']); ?></option>
                            <?php } ?>
                        </select></td>
                </tr>                
                <tr align="center">
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Responsable: &nbsp;&nbsp;</span> </td>
                    <td class=" border-bottom"><select id="responsable" name="responsable">
                    <option value=" ">Seleccione...</option><?php
                            for ($a = 0; $a < (count($lir)); $a++) {
                                ?>
                                <option value="<?php echo ($lir[$a]['responsable']); ?>"><?php echo ($lir[$a]['responsable']); ?></option>
                            <?php } ?>
                        </select></td>
                    <td height="50" class=" border-bottom"><span class="style2"></span><span class="style1"></span></td>
                    <td class=" border-bottom"></td>                
                </tr>
                <tr align="center">
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Estado:</span> </td>
                    <td class=" border-bottom"><select id="estado" name="estado">
                    <option value=" ">Seleccione...</option><?php
                            for ($a = 0; $a < (count($lie)); $a++) {
                                ?>
                                <option value="<?php echo ($lie[$a]['id_estado']); ?>"><?php echo ($lie[$a]['descripcion_estado']); ?></option>
                            <?php } ?>
                        </select></td>
                    <td height="50" class=" border-bottom"><span class="style2">*</span> <span class="style1">Prioridad:</span> </td>
                    <td class=" border-bottom"><select id="prioridad" name="prioridad">
                           <option value=" ">Seleccione...</option><?php
                            for ($a = 0; $a < (count($lip)); $a++) {
                                ?>
                                <option value="<?php echo ($lip[$a]['id_prioridad']); ?>"><?php echo ($lip[$a]['descripcion_prioridad']); ?></option>
                            <?php } ?>
                        </select></td>
                </tr>
            </table>
            </form>
            <br/>
            <button type="submit" name="rProducto" id="rProducto" onclick="valida_envia()">Buscar</button>
            <button type="submit" name="cancelar" id="cancelar">Atras</button>
            <br /><br />
          <div class="box-body">
          <div id="capa1"></div>
          </div>
	   </div>
	
	</div>
 </body>
</html>