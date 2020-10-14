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
                                <div>Direct Member Tree</div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                         <table style="width: 100%;" class="mb-0 table table-bordered">
                                <thead>
                                <tr>
                                    <th>Levels</th>
                                    <th>Members</th>
                                    <th>My Direct Members</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $L1= getMembers($_SESSION['User']['MemberCode'],1); ?>
                                <tr>
                                    <td>Direct</td>
                                    <td style="text-align:right"><?php echo sizeof($L1);?></td>
                                    <td><?php echo implode(", ",$L1);?></td>
                                </tr>
                                <tr>
                                    <td>Star</td>
                                    <td style="text-align:right"><?php echo countDownlines($_SESSION['User']['MemberCode'],"1",0,$ids) ; ?></td>
                                    <td><?php echo implode(",",$ids);?></td>
                                </tr>
                                <tr>
                                    <td>Double Star</td>
                                    <td style="text-align:right"><?php echo implode(",",getMembers($_SESSION['User']['MemberCode'],3));?></td>
                                </tr>
                                <tr>
                                     <td> Silver</td>
                                 <td style="text-align:right"><?php echo countDownlines($_SESSION['User']['MemberCode'],"2",0,$ids2) ; ?></td>
                                    <td><?php echo implode(", ",$ids2);?></td>
                                </tr>
                                <tr>
                                    <td>Double Silver</td>
                                    <td style="text-align:right"><?php echo implode(",",getMembers($_SESSION['User']['MemberCode'],5));?></td>
                                </tr>
                                <tr>
                                    <td>Gold</td>
                                   <td style="text-align:right"><?php echo countDownlines($_SESSION['User']['MemberCode'],"3",0,$ids3) ; ?></td>
                                    <td><?php echo implode(", ",$ids3);?></td>
                                </tr>
                                <tr>
                                    <td>Double Gold</td>
                                    <td style="text-align:right"><?php echo implode(",",getMembers($_SESSION['User']['MemberCode'],5));?></td>
                                </tr>
                                <tr>
                                    <td>AFMIS-3 1+5+5+10+10</td>
                                   <td style="text-align:right"><?php echo countDownlines($_SESSION['User']['MemberCode'],"4",0,$ids4) ; ?></td>
                                    <td><?php echo implode(", ",$ids4);?></td>
                                </tr>
                                <tr>
                                    <td> 1+5+5+10+10+10</td>
                                   <td style="text-align:right"><?php echo countDownlines($_SESSION['User']['MemberCode'],"5",0,$ids5) ; ?></td>
                                    <td><?php echo implode(", ",$ids5);?></td>
                                </tr>
                                <tr>
                                    <td> 1+5+5+10+10+10+10</td>
                                   <td style="text-align:right"><?php echo countDownlines($_SESSION['User']['MemberCode'],"6",0,$ids6) ; ?></td>
                                    <td><?php echo implode(", ",$ids6);?></td>
                                </tr>
                                </tbody>
                            </table>         
                        </div>
                    </div>
                </div>
              <?php include_once("footer.php");?>