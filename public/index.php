<?php
session_start(['use_strict_mode'=>true, 'cookie_httponly'=>true, 'cookie_samesite'=>'Lax', 'cookie_secure'=>!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off']);
error_reporting(E_ERROR);
require_once '../app/init.php';
require_once './config.ini.dev.php';
//require_once './config.ini.php';
$app = new App;