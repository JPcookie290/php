<?php
require_once __DIR__ . '/../inc/all.php';

$products = new ProductDatabaseCaller( $pdo );

if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    
    if ( $id ) {
        $products->deleteProduct( $id );
    } else {
        $delete_error = 'Error at deleting';
    }
    renderAdmin( __DIR__ . '/views/admin.view.php', [
        'products' => $products->fetchAll(),
        'delete_error' => $delete_error ?? ''
    ] );
}