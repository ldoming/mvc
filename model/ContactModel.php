<?php

class ContactModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function addcontact($data) {
        if ($this->db->insert('contact', $data)) {
            return true;
        }
        return false;
    }

    public function get_contact() {
        $result = $this->db->select('contact', array('is_deleted', 0));
        if ($result) {
            return $result;
        }
        return false;
    }

    public function getby_contact($id) {
        $result = $this->db->select('contact', array('id', $id));
        if ($result) {
            return $result;
        }
        return false;
    }

    public function delete_contact($id) {
        if ($this->db->update('contact', array('is_deleted' => 1), array('id', $id))) {
            return true;
        }
        return false;
    }

    public function update_contact($id, $data) {
        $result = $this->db->update('contact', $data, array('id', $id));
        if ($result) {
            return true;
        }
        return false;
    }

}
