<?php
// Paths are independent of the document root and of the current working directory.
$publicPath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php'));
$publicPath = rtrim($publicPath, '/').'/';
$scheme = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
$publicUrl = $scheme.'://'.($_SERVER['HTTP_HOST'] ?? 'localhost').$publicPath;
define('__ROOT__', dirname(__DIR__).'/app/');
define('UPLOAD_DIR', __DIR__.'/images/');
define('PUBLIC_DIR', $publicUrl);
define('URL_IMAGES', $publicUrl.'images/');
define('URL_GEN', $publicUrl);
