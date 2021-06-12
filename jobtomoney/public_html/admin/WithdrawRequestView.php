 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">


<h5 style="text-align: left;font-family: arial;">Withdraw Request</h5> 
 
                                                
<div class="row">
  <div class="col-sm-12">
  <?php
  if (isset($_POST['BtnTransfered'])) {
        $data = $mysql->select("select * from _game_withdrawls where GameWithdrwalRequest='".$_POST['id']."'");
        if ($data[0]['Status']==1) {
      $mysql->execute("update _game_withdrawls set Status='2', CompletedOn='".date("Y-m-d H:i:s")."', BankTransactionID='".$_POST['BankTransactionID']."' where  GameWithdrwalRequest='".$_POST['id']."'");
      echo "<span style='color:green'>Updated successfully</span><br>";
        } else {
        echo "<span style='color:red'>Already Processed</span><br>";    
        }
  }
  
   if (isset($_POST['BtnTransferReject'])) {
        $data = $mysql->select("select * from _game_withdrawls where GameWithdrwalRequest='".$_POST['id']."'");
        if ($data[0]['Status']==1) {
            $mysql->execute("update _game_withdrawls set Status='3', RejectedOn='".date("Y-m-d H:i:s")."', RejectedReason='".$_POST['RejectedReason']."' where  GameWithdrwalRequest='".$_POST['id']."'");
              $mysql->insert("_acc_txn", array("userid"=>$data[0]['MemberID'],
                                      "txndate"=>date("Y-m-d H:i:s"),
                                      "particulars"=>"Reverse/Withdrawal/".$id,
                                      "actualamt"=>1000,
                                      "cramount"=>"1000",
                                      "dramount"=>"0",
                                      "transactionid"=>$_POST['id'],
                                      "abalance"=>$dealmaass->getUserBalance($data[0]['MemberID'])  + 1000,
                                      "paymentstatus"=>"SUCCESS"));
            echo "<span style='color:green'>Rejected & Re-Credited successfully</span><br>";
        } else {
        echo "<span style='color:red'>Already Processed</span><br>";    
        }
  }
        $data = $mysql->select("select * from _game_withdrawls where GameWithdrwalRequest='".$_POST['id']."'");
  ?>
 <table style="font-family:arial;font-size:12px;color:#444444; width:100%" cellpadding="8" cellspacing="0" width="100%">  
    <tr>
        <td>User ID</td>
        <td>:&nbsp;<?php echo $data[0]['MemberID'];?></td>
    </tr>
    <tr>
        <td>Requested</td>
        <td>:&nbsp;<?php echo $data[0]['RequestedOn'];?></td>
    </tr> 
    <tr>
        <td>Amount</td>
        <td >:&nbsp;<?php echo number_format($data[0]['Amount'],2);?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:&nbsp;<?php 
                if ($data[0]['Status']==1) {
                    echo "Requested";
                } elseif ($data[0]['Status']==2) {
                    echo "Completed";
                } elseif ($data[0]['Status']==3) {
                    echo "Rejected";
                }
                ?></td>
    </tr>
    
    
     <tr>
        <td>AccountName</td>
        <td>:&nbsp;<?php echo $data[0]['AccountName'];?></td>
     </tr>
     <tr>
        <td>AccountNumber</td>
        <td>:&nbsp;<?php echo $data[0]['AccountNumber'];?></td>
     </tr>
     <tr>
        <td>IFSCode</td>
        <td>:&nbsp;<?php echo $data[0]['IFSCode'];?></td>
     </tr>
     <tr>
        <td>CompletedOn</td>
        <td>:&nbsp;<?php echo $data[0]['CompletedOn'];?></td>
     </tr>
       <tr>
        <td>Rejected On</td>
        <td>:&nbsp;<?php echo $data[0]['RejectedOn'];?></td>
     </tr>
       <tr>
        <td>Rejected Reason</td>
        <td>:&nbsp;<?php echo $data[0]['RejectedReason'];?></td>
     </tr>  
     <tr>
        <td>BankTransactionID</td>
        <td>:&nbsp;<?php echo $data[0]['BankTransactionID'];?></td>
     </tr>
     <?php
          if ($data[0]['Status']==1) {
           ?>
           <tr>
        <td>BankTransactionID</td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
                <input class="form-control" required type="text" name="BankTransactionID" placeholder="Bank Transaction ID">
                <input type="submit" name="BtnTransfered" value="Update" class="btn btn-primary">
            </form></td>
     </tr> 
     
                <tr>
        <td>Reject</td>
        <td><form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
            <input class="form-control" required type="text" name="RejectedReason" placeholder="Reason for reject"><input type="submit" name="BtnTransferReject" value="Reject" class="btn btn-danger"></form></td>
     </tr>  

           <?php   
          }
     ?>
     
   
     
             
        
    </table>   
    <br><br>                              
    <a href="WithdrawRequests">List of Withdrawal Requests</a>
    </div>
 
    </div>
 
</div>
</div>
               </div>
              

   
    </div>
</div>

 