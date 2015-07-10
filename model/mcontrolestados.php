<?php
include_once '../util/config.php';

class Controlestados {

    public function __construct() {
        $db = new DB_Class();
    }

    function buscarcontrolestados($tabla, $des) {
        setlocale(LC_CTYPE, 'es');
        $sql = "SELECT * FROM $tabla";
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
        }
        return $registros;
    }
   
}
?>