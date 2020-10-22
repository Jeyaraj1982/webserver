<link rel="stylesheet" href="vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" />
<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables buttons scripts -->
<script src="vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
          Manage Orders
        </div>
        <div class="panel-body list">
        <?php $Orders = $mysql->select("select * from `_tbl_Member_Orders` where `MemberID`='".$userData['MemberID']."' order by `OrderID` desc"); ?>
            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <td style="width:50px;">Order ID</td>
                    <td style="width:130px;">Order Date</td>
                    <td style="width:100px;text-align:right">Order Value</td>
                    <td style="width:100px;text-align:right">Earned Point</td>
                    <td style="width:100px;text-align:center">Is Paid</td>
                    <td style="width:100px;text-align:center">Is Delivered</td>
                    <td>Payment Mode</td>
                    <td style="width:50px;">&nbsp;</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($Orders as $Order) {?>
                <tr>
                    <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['OrderID'];?></td>
                    <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $Order['OrderDate'];?></td>
                    <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo number_format($Order['OrderValue'],2);?></td>
                    <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo $Order['EarnedPoint'];?></td>
                    <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['IsPaid']==1 ? "Paid" : "Not Paid";?></td>
                    <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><?php echo $Order['IsDelivered']==1 ? "Yes" : "No";?></td>
                    <td style="border-bottom:1px solid #ccc;padding:3px;text-align:left"><?php echo strlen($Order['PaymentStatus'])==1 ? "Not Confirmed" : $Order['PaymentStatus'];?></td>
                    <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><a href="dashboard.php?action=Orders/View&Order=<?php echo $Order['OrderID'];?>">View</a></td>
                </tr>
                <?php } ?>
                <?php// if (sizeof($Orders)==0) {?>
                <!--<tr>
                    <td colspan="8" style="text-align: center;border-bottom:1px solid #ccc">No orders found</td>
                </tr>-->
                <?php// } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

        // Initialize Example 1
        $('#example1').dataTable( {
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });

        // Initialize Example 2
     //   $('#example2').dataTable();

    });    

</script>

