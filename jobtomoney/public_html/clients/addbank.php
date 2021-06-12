
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
                  
                 

<?php
    if (isset($_POST['acholdername']) && (isset($_POST['accountnumber'])) && (isset($_POST['branchname'])) && (isset($_POST['bankname'])) && (isset($_REQUEST['branchcode'])) ) {
      $isTrue = 0;     
      $isTrue += validate($_POST['acholdername']);
      $isTrue += validate($_POST['accountnumber']);
      $isTrue += validate($_POST['branchname']);
      $isTrue += validate($_POST['bankname']);   
      $isTrue += validate($_POST['branchcode']);   
      
      if ($isTrue==0) {
             $rowData = array("id"=>'Null',
                   "clientid"       => $_SESSION['user']['id'],
                   "bankname"       => $_POST['bankname'],
                   "branchname"     => $_POST['branchname'],
                   "acholdername"   => $_POST['acholdername'],
                   "acnumber"       => $_POST['accountnumber'],
                   "branchcode"     => $_POST['branchcode'],
                   "updatedon"      => date("Y-m-d H:i:s")
             );
             $recordId = $mysql->insert("_clients_bank_details",$rowData);       
             
             if ($recordId>0) {
                 echo "<div style='padding:10px;border:1px solid #ccc;color:#222'>Bank Details are updated successfully</div>";
             } else {
                 echo "<div style='padding:10px;border:1px solid #ccc;color:#222'>Error Occured when sending your infromation to administrator. Please Try again.</div>";
             }
              
      } else {
          echo "<div style='padding:10px;border:1px solid #ccc;color:#222'>All Fields are required</div>";
      }
    }
?>
<?php $data = $mysql->select("select * from _clients_bank_details where clientid=".$_SESSION['user']['id']); ?>
<?php if (sizeof($data)==0) {?>
 
    <h5 style="font-family: arial;color:#264AA6">Enter Bank Details</h5>
    <div style="border-bottom:1px solid #D4E3F6;"></div>
    <form action="" method="post">
        <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;" width="100%">
        <tr>
            <td width="150">Account Holder Name<span class="man">*</span></td>
            <td><input type="text" name="acholdername" value="<?php echo $_POST['acholdername'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>Account Number<span class="man">*</span></td>
            <td><input type="text" name="accountnumber" value="<?php echo $_POST['accountnumber'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>Branch Name<span class="man">*</span></td>
            <td><input type="text" name="branchname" value="<?php echo $_POST['branchname'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>Bank Name<span class="man">*</span></td>
            <td><input type="text" name="bankname"  value="<?php echo $_POST['bankname'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>IFSC Code<span class="man">*</span></td>
            <td><input type="text" name="branchcode"  value="<?php echo $_POST['branchcode'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Save" class="btn btn-success"></td>
        </tr>
    </table>
    </form>
<?php } else { ?>
     <h5 style="text-align: left;font-family: arial;">Bank Details</h5>  
     <div style="border-bottom:1px solid #D4E3F6;"></div>
     <br>
    <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;" width="100%">
        <tr>
            <td width="150">Account Holder Name</td>
            <td>:&nbsp;<?php echo $data[0]['acholdername'];?></td>
        </tr>
        <tr>
            <td>Account Number</td>
            <td>:&nbsp;<?php echo $data[0]['acnumber'];?></td>
        </tr>
        <tr>
            <td>Branch Name</td>
            <td>:&nbsp;<?php echo $data[0]['branchname'];?></td>
        </tr>
        <tr>
            <td>Bank Name</td>
            <td>:&nbsp;<?php echo $data[0]['bankname'];?></td>
        </tr>
        <tr>
            <td>IFSC Code</td>
            <td>:&nbsp;<?php echo $data[0]['branchcode'];?></td>
        </tr>
        <tr>
            <td>Updated On</td>
            <td>:&nbsp;<?php echo $data[0]['updatedon'];?></td>
        </tr>
        
    </table>
<?php } ?>  
 </div>
               </div>
              

   
    </div>
</div>

 