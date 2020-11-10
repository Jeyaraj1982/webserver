<?php
  class SeqMaster {
      
        function GenerateCode($prefix,$numberlength,$number) { 
            for($i=1;$i<=$numberlength-strlen($number);$i++) {
                $prefix .= "0";    
            }
            return $prefix.$number;
        }
        
        function GetNextServiceCode() {
            global $mysql;
            $data = $mysql->select("select * from _queen_sequence where SequenceFor='Service'");
            $prefix = $data[0]['Prefix'];
            $length = $data[0]['StringLength'];
            $LastNumber = $data[0]['LastNumber']+1;
            return SeqMaster::GenerateCode($prefix,$length,$LastNumber); 
        }
   
          }
?>