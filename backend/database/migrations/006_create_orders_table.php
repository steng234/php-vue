<?php
$db = require __DIR__ . '/../db.php';

$tableExists = $db->rawQuery("SHOW TABLES LIKE 'orders'");

if (count($tableExists) > 0) {
    echo "Tabella 'orders' esiste già.\n";
    exit;
}

$sql = "
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    note TEXT,
    user_id INT NOT NULL,
    status_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (status_id) REFERENCES status(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($db->rawQuery($sql) === false) {
    echo "Errore nel creare la tabella 'orders': " . $db->getLastError() . "\n";
} else {
    echo "Tabella 'orders' creata con successo.\n";
}
?>