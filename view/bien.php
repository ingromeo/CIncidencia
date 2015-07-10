<?php
include_once '../model/mbien.php';
$user = new Bien();
$lista = $user->listar();
$sal = $_GET['bien'];
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Gesti&oacute;n de Registro</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="../table/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="../table/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../table/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="../table/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
	      .bs-example{
           margin: 40px;
           height: 6px;
           width: 150px;
	       }
         </style>
    </head>
    <body>
        <br/>
        <?php
           if ($sal != null){
                     ?>
        <center> <div id="capa1" class='bs-example'>
        <div class='alert alert-success'><?php echo $sal; ?>
        </div> </div> </center>
                    <?php
                  } 
                  ?>
        <form action="../controller/biencon.php" method="POST">  

            <div class="box-header" align="center">
                <h3 class="box-title">GESTION DE BIENES</h3>
                <br />
       <div align ="left">
                    <input type="submit" id="nuevo" name="nuevo" value="Nuevo"/>
                    <a href="../reportes/reportejas/jasper/rbien.php?rep=bien" target="_blank">Reporte</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>C&oacute;digo</th>
                            <th>Serie</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Categor&iacute;a</th>
                            <th>Opciones</th> 
                        </tr>
                    </thead>
                    <tbody>

                        <?
                        if(count($lista)>0){
                        for($i=0;$i<(count($lista));$i++) {
                        $dirModifica="updbien.php?id=".$lista[$i]['id'];
                        $dirEliminar="../controller/biencon.php?accion=eliminar&idqwe=".$lista[$i]['id'];
                        ?>
                        <tr>
                            <td align="center"><? echo ($lista[$i]['id']); ?></td>
                            <td align="center"><? echo ($lista[$i]['codigo']); ?></td>
                            <td align="center"><? echo ($lista[$i]['serie']); ?></td>
                            <td align="center"><? echo ($lista[$i]['bien']); ?></td>
                            <td align="center"><? echo ($lista[$i]['precio']); ?></td>
                            <td align="center"><? echo ($lista[$i]['cantidad']); ?></td>
                            <td align="center"><? echo ($lista[$i]['fecha']); ?></td>
                            <td align="center"><? echo ($lista[$i]['hora']); ?></td>
                            <td align="center"><? echo ($lista[$i]['modelo']); ?></td>
                            <td align="center"><? echo ($lista[$i]['marca']); ?></td>
                            <td align="center"><? echo ($lista[$i]['categoria']); ?></td>

                            <td width="9%" align="center">
                                <a href="<?php echo $dirModifica; ?>">
                                    <img src="../assets/images/editar.gif" alt="Editar pregunta del sistema"  border="0"/></a>

                                <a href="<? echo $dirEliminar; ?>">
                                    <img src="../assets/images/eliminar.gif" border="0" alt="Eliminar registro del sistema"/></a></td>
                        </tr>
                        <?}
                        }
                        ?>

                    </tbody>
                </table>
            </div><!-- /.box-body -->

        </form>

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

    </body>
</html>