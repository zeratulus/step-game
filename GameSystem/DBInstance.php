<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 05.02.18
 * Time: 17:48
 */

namespace GameSystem;

class DBInstance
{

    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function __destruct()
    {
        $this->db = NULL;
    }

}