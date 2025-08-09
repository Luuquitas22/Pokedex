<?php
require_once 'database.php';

class Pokemon {
    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function mostrarBase() {
        $query = "SELECT * FROM pokemon";
        $result = $this->db->query($query);
        return $result;
    }

    function agregarPokemon($numero_id, $nombre, $tipo1, $descripcion, $imagen) {
        $query = "INSERT INTO pokemon VALUES('$numero_id', '$nombre', '$tipo1', '$descripcion', '$imagen')";
        $result = $this->db->query($query);
        return $result;
    }

    function eliminarPokemon($numero_id) {
        $query = "DELETE FROM pokemon WHERE id = '$numero_id'";
        $result = $this->db->query($query);
        return $result;
    }

    function buscarPokemonPorNombre($nombre) {
        $query = "SELECT * FROM pokemon WHERE nombre = '$nombre'";
        $result = $this->db->query($query);
        return $result;
    }

    function buscarPokemonPorTipo($tipo) {
        $query = "SELECT * FROM pokemon WHERE tipo1 = '$tipo'";
        $result = $this->db->query($query);
        return $result;
    }

    function buscarPokemonPorID($id) {
        $query = "SELECT * FROM pokemon WHERE id = '$id'";
        $result = $this->db->query($query);
        return $result;
    }
}
?>