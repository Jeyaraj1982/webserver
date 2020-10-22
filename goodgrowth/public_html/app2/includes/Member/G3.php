<?php
$PlanID=4;
$PlanString = " PlanUpgradedD='1' and  ";
$PlanGrade = "PlanUpgradedD";
$PlanComplete = 0;
$PlanCompletedIDs = array();
$PlanRequiredToComplete = 12;
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
           G3
        </div>
        <div class="panel-body list">
        <?php
             if (isset($_GET['msg'])) {
                       echo SuccessMsg($_GET['msg']);        
                }
                $loginEntries = $mysql->select("select * from _tbl_Members where ".$PlanString." ReferedBy='".$userData['MemberID']."' order by MemberID desc");
                $loginEntries = $mysql->select("select * from _tbl_Members where MemberID in (select ChildID from _tbl_Member_Placement where Plan='4' and PlacedBy='".$userData['MemberID']."') order by MemberID desc");
                if (sizeof($loginEntries)>0) {
            ?>
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
    <div class="form-group row">
        <div class="col-sm-12" style="text-align: right;">
            <table>
                <tr>
                   <td style="width:20px;background:yellow">&nbsp;</td><td>&nbsp;My Direct Referals</td> 
                </tr>
            </table>
        </div>
    </div>
 <?php
 $myData = $mysql->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'");
 if ($myData[0][$PlanGrade]==1) {
 
 $level1 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and Plan='".$PlanID."'");
    
    $level1_1 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='1' and Plan='".$PlanID."'");
    $level1_2 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='2' and Plan='".$PlanID."'");
    $level1_3 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='3' and Plan='".$PlanID."'");
 ?>
    <div style="width: 820px;background: #eddd97;padding: 10px;margin: 0px auto;">
        <table style="background:#eddd97;width:800px;margin:0px auto" cellpadding="5" cellspacing="5">
        <tr>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)>0) {
                        $level1_1D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_1[0]['ChildID']."' and ChildPosition='1' and Plan='".$PlanID."'");
                        if (sizeof($level1_1D)==1) {
                            $PlanCompletedIDs[]=$level1_1D[0]['ChildID'];
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_1D[0]['ChildID']; 
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_1D[0]['ChildID'];
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_2D[0]['ChildID'];
                            $newClass = ($level1_2D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_2D[0]['ChildID'];
                            $newClass = ($level1_2D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_2D[0]['ChildID'];
                            $newClass = ($level1_2D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_3D[0]['ChildID'];
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_3D[0]['ChildID'];
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                            $PlanCompletedIDs[]=$level1_3D[0]['ChildID'];
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
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
                        $PlanCompletedIDs[]=$level1_1[0]['ChildID'];
                        $level1_1D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$lData[0]['FirstName']." ".$level1_1D['0']['LastName']."<br>".$level1_1D[0]['MemberCode']."</div>";
                        $PlanComplete++;
                    } else {
                        echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=1'>Create<br>Member</a></div>";
                    }
                     echo "<span class='triangle-up'></span>";
                ?>
            </td>
            <td colspan="3"  style="width:300px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)==1) {
                        $PlanCompletedIDs[]=$level1_2[0]['ChildID'];
                        $level1_2D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$rData[0]['FirstName']." ".$level1_2D['0']['LastName']."<br>".$level1_2D[0]['MemberCode']."</div>";
                        $PlanComplete++;
                    } else {
                        echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=".$PlanID."&C=2'>Create<br>Member</a></div>";
                    }
                     echo "<span class='triangle-up'></span>";
                ?>
            </td>
            <td colspan="3" style="width:300px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)==1) {
                        $PlanCompletedIDs[]=$level1_3[0]['ChildID'];
                        $level1_3D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$rData[0]['FirstName']." ".$level1_3D['0']['LastName']."<br>".$level1_3D[0]['MemberCode']."</div>";
                        $PlanComplete++;
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
    </div>
 <?php } else { 
    $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$PlanID."'");
        ?>
          <div style="text-align:center;;padding:20px">
               <?php
            $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$PlanID."'");
        ?>
           <div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)"><img src="assets/images/PlanImg4.png" style="width:400px"></div>
        </div>
        <?php /* ?>
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
        <?php */ ?>
 <?php } ?>
<?php
    if ($PlanComplete==6) {
        echo "<br><br><div style='padding:10px;background:#78cc1e;color:#fff;text-align:center;font-size:14px'>Plan Completed</div>";     
        
        $ud = $mysql->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'");
        
        if ($ud[0]['G3Completed']>0) {
            
        } else {
            $mysql->execute("update _tbl_Members set   PlanUpgradedA='1', G3Completed='1',G3ID='".implode(".",$PlanCompletedIDs)."' where MemberID='".$userData['MemberID']."'");    
        }
        
        if ($ud[0]['PlanUpgradedA']==0) {
            //echo "Please upgrade your account";
        } 
        
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
        <span style="font-size:16px">You have completed "<b>G3</b>" Table.</span><br><br><br> 
        <a class="TMenu" style="float:none;text-decoration:none" href="http://goodgrowth.in/app/dashboard.php?action=GoldWay">upgrade my account with <b>Good Way</b> Plan</a>
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
  