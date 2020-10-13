<?php include_once("../config.php"); ?> 

<?php 
    $pMember=$mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$_GET['MemberCode']."' order by `PlacementID`"); 
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

 <?php
 // $pMember=$mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$pMember[0]['MemberCode']."'"); 
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
                                 ?>
                                <td style="width:130px;vertical-align:top">
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $childa['ChildMemberCode'];?>','<?php echo $_GET['C']+$i; ?>','<?php echo $div;?>');">
                                    <div class="<?php echo getCss($childa['ChildMemberCode']);?>" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $childa['ChildMemberCode'];?></b>
                                    <?php echo $childa['ChildMemberName'];?><br>
                                    <?php $dMembers=$mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childa['ChildMemberCode']."'"); ?>
                                    <?php echo "Direct: <b style='color:#c10b85'>".sizeof($dMembers)."</b>";?>
                                </div>
                                </td>
                           <?php } ?>
                                <td style="width:130px;vertical-align:top"> 
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;;cursor:pointer">
                                    <div class="border_5x" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=1">Create Member</a> */?>
                                </div>                                
                                </td>    
                            </tr>             
                        </table>
                        
                        <?php exit; ?>
    <table align="center" cellspacing="0" cellpadding="0">
        <tr>
            <td style="width:130px;vertical-align:top">
                <?php if (isset($pMember[0]['ChildMemberID']) && $pMember[0]['ChildMemberID']>0) {?>
                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[0]['ChildMemberCode'];?>','1','<?php echo $div;?>');">
                    <div class="<?php echo getCss($pMember[0]['ChildMemberCode']);?>"  style=";padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                    </div>
                    <b><?php echo $pMember[0]['ChildMemberCode'];?></b>
                    <?php echo $pMember[0]['ChildMemberName'];?>
                </div>
                <?php } else { ?>
                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                    <div class="border_5x"  style=";padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                    </div> 
                    <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=1">Create Member</a> */ ?>
                </div>                                
                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[1]['ChildMemberID']) && $pMember[1]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[0]['ChildMemberCode'];?>','2','<?php echo $div;?>');">
                                    <div class="<?php echo getCss($pMember[1]['ChildMemberCode']);?>" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[1]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[1]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div class="border_5x" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                    <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=2">Create Member</a> */ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[2]['ChildMemberID']) && $pMember[2]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[0]['ChildMemberCode'];?>','3','<?php echo $div;?>');">
                                    <div class="<?php echo getCss($pMember[2]['ChildMemberCode']);?>" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto" >
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[2]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[2]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div class="border_5x" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /*<a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=3">Create Member</a> */ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[3]['ChildMemberID']) && $pMember[3]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[0]['ChildMemberCode'];?>','4','<?php echo $div;?>');">
                                    <div class="<?php echo getCss($pMember[3]['ChildMemberCode']);?>" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[3]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[3]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div class="border_5x" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                    <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=4">Create Member</a> */ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[4]['ChildMemberID']) && $pMember[4]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer"  onclick="javascript:getTree('<?php echo $pMember[0]['ChildMemberCode'];?>','5','<?php echo $div;?>');">
                                    <div class="<?php echo getCss($pMember[4]['ChildMemberCode']);?>" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[4]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[4]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div class="border_5x" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                    <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=5">Create Member</a> */ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                            </tr>             
                        </table>