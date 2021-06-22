<script src="admin/assets/js/jquery-min.js"></script> 
<script src="assets/js/jquery-ui.js"></script>   
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">     
<script src="busticket.js"></script>
<h3 style="text-align: center;padding:10px;">Bus Ticket booking</h3>
<div class="row" >
    <div class="col-12">
    <form action="dashboard.php" method="get" onsubmit="return validate()" >
    <input type="hidden" value="searchbuses" name="action">
    <div class="form-group" style="margin-bottom: 5px;">
        <input type="text" name="From" id="bookingfrom" placeholder="From" value="<?php echo (isset($_POST['From']) ? $_POST['From'] : "");?>" class="form-control"  >
        <input type="hidden" name="fromid" id="bookingfromid" value="<?php echo (isset($_POST['fromid']) ? $_POST['fromid'] : "");?>" class="form-control">
        <span class="errorstring" id="ErrFrom"><?php echo isset($ErrFrom)? $ErrFrom : "";?></span> 
    </div>
    <div class="form-group" style="margin-bottom: 5px;">
        <input type="text" name="To" id="bookingto" placeholder="To" value="<?php echo (isset($_POST['To']) ? $_POST['To'] : "");?>" class="form-control"  >
        <input type="hidden" name="toid" id="bookingtoid" value="<?php echo (isset($_POST['toid']) ? $_POST['toid'] : "");?>" class="form-control">
        <span class="errorstring" id="ErrTo"><?php echo isset($ErrTo)? $ErrTo : "";?></span>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="Date" name="doj" id="Date" placeholder="Date" value="<?php echo (isset($_POST['Date']) ? $_POST['Date'] : "");?>" class="form-control">
            <div class="input-group-append" onclick="OpenCalndr('2')">
                <span class="input-group-text">
                    <i class="fa fa-calendar-check"></i>
                </span>
            </div>             
        </div>
        <span class="errorstring" id="ErrDate"><?php echo isset($ErrDate)? $ErrDate : "";?></span>
    </div>
    <div class="form-group">
        <button type="submit" name="btnSearchBus" class="btn btn-success  glow w-100 position-relative" style="margin-bottom:15px">Search buses</button>
        <button type="button" onclick="location.href='dashboard.php'" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></button>
    </div>
    </form>
</div>
</div>

<script>
$(document).ready(function(){
        $("#bookingfrom").blur(function() {
            $('#ErrFrom').html("");   
            var bookingfromid = $('#bookingfromid').val().trim();
            if (bookingfromid.length==0) {
                $('#ErrFrom').html("Please Enter From Details");   
            }
        });
        $("#bookingto").blur(function() {
            $('#ErrTo').html("");   
            var bookingtoid = $('#bookingtoid').val().trim();
            if (bookingtoid.length==0) {
                $('#ErrTo').html("Please Enter To Details");   
            }
        });
        $("#Date").blur(function() {
            $('#ErrDate').html("");   
            var Date = $('#Date').val().trim();
            if (Date.length==0) {
                $('#ErrDate').html("Please Enter Date");   
            }
        });
});
function validate() {
    $('#ErrFrom').html(""); 
    $('#ErrTo').html(""); 
    $('#ErrDate').html(""); 
   
        var Error=0;                                                                                    
        
        var bookingfromid = $('#bookingfromid').val().trim();
        if (bookingfromid.length==0) {
            $('#ErrFrom').html("Please Enter From Details");   
            Error++;      
        }
        var bookingtoid = $('#bookingtoid').val().trim();
        if (bookingtoid.length==0) {
            $('#ErrTo').html("Please Enter To Details");   
            Error++;      
        }
        var Date = $('#Date').val().trim();
        if (Date.length==0) {
            $('#ErrDate').html("Please Enter Date");   
            Error++;      
        }
        if (Error==0) {
           return true;
        }else{
            return false;
        }
   }
</script>


<script>
            var resData = sourceCities;    
            var DresData = "";
            
            $( document ).ready(function() {
                  
                $("#bookingfrom").autocomplete({
                    source: function( request, response ) {
                        
                                response($.map(resData, function(item) {
                                    if (item.name.indexOf($('#bookingfrom').val()) == 0  ) {
                                        return {label: item.name,id: item.id}; 
                                }
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