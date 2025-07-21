<?php

define('BASE_PATH', realpath(__DIR__ . '/../'));

echo "Running seeders...\n";

//get all seeders
$files = glob(BASE_PATH . '/database/seeders/*.php');
sort($files); 

foreach ($files as $file) {
    echo "Seeding: " . basename($file) . "\n";
    require $file;
}

echo " All seeders completed.\n";
