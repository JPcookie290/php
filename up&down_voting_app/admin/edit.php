<?php
require_once __DIR__ . '/../inc/all.php';

$products = new ProductDatabaseCaller( $pdo );

if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $new_title = $_POST['title'] ?? null;
    if ( $id ) {
        $products->editProductTitle( $id, $new_title );
    } else {
        $edit_error = 'There was an editing error';
    }

    renderAdmin( __DIR__ . '/views/admin.view.php', [
        'products' => $products->fetchAll(), 
        'edit_error' => $edit_error ?? '', 
    ]);
} else {
    renderAdmin( __DIR__ . '/views/edit.view.php', [
        'id' => $_GET['id'], 
        'title' => $_GET['title'], 
    ]);
}