<?php include_once("header.php"); 
 if (!(loginCheck())) {
        echo "<script>location.href='index.php';</script>";
    } 
     
?> 
 
                <h3>API Details</h3><br>
                
                <div style="color:#444">
                    <b style="color:#A52A2A">Send SMS API - Single SMS</b><br><br>
                    <u>Request:</u>&nbsp;http://<?php echo $_SERVER['HTTP_HOST'];?>/sendmobilesms.php?username=<?php echo $_SESSION['user']['username'];?>&password=******&senderid=&lt;senderid&gt;&sendto=&lt;mobilenumber&gt;&message=&lt;message&gt;&gt;&type=&lt;normal/unicode&gt; <br>
                    <u>Response:</u>&nbsp;SUCCESS,Txnid,requestedon<br><br>
             
                    <b style="color:#A52A2A">Balance API</b><br><br>
                    <u>Request:</u>&nbsp;http://<?php echo $_SERVER['HTTP_HOST'];?>/balance.php?username=<?php echo $_SESSION['user']['username'];?>&password=******<br>
                    <u>Response:</u>&nbsp;SUCCESS,balance,requestedon <br><br>
             
             
                    <b style="color:#A52A2A">Parameters</b><Br><br>
                    <u>username:</u> API Username<br>
                    <u>password:</u> API Password<br>
                    <u>senderid:</u> Allocated Sender's ID<br>
                    <u>sendto:</u> 10 digits Indian Valid Mobile Number<br>
                    <u>message:</u> A Valid Text short message<br>
                    <u>type:</u> normal for English / Unicode for Non-English <br>
                </div>    
            </td>
        </tr>		
    </table>