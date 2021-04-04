<?php
class MySqldatabase
{
    public $link   = "";
    public $qry    = "";
    public $error = "";
    
    public function __construct($dbHost, $dbUser, $dbPass, $dbName)
    {
        $this->link = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::MYSQL_ATTR_FOUND_ROWS=>true));
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function select($sql)
    {
        $this->writeSql($sql."\t");
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
            $l .= ($value == "Null") ? "Null," : "'" . $this->specialChar($value) . "',";
        }
        $sql = substr($r, 0, strlen($r) - 1) . ")" . substr($l, 0, strlen($l) - 1) . ")";
        $this->writeSql($sql."\t");
        $this->qry = $sql;
        try {
            $this->link->exec($sql);
            return $this->link->lastInsertId();
        } catch (PDOException $e) {
            $this->error=$e->getMessage();
            $this->writeSql($e->getMessage()."\t");
            return 0;
        }
    }
    
    public function sqlUpdate($tableName, $Data, $conditions)
    {
        $r = "update `" . $tableName . "` set ";
        
        foreach ($Data as $key => $value) {
            $r .=  $key . " = '".$value."', ";
        }
        $r = trim($r);
        $sql = substr($r, 0, strlen($r) - 1) . " where " . $conditions;
        $this->writeSql($sql."\t");
        $this->qry = $sql;
        try {
            $this->link->exec($sql);
            return 1;
           // return $this->link->rowCount();
        } catch (PDOException $e) {
            $this->error=$e->getMessage();
            $this->writeSql($e->getMessage()."\t");
            return -1;
        }
    }
    
    public function execute($sql)
    {
        $this->writeSql($sql."\t");
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
    
    public function writeSql($text) 
    {
        if (log_path!="") 
        {
            $myFile = log_path.date("Y_m_d")."_.txt";
            $fh = fopen($myFile, 'a') or die ("can't open file..");
            fwrite($fh, "[".date("Y-m-d H:i:s")."]\t".$text."\n");
            fclose($fh);
        }
    }
    
    public function specialChar($value) {
        $value =  str_replace("'","\\'",trim($value));
        $value =  str_replace('"','\\"',$value);
        return $value;
    }
}
?>