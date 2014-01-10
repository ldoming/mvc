<?php

class Database {

    private $db_host = 'localhost';
    private $db_username = 'root';
    private $db_password = 'ESDj@Pn27?122';
    protected $db_name = 'mvc';
    protected $con;

    public function __construct() {
        $con = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $this->con = $con;
    }

    private function checkTable($table) {
        $q = 'SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '";';
        $result = $this->query($q);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function where($data, $separator) {
        if ((count($data) + 1) % 2 != 0) {
            $q = null;
            for ($i = 1; $i <= count($data); $i++) {
                if ($i % 2 == 0) {
                    $q .= '"' . $data[$i - 1] . '" ' . $separator;
                } else {
                    $q .= ' ' . $data[$i - 1] . ' = ';
                }
            }
            $q = rtrim($q, 'AND');
            $q = rtrim($q, 'OR');

            return $q;
        }
        return false;
    }

    public function query($query) {
        if ($query == null) {
            return false;
        }
        $result = mysqli_query($this->con, $query) or die(mysql_error());

        if (!empty($result)) {
            return $result;
        }
        return false;
    }

    public function select($tablename, $where = null, $separator = 'AND') {
        if ($tablename != NULL) {
            if ($this->checkTable($tablename)) {
                $q = 'SELECT * FROM `' . $tablename . '` ';
                if ($where != null) {
                    $q .= 'WHERE ' . $this->where($where, $separator);
                }
                $q .= ';';
                $result = $this->query($q);
                if ($result) {
                    return $result;
                }
            }
        }
        return false;
    }

    public function insert($table, $data) {
        if ($table != null) {
            if ($this->checkTable($table)) {
                $q = "INSERT INTO `" . $table;
                $q .= "` (`" . implode("`, `", array_keys($data)) . "`)";
                $q .= " VALUES ('" . implode("', '", $data) . "') ";
                $q .= ';';
                $result = $this->query($q);
                if ($result) {
                    return true;
                }
            }
        }
        return false;
    }

    public function update($table, $data, $where, $separator = 'AND') {
        if ($table != null && $where != null) {
            if ($this->checkTable($table)) {
                $q = "UPDATE `" . $table . "` SET ";
                $array_keys = array_keys($data);
                for ($i = 0; $i < count($data); $i++) {
                    $q .= '`' . $array_keys[$i] . '` = "' . $data[$array_keys[$i]] . '" ,';
                }
                $q = rtrim($q, ',');
                if ($where != null) {
                    $q .= 'WHERE ' . $this->where($where, $separator);
                }
                $q .= ';';

                $result = $this->query($q);
                if ($result) {
                    return true;
                }
            }
        }
        return false;
    }

    public function result($data) {
        while ($row = mysqli_fetch_array($data)) {
            $fullData[] = $row[0];
        }
        return $fullData;
    }

}
