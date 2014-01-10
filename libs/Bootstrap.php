<?php

class Bootstrap {

    function __construct() {

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            require_once 'libs/Controller.php';
            $controller = new Controller();
            $controller->redirect('LoginLogoutController/login_page');
            return false;
        }
        if (empty($url[1])) {
            require_once 'libs/Controller.php';
            $controller = new Controller();
            $controller->redirect('LoginLogoutController/login_page');
            return false;
        }

        $file = 'controller/' . $url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            $controller = new $url[0];
        } else {

            return false;
        }

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }

}
