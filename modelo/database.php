<?php

class Database {
    private $servername;
    private $username;
    private $password;
    private $database;
    private $conn;
    private $port;

    public function __construct(){
        // Cargar la configuración
        $config = require 'config.php';

        $this->servername = $config['database']['hostname'];
        $this->username = $config['database']['username'];
        $this->password = $config['database']['password'];
        $this->database = $config['database']['database'];
        $this->port = $config['database']['port'];
        // Conectar a la base de datos
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database,$this->port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function cerrarConeccion(){
        return $this->conn->close();
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if ($result === false) {
            // Puedes lanzar una excepción o devolver false
            return false;
        }
        // Si es un SELECT, devuelve los resultados
        if (stripos($sql, 'SELECT') === 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        // Si es un INSERT, UPDATE o DELETE, devuelve true/false
        return $result;
    }
}