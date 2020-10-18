<?php include_once("header.php"); ?>

<div>
  <?php
  if ($_POST['isStart']) {
    $bb = $mysql->select("select * from _tblbatch where batchid=".$_POST['batchid']);
    
    if (strlen(trim($bb[0]['started']))==0) {
        $mysql->execute("update _tblbatch set started='".date("Y-m-d H:i:s")."' where batchid=".$_POST['batchid']);   
        $mysql->execute("update _tblbatchdetails set isstart='1' where batchid=".$_POST['batchid']);   
        $result = exec('cron.php?id='.$_POST['batchid'].' > tmp/'.$_POST['batchid'].'.txt &');
        echo "Process Started";
        $sms = $mysql->select("select * from _tblbatchdetails where isstart=1 and msgtxnid=0 and istaken=0 and isvalidtoexec=1  and batchid=".$_POST['batchid']); 
         
        
        foreach($sms as $s) {
            
            if (checkCredits($_SESSION['user']['id'])>0) {
                
                $mysql->execute("update _tblbatchdetails set istaken='1', takenon='".date("Y-m-d H:i:s")."' where id=".$s['id']);
                
                $id = $mysql->insert("_mobilesms",array("userid"=>$_SESSION['user']['id'],
                                                        "sid"=>$s['sid'],
                                                        "sendto"=>$s['mnumber'],
                                                        "message"=>$s['message'],
                                                        "senton"=>date("Y-m-d H:i:s"),
                                                        "apiresponse"=>"Sent",
                                                        "sentfrom"=>"excel".$s['batchid'],
                                                        "route"=>$s['mtype'],
                                                        "smscount"=>$s['credits']));
                if ($id>0) {
                    $url = "http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=".$s['senderid']."&phone=".$s['mnumber']."&text=".urlencode(trim($s['message']))."&priority=ndnd&type=".$s['mtype'];
                    $api = file_get_contents($url);   
                    $mysql->execute("update _mobilesms set remarks='".$url."', apiresponse='".$api."' where id=".$id);
                    $mysql->execute("update _tblbatchdetails set msgtxnid='".$id."', smsstatus='Sent',statusupdatedon='".date("Y-m-d")."' where id=".$s['id']);
                    $mysql->execute("update _tblbatch set messagesent=messagesent+'".$s['credits']."' where batchid=".$s['batchid']);
                    
                } else {
                    //$errString = "Error Sending SMS";
                    $mysql->execute("update _tblbatchdetails set msgtxnid='0', status='UnknownError',statusupdatedon='".date("Y-m-d")."' where id=".$s['id']);
                }
                            
               }  else {
                   $mysql->execute("update _tblbatchdetails set msgtxnid='0', status='Insufficiant Credits',statusupdatedon='".date("Y-m-d")."' where id=".$s['id']);
               }
               
               $mysql->execute("update _tblbatchdetails set ended='".date("Y-m-d")."' where id=".$s['id']);
        }
        
        
    }  else {
        echo "Error";
    }
    
  }
                             ?>
</div>
<?php include_once("footer.php"); ?>
