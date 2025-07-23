<?php
require_once __DIR__ . '/env.php';
require_once __DIR__ . '/../vendor/autoload.php';

loadEnv(__DIR__ . '/../.env');

header("Access-Control-Allow-Origin:".$_ENV["FRONTEND_URL"]);

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type, Authorization");

header("Content-Type: application/json");

header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
