<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 30.03.18
 * Time: 18:04
 */

class ControllerBattleBattle extends GameSystem\Controller
{

    public function index() {

        $battle_model = new GameSystem\Battle($this->db_link);

        $battle_id = $this->request->get['battle_id'];

        $battle = $battle_model->load($battle_id);

        $enemy_info = $battle_model->enemy($battle['enemy_id']);

        $player = new GameObjects\BattleUnit($battle['player_id'], $battle['p_hp'], $battle['p_mp'], $battle['p_ap'], 3, 5, 'img/cat.jpg', 'I am Player', 5, 5);
        $enemy = new GameObjects\BattleUnit($battle['enemy_id'], $battle['e_hp'], $battle['e_mp'], $battle['e_ap'], $enemy_info['armor_type'], $enemy_info['speed'], $enemy_info['image'], $enemy_info['name'], $enemy_info['damage'], $enemy_info['damage_type']);

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $player->makeDamage($enemy);
            $enemy->makeDamage($player);

            if ($enemy->hp > 0) {
                $battle_model->update($battle_id, $player, $enemy);
            } else {
                //TODO: End of battle, player earn XP by enemy_id
                $battle_model->delete($battle['id']);
            }
        }

        $action_url = array('battle_id' => $battle_id);

        $data = array(
            'base' => APP_BASE,
            'action' => $this->link->url('battle/battle', $action_url),
            'player_name' => $player->name,
            'player_image' => $player->image,
            'enemy_name' => $enemy->name,
            'enemy_image' => $enemy->image,
            'enemy_hp' => $enemy->hp,
            'player' => showUnitParams($player),
            'enemy' => showUnitParams($enemy),
            'back' => $this->link->url('battle/gobattle')
        );

        $this->view->setDataFromArray($data);

        echo $this->view->render('battle/battle.html');

    }

}