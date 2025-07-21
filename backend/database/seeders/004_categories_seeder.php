<?php
$db = require __DIR__ . '/../db.php';

$categories = [
    [
        'name' => 'Elettronica',
        'description' => 'Dispositivi elettronici, smartphone, tablet, computer'
    ],
    [
        'name' => 'Abbigliamento',
        'description' => 'Vestiti, accessori moda e abbigliamento per tutte le età'
    ],
    [
        'name' => 'Sport e Fitness',
        'description' => 'Articoli sportivi, attrezzature per il fitness e abbigliamento sportivo'
    ],
    [
        'name' => 'Casa e Giardino',
        'description' => 'Articoli per la casa, arredamento e giardinaggio'
    ],
    [
        'name' => 'Libri e Media',
        'description' => 'Libri, ebook, film, musica e contenuti multimediali'
    ],
    [
        'name' => 'Salute e Bellezza',
        'description' => 'Prodotti per la cura personale, cosmetici e salute'
    ],
    [
        'name' => 'Auto e Moto',
        'description' => 'Accessori per auto e moto, ricambi e attrezzature'
    ],
    [
        'name' => 'Giocattoli',
        'description' => 'Giocattoli per bambini di tutte le età, giochi educativi'
    ]
];

foreach ($categories as $category) {
    $id = $db->insert('category', $category);
    if ($id) {
        echo "Inserita categoria #$id: {$category['name']}\n";
    } else {
        echo "Errore nell'inserimento categoria {$category['name']}: " . $db->getLastError() . "\n";
    }
}
?>