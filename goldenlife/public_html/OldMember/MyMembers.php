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
                                <div>My Members</div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                       <!-- <div class="card-body">
                               <?php
                                      //   $allMembers = $mysql->select("Select * from _tbl_member where SponsorCode='".$_SESSION['User']['MemberCode']."' order by MemberID Desc");
                                         ?>
                                          <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Joined</th>
                                    <th>Member Code</th>
                                    <th>Member Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php //foreach ($allMembers as $allMember){ ?>
                                <tr>
                                    <td><?php //echo $allMember['CreatedOn'];?></td>
                                    <td><?php //echo $allMember['MemberCode'];?></td>
                                    <td><?php //echo $allMember['MemberName'];?></td>
                                     
                                </tr>
                                <?php //}?>
                                <?php //if (sizeof($allMembers)==0) {?>
                                <tr>
                                    <td colspan="3" style="text-align:center">No Members found</td>
                                </tr>        
                                <?php //} ?>
                                </tbody>
                            </table>
                        </div> -->
                        <div class="col-sm-12">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div>
                                         <?php
                                         $amount = array("","600","200","200","200","200","200","200");
                                         $allMembers = $mysql->select("Select * from _tbl_member where SponsorCode='".$_SESSION['User']['MemberCode']."' order by MemberID");
                                         ?>
                                          <table style="width: 100%;" border="1" >
                                            <thead>
                                            <tr>
                                                <th style="text-align: center;font-weight:bold">Sl No</th>
                                                <th style="text-align: center;font-weight:bold">Member Code</th>
                                                <th style="text-align: center;font-weight:bold">Name & Address</th>
                                                <th style="text-align: center;font-weight:bold">Admin</th>
                                                <th style="text-align: center;font-weight:bold">Amount</th>
                                                <th style="text-align: center;font-weight:bold">Details Bank & Postal Details</th>
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
                                                        S/O <?php echo $allMember['MemberFatherName'];?>,<br>
                                                        <?php echo $allMember['AddressLine1'];?>,<bR>
                                                        <?php echo $allMember['AddressLine2'];?>,<Br>
                                                        <?php echo $allMember['City'];?>, <?php echo $allMember['State'];?>, 
                                                        <?php echo $allMember['Country'];?> - <?php echo $allMember['PinCode'];?>, 
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
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
              <?php include_once("footer.php");?>