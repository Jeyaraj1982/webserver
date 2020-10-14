<?php include_once("header.php");?>    
<div class="app-main__outer" style="padding-left:320px">
        
            
    <div class="tabs-animation">
        <div class="mb-3 card">       
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                   Dashboard
                </div>
            </div>
            <div class="no-gutters row">
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                            <i class="lnr-laptop-phone text-dark opacity-8"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Withdrawable Balance</div>
                            <div class="widget-numbers"><?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></div>
                            <div class="widget-description opacity-8 text-focus">
                                <!--<div class="d-inline text-danger pr-1">
                                    <i class="fa fa-angle-down"></i>
                                    <span class="pl-1">54.1%</span>
                                    </div> -->
                                <a href="ViewAccountSummary.php">view statments</a>
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                            <i class="lnr-graduation-hat text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Earnings</div>
                            <div class="widget-numbers"><span><?php echo number_format(getOverallBalance($_SESSION['User']['MemberCode']),2);?></span></div>
                            <div class="widget-description opacity-8 text-focus">
                                <a href="EarningHistory.php">view statments</a>
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
              
                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                            <i class="lnr-apartment text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Epin Summary (5H Series)</div>
                                            <div class="widget-numbers text-success"><span>
                                            <?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where IsUsed='0' and SoldMemberID='".$_SESSION['User']['MemberID']."' and `PinPackageID`='1'")); ?>/<?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where SoldMemberID='".$_SESSION['User']['MemberID']."' and `PinPackageID`='1'")); ?>
                                            </span></div>
                                            <div class="widget-description text-focus">
                                              
                                                <a href="myepins.php">view pins</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                                                                      
                           
             </div>
             </div>  
             
                        
                                         
                        <div class="row">
                            <div class="col-sm-12" style="text-align: right;" >
                                  <a href="CreateMember.php">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus">
                                            Create Member
                                        </button>
                                        </a>
                                        <br><br>
                            </div>
                            
                            <div class="col-sm-12" style="text-align: center;" >
                                  <a href="printmember.php">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus">
                                            Print
                                        </button>
                                        </a>
                                        <br><br>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    
                                    <div >
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
                                    <b>Name of Village:</b><br>
                                    <b>MO & A/C Number:</b><?php echo $allMember['MOAccount'];?><br>
                                    <b>Village Pin Code:</b><?php echo $allMember['MOVillage'];?><br>
                                    
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
                                    <td colspan="6" style="text-align:center">No Members found</td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                                    </div>
                                     
                                </div>
                            </div>
                               <div class="col-sm-12" style="text-align: center;" >
                                  <a href="MyMembers.php">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus">
                                            More Members
                                        </button>
                                        </a>
                                        <br><br>
                            </div>
                        </div>
                    </div>
                    
                </div>  
                
 <?php include_once("footer.php");?>