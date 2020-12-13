<?php
   

$qry = explode(";",base64_decode($_POST['licenceKey']));

if ($_POST['count']<=$dealmaass->getBalance()) {
    foreach($qry as $q) {
        $mysql->execute($q);
    }
      ?>
      <script>location.href='../p/usr_bidhistory';</script>
      <?php
} else {
    echo "You don't have balance to bid this product";
}
    
exit;    
?>
