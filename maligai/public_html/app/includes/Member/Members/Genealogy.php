<?php include_once("header.php");?>
<div style="padding:25px">
<div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/Genealogy">Genealogy Tree</a></li>
        </ul>
    </div>
  <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Genealogy Tree</h4>
                </div>
                <div class="card-body" style="overflow:auto;">
                    <div id="level0">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="width:130px;vertical-align:top">
                                    <?php $MemCode = isset($_GET['Code']) ? $_GET['Code'] : $_SESSION['User']['MemberCode']; ?>
                                    <?php $pMember=$mysql->select("select * from `_tbl_Members` where `MemberCode`='".$MemCode."'"); ?>
                                    <?php  $border = $pMember[0]['IsActive']==0 ? "#ccc" : "#b0f788"; ?>
                                    <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                        <div style="border:3px solid <?php echo $border;?>;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                            <!--<img src="assets/images/user_small.png" style="height: 69px;width: 69px;">-->
                                            <?php if ($pMember['ProfilePhoto']=="") {?>
                                            <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                            <?php } else {?>
                                            <img src="../uploads/<?php echo $pMember['ProfilePhoto'];?>" style="border-radius:50%;height: 69px;width: 69px;">
                                            <?php } ?>
                                            
                                        </div>
                                        <b><?php echo $pMember[0]['MemberCode'];?></b><br>
                                        <?php echo $pMember[0]['MemberName'];?><br>
                                        <?php $dMembers=$mysql->select("select * from `_tblPlacements` where `UsedEPin`='1' and `PlacedByID`='".$pMember[0]['MemberID']."'"); ?>
                                        <?php echo "Direct: <b style='color:#c10b85'>".sizeof($dMembers)."</b>";?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="level1">
                    <?php                
                                function getCss($code) {
                                   return substr($code,0,1)=="5" ?  'border_5x' : 'border_1x';
                                }
                            ?>
                        <?php //$pMember=$mysql->select("select * from `_tblPlacements` where `PlacedByID`='".$pMember[0]['MemberID']."'"); ?>
                        <?php $pMember=$mysql->select("select * from `_tblPlacements` left Join _tbl_Members on _tbl_Members.MemberCode=_tblPlacements.ChildCode where _tblPlacements.`UsedEPin`='1' and _tblPlacements.`PlacedByID`='".$pMember[0]['MemberID']."'"); ?>
                        <table align="left" style="clear:both"  cellspacing="0" cellpadding="0">
                            <tr>
                                <?php if (sizeof($pMember)==0) {?>
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
                        <table align="left" style="clear:both" cellspacing="0" cellpadding="0">                                                                                    
                            <tr>
                                <?php
                                    $i=0;
                                    foreach($pMember as $childa) {
                                        $i++;
                                        $border = $childa['UsedEPin']==0 ? "#ccc" : "#b0f788";
                                ?>
                                <td style="width:130px;vertical-align:top">
                                    <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $childa['ChildCode'];?>','<?php echo $i?>','level2');">
                                        <div class="<?php echo getCss($childa['ChildMemberCode']);?>" style="border:3px solid <?php echo $border;?>;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                             <?php if ($childa['ProfilePhoto']=="") {?>
                                            <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                            <?php } else {?>
                                            <img src="../uploads/<?php echo $childa['ProfilePhoto'];?>" style="border-radius:50%;height: 69px;width: 69px;">
                                            <?php } ?>
                                        </div>
                                        <b><?php echo $childa['ChildCode'];?></b><br> 
                                        <?php echo $childa['ChildName'];?>
                                        
                                        
                                        <br>
                                        <?php $dMembers=$mysql->select("select * from `_tblPlacements` where `UsedEPin`='1' and `PlacedByID`='".$childa['ChildID']."'"); ?>
                                        <?php echo "Direct: <b style='color:#c10b85'>".sizeof($dMembers)."</b>";?>
                                    </div>
                                </td>
                                <?php } ?>
                                <td style="width:130px;vertical-align:top"> 
                                    <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;;cursor:pointer">
                                        <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                            <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                        </div> 
                                    </div>                                
                                </td>    
                            </tr>             
                        </table>
                    </div>
                    <div id="level2" style="clear: both;"></div>
                    <div id="level3" style="clear: both;"></div>
                    <div id="level4"  style="clear: both;"></div>
                    <div id="level5"  style="clear: both;"></div>
                    <div id="level6"  style="clear: both;"></div>
                    <div id="level7"  style="clear: both;"></div>
                    <div id="level8"  style="clear: both;"></div>
                    <div id="level9"  style="clear: both;"></div>
                    <div id="level10"  style="clear: both;"></div>
                </div>
            </div>
        </div>
  </div>
        <script>
        function getTree(MemCode,Column,Level) {
                    if (Level=="level2") {$('#level2').html("");$('#level3').html("");$('#level4').html("");$('#level5').html("");$('#level6').html("");$('#level7').html("");$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level3") {$('#level3').html("");$('#level4').html("");$('#level5').html("");$('#level6').html("");$('#level7').html("");$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level4") {$('#level4').html("");$('#level5').html("");$('#level6').html("");$('#level7').html("");$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level5") {$('#level5').html("");$('#level6').html("");$('#level7').html("");$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level6") {$('#level6').html("");$('#level7').html("");$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level7") {$('#level7').html("");$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level8") {$('#level8').html("");$('#level9').html("");$('#level10').html("");}
                    if (Level=="level9") {$('#level9').html("");$('#level10').html("");}
                    if (Level=="level10") {$('#level10').html("");}
                   var result  = "";
                   if (Column=="1") {
                        result = '<table align="center" cellspacing="0" cellpadding="0"><tr><td style="width:130px;vertical-align:top"><img src="assets/images/leftdirect.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td></tr></table>';
                   }
                  if (Column=="2") {
                        result = '<table align="center" cellspacing="0" cellpadding="0"><tr><td style="width:130px;vertical-align:top"><img src="assets/images/leftdown.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/center.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td></tr></table>';
                   }
                   if (Column=="3") {
                        result = '<table align="center" cellspacing="0" cellpadding="0"><tr><td style="width:130px;vertical-align:top"><img src="assets/images/leftdown.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/center.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td></tr></table>';
                   }
                   if (Column=="4") {
                        result = '<table align="center" cellspacing="0" cellpadding="0"><tr><td style="width:130px;vertical-align:top"><img src="assets/images/leftdown.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/center.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td></tr></table>';
                   }
                   if (Column=="5") {
                        result = '<table align="center" cellspacing="0" cellpadding="0"><tr><td style="width:130px;vertical-align:top"><img src="assets/images/leftdown.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td><td style="width:130px;vertical-align:top"><img src="assets/images/rightdirect.png"></td></tr></table>';
                   }  
                  $('#'+Level).html(result);
                   $.ajax({url:"webservice.php?MemberCode="+MemCode+"&N="+Level+"&C="+Column,success:function(res) {
                            $('#'+Level).html(res);
                   }})  ;
                    
                }
                </script>
        </div>
      <?php include_once("footer.php");?>