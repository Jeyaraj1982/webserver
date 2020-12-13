<?php
session_start();
 date_default_timezone_set("Asia/Calcutta");  
        include_once("../classes/mysql.php");
    $mysql = new MySql();
    $month =  array("","January","February","March","April","May","June","July","August","September","October","November","December");
    define("YEAR_FROM","2016");
    define("YEAR_TO","2020");
    
       class DealMaass {
        
        var $userid = 0;
        function getBalance() {
            global $mysql;
             if (!($this->userid>0)) 
            return "0.00";
           
            
          //  $d = $mysql->select("select sum(creditamt-debitamount) as bal from _useraccount where userid=".$this->userid);
            $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where userid=".$this->userid);
            if (sizeof($d)>0) {
            return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
            } else {
                return "0.00";
            }
        }
        
function getLowestBidRate($itemid) {
            
            global $mysql; 
            $bid = $mysql->select("SELECT * FROM _bids AS bid ,
                                (SELECT MIN(bidrate) AS bidrate FROM 
                                    (SELECT COUNT(*) AS COUNT, bidrate FROM  _bids WHERE productid='".$itemid."' GROUP BY bidrate) AS t1 
                                        WHERE t1.count=1 ) AS t2 WHERE bid.bidrate = t2.bidrate AND productid='".$itemid."' ");
                                         return $bid;
        }
        
        function GetLowestBidUserName($itemid) {
            global $mysql; 
            $bid = $this->getLowestBidRate($itemid);
            if (sizeof($bid)>0) {
            $user= $mysql->select("select * from _usertable where userid=".$bid[0]['userid']);
            return $user[0]['personname'];
        } else {
            return "";
        }   
        
        }
    }

                                       
    
    $dealmaass = new DealMaass();      
?>