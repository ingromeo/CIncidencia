<!DOCTYPE HTML>
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
        
        <script type="text/javascript">
        function Pager(tableName, itemsPerPage) {
            this.tableName = tableName; // se asigna el nombre de la tabla al objeto
            this.itemsPerPage = itemsPerPage; // se asigna el numero de registros
            this.currentPage = 1; //indicamos cual es la pagina que presentaremos inicialmente
            this.pages = 0;//aun no sabemos cuantas paginas seran, por tanto lo declaramos a 0
            this.inited = false;//idicamos si ya inicio la tabla o no
            this.divisores = 0;//aun no sabemos la cantidad de divisores por eso la declaramos a cero
            this.cantidadDivs=5;//cantidad de divisores a mostrar por paginador

            this.init = function() {
                var rows = document.getElementById(tableName).rows;
                var records = (rows.length - 1);
                this.pages = Math.ceil(records / itemsPerPage);
                this.divisores = Math.ceil( this.pages / this.cantidadDivs );
                this.inited = true;
            }//FIN CLASE INIT

            this.showRecords = function(from, to) {
                var rows = document.getElementById(tableName).rows;
                for (var i = 1; i < rows.length; i++) {
                    if (i < from || i > to)
                        rows[i].style.display = 'none';
                    else
                        rows[i].style.display = '';
                }
            }//FIN CLASE MOSTRAR

            this.showDivs = function(pageNumber){
                var divisorMostrar = Math.ceil(pageNumber / this.cantidadDivs);
                for( var i = 1 ; i <= this.divisores ; i++ ){
                    if( divisorMostrar == i ){
                        document.getElementById('dv'+i).style.display = '';
                    }else{
                        document.getElementById('dv'+i).style.display = 'none';
                    }
                }
            }//FIN CLASE MOSTRARA DIVISORES

            this.showPage = function(pageNumber) {
                if (! this.inited) {
                    alert("La tabla no se inicializo");
                    return;
                }
                this.showDivs(pageNumber);
                this.currentPage = pageNumber;
                var from = (pageNumber - 1) * itemsPerPage + 1;
                var to = from + itemsPerPage - 1;
                this.showRecords(from, to);
            }//FIN CLASE MOSTRAR

            this.prev = function() {
                if (this.currentPage > 1)
                    this.showPage(this.currentPage - 1);
            }
            this.first = function() {
                if (this.currentPage > 1)
                    this.showPage( 1 );
            }
            this.next = function() {
                if (this.currentPage < this.pages) {
                    this.showPage(this.currentPage + 1);
                }
            }
            this.last = function() {
                if (this.currentPage < this.pages) {
                    this.showPage(this.pages);
                }
            }
            //BOTONES

            this.showPageNav = function(pagerName, positionId) {
                if (! this.inited) {
                    alert("La tabla no esta inicializada");
                    return;
                }
                var element = document.getElementById(positionId);//-
                var pagerHtml = '<botton style="Display: none; Position:Absolute; left:36%;" type="button" class="btn btn-default" onclick="' + pagerName + '.first();"> << </botton>';
                pagerHtml += '<botton style="Display: none; Position:Absolute; left:38%;" type="button" class="btn btn-default" onclick="' + pagerName + '.prev();"> < </botton>';
                var divisor = 1;
                var idDivisor = 1;
                for (var page = 1; page <= this.pages; page++) {
                    if( idDivisor==1 ){
                        pagerHtml += '<label border: 1px solid #e1e1e1; id="dv'+divisor+'">';
                    }
                    idDivisor = idDivisor+1;
                    pagerHtml += '<button border: 1px solid red; background-color: red;'+
                        'color: #ffffff; display: block; float: left; margin-right: 1px; padding: 1px; text-align: right;'+
                        'width: 8em; id="pg' + page + '" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</button>';
                    if(idDivisor==this.cantidadDivs+1){
                        idDivisor=1;
                        divisor=divisor+1
                        pagerHtml += '</label>';
                    }
                    else if( page == this.pages ){
                        pagerHtml += '';
                    }
                }
                pagerHtml += '<botton style="Display: none; Position:Absolute; right:42%;" type="button" class="btn btn-default" onclick="'+pagerName+'.next();"> > </botton>';
                pagerHtml += '<botton style="Display: none; Position:Absolute; right:39%;" type="button" class="btn btn-default" onclick="'+pagerName+'.last();"> >> </botton>';
                element.innerHTML = pagerHtml;//+
            }// fin clase showpage

        }//FIN CLAVE PAGER
    </script>
</head>

<body>
<table align='center' bgcolor="#1fbba6" border='1' id="example1" width='50%' class='table table-bordered table-striped'>
<tr height='50' bgcolor="#1fbba6">
<td style="background-color: #1fbba6; color: white;">C. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">Des. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">F. I. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">H. I. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">F. F. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">H. F. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">Canal</td>
      <td style="background-color: #1fbba6; color: white;">Cliente</td>
      <td style="background-color: #1fbba6; color: white;">Responsable</td>
      <td style="background-color: #1fbba6; color: white;">T. Inc.</td>
      <td style="background-color: #1fbba6; color: white;">Estado</td>
</tr>
<?php foreach ($rp as $row){ ?>
	<tr>
    <td><?php echo $row['incidenciainc']?></td>
    <td><?php echo $row['descripcioninc']?></td>
    <td><?php echo $row['fincioinc']?></td>
    <td><?php echo $row['hinicioinc']?></td>
    <td><?php echo $row['ffininc']?></td>
    <td><?php echo $row['hfininc']?></td>
    <td><?php echo $row['canal']?></td>
    <td><?php echo $row['cliente']?></td>
    <td><?php echo $row['responsable']?></td>
    <td><?php echo $row['tipoinc']?></td>
    <td><?php echo $row['estado']?></td>
    </tr>
<?php } ?>
</table>
<center><div id="pgrNavegador" style="width: 200px;"></div></center>
        <!-- PAGINADOR PARA LA TABLA -->
        <script type="text/javascript">
            <!--
            var pager = new Pager('example1', 10);
            pager.init();
            pager.showPageNav('pager', 'pgrNavegador');
            pager.showPage(1);
            //</script>
</body>
</html>