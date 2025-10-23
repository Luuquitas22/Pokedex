<?php
require_once __DIR__. '/database.php';

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
        $query = "SELECT * FROM usuarios WHERE nombre = '$username'";
        $result = $this->db->query($query);
        if ($result && count($result) > 0) {
            $user = $result[0];
            if (password_verify($password, $user['contrasena'])) {
                return true;
            }
        }
        return false;
    }

    function recuperarContrasena($email) {
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $this->db->query($query);
        if ($result && count($result) > 0) {
            return $result[0];
        }
        return null;
    }

    public function buscarPorNombreOEmail($identificador) {
        $conn = $this->db->getConnection();
        $identificador = mysqli_real_escape_string($conn, $identificador);
        $query = "SELECT * FROM usuarios WHERE nombre = '$identificador' OR email = '$identificador' LIMIT 1";
        $result = $this->db->query($query);
        return !empty($result) ? $result[0] : null;
    }

    public function actualizarContrasena($id, $nuevaContrasena) {
        $conn = $this->db->getConnection();
        $hashed_password = password_hash($nuevaContrasena, PASSWORD_BCRYPT);
        $hashed_password = mysqli_real_escape_string($conn, $hashed_password);
        $query = "UPDATE usuarios SET contrasena = '$hashed_password' WHERE id = $id";
        return $this->db->query($query);
    }
}
?>