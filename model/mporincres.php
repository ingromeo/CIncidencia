<?php
include_once '../util/config.php';

class Por {

    public function __construct() {
        $db = new DB_Class();
    }
    
    function buscar($datei,$datef) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select i.id_incidencia as incidenciainc,
                i.descripcion_incidencia as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                ca.descripcion_catinc as cinc,
                i.cliente_incidencia as cliente,
                i.tresponsable_incidencia as responsable,
                e.descripcion_estado as tipoinc
         from incidencia i inner join estado e on i.id_estado = e.id_estado
         inner join asuntoincidencia ai on ai.id_asuinc = i.id_asuinc
                       inner join categoriaincidencia ca on ca.id_catinc = ai.id_catinc
         where ffin_incidencia between '$datei' and '$datef'";
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

    function listarnoresueltas($datei,$datef) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select count(*) as noresueltas from incidencia where id_estado IN ('5') and ffin_incidencia between '$datei' and '$datef'";
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
    
    function listarresueltas($datei,$datef) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select count(*) as registros from incidencia where ffin_incidencia between '$datei' and '$datef'";
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
        $sql = "select (((select count(*) from incidencia where id_estado IN ('5') and ffin_incidencia between '$datei' and '$datef') / (select count(*) from incidencia where ffin_incidencia between '$datei' and '$datef'))*(100)) totales from incidencia where id_estado IN ('5') and ffin_incidencia between '$datei' and '$datef'";
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