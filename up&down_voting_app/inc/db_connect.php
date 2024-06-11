<?php
try {
    $dsn = 'mysql:host=localhost:3306;dbname=up_down_app';
    $user_name = 'up_down_app';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $pdo = new PDO( $dsn, $user_name, $password, $options );
} catch ( PDOException $e ) {
    echo 'Connection to database failed: ' . $e->getMessage();
}