<div style="border:1px solid #e5e5e5;padding:5px;background:#f9f9f9">
    <div class="jTitle" style="margin-left:2px;">Latest Books</div>     
    <marquee scrollamount='2'  behavior="scroll" direction="left"onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">          
    <?php foreach($mysql->select("select * from _jdownloads where albumid=6 and ispublished=1 order by downloadid desc limit 0,9") as $downloads) { ?>
    <div style="margin:2px;float:left;width:120px;height:200px;margin-right:5px;overflow:hidden">
        <table cellpadding="0" cellpadding="0"  style="font-family:'Droid Sans';font-size:13px;color:#444444">
            <tr>
                <td style="padding-left:0px">
                    <div style='background:#fff;padding:3px;border:1px solid #e5e5e5'>
                        <img src="assets/cms/<?php echo $downloads["thumb"];?>" title=" <?php echo $downloads["downloadtitle"];?>" style="height:160px;width:120px;"><br>
                        <a style="outline: none;" target="_blank" href ="assets/cms/<?php echo $downloads["downloadfilepath"];?>" title="Download File">
                            <img src="assets/images/download-now-button.png" style="margin-top:0px;width:120px;">
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php } ?> 
    </marquee>
</div>
<a class="jMore" href="downloads.php?downloads=6">More Books</a>
  