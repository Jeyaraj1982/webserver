<?php
$PlanID=3;
$PlanString = " PlanUpgradedC='1' and  ";
$PlanGrade = "PlanUpgradedC";
?>
<style>
.triangle-up { width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 20px solid #D1B464; }
.triangle-up2 { width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 20px solid #EDDD97; }
    .noGold2 {
        border:1px solid #D1B464;padding:30px;text-align:center;color:#d8c36c;border-radius:5px;
    background: #eddd97; 
}   
</style>
<div style="padding:10px;border:1px solid #eee;background:#fff">
<div class="heading1"><span>SUPER GOLD</span></div>
<?php
 if (isset($_GET['msg'])) {
           echo SuccessMsg($_GET['msg']);        
    }
    //$loginEntries = $mysql->select("select * from _tbl_Members where ".$PlanString." ReferedBy='".$userData['MemberID']."' order by MemberID desc");
    $loginEntries = $mysql->select("select * from _tbl_Members where MemberID in (select ChildID from _tbl_Member_Placement where Plan='3' and PlacedBy='".$userData['MemberID']."') order by MemberID desc");
    
    if (sizeof($loginEntries)>0) {
?>
<div class="heading1"><span>My Members</span></div>
<Br>
<table class= "listTable" style="width:100%" cellspacing="0">
    <tr style="background:#eee">
        <th style="text-align: center;padding:5px;width:150px">Member Code</th>
        <th style="text-align: left;width:120px;">First Name</th>
        <th style="text-align: left;width:120px">Last Name</th>
        <th style="text-align: left;">Nick Name</th>
        <th style="text-align: left;">Mobile Number</th>
        <th style="text-align: left;">Created On</th>
        <th style="text-align: left;width:50px">&nbsp;</th>
    </tr>
    <?php foreach($loginEntries as $entry) {?>
    <tr class="logip">
        <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
        <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
        <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
        <td style="text-align: left;"><?php echo $entry['NickName'];?></td>
        <td style="text-align: left;"><?php echo $entry['MobileNumber'];?></td>
        <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
        <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=MemberView&MemberCode=<?php echo $entry['MemberCode']; ?>">View</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
   <div style="padding-top:5px;padding-bottom:5px;">
    <table align="right">
        <tr>
            <td style="width:20px;background:yellow">&nbsp;</td><td>&nbsp;My Direct Referals</td>
        </tr>
        
    </table>
</div>
 <?php
 $myData = $mysql->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'");
 if ($myData[0][$PlanGrade]==1) {
 
 $level1 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and Plan='".$PlanID."'");
    
    $level1_1 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='1' and Plan='".$PlanID."'");
    $level1_2 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='2' and Plan='".$PlanID."'");
    $level1_3 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='3' and Plan='".$PlanID."'");
 ?>
    <br><br>
    <table style="background:#eddd97;width:800px;margin:0px auto" cellpadding="5" cellspacing="5">
        <tr>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)>0) {
                        $level1_1D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_1[0]['ChildID']."' and ChildPosition='1' and Plan='".$PlanID."'");
                        if (sizeof($level1_1D)==1) {
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=1&parent=".$level1_1[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>";
                         echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)>0) {  
                        $level1_1D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_1[0]['ChildID']."' and ChildPosition='2' and Plan='".$PlanID."'");
                        if (sizeof($level1_1D)>0) {  
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=2&parent=".$level1_1[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>";
                         echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
            <td  style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)>0) {  
                        $level1_1D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_1[0]['ChildID']."' and ChildPosition='3' and Plan='".$PlanID."'");
                        if (sizeof($level1_1D)==1) {
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=3&parent=".$level1_1[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>"; 
                         echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)>0) {  
                        $level1_2D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_2[0]['ChildID']."' and ChildPosition='1' and Plan='".$PlanID."'");
                        if (sizeof($level1_2D)==1) {
                            $newClass = ($level1_2D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=1&parent=".$level1_2[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>"; 
                         echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)>0) {  
                        $level1_2D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_2[0]['ChildID']."' and ChildPosition='2' and Plan='".$PlanID."'");
                        if (sizeof($level1_2D)==1) {
                            $newClass = ($level1_2D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=2&parent=".$level1_2[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>"; 
                         echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)>0) { 
                        $level1_2D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_2[0]['ChildID']."' and ChildPosition='3' and Plan='".$PlanID."'");
                        if (sizeof($level1_2D)==1) {
                            $newClass = ($level1_2D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=3&parent=".$level1_2[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>";
                         echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
            
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)>0) { 
                        $level1_3D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_3[0]['ChildID']."' and ChildPosition='1' and Plan='".$PlanID."'");
                        if (sizeof($level1_3D)==1) {
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=1&parent=".$level1_3[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>"; 
                         echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)>0) {
                        $level1_3D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_3[0]['ChildID']."' and ChildPosition='2' and Plan='".$PlanID."'"); 
                        if (sizeof($level1_3D)==1) {
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=2&parent=".$level1_3[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>";
                         echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)>0) {
                        $level1_3D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_3[0]['ChildID']."' and ChildPosition='3' and Plan='".$PlanID."'"); 
                        if (sizeof($level1_3D)==1) {
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=3&parent=".$level1_3[0]['ChildID']."'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Create Member</div>";
                         echo "<span class='triangle-up'></span>"; 
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:300px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)==1) {
                        $level1_1D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$lData[0]['FirstName']." ".$level1_1D['0']['LastName']."<br>".$level1_1D[0]['MemberCode']."</div>";
                    } else {
                        echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=1'>Create<br>Member</a></div>";
                    }
                     echo "<span class='triangle-up'></span>";
                ?>
            </td>
            <td colspan="3"  style="width:300px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)==1) {
                        $level1_2D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$rData[0]['FirstName']." ".$level1_2D['0']['LastName']."<br>".$level1_2D[0]['MemberCode']."</div>";
                    } else {
                        echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=2'>Create<br>Member</a></div>";
                    }
                     echo "<span class='triangle-up'></span>";
                ?>
            </td>
            <td colspan="3" style="width:300px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)==1) {
                        $level1_3D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$rData[0]['FirstName']." ".$level1_3D['0']['LastName']."<br>".$level1_3D[0]['MemberCode']."</div>";
                    } else {
                        echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=3'>Create<br>Member</a></div>";
                    }
                     echo "<span class='triangle-up'></span>";
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                <div class="Gold"><?php echo $userData['FirstName']." ".$userData['LastName']."<br>".$userData['MemberCode']; ?></div>
            </td>
        </tr>
    </table>
     
 <?php } else { /* ?>
        <?php
            $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$PlanID."'");
        ?>
           <div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)"><img src="assets/images/PlanImg3.png" style="width:400px"></div>
        </div>
        <div style="padding:20px;">
           <table cellspacing="0" style="width:90%;margin:0px auto;border:1px solid #ccc;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)">
            <tr>
                <td style="padding:15px;background:#F8E9AD;text-align:center;font-size:15px"><?php echo $planDetails[0]['PlanString'];?>: table of orders </td>
               <!-- <td rowspan="3" style="width:200px;background:#333;text-align:center"><img src="assets/images/plan3.png" style="width:150px"></td> -->
            </tr>
            <tr>
                <td style="padding:30px;background:#FEFFEF;text-align:center;font-size:15px">Order of gold bar set in the amount of INR <?php echo $planDetails[0]['PlanAmount'];?></td>
            </tr>
             <tr>
                <td style="padding:15px;background:#F8E9AD;text-align:center;font-size:15px">Prepayment: INR <?php echo $planDetails[0]['PlanAmount'];?></td>
            </tr>
           </table> 
        </div>
         <div style="padding:20px;">
             <table cellspacing="0" style="width:90%;margin:0px auto;border:1px solid #ccc;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)">
          <tr>
                <td style="padding:30px;background:#fff;text-align:center;font-size:14px">By clicking on the button "Proceed to payment", I confirm that I have read and agreed to the GoldSet Program Terms and Conditions and the Web Site Terms of Use.<br></td>
            </tr>
             <tr>
                <td style="padding:15px;background:#E1F3C9;text-align:center;font-size:14px"><input onclick="enableBtn()" type="checkbox" id="agreed"> I confirm that I agree to the terms.</td>
            </tr>
           </table> 
        </div>
        <div style="text-align:center;padding:10px">
            <form action="dashboard.php?action=payment" method="post">
                <input type="hidden" value="<?php echo $planDetails[0]['PlanID'];?>" name="Plan">
                <input type="submit" value=" Proceed to Payment " disabled="disabled" id="DoPaymentProcess" name="DoPaymentProcess" style="padding:10px 20px;">
           </form>
        </div>
        <script>
            function enableBtn() {
                  if ($('#agreed').is( ":checked" )) {
                  $('#DoPaymentProcess').removeAttr("disabled");
                  } else {
                      $('#DoPaymentProcess').attr("disabled","disabled");
                  }
            }
        </script>
 <?php */
 ?>
 <div style="text-align:center;;padding:20px;font-size:20px;color:orange">
        
        You must fill <b>My Gold</b> Table
    </div>
  <div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;"><img src="assets/images/PlanImg3.png" style="width:400px"></div>
        </div>
 <?php } ?>