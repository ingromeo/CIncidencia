var campo;
var ventana;

function asignar_imagen()
{
	campo = document.forms[0].imagen;
	ventana = window.open("gestion_imagenes.php", "imagen", "toolbar=no, menubar=no, scrollbars=yes, status=no, width=550 height=500, resizable=no, left=100, top=50");
}

function asignar_banner()
{
	campo = document.forms[0].banner;
	ventana = window.open("gestion_banners.php", "banner", "toolbar=no, menubar=no, scrollbars=yes, status=no, width=550 height=500, resizable=yes, left=100, top=50");
}

function asignar_fichero()
{
	campo = document.forms[0].nombre;
	ventana = window.open("gestion_ficheros.php", "nombre", "toolbar=no, menubar=no, scrollbars=yes, status=no, width=550 height=500, resizable=yes, left=100, top=50");
}

function seleccionar(param)
{
	top.opener.campo.value = param;
	top.close();
	return false;
}