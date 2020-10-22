<?php
$PlanID=2;
$PlanString = " PlanUpgradedB='1' and  ";
$PlanGrade = "PlanUpgradedB";
$PlanComplete = 0;
$PlanRequiredToComplete = 6;
$PlacedIDs = array() ;

    if (isset($_POST['savebtn'])) {
        
        if (($_POST['Parent']>0)) {
            $dup=$mysql->select("select * from _tbl_Member_Placement where ParentID='".$_POST['Parent']."' and ChildID='".$_POST['id']."' and ChildPosition='".$_POST['C']."' and Plan='".$PlanID."'"); 
            if (sizeof($dup)==0) {
                $mysql->insert("_tbl_Member_Placement",array("ParentID"=>$_POST['Parent'],"ChildID"=>$_POST['id'],"ChildPosition"=>$_POST['C'],"Plan"=>$PlanID,"PlacedBy"=>$userData['MemberID'],"PlacedOn"=>date("Y-m-d H:i:s")));     
                echo "Placed Successfully";    
            } else {
                echo "Already Processed";
            }
        } else {
            $dup=$mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildID='".$_POST['id']."' and ChildPosition='".$_POST['C']."' and Plan='".$PlanID."'"); 
            if (sizeof($dup)==0) {
                $mysql->insert("_tbl_Member_Placement",array("ParentID"=>$userData['MemberID'],"ChildID"=>$_POST['id'],"ChildPosition"=>$_POST['C'],"Plan"=>$PlanID,"PlacedBy"=>$userData['MemberID'],"PlacedOn"=>date("Y-m-d H:i:s")));    
                echo "Placed Successfully";
            } else {
                echo "Already Processed";
            }
        }
        unset($_POST);
    }
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
.noGold {
    border: 1px solid 
#D1B464;
padding: 30px;
text-align: center;
color:
#fff;
border-radius: 5px;
background:
    #eddd97;
}
</style>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           MY GOLD
        </div>
        <div class="panel-body list">
        <?php
         if (isset($_GET['msg'])) {
                   echo SuccessMsg($_GET['msg']);        
            }
            $loginEntries = $mysql->select("select * from _tbl_Members where ".$PlanString." ReferedBy='".$userData['MemberID']."' order by MemberID desc");
            $loginEntries = $mysql->select("select * from _tbl_Members where MemberID in (select ChildID from _tbl_Member_Placement where Plan='2' and PlacedBy='".$userData['MemberID']."') order by MemberID desc");
            if (sizeof($loginEntries)>0) {
        ?>
        <!--<h5 class="font-light m-b-xs">My Members</h5><br>-->
         <table id="example1" class="table table-striped table-bordered table-hover" width="100%" style="display:none;">
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
        <table align="right">
            <tbody>
                <tr>
                    <td style="width:20px;background:yellow">&nbsp;</td><td>&nbsp;My Direct Referals</td>
                 </tr>
            </tbody>
        </table>
      <br><br>
    <?php
 $myData = $mysql->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'");
 if ($myData[0][$PlanGrade]==1) {
    
    $level1 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and Plan='".$PlanID."'");
    
    $level1_1 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='1' and Plan='".$PlanID."'");
    $level1_2 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='2' and Plan='".$PlanID."'");
    $level1_3 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='3' and Plan='".$PlanID."'");
    $level1_4 = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$userData['MemberID']."' and ChildPosition='4' and Plan='".$PlanID."'");
 ?>
        <div style="width: 820px;background: #eddd97;padding: 10px;margin: 0px auto;">
            <table style="background:#eddd97;width:800px;margin:0px auto" cellpadding="5" cellspacing="5">
        <tr>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)>0) {
                        $level1_1D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_1[0]['ChildID']."' and ChildPosition='L' and Plan='".$PlanID."'");
                        if (sizeof($level1_1D)==1) {
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            echo "<div  class='Gold ".$newClass."'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            //echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=L&parent=".$level1_1[0]['ChildID']."'>Create Member</a></div>";
                            echo GetTableCompleted(2,'L',$level1_1[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>"; 
                        echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)>0) {  
                        $level1_1D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_1[0]['ChildID']."' and ChildPosition='R' and Plan='".$PlanID."'");
                        if (sizeof($level1_1D)>0) {  
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            //echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=R&parent=".$level1_1[0]['ChildID']."'>Create Member</a></div>";
                            echo GetTableCompleted(2,'R',$level1_1[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>"; 
                        echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            
            <td  style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)>0) {  
                        $level1_2D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_2[0]['ChildID']."' and ChildPosition='L' and Plan='".$PlanID."'");
                        if (sizeof($level1_2D)==1) {
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            //echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=L&parent=".$level1_2[0]['ChildID']."'>Create Member</a></div>";
                            echo GetTableCompleted(2,'L',$level1_2[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>";
                        echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)>0) {  
                        $level1_2D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_2[0]['ChildID']."' and ChildPosition='R' and Plan='".$PlanID."'");
                        if (sizeof($level1_2D)==1) {
                            $newClass = ($level1_1D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                           // echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=R&parent=".$level1_2[0]['ChildID']."'>Create Member</a></div>";
                            echo GetTableCompleted(2,'R',$level1_2[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>"; 
                        echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)>0) {  
                        $level1_3D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_3[0]['ChildID']."' and ChildPosition='L' and Plan='".$PlanID."'");
                        if (sizeof($level1_3D)==1) {
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $lData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$lData[0]['FirstName']." ".$lData['0']['LastName']."<br>".$lData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            //echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=L&parent=".$level1_3[0]['ChildID']."'>Create Member</a></div>";
                            echo GetTableCompleted(2,'L',$level1_3[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>"; 
                        echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)>0) { 
                        $level1_3D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_3[0]['ChildID']."' and ChildPosition='R' and Plan='".$PlanID."'");
                        if (sizeof($level1_3D)==1) {
                            $newClass = ($level1_3D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                            //echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=R&parent=".$level1_3[0]['ChildID']."'>Create Member</a></div>";
                            echo GetTableCompleted(2,'R',$level1_3[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>";
                        echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
           
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_4)>0) { 
                        $level1_4D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_4[0]['ChildID']."' and ChildPosition='L' and Plan='".$PlanID."'");
                        if (sizeof($level1_4D)==1) {
                            $newClass = ($level1_4D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_4D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                           // echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=L&parent=".$level1_4[0]['ChildID']."'>Create Member</a></div>";
                           echo GetTableCompleted(2,'L',$level1_4[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>";
                        echo "<span class='triangle-up2'></span>"; 
                    }
                ?>
            </td>
            <td style="width:100px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_4)>0) {
                        $level1_4D = $mysql->select("select * from _tbl_Member_Placement where ParentID='".$level1_4[0]['ChildID']."' and ChildPosition='R' and Plan='".$PlanID."'"); 
                        if (sizeof($level1_4D)==1) {
                            $newClass = ($level1_4D[0]['PlacedBy']==$userData['MemberID']) ? " border " : "";
                            $rData = $mysql->select("select * from _tbl_Members where MemberID='".$level1_4D[0]['ChildID']."'");
                            echo "<div  class='Gold ".$newClass."'>".$rData[0]['FirstName']." ".$rData['0']['LastName']."<br>".$rData[0]['MemberCode']."</div>";
                            $PlanComplete++;
                        } else {
                          //  echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=R&parent=".$level1_4[0]['ChildID']."'>Create Member</a></div>";
                          echo GetTableCompleted(2,'R',$level1_4[0]['ChildID']);
                        }
                        echo "<span class='triangle-up'></span>";
                    } else {
                        echo "<div  class='noGold2'>Select Member</div>"; 
                         echo "<span class='triangle-up2'></span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width:200px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_1)==1) {
                        $PlacedIDs[] = $level1_1[0]['ChildID'];
                        $level1_1D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_1[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$level1_1D[0]['FirstName']." ".$level1_1D['0']['LastName']."<br>".$level1_1D[0]['MemberCode']."</div>";
                        $PlanComplete++;
                    } else {
                       // echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=1'>Create<br>Member</a></div>";
                       echo GetTableCompleted(2,1,0);
                    }
                      echo "<span class='triangle-up'></span>";
                ?>
            </td>
            <td colspan="2"  style="width:200px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_2)==1) {
                        $PlacedIDs[] = $level1_2[0]['ChildID'];
                        $level1_2D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_2[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$level1_2D[0]['FirstName']." ".$level1_2D['0']['LastName']."<br>".$level1_2D[0]['MemberCode']."</div>";
                        $PlanComplete++;
                    } else {
                        //echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=2'>Create<br>Member</a></div>";
                        echo GetTableCompleted(2,2,0);
                    }
                      echo "<span class='triangle-up'></span>";
                ?>
            </td>
            <td colspan="2" style="width:200px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_3)==1) {
                        $PlacedIDs[] = $level1_3[0]['ChildID'];
                        $level1_3D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_3[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$level1_3D[0]['FirstName']." ".$level1_3D['0']['LastName']."<br>".$level1_3D[0]['MemberCode']."</div>";
                        $PlanComplete++;
                    } else {
                       // echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=3'>Create<br>Member</a></div>";
                        echo GetTableCompleted(2,3,0);
                    }
                      echo "<span class='triangle-up'></span>";
                    
                ?>
            </td>
            <td colspan="2" style="width:200px;padding-bottom:10px;text-align:center;">
                <?php
                    if (sizeof($level1_4)==1) {
                        $PlacedIDs[] = $level1_4[0]['ChildID'];
                        $level1_4D = $mysql->select("select * from _tbl_Members where MemberID='".$level1_4[0]['ChildID']."'");
                        echo "<div  class='Gold border'>".$level1_4D[0]['FirstName']." ".$level1_4D['0']['LastName']."<br>".$level1_4D[0]['MemberCode']."</div>";
                        $PlanComplete++;
                    } else {
                       // echo "<div  class='noGold'><a href='dashboard.php?action=CreateMember&P=2&C=4'>Create<br>Member</a></div>";
                        echo GetTableCompleted(2,4,0);
                    }
                      echo "<span class='triangle-up'></span>";
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <div class="Gold"><?php echo $userData['FirstName']." ".$userData['LastName']."<br>".$userData['MemberCode']; ?></div>
            </td>
        </tr>
    </table>
 </div>
 <?php } else { /*?>
    
  <?php  
            $planDetails = $mysql->select("select * from _tbl_Plans where PlanID='".$PlanID."'");
        ?>
        <div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;box-shadow:0px 0px 6px 0px rgba(0, 0, 0, 0.2)"><img src="assets/images/PlanImg2.png" style="width:400px"></div>
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
                <td style="padding:15px;background:#E1F3C9;text-align:center;font-size:14px"><input  id="agreed" onclick="enableBtn()" type="checkbox"> I confirm that I agree to the terms.</td>
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
        
        You must fill <b>Goodway</b> Table
    </div>
  <div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;"><img src="assets/images/PlanImg2.png" style="width:400px"></div>
        </div>
 <?php 
 }  ?>
 <?php

 
    function GetTableCompleted($P,$C,$Parent) {
        
        global $mysql,$userData,$PlacedIDs;
        
        if (sizeof($PlacedIDs)==0) {
            return  '<div class="noGold2">Select Member</div>';  
        }
        
        $listuser=$mysql->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'") ;
        $listUser=$mysql->select("select * from _tbl_Members where Length(GoodWayID)>0 and MemberID in (".str_replace (".",",",$listuser[0]['GoodWayID']).")") ;
        $specialCount=0;
        if (sizeof($listUser)>0) {
        $res = "<form action='' method='post'>
                    <input type='hidden' value='".$P."' name='P'>
                    <input type='hidden' value='".$C."'  name='C'>
                    <input type='hidden' value='".$Parent."'  name='Parent'>
                    <select name='id'>";
        foreach($listUser as $li) {
            if (!(in_array($li['MemberID'], $PlacedIDs))) {
                $specialCount++;
                $res .= "<option  value='".$li['MemberID']."'>". $li['MemberCode']." - ".$li['FirstName']."</option>";
            }
        }
        $res .= "</select>
                 <input type='submit' value='Save' name='savebtn'>
        </form>";
        } 
        
        if ($specialCount>0) {
            return $res;
        } else {
          return  '<div class="noGold2">Select Member</div>';  
        }
    return $res;
 }
 ?>
 </div>
</div>
</div>
  