<?php
include_once '../model/masuinc.php';
$user = new Asuinc();
$lista = $user->listar();
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
    </head>
    <body>
        <br/>
        <form action="../controller/asuinccon.php" method="POST">

            <div class="box-header" align="center">
                <h3 class="box-title">GESTION DE ASUNTO DE INCIDENCIAS</h3>
                <br />
       <div align ="left">
                    <input type="submit" id="nuevo" name="nuevo" value="Nuevo"/>
                    <a href="../reportes/reportejas/jasper/rasuinc.php?rep=asuinc" target="_blank">Reporte</a>
</div>
                
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?
                        if(count($lista)>0){
                        for($i=0;$i<(count($lista));$i++) {
                        $dirModifica="updasuinc.php?id=".$lista[$i]['id_asuinc'];
                        $dirEliminar="../controller/asuinccon.php?accion=eliminar&idqwe=".$lista[$i]['id_asuinc'];
                        ?>
                        <tr>
                            <td align="center"><? echo ($lista[$i]['id_asuinc']); ?></td>
                            <td align="center"><? echo ($lista[$i]['descripcion_asuinc']); ?></td>

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