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
                                        My Members
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                            <th style="text-align: center;font-weight:bold">Admin & Amount</th>
                                            <th style="text-align: center;font-weight:bold">Postal Details</th>
                                            <th style="text-align: center;font-weight:bold">Bank Details</th>
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
                                        <td colspan="6" style="text-align:center">No Members found</td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>


 