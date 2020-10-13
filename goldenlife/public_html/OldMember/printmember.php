<?php
 include_once("../config.php");   
 ?>
<div class="row">
                             
                            
                             
                            
                            <div class="col-sm-12">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    
                                    <div >
                                         <?php
                                         $amount = array("","600","200","200","200","200","200","200");
                                 
                                         $allMembers = $mysql->select("Select * from _tbl_member where SponsorCode='".$_SESSION['User']['MemberCode']."' order by MemberID");
                                         ?>
                                         <table style="width: 100%;margin:0px auto;font-family:arial;" border='1' cellpadding="3" cellspacing="0">
                                            <tr>
                                                <td colspan="2" style="padding:20px;">
                                                    <div style="text-align:center;font-weight:bold;font-size:35px;">Golden Life Society Plan-500</div>
                                                    <div style="text-align:center;font-size:18px;font-weight:bold"> Details Bank & Postal Details</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding:0px;">
                                                      <table style="width: 100%;border:none;"  border="1" cellpadding="3" cellspacing="0" >
                                <thead>
                                <tr>
                                    <th style="text-align: center;font-weight:bold">Sl No</th>
                                    <th style="text-align: center;font-weight:bold">Member Code</th>
                                    <th style="text-align: center;font-weight:bold">Name & Address</th>
                                    <th style="text-align: center;font-weight:bold">Admin</th>
                                    <th style="text-align: center;font-weight:bold">Amount</th>
                                    <th style="text-align: center;font-weight:bold">Postal (Or) Bank Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($allMembers as $allMember){ ?>
                                <tr>
                                    <td style="vertical-align:top"><?php echo $i;?></td>
                                    <td style="vertical-align:top">
                                        <b>ID Name:</b><br>
                                        <?php echo $allMember['MemberCode'];?><br><br>
                                       <b>Cell No:</b><br><?php echo $allMember['MemberMobileNumber'];?>
                                    </td>
                                    <td style="vertical-align:top">
                                        <?php echo $allMember['MemberName'];?>,<br>
                                        <?php echo $allMember['MemberFatherName'];?>,<br>
                                        <?php 
                                            if (strlen(trim($allMember['AddressLine1']))>0) {
                                                echo $allMember['AddressLine1'].",<bR>";    
                                            }
                                            
                                            if (strlen(trim($allMember['AddressLine2']))>0) {
                                                echo $allMember['AddressLine2'].",<bR>";    
                                            }
                                            
                                            if (strlen(trim($allMember['City']))>0) {
                                                echo $allMember['City']; 
                                                 if (strlen(trim($allMember['State']))>0) {
                                                 echo ", ".$allMember['State'];    
                                                }
                                                echo ",<br>";
                                                   
                                            }
                                          ?>
                                        Pincode- <?php echo $allMember['PinCode'];?>, 
                                    </td>
                                     <td style="text-align: center;;vertical-align:top"><?php 
                                     if ($i==1) {
                                         echo "Five Member Entry<br>and<br>Auto Filling";
                                     } else {
                                         echo "Member";
                                     }
                                     
                                     ?></td>
                                     <td style="text-align: center;vertical-align:top">
                                                      <?php if (isset($amount[$i])) { ?>
                                     Rs.<?php echo $amount[$i];?>/-
                                     <?php } ?>
                                     
                                     </td>
                                    <td style="vertical-align:top">
                                          <b>Village & Pin Code:</b><?php echo $allMember['MOVillage'];?><br>
                                    <b>MO & A/C Number:</b><?php echo $allMember['MOAccount'];?><br>
                                    
                                    
                                       <br>
                                    <!--<b>Bank Name:</b><br>-->
                                    <b>A/C Number:</b><br>
                                    <b>Bank & IFSC Code:</b><br>
                                    <b>Name of Village:</b><br>
                                    </td>                    
                                </tr>
                                <?php $i++; }?>
                                <?php if (sizeof($allMembers)==0) {?>
                                <tr>
                                    <td colspan="2" style="text-align:center">No Members found</td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                                                </td>
                                            </tr>
                                            
                                              <tr>
                                                <td width="50%" style="vertical-align:top;padding:10px">
                                                
                                                <b>Your ID Number:</b> <?php echo $_SESSION['User']['MemberCode'];?><br><br><br><br>
                                                <div>
                                                    <div style="float:left;padding:5px;text-align:center;margin-right:10px">Your Entrty</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;border:1px solid #333">1</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;border:1px solid #333">2</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;border:1px solid #333">3</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;border:1px solid #333">4</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;border:1px solid #333">5</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;">...</div>
                                                    <div style="float:left;padding:5px 10px;text-align:center;margin-right:10px;border:1px solid #333;width:80px">&nbsp;</div>
                                                </div>
                                                
                                                </td>
                                                                                                <td width="50%"  style="vertical-align:top;padding:10px">
                                                <b>Your Name:</b> <?php echo $_SESSION['User']['MemberName'];?><br><br><br> <br>
                                                
                                                
                                                <p align="right">Signature</p>
                                                
                                                </td>

                                            </tr>
                                         </table>
                                          
                                    </div>
                                     
                                </div>
                            </div>
                                
                        </div>
<script>
window.print();
</script>