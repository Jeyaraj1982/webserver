<?php include_once("../config.php"); ?> 

<?php 
    //$pMember=$mysql->select("select * from `_tblPlacements` where `PlacedByCode`='".$_GET['MemberCode']."' order by `PlacementID`"); 
    $pMember=$mysql->select("select * from `_tblPlacements` left Join _tbl_Members on _tbl_Members.MemberCode=_tblPlacements.ChildCode where _tblPlacements.`UsedEPin`='1' and   _tblPlacements.`PlacedByCode`='".$_GET['MemberCode']."'"); 
    $MemCode=$_GET['MemberCode'];
    $div = "";
    if ($_GET['N']=="level2") {
        $div = "level3";
    }
    
    if ($_GET['N']=="level3") {
        $div = "level4";
    }
    
     if ($_GET['N']=="level4") {
        $div = "level5";
    }
    
    if ($_GET['N']=="level5") {
        $div = "level6";
    }
    
    if ($_GET['N']=="level6") {
        $div = "level7";
    }
    
    if ($_GET['N']=="level7") {
        $div = "level8";
    }
    if ($_GET['N']=="level8") {
        $div = "level9";
    }
?>

 
                        <table   cellspacing="0" cellpadding="0">
                            <tr>
                                <?php if ($_GET['C']>1) {
                                    for($i=1;$i<$_GET['C'];$i++) {?>
                                <td style="width:130px;vertical-align:top"></td>
                                <?php } } ?>
                                <?php if (sizeof($pMember)==0) {?>
                                    <td style="width:130px;vertical-align:top"><img src="assets/images/sline.png"></td>
                                <?php } else if (sizeof($pMember)==1) {?>
                                        <td style="width:130px;vertical-align:top"><img src="assets/images/lcenter.png"></td>
                                        <td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td>
                                <?php } else { ?>
                                    <td style="width:130px;vertical-align:top"><img src="assets/images/lcenter.png"></td>
                                    <?php for($i=2;$i<=sizeof($pMember);$i++) { ?>
                                    <td style="width:130px;vertical-align:top"><img src="assets/images/bcenter.png"></td>
                                    <?php } ?>
                                    <td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td>
                                <?php } ?>
                                
                            </tr>
                        </table>
                        <table  cellspacing="0" cellpadding="0">                                                                                    
                            <tr>
                            <?php
                                function getCss($code) {
                                   return substr($code,0,1)=="5" ?  'border_5x' : 'border_1x';
                                }
                            ?>
                            <?php if ($_GET['C']>1) {
                                    for($i=1;$i<$_GET['C'];$i++) {?>
                                <td style="width:130px;vertical-align:top"></td>
                                <?php } } ?>
                            <?php
                             $i=-1;
                             foreach($pMember as $childa) { 
                                 
                                 $i++;                          
                                  $border = $childa['UsedEPin']==0 ? "#ccc" : "#b0f788";
                                 ?>
                                <td style="width:130px;vertical-align:top">
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $childa['ChildCode'];?>','<?php echo $_GET['C']+$i; ?>','<?php echo $div;?>');">
                                    <div style="border:3px solid <?php echo $border;?>;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <!--<img src="assets/images/user_small.png" style="height: 69px;width: 69px;">-->
                                          <?php if ($childa['ProfilePhoto']=="") {?>
                                            <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                            <?php } else {?>
                                            <img src="../uploads/<?php echo $childa['ProfilePhoto'];?>" style="border-radius:50%;height: 69px;width: 69px;">
                                            <?php } ?>
                                    </div>
                                    <b><?php echo $childa['ChildCode'];?></b><br>
                                    <?php echo $childa['ChildName'];?><br>
                                    <?php $dMembers=$mysql->select("select * from `_tblPlacements` where `UsedEPin`='1' and  `PlacedByID`='".$childa['ChildID']."'"); ?>
                                    <?php echo "Direct: <b style='color:#c10b85'>".sizeof($dMembers)."</b>";?>
                                </div>
                                </td>
                           <?php } ?>
                                <td style="width:130px;vertical-align:top"> 
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;;cursor:pointer">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=1">Create Member</a> */?>
                                </div>                                
                                </td>    
                            </tr>             
                        </table>
                        
                        <?php exit; ?>
     