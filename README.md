# PHP Portfolio 项目

这是一个基于 PHP 开发的个人作品集网站项目。

## 项目结构

```
php-portfolio/
├── app/
│   ├── Controllers/     # 控制器
│   ├── Models/          # 模型
│   ├── Views/           # 视图
│   ├── Routes/          # 路由
│   ├── App.php          # 应用核心类
│   └── Database.php     # 数据库连接类
├── config/
│   ├── autoload.php     # 自动加载配置
│   └── database.php     # 数据库配置
├── database/
│   └── init.sql         # 数据库初始化脚本
├── public/
│   └── index.php        # 公共入口
└── index.php            # 主入口
```

## 功能特性

- 个人作品集展示
- 博客系统
- 管理后台
- 用户认证
- 数据库连接

## 环境要求

- PHP 7.4+
- MySQL 5.7+

## 安装步骤

1. 克隆项目到本地

2. 配置数据库连接
   - 编辑 `config/database.php` 文件，设置数据库连接信息

3. 初始化数据库
   - 执行 `database/init.sql` 脚本创建表结构

4. 启动服务器
   - 使用 PHP 内置服务器：`php -S localhost:8000`
   - 或使用 Apache/Nginx 服务器

## 访问地址

- 首页：http://localhost:8000
- 管理后台：http://localhost:8000/admin

## 默认管理员账号

- 用户名：yinwenhao
- 密码：20030822yin

## 开发指南

### 添加新路由

在 `app/Routes/web.php` 文件中添加新的路由规则：

```php
$app->get('/new-route', function() {
    echo 'New Route';
});
```

### 添加新模型

在 `app/Models/` 目录下创建新的模型文件，例如 `Category.php`：

```php
<?php

class Category {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    // 添加模型方法
}
```

### 添加新控制器

在 `app/Controllers/` 目录下创建新的控制器文件，例如 `HomeController.php`：

```php
<?php

class HomeController {
    public function index() {
        // 处理首页请求
    }
}
```

## 注意事项

- 本项目使用 PDO 进行数据库操作，确保数据库连接信息正确
- 本项目为基础框架，可根据需要进行扩展和定制
- 生产环境建议使用 Apache/Nginx 服务器，并配置虚拟主机
