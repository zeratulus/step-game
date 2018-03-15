<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.02.18
 * Time: 18:08
 */

namespace GameSystem;

class Router {

    public $path;
    public $controller;
    public $method = 'index';
    public $class;

    private function notFound() {
        include(APP_DIR . 'controller/error/404.php');
        $class = 'ControllerError404';
        $controller = new $class;
        $action = array($controller, 'index');
        return call_user_func($action, '');
    }

    private function makeAction($route) {
        $route = explode('/', $route);
        $this->path = $route[0]; //get controller path
        $this->controller = $route[1]; //get controller file

        if (isset($route[2])) {
            if (!empty($route[2])) {
                $this->method = $route[2]; //get class method
            } else {
                $this->notFound();
            }
        }

        $file = APP_DIR . 'controller/' . $this->path . '/' . $this->controller . '.php';
        if (is_file($file)) {
            include($file);

            $this->class = 'Controller' . capitalizeString($this->path) . capitalizeString($this->controller);     //ControllerAccountLogin

            $controller = new $this->class();

            $action = array($controller, $this->method);

            if (is_callable($action)) {
                return call_user_func($action, '');
            } else {
                $this->notFound();
            }

        } else {
            $this->notFound();
        }
    }

    public function getRoute(Request $request) {
        if (isset($request->get['route'])) {
            $this->makeAction($request->get['route']);
        } else {
            $this->makeAction('home/home');
        }
    }

}