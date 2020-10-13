<?php include_once("header.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Genealogy Tree
                                   <!-- <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div> -->
                                </div>
                            </div>
                                 </div>
                    </div> 
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                        <div id="level0">
                        <table align="center" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="width:130px;vertical-align:top"></td>
                                <td style="width:130px;vertical-align:top"></td>
                                <td style="width:130px;vertical-align:top">
                                <?php $MemCode = isset($_GET['MemberCode']) ? $_GET['MemberCode'] : $_SESSION['User']['MemberCode']; ?>
                                <?php $pMember=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$MemCode."'"); ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[0]['MemberCode'];?></b>
                                    <?php echo $pMember[0]['MemberName'];?>
                                </div>
                                </td>
                                <td style="width:130px;vertical-align:top"></td>
                                <td style="width:130px;vertical-align:top"></td>
                            </tr>
                        </table>
                        </div>
                        <div id="level1">
                        <table align="center" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="width:130px;vertical-align:top"><img src="assets/images/leftdown.png"></td>
                                <td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td>
                                <td style="width:130px;vertical-align:top"><img src="assets/images/center.png"></td>
                                <td style="width:130px;vertical-align:top"><img src="assets/images/down.png"></td>
                                <td style="width:130px;vertical-align:top"><img src="assets/images/rightdown.png"></td>
                            </tr>
                        </table>
                        <table align="center" cellspacing="0" cellpadding="0">                                                                                    
                            <?php //$pMember=$mysql->select("select * from `_tbl_placements` where `ParentMemberCode`='".$pMember[0]['MemberCode']."'"); ?>
                            <?php $pMember=$mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$pMember[0]['MemberCode']."'"); ?>
                            <tr>
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[0]['ChildMemberID']) && $pMember[0]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[0]['ChildMemberCode'];?>','1','level2');">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[0]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[0]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;;cursor:pointer">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=1">Create Member</a> */?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[1]['ChildMemberID']) && $pMember[1]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[1]['ChildMemberCode'];?>','2','level2');">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[1]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[1]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /*<a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=2">Create Member</a> */ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[2]['ChildMemberID']) && $pMember[2]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer;"  onclick="javascript:getTree('<?php echo $pMember[2]['ChildMemberCode'];?>','3','level2');">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto">
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[2]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[2]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /* <a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=3">Create Member</a> */ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[3]['ChildMemberID']) && $pMember[3]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer;" onclick="javascript:getTree('<?php echo $pMember[3]['ChildMemberCode'];?>','4','level2');">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto" >
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[3]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[3]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /*<a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=4">Create Member</a>*/ ?>
                                </div>                                
                                <?php } ?>
                                </td>
                                
                                <td style="width:130px;vertical-align:top">
                                <?php if (isset($pMember[4]['ChildMemberID']) && $pMember[4]['ChildMemberID']>0) {?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;cursor:pointer" onclick="javascript:getTree('<?php echo $pMember[4]['ChildMemberCode'];?>','5','level2');">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto" >
                                        <img src="assets/images/user_small.png" style="height: 69px;width: 69px;">
                                    </div>
                                    <b><?php echo $pMember[4]['ChildMemberCode'];?></b>
                                    <?php echo $pMember[4]['ChildMemberName'];?>
                                </div>
                                <?php } else { ?>
                                <div style="width:130px;margin:0px auto;text-align:center;font-size:12px;">
                                    <div style="border:3px solid #888;padding:5px;height:85px;width:85px;border-radius:50%;background:#fff;margin:0px auto;margin-bottom:10px">
                                        <img src="assets/images/plus.png" style="width:85px;height:85px;width:70px;height:70px;background: #e5e5e5;border-radius: 50%;">
                                    </div> 
                                     <?php /*<a href="CreateMember.php?P=<?php echo $MemCode;?>&HL=5">Create Member</a>*/ ?>
                                </div>                                
                                <?php } ?>
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
                   $.ajax({url:"webservice.php?MemberCode="+MemCode+"&N="+Level,success:function(res) {
                            $('#'+Level).html(result+res);
                   }})  ;
                    
                }
                </script>
      <?php include_once("footer.php");?>