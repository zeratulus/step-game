<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.03.18
 * Time: 18:03
 */

namespace GameSystem;

class Controller {
    public $db_instance;
    public $db_link;
    public $link;
    public $view;
    public $player;
    public $session;
    public $request;

    public function __construct() {

        $this->link = new Link(APP_DEBUG);
        $this->view = new View();
        $this->db_link = new DB(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_DB);
        $this->db_instance = new DBInstance($this->db_link);
        $this->request = new Request();
    }



}