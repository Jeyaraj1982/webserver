	 <?php
             if (!(isset($_GET['chat']))) {
         ?>
         
         <div>
            <div style="text-align: center;">
                <a target="_blank" href=""><img src="<?php echo AppUrl;?>/assets/playstore.png" style="height:40px"></a>
            </div>
         </div>
         <div>
        <div style="text-align: center;padding-top:10px;padding-bottom:10px">
             <a href="<?php echo AppUrl;?>/Terms">Terms of Use</a>&nbsp;|&nbsp;
             <a href="<?php echo AppUrl;?>/SafetyTips">Safety tips</a>&nbsp;|&nbsp;
             <a href="<?php echo AppUrl;?>/Privacy">Privacy</a>&nbsp;|&nbsp;
             <a href="<?php echo AppUrl;?>/ContactUs">Contact Us</a>
             <br>Copy right @ 2021 <?php echo AppUrl;?>
        </div>
        
        </div>
       <?php
            }else {
           //     echo "aaaaa";
            }
         ?>
    </div> 
    
        </div>
</div>
    <script>
        function geoFindMe() {
            const status = document.querySelector('#status');
            const mapLink = document.querySelector('#map-link');
            mapLink.href = '';
            mapLink.textContent = '';
            
            function success(position) {
                const latitude  = position.coords.latitude;
                const longitude = position.coords.longitude;

                status.textContent = '';
                mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
                mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
            }

            function error() {
                status.textContent = 'Unable to retrieve your location';
            }

            if (!navigator.geolocation) {
                status.textContent = 'Geolocation is not supported by your browser';
            } else {
                status.textContent = 'Locating…';
                navigator.geolocation.getCurrentPosition(success, error);
            }
        }
        function sendMessage(x) {
            if (x=='0') {
                var param = $('#chatForm').serialize();
            } else {
                var param = $('#chatForm').serialize();
                $('#message').val("");
            }
            $.post('<?php echo base_url;?>webservice.php?action=sendMessage&x='+x,param,function(data){
                $('#chatBox').html(data); 
                $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight - $('#chatBox')[0].clientHeight);
               
                
                 if (x=='0') {
              
            } else {
                $('#message').val("");
            }
           });
       }
       
       function likead(id) {
           $.ajax({url:'<?php echo base_url;?>rest.php?action=addToFavourite&postid='+id,success:function(data){
            $('#tmp').html(data);
           }});
       }
                 
       function chooseUser(id,divid) {
           for(i=1;i<=TotalUser;i++) {
               $('#div_'+i).attr("class","ulist_normal");
           }
           $('#message').removeAttr("disabled");
           $('#msg_send').removeAttr("disabled");
           $('#div_'+divid).attr("class","ulist_active");
           $('#cuserid').val(id);
           sendMessage(0);
       }
  //  $( document ).ready(function() {
       // geoFindMe();
   // });
    </script>  
	<script src="<?php echo base_url;?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.scrollbar.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/moment.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/circles.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/datatables.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap-toggle.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url;?>assets/js/gmaps.js"></script>
	<script src="<?php echo base_url;?>assets/js/dropzone.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/fullcalendar.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrapwizard.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/summernote-bs4.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/select2.full.min.js"></script> 
	<script src="<?php echo base_url;?>assets/js/sweetalert.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/atlantis.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/setting-demo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	<!--<script src="assets/js/demo.js"></script>-->
     
    
    <div id="tmp"></div>
    <!--<p id = "status"></p>
    <a id = "map-link" target="_blank"></a>-->
</body>
</html>