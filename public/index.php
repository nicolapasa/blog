<?php
session_start(['use_strict_mode'=>true, 'cookie_httponly'=>true, 'cookie_samesite'=>'Lax', 'cookie_secure'=>!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off']);
error_reporting(E_ERROR);
chdir(__DIR__);
require_once __DIR__.'/config.php';
require_once __DIR__.'/../app/init.php';
$app = new App;