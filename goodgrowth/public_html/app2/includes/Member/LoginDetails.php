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
           Login History
        </div>
        <div class="panel-body list">
        <?php
    $loginEntries = $mysql->select("select * from _tbl_Members_LoginHistory where MemberID='".$userData['MemberID']."' order by MemberLoginID desc limit 0,10");
 ?>
            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                   <th style="text-align: center;padding:5px;width:150px">Date</th>
                    <th style="text-align: left;width:120px;">IP address</th>
                    <th style="text-align: left;width:120px">Country</th>
                    <th style="text-align: left;">City</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($loginEntries as $entry) {?>
                <tr class="logip">
                    <td style="text-align: center;"><?php echo putDateTime($entry['LoginDateTime']);?></td>
                    <td style="text-align: left;"><?php echo $entry['IPAddress'];?></td>
                    <td style="text-align: left;"><?php echo $entry['CountryName'];?></td>
                    <td style="text-align: left;"><?php echo $entry['CityName'];?></td>
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