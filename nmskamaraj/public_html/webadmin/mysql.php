<?php
session_start();
class MySql {
    public $link   = "";
    public $qry    = "";
    public $error = "";
    public $dbHost = "localhost";
    public $dbUser = "nmskamar_user";
    public $dbPass = "mysqlPwd";
    public $dbName = "nmskamar_database";
    
    public function __construct()
    {
        $this->link = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUser, $this->dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function select($sql)
    {
        $this->writeSql($sql);
        try {
                $stmt = $this->link->prepare($sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                $this->error=$e->getMessage();
                $this->writeSql($e->getMessage());
                return array();
            }
        }

        public function insert($tableName, $rowData)
        {
            $r = "insert into `" . $tableName . "` (";
            $l = " values (";
            foreach ($rowData as $key => $value) {
                $r .= "`" . $key . "`,";
                $l .= ($value == "Null") ? "Null," : "'" . $value . "',";
            }
            $sql = substr($r, 0, strlen($r) - 1) . ")" . substr($l, 0, strlen($l) - 1) . ")";
            $this->writeSql($sql);
            $this->qry = $sql;
            try {
                $this->link->exec($sql);
                $last_id = $this->link->lastInsertId();
                return $last_id;
            } catch (PDOException $e) {
                $this->error=$e->getMessage();
                $this->writeSql($e->getMessage());
                return 0;
            }
        }

        public function execute($sql)
        {
            $this->writeSql($sql);
            try {
                return $this->link->exec($sql);
            } catch (PDOException $e) {
                $this->error=$e->getMessage();
                $this->writeSql($e->getMessage());
                return 0;
            }
        }

        public function __destruct()
        {
            $this->link = null;
        }

        public function writeSql($text) {
            $myFile = "/home/nmskamaraj/public_html/logs/".date("Y_m_d")."_.txt";
            $fh = fopen($myFile, 'a') or die ("can't open file..");
            fwrite($fh, "[".date("Y-m-d H:i:s")."]\t".$text."\n");
            fclose($fh);
        }
}
define("SSLC_MARK_MINIMUM",35);
define("SSLC_MARK_MAXIMUM",100);
define("HSC_MARK_MINIMUM",35);
define("HSC_MARK_MAXIMUM",100);
define("YEAR_STARTING",date("Y")-15);
define("YEAR_ENDING",date("Y"));
$month = array("","JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
?>