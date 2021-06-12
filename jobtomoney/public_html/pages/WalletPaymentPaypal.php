<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <form action="" method="post">  
                <div id="formwindow" class="formwindow">
                   
                     <?php
         // print_r($_POST)          ;
$txnid=isset($_POST["txn_id"]) ? $_POST['txn_id'] : 0;
$response = json_encode($_POST);
// Salt should be same Post Request 

$data = $mysql->select("select * from  _tblPayments  where PaymentID='".$txnid."' and IsProcessed='0'");

    if (sizeof($data)==1) {
        $txn  = $mysql->select("select * from _tblPayments where PaymentID='".$txnid."'");
    
        if ($_POST['payment_status'] != "Completed") {
            $mysql->execute("update _tblPayments set TxnStatus='Failure' where PaymentID='".$txnid."'");
            ?>
                <div style="text-align:center;font-size:15px;color:#555">
                    <img src="assets/failure.png" style="width:256px;margin:0px auto">
                    <span style="font-size:30px;">Payment Failure</span><br>
                </div>
            <?php
        } else {
            $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentID='".$txnid."'");
            $txn  = $mysql->select("select * from _tblPayments where PaymentID='".$txnid."'");
            $mysql->execute("update _tblPayments set IsProcessed='1' where PaymentID='".$txnid."'");
           //  $xRecords = $mysql->select("select * from _acc_txn where userid='".$_SESSION['USER']['userid']."' and IsWalletUpdateUsingPG='1' ");
            $mysql->insert("_acc_txn", array("userid"=>$_SESSION['USER']['userid'],
                                             "txndate"=>date("Y-m-d H:i:s"),
                                             "particulars"=>"Wallet Update/PG:Paypal/".$_GET['payment_id'],
                                             "actualamt"=>$txn[0]['TxnAmount'],
                                             "cramount"=>$txn[0]['TxnAmount'],
                                             "dramount"=>"0",
                                             "transactionid"=>$txnid,
                                             "IsWalletUpdateUsingPG"=>'1',     
                                             "abalance"=>$dealmaass->getBalance()  + $txn[0]['TxnAmount'],
                                             "paymentstatus"=>"SUCCESS"));
                                             
               $mysql->insert("_tblPoints", array("userid"=>$_SESSION['USER']['userid'],
                                             "TxnDate"=>date("Y-m-d H:i:s"),
                                             "Particulars"=>"Wallet Update/PG/".$_GET['payment_id']."/".$txn[0]['TxnAmount'],
                                             "Credits"=>$txn[0]['TxnAmount'],
                                             "Debits"=>"0",
                                             "Balance"=>$dealmaass->getPoints($_SESSION['USER']['userid'])+$txn[0]['TxnAmount'],
                                             "PaymentID"=>$txnid));
          //  if (sizeof($xRecords)==0) {
                
              
                $cramt = $txn[0]['TxnAmount']*(40/100);
                if ($_SESSION['USER']['referedby']>0) {
                    $mysql->insert("_acc_txn", array("userid"=>$_SESSION['USER']['referedby'],
                                                     "txndate"=>date("Y-m-d H:i:s"),
                                                     "particulars"=>"Wallet Update Earn 40%/".$_SESSION['USER']['userid']."/INR ".$txn[0]['TxnAmount'],
                                                     "actualamt"=>$cramt,
                                                     "cramount"=>$cramt,
                                                     "dramount"=>"0",
                                                     "IsReferalIncome"=>"1",
                                                     "transactionid"=>"0",
                                                     "abalance"=>$dealmaass->getUserBalance($_SESSION['USER']['referedby'])  + $cramt,
                                                     "paymentstatus"=>"Credited"));
                }
           // }
            ?>
            <div style="text-align:center;font-size:15px;color:#555">
                <img src="assets/success.png" style="width:256px;margin:0px auto">
                <span style="font-size:30px;">Payment Success</span><br>
                Wallet Updated.    <br><br>
                Available Points <?php echo $dealmaass->getBalance();?> .Click to <a href="PlayAndWin">Play Game</a><br><Br><br>
            </div>
            <?php 
           }
    } else {
        echo "Access denied";
    } 
?>
                </div>
            </form>
        </article>
    </div>
</div>