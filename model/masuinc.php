<?php

include_once '../util/config.php';

class asuinc {

    public function __construct() {
        $db = new DB_Class();
    }

    function insertarasuinc($nombres, $estado, $catinc) {
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
            $sql = "INSERT INTO asuntoincidencia (descripcion_asuinc,estado_asuinc,id_catinc)
                                VALUES('$nombres','$estado',$catinc)";
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

    function actualizarasuinc($id, $nombres, $estado, $catinc) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE asuntoincidencia SET descripcion_asuinc = '$nombres',
                                                estado_asuinc = '$estado',
                                                id_catinc = $catinc
                                                WHERE id_asuinc = $id";
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

    function eliminarasuinc($idi, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE asuntoincidencia SET estado_asuinc = '$estado'
                                         WHERE id_asuinc = $idi";
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

    function buscarasuinc($id) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM asuntoincidencia WHERE id_asuinc=$id";
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
        $sql = "SELECT * FROM asuntoincidencia WHERE estado_asuinc = 1";
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

//listar asuinc

    function listarcatinc() {

        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM categoriaincidencia WHERE estado_catinc = 1";
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

//listar asuinc
}

?>