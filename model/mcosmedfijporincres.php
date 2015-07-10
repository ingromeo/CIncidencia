<?php
include_once '../util/config.php';

class Por {

    public function __construct() {
        $db = new DB_Class();
    }
    
    function buscar($datei,$datef) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select i.id_incidencia as incidenciainc,
                substring(i.descripcion_incidencia, 1, 30) as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                substring(ca.descripcion_catinc, 1, 12) as cinc,
                substring(i.cliente_incidencia, 1, 20) as cliente,
                substring(i.tresponsable_incidencia, 1, 20) as responsable,
                e.descripcion_estado as tipoinc,                
                (((select pe.sueldo_persona from persona pe inner join usuario us on pe.id_persona = us.id_persona where us.id_usuario = i.responsable_incidencia)/864000) * (time_to_sec(timediff(TIMESTAMP(i.ffin_incidencia,i.hfin_incidencia), TIMESTAMP(i.fini_incidencia,i.hini_incidencia))))) as costo
         from incidencia i inner join estado e on i.id_estado = e.id_estado
                           inner join asuntoincidencia ai on ai.id_asuinc = i.id_asuinc
                           inner join categoriaincidencia ca on ca.id_catinc = ai.id_catinc
                           inner join usuario u on u.id_usuario = i.id_usuario
                           inner join persona p on p.id_persona = u.id_usuario
         where i.id_estado='5' and ffin_incidencia between '$dtei' and '$datef'";
         //i.id_estado='5' and 
        try {
            $rs = mysql_query($sql);
            $registros = array();
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            mysql_free_result($rs);
        } catch (exception $e) {
            try {
                mysql_free_result($rs);
            } catch (exception $e) {
                
            }
            try {
            } catch (exception $e) {
                
            }
        }
        return $registros;
    }
   
    function listarresueltas($datei,$datef) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select count(*) as registros from incidencia where id_estado='5' and ffin_incidencia between '$datei' and '$datef'";
        try {
            $rs = mysql_query($sql);
            $registros = array();
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            mysql_free_result($rs);
        } catch (exception $e) {
            try {mysql_free_result($rs);
            } catch (exception $e) {                
            }
        }
        return $registros;
    }
    
    function listartotales($datei,$datef) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select sum((((select pe.sueldo_persona from persona pe inner join usuario us on pe.id_persona = us.id_persona where us.id_usuario = i.responsable_incidencia)/864000) * (time_to_sec(timediff(TIMESTAMP(i.ffin_incidencia,i.hfin_incidencia), TIMESTAMP(i.fini_incidencia,i.hini_incidencia)))))) as sueldo
         from incidencia i inner join estado e on i.id_estado = e.id_estado                           
                           inner join usuario u on u.id_usuario = i.id_usuario
                           inner join persona p on p.id_persona = u.id_usuario
         where i.id_estado='5' and i.ffin_incidencia between '$datei' and '$datef'";
         // i.id_estado='5' and
        try {
            $rs = mysql_query($sql);
            $registros = array();
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            mysql_free_result($rs);
        } catch (exception $e) {
            try {mysql_free_result($rs);
            } catch (exception $e) {                
            }
        }
        return $registros;
    }

//listar persona    
}

?>