<?php

namespace System;

/**
 * Description of Database
 *
 * @author vishwa
 */
class Database {

    //put your code here

    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
        if ($this->conn) {
            $selected = mysqli_select_db($this->conn, DB_NAME);
        } else {
            echo 'Unable to connect to MySQL';
        }
    }

}
