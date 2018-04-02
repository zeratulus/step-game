<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.02.18
 * Time: 18:21
 */

class ControllerAccountLogin extends GameSystem\Controller {

    public function index() {
        $data = array(
            'base' => APP_BASE,
            'forgotten' => $this->link->url('account/forgotten'),
            'action' => $this->link->url('account/login/auth'),
        );

        $this->view->setDataFromArray($data);

        echo $this->view->render('login.html');
    }

    public function auth() {

        if (isset($_POST['login'])) {
            if (empty($_POST['login'])) {
                echo 'Bad login';
                die;
            }
        }

        $login = $_POST['login'];

        if (isset($_POST['password'])) {
            if (empty($_POST['password'])) {
                echo 'Bad password';
                die;
            }
        }

        $password = $_POST['password'];

        $player = new GameObjects\Player($this->db_link);

        if ($player->auth($login, $password)) {
            header('Location: ' . $this->link->url('battle/gobattle'));
            echo 'You are logged in!';
        } else {
            echo 'Not logged!';
        }

    }

}