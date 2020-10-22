ai <?php
   //  print_r($_POST);

   if (isset($_POST['btnConfirmJoin'])) {
       $Scheme = $mysql->select("select * from _tbl_Member_Schemes where SchemeID='".$_POST['SchemeID']."'");
       if ($_SESSION['rnd']==0) {
            echo '<script>location.href="dashboard.php?action=Scheme/SessionExpired";</script>';
            
        } else {
            
            if ($_POST['otp']==$_SESSION['rnd']) {
                
                $_SESSION['rnd']=0;
                if (getBalance($userData['MemberID'])<$Scheme[0]['InstallmentAmount']) {
                    echo '<script>location.href="dashboard.php?action=Scheme/InsufficiantFund";</script>';
                } else {
                    $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => $userData['MemberID'],
                                                                                       "TxnDate"       => date("Y-m-d H:i:s"),
                                                                                       "Particulars"   => "Scheme ".$Scheme[0]['SchemeName'],
                                                                                       "ActualAmount"  => $Scheme[0]['InstallmentAmount'],
                                                                                       "CreditAmount"  => "0",
                                                                                       "DebitAmount"   => $Scheme[0]['InstallmentAmount'],
                                                                                       "BalanceAmount" => getBalance($userData['MemberID'])-$Scheme[0]['InstallmentAmount'],
                                                                                       "Ledger"        => "301")); 
                                                                                       
                    $schemetxnID = $mysql->insert("_tbl_Members_Schemes",array("MemberID"          => $userData['MemberID'],
                                                                               "MemberCode"        => $userData['MemberCode'],    
                                                                               "SchemeID"          => $Scheme[0]['SchemeID'],    
                                                                               "SchemeName"        => $Scheme[0]['SchemeName'],    
                                                                               "InstallmentAmount" => $Scheme[0]['InstallmentAmount'],    
                                                                               "Installments"      => $Scheme[0]['Installments'],    
                                                                               "Benefits"          => $Scheme[0]['Benefits'],    
                                                                               "MaturityAmtount"   => $Scheme[0]['MaturityAmtount'],    
                                                                               "Joined"            => date("Y-m-d H:i:s")));  
                                                                               
                    $schemetxnID = $mysql->insert("_tbl_Members_Schemes_Dues",array("MemberID"       => $userData['MemberID'],
                                                                                    "MemberCode"     => $userData['MemberCode'],    
                                                                                    "DueDate"        => date("Y-m-d"),    
                                                                                    "DueAmount"      => $Scheme[0]['InstallmentAmount'],    
                                                                                    "MemberSchemeID" => $schemetxnID,    
                                                                                    "SchemeID"       => $Scheme[0]['SchemeID'],    
                                                                                    "Amount"         => $Scheme[0]['InstallmentAmount'],    
                                                                                    "ActTxnID"       => $ACTransactionID,    
                                                                                    "PaidOn"         => date("Y-m-d H:i:s"))); 
                    for($i=2;$i<=$Scheme[0]['Installments'];$i++) {
                        //$next_due_date = date('d/m/Y', strtotime("+30 days"));
                        
                        $schemetxnID = $mysql->insert("_tbl_Members_Schemes_Dues",array("MemberID"       => $userData['MemberID'],
                                                                                        "MemberCode"     => $userData['MemberCode'],    
                                                                                        "DueDate"        => date('Y-m-d', strtotime("+".(30*($i-1))." days")),    
                                                                                        "DueAmount"      => $Scheme[0]['InstallmentAmount'],    
                                                                                        "MemberSchemeID" => $schemetxnID,    
                                                                                        "SchemeID"       => $Scheme[0]['SchemeID'],    
                                                                                        "Amount"         => $Scheme[0]['InstallmentAmount'],    
                                                                                        "ActTxnID"       => "0",    
                                                                                        "PaidOn"         => "")); 
                    }
                                                                                       
                    echo '<script>location.href="dashboard.php?action=Scheme/Joined";</script>';
                   }
            } else {
                echo "<div style='width:800px;margin:0px auto;background:red;color:#fff;text-align:center;padding:10px;'>Invalid OTP</div>";
            }
        }
        $_POST['btnSubmit']="da";
   }
     if (isset($_POST['btnSubmit'])) {
         
         $Scheme = $mysql->select("select * from _tbl_Member_Schemes where SchemeID='".$_POST['SchemeID']."'");
         
         $access = getBalance($userData['MemberID'])>$Scheme[0]['InstallmentAmount'] ? true : false;
           
         if ($access) {
             
echo $_SESSION['rnd'];          
          
          ?>
          <div class="heading1">
    <span>Confirmation to join scheme</span>
</div>
       <br> 
            <table>
                <tr>
                    <td style="width: 150px;">Scheme Name</td>
                    <td>:&nbsp;&nbsp;<?php echo $Scheme[0]['SchemeName'];?></td>
                </tr>
                <tr>
                    <td>Monthly Amount</td>
                    <td>:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['InstallmentAmount'];?></td>
                </tr>
                 <tr>
                    <td>Installment</td>
                    <td>:&nbsp;&nbsp;<?php echo $Scheme[0]['Installments'];?> Months</td>
                </tr>
                                 <tr>
                    <td>Bonus</td>
                    <td>:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['Benefits'];?></td>
                </tr>
                              <tr>
                    <td>Maturity Amount</td>
                    <td>:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['MaturityAmtount'];?></td>
                </tr>
            </table>
            <br><br>
              <div style="width:800px;">
              <form action="" method="post">
              <input type="hidden" value="<?php echo $_POST['SchemeID'];?>" name="SchemeID">
        <?php
            if (isset($_SESSION['rnd']) && $_SESSION['rnd']>0) {
                
            } else {
                $rnd = rand(1111,9999);
                //$rnd=1111;
                $_SESSION['rnd']= $rnd;
                
                $smstxt= " confirmation code ".$rnd." for joining scheme :".$Scheme[0]['SchemeName'];
                MobileSMS::sendSMS($userData['MobileNumber'],$smstxt);
            }
        ?>
        <table style="clear:both;" >
            <tr>
                <td>We have sent an OTP Please enter otp bellow box to confirm Join Scheme</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="otp" value="" maxlength="4" style="width:100px;min-width: 100px;;">
                    <input type="submit" class="SubmitBtn" value="Confirm to Join" name="btnConfirmJoin">
                </td>
            </tr>
        </table>
        </form>
    </div>
          <?php
      
     } else {
         ?>
         <div style="text-align: center;font-size:20px;padding:100px;">
            <img src="assets/images/warnings_.png" style="width: 256px;"><bR><Br>
            Couldn't process, insufficiant fund.
         </div>
         <?php
         
     }   
     
     
     }
 ?>