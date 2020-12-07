             <?php include_once("game_clients/menu.php");?>
     <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <article class="col-m-8">
                 
<h4>Withdraw</h4>
 
                                                
<div class="row">
<div class="col-sm-12">
        <?php
            if (isset($_POST['sendWithdrawalRequest'])) {
               if ($dealmaass->getBalance()>=1000)  {
                $id = $mysql->insert("_game_withdrawls",array(
                        "MemberID"=>$_SESSION['USER']['userid'],
                        "MemberName"=>$_SESSION['USER']['personname'],
                        "AccountName"=>$_POST['AccountName'],
                        "AccountNumber"=>$_POST['AccountNumber'],
                        "IFSCode"=>$_POST['IFSCode'],
                        "Amount"=>"1000",
                        "RequestedOn"=>date("Y-m-d H:i:s"),
                        "Status"=>"1"));
                if ($id>0) {
                      $mysql->insert("_acc_txn", array("userid"=>$_SESSION['USER']['userid'],
                                      "txndate"=>date("Y-m-d H:i:s"),
                                      "particulars"=>"Withdrawal/".$id,
                                      "actualamt"=>1000,
                                      "cramount"=>"0",
                                      "dramount"=>1000,
                                      "transactionid"=>$id,
                                      "abalance"=>$dealmaass->getBalance()  - 1000,
                                      "paymentstatus"=>"SUCCESS"));
                    echo "Your request has been submitted";
                } else {
                    echo "<span style='color:red'>Error: please support team</span>";
                }
               } else {
                   echo "<span style='color:red'>Error: insufficiant balance to withdraw</span>";
               }
            }
        ?>

 
        <form action="" method="post">
        <table cellpadding="3" cellspacing="0" align="center" style="font-family:arial;font-size:12px;width:100%">
            <tr>
                <td width="150">Account Balance</td>
                <td>INR <?php echo number_format($dealmaass->getBalance(),2); ?></td>
            </tr>
            
            <?php if ($dealmaass->getBalance()<1000) {?>
            <?php if (!isset($_POST['sendWithdrawalRequest'])) { ?>
             <tr>
                <td colspan="2" style="color:red">Your account balance is lessthan 1000, withdrawal supports minimum balance required 1000 and above</td>
            </tr>
            <?php } ?>
            <?php } else {?>
            <tr>
                <td>Account Holder Name</td>
                <td><input type="text" name="AccountName" value="" required placeholder="Enter Account Holder Name" style="padding:2px 5px;border:1px solid #ccc;width:200px"></td>
            </tr>
            <tr>
                <td>Account Number</td>
                <td><input type="text" name="AccountNumber" value="" required placeholder="Enter Account Number"  style="padding:2px 5px;border:1px solid #ccc;width:200px"></td>
                
            </tr>
            <tr>
                <td>IFS Code</td>
                <td><input type="text" name="IFSCode" value="" required placeholder="Enter IFS Code"  style="padding:2px 5px;border:1px solid #ccc;width:200px"></td>
            </tr>
            <tr>
                <td>Available Amount</td>
                <td>INR 1000</td>
              </tr>
                <tr>
                <td colspan="2">
                <input type="submit" name="sendWithdrawalRequest" value="Send Request"  class="btn btn-primary"></td>
            </tr>
             <?php } ?>
             <tr>
                <td colspan="2"><a href="WithdrawalRequests">List of previous requests</a></td>
             </tr>
        </table>
      </form>  
        </div>
    </div>
 
 
 </article>
 </div>
 </div>
 


 