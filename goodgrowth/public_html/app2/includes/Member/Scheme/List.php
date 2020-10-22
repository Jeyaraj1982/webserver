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
          Registered Schemes
        </div>
        <div class="panel-body list">
        <?php $MemberSchemes = $mysql->select("select * from `_tbl_Members_Schemes` where `MemberID`='".$userData['MemberID']."' order by `MemberSchemeID` desc"); ?>
            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <td style="width:150px;">A/c Number</td>
                    <td style="width:150px;">Registered Date</td>
                    <td style="">SchemeName</td>
                    <td style="width:150px;text-align:right">Installment Amount</td>
                    <td style="width:100px;text-align:right">Installments</td>
                    <td style="width:100px;text-align:right">Benefits</td>
                    <td style="width:100px;text-align:right">MaturityAmtount</td>
                    <td style="width:100px;text-align:right">Paid</td>
                    <td style="width:50px;">&nbsp;</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($MemberSchemes as $MemberScheme) {?>
                <tr>
                    <td style="padding:3px;"><?php echo $MemberScheme['MemberSchemeID'];?></td>
                    <td style="padding:3px;"><?php echo date("Y-m-d",strtotime($MemberScheme['Joined']));?></td>
                    <td style="padding:3px;"><?php echo $MemberScheme['SchemeName'];?></td>
                    <td style="text-align: right"><?php echo number_format($MemberScheme['InstallmentAmount'],2);?></td>
                    <td style="text-align: right"><?php echo $MemberScheme['Installments'];?></td>
                    <td style="text-align: right"><?php echo number_format($MemberScheme['Benefits'],2);?></td>
                    <td style="text-align: right"><?php echo number_format($MemberScheme['MaturityAmtount'],2);?></td>
                    <td style="text-align: right">
                    <?php
                      $O = $mysql->select("select sum(Amount) as amt from `_tbl_Members_Schemes_Dues` where `MemberSchemeID`='".$MemberScheme['MemberSchemeID']."'");
                     echo number_format( (isset($O[0]['amt']) ? $O[0]['amt'] : 0),2);?>
                    </td>
                    <td style="padding:3px;text-align:center"><a href="dashboard.php?action=Scheme/View&SchemeACNumber=<?php echo $MemberScheme['MemberSchemeID'];?>">View</a></td>
                </tr>
                <?php } ?>
                <?php //if (sizeof($MemberSchemes)==0) {?>
                   <!-- <tr>
                        <td colspan="9" style="text-align: center;">No registered schemes found</td>
                    </tr>  -->
                    <?php //} ?>
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

