function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function soporte(_contenedor, _pag, _criterio, _tipo, _estado, _fecha1, _fecha2,_categoria,_area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	
	/*function Sumatotalcargando(_usu,_fecha,_session){	*/
//	alert('gestion_tickets.php?pagina='+_pag+'&criterio='+_criterio+'&tipo='+_tipo+'&estado='+_estado+'&fecha1='+_fecha1+'&fecha2='+_fecha2);
	
	ajax.open("GET", 'gestion_tickets.php?pagina='+_pag+'&criterio='+_criterio+'&tipo='+_tipo+'&estado='+_estado+'&fecha1='+_fecha1+'&fecha2='+_fecha2+'&categoria='+_categoria+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert(ajax.responseText)
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function reporte(_contenedor, _pag, _criterio, _tipo, _estado, _fecha1, _fecha2,_categoria,_area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	
	/*function Sumatotalcargando(_usu,_fecha,_session){	*/
//	alert('gestion_tickets.php?pagina='+_pag+'&criterio='+_criterio+'&tipo='+_tipo+'&estado='+_estado+'&fecha1='+_fecha1+'&fecha2='+_fecha2);
	
	ajax.open("GET", 'gestion_tickets_r.php?pagina='+_pag+'&criterio='+_criterio+'&tipo='+_tipo+'&estado='+_estado+'&fecha1='+_fecha1+'&fecha2='+_fecha2+'&categoria='+_categoria+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert(ajax.responseText)
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}
function usuarios(_contenedor, _pag, _criterio, _estado, _tipo ){

	var divResultado = document.getElementById('contenido');
	///alert (divResultado)
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_registros.php?pagina='+_pag+'&criterio='+_criterio+'&estado='+_estado+'&tipo='+_tipo);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert(ajax.responseText)
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function externo(_contenedor, _pag, _criterio){

	var divResultado = document.getElementById('contenido');
	///alert (divResultado)
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_externo.php?pagina='+_pag+'&criterio='+_criterio);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert(ajax.responseText)
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}


function personal(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'gestion_personal.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function ingpersonal(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'ingreso_personal.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function are(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'areas.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function distrito(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'distrito.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function estado(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'estado.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function marca(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'marca.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function modelo(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'modelo.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function prioridad(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'prioridad.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function catb(_contenedor, _pag, _criterio, _area){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	*/
	//alert('gestion_personal.php?pagina='+_pag+'&criterio='+_criterio);
	
	ajax.open("GET", 'catb.php?pagina='+_pag+'&criterio='+_criterio+'&area='+_area);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function tipo(_contenedor, _pag, _criterio){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_tipo.php?pagina='+_pag+'&criterio='+_criterio);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function incidencia(_contenedor, _pag, _criterio, _tipo){


	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();

	ajax.open("GET", 'gestion_tipo_incd.php?pagina='+_pag+'&criterio='+_criterio+'&tipo='+_tipo);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert(ajax.responseText)
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}


	function mantenimiento(_contenedor, _pag, _criterio, _tipo, _marca ){

	var divResultado = document.getElementById('contenido');
	///alert (divResultado)
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_mantenimiento.php?pagina='+_pag+'&criterio='+_criterio+'&tipo='+_tipo+'&marca='+_marca);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//alert(ajax.responseText)
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function mantipo(_contenedor, _pag, _criterio){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_mant_tipo.php?pagina='+_pag+'&criterio='+_criterio);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function manmarca(_contenedor, _pag, _criterio){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_mant_marca.php?pagina='+_pag+'&criterio='+_criterio);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function manmodelo(_contenedor, _pag, _criterio){

	var divResultado = document.getElementById('contenido');
	
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'gestion_mant_modelo.php?pagina='+_pag+'&criterio='+_criterio);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}





function ticket(_contenedor){
	var divticket=document.getElementById('ticket');
	var divResultado = document.getElementById('contenido');
	
	divticket.style.display="none"
	divResultado.style.display="Block"

	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'tickets.php?op=add');
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}

function buscarcodigo(_contenedor,_datos)
{
	var divResultado = document.getElementById('datos');
	ajax=objetoAjax();
	/*
	function Sumatotalcargando(_usu,_fecha,_session){	
	alert('js/consulta_accesos2.php?tip='+tipo+'&cod='+divResultado.value+'&val='+obj.value);
	*/
	ajax.open("GET", 'buscardatos.php?op='+_datos);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
		
}

function eliminar(_contenedor,_pag, _criterio, _tipo, _estado, _fecha1, _fecha2,_area,_categoria,_id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'ticket_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			soporte('contenido',_pag, _criterio, _tipo, _estado,_fecha1,_fecha2,_area,_categoria,_id);
		}
	}
	ajax.send(null)
		
}

function eliminar_cliente(_contenedor,_pag, _criterio, _area, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'cliente_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			personal('contenido',_pag, _criterio, _area, _id);
		}
	}
	ajax.send(null)
		
}

function eliminar_incidencias(_contenedor,_pag, _criterio, _tipo, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'incidencias_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			incidencia('contenido',_pag, _criterio, _tipo, _id);
		}
	}
	ajax.send(null)
		
}

function eliminar_usuario(_contenedor,_pag, _criterio, _estado, _tipo, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'usuario_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			usuarios('contenido',_pag, _criterio, _estado, _tipo, _id);
		}
	}
	ajax.send(null)
		
}

function eliminar_externo(_contenedor,_pag, _criterio, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'externo_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			externo('contenido',_pag, _criterio, _id);
		}
	}
	ajax.send(null)
		
}

function eliminar_tipo(_contenedor,_pag, _criterio, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'tipo_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			tipo('contenido',_pag, _criterio,_id);
		}
	}
	ajax.send(null)
		
}

function eliminar_mantipo(_contenedor,_pag, _criterio, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'mantipo_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			mantipo('contenido',_pag, _criterio,_id);
		}
	}
	ajax.send(null)
		
}

function eliminar_manmodelo(_contenedor,_pag, _criterio, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'manmodelo_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			manmodelo('contenido',_pag, _criterio,_id);
		}
	}
	ajax.send(null)
		
}

function eliminar_manmarca(_contenedor,_pag, _criterio, _id )
{
	//alert(_id)
	ajax=objetoAjax();

ajax.open("GET", 'manmarca_eliminar.php?id='+_id);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert ('eliminacion completa');
			manmarca('contenido',_pag, _criterio,_id);
		}
	}
	ajax.send(null)
		
}