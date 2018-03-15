<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.02.18
 * Time: 17:42
 */

namespace GameSystem;

use GameObjects;

class Application {

    public $db;
    public $request;
    public $player;
    public $router;
    public $link;

    public $isDebug;

    public function __construct() {
        $this->request = new Request();
        $this->db = new DB(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_DB);
        $this->player = new GameObjects\Player($this->db);
        $this->router = new Router();
        $this->link = new Link();

        $this->isDebug = checkDebug($this->request); //php storm local web server param
    }

    public function __destruct() {
        $this->db = NULL;
        $this->request = NULL;
        $this->player = NULL;
        $this->link = NULL;
    }


}