<?php 
     $FromD = isset($_POST['FromD']) ? $_POST['FromD'] : date("d");
     $FromM = isset($_POST['FromM']) ? $_POST['FromM'] : date("m");
     $FromY = isset($_POST['FromY']) ? $_POST['FromY'] : date("Y");
     
     $ToD = isset($_POST['ToD']) ? $_POST['ToD'] : date("d");
     $ToM = isset($_POST['ToM']) ? $_POST['ToM'] : date("m");
     $ToY = isset($_POST['ToY']) ? $_POST['ToY'] : date("Y");
     
     
        $fromDate = $FromY."-".$FromM."-".$FromD;
        $toDate = $ToY."-".$ToM."-".$ToD;
        $_POST['FromDate']=$fromDate;
        $_POST['ToDate']=$toDate;
        
        if($_POST['AllStaffs']=="0"){
            $Expenses = $mysql->select("SELECT * FROM _queen_expenses where StaffID='".$_POST['Staff']."' and ExpenseTypeID='".$_POST['ExpenseType']."' and (date(CreatedOn)>=date('".$_POST['FromDate']."') and date(CreatedOn)<=date('".$_POST['ToDate']."') ) order by ExpenseID asc");
            $data = $mysql->select("select * from _queen_staffs where StaffID='".$_POST['Staff']."'");
        }else{
            $Expenses = $mysql->select("SELECT * FROM _queen_expenses where ExpenseTypeID='".$_POST['ExpenseType']."' and (date(CreatedOn)>=date('".$_POST['FromDate']."') and date(CreatedOn)<=date('".$_POST['ToDate']."') ) order by ExpenseID asc");
        }
            $ExpenseType = $mysql->select("select * from _queen_expensetype where ExpenseTypeID='".$_POST['ExpenseType']."'");
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
                                        Expense Type - Datewise Report
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                            <div class="form-group row" style="padding: 0px;">
                                    <div class="col-sm-6">
                                        <h5 class="card-title" style="margin-bottom:5px;font-size:15px"><b>Expense Type Details </b></h5>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-4" for="name">Expense Code </label>
                                            <div class="col-sm-8"><?php echo $ExpenseType[0]['ExpenseTypeCode'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-4" for="name">Expense Type</label>
                                            <div class="col-sm-8"><?php echo $ExpenseType[0]['ExpenseType'];?></div> 
                                        </div><br>
                                        <?php if($_POST['AllStaffs']=="0"){ ?>
										<h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Staff Details</b></h5>
                                         Staff Code      : <?php echo $data[0]['StaffCode'];?><br>
                                         Staff Name      : <?php echo $data[0]['StaffName'];?><br>
                                         Sur Name        : <?php echo $data[0]['SurName'];?><br>
                                         <?php } else { echo '<h5 style="margin-bottom:0px;font-weight: bold;font-size:15px">All Staffs</h5>'; }?>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <h5 class="card-title" style="margin-bottom:5px;font-size:15px;text-align:right"><b>Reporting Details</b></h5>
                                        <?php if(!($_POST['FromDate']==$_POST['ToDate'])) { ?>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">From</label>
                                            <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['FromDate']));?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                            <label class="col-sm-5" for="name" style="text-align:right">To</label>
                                            <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['ToDate']));?></div> 
                                        </div>
                                        <?php }else { ?>
                                            <div class="form-group form-show-validation row" style="padding: 0px;">
                                                <label class="col-sm-5" for="name" style="text-align:right">Date</label>
                                                <div class="col-sm-7"><?php echo date("d M, Y",strtotime($_POST['FromDate']));?></div> 
                                            </div>    
                                        <?php } ?>
                                    </div>                                                           
                               </div> 
                            <div class="table-responsive">
                                <form action="print.php" method="post" onsubmit="return gotoPrint();" target="_blank">
                                    <textarea cols="" rows="" id="content" name="content" style="display: none;"></textarea>
                                    <input type="submit" value="Print" class="btn btn-primary btn-sm" style="float: right;">
                                </form>
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <?php if($_POST['AllStaffs']=="1"){ ?><th scope="col">Staff Name</th><?php } ?>
                                                <th scope="col">Short Description</th>
                                                <th scope="col" style="text-align:right">Expense Amount</th>
                                                <th scope="col">Payment Mode</th>
                                                <th scope="col"></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                            $TotalExpense=0;
                                            foreach($Expenses as $Expense){ 
                                            $PrintedRows++;
                                            $TotalExpense += $Expense['ExpenseAmount'];
                                            if($_POST['AllStaffs']=="1"){ $data = $mysql->select("select * from _queen_staffs where StaffID='".$Expense['StaffID']."'");       }
                                        ?>
										<tr>
                                                <td><?php echo date("d M, Y, H:i",strtotime($Expense['CreatedOn']));?></td>
                                                <?php if($_POST['AllStaffs']=="1"){ ?><th><?php echo $data[0]['StaffName'];?></th><?php } ?>
                                                <td><?php echo $Expense['ShortDescription'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Expense['ExpenseAmount'],2);?></td>
                                                <td><?php echo $Expense['PaymentMode'];?></td>                                                   
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Expenses/edit&id=<?php echo md5($Expense['ExpenseID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Expenses/view&id=<?php echo md5($Expense['ExpenseID']);?>" draggable="false">View</a>
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="Removecallconfirmation('<?php echo $Expense['ExpenseID'];?>')" draggable="false">Remove</a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($PrintedRows>0) { ?>
                                        <tr>
                                            <?php if($_POST['AllStaffs']=="1"){ ?>
                                            <td colspan="4" style="text-align: right;"><?php echo number_format($TotalExpense,2);?></td>
                                            <?php }else { ?>
                                            <td colspan="3" style="text-align: right;"><?php echo number_format($TotalExpense,2);?></td>
                                            <?php } ?>
                                            <td></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Expenses)=="0"){ ?>
                                            <tr>
												<td style="text-align: center;" colspan="6">No Expenses found</td>
                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                    </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Reported On : <?php echo date("d M, Y H:i");?></label>
                                </div>
                             </div>
                        </div>                                                                                                                                            
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function gotoPrint() {
    $('#content').val($('#print').html());
    return true;
}
</script>
<div id="print" style="display:none">
    <div style="font-family:arial;font-size: 14px;letter-spacing: 0.05em;color: #2A2F5B;font-weight: 400;line-height: 1.5;">
        <div class="" style="width:850px;padding:25px;margin:0px auto;border:1px solid #333;">
            <div class="row" style="flex-wrap: wrap;">
                <div class="col-md-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                    <div class="card" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                        <div class="card-body" style="padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;"> 
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;"><b>Expense Type - Datewise Report</b></h5>
                            <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Expense Type Details</b></h5>
                                         Expense Type Code      : <?php echo $ExpenseType[0]['ExpenseTypeCode'];?><br>
                                         Expense Type      : <?php echo $ExpenseType[0]['ExpenseType'];?><br><br>
                                        <?php if($_POST['AllStaffs']=="0"){ ?>
                                          <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Staff Details</b></h5>
                                         Staff Code      : <?php echo $data[0]['StaffCode'];?><br>
                                         Staff Name      : <?php echo $data[0]['StaffName'];?><br>
                                         Sur Name        : <?php echo $data[0]['SurName'];?><br>
                                         <?php } else { echo '<h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>All Staffs</b></h5>';}?> 
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Reporting Details</b></h5>
                                        <?php if(!($_POST['FromDate']==$_POST['ToDate'])) {?>
                                        From : <?php echo date("d M, Y",strtotime($_POST['FromDate']));?><br>
                                        To   : <?php echo date("d M, Y",strtotime($_POST['ToDate']));?><br>
                                        <?php } else{ ?>
                                        Date : <?php echo date("d M, Y",strtotime($_POST['FromDate']));?><br>
                                        <?php } ?>
                                        <br>
                                    </div>
                                </div>                          
                            </div>                                                                     
                            <br><br> 
                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped mt-3" border="1" style="width:100%" cellspacing="0" cellpadding="3">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Date</th>
                                                <?php if($_POST['AllStaffs']=="1"){ ?><th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Staff Name</th><?php } ?>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Short Description</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Expense Amount</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Payment Mode</th>
                                            </tr>
                                        </thead>                             
                                        <tbody>
                                        <?php foreach($Expenses as $Expense){ ?>
                                        
                                            <tr>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo date("d M, Y, H:i",strtotime($Expense['CreatedOn']));?></td>
                                                <?php if($_POST['AllStaffs']=="1"){ ?><td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $data[0]['StaffName'];?></td><?php } ?>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Expense["ShortDescription"];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Expense["ExpenseAmount"],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Expense["PaymentMode"];?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($PrintedRows>0) { ?>
                                        <tr>
                                            <?php if($_POST['AllStaffs']=="1"){ ?>
                                                <td colspan="4" style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($TotalExpense,2);?></td>
                                            <?php } else {?>
                                                <td colspan="3" style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($TotalExpense,2);?></td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>                
                                        <?php if(sizeof($Expenses)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: center;">No Expenses Found</td>
                                            </tr>                                 
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                             <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    Reported On   : <?php echo date("d M, Y H:i");?>
                                </div>
                             </div>
                             
                            <br><br><br><br>                                
                        </div>                                                                                                                                             
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

 