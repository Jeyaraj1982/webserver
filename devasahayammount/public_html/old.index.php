<?php error_reporting(0);
include_once("config.php");
include_once("includes/header.php");
?>
<script type="text/javascript" src="assets/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="assets/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" href="assets/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="assets/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="assets/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="stylesheet" href="assets/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="assets/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script> 
  
  <?php
     
    if ($_REQUEST['page']>0) {
    
    $pageContent = $mysql->select("select * from _jpages where pageid=".$_REQUEST['page']);
    echo "<div style='padding:10px;font-family:arial;font-size:13px;text-align:justify;'>";
    echo "<div style='font-family:arial;font-size:18px;font-weight:bold;border-bottom:2px solid #222;margin-bottom:10px;padding-bottom:10px;'>".$pageContent[0]['pagetitle']."</div>";
    if ( (strlen(trim($pageContent[0]['filepath']))>0) && (file_exists("assets/cms/".$pageContent[0]['filepath']))) {
        echo "<a class='fancybox' rel='gallery1' href='assets/cms/".$pageContent[0]['filepath']."' style='outline:none'>
                <img onmouseout='$(this).css('border','1px solid #ccc')' onmouseover='$(this).css('border','1px solid #333')' style='cursor:pointer;border:1px solid #ccc;' src='assets/cms/".$pageContent[0]['filepath']."' align='right' height='140px'>
             </a> ";    
    }
    echo $pageContent[0]['pagedescription'];
    echo "</div>";
    
    if ( (JFrame::getAppSetting('linkedpage') ==$_REQUEST['page']) && JFrame::getAppSetting('isenablecontact') ) {
        ?>
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31589.452834883774!2d77.51024!3d8.234737!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x978d86b3b1928dc0!2sBl.+Devasahayam+Pillai+Mount!5e0!3m2!1sen!2sin!4v1416808384508" width="725" height="545" frameborder="0" style="border:0"></iframe>
        <?php
        include_once("includes/contactform.php");
    }
    
    $mysql->execute("update _jpages set noofvisit=noofvisit+1 where pageid=".$_REQUEST['page']);
    
    if (JFrame::getAppSetting('sharepage')==1) {
    include_once("includes/sharethis.php");
    }
    
    ?>
   <script>
    $(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect    : 'none',
        closeEffect    : 'none'
    });
});
</script>
   <?php
    
}  else  if ($_REQUEST['spage']>0) {
    $pageContent = $mysql->select("select * from _jsuccessstory where storyid=".$_REQUEST['spage']);
    echo "<div style='padding:10px;font-family:arial;font-size:13px;text-align:justify;'>";
    echo "<div style='font-family:arial;font-size:18px;font-weight:bold;border-bottom:2px solid #222;margin-bottom:10px;padding-bottom:10px;'>".$pageContent[0]['storytitle']."</div>";
    echo $pageContent[0]['storydescription'];
    echo "</div>";
} 
else{
   include_once("includes/home.php");  
}
 

include_once("includes/footer.php");
?>
