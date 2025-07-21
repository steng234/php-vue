<?php
$db = require __DIR__ . '/../db.php';

$brands = [
    [
        'name' => 'Apple',
        'description' => 'Prodotti tecnologici e dispositivi elettronici innovativi'
    ],
    [
        'name' => 'Samsung',
        'description' => 'Azienda sudcoreana leader in elettronica e tecnologia'
    ],
    [
        'name' => 'Nike',
        'description' => 'Brand sportivo mondiale per abbigliamento e calzature'
    ],
    [
        'name' => 'Adidas',
        'description' => 'Marchio tedesco specializzato in articoli sportivi'
    ],
    [
        'name' => 'Sony',
        'description' => 'Multinazionale giapponese di elettronica e intrattenimento'
    ],
    [
        'name' => 'Microsoft',
        'description' => 'Azienda tecnologica americana leader nel software'
    ],
    [
        'name' => 'Dell',
        'description' => 'Produttore americano di computer e tecnologie'
    ],
    [
        'name' => 'HP',
        'description' => 'Hewlett-Packard, azienda americana di tecnologia'
    ]
];

foreach ($brands as $brand) {
    $id = $db->insert('brand', $brand);
    if ($id) {
        echo "Inserito brand #$id: {$brand['name']}\n";
    } else {
        echo "Errore nell'inserimento brand {$brand['name']}: " . $db->getLastError() . "\n";
    }
}
?>