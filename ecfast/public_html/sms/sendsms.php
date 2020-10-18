<?php 
    include_once("header.php"); 
    if (!(loginCheck())) {
        echo "<script>location.href='index.php';</script>";
    } 
    
    $senderids = getSenderIds($_SESSION['user']['id']);
    
    
    if (sizeof($senderids)>0) {
    
        if (isset($_POST['sendsmsbtn'])) {
            
            $errString = ""; 
            
            if (checkValidSenderID($_SESSION['user']['id'],$_POST['senderid'])) {

                if (checkCredits($_SESSION['user']['id'])>0) {
                    
                    $senderID = getSenderId($_SESSION['user']['id'],$_POST['senderid']);

                    $err = 0;
                    $mnumbers = explode(",",$_POST['mobilenumbers']);
                    
                    foreach($mnumbers as $m) {
                        if (!( strlen($m)==10 && $m<9999999999 && $m>7000000000)) {
                            $err++;
                            $errString .= $m.",";
                        }
                    }
                
                    if (strlen($errString)>0) {
                        $errString = "<b>Error:</b>  <span style='color:#333'>Invalid Mobile Number(s):-  ".$errString."</span>";
                    } elseif (strlen(trim($_POST['message']))<5) {
                        $errString = "<b>Error:</b>  <span style='color:#333'>Message should have morethan 5 characters</span>";  
                    } else {
                        
                        $smscount = intval(strlen(trim($_POST['message']))/155);
                        
                        if (strlen(trim($_POST['message']))>$smscount*155) {
                            $smscount++;
                        }
                   
                        foreach($mnumbers as $m) {
                           
                            $id = $mysql->insert("_mobilesms",array("userid"=>$_SESSION['user']['id'],
                                                                    "sid"=>$senderids[0]['sid'],
                                                                    "sendto"=>$m,
                                                                    "message"=>$_POST['message'],
                                                                    "senton"=>date("Y-m-d H:i:s"),
                                                                    "apiresponse"=>"Sent",
                                                                    "sentfrom"=>"panel",
                                                                    "route"=>$_POST['route'],
                                                                    "smscount"=>$smscount));
                            if ($id>0) {
     
$url = "http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=".$senderID['senderid']."&phone=".$m."&text=".urlencode(trim($_POST['message']))."&priority=ndnd&type=".$_POST['route'];
//$url = "http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=".$senderID['senderid']."&phone=".$m."&text=".urlencode(trim($_POST['message']))."&priority=ndnd&type=unicode";
                                       $api = file_get_contents($url);   
                                $mysql->execute("update _mobilesms set remarks='".$url."', apiresponse='".$api."' where id=".$id);
                                $errString = "<b style='color:blue'>Successfully Sent. Used Credits ".$smscount*sizeof($mnumbers)."</b>";
                            } else {
                                $errString = "Error Sending SMS";
                            }

                        }
                    }
                } else {
                    $errString = "Couldn't send sms, You don't have Credits";
                }

            } else {
                $errString = "Invalid Sender's ID";     
            }

        }
        
        function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}
 
 
?>  
 <div style="text-align:right">
    <a href='batches.php'>Veiw Transaction</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href='excelsms.php'>Send SMS from Excel</a>
 </div>
 
        <h3>Compose Message</h3>
        <form action="" method="post">
         <table cellpadding="5" cellspacing="0">
            <tr>
                <td>Sender's ID</td>
                <td>:</td>
                <td><select name="senderid" style="width:80px;padding:2px;">
                <?php foreach($senderids as $d) {?>
                    <option value="<?php echo $d['sid'];?>"><?php echo $d['senderid'];?></option>
                <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td style="vertical-align:top;width:150px;">Mobile Numbers<br>
                <span style='color:#888;font-size:11px;text-align:justify'>
                for multiple mobile numbers please seperate with commas for each mobile number. maximum allowed 50 mobile numbers for send sms as single executions.
                </span>
                </td>
                <td style="vertical-align:top;">:</td>
                <td><textarea style="height:120px;width:400px;" name="mobilenumbers"><?php echo isset($_POST['mobilenumbers']) ? $_POST['mobilenumbers'] : '';?></textarea></td>
            </tr>
            <tr>
                <td style="vertical-align:top;">Message<br>
                 <span style='color:#888;font-size:11px;text-align:justify'>
                 Maximum allowed 1000 characters.<br> 
                 1 Credits = 155 characters.
                </span>
                </td>
                <td style="vertical-align:top;">:</td>
                  <td><textarea onKeyDown="limitText(this.form.message,'result',1000);" 
onKeyUp="limitText(this.form.message,'result',1000);" maxlength="1000" style="height:120px;width:400px;" id="message" name="message"><?php echo isset($_POST['message']) ? $_POST['message'] : '';?></textarea>
<div id="result" style="color:#999">You have 1000 characters left</div>
</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>:</td>
                <td>
                    <select name="route" style="width:80px;padding:2px;">
                        <option value="normal" <?php echo ($_POST['route']=="normal") ? " selected='selected' " : "";?> >Normal</option>
                        <option value="unicode" <?php echo ($_POST['route']=="unicode") ? " selected='selected' " : "";?>  >Unicode</option>
                    </select>
                </td>
            </tr>
            <?php if (isset($errString)) {?>
            <tr>
                <td></td>
                <td></td>
                <td style="color:red"><?php echo $errString;?></td>
            </tr>
            <?php } ?>
            <tr>
                <td><input type="submit" value="Send SMS" class="myButton" name="sendsmsbtn"></td>
            </tr>
         </table>
         </form>
        </td>
    </tr>		
</table>

<?php } else { ?>
    
    Please Contact Administrator
<?php } ?>
<script language="javascript" type="text/javascript">

function lengthInUtf8Bytes(str) {
  // Matches only the 10.. bytes that are non-initial characters in a multi-byte sequence.
  var m = encodeURIComponent(str).match(/%[89ABab]/g);
  return str.length + (m ? m.length : 0);
}

function limitText(limitField, limitCount, limitNum) {
    var x = "";
   // var len = lengthInUtf8Bytes(limitField.value);
   // if (len > limitNum) {
    if (limitField.value.length > limitNum) {
        x = limitField.value.substring(0, limitNum);
    } else {
        x = limitNum - limitField.value.length;
    }   
    $('#result').html("Current Message Length is "+limitField.value.length+". You have "+x+" characters left");
}
</script>
 
