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

    public function restore(){

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];

            $player = new \GameObjects\Player($this->db_link);

            if ($player->isEmailExists($email)) {
                // TODO: отправлять на email сообщения
            } else {
                echo "Такой почты не существует";
            }

            foreach ($_POST as $key => $value) {
                echo $key . ' - ' . $value;
            }
        }

    }

}