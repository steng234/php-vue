<?php
header("Access-Control-Allow-Origin: http://localhost:5174");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type, Authorization");

header("Content-Type: application/json");

header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
