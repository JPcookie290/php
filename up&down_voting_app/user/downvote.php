<?php
require_once __DIR__ . '/../inc/all.php';

$products = new ProductDatabaseCaller( $pdo );

renderUser( __DIR__ . '/views/user.view.php', [
    'products' => $products->fetchAll()
]);

if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ( $id ) {
        $products->handleDownvote( $id );
    } else {
        $edit_error = 'Voting error';
    }
}