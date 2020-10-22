 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Member Earned Points (All Transaction)</span></div>
 
 <?php 
   if (isset($_POST['btnPoints'])) {
       $memberInfo=$mysql->select("select * from _tbl_Members where MemberCode='".$_POST['memberdetails']."'")  ;
       $_error="0" ;
       if (sizeof($memberInfo)>0) {
           
       } else {
           $_error="1" ;
           $error_Member="Invalid Member";
       }
       
       if ($_POST['points']>=100 && $_POST['points']<10000){
           
       } else {
          $_error="1" ;
           $error_points="Points must have Min. 100 and Max. 10000"; 
       }
       
       
       if (strlen(trim($_POST['remarks']))>0){
           
       } else {
          $_error="1" ;
           $error_remarks="Please enter valid remarks"; 
       }
       
       if ($_error == 0) {
         
         $mysql->insert("_tbl_Member_Points",array("MemberID"=>$memberInfo[0]['MemberID'],
                                                   "MemberCode"=>$memberInfo[0]['MemberCode'],
                                                   "PointsUpdated"=>date("Y-m-d H:i:s"),
                                                   "Remarks"=>$_POST['remarks'],
                                                   "EarnPoint"=>$_POST['points']));
           
           $success = 1;
            unset($_POST);
          //$smstxt= "Dear ".trim($memberInfo[0]['FirstName']).", You have recevieed. Your current Balance Rs. ".number_format(getBalance($memberInfo[0]['MemberID']),2)."  -Thanks GoodGrowth";
          //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($d[0]['MobileNumber']));
          //MobileSMS::sendSMS($memberInfo[0]['MobileNumber'],$smstxt,$memberInfo[0]['MemberID']);  
       }  
       
   }
 ?>
    <form action="" method="post">
    <br><br>
    <div style="padding:20px;background:#f6f6f6">
   <table style="width:100%;">   
        <tr>
            <td colspan="2" style="padding-bottom:10px;"><b>Add Points To Member</b></td>
        </tr>
        <tr>
            <td style="width:120px">Member Details</td>
            <td><input type="text" name="memberdetails" placeholder="Member Code" value="<?php echo isset($_POST['memberdetails']) ? $_POST['memberdetails'] : '';?>">
                &nbsp;&nbsp;<span style="color:red"><?php echo isset($error_Member) ? $error_Member : "";?></span>
            </td>
        </tr>
        <tr>
            <td>Points</td>
            <td><input type="text" name="points" placeholder="Points" value="<?php echo isset($_POST['points']) ? $_POST['points'] : '';?>">
                &nbsp;&nbsp;<span style="color:red"><?php echo isset($error_points) ? $error_points : "";?></span>
            </td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td><input type="text" name="remarks" placeholder="Remarks" value="<?php echo isset($_POST['remarks']) ? $_POST['remarks'] : '';?>">
                &nbsp;&nbsp;<span style="color:red"><?php echo isset($error_remarks) ? $error_remarks : "";?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="SubmitBtn" type="submit" name="btnPoints"  value="Add Points">
                <?php echo isset($success) ?  SuccessMsg("Points added.") : ""; ?> 
            </td>
        </tr>
   </table>
   </div>
 </form>
 <br><br>  
 
 <div class="LMenu" style="text-align:right">
    <a href="dashboard.php?action=ManagePoints">Transactions</a>&nbsp;|&nbsp;
    <a href="dashboard.php?action=MemberwisePoints">Member-wise</a>
 </div>
 <Br>
 <?php
    $Entries = $mysql->select("select * from _tbl_Member_Points  order by PointsID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Txn Date</th>
    <th style="text-align: left;width:120px;">Member Code</th>
    <th style="text-align: right;width:120px;">Earned Points</th>
    <th style="text-align: right;">For </th>
    <th style="text-align: right;">Remarks </th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['PointsUpdated']);?></td>
    <td style="text-align: left;"><?php echo $entry['MemberCode'];?></td>
    <td style="text-align: right;"><?php echo $entry['EarnPoint'];?></td>
    <td style="text-align: right;">Direct Member <?php echo $entry['DirectMemberCode'];?></td>
    <td style="text-align: right;"><?php echo $entry['Remarks'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 