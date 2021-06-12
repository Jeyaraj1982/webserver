
             <?php include_once("game_clients/menu.php");?>
     <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <article class="s-9 m-7 l-9">
                 
<h4>Wallet Update Request</h4>
 
                                                
<div class="row">
<div class="col-sm-12">
<?php
    if (isset($_POST['btnSubmitW'])) {
        $mysql->insert("_walletupdaterequests",array("userid"=>$_SESSION['USER']['userid'],
                                                     "requestedon"=>date("Y-m-d  H:i:s"),
                                                     "currency"=>$_POST['currency'],
                                                     "amount"=>$_POST['amount'],
                                                     "details"=>$_POST['details']));
        echo "Request Successfully Sent.";
    }
?>
 
 
<form target="_self" action="" method="post" style="width: 80%;">
 
  

<table style="border:none;font-size:12px;font-family:arial;margin:15px;width:100%">
    <tr>
        <td style="padding:0px">Amount</td>
    </tr>
    <tr>
        <td style="background:#fff;padding:0px;border:none;">
        <input type="text" name="amount" style="border:1px solid #999;padding:3px;width:100%;" Placeholder="Enter Amount" required></td>
    </tr>
    <tr>
        <td style="vertical-align:top;padding:0px;border:none;padding-top:10px">Transaction Details</td>
    </tr>
    <tr>
        <td  style="background:#fff;padding:0px;border:none;"><textarea cols="" rows="" name="details" style="border:1px solid #999;padding:4px;width:100%;height:80px"></textarea></td>
    </tr>
    <tr>
 
        <td style="text-align: right;border:none;padding-right:0px"><input class="btn btn-primary btn-sm" type="submit" name="btnSubmitW" value="Send Request"></td>
    </tr>
</table> 
 
</form>
</div>
</div>
</article>
</div>
</div>