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
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           GOLD FINISH
        </div>
        <div class="panel-body list">
<?php
 if (isset($_GET['msg'])) {
           echo SuccessMsg($_GET['msg']);        
    }
    //$loginEntries = $mysql->select("select * from _tbl_Members where ".$PlanString." ReferedBy='".$userData['MemberID']."' order by MemberID desc");
    $loginEntries = $mysql->select("select * from _tbl_Members where MemberID in (select ChildID from _tbl_Member_Placement where Plan='3' and PlacedBy='".$userData['MemberID']."') order by MemberID desc");
    
?>
 
<Br>
 
    
 
 <div style="text-align:center;;padding:20px;font-size:20px;color:orange;;padding:200px">
        
        You must fill <b>Gold Eagle</b> Table
    </div>
  <!--<div style="text-align:center;;padding:20px">
            <div style="background:#fff;width:90%;margin:0px auto;padding-top:15px;padding-bottom:15px;"><img src="assets/images/PlanImg3.png" style="width:400px"></div>
        </div>  -->
 </div>
 </div>
 </div>
 