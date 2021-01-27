<?php
    include_once("../config.php");
?>
<style>
#star{color:red}
</style>
<script>
     function submitMember() {
         
                $('#ErrFirstName').html("");
                $('#ErrSurname').html("");
                $('#ErrPassword').html("");
                $('#ErrConfirmPassword').html("");
                $('#ErrMobileNumber').html("");
                $('#ErrAddress1').html("");
                
                ErrorCount = 0;
                
                IsNonEmpty("FirstName", "ErrFirstName", "Please Enter Your First Name");
                IsNonEmpty("Surname", "ErrSurname", "Please Enter Your Surname");
                IsNonEmpty("Password", "ErrPassword", "Please Enter Password");
                IsNonEmpty("ConfirmPassword", "ErrConfirmPassword", "Please Enter Confirm Password");
                IsNonEmpty("MobileNumber", "ErrMobileNumber", "Please Enter Mobile Number");
                IsNonEmpty("Address1", "ErrAddress1", "Please Enter Address1");
                
                 var password = document.getElementById("Password").value;
                 var confirmPassword = document.getElementById("ConfirmPassword").value;
                  if (password != confirmPassword) {
                  ErrorCount++;
                  $('#ErrConfirmPassword').html("Passwords do not match.");
                  }
                  return (ErrorCount==0) ? true : false;
    }
</script>
 <?php
 include_once("../config.php");   
 ?>
<div class="row">
                             
                            
                     <?php
                            $level1=$mysql->select("select * from _tbl_member where SponsorCode='".$_SESSION['User']['MemberCode']."' order by MemberID");
                            $array=array();
                            $array['FM']="5H100002000030001";
                            //Level 1
                            if (sizeof($level1)>0) {
                                $array['FM1']=$level1[0]['MemberCode'];
                                
                                 $level2=$mysql->select("select * from _tbl_member where SponsorCode='".$level1[0]['MemberCode']."' order by MemberID");
                                 if (sizeof($level2)>0) {
                                    $array['FM2']=$level2[0]['MemberCode']; 
                                    
                                     $level3=$mysql->select("select * from _tbl_member where SponsorCode='".$level2[0]['MemberCode']."' order by MemberID");
                                     if (sizeof($level3)>0) {
                                        $array['FM3']=$level3[0]['MemberCode']; 
                                        
                                        $level4=$mysql->select("select * from _tbl_member where SponsorCode='".$level3[0]['MemberCode']."' order by MemberID");
                                        if (sizeof($level4)>0) {
                                            $array['FM4']=$level4[0]['MemberCode']; 
                                            
                                            $level5=$mysql->select("select * from _tbl_member where SponsorCode='".$level4[0]['MemberCode']."' order by MemberID");
                                            if (sizeof($level5)>0) {
                                                $array['FM5']=$level5[0]['MemberCode'];
                                                
                                                $level6=$mysql->select("select * from _tbl_member where SponsorCode='".$level5[0]['MemberCode']."' order by MemberID");
                                                if (sizeof($level6)>0) {
                                                    $array['FM6']=$level6[0]['MemberCode'];
                                                    
                                                    $level7=$mysql->select("select * from _tbl_member where SponsorCode='".$level6[0]['MemberCode']."' order by MemberID");
                                                    if (sizeof($level7)>0) {
                                                       // $array['FM7']=$level7[0]['MemberCode']; 
                                                    } 
                                                } 
                                            }
                                        }
                                     }
                                 }
                            }
                            
                             $amount = array("","600","200","200","200","200","200","200");
                             $amount = array("","600","200","200","200","200","200");
                             $i=1;
                           // print_r($array);
                        ?>
                                        
                            
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
                                   
                                    <th style="text-align: center;font-weight:bold">Level</th>
                                    <th style="text-align: center;font-weight:bold">Member Code</th>
                                    <th style="text-align: center;font-weight:bold">Name & Address</th>
                                    <th style="text-align: center;font-weight:bold">Admin & Amount</th>
                                    
                                    <th style="text-align: center;font-weight:bold">Postal Details</th>
                                    <th style="text-align: center;font-weight:bold">Bank Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                               foreach ($array as $k=>$v){
                                                
                                                     $allMembers = $mysql->select("Select * from _tbl_member where MemberCode='".$v."' order by MemberID");
                                                     $allMember=$allMembers[0];
                                                     ?>
                                <tr>
                                   
                                    <td style="vertical-align:top"><?php echo $k;?></td>
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
                                     
                                     ?><br>
                                     Amount: 
                                        <?php if (isset($amount[$i])) { ?>
                                     Rs.<?php echo $amount[$i];?>/-
                                     <?php } ?>
                                     
                                     </td>
                                    
                                    <td style="vertical-align:top">
                                          <b>Village & Pin Code:</b><?php echo $allMember['MOVillage'];?><br>
                                    <b>MO & A/C Number:</b><?php echo $allMember['MOAccount'];?><br>
                                    
                                    </td>
                                       <td style="vertical-align:top">
                                     
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
 

