<?php include_once("includes/header.php");?>

 


<section class="contact spad">
<div class="container" style="text-align: center;">
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="contact__text">
<?php $news = $mysql->select("select * from _tbl_news where IsPublish='1' and NewsID='".$_GET['Nid']."'"); ?>
<b><?php echo $news[0]['NewsTitle'];?></b><br><br><br>
<span style="color:#444"><?php echo $news[0]['NewsDescription'];?></span>
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