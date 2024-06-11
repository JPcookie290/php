<?php
require_once __DIR__ . '/../inc/all.php';

$products = new ProductDatabaseCaller( $pdo );

renderUser( __DIR__ . '/views/user.view.php', [
    'products' => $products->fetchAll()
]);