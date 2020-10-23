 <div style="padding:0px;text-align:center;margin-bottom:20px;">
                <h5>Services</h5>
            </div> 
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=mrc_airtel" class="btn btn-icon glow mb-1" style="width:100%"  >
                        <img src="assets/img/logo_airtel.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=mrc_bsnl" class="btn btn-icon   glow mb-1" style="width:100%">
                       <img src="assets/img/logo_bsnl.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
                <!--<div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
                    <a href="dashboard.php?action=mrc_idea"  class="btn btn-icon  glow mb-1" style="width:100%" >
                        <img src="assets/img/logo_idea.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>  -->
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=mrc_jio" class="btn btn-icon glow mb-1" style="width:100%"  >
                        <img src="assets/img/logo_jio.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=mrc_vodaidea" class="btn btn-icon   glow mb-1" style="width:100%">
                       <!--<img src="assets/img/logo_vodafone.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">-->
                       <img src="assets/img/logo_vodaidea.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                    </a>
                </div>
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
         $.ajax({url:'webservice.php?action=GetUsers&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
            $('#confrimation_text').html(data);
            $('#confirmModalLong').modal("show");
         }});
    } 
            </script>