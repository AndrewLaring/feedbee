<?php

namespace laring\core;

class Bootstrap
{
    public function __construct()
    {
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        array_shift($url);

        if (empty($url[0])) {
            $controller = new \app\controllers\IndexController;
            $controller->index();

            return false;
        }
        $file = BASEPATH . 'controllers/' . ucfirst($url[0]) . 'Controller.php';

        $controllerNamespace = '\\app\\controllers\\' . ucfirst($url[0]) . 'Controller';

        if (file_exists($file)) {
            require $file;
        } else {
            $controller = new \app\controllers\ErrorController;
            return false;
        }

        $controller = new $controllerNamespace;
        $controller->loadModel($url[0]);

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                echo 'Error!';
            }
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->index();
            }
        }
    }

}