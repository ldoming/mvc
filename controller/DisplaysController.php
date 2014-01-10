<?php

class DisplaysController extends Controller {

    function __construct() {
        parent::__construct();

        if (!isset($_SESSION['isLogged'])) {
            header('location:' . $_SESSION['base_url'] . 'LoginLogoutController/login_page');
        }
    }

    public function viewprofile_page() {
        $a = $this->loader->model('model/UserModel');
        $this->view->db_data = $a->get_user();
        $this->view->load_view('shares/header');
        $this->view->load_view('shares/tabs');
        $this->view->load_view('viewprofile_page');
        $this->view->load_view('shares/footer');
    }

    public function viewcontacts_page() {
        $a = $this->loader->model('model/ContactModel');
        $this->view->db_data = $a->get_contact();
        $this->view->load_view('shares/header');
        $this->view->load_view('shares/tabs');
        $this->view->load_view('viewcontacts_page');
        $this->view->load_view('shares/footer');
    }

    public function profileregister_page() {
        $this->view->load_view('shares/header');
        $this->view->load_view('shares/tabs');
        $this->view->load_view('profileregister_page');
        $this->view->load_view('shares/footer');
    }

    public function contactregister_page() {
        $this->view->load_view('shares/header');
        $this->view->load_view('shares/tabs');
        $this->view->load_view('contactregister_page');
        $this->view->load_view('shares/footer');
    }

    public function editcontact_page($id) {
        $a = $this->loader->model('model/ContactModel');
        $this->view->db_data = $a->getby_contact($id);
        $this->view->load_view('shares/header');
        $this->view->load_view('shares/tabs');
        $this->view->load_view('editcontact_page');
        $this->view->load_view('shares/footer');
    }
    public function edituser_page($id) {
        $a = $this->loader->model('model/UserModel');
        $this->view->db_data = $a->getby_user($id);
        $this->view->load_view('shares/header');
        $this->view->load_view('shares/tabs');
        $this->view->load_view('edituser_page');
        $this->view->load_view('shares/footer');
    }

}
