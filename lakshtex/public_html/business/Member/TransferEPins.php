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
                                        Transfer E-Pins
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $Epins= $mysql->select("select * from  _tbl_epins where  IsUsed='0' and   SoldMemberID='".$_SESSION['User']['MemberID']."' and `PinPackageID`='2' order by PinID Desc");?>
                            <div class="table-responsive">
                                <form action="Dashboard.php?action=TransferEPinsTo" method="post" onsubmit="return validateSelected()">
                                    <table class="table table-hover table-striped table-bordered" style="width: 100%;border-top:1px solid #ebedf2;">
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
                                            <?php if(sizeof($Epins)==0){?>
                                                <tr>
                                                    <td colspan="6" style="text-align:center">No Records Found</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <input type="submit" value="Transfer" name="btnTransfer">
                                </form>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
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