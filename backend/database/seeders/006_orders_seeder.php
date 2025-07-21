<?php
$db = require __DIR__ . '/../db.php';

$orders = [
    [
        'note' => 'Ordine urgente - consegnare entro venerdì',
        'user_id' => 1, // Mario Rossi
        'status_id' => 2 // CONFIRMED
    ],
    [
        'note' => 'Regalo di compleanno - confezionare con carta regalo',
        'user_id' => 2, // Giulia Bianchi
        'status_id' => 3 // PROCESSING
    ],
    [
        'note' => 'Consegnare dopo le 18:00',
        'user_id' => 3, // Luca Verdi
        'status_id' => 4 // SHIPPED
    ],
    [
        'note' => null,
        'user_id' => 4, // Anna Neri
        'status_id' => 1 // PENDING
    ],
    [
        'note' => 'Secondo ordine del mese - cliente fedele',
        'user_id' => 1, // Mario Rossi
        'status_id' => 5 // DELIVERED
    ],
    [
        'note' => 'Ordine aziendale - fattura richiesta',
        'user_id' => 2, // Giulia Bianchi
        'status_id' => 2 // CONFIRMED
    ]
];

foreach ($orders as $index => $order) {
    // Aggiungiamo una data random negli ultimi 30 giorni
    $randomDays = rand(1, 30);
    $order['created_at'] = date('Y-m-d H:i:s', strtotime("-$randomDays days"));
    
    $id = $db->insert('orders', $order);
    if ($id) {
        $userName = '';
        switch ($order['user_id']) {
            case 1: $userName = 'Mario Rossi'; break;
            case 2: $userName = 'Giulia Bianchi'; break;
            case 3: $userName = 'Luca Verdi'; break;
            case 4: $userName = 'Anna Neri'; break;
        }
        echo "Inserito ordine #$id per $userName\n";
    } else {
        echo "Errore nell'inserimento ordine: " . $db->getLastError() . "\n";
    }
}
?>