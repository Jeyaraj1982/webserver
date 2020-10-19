
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/New">Order</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/New">New Order Form</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">New Order Form</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $products = $mysql->select("select * from _tbl_Members_Products"); ?>
                        <form action="dashboard.php?action=Orders/Submit" method="post" id="order_form" name="order_form" >
                            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <td>Product Name</td>
                                    <td>MRP</td>
                                    <td>D.Price</td>
                                    <td>Points</td>
                                    <td>Qty</td>
                                    <td>Amount</td>
                                    <td>Earnable Points</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($products as $p) { ?>
                                <tr>
                                   <td style="border-bottom:1px solid #ccc"><?php echo $p['ProductName'];?></td>
                                   <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['MRP'],2);?></td>
                                   <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['DPrice'],2);?></td>
                                   <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo $p['Points'];?></td>
                                   <td style="border-bottom:1px solid #ccc"><input maxlength="3" type="text" onkeyup="doCalculation()" value="0" name="Qty_<?php echo $p['ProductID'];?>" price="<?php echo $p['DPrice'];?>" points="<?php echo $p['Points'];?>" id="Qty_<?php echo $p['ProductID'];?>" style="width:50px !important;;min-width:50px;text-align:right"></td>
                                   <td style="border-bottom:1px solid #ccc"><input type="text" value="0.00" name="Amt_<?php echo $p['ProductID'];?>" disabled="disabled" id="Amt_<?php echo $p['ProductID'];?>" style="width:100px  !important;min-width:100px;text-align:right;background:none;border:none;"></td>
                                   <td style="border-bottom:1px solid #ccc"><input type="text" value="0" disabled="disabled" name="Pnt_<?php echo $p['ProductID'];?>" id="Pnt_<?php echo $p['ProductID'];?>" style="width:100px  !important;min-width:100px;text-align:right;background:none;border:none;"></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" style="text-align:right;font-weight:bold;">Total</td>
                                    <td><input type="text" value="0" disabled="disabled"  id="TotalAmt" style="width:100px !important;min-width:100px;text-align:right;background:#fff;border:none;"></td>
                                    <td><input type="text" value="0" disabled="disabled"  id="TotalPoint" style="width:100px !important;min-width:100px;text-align:right;background:#fff;border:none;"></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <input type="button" value="Submit Order"  onclick="submitOrder()" class="btn btn-outline-purple">
                                        <input type="submit" name="btnSubmit" id="btnSubmit" style="height:0px;width:0px;display:none;">
                                        &nbsp;&nbsp;<a href="javascript:reSet()">Reset</a>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>    
function submitOrder() {
    
    var qty=0;
     for(i=1;i<=29;i++) {
          qty+= parseInt($('#Qty_'+i).val());
     }
     if (qty>0) {
         $( "#btnSubmit" ).trigger( "click" );
         //$('#order_form').submit();
     } else {
         alert("You must atleast order one product");
         return false;
     }
}
function doCalculation() {
    var totalAmt=0;
    var totalPnt=0;
    for(i=1;i<=29;i++) {
        if (parseInt($('#Qty_'+i).val())>=0) {
            amt =  (parseFloat($('#Qty_'+i).attr("price")) * parseInt($('#Qty_'+i).val()));
            totalAmt += amt;
            pnt = (parseFloat($('#Qty_'+i).attr("points")) * parseInt($('#Qty_'+i).val()));
            totalPnt += pnt;
            $('#Amt_'+i).val(amt.toFixed(2));
            $('#Pnt_'+i).val(pnt) ;
        }  else {
            $('#Amt_'+i).val("0.00");
            $('#Pnt_'+i).val("0");  
        }
    } 
    $('#TotalAmt').val(totalAmt.toFixed(2));  
    $('#TotalPoint').val(totalPnt);  
}
function reSet() {
    for(i=1;i<=29;i++) {
        $('#Qty_'+i).val("0")
        $('#Amt_'+i).val("0.00");
        $('#Pnt_'+i).val("0");  
    } 
    $('#TotalAmt').val("0.00");  
    $('#TotalPoint').val("0");  
}
</script>