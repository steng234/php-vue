<?php
require_once __DIR__ . '/../config/cors.php';
require_once __DIR__ . '/../web/router.php';

router('POST', '^/api/filtered_orders$', function() {
    require_once __DIR__ . '/../web/api/get_orders.php';
});

router('GET', '^/api/products$', function() {
    require_once __DIR__ . '/../web/api/get_products.php';
});

header("HTTP/1.0 404 Not Found");
echo '404 Not Found';