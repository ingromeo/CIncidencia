<?php

include_once '../util/config.php';

class Distrito {

    public function __construct() {
        $db = new DB_Class();
    }

    function insertardistrito($nombres, $estado) {
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
            $sql = "INSERT INTO distrito (descripcion_distrito, estado_distrito)
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

    function actualizardistrito($idi, $nombres, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE distrito SET descripcion_distrito = '$nombres',
                                         estado_distrito = '$estado'
                                         WHERE id_distrito = $idi";
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

    function eliminardistrito($idi, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE distrito SET estado_distrito = '$estado'
                                         WHERE id_distrito = $idi";
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

    function buscardistrito($id) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM distrito WHERE id_distrito=$id";
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
        $sql = "SELECT * FROM distrito WHERE estado_distrito = 1";
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