<script src="<?php echo AppUrl;?>/admin/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo AppUrl;?>/admin/assets/js/core/popper.min.js"></script>
	<script src="<?php echo AppUrl;?>/admin/assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo AppUrl;?>/admin/assets/js/atlantis.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Owl Carousel -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

    <!-- Magnific Popup -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="<?php echo AppUrl;?>/admin/assets/js/setting-demo.js"></script>
    
    <script src="<?php echo AppUrl;?>/admin/assets/js/setting-demo2.js"></script>

        </div>
         
       
    </div>
    
    <script>
        $('#birth').datetimepicker({
            format: 'MM/DD/YYYY'
        });

        $('#state').select2({
            theme: "bootstrap"
        });

        /* validate */

        // validation when select change
        $("#state").change(function(){
            $(this).valid();
        })

        // validation when inputfile change
        $("#uploadImg").on("change", function(){
            $(this).parent('form').validate();
        })

        $("#exampleValidation").validate({
            validClass: "success",
            rules: {
                gender: {required: true},
                confirmpassword: {
                    equalTo: "#password"
                },
                birth: {
                    date: true
                },
                uploadImg: {
                    required: true, 
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
        });
    </script>
</body>
</html>