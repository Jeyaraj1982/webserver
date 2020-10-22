<?php
$PlanID=1;
$PlanString = " PlanUpgradedA='1' and  ";
$PlanGrade = "PlanUpgradedA";        
$PlanComplete = 0;
$PlanCompletedIDs = array();
$PlanRequiredToComplete = 6;
?>
<style>
.border {border:2px solid yellow}
.triangle-up { width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 20px solid #D1B464; }
.triangle-up2 { width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 20px solid #EDDD97; }
    .noGold2 {
        border:1px solid #D1B464;padding:30px;text-align:center;color:#d8c36c;border-radius:5px;
    background: #eddd97; 
}   
.Gold {
    border: 1px solid 
#D1B464;
padding: 30px;
text-align: center;
color:
#fff;
border-radius: 5px;
background: radial-gradient(ellipse farthest-corner at right bottom,
#FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%,
    #5d4a1f 100%);
}
</style>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           GOLD WAY
        </div>
        <div class="panel-body list">
        <?php
            if (isset($_GET['msg'])) {
                   echo SuccessMsg($_GET['msg']);        
            }
            $loginEntries = $mysql->select("select * from _tbl_Members where MemberID in (select ChildID from _tbl_Member_Placement where Plan='1' and PlacedBy='".$userData['MemberID']."') order by MemberID desc");
           
            if (sizeof($loginEntries)>0) {
        ?>
        <h5 class="font-light m-b-xs">My Members</h5><br>
         <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
             <tr>
                <th style="text-align: center;padding:5px;width:150px">Member Code</th>
                <th style="text-align: left;width:120px;">First Name</th>
                <th style="text-align: left;width:120px">Last Name</th>
                <th style="text-align: left;">Nick Name</th>
                <th style="text-align: left;">Mobile Number</th>
                <th style="text-align: left;">Created On</th>
                <th style="text-align: left;width:50px">&nbsp;</th>
             </tr>
           <?php foreach($loginEntries as $entry) {?>
            <tr>
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
        <table align="right">
            <tbody>
                <tr>
                    <td style="width:20px;background:yellow">&nbsp;</td><td>&nbsp;My Direct Referals</td>
                 </tr>
            </tbody>
        </table>
      <br><br>
    <?php
 if ($userData[$PlanGrade]==1) {
    $newClass = "";
    $lData = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='L' and Plan='".$PlanID."'");
    $rData = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='R' and Plan='".$PlanID."'");
    
    $lDataSuNode=$mysql->select("select * from _tbl_Member_Placement where Plan=".$PlanID." and Plan='".$PlanID."' and ParentID='".$lData[0]['ChildID']."'");
    $rDataSuNode=$mysql->select("select * from _tbl_Member_Placement where Plan=".$PlanID." and Plan='".$PlanID."' and ParentID='".$rData[0]['ChildID']."'");
 
 ?>
        <div style="width: 820px;background: #eddd97;padding: 10px;margin: 0px auto;">
            <table style="width:800px;margin:0px auto;background:#eddd97" cellpadding="5" cellspacing="5">
            <tr>
                <td style="width:200px;padding-bottom:10px;text-align:center;">
                    <?php
                      if (sizeof($lData)>0) {
                       $lDataSuNodeL=$mysql->select("select * from _tbl_Member_Placement where Plan=".$PlanID." and ParentID='".$lData[0]['ChildID']."' and ChildPosition='L'");
                        $newClass = ($lDataSuNodeL[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                        if (sizeof($lDataSuNodeL)==1) {
                            $PlanCompletedIDs[]=$lDataSuNodeL[0]['ChildID'];
                            $lDataSuNodeL = $mysql->select("select * from _tbl_Members where MemberID='".$lDataSuNodeL[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lDataSuNodeL[0]['FirstName']." ".$lDataSuNodeL['0']['LastName']."<br>".$lDataSuNodeL[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=1&parent=".$lData[0]['ChildID']."&C=L'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                          } else {
                         echo "<div  class='noGold2'>Create Member</div>"; 
                          echo "<span class='triangle-up2'></span>";
                     }
                    ?>
                </td>
                <td style="width:200px;padding-bottom:10px;text-align:center;">
                    <?php
                     if (sizeof($lData)>0) {
                        $lDataSuNodeR=$mysql->select("select * from _tbl_Member_Placement where Plan=".$PlanID." and ParentID='".$lData[0]['ChildID']."' and ChildPosition='R'");
                        $newClass = ($lDataSuNodeR[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                        if (sizeof($lDataSuNodeR)==1) {
                            $PlanCompletedIDs[]=$lDataSuNodeR[0]['ChildID'];
                            $lDataSuNodeR = $mysql->select("select * from _tbl_Members where MemberID='".$lDataSuNodeR[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lDataSuNodeR[0]['FirstName']." ".$lDataSuNodeR['0']['LastName']."<br>".$lDataSuNodeR[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=1&parent=".$lData[0]['ChildID']."&C=R'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                     } else {
                         echo "<div  class='noGold2'>Create Member</div>"; 
                          echo "<span class='triangle-up2'></span>";
                     }
                    ?>
                </td>
                <td style="width:200px;padding-bottom:10px;text-align:center;">
                    <?php
                    if (sizeof($rData)>0) {
                        $rDataSuNodeL=$mysql->select("select * from _tbl_Member_Placement where Plan=".$PlanID." and ParentID='".$rData[0]['ChildID']."' and ChildPosition='L'");
                        $newClass = ($rDataSuNodeL[0]['PlacedBy']==$userData['MemberID'])  ? " border " :"" ; 
                        if (sizeof($rDataSuNodeL)==1) {
                            $PlanCompletedIDs[]=$rDataSuNodeL[0]['ChildID'];
                            $rDataSuNodeL = $mysql->select("select * from _tbl_Members where MemberID='".$rDataSuNodeL[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rDataSuNodeL[0]['FirstName']." ".$rDataSuNodeL['0']['LastName']."<br>".$rDataSuNodeL[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=1&parent=".$rData[0]['ChildID']."&C=L'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    } else {
                          echo "<div  class='noGold2'>Create Member</div>";
                           echo "<span class='triangle-up'></span>"; 
                    }
                    ?>
                </td>
                <td style="width:200px;padding-bottom:10px;text-align:center;">
                    <?php
                     if (sizeof($rData)>0) {
                        $rDataSuNodeR=$mysql->select("select * from _tbl_Member_Placement where Plan=".$PlanID." and ParentID='".$rData[0]['ChildID']."' and ChildPosition='R'");
                        if (sizeof($rDataSuNodeR)==1) {
                            $PlanCompletedIDs[]=$rDataSuNodeR[0]['ChildID'];
                            $newClass = ($rDataSuNodeR[0]['PlacedBy']==$userData['MemberID'])  ? " border " :"" ; 
                            $rDataSuNodeR = $mysql->select("select * from _tbl_Members where MemberID='".$rDataSuNodeR[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rDataSuNodeR[0]['FirstName']." ".$rDataSuNodeR['0']['LastName']."<br>".$rDataSuNodeR[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=1&parent=".$rData[0]['ChildID']."&C=R'>Create Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                     } else {
                          echo "<div  class='noGold2'>Create Member</div>"; 
                           echo "<span class='triangle-up2'></span>";
                     }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width:400px;padding-bottom:10px;text-align:center;">
                    <?php
                        if (sizeof($lData)==1) {
                            $PlanCompletedIDs[]=$lData[0]['ChildID'];
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$lData[0]['ChildID']."'");
                            echo "<div  class='Gold border'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=1&C=L'>Create<br>Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    ?>
                </td>
                <td colspan="2" style="width:400px;padding-bottom:10px;text-align:center;">
                    <?php
                        if (sizeof($rData)==1) {
                            $PlanCompletedIDs[]=$rData[0]['ChildID'];
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$rData[0]['ChildID']."'");
                            echo "<div  class='Gold border'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=1&C=R'>Create<br>Member</a></div>";
                        }
                         echo "<span class='triangle-up'></span>";
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"> <div class="Gold"><?php echo $userData['FirstName']." ".$userData['LastName']."<br>".$userData['MemberCode']; ?></div> </td>
            </tr>
        </table>
        </div>
 <?php } else { 
    $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$PlanID."'");
        ?>
          <div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)"><img src="assets/images/PlanImg1.png" style="width:400px"></div>
        </div>
        <div style="padding:20px;">
           <table cellspacing="0" style="width:90%;margin:0px auto;border:1px solid #ccc;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)">
            <tr>
                <td style="padding:15px;background:#F8E9AD;text-align:center;font-size:15px"><?php echo $planDetails[0]['PlanString'];?>: table of orders </td>
                <!--<td rowspan="3" style="width:200px;background:#333;text-align:center"><img src="assets/images/plan3.png" style="width:150px"></td>-->
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
                <td style="padding:15px;background:#E1F3C9;text-align:center;font-size:14px"><input  onclick="enableBtn()" type="checkbox" id="agreed"> I confirm that I agree to the terms.</td>
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
                  if ($('#agreed').is(":checked")) {
                        $('#DoPaymentProcess').removeAttr("disabled");
                  } else {
                      $('#DoPaymentProcess').attr("disabled","disabled");
                  }
            }
        </script>
 <?php } ?>
 <?php
    if ($PlanComplete==6) {
        echo "<br><br><div style='padding:10px;background:#78cc1e;color:#fff;text-align:center;font-size:14px'>Plan Completed</div>";     
        
        $ud = $mysql->select("select * from _tbl_Members   where MemberID='".$userData['MemberID']."'");
        
        if ($ud[0]['GoodwayCompleted']>0) {
            
        } else {
            $mysql->execute("update _tbl_Members set   PlanUpgradedB='1', GoodwayCompleted='1',GoodWayID='".implode(".",$PlanCompletedIDs)."' where MemberID='".$userData['MemberID']."'");    
        }
        
        if ($ud[0]['PlanUpgradedB']==1) {
            //echo "Please upgrade your account";
        } else
        
         {
        
        ?>
        <script src="http://malsup.github.io/jquery.blockUI.js"></script>
        <script>
         // $.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
         setTimeout(function(){
          $.blockUI({ message: $('#Completed') });    
         },1000);
          
        </script>
        <div id="Completed" style="display:none">
        <div style="text-align:center;padding:20px;">
        <span style="font-size:36px"> Congrats !!!</span><Br><br>
        <span style="font-size:16px">You have completed "<b>Goodway</b>" Table.</span><br><br><br> 
        <a class="TMenu" style="float:none;text-decoration:none" href="http://goodgrowth.in/app/dashboard.php?action=MYGOLD">upgrade my account with <b>My Gold</b> Plan</a>
        <a href="javascript:$.unblockUI()" class="hlink" style="color:#555">Close</a>
        </div>
        </div>
        <?php
        
    }
    }
 ?>
 </div>
</div>
</div>
  