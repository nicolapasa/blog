<?php
class PasswordReset {
    public static function issue($user) {
        $token = bin2hex(random_bytes(32));
        $record = ['user_id'=>$user->id, 'password_hash'=>hash('sha256', $user->password), 'expires'=>time()+1800];
        file_put_contents(FormSecurity::storage().'/reset-'.hash('sha256', $token).'.json', json_encode($record), LOCK_EX);
        return $token;
    }
    public static function consume($token, $callback) {
        if (!preg_match('/^[a-f0-9]{64}$/D', $token)) { return false; }
        $path = FormSecurity::storage().'/reset-'.hash('sha256', $token).'.json';
        if (!is_file($path)) { return false; }
        $file = fopen($path, 'r+');
        if (!$file || !flock($file, LOCK_EX)) { return false; }
        try {
            $record = json_decode(stream_get_contents($file), true);
            if (!$record || $record['expires'] < time()) { return false; }
            $user = User::find($record['user_id']);
            if (!$user || !hash_equals($record['password_hash'], hash('sha256', $user->password))) { return false; }
            $callback($user);
            ftruncate($file, 0);
            return true;
        } finally { flock($file, LOCK_UN); fclose($file); }
    }
}
