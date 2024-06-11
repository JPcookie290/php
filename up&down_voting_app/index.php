<?php
require_once __DIR__ . '/inc/all.php';

// Testing
$products = new ProductDatabaseCaller( $pdo );

render( __DIR__ . '/views/index.view.php', [
    'products' => $products->fetchAll()
]);