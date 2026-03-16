#!/bin/bash

# PHP Portfolio 部署脚本

cd /www/wwwroot/49.235.142.13813

mysql -uroot -pYH2RS46awfxtMeSb blog < database/init.sql

chmod -R 755 .
chmod -R 777 storage 2>/dev/null || true
chmod -R 777 cache 2>/dev/null || true
chmod -R 777 uploads 2>/dev/null || true

systemctl restart php-fpm

echo "部署完成！"
