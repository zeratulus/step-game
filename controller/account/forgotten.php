<?php
/**
 * Created by PhpStorm.
 * User: Rud
 * Date: 03.03.2018
 * Time: 19:13
 */

class ControllerAccountForgotten extends GameSystem\Controller {

    public function index() {
        $data = array(
            'base' => APP_BASE,
            'action' => $this->link->url('account/forgotten/restore'),
        );

        $this->view->setDataFromArray($data);

        echo $this->view->render('forgotten.html');
    }

    public function restore() {

        foreach ($_POST as $key => $value) {
            echo $key . ' - ' . $value;
        }

    }

}