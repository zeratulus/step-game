<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 11.02.2018
 * Time: 13:28
 */
//require_once ('registr.html');

//$password = $_POST['password'];
//$repeat_password =  $_POST['password_confirmation'];
//
//if ($password == $repeat_password){
//    $submit = $results;
//} else {
//
//}

use GameObjects;
use GameSystem;

ini_set('display_errors', 1);

require_once '../../config.php';
require_once '../../helper.php';
require_once '../../GameSystem/DBInstance.php';
require_once '../../GameSystem/request.php';
require_once '../../GameSystem/db.php';
require_once '../../GameObjects/unit.php';
require_once '../../GameObjects/battle_unit.php';
require_once '../../GameObjects/Player.php';

$request = new GameSystem\Request();
$db = new GameSystem\DB(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_DB);
$player = new GameObjects\Player($db);

//TODO: FormRegistersTests
var_dump($request->post);

if ($request->server['REQUEST_METHOD'] == 'POST') {
    if ($player->register($request->post)) {
        echo 'Register successful!';
    } else {
        echo 'Errors!';
    }
}

//TODO: LoginTests
//if ($player->auth('test1', '123')) {
//    echo 'Logged In';
//} else {
//    echo 'Errors!';
//}