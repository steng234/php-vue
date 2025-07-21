<?php
require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../vendor/autoload.php';

loadEnv(__DIR__ . '/../.env');

$host     = $_ENV['DB_HOST'] ?? 'localhost';
$username = $_ENV['DB_USERNAME'] ?? 'root';
$password = $_ENV['DB_PASSWORD'] ?? 'password';
$db_name  = $_ENV['DB_NAME'] ?? 'php-vue';

$db = new MysqliDb($host, $username, $password, $db_name);

return $db;
