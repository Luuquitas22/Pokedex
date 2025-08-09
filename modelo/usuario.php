<?php
require_once 'database.php';

class Usuario {
    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function registrarUsuario($username, $password, $email) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO usuarios (nombre, contrasena, email) VALUES ('$username', '$hashed_password', '$email')";
        $result = $this->db->query($query);
        return $result;
    }

    function verificarUsuario($username, $password) {
        $query = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $this->db->query($query);
        if ($result && count($result) > 0) {
            $user = $result[0];
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }
        return false;
    }
}
?>