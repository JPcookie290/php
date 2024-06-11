<?php
require_once __DIR__ . '/../inc/all.php';

$products = new ProductDatabaseCaller( $pdo );
const MAX_FILE_SIZE = 1024 * 1024 * 4;
$allowed_extentions = [ 'jpeg', 'jpg', 'png' ];
$allowed_types = [ 'image/jpeg', 'image/jpg', 'image/png' ];

if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $image = $_FILES['image'] ?? null;
    $error = $image['error'] === 1 ? 'Image size is to big' : '';
    if ( $image['error'] === UPLOAD_ERR_OK ) {
        $error = $image['size'] > MAX_FILE_SIZE ? 'Over the max image size ' : '';
        $typ = mime_content_type( $image['tmp_name'] );
        $error .= in_array( $typ, $allowed_types, true ) ? '' : 'Data type not allowed ';
        $extention = pathinfo( strtolower( $image['name'] ), PATHINFO_EXTENSION );
        $error .= in_array( $extention, $allowed_extentions, true ) ? '' : 'Data extenstion not allowed';
        if ( ! $error ) {
            $products->handleUploadProduct( $image['name'], $_POST['title'], $image['tmp_name'] );
        }
    } else {
        $error .= 'Error with the upload ';
    }
    renderAdmin( __DIR__ . '/views/admin.view.php', [
        'products' => $products->fetchAll(),
        'error' => $error
    ] );
} else {
    renderAdmin( __DIR__ . '/views/upload.view.php');
}