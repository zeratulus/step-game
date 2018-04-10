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

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['login'])) {
                if (empty($_POST['login'])) {
                    echo 'Bad login';
                    die;
                }
            }

            if (isset($_POST['password'])) {
                if (empty($_POST['password'])) {
                    echo 'Bad password';
                    die;
                }
            }

            if (isset($_POST['password_confirmation'])) {
                if (empty($_POST['password_confirmation'])) {
                    echo 'Bad Repeat password';
                    die;
                }
            }

            if ($_POST['password_confirmation'] == $_POST['password']) {

            }

            $player = new \GameObjects\Player($this->db_link);
            $register_info = $player->register($this->request->post);
            if ($register_info === true) {
                header('Location: ' . $this->link->url('account/login'));
            } else {
                if (is_array($register_info)) {
                    foreach ($register_info as $key => $value) {
                        echo $value . '<br>';
                    }
                }
            }


        }
    }

}