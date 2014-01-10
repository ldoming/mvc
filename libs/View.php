<?php

class View {

    public $view;

    function __construct() {
        require_once 'libs/Controller.php';
        $this->msg = new Messages();
    }

    public function load_view($name, $data = null) {
        $name = explode('.php', $name);
        require 'view/' . $name[0] . '.php';
    }

}
