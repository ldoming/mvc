<?php

class UserModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function add_user($data) {
        $result = $this->check_user_if_exist($data['username']);
        if (!$result) {
            if ($this->db->insert('user', $data)) {
                return true;
            }
        }
        return 'User already exist in database.';
    }

    public function get_user() {
        $result = $this->db->select('user', array('is_deleted', 0));
        if ($result) {
            return $result;
        }
        return false;
    }

    public function delete_user($id) {
        if ($this->db->update('user', array('is_deleted' => 1), array('id', $id))) {
            return true;
        }
        return false;
    }

    public function getby_user($id) {
        $result = $this->db->select('user', array('id', $id));
        if ($result) {
            return $result;
        }
        return false;
    }

    public function update_user($id, $data) {
        $result = $this->db->update('user', $data, array('id', $id));
        if ($result) {
            return true;
        }
        return false;
    }

    private function check_user_if_exist($username) {
        $result = $this->db->select('user', array('username', $username , 'is_deleted', 0));
        if (mysqli_num_rows($result) > 1) {
            return true;
        }
        return false;
    }

}
