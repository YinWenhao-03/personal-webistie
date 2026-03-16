<?php

class App {
    private $routes = [];
    private static $instance = null;
    
    public function __construct() {
        self::$instance = $this;
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function run() {
        $this->loadRoutes();
        
        $url = $_SERVER['REQUEST_URI'];
        $this->handleRoute($url);
    }
    
    private function loadRoutes() {
        require_once __DIR__ . '/Routes/web.php';
    }
    
    public function get($route, $callback) {
        $this->routes['GET'][$route] = $callback;
    }
    
    public function post($route, $callback) {
        $this->routes['POST'][$route] = $callback;
    }
    
    private function handleRoute($url) {
        $method = $_SERVER['REQUEST_METHOD'];
        
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $callback) {
                if ($route === $url) {
                    call_user_func($callback);
                    return;
                }
            }
        }
        
        $this->notFound();
    }
    
    private function notFound() {
        http_response_code(404);
        echo '404 Not Found';
    }
}
