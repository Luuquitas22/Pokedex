<?php
require_once './modelo/database.php';
require_once './modelo/pokemon.php';
require_once './controlador/pokemonController.php';
require_once './modelo/usuario.php';
require_once './controlador/usuarioController.php';

// Instanciar la base de datos (si no se ha hecho en otro lugar)
$db = new Database();

// Instanciar el modelo y el controlador Pokemon
// Si el modelo de Pokémon ya ha sido instanciado, no lo volvemos a hacer
if (!isset($pokemon)) {
    $pokemon = new Pokemon($db);
}
if (!isset($pokemonController)) {
    $pokemonController = new PokemonController($pokemon);
}
$pokemon = new Pokemon($db);
$pokemonController = new PokemonController($pokemon);
// Iniciar sesión si no se ha hecho
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Instanciar el modelo de usuario y el controlador
$usuario = new Usuario($db);
$usuarioController = new UsuarioController($usuario);
// Verificar si hay una acción en la URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'mostrarTodo';
}
// Si se está intentando acceder a una acción de usuario, usar el controlador de usuario
if (strpos($action, 'usuario') === 0) {
    switch ($action) {
        case 'usuarioRegistrar':
            $usuarioController->registrar();
            break;
        case 'usuarioLogin':
            $usuarioController->login();
            break;
        default:
            echo 'Acción de usuario no válida';
            break;
    }
    exit();
}
// Si no, usar el controlador de Pokémon
if (strpos($action, 'pokemon') === 0) { 
    switch ($action) {
        case 'mostrarTodo':
            $pokemonController->mostrarTodo();
            break;
        case 'crear':
            $pokemonController->agregarPokemon();
            break;
        case 'editar':
            $pokemonController->buscarPokemon();
            break;
        case 'eliminar':
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $pokemonController->eliminarPokemon($id);
            break;
        default:
            echo 'Acción de Pokémon no válida';
            break;
    }
    exit();
}
// Si no se especifica una acción, mostrar todo
if ($action === 'mostrarTodo') {
    $pokemonController->mostrarTodo();
    exit();
}

header('Location: index.php?action=mostrarTodo');
exit();
?>