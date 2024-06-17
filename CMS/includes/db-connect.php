<?php
try {
    // $dsn = 'mysql:host=localhost:3306;dbname=cms_edvgraz'; // Windows
    $dsn = 'mysql:host=localhost:8889;dbname=cms_edvgraz'; // Mac
    $user_name = 'cms_edvgraz';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $pdo = new PDO( $dsn, $user_name, $password, $options );
} catch ( PDOException $e ) {
    echo 'Connection to database failed: ' . $e->getMessage();
}