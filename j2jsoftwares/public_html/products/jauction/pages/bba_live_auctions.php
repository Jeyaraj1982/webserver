<script>getMenuItems('bidBased');</script>  
<h2>Indian Based Value</h2>
<div>
<?php
    $c = 0;
    $items = $mysql->select("select * from _items where auctiontype='bba' and productfrom='India'");
    foreach($items as $item) 
    {
        $c++;
        include("classes/widget_bba.php");
    } 
?>
</div>
<div style="clear:both"></div>
<h2>Malaysian Based Value</h2>
<div>
<?php
    $c = 0;
    $items = $mysql->select("select * from _items where auctiontype='bba' and productfrom='Malaysia'");
    foreach($items as $item) 
    {
        $c++;
        include("classes/widget_bba.php");
    } 
?>
</div>            