<?php

class UserController extends Controller {

    private $model;

    function __construct() {
        parent::__construct();
        $this->model = $this->loader->model('model/UserModel');
    }

    public function add_user() {

        $password = md5($_POST['password']);

        $data = array(
            'id' => null,
            'username' => mysql_escape_string($_POST['username']),
            'password' => mysql_escape_string($password),
            'first_name' => mysql_escape_string($_POST['first_name']),
            'last_name' => mysql_escape_string($_POST['last_name']),
            'phone_number' => mysql_escape_string($_POST['phone_number']),
            'address' => mysql_escape_string($_POST['address']),
            'type' => mysql_escape_string($_POST['type']),
            'is_deleted' => 0,
            'created_datetime' => date('Y-m-d G:i:s'),
            'updated_datetime' => date('Y-m-d G:i:s')
        );
        $result = $this->model->add_user($data);
        if ($result === true) {
            $this->msg->add('s', 'User successfully added in database.');
            $this->redirect('DisplaysController/viewprofile_page');
            return true;
        }
        $this->msg->add('e', 'Error in adding user in database. ' . $result);
        $this->redirect('DisplaysController/profileregister_page');
    }

    public function delete_user($id) {
        if ($this->model->delete_user($id)) {
            $this->msg->add('s', 'User successfully deleted in database.');
            $this->redirect('DisplaysController/viewprofile_page');
            return true;
        }
        $this->msg->add('e', 'Error in deleting user in database. Please try again');
        $this->redirect('DisplaysController/viewprofile_page');
    }

    public function update_user($id) {
        $data = array(
            'username' => mysql_escape_string($_POST['username']),
            'first_name' => mysql_escape_string($_POST['first_name']),
            'last_name' => mysql_escape_string($_POST['last_name']),
            'phone_number' => mysql_escape_string($_POST['phone_number']),
            'address' => mysql_escape_string($_POST['address']),
            'type' => mysql_escape_string($_POST['type']),
            'updated_datetime' => date('Y-m-d G:i:s')
        );
        if ($this->model->update_user($id, $data)) {
            $this->msg->add('s', 'User successfully updated in database.');
            $this->redirect('DisplaysController/viewprofile_page');
            return true;
        }
        $this->msg->add('e', 'Error in updating user in database. Please try again');
        $this->redirect('DisplaysController/edituser_page/' . $id);
    }

}
