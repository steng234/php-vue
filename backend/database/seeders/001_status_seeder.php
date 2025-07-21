<?php
$db = require __DIR__ . '/../db.php';

$statuses = [
    [
        'code' => 'PENDING',
        'description' => 'Ordine in attesa di elaborazione'
    ],
    [
        'code' => 'CONFIRMED',
        'description' => 'Ordine confermato'
    ],
    [
        'code' => 'PROCESSING',
        'description' => 'Ordine in elaborazione'
    ],
    [
        'code' => 'SHIPPED',
        'description' => 'Ordine spedito'
    ],
    [
        'code' => 'DELIVERED',
        'description' => 'Ordine consegnato'
    ],
    [
        'code' => 'CANCELLED',
        'description' => 'Ordine annullato'
    ],
    [
        'code' => 'REFUNDED',
        'description' => 'Ordine rimborsato'
    ]
];

foreach ($statuses as $status) {
    $id = $db->insert('status', $status);
    if ($id) {
        echo "Inserito status #$id: {$status['code']}\n";
    } else {
        echo "Errore nell'inserimento status {$status['code']}: " . $db->getLastError() . "\n";
    }
}
?>