<?php
    
    class MySql {
        
        var $link; 
        var $dbHost = "localhost";
        var $dbUser = "j2jsoftw_j2jsoft";
        var $dbPass = "02021982";
        var $dbName = "j2jsoftw_lordjesus";
        
        var $qry = "";
        
        function MySql(){
            $this->link = mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
        }
        
        function select($sql) {
            mysql_select_db($this->dbName,$this->link);
                        //mysql_query('SET collation_server=utf8_general_ci',$this->link);
            //mysql_query('SET collation_connection=utf8_general_ci',$this->link);
           // mysql_query('SET collation_database=utf8_general_ci',$this->link);
            //mysql_query('SET character_set_server = utf8',$this->link);
           // mysql_query('SET character_set_database = utf8',$this->link);
           // mysql_query('SET names utf8;',$this->link);
          //  mysql_query('SET character_set utf8;',$this->link);
           // mysql_query('SET character_set_results=utf8',$this->link);
            mysql_set_charset('utf8',$this->link);
            //mysql_query('SET character_set_client=utf8',$this->link);
           // mysql_query('SET character_set_connection=utf8',$this->link);
           // mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            
            $result = mysql_query($sql,$this->link);
            $resultData= array();
            while ($row = mysql_fetch_assoc($result)){
                $resultData[]=$row;
            }
            return $resultData;
        }
        
        function execute($sql) {
            mysql_set_charset('utf8',$this->link);
            mysql_select_db($this->dbName,$this->link);
            mysql_query($sql,$this->link);
        }
        
        function insert($tableName,$rowData) {
            $r = "insert into `".$tableName."` (";
            $l = " values (";
            foreach($rowData as $key => $value) {
                $r.="`".$key."`,";
                if ($value=="Null") {
                    $l.="Null,";
                } else {
                    $l.="'".$value."',";    
                }
                
            }
            $r = substr($r,0,strlen($r)-1).")";
            $l = substr($l,0,strlen($l)-1).")";
            $sql = $r.$l;
            
            mysql_select_db($this->dbName,$this->link);
            mysql_set_charset('utf8',$this->link);
            $this->qry=$sql;  
            mysql_query($sql,$this->link);
            return mysql_insert_id($this->link);
    
        }
        
        function insRow($sql) {
            mysql_select_db($this->dbName,$this->link);
            mysql_set_charset('utf8',$this->link);
            $this->qry=$sql;  
            mysql_query($sql,$this->link);
            if (mysql_affected_rows()==1) {
                return "1";
            } else {
                return "-1";
            }
        }
    }
?>