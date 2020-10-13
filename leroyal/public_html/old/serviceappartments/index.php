<?php
    include_once("../header.php");
    menu('serviceappartment',$path);
?>
    <div >
        <table style="background:#383636;color:#EAF3F8;text-align:left;font-family:Arial;font-size:12px;font-weight:bold" cellpadding="5" width="100%">
            <tr>
                <td><?php include_once("menu.php");?></td>
            </tr>
        </table>
    <style>
        table {font-size:12px;font-family:arial;}
    </style>
    <script type="text/javascript" src="<?php echo $path;?>/js/jquery-1.5.1.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>/js/jquery.innerfade.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>/js/jquery.nivo.slider.pack.js"></script>   
    <link rel="stylesheet" href="<?php echo $path;?>/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $path;?>/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $path;?>/themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $path;?>/themes/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $path;?>/themes/style.css" type="text/css" media="screen" />
    <table width="98%" cellpadding="5" cellspacing="0" style="margin-top:8px">
        <tr>
            <td valign="top">
                <div id="slider" class="nivoSlider" style="border:1px solid #ccc;">
                    <img src="images/bannera.jpg" title="" border=0 >
			        <img src="images/bannerb.jpg"  title="" border=0   >
			        <img src="images/bannerc.jpg"   title=""  >
			        <img src="images/bannerd.jpg" title=""  >
                </div>
                <table cellpadding="5" cellspacing="0">
                <tr>
                    <td width="50%" valign="top">
                        <div>
                            <h1 style="color:orange">Our Rooms</h1>
                            <p align="justify" style="line-height:20px;font-size:13px;">Le Royal offers luxury and elegantly designed rooms with ultimate comfort and privacy. Our rooms caters to all needs Of a business traveler and a leisure traveler. Beautifully designed and compact guestroom with a two bed/king size bed. Suitable for short and long stays. Each room is elegantly designed with clean comfortable bathrooms with eco friendly amenities and herbal toiletries.. Personalized and professional 24hr room service.<br></p>
                            <table cellpadding=3 cellspacing=2 style="font-size:13px">
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>LCD Screen with DTH (over 200 channels)</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Complimentary Breakfast</td></tr> 
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Complimentary mineral water</td></tr> 
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Coffee/Tea maker</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Smoke Detector</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Work Desk</td></tr> 
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Eco Friendly Amenities</td></tr> 
                            </table>
                        </div>
                    </td>
                    <td  valign="top">
                        <div style="margin-left:20px;">
                            <h1 style="color:orange">
                            Our Services Include</h1>
                            <table cellpadding=3 cellspacing=2 style="font-size:13px">
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Complimentary breakfast</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>24x7 Room service</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>24hr high speed internet connectivity</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Valet Services</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Travel Arrangements</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Individual Climate Control in all rooms</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Doctor on call</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Same day laundry</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>DVD player on request</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>24hr secured complex under secured CCTV</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>100% Power Supply</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Hi Speed Wi-Fi internet connectivity</td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Complimentary mineral water for all rooms </td></tr>
	                            <tr><td><img src="images/icon-tick-orange.png"></td><td>Herbal and eco friendly toileteries </td></tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            </td>
            <td width="250" valign="top">
                <?php include_once("rightside.php"); ?>
            </td>
       </tr>
    </table>
    <br><br>
<script type="text/javascript"> $(window).load(function() {$('#slider').nivoSlider();});</script>
<?php
    include_once("../footer.php");
?>