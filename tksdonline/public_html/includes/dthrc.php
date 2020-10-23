 <div style="padding:0px;text-align:center;margin-bottom:20px;">
                <h5>Services</h5>
            </div> 
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=dth_airtel"  class="btn btn-icon glow mb-1" style="width:100%"  >
                        <img src="assets/img/logo_airteldth.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=dth_bigtv" class="btn btn-icon glow mb-1" style="width:100%">
                       <img src="assets/img/logo_bigtv.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
                    <a  href="dashboard.php?action=dth_dish" class="btn btn-icon  glow mb-1" style="width:100%" >
                        <img src="assets/img/logo_dishtv.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a  href="dashboard.php?action=dth_tatasky" class="btn btn-icon glow mb-1" style="width:100%"  >
                        <img src="assets/img/logo_tatasky.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a  href="dashboard.php?action=dth_sundirect" class="btn btn-icon   glow mb-1" style="width:100%">
                       <img src="assets/img/logo_sundirect.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a  href="dashboard.php?action=dth_videocond2h" class="btn btn-icon   glow mb-1" style="width:100%">
                       <img src="assets/img/logo_videocond2h.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="javascript:void(0)" onclick="GetUsers();" class="btn btn-icon   glow mb-1" style="width:100%">
                       <img src="assets/img/logo_myprofile.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">  <br>
                       <small>From Contacts</small>
                    </a>
                </div>
            </div>
             <div class="modal fade" id="confirmModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;max-height: 80vh;overflow: auto;">
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
         <div style="padding:20px;text-align:center">
         </div>
      </div>
    </div>
  </div>
</div>
            <script>
            function GetUsers() {
       //  $("#confrimation_text").html(loading);
         $.ajax({url:'webservice.php?action=GetUsersfrDth&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
            $('#confrimation_text').html(data);
            $('#confirmModalLong').modal("show");
         }});
    } 
            </script>