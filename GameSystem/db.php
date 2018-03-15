<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.01.18
 * Time: 18:22
 */

namespace GameSystem;

class DB {
    private $link;

    public function __construct($host, $port, $user, $pass, $db) {
        $this->link = new \mysqli($host, $user, $pass, $db, $port);
        $this->link->set_charset('utf8');
    }

    public function __destruct() {
        $this->link->close();
    }

    public function query($sql) {
        $query = $this->link->query($sql);

        if (!$this->link->errno) {
            if ($query instanceof \mysqli_result) {
                $data = array();

                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }

                $result = new \stdClass();
                $result->num_rows = $query->num_rows;
                $result->row = isset($data[0]) ? $data[0] : array();
                $result->rows = $data;

                $query->close();

                return $result;
            } else {
                return true;
            }
        }
    }

}