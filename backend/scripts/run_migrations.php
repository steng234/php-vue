<?php

define('BASE_PATH', realpath(__DIR__ . '/../'));

echo "Running migrations...\n";

$files = glob(BASE_PATH . '/database/migrations/*.php');
sort($files); 

foreach ($files as $file) {
    echo "Running migration: " . basename($file) . "\n";
    require $file;
}

echo "All migrations completed.\n";
