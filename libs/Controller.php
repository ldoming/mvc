<?php

session_start();

class Controller {

    public $view;
    public $db;
    public $loader;
    public $msg;

    function __construct() {
        $this->view = new View();
        $this->db = new Model();
        $this->loader = new Loader();
        $_SESSION['base_url'] = Config::base_url();
        $this->msg = new Messages();


    }

    public function redirect($url) {
        header('location:' . $_SESSION['base_url'] . $url);
    }

}
