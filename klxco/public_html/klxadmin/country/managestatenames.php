<?php
        $obj = new CommonController();
        $i=1;
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $data = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' order by statenames");
    ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of State Names (<?php echo $country[0]['countryname'];?>)
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;">No</td>
                                            <td style="padding-left:10px;text-align:left;width:250px">State Names</td>
                                            <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td>
                                            <td style="padding-right:10px;text-align:right"></td>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php
                                            foreach($data as $d) {
                                                $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where stateid='".$d['stateid']."'");
                                                $citynames = $mysql->select("select count(*) as cnt from _jcitynames where stateid='".$d['stateid']."'");
                                        ?>
                                        <tr>
                                            <form action="" method="POST" id="StateFrm">
                                                <input type="hidden" name="StateName" id="StateName">
                                                <input type="hidden" name="StateID" id="StateID" value="<?php echo $d['stateid'];?>">
                                                <input type="hidden" name="CountryID" id="CountryID" value="<?php echo $country[0]['countryid'];?>">
                                                <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                                <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="https://klx.co.in/klxadmin/dashboard.php?action=country/managedistrictnames&countryid=<?php echo $country[0]['countryid'];?>&stateid=<?php echo $d['stateid'];?>" target="rpanel"><?php echo $d['statenames'];?></a></td>
                                                <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                                <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>
                                                <td style="padding-right:10px;text-align:right"><a href="javascript:void(0)" onclick="ConfirmationEditState('<?php echo $d['statenames'];?>')">Edit</a></td>
                                            </form>
                                        </tr>
                                        <?php $i++; } ?> 
                                    </tbody> 
                                 </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function is_AlphaNumeric(acname) {
    
        if (acname.length==0) {
            return false;
        }
       // var reg = /[a-zA-Z]|\d|\s|\./
        var reg = /^[a-zA-Z\s\.]+$/
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
</script>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
function ConfirmationEditState(statename){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to change state name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-3">'
                        +'State Name'
                    +'</div>'
                    +'<div class="col-sm-9" style="text-align:left">'
                        +'<input tye="text" name="state" id="state" value="'+statename+'" class="form-control">'
                        +'<div id="Errstate" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doUpdate()" >Yes, Confirm to Update</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://klx.co.in/klxadmin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 function doUpdate() {
    $('#Errstate').html(""); 
    var ErrorCount=0; 
    
    var state = $('#state').val().trim();
        if (state.length==0) {
            $('#Errstate').html("Please Enter State");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(state))) {
                $('#Errstate').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    if(ErrorCount==0){
     
        $('#StateName').val($('#state').val());
        $("#confrimation_text").html(loading);
        
        $.post( "https://klx.co.in/webservice.php?action=UpdateStateName",  $( "#StateFrm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://klx.co.in/klxadmin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=country/managestatenames&countryid="+obj.countryid+"' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://klx.co.in/klxadmin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }else {
        return false;   
    }
}
</script>
