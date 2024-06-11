<?php
require_once __DIR__ . '/../inc/all.php';

$products = new ProductDatabaseCaller( $pdo );

renderAdmin( __DIR__ . '/views/admin.view.php', [
    'products' => $products->fetchAll()
] );