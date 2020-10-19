<?php
include_once("config.php");

 
$sql = "truncate `_tblEpins`;truncate `_tblPlacements`;DELETE FROM `_tbl_Members` WHERE `MemberID`>'1';Delete From `_tbl_wallet_transactions` where `TxnID`>=46;truncate `_tbl_wallet_request`;truncate `_tbl_Member_Orders`;truncate `_tbl_Member_Orders_Items`;";
$mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
$d=$mysqldb->execute($sql);
echo "done";

?>