<?php include_once("header.php");?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                        </div>
                        <div>Transfer E-Pins</div>
                    </div>
                    <div class="page-title-actions">
                        <a href="myepins.php">All Pins</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="usedepins.php">Used Pins</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="unusedepins.php">Un-Used Pins</a>
                    </div>
                </div>
            </div>
            <?php $Epins= $mysql->select("select * from  _tbl_epins where  IsUsed='0' and   SoldMemberID='".$_SESSION['User']['MemberID']."' and `PinPackageID`='2' order by PinID Desc");?>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="TransferEPinsTo.php" method="post" onsubmit="return validateSelected()">
                        <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>E-pin</th>
                                    <th>Pin Password</th>
                                    <th>E-Pin Value</th>
                                    <th>Generated</th>
                                    <th>Purchased</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Epins as $Epin){ ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" class="check" value="<?php echo $Epin['PinCode'];?>">&nbsp;<?php echo $Epin['PinCode'];?></td>
                                    <td><?php echo $Epin['EPinPassword'];?></td>
                                    <td style="text-align:right"><?php echo number_format($Epin['PinValue'],2);?></td>
                                    <td ><?php echo ($Epin['SoldMemberCode']==$Epin['CreatedByCode']) ? $Epin['GeneratedOn'] : ""; ?></td>
                                    <td style="text-align:right">
                                    <td ><?php echo ($Epin['IsSold']==1) ? $Epin['SoldOn'] : ""; ?></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <input type="submit" value="Transfer" name="btnTransfer">
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script>
        var i=0;
        function validateSelected(){
            i=0;
            $.each($("input[class='check']:checked"), function() {        
                i++;
            });
            if (i==0) {
                alert("Please select any one id");
                return false;
            } else {
                return true;
            }
        }
    </script>
 <?php include_once("footer.php");?>