<?php
require_once __DIR__ . '/../inc/all.php';

renderLogin( __DIR__ . '/views/login.view.php' );

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    // Hardcoded in src/LoginSession.php
    $user_name = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ( $user_name === $login->login_data[0]['username'] && $password === $login->login_data[0]['password']) {
        $login->login();
        header( 'Location: ../admin/admin.php' );
        exit;
    } elseif ( $user_name === $login->login_data[1]['username'] && $password === $login->login_data[1]['password']) {
        $login->login();
        header( 'Location: ../user/user.php' );
        exit;
    }else {
        echo '<p style="color: red;">Incorrect Username and/or Password.</p>';
    }
}