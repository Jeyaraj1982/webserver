  <?php 
  include_once("config.php");
  
  if (isset($_REQUEST['lightCandle']) && $_REQUEST['lightCandle']==1) {
    
    
     if (isset($_REQUEST['candle'])) {
         
             switch ($_REQUEST['candle']) {
                 case 1:  $candle1 = '1';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';
                          break;

                 case 2:  $candle1 = '0';
                          $candle2 = '1';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';
                          break;
                          
                 case 3:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '1';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';
                          break;
                          
                 case 4:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '1';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';
                          break; 

                 case 5:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '1';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';
                          break; 

                 case 6:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '1';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';
                          break;  

                 case 7:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '1';
                          $candle8 = '0';
                          $candle9 = '0';
                          break; 

                 case 8:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '1';
                          $candle9 = '0';
                          break;  

                 case 9:  $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '1';
                          break;                                                                                                       
                                                    
                 default: $candle1 = '0';
                          $candle2 = '0';
                          $candle3 = '0';
                          $candle4 = '0';
                          $candle5 = '0';
                          $candle6 = '0';
                          $candle7 = '0';
                          $candle8 = '0';
                          $candle9 = '0';                                                                           
             }
               
         }
          
     $d = $mysql->select("select * from _candle where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')");
     
     if (sizeof($d)==0) {
        
        if ($candle1==1 || $candle2==1 || $candle3==1 || $candle4==1) {
            
            $mysql->insert("_candle",array("sessionid" => session_id(),
                                           "candlefor" => $_REQUEST['candlefor'],
                                           "candleon"  => date("Y-m-d H:i:s"),
                                           "candle1"   => $candle1,
                                           "candle2"   => $candle2,
                                           "candle3"   => $candle3,
                                           "candle4"   => $candle4,
                                           "candle5"   => $candle5,
                                           "candle6"   => $candle6,
                                           "candle7"   => $candle7,
                                           "candle8"   => $candle8,
                                           "candle8"   => $candle9));
        }
     } else {  
      
     if ($candle1==1) {
         $sql = "update _candle set candle1=".$candle1." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle2==1) {
         $sql = "update _candle set candle2=".$candle2." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle3==1) {
         $sql = "update _candle set candle3=".$candle3." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle4==1) {
         $sql = "update _candle set candle4=".$candle4." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle5==1) {
         $sql = "update _candle set candle5=".$candle5." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle6==1) {
         $sql = "update _candle set candle6=".$candle6." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle7==1) {
         $sql = "update _candle set candle7=".$candle7." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle8==1) {
         $sql = "update _candle set candle8=".$candle8." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     } elseif ($candle9==1) {
         $sql = "update _candle set candle9=".$candle9." where candlefor ='".$_REQUEST['candlefor']."' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')";
         $mysql->execute($sql);
     }    
     
     }
     
     if ($_REQUEST['candlefor']=='M') {
            
                $mC = $mysql->select("SELECT SUM(candle1+candle2+candle3+candle4+candle5+candle6+candle7+candle8+candle9) AS candles FROM _candle WHERE candlefor='M'"); 
                $mC2 = $mysql->select("SELECT count(*) as count  FROM _candle WHERE candlefor='M'"); 
                ?>
                
                
               
               Sessions: <?php echo $mC2[0]['count'];?><br>              
           Candles Lighted : <?php echo $mC[0]['candles']; ?><br>
           ஏற்றிவைக்கப்பட்ட மெழுகுவர்த்திகள்  <?php echo $mC[0]['candles']; ?><br>
           <?php
     }
     
          if ($_REQUEST['candlefor']=='D') {
            
                $mC = $mysql->select("SELECT SUM(candle1+candle2+candle3+candle4) AS candles FROM _candle WHERE candlefor='D'"); 
                $mC2 = $mysql->select("SELECT count(*) as count  FROM _candle WHERE candlefor='D'");
                ?>
               
            Sessions: <?php echo $mC2[0]['count'];?><br>   
           Candles Lighted : <?php echo $mC[0]['candles']; ?><br>
           ஏற்றிவைக்கப்பட்ட மெழுகுவர்த்திகள்  <?php echo $mC[0]['candles']; ?><br>
           <?php
     }
      exit;
  }
  
  if (strtotime(date("Y-m-d"))>strtotime($_REQUEST['mdate'])) {
            
            echo "<span style='color:red;'>Please select valid date . <span style='font-size:10px;'>(தயவு செய்து சரியான  தேதியை தெரிவு செய்யவும்    )</span>";
  
      exit;
  }
  
  
  
   $day = strtolower(date("l",strtotime($_REQUEST['mdate'])));
  
 
                $return = "";
                if ($_REQUEST['div']=='adatepicker_f') {
                    $return = "<select name='masstime' id='masstime' style='float:left;width:149px;padding:2px;'>";    
                } else {
                    $return = "<select name='masstime' id='masstime' style='float:left;width:308px;;margin-left:6px;padding:2px;'>";    
                }
                
                
                switch($day) {
                case 'monday' : 
                    if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { 
                            if (date("H")<5) {
                                $return .= "<option value='MASS_06:00AM'>Monday Mass 06:00AM </option>";
                                $return .= "<option value='MASS_11:00AM'>Monday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Monday Mass 05:00PM</option>";
                            } else if  ((date("H")>6) && (date("H")<10)) {
                                $return .= "<option value='0'  disabled >Monday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_11:00AM'>Monday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Monday Mass 05:00PM</option>";
                            } else if  ((date("H")>10) && (date("H")<16)) {
                                $return .= "<option value='0'  disabled>Monday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Monday Mass 11:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_05:00PM'>Monday Mass 05:00PM</option>";
                            } else {
                                $return .= "<option value='0'  disabled>Monday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Monday Mass 11:00PM (Booking Closed)</option>";
                                $return .= "<option value='0'>Monday Mass 05:00PM (Booking Closed)</option>";  
                            }
                        } else { 
                            $return .= "<option value='MASS_06:00AM'>Monday Mass 06:00AM </option>";
                            $return .= "<option value='MASS_11:00AM'>Monday Mass 11:00AM</option>";
                            $return .= "<option value='MASS_05:00PM'>Monday Mass 05:00PM</option>";
                        }
                        break;
                case 'tuesday' : 
                          if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { 
                            if (date("H")<5) {
                                $return .= "<option value='MASS_06:00AM'>Tuesday Mass 06:00AM </option>";
                                $return .= "<option value='MASS_11:00AM'>Tuesday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Tuesday Mass 05:00PM</option>";
                            } else if  ((date("H")>6) && (date("H")<10)) {
                                $return .= "<option value='0'  disabled >Tuesday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_11:00AM'>Tuesday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Tuesday Mass 05:00PM</option>";
                            } else if  ((date("H")>10) && (date("H")<16)) {
                                $return .= "<option value='0'  disabled>Tuesday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Tuesday Mass 11:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_05:00PM'>Tuesday Mass 05:00PM</option>";
                            } else {
                                $return .= "<option value='0'  disabled>Tuesday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Tuesday Mass 11:00PM (Booking Closed)</option>";
                                $return .= "<option value='0'>Tuesday Mass 05:00PM (Booking Closed)</option>";  
                            }
                        } else { 
                            $return .= "<option value='MASS_06:00AM'>Tuesday Mass 06:00AM </option>";
                            $return .= "<option value='MASS_11:00AM'>Tuesday Mass 11:00AM</option>";
                            $return .= "<option value='MASS_05:00PM'>Tuesday Mass 05:00PM</option>";
                        }
                        break;
                case 'wednesday' : 
                    if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { 
                            if (date("H")<5) {
                                $return .= "<option value='MASS_06:00AM'>Wednesday Mass 06:00AM </option>";
                                $return .= "<option value='MASS_11:00AM'>Wednesday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Wednesday Mass 05:00PM</option>";
                            } else if  ((date("H")>6) && (date("H")<10)) {
                                $return .= "<option value='0'  disabled >Wednesday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_11:00AM'>Wednesday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Wednesday Mass 05:00PM</option>";
                            } else if  ((date("H")>10) && (date("H")<16)) {
                                $return .= "<option value='0'  disabled>Wednesday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Wednesday Mass 11:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_05:00PM'>Wednesday Mass 05:00PM</option>";
                            } else {
                                $return .= "<option value='0'  disabled>Wednesday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Wednesday Mass 11:00PM (Booking Closed)</option>";
                                $return .= "<option value='0'>Wednesday Mass 05:00PM (Booking Closed)</option>";  
                            }
                        } else { 
                            $return .= "<option value='MASS_06:00AM'>Wednesday Mass 06:00AM </option>";
                            $return .= "<option value='MASS_11:00AM'>Wednesday Mass 11:00AM</option>";
                            $return .= "<option value='MASS_05:00PM'>Wednesday Mass 05:00PM</option>";
                        }
                        break;
                case 'thursday' : 
                        if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { 
                            if (date("H")<5) {
                                $return .= "<option value='MASS_06:00AM'>Thursday Mass 06:00AM </option>";
                                $return .= "<option value='MASS_11:00AM'>Thursday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Thursday Mass 05:00PM</option>";
                            } else if  ((date("H")>6) && (date("H")<10)) {
                                $return .= "<option value='0'  disabled >Thursday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_11:00AM'>Thursday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:00PM'>Thursday Mass 05:00PM</option>";
                            } else if  ((date("H")>10) && (date("H")<16)) {
                                $return .= "<option value='0'  disabled>Thursday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Thursday Mass 11:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_05:00PM'>Thursday Mass 05:00PM</option>";
                            } else {
                                $return .= "<option value='0'  disabled>Thursday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Thursday Mass 11:00PM (Booking Closed)</option>";
                                $return .= "<option value='0'>Thursday Mass 05:00PM (Booking Closed)</option>";  
                            }
                        } else { 
                            $return .= "<option value='MASS_06:00AM'>Thursday Mass 06:00AM </option>";
                            $return .= "<option value='MASS_11:00AM'>Thursday Mass 11:00AM</option>";
                            $return .= "<option value='MASS_05:00PM'>Thursday Mass 05:00PM</option>";
                        }
                        break;
                case 'friday' : 
                        if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { 
                            if (date("H")<5) {
                                $return .= "<option value='MASS_06:00AM'>Friday Mass 06:00AM </option>";
                                $return .= "<option value='MASS_12:00PM'>Friday Mass 12:00PM</option>";
                                $return .= "<option value='MASS_07:00PM'>Friday Mass 07:00PM</option>";
                            } else if  ((date("H")>6) && (date("H")<11)) {
                                $return .= "<option value='0'  disabled >Friday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_12:00PM'>Friday Mass 12:00PM</option>";
                                $return .= "<option value='MASS_07:00PM'>Friday Mass 07:00PM</option>";
                            } else if  ((date("H")>10) && (date("H")<18)) {
                                $return .= "<option value='0'  disabled>Friday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Friday Mass 12:00PM (Booking Closed)</option>";
                                $return .= "<option value='MASS_07:00PM'>Friday Mass 07:00PM</option>";
                            } else {
                                $return .= "<option value='0'  disabled>Friday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Friday Mass 12:00PM (Booking Closed)</option>";
                                $return .= "<option value='0'>Friday Mass 07:00PM (Booking Closed)</option>";  
                            }
                        } else { 
                            $return .= "<option value='MASS_06:00AM'>Friday Mass 06:00AM </option>";
                            $return .= "<option value='MASS_12:00PM'>Friday Mass 12:00PM</option>";
                            $return .= "<option value='MASS_07:00PM'>Friday Mass 07:00PM</option>";
                        }
                        break;
                case 'saturday' :
                        
                        if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { // for today
                            if (date("H")<5) {
                                $return .= "<option value='MASS_06:00AM'>Saturday Mass 06:00AM </option>";
                                $return .= "<option value='MASS_12:00PM'>Saturday Mass 12:00PM</option>";
                                $return .= "<option value='MASS_07:00PM'>Saturday Mass 07:00PM</option>";
                            } else if  ((date("H")>6) && (date("H")<11)) {
                                $return .= "<option value='0'  disabled >Saturday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_12:00PM'>Saturday Mass 12:00PM</option>";
                                $return .= "<option value='MASS_07:00PM'>Saturday Mass 07:00PM</option>";
                            } else if  ((date("H")>10) && (date("H")<18)) {
                                $return .= "<option value='0'  disabled>Saturday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0'  disabled>Saturday Mass 12:00PM (Booking Closed)</option>";
                                $return .= "<option value='MASS_07:00PM'>Saturday Mass 07:00PM</option>";
                            } else {
                                $return .= "<option value='0' disabled>Saturday Mass 06:00AM (Booking Closed)</option>";
                                $return .= "<option value='0' disabled>Saturday Mass 12:00PM (Booking Closed)</option>";
                                $return .= "<option value='0'>Saturday Mass 07:00PM (Booking Closed)</option>";  
                            }
                        } else { // for future
                            $return .= "<option value='MASS_06:00AM'>Saturday Mass 06:00AM</option>";
                            $return .= "<option value='MASS_12:00PM'>Saturday Mass 12:00PM</option>";
                            $return .= "<option value='MASS_07:00PM'>Saturday Mass 07:00PM</option>";
                        }
                        break;
                 case 'sunday' :
                        
                        if (strtotime(date("Y-m-d"))==strtotime($_REQUEST['mdate'])) { 
                         
                            if (date("H")<6) {
                                $return .= "<option value='MASS_07:00AM'>Sunday Mass 07:00AM</option>";
                                $return .= "<option value='MASS_11:00AM'>Sunday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:30PM'>Sunday Mass 05:30PM</option>";
                            } else if (date("H")<10) {
                                $return .= "<option value='0'  disabled>Sunday Mass 07:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_11:00AM'>Sunday Mass 11:00AM</option>";
                                $return .= "<option value='MASS_05:30PM'>Sunday Mass 05:30PM</option>";
                      
                            } else if  ((date("H")>6) && (date("H")<16)) {
                                $return .= "<option value='0'  disabled>Sunday Mass 07:00AM (Booking Closed)</option>";
                                $return .= "<option value='0' disabled>Sunday Mass 11:00AM (Booking Closed)</option>";
                                $return .= "<option value='MASS_05:30PM'>Sunday Mass 05:30PM</option>";
                            } else {
                                $return .= "<option value='0'  disabled>Sunday Mass 07:00AM (Booking Closed)</option>";
                                $return .= "<option value='0' disabled>Sunday Mass 11:00AM (Booking Closed)</option>";
                                $return .= "<option value='0' disabled>Sunday Mass 05:30PM (Booking Closed)</option>";
                            }
                        } else { 
                             $return .= "<option value='MASS_07:00AM'>Sunday Mass 07:00AM</option>";
                             $return .= "<option value='MASS_11:00AM'>Sunday Mass 11:00AM</option>";
                             $return .= "<option value='MASS_05:30PM'>Sunday Mass 05:30PM</option>";
                        }
                        break;
        }
                $return .= "</select>";
                echo $return;
  ?>

