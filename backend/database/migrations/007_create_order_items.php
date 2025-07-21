<?php
$db = require __DIR__ . '/../db.php';

$tableExists = $db->rawQuery("SHOW TABLES LIKE 'order_items'");

if (count($tableExists) > 0) {
    echo "Tabella 'order_items' esiste già.\n";
    exit;
}

$sql = "
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    orders_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES items(id) ON DELETE CASCADE,
    FOREIGN KEY (orders_id) REFERENCES orders(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($db->rawQuery($sql) === false) {
    echo "Errore nel creare la tabella 'order_items': " . $db->getLastError() . "\n";
} else {
    echo "Tabella 'order_items' creata con successo.\n";
}
?>