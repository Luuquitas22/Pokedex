<?php
require_once __DIR__ . '/../modelo/usuario.php';

class UsuarioController {
    private $model;

    public function __construct(Usuario $model) {
        $this->model = $model;
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if ($this->model->registrarUsuario($username, $password, $email)) {
                header('Location: ../vista/login.php');
                exit();
            } else {
                echo "Error al registrar el usuario.";
            }
        } else {
            require '../vista/registrarse.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->model->verificarUsuario($username, $password)) {
                session_start();
                $_SESSION['username'] = $username;
                header('Location: /index.php?action=mostrarTodo');
                exit();
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        } else {
            require '../vista/login.php';
        }
    }

    public function recuperarContrasena() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identificador = $_POST['identificador'];
            $nuevaContrasena = $_POST['password'];
            $usuario = $this->model->buscarPorNombreOEmail($identificador);
            if ($usuario) {
                $this->model->actualizarContrasena($usuario['id'], $nuevaContrasena);
                echo "Contraseña actualizada correctamente.";
                header('Location: ../vista/login.php');
            } else {
                echo "Usuario o email no encontrado.";
            }
        } else {
            require '../vista/recuperarContrasena.php';
        }
    }
}
?>