<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.03.18
 * Time: 17:37
 */

class ControllerError404 {

    public function index() {

        header("HTTP/1.0 404 Not Found");
        echo '<h1>404: This page not found!</h1>';

    }

}