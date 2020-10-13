<?php include_once("header.php");?>    
<div class="app-main__outer" style="padding-left:320px">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Dashbaord
                        <div class="page-title-subheading">
                        Direct: 
                         <?php $dMembers=$mysql->select("select count(*) as cnt from `_tbl_placements` where `UplineMemberCode`='".$_SESSION['User']['MemberCode']."' and IsPayable='1'"); ?>
                         <?php echo "Direct: <b style='color:#c10b85'>".(isset($dMembers[0]['cnt']) ? $dMembers[0]['cnt'] : "0")."</b>";?><br>
                         Additional:
                          <?php $dMembers=$mysql->select("select count(*) as cnt from `_tbl_placements` where `UplineMemberCode`='".$_SESSION['User']['MemberCode']."' and IsPayable='0'"); ?>
                         <?php echo "Direct: <b style='color:#c10b85'>".(isset($dMembers[0]['cnt']) ? $dMembers[0]['cnt'] : "0")."</b>";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
            
    <div class="tabs-animation">
        <div class="mb-3 card">       
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                    Smart Account Summary
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
                                            <?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where IsUsed='0' and SoldMemberCode='".$_SESSION['User']['MemberCode']."' and `PinPackageID`='2'")); ?>/<?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where SoldMemberCode='".$_SESSION['User']['MemberCode']."' and `PinPackageID`='2'")); ?>
                                            </span></div>
                                            <div class="widget-description text-focus">
                                              
                                                <a href="myepins.php">view pins</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                   <!--             
                <div class="col-sm-12 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                            <i class="lnr-apartment text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Epin Summary (1H Series)</div>
                                            <div class="widget-numbers text-success"><span>
                                            <?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where IsUsed='0' and SoldMemberCode='".$_SESSION['User']['MemberCode']."' and `PinPackageID`='3'")); ?>/<?php echo sizeof($mysql->select("select SoldMemberCode from  _tbl_epins where SoldMemberCode='".$_SESSION['User']['MemberCode']."' and `PinPackageID`='3'")); ?>
                                            </span></div>
                                            <div class="widget-description text-focus">
                                              
                                                <a href="mysepins.php">view pins</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                           
             </div>
             </div>  
             
                        
                  <!--                                                                  
                        <div class="row" style="width: 905px;height:130px;overflow: auto;margin:0px auto;margin-bottom: 30px;">
                        
                        <div class="card-header-tab card-header" style="margin-bottom: 28px;height: 110px;text-align:left;border: 1px solid #23b7e5;">
                            <div style="width:135px;text-align:center;height: 110px;padding-top: 16px;">
                                Star (1+5)<br> 
                                <?php echo countDownlines($_SESSION['User']['MemberCode'],1,1,$ids);?>/625<br>
                                <?php
                                    $cnt = getTags($_SESSION['User']['MemberCode'],1);
                                    if ($cnt[0]['Filled']<5) {
                                        echo "<div style='font-size:12px;color:#777;padding-top:5px';>not eligible</div>";
                                        echo (sizeof($cnt)>0) ?  fillStarts($cnt[0]['Filled'],5) : fillStarts(0,5);     
                                    } else {
                                        echo "<div style='font-size:12px;color:#777;padding-top:5px';>eligible</div>";
                                        echo fillStarts(5,5);
                                    }
                                ?>
                            </div>
                            <div style="width:145px;text-align:center;background: #23b7e5;color:white;height: 110px;padding-top: 16px;">
                                Double Star  <br> 
                                 <?php echo countDownlines($_SESSION['User']['MemberCode'],1.5,1,$ids);?>/(<?php echo 625*5;?>)
                                <br>
                            </div>
                            <div style="width:155px;text-align:center;height: 110px;padding-top: 16px;">
                                Silver (1+5+5)<br> 
                                <?php echo countDownlines($_SESSION['User']['MemberCode'],2,1,$ids); ?>/(<?php echo 625*5*5;?>)<br>
                                <?php
                                    $cnt = getTags($_SESSION['User']['MemberCode'],2);
                                    if ($cnt[0]['Filled']<5) {
                                        echo "<div style='font-size:12px;color:#777;padding-top:5px';>not eligible</div>";
                                        echo (sizeof($cnt)>0) ? fillStarts($cnt[0]['Filled'],5) : fillStarts(0,5);   
                                    } else {
                                        echo "<div style='font-size:12px;color:#777;padding-top:5px';>eligible</div>";
                                        echo  fillStarts(5,5);   
                                    }
                                ?>
                            </div>
                            <div style="width:165px;text-align:center;background: #23b7e5;color:white;height: 110px;padding-top: 16px;">
                                Double Silver<br>
                                <?php echo countDownlines($_SESSION['User']['MemberCode'],2.5,1,$ids);?>/(<?php echo 625*5*5*5;?>)
                                <br>
                            </div>
                            <div style="width:175px;text-align:center;height: 110px;padding-top: 16px;">
                                Gold  (1+5+5+10)<br>  
                                <?php echo countDownlines($_SESSION['User']['MemberCode'],3,1,$ids); ?>/(<?php echo 625*5*5*5*5;?>)<br>
                                <?php
                                    $cnt = getTags($_SESSION['User']['MemberCode'],3);
                                    if ($cnt[0]['Filled']<10) {
                                        echo "<div style='font-size:12px;color:#777;padding-top:5px';>not eligible</div>";
                                        echo (sizeof($cnt)>0) ? fillStarts($cnt[0]['Filled'],10) : fillStarts(0,10);   
                                    } else {
                                        echo "<div style='font-size:12px;color:#777;padding-top:5px';>eligible</div>";
                                        echo fillStarts(10,10);   
                                    }
                                ?>
                            </div>
                            <div style="width:185px;text-align:center;background: #23b7e5;color:white;height: 110px;padding-top: 16px;">
                                Double Gold<br>
                                <?php echo countDownlines($_SESSION['User']['MemberCode'],3.5,1,$ids);?>/(<?php echo 625*5*5*5*5*5;?>)
                                <br>
                            </div>
                            <div style="width:185px;text-align:center;height: 110px;padding-top: 16px;">
                                AFMIS-3 (1+5+5+10+10)
                                <br>
                                <?php echo countDownlines($_SESSION['User']['MemberCode'],4,1,$ids);?>/(<?php echo 625*5*5*5*5*5*5;?>)
                                <br>
                                <?php
                                $cnt = getTags($_SESSION['User']['MemberCode'],4);
                                if ($cnt[0]['Filled']<10) {
                                    echo "<div style='font-size:12px;color:#777;padding-top:5px';>not eligible</div>";
                                    echo (sizeof($cnt)>0) ? fillStarts($cnt[0]['Filled'],10) : fillStarts(0,10);   
                                } else {
                                    echo "<div style='font-size:12px;color:#777;padding-top:5px';>eligible</div>";
                                    echo fillStarts(10,10);   
                                }
                                ?>
                            </div>  
                            
                            <div style="width:185px;text-align:center;background: #23b7e5;color:white;height: 110px;padding-top: 16px;">
                            1+5+5+10+10+10<br>
                            <?php echo countDownlines($_SESSION['User']['MemberCode'],5,1,$ids);?>/(<?php echo 625*5*5*5*5*5*5*5;?>)<br>
                            <?php
                            $cnt = getTags($_SESSION['User']['MemberCode'],5);
                            if ($cnt[0]['Filled']<10) {
                                echo "<div style='font-size:12px;color:#777;padding-top:5px';>not eligible</div>";
                                echo (sizeof($cnt)>0) ?  fillStarts($cnt[0]['Filled'],10) : fillStarts(0,10);   
                            } else {
                                echo "<div style='font-size:12px;color:#777;padding-top:5px';>eligible</div>";
                                echo fillStarts(10,10);   
                            }
                            ?>
                            </div>  

                            <div style="width:185px;text-align:center;height: 110px;padding-top: 16px;">
                             1+5+5+10+10+10+10<br>
                            <?php echo countDownlines($_SESSION['User']['MemberCode'],6,1,$ids);?>/(<?php echo 625*5*5*5*5*5*5*5*5;?>)<br>
                            <?php
                            $cnt = getTags($_SESSION['User']['MemberCode'],6);
                            if ($cnt[0]['Filled']<10) {
                                echo "<div style='font-size:12px;color:#777;padding-top:5px';>not eligible</div>";
                                echo (sizeof($cnt)>0) ?  fillStarts($cnt[0]['Filled'],10) : fillStarts(0,10);   
                            } else {
                                echo "<div style='font-size:12px;color:#777;padding-top:5px';>eligible</div>";
                                echo fillStarts(10,10);    
                            }
                            ?>
                            </div> 
                            
                            <div style="width:185px;text-align:center;background: #23b7e5;color:white;height: 110px;padding-top: 16px;">
                            <br>
                            <?php
                            $cnt = getTags($_SESSION['User']['MemberCode'],7);
                            echo "<div style='font-size:18px;color:#fff;padding-top:5px';>".(isset($cnt[0]['Filled']) ? $cnt[0]['Filled'] : 0)."</div>";
                            ?>
                            </div> 
                           
                        </div>  
                        
                        </div>
                      -->                      
                        <div class="row">
                             
                            <div class="col-sm-12">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            <i class="header-icon lnr-lighter icon-gradient bg-amy-crisp"> </i>
                                            My Recent Members
                                        </div>
                                    </div>
                                    <div class=""  style="width: 90%;margin:0px auto">
                                         <?php
                                         $allMembers = $mysql->select("Select * from _tbl_earnings where MemberCode='".$_SESSION['User']['MemberCode']."' order by EarningId Desc limit 0,10");
                                         ?>
                                          <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>DateTime</th>
                                    <th>Member Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($allMembers as $allMember){ ?>
                                <tr>
                                    <td><?php echo $allMember['PlacedOn'];?></td>
                                    <td><?php echo $allMember['PlacedMemberCode'];?><br>
                                       <?php echo $allMember['PlacedMemberName'];?>
                                    </td>
                                   
                                </tr>
                                <?php }?>
                                <?php if (sizeof($allMembers)==0) {?>
                                <tr>
                                    <td colspan="2" style="text-align:center">No Members found</td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <a href="MyMembers.php">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus">
                                            View All Members
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>  
                
 <?php include_once("footer.php");?>