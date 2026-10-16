<?php
// Copia in config.ini.mail.php nella stessa cartella: il file locale è escluso da Git.
// Parametri ufficiali: https://docs.ergonet.it/configurazione-email/configurazione-generica-email-ergonet
return [
    'host' => 'smtp.ergonet.it',
    'port' => 465, // SMTP con TLS implicito e verifica del certificato.
    'username' => '', // Indirizzo completo della tua casella Ergonet.
    'password' => '', // Password della casella, da inserire solo nel file locale.
    'from' => '', // Usa lo stesso indirizzo di username.
    'from_name' => 'Redrum · Nicola Pasa',
    'contact_to' => 'nicola.pasa@gmail.com',
    'base_url' => 'https://nicolapasa.com/', // URL del sito che riceverà il link di recupero.
];
