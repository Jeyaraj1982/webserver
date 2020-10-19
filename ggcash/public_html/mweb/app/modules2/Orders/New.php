
<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">New Order</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="container-fluid">
               <div class="row">
<div class="col-12">
<div class="card">
         
                            <div class="card-body">  
                            
                            <div class="heading1">
    <span>New Order Form</span>
</div>
<?php $products = $mysqldb->select("select * from _tbl_Members_Products"); ?>

<form action="dashboard.php?action=Orders/Submit" method="post" id="order_form" name="order_form" >
    <table  cellpadding="5" cellspacing="0" style="margin-top:15px;">
        <tr style="font-weight:bold;text-align: center;background:#ccc;">
            <td>Product Name</td>
            <td>MRP</td>
            <td>D.Price</td>
            <td>Points</td>
            <td>Qty</td>
            <td>Amount</td>
            <td>Earnable Points</td>
        </tr>
        <?php foreach($products as $p) { ?>
        <tr>
           <td style="border-bottom:1px solid #ccc"><?php echo $p['ProductName'];?></td>
           <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['MRP'],2);?></td>
           <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['DPrice'],2);?></td>
           <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo $p['Points'];?></td>
           <td style="border-bottom:1px solid #ccc"><input maxlength="3" type="text" onkeyup="doCalculation()" value="0" name="Qty_<?php echo $p['ProductID'];?>" price="<?php echo $p['DPrice'];?>" points="<?php echo $p['Points'];?>" id="Qty_<?php echo $p['ProductID'];?>" style="width:50px !important;;min-width:50px;text-align:right"></td>
           <td style="border-bottom:1px solid #ccc"><input type="text" value="0.00" name="Amt_<?php echo $p['ProductID'];?>" disabled="disabled" id="Amt_<?php echo $p['ProductID'];?>" style="width:100px  !important;min-width:100px;text-align:right;background:#fff;border:none;"></td>
           <td style="border-bottom:1px solid #ccc"><input type="text" value="0" disabled="disabled" name="Pnt_<?php echo $p['ProductID'];?>" id="Pnt_<?php echo $p['ProductID'];?>" style="width:100px  !important;min-width:100px;text-align:right;background:#fff;border:none;"></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="5" style="text-align:right;font-weight:bold;">Total</td>
            <td><input type="text" value="0" disabled="disabled"  id="TotalAmt" style="width:100px !important;min-width:100px;text-align:right;background:#fff;border:none;"></td>
            <td><input type="text" value="0" disabled="disabled"  id="TotalPoint" style="width:100px !important;min-width:100px;text-align:right;background:#fff;border:none;"></td>
        </tr>
        <tr>
            <td colspan="7">
                <input type="button" class="btn btn-primary block-default" value="Submit Order"  onclick="submitOrder()" class="SubmitBtn">
                <input type="submit" name="btnSubmit" id="btnSubmit" style="height:0px;width:0px;display:none;">
                &nbsp;&nbsp;<a href="javascript:reSet()">Reset</a>
            </td>
        </tr>
    </table>
</form> 
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