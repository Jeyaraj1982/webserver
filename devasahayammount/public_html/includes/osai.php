<div style="border:1px solid #e5e5e5;padding:5px;background:#f9f9f9">
    <div class="jTitle" style="margin-left:2px;">Latest OSAI</div> 
    <?php foreach($mysql->select("select * from _jdownloads where albumid=8 and ispublished=1 order by downloadid desc limit 0,5") as $downloads) { ?>
    <div style="padding:20px;">
        <a style="outline: none;" target="_blank" class="qLink" href ="assets/cms/<?php echo $downloads["downloadfilepath"];?>" title="Download File">
            <img src="assets/pdf.png" align="absmiddle">&nbsp;&nbsp;<?php echo $downloads["downloadtitle"];?>
        </a>
    <br>
    </div>
    <?php } ?> 
</div>
                    <a class="jMore" href="downloads.php?downloads=8">More OSAI</a>
