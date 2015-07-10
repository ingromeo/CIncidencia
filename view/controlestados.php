<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="utf-8" />
	<title>INGRESO DE INCIDENCIA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       <link rel="stylesheet" href="../formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
       <script type="text/javascript" src="../formoid_files/formoid1/jquery.min.js"></script>
       <script type="text/javascript" src="../formoid_files/formoid1/formoid-solid-green.js"></script>
        <script>
            function redimensiona(){
                top.grand(document.body.scrollHeight);}
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#rProducto").click(function (event) {
                    var tabla = document.getElementById("tabla").value;                  
                    
                    $("#capa1").load("../controller/controlestadoscon.php", {tabla:tabla},
                    function (response, status, xhr) {
                        if (status == "error") {
                            var msg = "Error!, No se pudo cargar la pagina ";
                            alert
                            $("#capa1").html(msg + xhr.status + " " + xhr.statusText);
                        }
                    });
                });
            });
        </script>
    </head>
    
    <body onLoad="redimensiona();" class="blurBg-false">
        
            <div class="formoid-solid-green" style="background-color:#FFFFFF;font-size:12px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:710px;min-width:210px">
            
            
            <div class="title" align="center"><h2>ACTUALIZACI&Oacute;N DE ESTADOS</h2></div>
            
            <table align="center" border="0" class="borde_table">
            
                <tr rowspan="4">
                   <br />    
    <td><span class="style2">&nbsp;</span>Tabla:</td>
    <td style="width:250px;">
    <div class="element-select">
    <div class="item-cont">
    <div class="large">
    <span><select id="tabla" name="tabla" required="required" >
     <option value="areas">&Aacute;reas</option>
     <option value="asuntoincidencia">Asunto Incidencia</option>
     <option value="bien">Bien</option>
     <option value="categoriabien">Categor&iacute;a Bien</option>
     <option value="categoriaincidencia">Categor&iacute;a Incidencia</option>
     <option value="distrito">Distrito</option>
     <option value="estado">Estado</option>
     <option value="marca">Marca</option>
     <option value="modelo">Modelo</option>
     <option value="nivel">Nivel</option>
     <option value="persona">Persona</option>
     <option value="prioridad">Prioridad</option>
     <option value="tipousuario">Tipo Usuario</option>
     <option value="usuario">Usuario</option>
    </select>
        <i></i><span class="icon-place"></span></span></div></div>
    </div>
    </td> 
   
    <td rowspan="4"><span class="style2">&nbsp;</span>Descripci&oacute;n:</td>
    <td style="width:250px;" rowspan="4">
    <div class="element-input">
    <label class="title"></label>
    <div class="item-cont">
    <input class="large" type="text" name="des" id="des" placeholder="Descripci&oacute;n"/>
    <span class="icon-place"></span>
    </div>
    </div>	
    </td>
    </tr>                
    </table>    
            <br/>            
            <div class="submit" align="center">
                <p align="center">
                <input type="submit" id="rProducto" name="rProducto" value="Buscar"/>                
                </p>
             </div>        
        </div>
        
        
        
        <div class="box-body">
          <div id="capa1"></div>
          </div>
              
    </body>
</html>