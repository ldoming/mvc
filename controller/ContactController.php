<?php

class ContactController extends Controller {

    private $model;

    function __construct() {
        parent::__construct();
        $this->model = $this->loader->model('model/ContactModel');
    }

    public function addcontact() {
        $data = array(
            'id' => null,
            'user_id' => mysql_escape_string($_SESSION['id']),
            'name' => mysql_escape_string($_POST['name']),
            'phone_number' => mysql_escape_string($_POST['phone_number']),
            'address' => mysql_escape_string($_POST['address']),
            'is_deleted' => 0,
            'created_datetime' => date('Y-m-d G:i:s'),
            'updated_datetime' => date('Y-m-d G:i:s')
        );

        if ($this->model->addcontact($data)) {
            $this->msg->add('s','Successfully added to database.');
            $this->redirect('DisplaysController/viewcontacts_page');
            return true;
        }
        $this->msg->add('e','Error in adding contact in database. Please try again');
        $this->redirect('DisplaysController/contactregister_page');
    }

    public function delete_contact($id) {
        if ($this->model->delete_contact($id)) {
            $this->msg->add('s','Contact successfully deleted in database.');
            $this->redirect('DisplaysController/viewcontacts_page');
            return true;
        }
        $this->msg->add('e','Error in deleting contact in database. Please try again');
        $this->redirect('DisplaysController/viewcontacts_page');
    }

    public function update_contact($id) {
        $data = array(
            'name' => mysql_escape_string($_POST['name']),
            'phone_number' => mysql_escape_string($_POST['phone_number']),
            'address' => mysql_escape_string($_POST['address']),
            'updated_datetime' => date('Y-m-d G:i:s')
        );
        if ($this->model->update_contact($id, $data)) {
            $this->msg->add('s','Contact successfully updated in database.');
            $this->redirect('DisplaysController/viewcontacts_page');
            return true;
        }
        $this->msg->add('e','Error in updating contact in database. Please try again');
        $this->redirect('DisplaysController/editcontact_page/'.$id);
    }

}
