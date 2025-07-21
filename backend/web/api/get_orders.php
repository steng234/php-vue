<?php
require_once __DIR__ . '/../../config/cors.php';
$db = require __DIR__ . '/../../database/db.php';

// Read and validate input
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email non valida']);
    exit;
}

$email = $data['email'];

// Get user by email
$user = $db->where('email', $email)->getOne('user');
if (!$user) {
    http_response_code(404);
    echo json_encode(['error' => 'Utente non trovato']);
    exit;
}

// Fetch orders with joined products (items)
$db->where('orders.user_id', $user['id']);
$db->orderBy('orders.created_at', 'DESC');
$db->join('order_items oi', 'oi.orders_id = orders.id', 'LEFT');
$db->join('items i', 'i.id = oi.product_id', 'LEFT');
$db->join('brand b', 'b.id = i.brand_id', 'LEFT');
$db->join('category c', 'c.id = i.category_id', 'LEFT');

$results = $db->get('orders', null, [
    'orders.id AS order_id',
    'orders.note',
    'orders.created_at',
    'oi.quantity',
    'i.title AS item_title',
    'i.price',
    'b.name AS brand_name',
    'c.name AS category_name'
]);

echo json_encode([
    'user' => [
        'id' => $user['id'],
        'name' => $user['name'],
        'surname' => $user['surname'],
        'email' => $user['email']
    ],
    'orders' => $results
]);
