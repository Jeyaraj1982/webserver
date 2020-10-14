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
                                <div>My E-Pins  </div>
                            </div>
                            <div class="page-title-actions">
                                 
                                 
                            </div>    </div>
                    </div>            <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>E-pin</th>
                                    <th>E-Pin Password</th>
                                    <th>Pin Value</th>
                                    <th>Generated</th>
                                    <th>Sold for</th>
                                    <th>Sold</th>
                                    <th>Used for</th>
                                    <th>Used</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $Epins= $mysql->select("select * from  _tbl_epins where GeneratedByID='".$_SESSION['User']['AdminID']."' order by PinID Desc");?>
                                <?php foreach ($Epins as $Epin){ ?>
                                <tr>
                                    <td><?php echo $Epin['PinCode'];?></td>
                                    <td><?php echo $Epin['EPinPassword'];?></td>
                                    <td><?php echo $Epin['PinValue'];?></td>
                                    <td><?php echo $Epin['GeneratedOn'];?></td>
                                    <td><?php echo $Epin['SoldMemberName'];?></td>
                                    <td><?php echo $Epin['SoldOn'];?></td>
                                    <td><?php echo $Epin['UsedMemberName'];?></td>
                                    <td><?php echo $Epin['UsedOn'];?></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>                                   
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>