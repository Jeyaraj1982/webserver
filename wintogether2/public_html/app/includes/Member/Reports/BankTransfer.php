<?php
    if (!(isset($_POST['FromM']))) {
        $_POST['FromD']=date("d");
        $_POST['FromM']=date("m");
        $_POST['FromY']=date("Y");
        $_POST['ToD']=date("d");
        $_POST['ToM']=date("m");
        $_POST['ToY']=date("Y");
    } else {
        $fDate = $_POST['FromY']."-".$_POST['FromM']."-".$_POST['FromD'];
        $tDate = $_POST['ToY']."-".$_POST['ToM']."-".$_POST['ToD'];
    }
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Earnings/RoiIncome">Reports</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Earnings/BankTransfer">Wallet To Bank Transfer</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Wallet To Bank Transfer</h4>
                </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <label>From</label>
                                    <div class="form-group row" style="padding: 0px;">
                                    <div class="col-sm-3">
                                        <select required="" name="FromD" id="date" class="form-control" style="border:1px solid #ccc">
                                            <?php for($i=1;$i<=31;$i++) {?>
                                            <option value="<?php echo $i;?>" <?php echo ($i==$_POST['FromD']) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-5" >
                                        <select required="" style="border:1px solid #ccc" class="form-control" name="FromM" id="FromM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                            <option value="1"  <?php echo ( 1==$_POST['FromM']) ? " selected='selected' ": "";?>>January</option>
                                            <option value="2"  <?php echo ( 2==$_POST['FromM']) ? " selected='selected' ": "";?>>February</option>
                                            <option value="3"  <?php echo ( 3==$_POST['FromM']) ? " selected='selected' ": "";?>>March</option>
                                            <option value="4"  <?php echo ( 4==$_POST['FromM']) ? " selected='selected' ": "";?>>April</option>
                                            <option value="5"  <?php echo ( 5==$_POST['FromM']) ? " selected='selected' ": "";?>>May</option>
                                            <option value="6"  <?php echo ( 6==$_POST['FromM']) ? " selected='selected' ": "";?>>June</option>
                                            <option value="7"  <?php echo ( 7==$_POST['FromM']) ? " selected='selected' ": "";?>>July</option>
                                            <option value="8"  <?php echo ( 8==$_POST['FromM']) ? " selected='selected' ": "";?>>August</option>
                                            <option value="9"  <?php echo ( 9==$_POST['FromM']) ? " selected='selected' ": "";?>>September</option>
                                            <option value="10" <?php echo (10==$_POST['FromM']) ? " selected='selected' ": "";?>>October</option>
                                            <option value="11" <?php echo (11==$_POST['FromM']) ? " selected='selected' ": "";?>>November</option>
                                            <option value="12" <?php echo (12==$_POST['FromM']) ? " selected='selected' ": "";?>>December</option>
                                        </select> 
                                    </div>
                                    <div class="col-sm-4">
                                        <select required="" style="border:1px solid #ccc" class="form-control" name="FromY" id="FromY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                            <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                            <option value="<?php echo $i;?>" <?php echo ($i==$_POST['FromY']) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                  </div>
                                    <!--<div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                    -->
                                </div>
                                <div class="col-sm-5">
                                    <label class="col-sm-1">To</label>
                                    <div class="form-group row" style="padding: 0px;">
                                            <div class="col-sm-3">
                                                <select required="" name="ToD" id="ToD" class="form-control" style="border:1px solid #ccc">
                                                    <?php for($i=1;$i<=31;$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo ($i==$_POST['ToD']) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-5" >
                                                <select required="" style="border:1px solid #ccc;" class="form-control" name="ToM" id="ToM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                    <option value="1"  <?php echo ( 1==$_POST['ToM']) ? " selected='selected' ": "";?>>January</option>
                                                    <option value="2"  <?php echo ( 2==$_POST['ToM']) ? " selected='selected' ": "";?>>February</option>
                                                    <option value="3"  <?php echo ( 3==$_POST['ToM']) ? " selected='selected' ": "";?>>March</option>
                                                    <option value="4"  <?php echo ( 4==$_POST['ToM']) ? " selected='selected' ": "";?>>April</option>
                                                    <option value="5"  <?php echo ( 5==$_POST['ToM']) ? " selected='selected' ": "";?>>May</option>
                                                    <option value="6"  <?php echo ( 6==$_POST['ToM']) ? " selected='selected' ": "";?>>June</option>
                                                    <option value="7"  <?php echo ( 7==$_POST['ToM']) ? " selected='selected' ": "";?>>July</option>
                                                    <option value="8"  <?php echo ( 8==$_POST['ToM']) ? " selected='selected' ": "";?>>August</option>
                                                    <option value="9"  <?php echo ( 9==$_POST['ToM']) ? " selected='selected' ": "";?>>September</option>
                                                    <option value="10" <?php echo (10==$_POST['ToM']) ? " selected='selected' ": "";?>>October</option>
                                                    <option value="11" <?php echo (11==$_POST['ToM']) ? " selected='selected' ": "";?>>November</option>
                                                    <option value="12" <?php echo (12==$_POST['ToM']) ? " selected='selected' ": "";?>>December</option>
                                                </select> 
                                            </div>
                                            <div class="col-sm-4">
                                                <select style="border:1px solid #ccc" required="" class="form-control" name="ToY" id="ToY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                    <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo ($i==$_POST['ToY']) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>           
                                        </div>
                                    <!--
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div> 
                                    -->   
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View transactions</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
    <?php if (isset($_POST['viewTransaction'])) {
      
        
        ?>     
<div style="padding:25px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">    
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Report Date</th>
                                    <th>Particulars</th>
                                    <th style="text-align: right">Amount ($)</th>
                                    <th style="text-align: right">Status</th>
                                    <th style="text-align: right">Trasnfer On</th>
                                    <th style="text-align: right">Bank Txn ID</th>
                                    <th style="text-align: right">Amount (INR)</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                              //  $Transactions=$mysql->select("xselect * from `_tbl_wallet_earnings` where Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='2' or Ledger='20001') order by EarningID DESC"); 
                                ?>
                               
                                <?php if(sizeof($Transactions)=="0"){?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">No records found</td>
                                </tr>
                                <?php }?> 
                                <?php foreach ($Transactions as $Transaction){ ?>
                                <tr>
                                    <td><?php echo date("M d, Y",strtotime($Transaction['TxnDate']));?></td>
                                    <td><?php echo $Transaction['Particulars'];?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
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
    <?php } ?>
    <script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>