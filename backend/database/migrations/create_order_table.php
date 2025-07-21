<?php
$db = require __DIR__ . '/../db.php';

$tableExists = $db->rawQuery("SHOW TABLES LIKE 'orders'");

if (count($tableExists) > 0) {
    echo "Tabella 'orders' esista gia.\n";
    exit;
}

$sql = "
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($db->rawQuery($sql) === false) {
    echo "Errore nel creare la tabella 'orders' : " . $db->getLastError() . "\n";
} else {
    echo "Tabella 'orders' creata con successo.\n";
}
