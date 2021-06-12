<?php
   
            if ($_POST['licenceKey']) {
$qry = explode(";",base64_decode($_POST['licenceKey']));
                                 
if ($_POST['count']<=$dealmaass->getBalance()) {
    foreach($qry as $q) {
        if ($q!=""){
            $mysql->execute($q);
        }
    }
    if (isset($_POST['iss2w']) && $_POST['iss2w']>0) {
        
        if (isset($_SESSION['WINAMTRC']) && $_SESSION['WINAMTRC']>=0) {
            
        } else {
            $item=$mysql->select("select * from _items where itemid='".$_POST['iss2w']."'");
            $dbit = $mysql->select("select productid from _bids where productid='".$_POST['iss2w']."' and bidrate>=0");
            $data = $mysql->insert("_bids",array("productid"=>$_POST['iss2w'],"userid"=>$_SESSION['USER']['userid'],"bidamount"=>$item[0]['bidamount'],"bidrate"=>"-1","bidon"=>date("Y-m-d H:i:s")));
             
            $amt = explode(",",$item[0]['skey']);                                      
            if (sizeof($dbit)==0) {
                $index=0;
            } else {
                $index = intval(sizeof($dbit)%sizeof($amt));
            }
            //echo $index;
            //print_r($amt);
            //exit;
            //73 Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 ) 
            //fr random
            //$_SESSION['WINAMT']=$amt[rand(0,sizeof($amt)-1)];
            //for sequence                           
            $_SESSION['WINAMT']=isset($amt[$index]) ? $amt[$index] : "0";
            $_SESSION['WINAMTRC']=$data;
        }
        ?>
            <script>location.href='S2W';</script>
           <?php
        exit;
    }
      ?>
      <script>location.href='usr_bidhistory';</script>
      <?php
} else {
    ?>
     <script>
                alert("You don't have balance to bid this product");
                location.href='https://www.jobtomoney.com';
               </script>
    <?php
  
}
    
            } else {
               ?>
               <script>
                alert("Unauthroized access");
                location.href='https://www.jobtomoney.com';
               </script>
               <?php
            }
exit;    
?>
