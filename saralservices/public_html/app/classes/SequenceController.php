<?php
    class SeqMaster {
        
        function GenerateCode($prefix,$numberlength,$number) { 
            for($i=1;$i<=$numberlength-strlen($number);$i++) {
                $prefix .= "0";    
            }
            return $prefix.$number;
        }
        
        function GetNextMemberCode() {
            global $mysql;
            $prefix = "MEM";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_Members`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextAdminCode() {
            global $mysql;
            $prefix = "AD";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_Admin`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        } 
        
        function GetNextAgentCode() {
            global $mysql;
            $prefix = "Agent";
            $length = 2;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_Agents`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextApiCode() {
            global $mysql;
            $prefix = "SMS";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_settings_mobilesms`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextEmailApiCode() {
            global $mysql;
            $prefix = "API";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_settings_emailapi`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextOrderCode() {
            global $mysql;
            $prefix = "ODR";
            $length = 6;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_orders`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextPaymentCode() {
            global $mysql;
            $prefix = "PMT";
            $length = 6;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_payments`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextInvoice() {
            global $mysql;
            $prefix = "IN";
            $length = 6;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_invoices`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
    }
?>