<?php
require_once __DIR__ . '/../../config/cors.php';

$db = require __DIR__ . '/../../database/db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email non valida']);
    exit;
}

$email = $data['email'];

$db->where('email', $email);
$db->orderBy('date', 'DESC');
$orders = $db->get('orders', 10, ['id', 'description', 'date']);

echo json_encode(['orders' => $orders]);
