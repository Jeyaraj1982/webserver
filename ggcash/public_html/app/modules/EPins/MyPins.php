<?php include_once("header.php");?>
      <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Epings</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Epin summary</li>
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
                                                                <h4 class=" text-orange p-b-20"><i class="mdi mdi-bank"></i>E-pin summary</h4>
                                
                                <div class="tablesaw-bar tablesaw-mode-stack"></div><table class="tablesaw no-wrap table-bordered table-hover table tablesaw-stack" data-tablesaw="" id="tablesaw-4030">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border"><label>Created date</label></th>
                                            <th scope="col" class="border"><label>E-Pin</label></th>
                                            <th scope="col" class="border"><label>Pin Password</label></th>
                                            <th scope="col" class="border"><label>Used Member</label></th>
                                            <th scope="col" class="border"><label>Used Member Name</label></th>
                                            <th scope="col" class="border"><label>Used On</label></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Transactions=$mysqldb->select("SELECT * FROM _tblEpins where CreatedByID='".$_SESSION['User']['MemberID']."'or OwnToID='".$_SESSION['User']['MemberID']."'  "); ?>
                                        <?php foreach ($Transactions as $Transaction){ ?>
                                            <tr>
                                                <td><?php echo $Transaction['CreatedOn'];?></td>
                                                <td><?php echo $Transaction['EPIN'];?></td>
                                                <td><?php echo $Transaction['PINPassword'];?></td>
                                                <td><?php echo $Transaction['UserForCode'];?></td>
                                                <td><?php echo $Transaction['UsedForName'];?></td>
                                                <td><?php echo $Transaction['UsedOn'];?></td>
                                            </tr>
                                         <?php }?> 
                                          <?php if(sizeof($Transactions)=="0"){?>
                                                <tr>
                                                    <td colspan="5" style="text-align: center;">No E-pins Found</td>
                                                </tr>
                                         <?php }?>
                                    </tbody>
                                     
                                </table>
 
                            </div>
                        </div>
</div>
</div>

<script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
//=============================================//
//    File export                              //
//=============================================//
$('#file_export').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
</script>            </div>
            


         <?php include_once("footer.php"); ?>



 
