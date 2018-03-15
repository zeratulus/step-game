<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:14
 */

//SOME SQL EXAMPLES:
//INSERT INTO battles(id, player_id, p_hp, p_ap, p_mp, e_hp, e_ap, e_mp, enemy_id) VALUES (1, 1, 100, 100, 100, 75, 75, 75, 1)
//
//

ini_set('display_errors', 1);

require_once 'config.php';
require_once 'helper.php';
require_once 'system/request.php';
require_once 'system/db.php';
require_once 'GameObjects/unit.php';
require_once 'GameObjects/battle_unit.php';

$request = new Request();

$db = new DB(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_DB);

$battle = $db->query('SELECT * FROM battles WHERE id = 1 LIMIT 1')->row;

//$this->load->player($player_id);
//if ($this->user->isLogged)
//if ($this->user->id == $player_id)
$player = new GameObjects\BattleUnit($battle['p_hp'], $battle['p_mp'], $battle['p_ap'], 3, 5, 'img/cat.jpg', 'I am Player', 5, 5);
//$player = new GameObjects\BattleUnit(100, 100, 100, 3, 5, 'img/cat.jpg', 'I am Player', 5, 5);
//$enemy_info = $this->load->enemy($enemy_id);
//$enemy_info['name'];
$enemy = new GameObjects\BattleUnit($battle['e_hp'], $battle['e_mp'], $battle['e_ap'], $enemy_info['armor_type'], $enemy_info['speed'], $enemy_info['image'], $enemy_info['name'], $enemy_info['damage'], $enemy_info['damage_type']);
//$enemy = new GameObjects\BattleUnit(100, 100, 100, 1, 5, 'img/slim.jpg', 'Slim', 5, 5);

if ($request->server['REQUEST_METHOD'] == 'POST') {
    $player->makeDamage($enemy);
    $enemy->makeDamage($player);

    if ($enemy->hp > 0) {
        $db->query('UPDATE battles SET player_id=1, p_hp='.$player->hp.', p_ap='.$player->ap.', p_mp='.$player->mp.', e_hp='.$enemy->hp.', e_ap='.$enemy->ap.', e_mp='.$enemy->mp.', enemy_id=1 WHERE id=1');
    } else {
        // End of battle, player earn XP by enemy_id
        $db->query('DELETE FROM battles WHERE id = ' . $battle['id']);
    }
}

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

<form action="battle.php" method="post">

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