<?php $page = "contactus"; ?>
<?php include_once("header.php");?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index.php" class="home">Home</a></li>
						<li>Contact</li>
					</ul>
				</div>
				<h1 class="heading_primary">Contact</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 alignleft">
						<!--<div class="video-container">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.829986131271!2d-122.4746968033092!3d37.80374752160443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586e6302615a1%3A0x86bd130251757c00!2sStorey+Ave%2C+San+Francisco%2C+CA+94129!5e0!3m2!1sen!2sus!4v1435826432051" width="600" height="450" style="border: 0; pointer-events: none;" allowfullscreen=""></iframe>
						</div>
                        -->
						<div class="pages_content padding-top-4x">
							<h4>CONTACT INFORMATION</h4>
                            
                            <form action="" method="post" id="pincodeForm" class="wpcf7-form" novalidate="novalidate">
                                <div class="form-contact">
                                    <div class="row-1x">
                                        <div class="col-sm-6">
                                            <span class="wpcf7-form-control-wrap your-name">
                                                <input type="text" name="PinCode" id"PinCode" value="" size="40" class="wpcf7-form-control" placeholder="Your Pincode*">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-contact-fields">
                                        <input  onclick="getPincodeInfo()"  type="button" name="pincodeBtn" value="View Contact" class="wpcf7-form-control wpcf7-submit">
                                    </div>
                                    <div id="pincode_result">
                                    
                                    </div>
                                </div>                  
                            </form>
							 
						</div>
                        <Br><Br><br><br>
						<div class="wpb_wrapper pages_content">
							<h4>Have a question?</h4>
							<div role="form" class="wpcf7" id="frmwebsiteEnquiryFrom">
								<div class="screen-reader-response"></div>
								<form action="#" method="post" id="websiteEnquiryFrom" name="websiteEnquiryFrom" class="wpcf7-form" novalidate="novalidate">
									<div class="form-contact">
										<div class="row-1x">
											<div class="col-sm-6">
													<span class="wpcf7-form-control-wrap your-name">
														<input type="text" name="ContactName" id="ContactName" value="" size="40" class="wpcf7-form-control" placeholder="Your name*">
                                                        <span id="ErrContactName" class="errorString"></span>
													</span>
											</div>
											 
										</div>
                                            <div class="row-1x">
                                            <div class="col-sm-6">
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" name="MobileNumber" id="MobileNumber" value="" size="40" class="wpcf7-form-control" placeholder="Mobile Number*">
                                                        <span id="ErrMobileNumber" class="errorString"></span>
                                                    </span>
                                            </div>
                                            <div class="col-sm-6">
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input type="Email" name="Email" id="Email" value="" size="40" class="wpcf7-form-control" placeholder="Email*">
                                                        <span id="ErrEmail" class="errorString"></span>
                                                    </span>
                                            </div>
                                        </div>
										<div class="form-contact-fields">
												<span class="wpcf7-form-control-wrap your-subject">
													<input type="text" name="Subject" id="Subject" value="" size="40" class="wpcf7-form-control" placeholder="Subject">
                                                    <span id="ErrSubject" class="errorString"></span>
												</span>
										</div>
										<div class="form-contact-fields">
											<span class="wpcf7-form-control-wrap your-message">
												<textarea name="Description" id="Description" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message"></textarea>
                                                <span id="ErrDescription" class="errorString"></span>
												 </span><br>
											<input type="button" onclick="doSubmitEnquiry()" value="Submit" class="wpcf7-form-control wpcf7-submit">
                                               <label style="color: red;" id="errormessage"></label>
                                               <label style="color: Green;" id="successmessage"></label>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="widget-area col-sm-3 align-left">
                        <!--
						<aside class="widget widget_text">
							<img src="images/images-sidebar/sidebanner-ticketing.jpg" alt="">
						</aside>
						<aside class="widget widget_text">
							<img src="images/images-sidebar/sidebanner-tour.png" alt="">
						</aside>
						<aside class="widget widget_text">
							<img src="images/images-sidebar/hertz-sidebanner.jpg" alt="">
						</aside>
                        -->
                        
                             
                                
                                
                              <aside class="widget widget_travel_tour">
                                        <div class="wrapper-special-tours">
                        <?
                                $SubTours = $mysql->select("SELECT * FROM _tbl_sub_tour WHERE IsPublish='1' order by RAND() LIMIT 3");
                                foreach($SubTours as $SubTour) {
                                    $priceFrom = $mysql->select("SELECT (PackagePrice*1) as PackagePrice  FROM _tbl_tours_package WHERE SubTourTypeID='".$SubTour['SubTourTypeID']."' ORDER BY PackagePrice*1 LIMIT 0,1");
                                    $priceFrom = isset($priceFrom[0]['PackagePrice']) ? $priceFrom[0]['PackagePrice'] : "0.00";
                                    
                        ?>
                        
                        <div class="inner-special-tours">
                                                <a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>">
                                                    <img width="430" height="305" src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" alt="Discover Brazil" title="Discover Brazil"></a>
                                                <div class="item_rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post_title"><h3>
                                                    <a href="single-tour.html" rel="bookmark"><?php echo $SubTour['SubTourTypeName'];?></a>
                                                </h3></div>
                                                <div class="item_price">
                                                    <span class="price">From Rs. <?php echo number_format($priceFrom,2);?></span>
                                                </div>
                                            </div>
                                            
                             
                            <?php } ?>
                             
                             
                        </div>
                   
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                   
                                             
                                             
                                        
                                    </aside>
					</div>
				</div>
			</div>
		</section>
	</div>
    <script>
    function doSubmitEnquiry() {
        ErrorCount=0;
        jQuery("#loadingicon").html('');
        IsNonEmpty("ContactName","ErrContactName","Please Enter Name");
        IsNonEmpty("Email","ErrEmail","Please Enter Email");
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Mobile Number");
        IsNonEmpty("Subject","ErrSubject","Please Enter Subject");
        IsNonEmpty("Description","ErrDescription","Please Enter Description");
        if (ErrorCount>0){
            return false;
        }
        var param = jQuery("#websiteEnquiryFrom").serialize();
        jQuery("#errormessage").html("<img src='assets/loading.gif' style='width:32px'>");
        jQuery.post( "webservice.php?action=doSubmitEnquiry",param,function(data) {
            var obj = JSON.parse(data); 
            var html = "";
             jQuery("#errormessage").html('');
            if (obj.status=="failure") {
                jQuery("#errormessage").html(obj.message);
            } else {
                 html = "<div style='text-align:center;font-size:20px;padding:50px;'><img src='../admin/assets/tick.jpg' style='width:128px;margin:0px auto'><br><br><h5 style='line-height:30px;font-size: 32px;margin-bottom:0px'>"+obj.message+"</h5><br><br><input type='button' onclick='location.href=\"index.php\"' class='wpcf7-form-control wpcf7-submit' style='padding:10px 50px;background:#ffb300;box-shadow: 0 2px 0 0 rgba(255, 179, 0, 0.6);border:none;' value='Continue'>";
                jQuery("#frmwebsiteEnquiryFrom").html(html);
            }
        });
    }
    
    function getPincodeInfo() {
        jQuery("#pincode_result").html("<img src='assets/loading.gif' style='width:32px'> Processing ...");
        
        var param = jQuery("#pincodeForm").serialize();
        jQuery.post( "webservice.php?action=getPincodeInfo",param,function(data) { 
            var obj = JSON.parse(data); 
            var html = "";
            
            if (obj.status=="failure") {
                jQuery("#pincode_result").html(obj.message);
            } else {
                 html = "<div style='text-align:center;padding:15px 30px;text-align: left;border: 1px dashed #ccc;width: -moz-max-content;margin: 0px auto;background: #f9f9f9;border-radius: 10px;'>"
                    + obj.AgentName +"<br>"
                    + obj.MobileNumber +"<br>"
                    + obj.EmailID +"<br>"
                    
                    + obj.AddressLine1 +"<br>"
                    + obj.AddressLine2 +"<br>"
                    + obj.CityName +"<br>"
                    + obj.DistrictName +"<br>"
                    + obj.StateName +"<br>"
                    + obj.CountryName + "</div>";
                jQuery("#pincode_result").html(html);
            }  
        });
         
    }
</script>
<?php include_once("footer.php");?> 