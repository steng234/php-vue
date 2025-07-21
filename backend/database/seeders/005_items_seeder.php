<?php
$db = require __DIR__ . '/../db.php';

$items = [
    // Elettronica - Apple
    [
        'title' => 'iPhone 15 Pro',
        'description' => 'Smartphone Apple con chip A17 Pro, fotocamera professionale e design in titanio',
        'price' => 1199.00,
        'brand_id' => 1, // Apple
        'category_id' => 1 // Elettronica
    ],
    [
        'title' => 'MacBook Air M2',
        'description' => 'Laptop ultraleggero con chip Apple M2, display Liquid Retina da 13.6"',
        'price' => 1499.00,
        'brand_id' => 1, // Apple
        'category_id' => 1 // Elettronica
    ],
    // Elettronica - Samsung
    [
        'title' => 'Samsung Galaxy S24 Ultra',
        'description' => 'Smartphone premium con S Pen integrata e fotocamera da 200MP',
        'price' => 1299.00,
        'brand_id' => 2, // Samsung
        'category_id' => 1 // Elettronica
    ],
    // Sport - Nike
    [
        'title' => 'Nike Air Max 270',
        'description' => 'Sneakers con tecnologia Air Max per massimo comfort e stile',
        'price' => 150.00,
        'brand_id' => 3, // Nike
        'category_id' => 3 // Sport e Fitness
    ],
    [
        'title' => 'Nike Dri-FIT T-Shirt',
        'description' => 'Maglietta sportiva traspirante con tecnologia Dri-FIT',
        'price' => 35.00,
        'brand_id' => 3, // Nike
        'category_id' => 3 // Sport e Fitness
    ],
    // Sport - Adidas
    [
        'title' => 'Adidas Ultraboost 22',
        'description' => 'Scarpe da running con tecnologia Boost per energia infinita',
        'price' => 180.00,
        'brand_id' => 4, // Adidas
        'category_id' => 3 // Sport e Fitness
    ],
    // Elettronica - Sony
    [
        'title' => 'Sony WH-1000XM5',
        'description' => 'Cuffie wireless con cancellazione del rumore leader del settore',
        'price' => 399.00,
        'brand_id' => 5, // Sony
        'category_id' => 1 // Elettronica
    ],
    // Elettronica - Microsoft
    [
        'title' => 'Microsoft Surface Pro 9',
        'description' => 'Tablet 2-in-1 con processore Intel Core i7 e display PixelSense',
        'price' => 1299.00,
        'brand_id' => 6, // Microsoft
        'category_id' => 1 // Elettronica
    ],
    // Elettronica - Dell
    [
        'title' => 'Dell XPS 13',
        'description' => 'Laptop ultrabook con display InfinityEdge e prestazioni premium',
        'price' => 999.00,
        'brand_id' => 7, // Dell
        'category_id' => 1 // Elettronica
    ],
    // Elettronica - HP
    [
        'title' => 'HP Spectre x360',
        'description' => 'Laptop convertibile 2-in-1 con display touchscreen 4K',
        'price' => 1199.00,
        'brand_id' => 8, // HP
        'category_id' => 1 // Elettronica
    ]
];

foreach ($items as $item) {
    $id = $db->insert('items', $item);
    if ($id) {
        echo "Inserito item #$id: {$item['title']} - €{$item['price']}\n";
    } else {
        echo "Errore nell'inserimento item {$item['title']}: " . $db->getLastError() . "\n";
    }
}
?>