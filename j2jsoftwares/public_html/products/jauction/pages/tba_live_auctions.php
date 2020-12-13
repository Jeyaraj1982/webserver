<script>getMenuItems('timeBased');</script>  
<h2>Indian Based Value</h2>
<div>
<?php
    $c = 0;
    $items = $mysql->select("select * from _items where ispublish='1' and auctiontype='tba' and productfrom='India' and endon >= '".date("Y-m-d H:i:s")."' ");
    foreach($items as $item) 
    { 
        $c++;
        include("classes/widget_tba.php");
    }
?>
</div>
<div style="clear:both"></div>
<h2>Malaysian Based Value</h2>
<div>
<?php
    $c = 0;
    $items = $mysql->select("select * from _items where ispublish='1' and auctiontype='tba' and productfrom='Malaysia' and endon >= '".date("Y-m-d H:i:s")."' ");
    foreach($items as $item) 
    { 
        $c++;
        include("classes/widget_tba.php");
    }
?>
</div>