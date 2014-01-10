<?php

class LoginLogoutModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function checkuser($username = null, $password = null) {
        if ($username != null && $password != null) {
            $result = $this->db->select('user', array('username', $username, 'password', $password, 'is_deleted', 0));
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION['isLogged'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['type'] = $row['type'] == 'admin' ? 'Administrator' : 'User';
                }
                return true;
            }
        }
        return false;
    }

}
