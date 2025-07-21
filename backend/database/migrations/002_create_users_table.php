<?php
$db = require __DIR__ . '/../db.php';

$tableExists = $db->rawQuery("SHOW TABLES LIKE 'user'");

if (count($tableExists) > 0) {
    echo "Tabella 'user' esiste già.\n";
    exit;
}

$sql = "
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    zip_code VARCHAR(10),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($db->rawQuery($sql) === false) {
    echo "Errore nel creare la tabella 'user': " . $db->getLastError() . "\n";
} else {
    echo "Tabella 'user' creata con successo.\n";
}
?>