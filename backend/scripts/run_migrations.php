<?php

define('BASE_PATH', realpath(__DIR__ . '/../'));

echo "Running migrations...\n";

$files = glob(BASE_PATH . '/database/migrations/*.php');
sort($files); 

foreach ($files as $file) {
    echo "Running migration: " . basename($file) . "\n";
    
    try{
        require $file;
    }catch(Exception $e){
        echo $e->getMessage()."\n";
    }
   
}

echo "All migrations completed.\n";
