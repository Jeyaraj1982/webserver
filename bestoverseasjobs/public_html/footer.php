


<style>

#photos img {
  display: block;
	margin: auto;
 width: 250px;
 text-align: left!important;
 margin:10px;
 height:150px; 
 width:120px;
 box-shadow: 5px 10px #8e8e8e;
}



#overlay {
  background: rgba(0,0,0, .8);
 width: 250px;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  display: none;
  text-align: center;
}

#overlay img {
  margin: 10% auto 0;
  width: 250px;
  border-radius: 5px;
width: 250px;
}

#photos {
  width: 250%;
     height: 100%;
 
}
.page_toplines {
    line-height: 1.4;
    text-align: center;

}
.border
{
	  border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
}
</style>

<script>
var $overlay = $('<div id="overlay"></div>');
var $image = $("<img>");

//An image to overlay
$overlay.append($image);

//Add overlay
$("body").append($overlay);

  //click the image and a scaled version of the full size image will appear
  $("#photo-gallery a").click( function(event) {
   // event.preventDefault();
    var imageLocation = $(this).attr("href");

    //update overlay with the image linked in the link
    $image.attr("src", imageLocation);

    //show the overlay
    $overlay.show();
  } );

  $("#overlay").click(function() {
    $( "#overlay" ).hide();
  });

</script>
<style>
a.color-bg-icon {
    background-color: #249221;
    color: #fff;
}
.aligns
{
	text-align:text;
}
</style>



<footer class="page_footer ds s-py-sm-20 s-pt-md-75 s-pb-md-50 s-py-lg-130 c-gutter-60 pb-20 half-section">
				<div class="container">
					<div class="row">
						<div class="footer col-md-4 text-center animate" data-animation="fadeInUp">
							<div class="footer widget text-center">
								<!--<h3 class="widget-title title-menu">Site Links</h3>
								<ul class="footer-menu">
									<li>
										<a href="index.php">Home</a>
									</li>
									<li class="menu1">
										<a href="contact.php">Contact us</a>
									</li>
									<li>
										<a href="whychooseus.php">why choose us?</a>
									</li>
									 

								</ul>
								-->
								<div><br><br>
								<!--<strong><b>Open:</b></strong>
								<br>
									<strong>Weekdays:</strong> 8:30AM - 5:00PM <br>
									<strong>Saturday:</strong> Closed <br>
                                    <strong>Sunday:</strong> Closed
                                    -->
									</div>
							</div>
						</div>

					
						<div class="footer  col-md-4 text-center animate" data-animation="fadeInUp">
                            <!--
							<div class="text-center">
								<div class="header_logo_center footer-logo-ds">
									<a href="./" class="logo">
										
										<span class="logo_subtext">Emerald Isle Manpower and Travel Services</span>
									</a>
								</div>
								 
							</div>
							<div class="widget pt-20">
								Emerald Isle Manpower & Travel Services reserves the right to alter or withdraw any of the information on these web pages. While every effort has been made to ensure the information contained on this site is correct, the company is not liable for any errors or omissions.
							</div>
							    -->

							
						</div>
						<div class="footer col-md-4 text-center animate" data-animation="fadeInUp">
							<div class="widget widget_mailchimp">
                            
								<h3 class="widget-title">Contact Us</h3>
<div class="widget">
								<div class="media" style="text-align: left;">
                                    <i class="mx-10 color-main fa fa-map-marker"></i>
                                    Colombo srilanka. 
                                </div>
                                <div class="media" style="text-align: left;">
                                    <i class="mx-10 color-main fa fa-map-marker"></i>
                                    Kodambakkam  chennai,  india
                                </div>
 <div class="media" style="text-align: left;">
									<i class="mx-10 color-main fa fa-map-mail"></i>
									bestoverseasjobsconsultancy@gmail.com
								</div>

								 

								
							</div>
								<p>
								<div class="author-social" style="display: none;">
								<a href="https://www.facebook.com/Emeraldislemanpower?ref=hl" class="fa fa-facebook color-bg-icon rounded-icon"></a>
							    <a href="https://www.instagram.com/emeraldisle_recruitment/" class="fa fa-instagram color-bg-icon rounded-icon"></a>
							    <a href="https://www.linkedin.com/company/eimts" class="fa fa-linkedin color-bg-icon rounded-icon"></a>
							    <a href="https://www.youtube.com/channel/UC3bxRNZo2wFDbAx2KqaYElw/featured" class="fa fa-youtube color-bg-icon rounded-icon"></a>
							    <a href="https://twitter.com/emeraldisle1162" class="fa fa-twitter color-bg-icon rounded-icon"></a> 
								<a href="https://www.pinterest.com/eimts/" class="fa fa-pinterest color-bg-icon rounded-icon"></a>
								<a href="https://wa.link/2f7xdc" class="fa fa-whatsapp color-bg-icon rounded-icon"></a>
								
								
							</div>
								</p>

								<form class="signup">
									<label for="mailchimp_email">
										<span class="screen-reader-text">Subscribe:</span>
									</label>

								

								

								</form>

							</div>
						</div>
					</div>
				</div>
			</footer>

			<section class="page_copyright ds s-py-10 ">
				<div class="container">
						<div class="row align-items-center">
						<div class="divider-10 d-none d-lg-block"></div>
						<div class="col-md-12 text-center">
						   
							<p>&copy; Copyright
								<span class="copyright_year">2020</span> All Rights Reserved bestoverseasjobsconsultantancy .com</p>
						</div>
						<div class="divider-20 d-none d-lg-block"></div>
					</div>
				</div>
			</section>


		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	
	

	<script src="js/compressed.js"></script>
	<script src="js/main.js?v=4548d8a28ca3003db68fefae556176b2"></script>

    <script>
		
		jQuery(".down-button").click(function () {
        jQuery(".down-button .icon-current").toggleClass("fa fa-angle-up fa fa-angle-down");
    });
		
			var ok=0;
			$(window).on('resize', function(){
				
				
	
				///alert('k');
				
				if($('.icon-current').attr('class')=='icon-current fa-angle-up fa'){
					
					
					
			$("#idshow").attr("hidden",true);
					
					document.getElementById('down_key').click();
					//jQuery(".down-button .icon-current").toggleClass("fa fa-angle-up fa fa-angle-down");
				}
				
				
				   var win = $(this); //this = window
  
				
				
				
				if(win.width() <750){
					
					
					
			$("#idshow").attr("hidden",false);
					
				//	document.getElementById('down_key').click();
					//jQuery(".down-button .icon-current").toggleClass("fa fa-angle-up fa fa-angle-down");
				}
				
				
				
				//
				// $("a").trigger("click");
				// 
  //   
			
});
		
		</script>
	 
	
</body>

</html> 
</body>
</html>