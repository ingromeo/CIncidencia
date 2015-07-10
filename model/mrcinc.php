<?php

include_once '../util/config.php';

class Rcinc {

    public function __construct() {
        $db = new DB_Class();
    }
    function buscar($datei,$datef,$cati, $asu, $responsable, $estado, $prioridad) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select i.id_incidencia as incidenciainc,
                i.descripcion_incidencia as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                i.cliente_incidencia as cliente,
                i.tresponsable_incidencia as responsable,
                e.descripcion_estado as estado,
                d.descripcion_diagnostico as diag
         from incidencia i inner join asuntoincidencia ai on i.id_asuinc = ai.id_asuinc
              inner join categoriaincidencia ci on ci.id_catinc = ai.id_catinc
              inner join estado e on e.id_estado = i.id_estado
              inner join prioridad p on p.id_prioridad = i.id_prioridad
              inner join diagnostico d on d.id_diagnostico = i.id_incidencia
         where i.tipo_incidencia = 'incidencia' and
              ai.id_asuinc = '$asu' and ci.id_catinc = '$cati' and
              i.tresponsable_incidencia = '$responsable' and
              e.id_estado = '$estado' and p.id_prioridad = '$prioridad' and
              i.ffin_incidencia between '$datei' and '$datef'";
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