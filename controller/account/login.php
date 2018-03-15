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
        echo '<h1>This will be auth routine!</h1>';

        foreach ($_POST as $key => $value) {
            echo $key . ' = ' . $value . '<br>';
        }
    }

}