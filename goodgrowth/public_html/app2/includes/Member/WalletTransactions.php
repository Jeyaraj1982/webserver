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
          Wallet Transactions
        </div>
        <div class="panel-body list">
        <?php  $loginEntries = $mysql->select("select * from _tbl_Wallet_Transactions where MemberID='".$userData['MemberID']."' order by WalletTransactionID desc"); ?>
            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th style="text-align: center;padding:5px;width:150px">Date</th>
                    <th style="text-align: left;">Particulars</th>
                    <th style="text-align: right;width:120px">ActualAmount</th>
                    <th style="text-align: right;width:120px">CreditAmount</th>
                    <th style="text-align: right;width:120px">DebitAmount</th>
                    <th style="text-align: right;width:120px">BalanceAmount</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($loginEntries as $entry) {?>
                <tr class="logip">
                    <td style="text-align: center;"><?php echo putDateTime($entry['TxnDate']);?></td>
                    <td style="text-align: left;"><?php echo $entry['Particulars'];?></td>
                    <td style="text-align: right;"><?php echo number_format($entry['ActualAmount'],2);?></td>
                    <td style="text-align: right;"><?php echo number_format($entry['CreditAmount'],2);?></td>
                    <td style="text-align: right;"><?php echo number_format($entry['DebitAmount'],2);?></td>
                    <td style="text-align: right;"><?php echo number_format($entry['BalanceAmount'],2);?></td>
                </tr>
                <?php } ?>
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

 
 