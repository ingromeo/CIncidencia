<?php

include_once '../util/config.php';

class usuario {

    public function __construct() {
        $db = new DB_Class();
    }

    function insertarusuario($usuario, $clave, $estado, $area, $persona, $tusuario, $nivel) {
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
            $sql = "INSERT INTO usuario (usu_usuario,pas_usuario,estado_usuario,
                                         id_areas,id_persona,id_tipousuario,id_nivel)
                                VALUES('$usuario','$clave','$estado',$area,$persona,$tusuario,$nivel)";
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

    function actualizarusuario($idi, $usuario, $clave, $estado, $area, $persona, $tusuario, $nivel) {
        $rpta;
        try {
            mysql_query("BEGIN");
            $sql = "UPDATE usuario SET usu_usuario = '$usuario',
                                       pas_usuario = '$clave',                                       
                                       estado_usuario = '$estado',
                                       id_areas = $area,
                                       id_persona = $persona,
                                       id_tipousuario = $tusuario,
                                       id_nivel = $nivel
                                       WHERE id_usuario = $idi";
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

    function eliminarusuario($idi, $estado) {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            //$miconexion = new Conexion();
            //Obtenemos la conexion
            //$cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN");
            //Elaboramos la sentencia
            $sql = "UPDATE usuario SET estado_usuario = '$estado'
                                         WHERE id_usuario = $idi";
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

    function buscarusuario($id) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM usuario WHERE id_usuario=$id";
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
        $sql = "SELECT u.id_usuario as codigo, u.usu_usuario as usuario, tu.descripcion_tipousuario as tipo
                FROM usuario u INNER JOIN tipousuario tu ON u.id_tipousuario = tu.id_tipousuario
                WHERE u.estado_usuario = 1";
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

//listar usuario

    function listararea() {

        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM areas WHERE estado_areas = 1";
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

//listar usuario

    function listarpersona() {

        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM persona WHERE estado_persona = 1";
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

//listar usuario

    function listartusuario() {

        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM tipousuario WHERE estado_tipousuario = 1";
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
//listar usuario

    function listarnivel() {

        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM nivel WHERE estado_nivel = 1";
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
//listar usuario
}

?>