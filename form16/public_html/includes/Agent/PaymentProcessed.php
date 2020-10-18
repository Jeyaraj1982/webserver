<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align:center;">
                            <label for="fullname" class="placeholder" style="font-size:36px !important">Payment Status</label>
                            <div class="form-action" style="text-align: center;">
                                <?php
                                    $paymentData = $mysql->select("select * from _tbl_payments where md5(concat(PaymentCode,razorpay_orderid))='".$_GET['PayReq']."' and IsSuccess='0' and IsFailure='0'");
                                    
                                    if (sizeof($paymentData)==1) {
                                        $success = false;
                                        $error = "";
                                        
                                        if (empty($_POST['razorpay_payment_id']) === false) {
                                            
                                            $attributes = array('razorpay_order_id'   => $_SESSION['razorpay_order_id'],
                                                                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                                                                'razorpay_signature'  => $_POST['razorpay_signature']);
                                             try {
                                                 $api->utility->verifyPaymentSignature($attributes);
                                                 $success = true;
                                             } catch(SignatureVerificationError $e) {
                                                 $success = false;
                                                 $error = $e->getMessage();
                                             }
                                         }  
                                                                
                                         if ($success === true) {
                                             
                                             $mysql->execute("update _tbl_payments set IsSuccess='1',razorpay_payment_id='".$_POST['razorpay_payment_id']."',razorpay_response='".json_encode($_POST)."' where  md5(concat(PaymentID,OrderNumber))='".$_GET['PayReq']."'");
                                             //Credit to member wallet
                                             $mysql->insert("_wallet_agent",array("AgentID"      => $paymentData[0]['AgentID'],
                                                                                  "TxnDate"      => date("Y-m-d H:i:s"),
                                                                                  "Particulars"  => "Wallet Update/PG:".$paymentData[0]['PaymentID']."/",
                                                                                  "ActualAmount" => $paymentData[0]['Amount'],
                                                                                  "CreditAmount" => $paymentData[0]['Amount'],
                                                                                  "DebitAmount"  => "0",
                                                                                  "Balance"      => AgentWalletBalance($_SESSION['User']['AgentID'])+$paymentData[0]['Amount'],
                                                                                  "Ledger"       => "3"));
                                        ?>
                                        <img src="assets/tick.jpg" style="width:200px"><br><br>          
                                        <?php
                                            echo  "<p>Your payment was successful</p>";
                                        } else {
                                            $mysql->execute("update _tbl_payments set IsFailure='1',razorpay_response='".json_encode($attributes)."',error_message='".$error."' where  md5(concat(PaymentCode,razorpay_orderid))='".$_GET['PayReq']."'");
                                            echo  "<p>Your payment failed</p>
                                            <p>{$error}</p>";
                                        }
                                    } else {
                                        echo "Access denied: already processed";
                                    }
                                 ?>
                                 <br><br>
                                  <a href="dashboard.php" id="show-signin">Continue</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>