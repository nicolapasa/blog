<?php
session_start();
error_reporting(E_ERROR);
require_once '../app/init.php';
require_once './config.ini.dev.php';
//require_once './config.ini.php';
$app = new App;