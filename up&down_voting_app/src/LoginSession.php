<?php
class LoginSession
{
    public bool $logged_in;
    // Admin & User Hardcoded
    public array $login_data = [
        [
            'username' => 'admin',
            'password' => 'admin'
        ],
        [
            'username' => 'user',
            'password' => 'password'
        ],
    ];

    public function __construct() {
        session_start();
        $this->logged_in = $_SESSION['logged_in'] ?? false;
    }

    public function login() : void {
        session_regenerate_id( true );
        $_SESSION['logged_in'] = true;
    }

    public function logout() : void {
        $_SESSION = [];
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly'],
        );
        session_destroy();
    }

    public function requireLogin() : void {
        if ( ! $this->logged_in ) {
            header( 'Location: ../login/views/login.view.php' );
            exit;
        }
    }
}
