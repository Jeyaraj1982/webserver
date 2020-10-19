<?php include_once("header.php");?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">Bus Ticket Booking</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bus Ticket Booking</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <script src="busticket.js"></script>
        <script>
            var resData = sourceCities;    
            var DresData = "";
            
            $( document ).ready(function() {
                
                $("#bookingfrom").autocomplete({
                    source: function( request, response ) {
                                response($.map(resData, function(item) {
                                    if (item.name.indexOf($('#bookingfrom').val()) == 0  ) {
                                        return {label: item.name,id: item.id}; }
                                    }));
                            },
                    minLength : 1,
                    select: function(event, ui) {
                        $('#bookingfromid').val(ui.item.id);
                        $('#bookingto').attr("placeholder","Loading Cities ....");
                        $.ajax({url: "webservice.php?action=_getdestinationList&sourceList="+ui.item.id,
                            dataType: "json",
                            success: function(data) {
                                DresData = data;
                                $('#bookingto').attr("placeholder","To");
                                $("#bookingto").autocomplete({
                                    source: function( request, response ) {
                                                $('#bookingtoid').val("");
                                                response($.map(DresData, function(item) {
                                                    if (item.name.indexOf($('#bookingto').val()) == 0) {
                                                        return {label: item.name,id: item.id}; 
                                                    }
                                                }));
                                    },
                                    minLength: 1,
                                    select: function(event, ui) {
                                        $('#bookingtoid').val(ui.item.id);
                                    }
                                });
                            }
                        });
                    }
                });   
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="SearchBuses.php" method="get" >
                                <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                <br><Br>
                                <div class="form-actions">
                                    <div class="form-group user-test" id="user-exists">
                                        <div class="form-froup row">
                                            <div class="col-sm-3">
                                                <label>From</label>
                                                <input type="text" name="From" id="bookingfrom" placeholder="From" value="<?php echo (isset($_POST['From']) ? $_POST['From'] : "");?>" class="form-control"  >
                                                <input type="hidden" name="fromid" id="bookingfromid" value="<?php echo (isset($_POST['fromid']) ? $_POST['fromid'] : "");?>" class="form-control">
                                                <span class="errorstring" id="ErrFrom"><?php echo isset($ErrFrom)? $ErrFrom : "";?></span>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>To</label>
                                                <input type="text" name="To" id="bookingto" placeholder="To" value="<?php echo (isset($_POST['To']) ? $_POST['To'] : "");?>" class="form-control"  >
                                                <input type="hidden" name="toid" id="bookingtoid" value="<?php echo (isset($_POST['toid']) ? $_POST['toid'] : "");?>" class="form-control">
                                                <span class="errorstring" id="ErrTo"><?php echo isset($ErrTo)? $ErrTo : "";?></span>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Date</label>
                                                <input type="Date" name="doj" id="Date" placeholder="Date" value="<?php echo (isset($_POST['Date']) ? $_POST['Date'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="">
                                                <span class="errorstring" id="ErrDate"><?php echo isset($ErrDate)? $ErrDate : "";?></span>
                                            </div>
                                            <div class="col-sm-3" style="margin-top: 28px;">
                                                <button type="submit" class="btn btn-primary block-default" name="btnSearchBus" >Search Bus</button>
                                            </div>
                                        </div>   
                                    </div>  
                                </div>
                            </form>
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



 
