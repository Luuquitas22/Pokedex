<?php
require_once './modelo/database.php';
require_once './modelo/pokemon.php';
require_once './controlador/pokemonController.php';
require_once './modelo/usuario.php';
require_once './controlador/usuarioController.php';
require_once './router/router.php';

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db = new Database();
$pokemon = new Pokemon($db);
$usuario = new Usuario($db);

$pokemonController = new PokemonController($pokemon);
$usuarioController = new UsuarioController($usuario);

$router = new Router();

$router->get('mostrarTodo', fn() => $pokemonController->mostrarTodo());
$router->get('crear', fn() => $pokemonController->agregarPokemon());
$router->get('buscar', fn() => $pokemonController->buscarPokemon());
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

return $router;
?>