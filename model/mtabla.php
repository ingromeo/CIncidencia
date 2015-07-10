<?php
include_once '../util/config.php';

class Por {

    public function __construct() {
        $db = new DB_Class();
    }
    
    function buscar($codigo) {
        setlocale(LC_CTYPE, 'es');
        $sql = "SELECT i.tresponsable_incidencia as responsable,
                c.descripcion_catinc as catinc,
                a.descripcion_asuinc as asuinc,
                d.fecha_diagnostico as fecha,
                d.hora_diagnostico as hora,
                i.id_incidencia as codigoinc,
                d.descripcion_diagnostico as diagn
         FROM incidencia i     
              inner join diagnostico d on d.id_incidencia = i.id_incidencia
              inner join asuntoincidencia a on a.id_asuinc = i.id_asuinc
              inner join categoriaincidencia c on c.id_catinc = a.id_catinc
         WHERE d.descripcion_diagnostico like '$codigo%'";
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