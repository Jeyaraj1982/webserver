 <body style="margin:0px;">
  <?php 
include_once("config.php");
include_once("includes/header.php");


?>
<style>
#faqs dt, #faqs dd { padding: 0 0 0 25px }
#faqs dt { font-size:12px; font-family:arial;font-weight:Bold; color: #2D92D6; cursor: pointer; height: 24px; line-height: 24px; margin: 0 0 15px 25px}
#faqs dd { font-size: 12px;font-family:arial;color:#333333; margin: 0 0 20px 25px;display:block;}
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
        <dd><?php echo $faq['faqanswer'];?>
        <div id="container_<?php echo $faq['faqid'];?>" style="border:none;border-top:1px solid #eee;padding:5px;">
        
        <?php if ($_SESSION['faq'][$faq['faqid']]==1) {
        
                    echo  "<div style='width:450px;'><div style='float:left;width:200px;height:15px;background:#f1f1f1;border:1px solid #d5d5d5;border-radius:5px;'>
                    <div style='height:15px;width:".($_SESSION['faq']['rating']*2)."px;background:#7ee572;border:none;border-radius:4px;'></div>
               </div><div style='float:left;padding:1px;'>&nbsp;".number_format($_SESSION['faq']['rating'],2)."%</div></div>
               <br><div  style='clear:both;color:green'>You have already submitted your valuable suggession</span>";
               
         ?>
 
              
        <?php } else { ?>
            <form name="form_<?php echo $faq['faqid'];?>" id="form_<?php echo $faq['faqid'];?>" method="post">
                Is Useful?
                <input type="radio" name="isuseful" onclick="postFaq('y','<?php echo $faq['faqid'];?>')">Yes &nbsp;&nbsp;
                <input type="radio" name="isuseful" onclick="postFaq('n','<?php echo $faq['faqid'];?>')">No
            </form>
        <?php } ?>
        </div>
        </dd>
        
     <?php 
            } 
        } 
    ?>
  </dl>
</div> 

<script type="text/javascript">
function postFaq(postStatus,faqId) {
   $('#container_'+faqId).html("submitting your valuable suggesstion");
   $.ajax({url:'webservice.php?request=faq&faqstatus='+postStatus+'&faqId='+faqId,success:function(data){
     $('#container_'+faqId).html(data);      
   }})
    
}
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