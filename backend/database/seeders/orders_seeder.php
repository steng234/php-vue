<?php
$db = require __DIR__ . '/../db.php';

$sampleEmail = 'test@example.com';

$orders = [
    ['email' => $sampleEmail, 'description' => 'Ordine di libri'],
    ['email' => $sampleEmail, 'description' => 'Acquisto biglietti per un evento'],
    ['email' => $sampleEmail, 'description' => 'Prenotazione hotel'],
];

foreach ($orders as $order) {
    $order['date'] = date('Y-m-d H:i:s', strtotime("-" . rand(1, 10) . " days"));
    $id = $db->insert('orders', $order);
    if ($id) {
        echo "Inserito ordine #$id per {$order['email']}\n";
    } else {
        echo "Errore: " . $db->getLastError() . "\n";
    }
}
