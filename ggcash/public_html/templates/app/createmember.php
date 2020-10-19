 <?php
         
 ?>
  <!-- Content
  ============================================= -->
  <div id="content">
  <div class="login-signup-page mx-auto my-5">
      <h3 class="font-weight-400 text-center" id="headH3">Create Member</h3>
      <p class="lead text-center"></p>
      <div class="bg-light shadow-md rounded p-4 mx-2">
      <?php
      
      
 
class MySqldatabase {
        
        var $link; 
        var $dbName = "";
        var $qry    = "";
        
        public function MySqldatabase($dbHost,$dbUser,$dbPass,$dbName){
            $this->dbName = $dbName;
            $this->link = mysql_connect($dbHost,$dbUser,$dbPass) or die("Error");
        }
        
        public function select($sql,$ass=false) {
            
            
            mysql_select_db($this->dbName,$this->link);

            $resultData = array();
            $result     = mysql_query($sql,$this->link);
            
            if ($ass) {
                return mysql_fetch_assoc($result); 
            }
            
            if ($result) { 
                
                if (mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $resultData[]=$row;
                    }
                    mysql_free_result($result);  
                }
            }
            
            return $resultData;
        }
        
        public function execute($sql) {
            
            $this->qry = $sql;
            mysql_select_db($this->dbName,$this->link);
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows();
        }
        
        public function insert($tableName,$rowData) {
            
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

            $this->qry=$sql;  
            mysql_query($this->qry,$this->link) ;
            return mysql_insert_id($this->link);
        }
        
        public  function update($tableName,$rowData,$where) {
            
            $r = "update `".$tableName."` set ";
 
            foreach($rowData as $key => $value) {
                $r.="`".$key."`='".$value."',";
            }
            $r = substr($r,0,strlen($r)-1);
            $sql = $r." where ".$where;
            
            mysql_select_db($this->dbName,$this->link);
            $this->qry=$sql;  
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows($this->link);
        }
        
        public function dbClose() {
            mysql_close($this->link);
        }
    }
    
     $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
     
    class MobileSMS {
        
        public static function sendSMS($mobileNumber,$text,$memberID="") {
            global $mysqldb;
            
                  $member = $mysqldb->select("select * from _tbl_Members where MemberID='".$memberID."'");
            
            
            $id=$mysqldb->insert("_tbl_Log_MobileSMS",array("MemberID"=>$member[0]['MemberID'],
                                                            "MemberCode"=>$member[0]['MemberCode'],
                                                            "SmsTo"=>$mobileNumber,
                                                            "Message"=>$text,
                                                            "Url"=>" ",
                                                            "MessagedOn"=>date("Y-m-d H:i:s")));
            $url = "http://www.aaranju.in/sms/api.php?apiusername=Z2djYXNoQGdtY&apipassword=WlsLmNvbQ==&number=".$mobileNumber."&sender=GOODGW&message=".urlencode($text)."&uid=".$id;                                               
            $mysqldb->execute("update _tbl_Log_MobileSMS set Url='".$url."' where SMSID='".$id."'");
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $mysqldb->execute("update _tbl_Log_MobileSMS set APIResponse='".$response."' where SMSID='".$id."'");
            return $id;
            
        }
    }
 
      
        
        if (isset($_POST['CreateBtn'])) {
            
            $error = 0;
            $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'");
            //echo "SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'";
             
             
            if (!(strlen(trim($_POST['MemberName']))>3)) {
                $error++;
                $errorMsg = "Please enter member name.";
                $errorMember ="Please enter member name.";
            }
          
          $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';  
          if (!(preg_match($regex,strtolower($_POST['MemberEmail'])))) {
            $error++;
            $errorEmail="Email is an invalid email. Please try again.";
            $errorMsg = "Email is an invalid email. Please try again.";
          }                
 
          
          if (!(strlen(trim($_POST['MobileNumber']))==10)) {
                $error++;
                $errorMsg = "Please enter member name.";
                $errorMobile ="Please enter mobile number.";
          }
             
           if (strlen(trim($_POST['MemberPassword']))<6) {
               $error++;
               $errorPassword="Password must be six and more characters";
               $errorMsg ="Password must be six and more characters";
           }
          
            
           if (sizeof($epin)==0) {
                $error++;
                $errorMsg = "Epin information not found";
           }
           
           if (sizeof($epin)>1) {
               $error++;
               $errorMsg = "Couldn't be process. Please contact administrator..";
           }
           
           if (isset($epin[0]['IsUsed']) && $epin[0]['IsUsed']==1) {
               $error++;
               $errorMsg = "Epin already used.";
           }
          
           $url  = "https://www.ggcash.in/app/api.php?action=GetMemberCodeUpLineCode&data=".$_POST['data']."&MemberName=".urlencode($_POST['MemberName']);
        
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL,$url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           $data = curl_exec($ch);
           curl_close($ch); 
           if ($data =="Error") {
               $error++; 
               echo "<div style='text-align:center'><span style='font-size:20px;'>Oops! Something went wrong</span><br>Please contact administrator</div>";
           } 
        
           if ($error==0) {
               
               $data = explode(",",trim($data)); // Member Code, Upline Code    
               $MemberCode=$data[0];
              
            $upline = $mysqldb->select("select * from _tbl_Members where MemberCode='".$data[1]."'");
            
            $MemberID =  $mysqldb->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                               "MemberName"      => $_POST['MemberName'],
                                                               "DateofBirth"     => "0000-00-00 00:00:00",
                                                               "Sex"             => "Male",
                                                               "MobileNumber"    => $_POST['MobileNumber'],
                                                               "MemberEmail"     => $_POST['MemberEmail'],
                                                               "MemberPassword"  => $_POST['MemberPassword'],
                                                               "FatherName"      => "",
                                                               "PanCard"         => "",
                                                               "AdhaarCard"      => "",
                                                               "AddressLine1"    => "",
                                                               "AddressLine2"    => "",
                                                               "AddressLine3"    => "",
                                                               "PinCode"         => "",
                                                               "IsActive"        => "1",
                                                               "CreatedOn"       => date("Y-m-d H:i:s"),
                                                               "SponsorCode"     => $epin[0]['OwnToCode'],
                                                               "SponsorID"       => $epin[0]['OwnToID'],
                                                               "SponsorName"     => $epin[0]['OwnToName'],
                                                               "UplineID"        => $upline[0]['MemberID'],
                                                               "UplineCode"      => $upline[0]['MemberCode'],
                                                               "UplineName"      => $upline[0]['MemberName']));
                                                                          
            $mysqldb->insert("_tblPlacements",array("ParentID"      => $upline[0]['MemberID'],
                                                    "ParentCode"    => $upline[0]['MemberCode'],
                                                    "ParentName"    => $upline[0]['MemberName'],
                                                    "ChildID"       => $MemberID,
                                                    "ChildCode"     => $MemberCode,
                                                    "ChildName"     => $_POST['MemberName'],
                                                    "PlacedByID"    => $epin[0]['OwnToID'],
                                                    "PlacedByCode"  => $epin[0]['OwnToCode'],
                                                    "PlacedByName"  => $epin[0]['OwnToName'],
                                                    "PlacedOn"      => date("Y-m-d H:i:s"),
                                                    "UsedEPin"      => $epin[0]['EPINID'],
                                                    "PlacedFrom"    => "website",
                                                    "Position"      => "L"));
            
            $mysqldb->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where EPINID='".$epin[0]['EPINID']."'");
            MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: http:ggcash.in/login ",$MemberID);
              
            if ($_SESSION['User']['MemberID']==$upline[0]['MemberID']) {
                $sp = $mysqldb->select("select * from _tbl_Members where MemberID='".$epin[0]['OwnToID']."'");
                MobileSMS::sendSMS("Dear ".$sp[0]['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$sp[0]['MemberID']);
            } else {
                $sp = $mysqldb->select("select * from _tbl_Members where MemberID='".$epin[0]['OwnToID']."'");
                MobileSMS::sendSMS("Dear ".$sp[0]['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$sp[0]['MemberID']);
                $up = $mysqldb->select("select * from _tbl_Members where MemberID='".$upline[0]['MemberID']."'");
                MobileSMS::sendSMS("Dear ".$up[0]['MemberName'].", ".$sp[0]['MemberCode']." has created new member and placed under you. Member Information  ".$_POST['MemberName']." (".$MemberCode.") on ".date("M d, Y")."  ",$up[0]['MemberID']);
            }
            ?>
            <style>
            #headH3{display:none}
            </style>
              <div style="text-align:center;padding:50px;">
                                    <img src="app/assets/images/shield.png"><br><br>
                                    <span style='color:green'>Member Created Successfully.</span> 
                                    <br><br>
                                    <table align="center">
                                        <tr>
                                            <td style="text-align: right;">Your Member ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $MemberCode;?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right;">Your Sponsor ID</td>
                                            <td style="text-align: left">:&nbsp;<?php echo $epin[0]['OwnToCode'];?></td>
                                        </tr>
                                          <tr>
                                            <td style="text-align: right;">Your Upline ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $upline[0]['MemberCode'];?></td>
                                        </tr>
                                    </table>
                                </div>
            <?php
            
        } else {
            echo "Couldn't be processed. please contact administrator.<br>".$errorMsg;
        }
        }
       
       
       if (isset($_POST['submitBtn'])) {
           
           $error = 0;
           if (!(isset($_POST['data']))) {
               $error++;
           }
           
           $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'");
           
           if (sizeof($epin)==0) {
                $error++;
           }
           
           if (sizeof($epin)>1) {
                $error++;
           }
           
           if (isset($epin[0]['IsUsed']) && $epin[0]['IsUsed']==1) {
               $error++;
           }
           
           if ($error==0) {
           ?>
           <form action="" id="signupForm" method="post">
                <input type="hidden" value="<?php echo $_POST['data'];?>" name="data">
                <div class="form-group">
                    <label for="Epin">Sponser ID</label>
                    <input type="text" class="form-control" readonly="readonly" value="<?php echo $epin[0]['OwnToCode'];?>">
                </div>
                <div class="form-group">
                    <label for="Epin">Sponser Name</label>
                    <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['OwnToName'];?>">
                </div>
                <div class="form-group">
                    <label for="Epin">E-Pin</label>
                    <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['EPIN'];?>">
                </div>
                <div class="form-group">
                    <label for="fullName">Your Name</label>
                    <input type="text" class="form-control" name="MemberName" id="MemberName" required placeholder="Enter Your Name">
                    <span style="color:red"><?php echo $errorMember;?></span>
                </div>
                <div class="form-group">
                    <label for="emailAddress">Mobile Number</label>
                    <input type="text" class="form-control" name="MobileNumber" id="MobileNumber" required placeholder="Enter Your Mobile Number">
                    <span style="color:red"><?php echo $errorMobile;?></span>
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" name="MemberEmail" id="MemberEmail" required placeholder="Enter Your Email">
                    <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Login Password</label>
                    <input type="password" class="form-control" name="MemberPassword" id="MemberPassword" required placeholder="Enter Password">
                    <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <button class="btn btn-primary btn-block my-4" name="CreateBtn" type="submit">Create Member</button>
              </form>
                 <?php
               
           } else {
               echo "Couldn't processed. please contact administrator";
           }
       }
      ?>
    </div>
    </div>
  <!-- Content end -->
 