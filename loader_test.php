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
require_once 'GameSystem/DBInstance.php';
require_once 'GameSystem/request.php';
require_once 'GameSystem/db.php';
require_once 'GameSystem/loader.php';
require_once 'GameSystem/Battle.php';
require_once 'GameObjects/unit.php';
require_once 'GameObjects/battle_unit.php';

$request = new GameSystem\Request();
$db = new GameSystem\DB(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_DB);
$load = new GameSystem\Loader($db);
$battle = new GameSystem\Battle($db);

$battle_info = $battle->load(1);

$player = new GameObjects\BattleUnit(1, $battle_info['p_hp'], $battle_info['p_mp'], $battle_info['p_ap'], 3, 5, 'img/cat.jpg', 'I am Player', 5, 5);

$enemy_info = $load->enemy(1);
$enemy = new GameObjects\BattleUnit($enemy_info['enemy_id'], $battle_info['e_hp'], $battle_info['e_mp'], $battle_info['e_ap'], $enemy_info['armor_type'], $enemy_info['speed'], $enemy_info['image'], $enemy_info['name'], $enemy_info['damage'], $enemy_info['damage_type']);

if ($request->server['REQUEST_METHOD'] == 'POST') {
    $player->makeDamage($enemy);
    $enemy->makeDamage($player);

    if ($enemy->hp > 0) {
        $battle->update(1, $player, $enemy);
    } else {
        // End of battle, player earn XP by enemy_id
        $battle->delete($battle_info['id']);
        //$enemy_info['gain_xp']
        //$enemy_info['gain_price']
    }
}

var_dump($load->getRandomEnemy());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Battle</title>
    <link rel="stylesheet" href="view/styles/main.css">
    <link rel="stylesheet" href="view/styles/battle-form.css">
</head>
<body>

<form action="loader_test.php" method="post">

    <?php if ($enemy->hp > 0) { ?>
        <div class="battle-flex">
            <div class="battle-panel left">
                <h2 class="text-center"><?php echo $player->name; ?></h2>
                <img src="<?php echo $player->image; ?>" class="player">
                <p><?php showUnitParams($player); ?></p>
            </div>
            <div class="battle-panel right">
                <h2 class="text-center"><?php echo $enemy->name; ?></h2>
                <img src="<?php echo $enemy->image; ?>" class="enemy">
                <p><?php showUnitParams($enemy); ?></p>
            </div>
        </div>

        <div class="flex-center">
            <input type="submit" value="Attack!" class="btn btn-primary">
        </div>
    <?php } else { ?>
        <div class="flex-center flex-wrap">
            <h1>You win this <?php echo $enemy->name; ?></h1>
        </div>
        <div class="flex-center flex-wrap">
            <img src="<?php echo $enemy->image; ?>" class="enemy">
        </div>
    <?php } ?>
</form>

</body>
</html>