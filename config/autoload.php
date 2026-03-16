<?php

// 自动加载类
function autoload($class) {
    $path = str_replace('\\', '/', $class);
    $file = __DIR__ . '/../' . $path . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
}

// 注册自动加载函数
spl_autoload_register('autoload');
