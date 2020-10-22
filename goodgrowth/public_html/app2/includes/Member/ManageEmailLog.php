<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" />
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables buttons scripts -->
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://webapplayers.com/homer_admin-v2.0/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           Manage Sent Emails Log
        </div>
        <div class="panel-body list">
        <?php  $Entries = $mysql->select("select * from _tbl_Log_Emails where  MemberID='".$userData['MemberID']."' order by EmailID desc"); ?>
            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th style="text-align: center;padding:5px;width:120px"> Date</th>
                    <th style="text-align: left;width:120px">Member Code</th>
                    <th style="text-align: left;width:130px">Email ID</th>
                    <th style="text-align: left;">Status</th>
                    <th style="text-align: left;">Category</th>
                    <th style="text-align: left;width:50px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($Entries as $entry) {?>
                <tr class="logip">
                    <td style="text-align: center;"><?php echo putDateTime($entry['MessagedOn']);?></td>
                    <td style="text-align: left;"><?php echo $entry['MemberCode'];?></td>
                    <td style="text-align: left;"><?php echo $entry['MailTo'];?></td>
                    <td style="text-align: left;"><?php echo $entry['Mailed']==1 ? "Sent" : "<span style='color:red;'>Failed: ".$entry['ErrorMsg']."</span>";?></td>
                    <td style="text-align: left;"><?php echo $entry['Category'];?></td>
                    <td style="text-align: left;"><!--<a class="hlink" href="dashboard.php?action=InvoiceView&Invoce=<?php echo $entry['InvoiceNo']; ?>">View</a>--></td>
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