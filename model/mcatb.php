<?php

include_once '../util/config.php';

class Catb {

    public function __construct() {
        $db = new DB_Class();
    }

    function insertarcatb($nombres, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Obtenemos el codigo del siguiente producto
            //$this->codigoProducto =$this->codigoSiguiente($cn);
            //Elaboramos la sentencia
            $sql = "INSERT INTO categoriabien (descripcion_catb, estado_catb)
                                VALUES('$nombres','$estado')";
            //Ejecutamos la sentencia
            $result = mysql_query($sql);
            if (!$result) {
                //Si no obtiene resultados anulamos la transaccion
                mysql_query("ROLLBACK");
                $rpta = false;
            } else {
                //Si obtiene resultados confirmamos la transaccion
                mysql_query("COMMIT");
                $rpta = true;
            }
            //Cerramos la conexion
            //mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_query("ROLLBACK");
            } catch (exception $e1) {
                
            }
            try {
                //mysql_close($cn);
            } catch (exception $e1) {
                
            }
            $rpta = false;
        }
        return $rpta;
    }

    function actualizarcatb($idi, $nombres, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE categoriabien SET descripcion_catb = '$nombres',
                                         estado_catb = '$estado'
                                         WHERE id_catb = $idi";
            //Ejecutamos la sentencia
            $result = mysql_query($sql);
            $rpta;
            if (!$result) {
                //Si no obtiene resultados anulamos la transaccion
                mysql_query("ROLLBACK");
                $rpta = false;
            } else {
                //Si obtiene resultados confirmamos la transaccion
                mysql_query("COMMIT");
                $rpta = true;
            }
            //Cerramos la conexion
            //mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_query("ROLLBACK");
            } catch (exception $e1) {
                
            }
            try {
                //mysql_close($cn);
            } catch (exception $e1) {
                
            }
            $rpta = false;
        }
        return $rpta;
    }

    function eliminarcatb($idi, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE categoriabien SET estado_catb = '$estado'
                                         WHERE id_catb = $idi";
            //Ejecutamos la sentencia
            $result = mysql_query($sql);
            $rpta;
            if (!$result) {
                //Si no obtiene resultados anulamos la transaccion
                mysql_query("ROLLBACK");
                $rpta = false;
            } else {
                //Si obtiene resultados confirmamos la transaccion
                mysql_query("COMMIT");
                $rpta = true;
            }
            //Cerramos la conexion
            //mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_query("ROLLBACK");
            } catch (exception $e1) {
                
            }
            try {
                //mysql_close($cn);
            } catch (exception $e1) {
                
            }
            $rpta = false;
        }
        return $rpta;
    }

    function buscarcatb($id) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM categoriabien WHERE id_catb=$id";
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Ejecutamos la sentencia
            $rs = mysql_query($sql);
            //Creamos un array que almacenara los datos de la sentencia
            $registros = array();
            //Recorremos el resultado de la consulta y lo almacenamos en el array
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            //Liberamos recursos
            mysql_free_result($rs);
            //mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_free_result($rs);
            } catch (exception $e) {
                
            }
            try {
                //mysql_close($cn);
            } catch (exception $e) {
                
            }
        }
        return $registros;
    }

    function listar() {

        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM categoriabien WHERE estado_catb = 1";
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Ejecutamos la sentencia
            $rs = mysql_query($sql);
            //Creamos un array que almacenara los datos de la sentencia
            $registros = array();
            //Recorremos el resultado de la consulta y lo almacenamos en el array
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            //Liberamos recursos
            mysql_free_result($rs);
            //mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_free_result($rs);
            } catch (exception $e) {
                
            }
            try {
                //mysql_close($cn);
            } catch (exception $e) {
                
            }
        }
        return $registros;
    }

//listar persona    
}

?>