<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:14
 */

ini_set('display_errors', 1);

require_once 'helper.php';
require_once 'GameObjects/unit.php';
require_once 'GameObjects/battle_unit.php';

$npc = new GameObjects\Unit(100, 100, 100, 1, 5, 'img/cat.jpg', 'NPC');
$player = new GameObjects\BattleUnit(100, 100, 100, 1, 5, 'img/cat.jpg', 'I am Player', 5, 5);
$enemy = new GameObjects\BattleUnit(100, 100, 100, 3, 5, 'img/slim.jpg', 'I am Enemy', 5, 5);

//$tst = new mysqli();

showUnitParams($enemy);

$player->makeDamage($enemy);

showUnitParams($enemy);

$player->makeDamage($enemy);

showUnitParams($enemy);