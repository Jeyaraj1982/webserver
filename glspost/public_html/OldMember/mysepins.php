<?php include_once("header.php");?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                        </div>
                        <div>My Special E-Pins (All)</div>
                    </div>
                    <div class="page-title-actions">
                        <a href="mysepins.php">All Pins</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        
                    </div>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <?php $Epins= $mysql->select("select * from  _tbl_epins where SoldMemberID='".$_SESSION['User']['MemberID']."' and `PinPackageID`='3' order by PinID Desc");?>
                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>E-pin</th>
                                <th>Pin Password</th>
                                <th>Generated</th>
                                <th>Purchased</th>
                                <th>Used Member</th>
                                <th>Used Member Name</th>
                                <th>Used On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Epins as $Epin){ ?>
                            <tr>
                                <td><?php echo $Epin['PinCode'];?></td>
                                <td><?php echo $Epin['EPinPassword'];?></td>
                                <td><?php echo ($Epin['SoldMemberCode']==$Epin['CreatedByCode']) ? $Epin['GeneratedOn'] : ""; ?></td>
                                <td><?php echo $Epin['GeneratedOn'];?></td>
                                <td><?php echo $Epin['UsedMemberCode'];?></td>
                                <td><?php echo $Epin['UsedMemberName'];?></td>
                                <td><?php echo $Epin['UsedOn'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php include_once("footer.php");?>