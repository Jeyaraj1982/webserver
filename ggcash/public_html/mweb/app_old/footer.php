   <footer class="footer text-center">
    Copyrights &copy; 2019. All Rights Reserved.
</footer>
<!-- Bootstrap tether Core JavaScript -->
    <script src="https://gcchub.org/panel/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="https://gcchub.org/panel/assets/dist/js/app.min.js"></script>
    <script src="https://gcchub.org/panel/assets/dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src="https://gcchub.org/panel/assets/dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="https://gcchub.org/panel/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://gcchub.org/panel/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Menu sidebar -->
    <script src="https://gcchub.org/panel/assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="https://gcchub.org/panel/assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="https://gcchub.org/panel/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="https://gcchub.org/panel/assets/extra-libs/jqbootstrapvalidation/validation.js"></script>

    <script src="https://gcchub.org/panel/assets/extra-libs/treeview/dist/bootstrap-treeview.min.js"></script>
    <script src="https://gcchub.org/panel/assets/extra-libs/treeview/dist/bootstrap-treeview-init.js"></script>
    <!--chartjs -->
    
    <script src="https://gcchub.org/panel/assets/dist/js/pages/dashboards/dashboard1.js"></script>
    
<script src="https://gcchub.org/panel/assets/js/countdown-timer.js"></script>
<script>
        $(document).ready(function () {
            var my_date = '2019-07-31 21:29:59';
            my_date = my_date.replace(/-/g, "/"); 
var myDate = new Date(my_date);
            $("#countdown").countdown(myDate, function (event) {
                $(this).html(
                    event.strftime(
                        '<div class="timer-wrapper"><div class="time">%D</div><span class="text">days</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">hrs</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">mins</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">sec</span></div>'
                    )
                );
            });

        });
    </script>
    <script type="text/javascript">
        (function($) {
    var $window = $(window),
        $html = $('.sidebar-item');

    $window.resize(function resize(){
        if ($window.width() < 514) {
            return $html.removeClass('width-50');
        } else{
            $('.last-li').addClass('width-50');
        }

        //$html.addClass('width-50');
    }).trigger('resize');
})(jQuery);
    </script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);

$(document).ready(function() {
    var scrollTop = $(".scrollTop");
  $(window).scroll(function() {
    var topPos = $(this).scrollTop();
    if (topPos > 500) {
      $(scrollTop).css("opacity", "1");

    } else {
      $(scrollTop).css("opacity", "0");
    }

  });
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;

  });
});
    </script>

<script type="text/javascript">
$( document ).ready(function() {
    $(".notify-count").on('click', function() {
        var baseURL = 'https://gcchub.org/';
        $.ajax({
            type: 'POST',
            url: baseURL+'panel/User/NotifyAlert',
            data:{},
            dataType: 'json',
            success: function(data){
                $('.notification-count').hide();
                return true;
            }
        });   
        return true; 
    
});
});
function emailActivation(){
var base_url = 'https://gcchub.org/panel/';
var username = 'AJAI7';
$.ajax({
      type: "POST",
      dataType: "json",
      url: base_url+"User/EmailActivation", //Relative or absolute path to response.php file
      data: {"username":username},
      success: function(data) {
        if(data["json"] == 'EmailVerify'){
            //alert('Please check your Inbox. Email verification link has been sent. ');
            $("#email-icon").css({"color":"#8dc63f"});
            $("#email-not-done").hide();
            $("#email-done").show();
        }
      }
    }); 
}
//  ----------------------------------------------------------------------------
</script>

        </div>
        
    </div>
</body>
