<?php
  class Router {
    private $routes = [];

    public function get($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function dispatch($action) {
        if(isset($this->routes[$action])) {
            $callback = $this->routes[$action];
            $callback();
        } else{
            echo 'Acción no válida';
            exit();
        }
    }
  }
?>