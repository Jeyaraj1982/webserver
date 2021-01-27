
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Genealogy Tree
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        
 
 
       
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div id="level0">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="width:130px;vertical-align:top">
                                    <?php $MemCode = isset($_GET['MemberCode']) ? $_GET['MemberCode'] : $_SESSION['User']['MemberCode']; ?>
                                    <?php $pMember=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$MemCode."'"); ?>
                                    <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                        <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                            <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                        </div>
                                        <b style="font-size:10px;"><?php echo $pMember[0]['MemberCode'];?></b><br>
                                        <span style="font-size:10px;"><?php echo $pMember[0]['MemberName'];?></span><br>
                                        <?php $dMembers=$mysql->select("select * from `_tbl_member` where `SponsorCode`='".$pMember[0]['MemberCode']."'"); ?>
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
                        <?php $pMember=$mysql->select("select * from `_tbl_member` where `SponsorCode`='".$pMember[0]['MemberCode']."' order by `MemberCode`"); ?>
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
                                ?>
                                <td style="width:130px;vertical-align:top">
                                    <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $childa['MemberCode'];?>','<?php echo $i?>','level2');">
                                        <div class="<?php echo getCss($childa['ChildMemberCode']);?>" style="padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                            <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                        </div>
                                        <b  style="font-size:10px;"><?php echo $childa['MemberCode'];?></b><br>
                                        <span style="font-size:10px;"><?php echo $childa['MemberName'];?></span><br>
                                        <?php $dMembers=$mysql->select("select * from `_tbl_member` where `SponsorCode`='".$childa['MemberCode']."'"); ?>
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
                    <div id="level2"></div>
                    <div id="level3"></div>
                    <div id="level4"></div>
                    <div id="level5"></div>
                    <div id="level6"></div>
                    <div id="level7"></div>
                    <div id="level8"></div>
                    <div id="level9"></div>
                    <div id="level10"></div>
                </div>
            </div>
            
            </div>
            </div>
            </div>
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
      <?php include_once("footer.php");?>