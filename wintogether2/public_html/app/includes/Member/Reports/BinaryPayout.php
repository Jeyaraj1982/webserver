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
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Reports</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Binary Payout</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payout Transactions</h4>
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
     <?php if (isset($_POST['viewTransaction'])) {
      
        
        ?>   
       <?php
    $requests = $mysql->select("select * from _tbl_payoutsummary where (Date(`PayoutProcessDate`)>=Date('".$fDate."') and Date(`PayoutProcessDate`)<=Date('".$tDate."')) and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc");
    
    
?>
       <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: left;">Txn Date</th>
                                       <!-- <th style="text-align: center;">Total Left</th>-->
                                        <!--<th style="text-align: center;">Total Right</th>-->
                                       <th style="text-align: right;">Aval Left<Br>(PV)</th>
                                        <th style="text-align: right;">Aval Right<Br>(PV)</th>
                                       <!--  <th style="text-align: center;">Txn Left</th>
                                        <th style="text-align: center;">Txn Right</th>
                                        <th style="text-align: center;">Bal Left</th>
                                        <th style="text-align: center;">Bal Right</th> -->
                                        
                                        <th style="text-align: right;">Payout<Br>(PV)</th>
                                        <!--<th style="text-align: center;">Payable<br>PV</th>-->
                                        <!--<th style="text-align: center;">MiniPayout<br>PV</th>
                                        <th style="text-align: center;">MaxiPayout<br>PV</th>
                                        <th style="text-align: center;">Payable<br>PV</th>-->
                                        <th style="text-align: right;">Payout<br>(INR)</th>
                                        <!--<th style="text-align: center;">Charge</th>-->
                                        <th style="text-align: right;">Charged<br>(INR)</th>
                                        <th style="text-align: right;">Payable<br>(INR)</th>
                                       <!-- <th style="text-align: center;">Remarks</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (sizeof($requests)==0) {?>
                                    <tr>
                                        <td colspan="10" style="text-align: center;">No records found</td>
                                    </tr>
                                    <?php } ?>                   
                                    <?php foreach($requests as $r) { ?>
                                    <tr>       
                                        <td><?php echo date("M d, Y",strtotime($r['PayoutProcessDate']));?></td>
                                        <!--<td style="text-align: right"><?php echo $r['TotalLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['TotalRight'];?></td>  -->
                                        
                                        <td style="text-align: right"><?php echo $r['AvailableLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['AvailableRight'];?></td>
                                        
                                      <!--  <td style="text-align: right"><?php echo $r['DebitLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['DebitRight'];?></td>
                                        
                                        <td style="text-align: right"><?php echo $r['RemainingLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['RemainingRight'];?></td> -->
                                        
                                        <td style="text-align: right"><?php echo $r['TodayPayoutPV'];?></td>
                                        <!--<td style="text-align: right"><?php echo ($r['TodayPayoutPV']>0) ? $r['EligibleMaximumPayoutPV'] : 0;?></td>-->
                                       <!-- <td style="text-align: right"><?php echo $r['EligibleMinimumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['EligibleMaximumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['PayablePV'];?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmount'],3);?></td>
                                        <!--<td style="text-align: right"><?php echo "10%";?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['ChargeAmount'],3);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmountDebitCharge'],3);?></td>
                                        <!--<td>
                                        <?php
                                            if ($r['IsPayoutEligible']==0) {
                                                echo "Payout not eligible";
                                            }
                                        ?>
                                        </td> -->
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
        <?
       }
         ?>
</div>
<script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>