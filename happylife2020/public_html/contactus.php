<?php include_once("includes/header.php");?>
 <?php
    if (isset($_POST['SubmitBtn'])) {
            $id=$mysql->insert("_tbl_contact_us",array("ContactName"    => $_POST['Name'],                    
                                                       "EmailID"        => $_POST['EmailID'],
                                                       "Subject"        => $_POST['Subject'],
                                                       "YourQuestions"        => $_POST['YourQuestions'],
                                                       "CreatedOn"      => date("Y-m-d H:i:s")));
     unset($_POST); ?>
     <script>
     setTimeout(
     function(){swal("Your request has been submitted!", "Team will follow you shortly!"); },1500);
           
            </script>

<?php    }    ?>
<div class="breadcrumb-option set-bg" data-setbg="https://www.astrafx.uk/assets/img/banner_002.png" style="padding:300px 0 60px">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<div class="breadcrumb__text">
<h2>Contact Us</h2>
<div class="breadcrumb__links">
<a href="<?php echo BaseUrl;?>"><i class="fa fa-home"></i> Home</a>
<span>Contact Us</span>
</div>
</div>
</div>
</div>
</div>                                                               
</div>


<section class="contact spad">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="contact__text">
<div class="section-title">
<!--<h2>Let's Work Together</h2>
<p>To make requests for further information, contact us via our social channels.</p>-->
<Br>
<b style="font-size:25px">Astrafx Traders</b><br>
Chaucer House/Stone St,<br>
Canterbury CT4 5PW,<br>
United Kingdom<br><br>
<i class="fa fa-envelope" style="color:#012068;"></i>:&nbsp;support@astrafx.uk<br> 
<i class="fa fa-globe" style="color:#012068"></i>:&nbsp;https://www.astrafx.uk

</div>
<ul>
<li><span>Weekday</span> 08:00 am to 18:00 pm</li>
<li><span>Saturday:</span> 10:00 am to 16:00 pm</li>
<li><span>Sunday:</span> Closed</li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="contact__form">
<form method="post" action="">
<div class="row">
<div class="col-lg-6">
<input type="text" name="Name" id="Name" value="<?php echo isset($_POST['Name']) ? $_POST['Name'] : "";?>" placeholder="Name" required>
</div>
<div class="col-lg-6">
<input type="text" name="EmailID" id="EmailID" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : "";?>" placeholder="Email" required>
</div>
</div>
<input type="text" name="Subject" id="Subject" value="<?php echo isset($_POST['Subject']) ? $_POST['Subject'] : "";?>" placeholder="Subject" required>
<textarea placeholder="Your Question" name="YourQuestions" id="YourQuestions"><?php echo isset($_POST['YourQuestions']) ? $_POST['YourQuestions'] : "";?></textarea>
<button type="submit" class="site-btn" name="SubmitBtn" id="SubmitBtn" style="background:#012068">Submit Now</button>
</form>
</div>
</div>
</div>
</div>
</section>

 <!--
<div class="contact-address">
<div class="container">
<div class="contact__address__text">
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6">
<div class="contact__address__item">
<h4>California Showroom</h4>
<p>625 Gloria Union, California, United Stated <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cc8fa3a0a3bea0a5aee2afada0a5aaa3bea2a5ad8caba1ada5a0e2afa3a1">[email&#160;protected]</a></p>
<span>(+12) 456 678 9100</span>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
<div class="contact__address__item">
<h4>New York Showroom</h4>
<p>8235 South Ave. Jamestown, NewYork <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="397a5655564b55505b17775c4e40564b52795e54585055175a5654">[email&#160;protected]</a></p>
<span>(+12) 456 678 9100</span>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
 <div class="contact__address__item">
<h4>Florida Showroom</h4>
<p>497 Beaver Ridge St. Daytona Beach, Florida <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e1a28e8d8e938d8883cf82808d88878e938f8880a1868c80888dcf828e8c">[email&#160;protected]</a></p>
<span>(+12) 456 678 9100</span>
</div>
</div>
</div>
</div>
</div>
</div>
-->
<?php include_once("includes/footer.php");?>