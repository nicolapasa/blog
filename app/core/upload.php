<?php
class Upload {
    public static function upload_file($file = []) {
        if (empty($file['name']) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) { return ''; }
        if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'] ?? '')) {
            http_response_code(422); exit('Caricamento immagine non riuscito. Torna al modulo e riprova.');
        }
        $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
        $extensions = ['image/jpeg'=>'jpg', 'image/png'=>'png', 'image/gif'=>'gif'];
        if (($file['size'] ?? 0) > 2000000 || !isset($extensions[$mime])) {
            http_response_code(422); exit('Scegli un’immagine JPG, PNG o GIF di massimo 2 MB.');
        }
        $name = bin2hex(random_bytes(16)).'.'.$extensions[$mime];
        if (!move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$name)) {
            http_response_code(500); exit('Impossibile salvare l’immagine.');
        }
        return $name;
    }
}
