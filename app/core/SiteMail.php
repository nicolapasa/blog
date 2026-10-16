<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SiteMail {
    public static function config() {
        $file = dirname(__DIR__).'/config.ini.mail.php';
        $local = is_file($file) ? require $file : [];
        return array_replace([
            'host'=>'smtp.ergonet.it', 'port'=>465, 'username'=>'', 'password'=>'',
            'from'=>'', 'from_name'=>'Redrum · Nicola Pasa',
            'contact_to'=>'nicola.pasa@gmail.com', 'base_url'=>'',
        ], is_array($local) ? $local : []);
    }
    public static function ready() {
        $config = self::config();
        return class_exists(PHPMailer::class) && filter_var($config['from'], FILTER_VALIDATE_EMAIL)
            && filter_var($config['username'], FILTER_VALIDATE_EMAIL) && $config['password'] !== '';
    }
    public static function send($to, $subject, $body, $replyTo = '') {
        $config = self::config();
        if (!self::ready()) { return false; }
        foreach (array_filter([$to, $config['from'], $replyTo]) as $address) {
            if (!filter_var($address, FILTER_VALIDATE_EMAIL) || preg_match('/[\r\n]/', $address)) { return false; }
        }
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = $config['host'];
            $mail->Port = (int) $config['port'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['username'];
            $mail->Password = $config['password'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Timeout = 15;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($config['from'], $config['from_name']);
            $mail->addAddress($to);
            if ($replyTo !== '') { $mail->addReplyTo($replyTo); }
            $mail->Subject = $subject;
            $mail->Body = $body;
            return $mail->send();
        } catch (Exception $exception) {
            error_log('Redrum: invio SMTP non riuscito. Verificare configurazione e servizio di posta.');
            return false;
        }
    }
}
