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
    <div class="jTitle" style="margin-left:2px;">Latest Events</div> 
                    <?php
                     
                    $page = (isset($_REQUEST['p']) && $_REQUEST['p']>0) ? $_REQUEST['p'] : 1;
                    $recordsperpage = JFrame::getAppSetting('eventsperpage');
                        foreach(JPages::getEvents(0," ispublish=1 order by pageid desc limit ".($page-1)*$recordsperpage.", ".$recordsperpage) as $event) { 
                            
                            $filename = ((strlen(trim($event['filepath']))>4) && file_exists("assets/cms/".$event['filepath'])) ? "assets/cms/".$event['filepath'] : "assets/cms/".JFrame::getAppSetting('noimg');
                        
                    ?>
                        <div style="margin-top:3px">
                            <table cellpadding="0" cellpadding="5">
                                <tr>
                                    <td style="padding-left:0px">
                                        <div style='background:#fff;padding:3px'>
                                            <a class="fancybox" rel="gallery1" href="<?php echo $filename;?>" style="outline:none">
                                                <img onmouseout="$(this).css('border','1px solid #ccc')" onmouseover="$(this).css('border','1px solid #333')" style="cursor:pointer;border:1px solid #ccc;" src="<?php echo $filename;?>" height="90" width="120">
                                            </a>    
                                            
                                        </div>
                                    </td>
                                    <td style="vertical-align:top;padding-left:5px;">
                                        <div class="jContent">
                                            <a class="jContent_title" style="text-decoration:none" href="index.php?page=<?php echo $event['pageid'];?>"><?php echo $event['pagetitle'];?></a> <Br>
                                           <?php echo strip_tags(substr(strip_tags($event["pagedescription"]),0,130))."... ";?> </div>  </td>
                                </tr>
                            </table>
                        </div>
                        <div style="text-align: center;margin:2px">
                            <hr style="margin:0px;width: 90%;border:none;border-bottom:1px solid #f1f1f1">
                        </div>
                    <?php } ?>
<script>
    $(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect    : 'none',
        closeEffect    : 'none'
    });
});
</script>
    <?php
            $records = sizeof(JPages::getEvents());
            for($i=1;$i<=intval($records/$recordsperpage);$i++) {
                ?>
                    <a href="events.php?p=<?php echo $i;?>"><?php echo $i;?></a>
                <?php
            }
?>
<?php
include_once("includes/footer.php");
?>
