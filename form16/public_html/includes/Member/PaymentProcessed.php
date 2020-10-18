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
                                     $mparam['MailTo']="jeyaraj_123@yahoo.com";
                                     $mparam['MemberID']=1;
                                     $mparam['Subject']="paymentsuccess";
                                     $mparam['Message']=implode(",",$_GET).implode(",",$_POST);
                                     MailController::Send($mparam,$mailError);
                                     
                                     $paymentData = $mysql->select("select * from _tbl_payments where md5(concat(PaymentID,OrderNumber))='".$_GET['PayReq']."' and IsSuccess='0' and IsFailure='0'");                    
                                     $order = $mysql->select("select * from _tbl_orders where OrderID='".$paymentData[0]['OrderID']."'");
                                      
                                     
                                     if (sizeof($paymentData)==1) {
                                         $success = false;
                                         $error = "Payment Failed";
                                      
                                   
                                        
                                         if (empty($_POST['razorpay_payment_id']) === false) {
                                             
                                              //print_r($_POST);
                                     //print_r($paymentData);  
                                       $attributes = array('razorpay_order_id' => $_SESSION['razorpay_order_id'],
                                                                     'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                                                                      'razorpay_signature' => $_POST['razorpay_signature']);
                                       //print_r($attributes); 
                                            // $api = new Api($keyId, $keySecret);
                                             try {
                                                 // Please note that the razorpay order ID must
                                                 // come from a trusted source (session here, but
                                                 // could be database or something else)
                                               

                                                 $api->utility->verifyPaymentSignature($attributes);
                                                   $success = true;
                                             } catch(SignatureVerificationError $e) {
                                                 $success = false;
                                                 $error = $e->getMessage();
                                             }
                                         }  
                                             
                                                                
                                         if ($success === true) {
                                             
                                             // Update Payment Table    
                                             $mysql->execute("update _tbl_payments set IsSuccess='1',razorpay_payment_id='".$_POST['razorpay_payment_id']."',razorpay_response='".json_encode($_POST)."' where  md5(concat(PaymentID,OrderNumber))='".$_GET['PayReq']."'");
                                             // Update order Table
                                             $mysql->execute("update _tbl_orders set IsPaid='1',PaymentID='".$paymentData[0]['PaymentID']."',PaymentOn='".date("Y-m-d H:i:s")."' where OrderID='".$paymentData[0]['OrderID']."'");
                                             
                                             //Credit to member wallet
                                             //Ledger 1 : Receveid payment using payment gateway
                                             //Ledger 2 : Recevied Invoice Payment from member wallet
                                             $mysql->insert("_wallet_member",array("MemberID"       => $paymentData[0]['MemberID'],
                                                                                   "TxnDate"        => date("Y-m-d H:i:s"),
                                                                                   "Particulars"    => "Wallet Update/PG:".$paymentData[0]['PaymentID']."/",
                                                                                   "ActualAmount"   => $order[0]['OrderValue'],
                                                                                   "CreditAmount"   => $order[0]['OrderValue'],
                                                                                   "DebitAmount"    => "0",
                                                                                   "Balance"        => "0",
                                                                                   "Ledger"         => "1"));
                                             
                                             // Generate Invoice
                                             $invoiceNumber = SeqMaster::GetNextInvoice();
                                             $invoiceID =  $mysql->insert("_tbl_invoices",array("OrderID"       => $paymentData[0]['OrderID'],
                                                                                                "OrderNumber"   => $paymentData[0]['OrderNumber'],
                                                                                                "OrderDate"     => $order[0]['OrderDate'],
                                                                                                "InvoiceDate"   => date("Y-m-d H:i:s"),
                                                                                                "InvoiceNumber" => $invoiceNumber,
                                                                                                "MemberID"      => $paymentData[0]['MemberID'],
                                                                                                "MemberCode"    => $paymentData[0]['MemberCode'],
                                                                                                "InvoiceValue"  => $order[0]['OrderValue'],
                                                                                                "FormID"        => $paymentData[0]['FormID'],
                                                                                                "PaymentMode"   => "Payment Gateway",
                                                                                                "PaymentID"     => $paymentData[0]['PaymentID']));
                                                                                                
                                             //Debit from member wallet
                                             $mysql->insert("_wallet_member",array("MemberID"     => $paymentData[0]['MemberID'],
                                                                                   "TxnDate"      => date("Y-m-d H:i:s"),
                                                                                   "Particulars"  => "Invoice/".$invoiceNumber." /Odr:".$paymentData[0]['OrderNumber'],
                                                                                   "ActualAmount" => $order[0]['OrderValue'],
                                                                                   "CreditAmount" => "0",
                                                                                   "DebitAmount"  => $order[0]['OrderValue'],
                                                                                   "Balance"      => "0",
                                                                                   "Ledger"       => "2"));
                                             
                                             $orderitems = $mysql->select("select * from _tbl_orders_items where OrderID='".$order[0]['OrderID']."'");
                                             foreach($orderitems as $item) {
                                                 $mysql->insert("_tbl_orders_items",array("InvoiceID"    => $invoiceID,
                                                                                          "Particulars"  => $item['Particulars'],
                                                                                          "Qty"          => $item['Qty'],
                                                                                          "Amount"       => $item['Amount'],
                                                                                          "SubAmount"    => $item['SubAmount']));   
                                             }
                                             
                                             // Update Form Table
                                             $mysql->execute("update _tbl_form_16 set IsPaid='1',InvoiceNumber='".$invoiceNumber."' where  id='".$paymentData[0]['FormID']."'");
                                             // SMS To Deliver
                                             // Mail To Deliver
                                        ?>
                                        <img src="assets/tick.jpg" style="width:200px"><br><br>          
                                        <?php
                                            echo  "<p>Your payment was successful</p>";
                                            //"<p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                                        } else {
                                            $mysql->execute("update _tbl_payments set IsFailure='1',razorpay_response='".json_encode($attributes)."',error_message='".$error."' where  md5(concat(PaymentID,OrderNumber))='".$_GET['PayReq']."'");
                                            // SMS To Deliver failure message
                                            // Mail To Deliver failure message
                                            echo  "<p>Your payment failed</p>
                                            <p>{$error}</p>";
                                        }
                                    } else {
                                        echo "Access denied: already processed";
                                    }
                                 ?>
                                 <br><br>
                                  <a href="dashboard.php?action=ManageForm16&Status=All" id="show-signin">Continue</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>