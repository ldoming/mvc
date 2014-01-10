<?php

class LoginLogoutController extends Controller {

    function __construct() {
        parent::__construct();

        if (isset($_SESSION['isLogged'])) {
            header('location:' . $_SESSION['base_url'] . 'DisplaysController/viewprofile_page');
        }
    }

    public function login_page() {
        $this->view->load_view('shares/header');
        $this->view->load_view('login_page');
        $this->view->load_view('shares/footer');
    }

    public function profileregister_page() {
        $this->view->load_view('shares/header');
        $this->view->load_view('profileregister_page');
        $this->view->load_view('shares/footer');
    }

    public function login() {
        $a = $this->loader->model('model/LoginLogoutModel');
        $username = mysql_escape_string($_POST['username']);
        $password = mysql_escape_string(md5($_POST['password']));
        if ($a->checkuser($username, $password)) {
            $this->msg->add('s','Login Success');
            header('location:' . $_SESSION['base_url'] . 'DisplaysController/viewprofile_page');
            return true;
        }
        $this->msg->add('e','Username/Password not match in database please try login again!!!');
        header('location:' . $_SESSION['base_url'] . 'LoginLogoutController/login_page');
    }

    public function logout() {
        unset($_SESSION['isLogged']);
        session_destroy();
        header('location: ' . $_SESSION["base_url"] . 'LoginLogoutController/login_page');
    }

}
