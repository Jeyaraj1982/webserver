<?php 
    $FromD = isset($_POST['FromD']) ? $_POST['FromD'] : date("d");
    $FromM = isset($_POST['FromM']) ? $_POST['FromM'] : date("m");
    $FromY = isset($_POST['FromY']) ? $_POST['FromY'] : date("Y");
    $ToD = isset($_POST['ToD']) ? $_POST['ToD'] : date("d");
    $ToM = isset($_POST['ToM']) ? $_POST['ToM'] : date("m");
    $ToY = isset($_POST['ToY']) ? $_POST['ToY'] : date("Y");
    $fromDate = $FromY."-".$FromM."-".$FromD;
    $toDate = $ToY."-".$ToM."-".$ToD;
    if(isset($_POST['viewTransaction'])){
        $earings = $mysql->select("select * from `_tbl_wallet_earning` where `MemberCode`='".$_SESSION['User']['MemberCode']."' and (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) order by AcTxnID Desc");
    }else{
        $earings = $mysql->select("select * from `_tbl_wallet_earning` where `MemberCode`='".$_SESSION['User']['MemberCode']."' order by AcTxnID Desc");
    }
?>
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
                                        E-Wallet Summary<br>
                                        <span style="font-size:12px;">Available Balance: Rs. <?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" onsubmit="return validation();">
                                <div class="form-group row">                  
                                    <div class="col-sm-5">
                                        <label>From</label>
                                      <div class="form-group row" style="padding: 0px;">
                                        <div class="col-sm-3" style="padding-right: 0px;">
                                            <select required="" name="FromD" id="date" class="form-control" style="border:1px solid #ccc">
                                                <?php for($i=1;$i<=31;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromD'])) ? (($_POST[ 'FromD']==$i) ? " selected='selected' " : "") : (($FromD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                <?php } ?>                       
                                            </select>
                                        </div>
                                        <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                                            <select required="" style="border:1px solid #ccc" class="form-control" name="FromM" id="FromM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                <option value="1"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==1) ? " selected='selected' " : "") : (($FromM==1) ? " selected='selected' " : "");?>>January</option>
                                                <option value="2"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==2) ? " selected='selected' " : "") : (($FromM==2) ? " selected='selected' " : "");?>>February</option>
                                                <option value="3"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==3) ? " selected='selected' " : "") : (($FromM==3) ? " selected='selected' " : "");?>>March</option>
                                                <option value="4"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==4) ? " selected='selected' " : "") : (($FromM==4) ? " selected='selected' " : "");?>>April</option>
                                                <option value="5"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==5) ? " selected='selected' " : "") : (($FromM==5) ? " selected='selected' " : "");?>>May</option>
                                                <option value="6"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==6) ? " selected='selected' " : "") : (($FromM==6) ? " selected='selected' " : "");?>>June</option>
                                                <option value="7"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==7) ? " selected='selected' " : "") : (($FromM==7) ? " selected='selected' " : "");?>>July</option>
                                                <option value="8"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==8) ? " selected='selected' " : "") : (($FromM==8) ? " selected='selected' " : "");?>>August</option>
                                                <option value="9"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==9) ? " selected='selected' " : "") : (($FromM==9) ? " selected='selected' " : "");?>>September</option>
                                                <option value="10" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==10) ? " selected='selected' " : "") : (($FromM==10) ? " selected='selected' " : "");?>>October</option>
                                                <option value="11" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==11) ? " selected='selected' " : "") : (($FromM==11) ? " selected='selected' " : "");?>>November</option>
                                                <option value="12" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==12) ? " selected='selected' " : "") : (($FromM==12) ? " selected='selected' " : "");?>>December</option>
                                            </select> 
                                        </div>
                                        <div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">
                                            <select required="" style="border:1px solid #ccc" class="form-control" name="FromY" id="FromY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromY'])) ? (($_POST[ 'FromY']==$i) ? " selected='selected' " : "") : (($FromY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                <?php } ?>                       
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="col-sm-1">To</label>
                                        <div class="form-group row" style="padding: 0px;">
                                                <div class="col-sm-3" style="padding-right: 0px;">
                                                    <select required="" name="ToD" id="ToD" class="form-control" style="border:1px solid #ccc">
                                                        <?php for($i=1;$i<=31;$i++) {?>
                                                        <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'ToD'])) ? (($_POST[ 'ToD']==$i) ? " selected='selected' " : "") : (($ToD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                        <?php } ?>                       
                                                    </select>
                                                </div>
                                                <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                                                    <select required="" style="border:1px solid #ccc;" class="form-control" name="ToM" id="ToM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                         <option value="1"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==1) ? " selected='selected' " : "") : (($ToM==1) ? " selected='selected' " : "");?>>January</option>
                                                            <option value="2"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==2) ? " selected='selected' " : "") : (($ToM==2) ? " selected='selected' " : "");?>>February</option>
                                                            <option value="3"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==3) ? " selected='selected' " : "") : (($ToM==3) ? " selected='selected' " : "");?>>March</option>
                                                            <option value="4"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==4) ? " selected='selected' " : "") : (($ToM==4) ? " selected='selected' " : "");?>>April</option>
                                                            <option value="5"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==5) ? " selected='selected' " : "") : (($ToM==5) ? " selected='selected' " : "");?>>May</option>
                                                            <option value="6"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==6) ? " selected='selected' " : "") : (($ToM==6) ? " selected='selected' " : "");?>>June</option>
                                                            <option value="7"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==7) ? " selected='selected' " : "") : (($ToM==7) ? " selected='selected' " : "");?>>July</option>
                                                            <option value="8"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==8) ? " selected='selected' " : "") : (($ToM==8) ? " selected='selected' " : "");?>>August</option>
                                                            <option value="9"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==9) ? " selected='selected' " : "") : (($ToM==9) ? " selected='selected' " : "");?>>September</option>
                                                            <option value="10" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==10) ? " selected='selected' " : "") : (($ToM==10) ? " selected='selected' " : "");?>>October</option>
                                                            <option value="11" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==11) ? " selected='selected' " : "") : (($ToM==11) ? " selected='selected' " : "");?>>November</option>
                                                            <option value="12" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==12) ? " selected='selected' " : "") : (($ToM==12) ? " selected='selected' " : "");?>>December</option>
                                                    </select> 
                                                </div>
                                                <div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">
                                                    <select style="border:1px solid #ccc" required="" class="form-control" name="ToY" id="ToY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                        <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                        <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'ToY'])) ? (($_POST[ 'ToY']==$i) ? " selected='selected' " : "") : (($ToY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                        <?php } ?>                       
                                                    </select>
                                                </div>           
                                            </div>
                                    </div>
                                    <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary" style="padding-top: 8px;padding-bottom: 8px;">View</button></div>
                                </div>
                            </form> <br><br>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" id="basic-datatables" style="width: 100%;border-top:1px solid #ebedf2;border-bottom:1px solid #ebedf2;">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th>Particulars</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                         foreach($earings as $e) {
                                             ?>
                                             <tr>
                                                <td><?php echo $e['TxnDate'];?></td>
                                                <td><?php echo $e['Particulars'];?></td>
                                                <td style="text-align:right"><?php echo $e['Credit'];?></td>
                                                <td style="text-align:right"><?php echo $e['Debit'];?></td>
                                                <td style="text-align:right"><?php echo $e['Balance'];?></td>
                                             </tr>
                                             <?php
                                         }
                                     ?>
                                     <?php if(sizeof($earings)==0){ ?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;">No records found</td>
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