<?php
$db = require __DIR__ . '/../db.php';

$orderItems = [
    // Ordine 1 - Mario Rossi
    [
        'product_id' => 1, // iPhone 15 Pro
        'orders_id' => 1,
        'quantity' => 1
    ],
    [
        'product_id' => 7, // Sony WH-1000XM5
        'orders_id' => 1,
        'quantity' => 1
    ],
    
    // Ordine 2 - Giulia Bianchi (regalo)
    [
        'product_id' => 4, // Nike Air Max 270
        'orders_id' => 2,
        'quantity' => 1
    ],
    [
        'product_id' => 5, // Nike Dri-FIT T-Shirt
        'orders_id' => 2,
        'quantity' => 2
    ],
    
    // Ordine 3 - Luca Verdi
    [
        'product_id' => 2, // MacBook Air M2
        'orders_id' => 3,
        'quantity' => 1
    ],
    
    // Ordine 4 - Anna Neri
    [
        'product_id' => 6, // Adidas Ultraboost 22
        'orders_id' => 4,
        'quantity' => 1
    ],
    [
        'product_id' => 5, // Nike Dri-FIT T-Shirt
        'orders_id' => 4,
        'quantity' => 1
    ],
    
    // Ordine 5 - Mario Rossi (secondo ordine)
    [
        'product_id' => 8, // Microsoft Surface Pro 9
        'orders_id' => 5,
        'quantity' => 1
    ],
    [
        'product_id' => 9, // Dell XPS 13
        'orders_id' => 5,
        'quantity' => 1
    ],
    
    // Ordine 6 - Giulia Bianchi (aziendale)
    [
        'product_id' => 10, // HP Spectre x360
        'orders_id' => 6,
        'quantity' => 3
    ],
    [
        'product_id' => 3, // Samsung Galaxy S24 Ultra
        'orders_id' => 6,
        'quantity' => 2
    ]
];

foreach ($orderItems as $orderItem) {
    $id = $db->insert('order_items', $orderItem);
    if ($id) {
        echo "Inserito item #$id nell'ordine #{$orderItem['orders_id']}: Prodotto #{$orderItem['product_id']} x{$orderItem['quantity']}\n";
    } else {
        echo "Errore nell'inserimento order_item: " . $db->getLastError() . "\n";
    }
}
?>