<?php
  class SeqMaster {
      
        function GenerateCode($prefix,$numberlength,$number) { 
            for($i=1;$i<=$numberlength-strlen($number);$i++) {
                $prefix .= "0";    
            }
            return $prefix.$number;
        }
        
        function GetNextMemberNumber() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='Member'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        
       function GetNextAdminStaffNumber() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='AdminStaffs'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        function GetNextSupportDeskUserCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='SupportDeskUsers'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        function GetNextFranchiseeNumber() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='Franchisees'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
		function GetNextFranchiseeStaffNumber() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='FranchiseeStaff'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        /*function GetNextFranchiseeNumber() {
            global $mysql,$_Franchisee;
            $prefix = "FR";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_franchisees`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1);
             
        }*/
        function GetNextFranchiseePlanNumber() {
            global $mysql;
            $prefix = "FPLN";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_franchisees_plans`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1);
            
        }
        function GetNextEmailApiNumber() {
            global $mysql;
            $prefix = "EAPI";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_settings_emailapi`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        function GetNextPaypalNumber() {
            global $mysql;
            $prefix = "PAL";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_settings_paypal`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        function GetNextMobileApiNumber() {
            global $mysql;
            $prefix = "SMS"; 
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_settings_mobilesms`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextDraftProfileCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='DraftProfile'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        
        function GetNextProfileCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='Profile'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        function GetNextPlanCode() {
            global $mysql;
            $prefix = "PLN";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_member_plan`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
        
        function GetNextOrderCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='Order'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        function GetNextInvoiceCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='Invoice'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
        function GetNextReceiptCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='Receipt'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
		function GetNextPaymentGatewayVendorCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='PaymentGatewayVendorCode'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber);                            
        } 
        function GetNextServiceRequestCode() {
            global $mysql;
            $data = $mysql->select("select * from _tbl_sequence where SequenceFor='ServiceRequest'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        } 
        function GetNextPublishProfileCode() {
            global $mysql;
            $prefix = "PID";
            $length = 6;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_publish_profiles`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1); 
        }
       
   /* Admin Master  */
    function GetNextCode($SoftCode) {
        
        global $mysql;
        
        $Table = $mysql->select("select * from _tbl_master_codemaster Where SoftCode='".$SoftCode."'");
        $no = $Table[0]['ParamA'];
        
        $Rows = $mysql->select("select * from _tbl_master_codemaster Where HardCode='".$SoftCode."'");
        $nextNumber = sizeof($Rows)+1;
         
        if ($Table[0]['ParamB']==1) {
            $no .= $nextNumber+1; 
        }
        
        if ($Table[0]['ParamB']==2) {
            
            if (strlen($nextNumber)==1) {
               $no .= "0".$nextNumber; 
            }
            if (strlen($nextNumber)==2) {
               $no .= $nextNumber; 
            }
        }
        
        if ($Table[0]['ParamB']==3) {
            
            if (strlen($nextNumber)==1) {
               $no .= "00".$nextNumber; 
            }
            if (strlen($nextNumber)==2) {
               $no .= "0".$nextNumber; 
            }
            if (strlen($nextNumber)==3) {
               $no .= $nextNumber; 
            }
        }
        
        if ($Table[0]['ParamB']==4) {
            
            if (strlen($nextNumber)==1) {
               $no .= "000".$nextNumber; 
            }
            if (strlen($nextNumber)==2) {
               $no .= "00".$nextNumber; 
            }
            if (strlen($nextNumber)==3) {
               $no .= "0".$nextNumber; 
            }
            if (strlen($nextNumber)==4) {
               $no .= $nextNumber; 
            }
        }
        return $no;
    }
          }
?>