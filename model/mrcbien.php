<?php

include_once '../util/config.php';

class Rcproducto {

    public function __construct() {
        $db = new DB_Class();
    }
    function buscar($datei,$datef,$codigo,$serie,$nombres,$catb,$modelo,$marca) {
        setlocale(LC_CTYPE, 'es');
        $sql = "select b.id_bien as bien,
                       b.codigo_bien as codigo,
                       b.serie_bien as serie,
                       b.descripcion_bien as descripcion,
                       b.precio_bien as precio,
                       b.fecha_bien as fecha,
                       b.hora_bien as hora,
                       b.cantidad_bien as cantidad,
                       o.descripcion_modelo as modelo,
                       a.descripcion_marca as marca
         from bien b
            inner join categoriabien c on b.id_catb = c.id_catb
            inner join modelo o on b.id_modelo = o.id_modelo
            inner join marca a on b.id_marca = a.id_marca
         where b.fecha_bien between '$datei' and '$datef'
            and b.codigo_bien like '$codigo%'
            and b.serie_bien like '$serie%'
            and b.descripcion_bien like'$nombres%'
            and c.descripcion_catb like '$catb%'
            and o.descripcion_modelo like '$modelo%'
            and a.descripcion_marca like '$marca%'";
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