<?php

define('BASE_PATH', realpath(__DIR__ . '/../'));

echo "Running seeders...\n";

$files = glob(BASE_PATH . '/database/seeders/*.php');
sort($files); 

foreach ($files as $file) {
    echo "Seeding: " . basename($file) . "\n";

    try{
        require $file;
    }catch(Exception $e){
        echo $e->getMessage()."\n";
    }
}

echo " All seeders completed.\n";
