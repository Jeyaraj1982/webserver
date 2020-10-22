<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
          Confirmation to join scheme
        </div>
        <div class="panel-body list">
<?php
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
      
          
          ?>
      <div class="form-group row">
        <label class="col-sm-2 control-label">Scheme Name</label>
        <div class="col-sm-10">:&nbsp;&nbsp;<?php echo $Scheme[0]['SchemeName'];?></div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label">Monthly Amount</label>
        <div class="col-sm-10">:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['InstallmentAmount'];?></div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label">Installment</label>
        <div class="col-sm-10">:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['Installments'];?> Months</div>
      </div> 
      <div class="form-group row">
        <label class="col-sm-2 control-label">Bonus</label>
        <div class="col-sm-10">:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['Benefits'];?></div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 control-label">Maturity Amount</label>
        <div class="col-sm-10">:&nbsp;&nbsp;Rs. <?php echo $Scheme[0]['MaturityAmtount'];?></div>
      </div>
         <div>
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
        <div class="form-group row">
            <label class="col-sm-10 control-label">We have sent an OTP Please enter otp bellow box to confirm Join Scheme</label>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"><input type="text" name="otp" value="" class="form-control" maxlength="4" ></div>
            <div class="col-sm-2"><input type="submit" class="btn btn-outline btn-success" value="Confirm to Join" name="btnConfirmJoin"></div>
          </div>
        </form>
    </div>
          <?php  } else {  ?>
         <div class="form-group row">
            <div class="col-sm-12" style="text-align: center;">
                 <img src="assets/images/warnings_.png" style="width: 128px;"> <bR><Br>
            Couldn't process, insufficiant fund.
            </div>
         </div>
          <?php  } ?>
      
     <?php   }   ?>
    </div>
   </div>
</div>

     