<?php

$router = require_once './app.php';

$action = $_GET['action'] ?? 'mostrarTodo';
$router->dispatch($action);

?>