<?php
        
    ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Country Names
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;">No</td>
                                            <td style="padding-left:10px;text-align:left;width:150px">Country Names</td>
                                            <td style="padding-right:10px;text-align:right">State Names</td>
                                            <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> 
                                            <td style="padding-right:10px;text-align:right"></td> 
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php
                                        $i=1;
                                            $data = $mysql->select("select * from _jcountrynames order by countryname");
                                            foreach($data as $d) {
                                                $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                                $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                                $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                        ?>
                                        <tr>
                                            <form action="" method="POST" id="CountryFrm">
                                                <input type="hidden" name="CountryName" id="CountryName">
                                                <input type="hidden" name="CountryID" id="CountryID" value="<?php echo $i;?>">
                                                <td style="padding-left:10px;text-align:left"><?php echo $d['countryid'];?></td>
                                                <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="<?php echo AppUrl;?>/admin/dashboard.php?action=country/managestatenames&countryid=<?php echo $d['countryid'];?>" target="rpanel"><?php echo $d['countryname'];?></a></td>
                                                <td style="padding-right:10px;text-align:right"><?php echo $statenames[0]['cnt'];?></td>
                                                <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                                <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>
                                                <td style="padding-right:10px;text-align:right"><a href="javascript:void(0)" onclick="ConfirmationEditCountry('<?php echo $d['countryname'];?>')">Edit</a></td>
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
function ConfirmationEditCountry(country){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to change country name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-3">'
                        +'Country Name'
                    +'</div>'
                    +'<div class="col-sm-9" style="text-align:left">'
                        +'<input tye="text" name="country" id="country"  value="'+country+'"  class="form-control">'
                        +'<div id="Errcountry" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doUpdate()" >Yes, Confirm to Update</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='<?php echo AppUrl;?>/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 function doUpdate() {
    $('#Errcountry').html(""); 
    var ErrorCount=0; 
    
    var country = $('#country').val().trim();
        if (country.length==0) {
            $('#Errcountry').html("Please Enter Country");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(country))) {
                $('#Errcountry').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    if(ErrorCount==0){
     
        var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-success' onclick='location.href=\"dashboard.php?action=country/managecountrynames\"'>Continue</button></div>";
       
       
        $('#CountryName').val($('#country').val());
        $("#confrimation_text").html(loading);
        
        $.post( "<?php echo AppUrl;?>/webservice.php?action=UpdateCountryName",  $( "#CountryFrm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='<?php echo AppUrl;?>/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='<?php echo AppUrl;?>/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
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
 