<?php include_once("website_header.php"); ?> 
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <div id="featured-title" class="featured-title clearfix">
                        <div id="featured-title-inner" class="container clearfix">
                            <div class="featured-title-inner-wrap">                    
                                <div id="breadcrumbs">
                                    <div class="breadcrumbs-inner">
                                        <div class="breadcrumb-trail">
                                            <a href="index.html" class="trail-begin">Home</a>
                                            <span class="sep">|</span>
                                            <span class="trail-end"> BECOME A PARTNER</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured-title-heading-wrap">
                                    <h1 class="feautured-title-heading">BECOME A PARTNER</h1>
                                </div>
                            </div>
                        </div>            
                    </div>
					<div id="main-content" class="site-main clearfix">
                        <div id="content-wrap">
                            <div id="site-content" class="site-content clearfix">
                                <div id="inner-content" class="inner-content-wrap">
                                    <div class="page-content">
                                        <div class="row-iconbox">
                                            <div class="container" id="rLable">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                                                        <div class="themesflat-headings style-1 text-center clearfix">
                                                            <h2 class="heading">Registration Form</h2>
                                                            <div class="sep has-icon width-125 clearfix">
                                                                <div class="sep-icon">
                                                                    <span class="sep-icon-before sep-center sep-solid"></span>
                                                                    <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                                                    <span class="sep-icon-after sep-center sep-solid"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="container partner-registration ng-scope">
                                                <div class="row">
                                                    <div class="col-sm-6" style="margin:0px auto">
                                                        <?php
                                                            if (isset($_POST['saveBtn'])) {
                                                                $id = $mysql->insert("_tbl_partner_join_requests",array("PartnerName"         => $_POST['PartnerName'],
                                                                                                                        "PartnerBusinessName" => $_POST['PartnerBusinessName'],
                                                                                                                        "MobileNumber"        => $_POST['MobileNumber'],
                                                                                                                        "Email"               => $_POST['Email'],
                                                                                                                        "CityName"            => $_POST['CityName'],
                                                                                                                        "StateName"           => $_POST['StateName'],
                                                                                                                        "Pincode"             => $_POST['Pincode'],
                                                                                                                        "RequestedOn"         => date("Y-m-d H:i:s")));
                                                                echo "<div style='text-align:center;font-size:25px;'><img src='assets/tick.jpg' style='width:256px;margin:0px auto;'><Br>";
                                                                echo "Your request submitted.<br>Our team will contact shortly</div>";
                                                                echo "<style>#prqfrom {display:none} #rLable {display:none}</style>";
                                                            }
                                                        ?>
                                                        <form class="form-horizontal ng-pristine ng-valid ng-valid-email" id="prqfrom" action="" method="post">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label class="control-label">Name</label>
                                                                    <div class="inputGroupContainer">
                                                                        <div class="input-group">
                                                                            <input name="PartnerName" required placeholder="Name" class="wpcf7-form-control valid" type="text" ng-model="registrationdata.vendor_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Business Name</label>
                                                                            <input name="PartnerBusinessName" required placeholder="Business Name" class="wpcf7-form-control valid" type="text" ng-model="registrationdata.business_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Email</label>
                                                                            <input name="Email" required placeholder="Email" class="wpcf7-form-control valid" type="text" ng-model="registrationdata.email_id">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Mobile No</label>
                                                                            <input name="MobileNumber" required placeholder="Mobile No" class="wpcf7-form-control valid" type="text" ng-model="registrationdata.mobile_no">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">City</label>
                                                                            <input name="CityName" required placeholder="City" class="wpcf7-form-control valid" type="text" ng-model="registrationdata.city">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">State</label>
                                                                            <select name="StateName" class="wpcf7-form-control valid" >
                                                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                                                <option value="Assam">Assam</option>
                                                                                <option value="Bihar">Bihar</option>
                                                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                                                <option value="Goa">Goa</option>
                                                                                <option value="Gujarat">Gujarat</option>
                                                                                <option value="Haryana">Haryana</option>
                                                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                                                <option value="Jharkhand">Jharkhand</option>
                                                                                <option value="Karnataka">Karnataka</option>
                                                                                <option value="Kerala">Kerala</option>
                                                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                                                <option value="Maharashtra">Maharashtra</option>
                                                                                <option value="Manipur">Manipur</option>
                                                                                <option value="Meghalaya">Meghalaya</option>
                                                                                <option value="Mizoram">Mizoram</option>
                                                                                <option value="Nagaland">Nagaland</option>
                                                                                <option value="Odisha">Odisha</option>
                                                                                <option value="Punjab">Punjab</option>
                                                                                <option value="Rajasthan">Rajasthan</option>
                                                                                <option value="Sikkim">Sikkim</option>
                                                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                                                <option value="Telangana">Telangana</option>
                                                                                <option value="Tripura">Tripura</option>
                                                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                                <option value="Uttarakhand">Uttarakhand</option>
                                                                                <option value="West Bengal">West Bengal</option>
                                                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                                                <option value="Chandigarh">Chandigarh</option>
                                                                                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                                                                <option value="Delhi">Delhi</option>
                                                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                                                <option value="Ladakh">Ladakh</option>
                                                                                <option value="Lakshadweep">Lakshadweep</option>
                                                                                <option value="Puducherry">Puducherry</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>                               
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Pincode</label>
                                                                            <div class="inputGroupContainer">
                                                                                <div class="input-group">
                                                                                    <input name="Pincode" required placeholder="Pincode" class="wpcf7-form-control valid" type="text" ng-model="registrationdata.pincode">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="submit wpcf7-form-control wpcf7-submit" name="saveBtn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
							                <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60" style="height:60px"></div>
                                            <div class="row-about">
                                                <div class="container-fluid">
                                                    <div class="row equalize sm-equalize-auto">
                                                        <div class="col-md-6 half-background style-1"></div>
                                                        <div class="col-md-6 bg-light-grey">
                                                            <div class="themesflat-content-box clearfix" >
                                                                <div class="themesflat-headings style-1 clearfix margin-top-20">
                                                                    <h2 class="heading">What is Form 16?</h2>
                                                                    <div class="sep has-width w80 accent-bg margin-top-11 clearfix"></div>                                               
                                                                    <p class="sub-heading margin-top-20">Form 16 is a certificate issued by the employer to his employee as per the format provided by the Income tax Department. Form 16 certifies that the TDS (Tax Deducted at Source) has been deducted on salary by the employer</p>
                                                                </div>
                                                                <div class="content-list margin-top-20">
                                                                    <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                                                        <div class="inner">
                                                                            <span class="item">
                                                                                <span class="icon"><i class="fa fa-check-square"></i></span>
                                                                                <span class="text">Completing projects on time & Following budget guidelines</span>
                                                                            </span>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                                                        <div class="inner">
                                                                            <span class="item">
                                                                                <span class="icon"><i class="fa fa-check-square"></i></span>
                                                                                <span class="text">Elevated quality of workmanship</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                                                        <div class="inner">
                                                                            <span class="item">
                                                                                <span class="icon"><i class="fa fa-check-square"></i></span>
                                                                                <span class="text">Meeting diverse supplier requirements</span>
                                                                            </span>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                                                        <div class="inner">
                                                                            <span class="item">
                                                                                <span class="icon"><i class="fa fa-check-square"></i></span>
                                                                                <span class="text">Implementing appropriate safety precautions and procedures</span>
                                                                            </span>
                                                                        </div>
                                                                    </div> 
                                                                </div> 
                                                                <div class="elm-button margin-top-20">
                                                                    <a href="#" class="themesflat-button bg-white">GET IN TOUCH</a>
                                                                </div>
												                <div class="margin-top-20"></div>
                                                            </div>  
                                                        </div> 
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php include_once("website_footer.php");  ?>