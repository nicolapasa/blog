<?php
class FormSecurity {
    public static function storage() {
        $path = dirname(__DIR__).'/runtime/forms';
        if (!is_dir($path) && !mkdir($path, 0700, true) && !is_dir($path)) { throw new RuntimeException('Archivio dei moduli non disponibile.'); }
        return $path;
    }
    public static function allow($key, $limit, $seconds) {
        $file = fopen(self::storage().'/rate-'.hash('sha256', $key).'.json', 'c+');
        if (!$file || !flock($file, LOCK_EX)) { return false; }
        try {
            $times = json_decode(stream_get_contents($file), true) ?: [];
            $times = array_values(array_filter($times, static fn($t) => $t > time()-$seconds));
            if (count($times) >= $limit) { return false; }
            $times[] = time(); ftruncate($file, 0); rewind($file); fwrite($file, json_encode($times));
            return true;
        } finally { flock($file, LOCK_UN); fclose($file); }
    }
    public static function human($form) {
        $started = $_SESSION['form_started'][$form] ?? 0;
        return is_string($_POST['website'] ?? '') && ($_POST['website'] ?? '') === '' && $started > 0 && time()-$started >= 3 && time()-$started < 7200;
    }
}
