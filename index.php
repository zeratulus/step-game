<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:14
 */

ini_set('display_errors', 1);

require_once 'config.php';
require_once 'helper.php';
require_once 'GameSystem/View.php';
require_once 'GameSystem/Controller.php';
require_once 'GameSystem/DBInstance.php';
require_once 'GameSystem/request.php';
require_once 'GameSystem/db.php';
require_once 'GameSystem/loader.php';
require_once 'GameSystem/Battle.php';
require_once 'GameSystem/Router.php';
require_once 'GameSystem/Link.php';
require_once 'GameObjects/unit.php';
require_once 'GameObjects/battle_unit.php';
require_once 'GameObjects/Player.php';
require_once 'GameSystem/Application.php';


$app = new GameSystem\Application();

define('APP_DEBUG', $app->isDebug);

$app->router->getRoute($app->request);

//$data['login_href'] = $app->link->url('account/login');
//echo '<a href="'.$data['login_href'].'">Login</a>';
//if (!$app->player->isLogged) {
//
//}

