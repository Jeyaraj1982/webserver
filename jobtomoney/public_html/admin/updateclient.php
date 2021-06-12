

 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">


<h5 style="text-align: left;font-family: arial;">Update Client</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 


    <?php
    if (isset($_POST['addComment'])) {
          $data = $mysql->select("select * from _clients where id=".$_POST['clientid']);      
          
          $insArray = array("id"=>'Null',"clientid"=>$_POST['clientid'],"reason"=>$_POST['reason'],"status"=>$_POST['status'],"postedon"=>date("Y-m-d H:i:s"),"postedby"=>$_SESSION['user']['role']);
          
          $mysql->insert("_comments",$insArray);
          echo "Information successfully updated";
    }


    $data = $mysql->select("select * from _clients where id=".$_POST['clientid']);
    
    if ((isset($_POST['update'])) && ($_POST['update']=="Update") ) {
        $sql = "update _clients set password='".$_POST['password']."',mobileno='".$_POST['mobileno']."',plan='".$_POST['plan']."', sex='".$_POST['sex']."', dateofbirth='".$_POST['dateofbirth']."',lastname='".$_POST['lastname']."',firstname='".$_POST['firstname']."' where id=".$_POST['clientid'];
        $mysql->execute($sql);
        echo "Updated Successfull";
    }

    if ((isset($_POST['block'])) && ($_POST['block']=="Block") ) {
        
         $mysql->execute("update _clients set isblock='1' where id=".$_POST['clientid']); 
         echo "Account has blocked.";
    }
    
    if ((isset($_POST['unblock'])) && ($_POST['unblock']=="UnBlock") ) {
        
         $mysql->execute("update _clients set isblock='0' where id=".$_POST['clientid']); 
         echo "Account has unblocked.";
    }
   
    
    if (isset($_POST['adPostingActive'])) {
                                    
        $userinformation = $mysql->select("select * from _clients where id=".$_POST['clientid']);
                                    $link=$userinformation[0]['id']."-".getrealname($userinformation[0]['firstname']);
                                    $mysql->execute("update _clients set `isactive`='1',`isblock`='0', userlink='".$link."',adposting_enabled='1',adposting_enabledon='".date("Y-m-d H:i:s")."' where id=".$userinformation[0]['id']);
                                    
                                    $message = "Dear ".$userinformation[0]['firstname'].", Your account (ID: ".$userinformation[0]['id'].") has been activated and enabled ad posting job. Thanks jobtomoney.com";
                                    MobileSMS::sendSMS($userinformation[0]['mobileno'],$message,$userinformation[0]['id']);
                                    
                                    $t = "Your account has been activated.<br>";
                                    $t .= "Your Password : ".$userinformation[0]['password']."<br>";
                                    $t .= "Your Link : https://www.jobtomoney.com/".$link."<br>";
                                    $t .= "Thanks<br>jobtomoney Team.";
        
                                    MailController::Send(array("MailTo"     => $userinformation[0]['emailid'],
                                                               "Category"   => "Activation",
                                                               "MemberID"   => $userinformation[0]['id'],
                                                               "Subject"    => "Your account activated  with adposting job",
                                                               "Message"    => $t),$mailError);
                                    
                                    if ($userinformation[0]['referringby']>0) {
                                        $cramount = getReferalIncome(1);
                                        $referalinfo = $mysql->select("select * from _clients where id='".$userinformation[0]['referringby']."'");
                                        $mysql->insert("_clients_account",array("clientid"    => $userinformation[0]['referringby'],
                                                                                "date"        => date("Y-m-d H:i:s"),
                                                                                "particulars" => "New User Activation/".$userinformation[0]['id']."/adpostingjob",
                                                                                "cramount"    => $cramount,
                                                                                "dramount"    => '0',
                                                                                "description" => "New User Activation/".$userinformation[0]['id']."/adpostingjob"));  
                                    }                            
                                                              
                                    if (isset($referalinfo) && sizeof($referalinfo)>0) {
                                        $rmessage = "Dear ".$referalinfo[0]['firstname'].", You refered member (ID: ".$referalinfo[0]['id'].") has been activated and enabled ad posting job. You have earned (Rs. ".number_format($cramount,2)."). Thanks jobtomoney.com";
                                        MobileSMS::sendSMS($referalinfo[0]['mobileno'],$rmessage,$referalinfo[0]['id']); 
                                        MailController::Send(array("MailTo"     => $referalinfo[0]['emailid'],
                                                                   "Category"   => "Activation",
                                                                   "MemberID"   => $referalinfo[0]['id'],
                                                                   "Subject"    => "You refered member (ID: ".$referalinfo[0]['id'].") activated and enabled ad posting job",
                                                                   "Message"    => $rmessage),$mailError);
                                    }
                                    
                                    echo "Ad Posting Job Activation mail sent to client with login  .<br>"; 
                                }
                                
                                if (isset($_POST['emailJobActive'])) {
                                    
                                    $userinformation = $mysql->select("select * from _clients where id=".$_POST['clientid']);
                                    
                                    $mysql->execute("update _clients set `isactive`='1',`isblock`='0', emailjob_enabled='1',emailjob_enabledon='".date("Y-m-d H:i:s")."' where id=".$userinformation[0]['id']); 
                                    $message = "Dear ".$userinformation[0]['firstname'].", Your account (ID: ".$userinformation[0]['id'].") has been activated and enabled email sending job. Thanks jobtomoney.com";
                                    MobileSMS::sendSMS($userinformation[0]['mobileno'],$message,$userinformation[0]['id']);
                                    
                                   
                                    $t = "Your account has been activated  with email sending job.<br>";
                                    $t .= "Your Password : ".$userinformation[0]['password']."<br>";
                                    $t .= "Thanks<br>jobtomoney Team.";
                                    
                                    MailController::Send(array("MailTo"     => $userinformation[0]['emailid'],
                                                               "Category"   => "Activation",
                                                               "MemberID"   => $userinformation[0]['id'],
                                                               "Subject"    => "Your account activated with sms sending job",
                                                               "Message"    => $t),$mailError);
                                    
                                    if ($userinformation[0]['referringby']>0) {
                                        $cramount = getReferalIncome(2);
                                        $referalinfo = $mysql->select("select * from _clients where id='".$userinformation[0]['referringby']."'");
                                        $mysql->insert("_clients_account",array("clientid"    => $userinformation[0]['referringby'],
                                                                                "date"        => date("Y-m-d H:i:s"),
                                                                                "particulars" => "New User Activation/".$userinformation[0]['id']."/emailsendingjob",
                                                                                "cramount"    => $cramount,
                                                                                "dramount"    => '0',
                                                                                "description" => "New User Activation/".$userinformation[0]['id']."/emailsendingjob"));  
                                    }
                                                              
                                    if (isset($referalinfo) && sizeof($referalinfo)>0) {
                                        $rmessage = "Dear ".$referalinfo[0]['firstname'].", You refered member (ID: ".$referalinfo[0]['id'].") has been activated and enabled email sending job. You have earned (Rs. ".number_format($cramount,2)."). Thanks jobtomoney.com";
                                        MobileSMS::sendSMS($referalinfo[0]['mobileno'],$rmessage,$referalinfo[0]['id']); 
                                        MailController::Send(array("MailTo"     => $referalinfo[0]['emailid'],
                                                                   "Category"   => "Activation",
                                                                   "MemberID"   => $referalinfo[0]['id'],
                                                                   "Subject"    => "You refered member (ID: ".$referalinfo[0]['id'].") activated and enabled email sending job",
                                                                   "Message"    => $rmessage),$mailError);
                                    }
                                    
                                    echo "Email Sending Job Activation mail sent to client with login  .<br>"; 
                                }
                                
                                if (isset($_POST['smsJobActive'])) {
                                    
                                     $userinformation = $mysql->select("select * from _clients where id=".$_POST['clientid']);
                                     
                                     $mysql->execute("update _clients set `isactive`='1',`isblock`='0', smsjob_enabled='1',smsjob_enabledon='".date("Y-m-d H:i:s")."' where id=".$userinformation[0]['id']); 
                                     $message = "Dear ".$userinformation[0]['firstname'].", Your account (ID: ".$userinformation[0]['id'].") has been activated and enabled sms sending job. Thanks jobtomoney.com";
                                     MobileSMS::sendSMS($userinformation[0]['mobileno'],$message,$userinformation[0]['id']);
                                     
                                     $t = "Your account has been activated with sms sending job.<br>";
                                     $t .= "Your Password : ".$userinformation[0]['password']."<br>";
                                     $t .= "Thanks<br>jobtomoney Team.";
                                     
                                     MailController::Send(array("MailTo"    =>$userinformation[0]['emailid'],
                                                                "Category"  =>"Activation",
                                                                "MemberID"  =>$userinformation[0]['id'],
                                                                "Subject"   =>"Your account activated with sms sending job",
                                                                "Message"   =>$t ),$mailError);

                                      if ($userinformation[0]['referringby']>0) {
                                        $cramount = getReferalIncome(3);
                                        $referalinfo = $mysql->select("select * from _clients where id='".$userinformation[0]['referringby']."'");
                                        $mysql->insert("_clients_account",array("clientid"    => $userinformation[0]['referringby'],
                                                                                "date"        => date("Y-m-d H:i:s"),
                                                                                "particulars" => "New User Activation/".$userinformation[0]['id']."/smssendingjob",
                                                                                "cramount"    => $cramount,
                                                                                "dramount"    => '0',
                                                                                "description" => "New User Activation/".$userinformation[0]['id']."/smssendingjob"));  
                                    }
                                     if (isset($referalinfo) && sizeof($referalinfo)>0) {
                                         $rmessage = "Dear ".$referalinfo[0]['firstname'].", You refered member (ID: ".$referalinfo[0]['id'].") has been activated and enabled sms sending job. You have earned (Rs. ".number_format($cramount,2)."). Thanks jobtomoney.com";
                                         MobileSMS::sendSMS($referalinfo[0]['mobileno'],$rmessage,$referalinfo[0]['id']); 
                                         
                                         MailController::Send(array("MailTo"    => $referalinfo[0]['emailid'],
                                                                    "Category"  => "Activation",
                                                                    "MemberID"  => $referalinfo[0]['id'],
                                                                    "Subject"   => "You refered member (ID: ".$referalinfo[0]['id'].") activated and enabled sms sending job",
                                                                    "Message"   => $rmessage),$mailError);
                                     }
                                     
                                       echo "SMS Sending Job Activation mail sent to client with login  .<br>"; 
                                } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    if ((isset($_POST['active_____________'])) && ($_POST['active']=="Active_______________") ) {
        // Update link
        $data = $mysql->select("select * from _clients where id=".$_POST['clientid']);
        $link=$data[0]['id']."-".getrealname($data[0]['firstname']);
       // $link=getLink(10,getrealname($data[0]['firstname']));
        
        $mysql->execute("update _clients set userlink='".$link."' where id=".$_POST['clientid']);
        
      
        echo "Account Id : ".$data[0]['id']."<br>";
        echo "Updated user link.<br>";
        echo "https://www.jobtomoney.com/".$link."<br>";
        
       $mysql->execute("update _clients set isblock='0', isactive='1', activatedon='".date("Y-m-d H:i:s")."' where id=".$_POST['clientid']);        
       
       $ref = $mysql->select("select * from _clients where id=".$data[0]['referringby']);
       //$ref_x = $mysql->select("select * from _clients where id=".$ref[0]['referringby']);
       
       $cramount = 0;
       
       
       function getCurrency($country) {
            
           switch($country) {
               case 'dubai' : return "AED"; break;
               case 'india' : return "RS"; break;
               case 'malaysia' :   return "MYR"; break;
               case 'singapore' : return "SGD"; break;
           }
       }
       
       function getAmount($country,$plan) {
           
           switch($plan) {
                case '1' :
                    return '100';
                    break;
                case '2' :
                    return "1000";
                    break;
                default : 
                    return "0";
                    break;
           }
       }
       
       
       switch($ref[0]['plan']) {
           
           case '1' : 
                        $cramount = getAmount($ref[0]['country'],1);
                        break;
           case '2' :
                        if ($data[0]['plan']==1) {
                            $cramount = getAmount($ref[0]['country'],1);
                        } else if ($data[0]['plan']==2) {
                            $cramount = getAmount($ref[0]['country'],2);    
                        }
                        break;
                               
       }
       $cramount_ref =  $cramount;
       
       echo "Account Activated.<br>";
      
       $array = array("clientid"=>$data[0]['referringby'],
                      "date"=>date("Y-m-d H:i:s"),
                      "particulars" => "New User Activation",
                      "cramount" => $cramount,
                      "dramount" => '0',
                      "description"=>"New User Activation");
       
       
        $recordId = $mysql->insert("_clients_account",$array);  
        
     /*
       if ((sizeof($ref)>0) && ($ref[0]['referringby']>0)) {    

       $array = array("id"=>'Null',
      "clientid"=>$ref[0]['referringby'],
       "date"=>date("Y-m-d H:i:s"),
       "particulars" => "New User Activation",
       "cramount" => $cramount_ref,
       "dramount" => '0',
       "description"=>"New User Activation"
       );   */

        $recordId = $mysql->insert("_clients_account",$array);  
        
       
        
        echo "Added ".getCurrency($ref[0]['country']).". ".$cramount." in Account Id :".$data[0]['referringby']." <br>";

         if ((sizeof($ref)>0) && ($ref[0]['referringby']>0)) {       
         echo "Added Rs. ".$cramount_ref." in Account Id :".$ref[0]['referringby']." <br>";
         } 
       
         $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: info@jobtomoney.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        
        $t = "Your account has been activated.<br>";
        $t .= "Your Password : ".$data[0]['password']."<br>";
        $t .= "Your Link : https://www.jobtomoney.com/".$link."<br>";
        $t .= "Thanks<br>jobtomoney Team.";
        
        
         mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
         mail(trim($data[0]['emailid']),"Your account has been activated",$t,$headers); 
         mail("info@jobtomoney.com",trim($data[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
          echo "Activation mail sent to client with login and link information.<br>"; 
           
          
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>";          
        
    }
    
     
?>


</div>
</div>
               </div>
              

   
    </div>
</div>

 