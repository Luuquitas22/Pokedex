<?php

$router = require_once __DIR__ . '/app.php';

$action = $_GET['action'] ?? 'mostrarTodo';
$router->dispatch($action);

?>