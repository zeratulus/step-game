<?php

class ControllerAccountRegister extends \GameSystem\Controller {

    public function index() {

        $data = array(
            'a' => 1,
            'b' => 2
        );

        $this->view->setDataFromArray($data);

        echo $this->view->render('register.html');

    }

    public function register() {
        //TODO: Logic of registration
    }

}