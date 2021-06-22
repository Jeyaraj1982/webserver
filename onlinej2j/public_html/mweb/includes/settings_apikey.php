<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Api Key</h5>
</div> 
    <?php 
        
        if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
            $mysql->execute("update _tbl_member set APIKey='".md5("APIKEY".time().date("Y-m-d H:i:s"))."',APIPassword='".md5("APIPASS".date("Y-m-d H:i:s").time())."' where MemberID='".$_SESSION['User']['MemberID']."'");
            $result['status']="success";
           
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success" || $result['status']=="requested") {
            
        ?>
            <div class="row">
              <div style="padding:20px;text-align:center;width:100%;">
                    Your Api Key Generated.
                </div>
            </div>
        <?php } ?>
    <?php }  
    $mem = $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");  
    ?>
        <div class="row">
            <form action="" id="Apifrm"  method="post" style="width: 80%;margin: 0px auto;">
               
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Api Key</label>
                    <input type="text" readonly="readonly" value="<?php echo $mem[0]['APIKey'];?>" name="APIKey" id="APIKey" class="form-control" placeholder="API Key" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">API Password</label>
                    <input type="text" readonly="readonly"  value="<?php echo $mem[0]['APIPassword'];?>" name="APIPassword" id="APIPassword" class="form-control" placeholder="API Password" required="">
                </div>
                <button type="button"  onclick="doConfrim()"  class="btn btn-success  glow w-100 position-relative">Generate<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </form>         
        </div>
        
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://tksdonlineservice.in/assets/img/loading.gif'  style='width:80px'><br>Processing ...</div>";
function doConfrim() {
     var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>'
                    +'<div class="form-group" style="text-align:center">'
                        +'Are you sure want to generate?'
                 +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doGenerateAPIKey()">Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
        $('#ConfirmationPopup').modal("show");
}
function doGenerateAPIKey() {
        var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-success btn-sm'  onclick='location.href=\"dashboard.php?action=settings_apikey\"'>Continue</button>";
        $("#xconfrimation_text").html(loading);                                                                                                                                                               
        $.post( "webservice.php?action=doGenerateAPIKey",  $( "#Apifrm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="Success") {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://tksdonlineservice.in/assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div>";
                html += "<br>" + buttons;
            }
            $("#xconfrimation_text").html(html);
        });
    }
</script>