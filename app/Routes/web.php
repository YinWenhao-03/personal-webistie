<?php

$app = App::getInstance();

// 首页路由
$app->get('/', function() {
    echo 'Welcome to PHP Portfolio!';
});

// 关于页面路由
$app->get('/about', function() {
    echo 'About Page';
});

// 博客页面路由
$app->get('/blog', function() {
    echo 'Blog Page';
});

// 作品页面路由
$app->get('/works', function() {
    echo 'Works Page';
});

// 管理后台路由
$app->get('/admin', function() {
    echo 'Admin Panel';
});
