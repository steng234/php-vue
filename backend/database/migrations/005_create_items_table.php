<?php
$db = require __DIR__ . '/../db.php';

$tableExists = $db->rawQuery("SHOW TABLES LIKE 'items'");

if (count($tableExists) > 0) {
    echo "Tabella 'items' esiste già.\n";
    exit;
}

$sql = "
CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    brand_id INT,
    category_id INT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (brand_id) REFERENCES brand(id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($db->rawQuery($sql) === false) {
    echo "Errore nel creare la tabella 'items': " . $db->getLastError() . "\n";
} else {
    echo "Tabella 'items' creata con successo.\n";
}
?>