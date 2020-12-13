<script>getMenuItems('bookWin');</script>  
<h2>Indian Based Value</h2>
<div>
<?php
    $c = 0;
    $items = $mysql->select("select * from _items where auctiontype='m2w' and productfrom='India'");
    foreach($items as $item) 
    {
        $c++;
        include("classes/widget_m2w.php");
    } 
?>
</div>
<div style="clear:both"></div>
<h2>Malaysian Based Value</h2>
<div>
<?php
    $c = 0;
    $items = $mysql->select("select * from _items where auctiontype='m2w' and productfrom='Malaysia'");
    foreach($items as $item) 
    {
        $c++;
        include("classes/widget_m2w.php");
    } 
?>
</div>   