


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


<h5 style="text-align: left;font-family: arial;">Fund Transfer</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
 
<?php
  
    $showFrom= true;
    $showTransferFrom=false;
?>
<?php
    if ($_POST['btnStepA']) {
        
         $user = $mysql->select("select * from _usertable where  userid =".$_POST['userid']);
         if (sizeof($user)>0) {
           $showFrom=false;
           $showTransferFrom  =true;
         }
        
    }
    
    if ($_POST['btnStepB']) {
        
        $user = $mysql->select("select * from _usertable where  md5(userid) ='".$_POST['userid']."'");
        $d = new DealMaass();
        $d->userid = $user[0]['userid'];
        
        $mysql->insert("_acc_txn", array("userid"=>$user[0]['userid'],
                                         "txndate"=>date("Y-m-d H:i:s"),
                                         "particulars"=>"Wallet Update/From Admin",
                                         "cramount"=>$_POST['amount'],
                                         "dramount"=>"0",
                                         "transactionid"=>"0",
                                         "abalance"=>$d->getBalance() + $_POST['amount'],
                                         "paymentstatus"=>"SUCCESS"));
                                      
     echo "Approved Successfully";
     $showTransferFrom  =false;
     $showFrom=false;
     ?>
     <a href="GAME_FundTransfer">Continue</a>
     <?php
    }
?>
<?php if ($showFrom) {?>
<form action="" method="post">
<table style="font-size:12px;font-family:arial;color:#333;" cellpadding="3" cellspacing="0">
    <tr>
        <td>User ID</td>
        <td><input type="text" name="userid"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Next" name="btnStepA"></td>
    </tr>
</table>
</form>
<?php } ?>

<?php if ($showTransferFrom) {?>
<form action="" method="post">
<input type="hidden" value="<?php echo md5($user[0]['userid']);?>" name="userid">
<table style="font-size:12px;font-family:arial;color:#333;" cellpadding="3" cellspacing="0">
    <tr>
        <td>User ID</td>
        <td><?php echo $user[0]['userid'];?></td>
    </tr>
    <tr>
        <td>User Name</td>
        <td><?php echo $user[0]['personname'];?></td>
    </tr>
    <tr>
        <td>Email ID</td>
        <td><?php echo $user[0]['emailid'];?></td>
    </tr>
    <tr>
        <td>Currency</td>
        <td>
          <select name="currency" style="border:1px solid #999;padding:3px;width:175px;">
           
                <option value="INR" disabled="disabled">Inidan Rupees [INR] </option>
           
            </select>
            
        </td>
    </tr>
    <tr>
        <td>Amount</td>
        <td><input type="text" name="amount" placeholder="Amount" style="border:1px solid #999;padding:3px;padding-left:8px;width:175px"></td>
    </tr>

    <tr>
        <td><input type="submit" value=" Transfer Now " name="btnStepB"></td>
    </tr>
</table>
</form>
<?php } ?>


</div>
</div>
               </div>
              

   
    </div>
</div>

 