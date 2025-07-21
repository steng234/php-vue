<?php
$db = require __DIR__ . '/../db.php';

$tableExists = $db->rawQuery("SHOW TABLES LIKE 'brand'");

if (count($tableExists) > 0) {
    echo "Tabella 'brand' esiste già.\n";
    exit;
}

$sql = "
CREATE TABLE brand (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($db->rawQuery($sql) === false) {
    echo "Errore nel creare la tabella 'brand': " . $db->getLastError() . "\n";
} else {
    echo "Tabella 'brand' creata con successo.\n";
}
?>