<?php

include_once '../util/config.php';

class Marca {

    public function __construct() {
        $db = new DB_Class();
    }

    function insertarmarca($nombres, $estado) {
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
            $sql = "INSERT INTO marca (descripcion_marca, estado_marca)
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

    function actualizarmarca($idi, $nombres, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE marca SET descripcion_marca = '$nombres',
                                         estado_marca = '$estado'
                                         WHERE id_marca = $idi";
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

    function eliminarmarca($idi, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE marca SET estado_marca = '$estado'
                                         WHERE id_marca = $idi";
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

    function buscarmarca($id) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM marca WHERE id_marca=$id";
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
        $sql = "SELECT * FROM marca WHERE estado_marca = 1";
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