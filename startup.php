<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 06.04.18
 * Time: 17:00
 */

require_once 'config.php';

// Autoloader
function system_loader($class) {
    $file = APP_DIR . str_replace('\\', '/', $class) . '.php';

    if (is_file($file)) {
        include_once($file);

        return true;
    } else {
        return false;
    }
}

spl_autoload_register('system_loader');

spl_autoload_extensions('.php');