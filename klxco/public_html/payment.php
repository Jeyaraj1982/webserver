<?php
    include_once("header.php");
    $adID = $_GET['ad'];

    $d = JPostads::getAd($adID,isset($_SESSION['USER']['userid']) ? $_SESSION['USER']['userid'] : 0);
    $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
    $t = "";
    foreach(explode(" ",$d[0]['title']) as $x) {
        if (trim($x)!="") {
            $x = str_replace(array(","),"",trim($x));
           $t.=trim($x); 
        }
        $t.="-";
    }
   $t .= $d[0]['postadid']; 
?>
<div id="formwindow" class="formwindow">
    <?php
      
        $data = $mysql->select("select * from  _tblPayments  where PaymentReqID='".$_GET['payment_request_id']."' and IsProcessed='0'");
        if (sizeof($data)==1) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$_GET['payment_request_id'].'/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:468c59be22114b0758c7a2de315b62e9",
                                                      "X-Auth-Token:61d14dcaffb13d678b3cf98377052f16"));
            $response = curl_exec($ch);
            $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentReqID='".$_GET['payment_request_id']."'");
            
            curl_close($ch); 
            $response = json_decode($response,true);
            
            $txn  = $mysql->select("select * from _tblPayments where PaymentReqID='".$_GET['payment_request_id']."'");
            
            if ($response['payment_request']['payments'][0]['status']=='Credit') {
                
                $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentReqID='".$_GET['payment_request_id']."'");
                $sel_ad = $mysql->select("select * from _jpostads where postadid='".$txn[0]['AdID']."'");
                $mysql->insert("_tbl_featured",array("adid"           => $txn[0]['AdID'],
                                                     "categoryid"     => $sel_ad[0]['categid'],
                                                     "categoryname"   => "0",
                                                     "subcategoryid"  => $sel_ad[0]['subcateid'],
                                                     "subcategoryname"=> "0",
                                                     "countryid"      => "1",                  
                                                     "countryname"    => "India",                  
                                                     "stateid"        => $sel_ad[0]['stateid'],
                                                     "statename"      => "0",
                                                     "districtid"     => $sel_ad[0]['distcid'],
                                                     "districtname"   => "0",
                                                     "paymentid"      => $txn[0]['PaymentID'],
                                                     "duration"       => $txn[0]['Days'],
                                                     "startdate"      => date("Y-m-d H:i:s"),
                                                     "enddate"        => date('Y-m-d H:i:s', strtotime(' + '.$txn[0]['Days'].' days')),
                                                     "faamount"       => $txn[0]['TxnAmount'],
                                                     "createdon"      => date("Y-m-d H:i:s")));
                // $headers = "MIME-Version: 1.0\r\n";
                // $headers .= "From: info@kasupanamthuttu.com\r\n";
                // $headers .= "Content-type: text/html\r\n";
                // $headers .= "X-Mailer: PHP/".phpversion();
        
                // $t = "Your account has been activated.<br>";
                // $t .= "Your Password : ".$data[0]['password']."<br>";
                // $t .= "Your Link : https://www.kasupanamthuttu.com/".$link."<br>";
                // $t .= "Thanks<br>kasupanamthuttu Team.";
        
                // mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
                // mail(trim($userinformation[0]['emailid']),"Your account has been activated",$t,$headers); 
                // mail("info@kasupanamthuttu.com",trim($userinformation[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
                $franchisee = $mysql->select("select * from _tbl_franchisee where DistrictID='".$sel_ad[0]['distcid']."'");
                if (sizeof($franchisee)>0) {
                    $mysql->insert("_tbl_franchisee_wallet",array("FranchiseeID"      => $franchisee[0]['userid'],
                                                                  "TxnDate"           => date("Y-m-d H:i:s"),
                                                                  "Particulars"       => "Commission for Feature ad Activation :[AD ID: ".$txn[0]['AdID']."] [Days: ".$txn[0]['Days']."] [Cost: ".$txn[0]['TxnAmount']."]",
                                                                  "Credits"           => $txn[0]['TxnAmount']/2,
                                                                  "Debits"            => "0",
                                                                  "Balance"           => $application->getBalance($franchisee[0]['userid'])+($txn[0]['TxnAmount']/2),
                                                                  "PaymentID"         => $txn[0]['PaymentID'],
                                                                  "WithdrwaID"        => "0",
                                                                  "FranchiseeRemarks" => "",
                                                                  "AdminRemarks"      => ""));
                }
                ?>
                <div style="text-align:center;font-size:15px;color:#555">
                    <img src="https://www.klx.co.in/assets/img/success.png" style="width:96px;margin:0px auto">
                    <div style="font-size:30px;">Payment Success</div>
                    Your ad has activated.<br><br>
                </div>
                <?php 
            } else { 
                $mysql->execute("update _tblPayments set TxnStatus='Failure' where PaymentReqID='".$_GET['payment_request_id']."'");
                ?>
                <div style="text-align:center;font-size:15px;color:#555">
                    <img src="https://www.klx.co.in/assets/img/failure.png" style="width:256px;margin:0px auto">
                    <div style="font-size:30px;">Payment Failure</div>
                </div>
                <?php
            }
        } else {
            echo "Access denied";
        }
?>
</div>
<?php include_once("footer.php"); ?>