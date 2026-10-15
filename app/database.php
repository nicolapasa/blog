<?php


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$localConfig = __DIR__.'/config.ini.database.php';
$databaseConfig = is_file($localConfig) ? require $localConfig : [];
if (!is_array($databaseConfig)) {
    throw new RuntimeException('La configurazione database locale deve restituire un array.');
}

$capsule->addConnection(array_replace([
    'driver'=>'mysql',
    'host'=>'localhost',
    'username'=>'root',
    'password'=>'',
    'database'=>'nicolapasa',
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'prefix'=>''

], $databaseConfig));

$capsule->bootEloquent();
