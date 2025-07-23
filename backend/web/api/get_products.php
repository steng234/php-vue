<?php
require_once __DIR__ . '/../../config/cors.php';
$db = require __DIR__ . '/../../database/db.php';

// order results by product title
$db->orderBy('i.title', 'ASC');

// Join with brand and category
$db->join('brand b', 'b.id = i.brand_id', 'LEFT');
$db->join('category c', 'c.id = i.category_id', 'LEFT');

// Fetch products
$products = $db->get('items i', null, [
    'i.id',
    'i.title',
    'i.description',
    'i.price',
    'b.name AS brand',
    'c.name AS category'
]);

// Respond with JSON
echo json_encode([
    'products' => $products
]);
