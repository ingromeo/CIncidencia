<?php

include_once '../util/config.php';

class Rcproducto {

    public function __construct() {
        $db = new DB_Class();
    }
    function buscar($datei,$datef,$codigo) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select i.id_incidencia as incidenciainc,
                i.descripcion_incidencia as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                i.canal_incidencia as canal,
                i.cliente_incidencia as cliente,
                i.tresponsable_incidencia as responsable,
                i.tipo_incidencia as tipoinc,
                b.id_bien as bien,
                b.codigo_bien as codigo,
                b.serie_bien as serie,
                b.descripcion_bien as descripcion,
                b.fecha_bien as fecha,
                b.hora_bien as hora
         from incidencia i
              inner join bien b on i.id_bien = b.id_bien         
         where i.fini_incidencia between '$datei' and '$datef'
            and b.codigo_bien like '$codigo%'";
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
}
?>