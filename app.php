<?php
require_once __DIR__ . '/modelo/database.php';
require_once __DIR__ . '/modelo/pokemon.php';
require_once __DIR__ . '/controlador/pokemonController.php';
require_once __DIR__ . '/modelo/usuario.php';
require_once __DIR__ . '/controlador/usuarioController.php';
require_once __DIR__ . '/router/router.php';

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new Database();
$pokemon = new Pokemon($db);
$usuario = new Usuario($db);

$pokemonController = new PokemonController($pokemon);
$usuarioController = new UsuarioController($usuario);

$router = new Router();

$router->get('mostrarTodo', function() use ($pokemonController) {
    $pokemones = $pokemonController->mostrarTodo();
    mostrarVista($pokemones);
});

$router->get('crear', fn() => $pokemonController->agregarPokemon());
$router->get('buscar', function() use ($pokemonController) {
    $pokemones = $pokemonController->buscarPokemon();
    mostrarVista($pokemones);
});
$router->get('eliminar', function() use ($pokemonController) {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $pokemonController->eliminarPokemon($id);
    } else {
        echo 'ID de Pokémon no proporcionado';
    }
});
$router->get('usuarioRegistrar', fn() => $usuarioController->registrar());
$router->get('usuarioLogin', fn() => $usuarioController->login());
$router->get('recuperarContrasena', fn() => $usuarioController->recuperarContrasena());
$router->get('cerrarSesion', function() {
    session_unset();
    session_destroy();
    header('Location: /index.php');
    exit();
});

function mostrarVista($pokemones) {
    if (isset($_SESSION['username'])) {
        require __DIR__ . '/vista/home.php';
    } else {
        require __DIR__ . '/vista/pokedex.php';
    }
}

return $router;
?>