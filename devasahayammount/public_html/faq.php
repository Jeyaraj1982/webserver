 <body style="margin:0px;">
  <?php error_reporting(0);
include_once("config.php");
include_once("includes/header.php");


?>
<style>
#faqs dt, #faqs dd { padding: 0 0 0 25px }
#faqs dt { font-size:12px; font-family:arial;font-weight:Bold; color: #2D92D6; cursor: pointer; height: 24px; line-height: 24px; margin: 0 0 15px 25px}
#faqs dd { font-size: 12px;font-family:arial;color:#333333; margin: 0 0 20px 25px}
#faqs dt { background: url(assets/images/expand_icon2.png) no-repeat left}
#faqs .expanded { background: url(assets/images/expandminus.png) no-repeat left}
</style>

<div class="jTitle" style="margin-left:2px;">Frequently Asked Questions</div> 
  <dl id="faqs">
    <?php 
        foreach(JFaq::getFaq() as $faq) { 
            if ($faq['ispublished']) {
    ?>
        <dt><?php echo $faq['faqquestion'];?></dt>
        <dd><?php echo $faq['faqanswer'];?></dd>
    <?php 
            } 
        } 
    ?>
  </dl>
</div> 

<script type="text/javascript">
    $("#faqs dd").hide();
    $("#faqs dt").click(function () {
        $(this).next("#faqs dd").slideToggle(500);
        $(this).toggleClass("expanded");
    });
</script>                 
 
<?php
include_once("includes/footer.php");
?>
</body>