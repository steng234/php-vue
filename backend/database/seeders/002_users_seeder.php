<?php
$db = require __DIR__ . '/../db.php';

$users = [
    [
        'name' => 'Mario',
        'surname' => 'Rossi',
        'email' => 'mario.rossi@example.com',
        'phone' => '+39 123 456 7890',
        'address' => 'Via Roma 123, Milano',
        'zip_code' => '20121'
    ],
    [
        'name' => 'Giulia',
        'surname' => 'Bianchi',
        'email' => 'giulia.bianchi@example.com',
        'phone' => '+39 234 567 8901',
        'address' => 'Corso Venezia 45, Milano',
        'zip_code' => '20121'
    ],
    [
        'name' => 'Luca',
        'surname' => 'Verdi',
        'email' => 'luca.verdi@example.com',
        'phone' => '+39 345 678 9012',
        'address' => 'Piazza Duomo 1, Milano',
        'zip_code' => '20122'
    ],
    [
        'name' => 'Anna',
        'surname' => 'Neri',
        'email' => 'anna.neri@example.com',
        'phone' => '+39 456 789 0123',
        'address' => 'Via Brera 78, Milano',
        'zip_code' => '20121'
    ]
];

foreach ($users as $user) {
    $id = $db->insert('user', $user);
    if ($id) {
        echo "Inserito utente #$id: {$user['name']} {$user['surname']}\n";
    } else {
        echo "Errore nell'inserimento utente {$user['name']} {$user['surname']}: " . $db->getLastError() . "\n";
    }
}
?>