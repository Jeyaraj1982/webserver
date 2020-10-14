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
                                <div>Earning History  <br>
                                <span style="font-size:12px;">Total Earned: Rs. <?php echo number_format(getOverallBalance($_SESSION['User']['MemberCode']),2);?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date Time</th>
                                    <th>Stage</th>
                                    <th>Member Code</th>
                                    <th>Member Name</th>
                                    <th>Stage Income</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php
                                     $earings = $mysql->select("select * from `_tbl_earnings` where `MemberCode`='".$_SESSION['User']['MemberCode']."' order by EarningId Desc");
                                     foreach($earings as $e) {
                                         ?>
                                         <tr>
                                            <td><?php echo $e['PlacedOn'];?></td>
                                            <td style="text-align:center"><?php echo $e['LevelNumber'];?></td>
                                            <td><?php echo $e['PlacedMemberCode'];?></td>
                                            <td><?php echo $e['PlacedMemberName'];?></td>
                                            <td style="text-align:right"><?php echo number_format($e['LevelIncome'],2);?></td>
                                         </tr>
                                         <?php
                                     }
                                 ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              <?php include_once("footer.php");?>