<?php
class Middleware {
    public function __construct() {
        $user = !empty($_SESSION['username']) ? User::where('username', $_SESSION['username'])->first() : null;
        if (!$user) {
            unset($_SESSION['username'], $_SESSION['user_id']);
            header('Location: '.URL_GEN.'auth/login', true, 302);
            exit;
        }
        $_SESSION['user_id'] = $user->id;
    }
    public static function token() {
        if (empty($_SESSION['csrf_token'])) { $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); }
        return $_SESSION['csrf_token'];
    }
    public static function field() {
        return '<input type="hidden" name="csrf_token" value="'.self::token().'">';
    }
    public static function verifyPost() {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            header('Allow: POST'); http_response_code(405); exit('Metodo non consentito.');
        }
        $token = $_POST['csrf_token'] ?? '';
        if (!is_string($token) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
            http_response_code(403); exit('Sessione scaduta o richiesta non valida. Ricarica la pagina e riprova.');
        }
    }
}
