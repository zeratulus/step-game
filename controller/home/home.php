<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.03.18
 * Time: 17:40
 */

class ControllerHomeHome extends \GameSystem\Controller {

    public function index() {

        echo '<h1>This will be a home page!</h1>';
        echo '<a href="'.$this->link->url('account/login').'">Login Form</a>';

    }

}