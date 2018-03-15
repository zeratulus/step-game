<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.01.18
 * Time: 18:36
 */
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASS', 'x909c9f0');
define('DB_DB', 'oop-step-game');

//path routine
$server_name = 'http://' . $_SERVER['HTTP_HOST'];
$uri = explode('/', $_SERVER['PHP_SELF']);
$path = '';
foreach ($uri as $dir) {
    if ($dir != end($uri)) $path .= $dir . '/';
}
define('APP_BASE', $server_name . $path);

$app_dir = dirname(__FILE__);
define('APP_DIR', $app_dir . '/');