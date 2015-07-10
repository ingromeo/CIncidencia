<?php

include_once '../util/config.php';

class User {

    public function __construct() {
        $db = new DB_Class();
    }

    public function register_user($name, $username, $password, $email) {
        //$password = md5($password);

        $sql = mysql_query("SELECT uid from users WHERE username = '$username' or email = '$email'");
        $no_rows = mysql_num_rows($sql);

        if ($no_rows == 0) {
            $result = mysql_query("INSERT INTO users(username, password, name, email) values ('$username', '$password','$name','$email')") or die(mysql_error());
            return $result;
        } else {
            return FALSE;
        }
    }

    public function login($usuario, $password) {
        //$password = md5($password);

        $result = mysql_query("SELECT u.id_tipousuario tipou,
                                      p.nombres_persona nom,
                                      t.descripcion_tipousuario ad,
                                      u.id_usuario idu
                               FROM usuario u
                                    INNER JOIN persona p ON p.id_persona = u.id_persona
                                    INNER JOIN tipousuario t ON t.id_tipousuario = u.id_tipousuario
                               WHERE u.usu_usuario='$usuario'
                                    and u.pas_usuario = '$password'
                                    and u.estado_usuario = 1");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);

        if ($no_rows == 1) {

            $_SESSION['login'] = true;
            $_SESSION['id_tipousuario'] = $user_data['tipou'];
            $_SESSION["user"] = $user_data['nom'];
            $_SESSION["tipoadm"] = $user_data['ad'];
            $_SESSION["idusu"] = $user_data['idu'];
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_fullname($uid) {
        $result = mysql_query("SELECT name FROM users WHERE uid = $uid");
        $user_data = mysql_fetch_array($result);
        echo $user_data['name'];
    }

    public function get_session() {

        return $_SESSION['login'];
    }

    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

}

?>