<?php

class ControllerAccountRegister extends \GameSystem\Controller {

    public function index() {

        $data = array(
          'base' => APP_BASE,
          'login' => $this->link->url('account/login'),
          'forgotten' => $this->link->url('account/forgotten'),
          'action' => $this->link->url('account/register/validate'),
        );

        $this->view->setDataFromArray($data);

        echo $this->view->render('register.html');

    }

    public function validate() {
        foreach ($_POST as $key => $value) {

            echo $key . ' - ' . $value;

        }
    }


}