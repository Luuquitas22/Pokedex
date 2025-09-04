<?php
require_once __DIR__ . '/../modelo/pokemon.php';

class PokemonController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function mostrarTodo() {
        return $this->model->mostrarBase();
    }

    public function eliminarPokemon($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->model->eliminarPokemon($id);
            header('Location: index.php?action=mostrarTodo');
            exit();
        } else {
            $this->mostrarTodo();
        }
    }

    public function buscarPokemon() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $busqueda = $_POST['busqueda'] ?? '';
            $pokemones = [];
            $pokemones = array_merge($pokemones, $this->model->buscarPokemonPorNombre($busqueda));
            $pokemones = array_merge($pokemones, $this->model->buscarPokemonPorTipo($busqueda));
            if (is_numeric($busqueda)) {
                $pokemones = array_merge($pokemones, $this->model->buscarPokemonPorID($busqueda));
            }
            $pokemones = array_unique($pokemones, SORT_REGULAR);
            return $pokemones;
        } else {
            $this->mostrarTodo();
        }
    }

    public function agregarPokemon() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_pokemon = $_POST['nombre'];
            $tipo_pokemon = $_POST['tipo'];
            $pokemon_id = $_POST['numero_id'];
            $imagen_pokemon = $_POST['imagen'];
            $descripcion_pokemon = $_POST['descripcion'];
            $this->model->agregarPokemon($pokemon_id, $nombre_pokemon, $tipo_pokemon, $descripcion_pokemon, $imagen_pokemon);
            header('Location: index.php?action=mostrarTodo');
            exit();
        } else {
            $this->mostrarTodo();
        }
    }
}
?>