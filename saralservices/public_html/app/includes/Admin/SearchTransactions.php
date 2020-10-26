<script>
    function SubmitSearch() {
        
        $('#ErrMemberDetails').html("");
        
        ErrorCount=0;
        
        if(IsNonEmpty("MemberDetails","ErrMemberDetails","Please Enter Valid Name or Mobile Number or Email")){
           IsSearch("MemberDetails","ErrMemberDetails","Please Enter more than 3 characters") 
        }
        
        if (ErrorCount==0) {
            return true;
        } else{
            return false;
        }
    }
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
           
            <form method="POST" action="" id="frms" onsubmit="return SubmitSearch();">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="page-title" style="margin-bottom:0px">Search Transaction</h3>    
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row">
                                <label for="MemberDetails" class="col-sm-2 text-left" style="font-weight:normal">Transaction Details<span class="required-label">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="MemberDetails" placeholder="Jhon Peter" name="MemberDetails" value="<?php echo isset($_POST['MemberDetails']) ? $_POST['MemberDetails'] : '';?>" >
                                    <small style="color:#737373; font-size:X-smaller;" >eg: mobile/dth number</small>  <br>
                                    <span class="errorstring" id="ErrMemberDetails"><?php echo isset($ErrMemberDetails)? $ErrMemberDetails : "";?></span>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-warning" name="BtnSearch" id="BtnSearch">Search Transaction</button>
                                        </div>                                        
                                    </div>                                                                             
                                </div>
                            </div>                                                                                             
                        </div>
                    </div>        
                </div> 
            </div>
            </form>
            <?php if(isset($_POST['MemberDetails'])>0){
              $sql= $mysql->select("select * from `_tbl_Members` where  MemberID>1 
              
             and ( MemberName like '%".$_POST['MemberDetails']."%' or 
              MobileNumber like '%".$_POST['MemberDetails']."%' or 
              EmailID like '%".$_POST['MemberDetails']."%')
              
                order by `MemberID` desc ");
                
                
            $sql="select _tbl_transactions.*,_tbl_Members.MemberName from _tbl_transactions   right join _tbl_Members on  _tbl_transactions.MemberID =  _tbl_Members.MemberID
                               where 
                                   _tbl_transactions.rcnumber like '%".$_POST['MemberDetails']."%'    
                                     
                                    order by _tbl_transactions.txnid desc"; 
        
            $txn = $mysql->select($sql);
             ?>
             <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Transaction Summary
                            </div>
                        </div>
                        <div class="card-body">
                         
                            <div class="table-responsive">
                                 <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Retailer</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                          
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td style="font-size:13px;"><?php echo $t['txnid'];?></td>
                                            <td style="font-size:13px;"><?php echo $t['txndate'];?></td>
                                            <td style="font-size:13px;"><?php echo $t['MemberName'];?></td>
                                            <td style="font-size:13px;"><?php echo $t['rcnumber'];?></td>
                                            <td style="font-size:13px;"><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td  style="text-align: right;font-size:13px;"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                            } elseif ($t['TxnStatus']=="reversed") {
                                                echo "<span style='background:pink;color:#fff;padding:3px 10px;border-radius:5px'>Reversed</span><br><span style='font-size:11px;'>".$t['ReversedOn']."</span>";
                                            
                                           
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right;font-size:13px;"><?php echo $t['OperatorNumber'];?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (sizeof($txn)==0) {?>
                                       <tr>
                                            <td style="font-size:13px;text-align:center" colspan="8">No Transactions found</td>
                                       </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            <?php } ?>
        </div>
    </div>     
</div>