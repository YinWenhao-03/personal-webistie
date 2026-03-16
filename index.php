<?php

// 自动加载
require_once __DIR__ . '/config/autoload.php';

// 加载 App 类
require_once __DIR__ . '/app/App.php';

// 初始化应用
$app = new App();
$app->run();
