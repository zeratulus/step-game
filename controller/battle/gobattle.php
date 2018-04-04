<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 30.03.18
 * Time: 18:04
 */

class ControllerBattleGoBattle extends GameSystem\Controller
{

    public function index() {

        $data = array(
            'base' => APP_BASE,
            'action' => $this->link->url('battle/gobattle/battle'),
        );

        $this->view->setDataFromArray($data);

        echo $this->view->render('battle/go_to_battle.html');

    }

    public function battle() {
        if ($this->request->server['REQUEST_METHOD'] == 'POST') {

            $battle_model = new GameSystem\Battle($this->db_link);

            $enemy = $battle_model->getRandomEnemy();

            $battle_id = $battle_model->add(1, $enemy);

            $url_args = array('battle_id' => $battle_id);

            header('Location: ' . $this->link->url('battle/battle', $url_args));
        }

    }

}