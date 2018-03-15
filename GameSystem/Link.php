<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.03.18
 * Time: 17:52
 */

namespace GameSystem;

class Link {
    private $debug;

    public function __construct($debug = false) {
        $this->debug = $debug;
    }

    public function url($route, $args = array()) {
        $link = APP_BASE . 'index.php';

        if ($this->debug) {
            $link .= '?_ijt=' . $this->debug . '&route=' . $route; //phpstorm local web server routine
        } else {
            $link .= '?route=' . $route;
        }

        foreach ($args as $key => $value) {
            $link .= '&' . $key . '=' . $value;
        }
        return $link;
    }

}