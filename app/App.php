<?php

class App {
    private $routes = [];
    
    public function __construct() {
        // 加载路由
        $this->loadRoutes();
    }
    
    public function run() {
        // 获取当前请求的 URL
        $url = $_SERVER['REQUEST_URI'];
        
        // 处理路由
        $this->handleRoute($url);
    }
    
    private function loadRoutes() {
        // 加载路由文件
        require_once __DIR__ . '/Routes/web.php';
    }
    
    public function get($route, $callback) {
        $this->routes['GET'][$route] = $callback;
    }
    
    public function post($route, $callback) {
        $this->routes['POST'][$route] = $callback;
    }
    
    private function handleRoute($url) {
        // 获取请求方法
        $method = $_SERVER['REQUEST_METHOD'];
        
        // 检查路由是否存在
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $callback) {
                // 简单的路由匹配
                if ($route === $url) {
                    call_user_func($callback);
                    return;
                }
            }
        }
        
        // 404 页面
        $this->notFound();
    }
    
    private function notFound() {
        http_response_code(404);
        echo '404 Not Found';
    }
}
