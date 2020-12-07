

 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">
                  <h5>Item Details</h5><Br>


 
     <?php
        
       
       
        
       $products =   $mysql->select("select * from _items where itemid='".$_GET['param']."'");
     ?>
         <div class="row">                                                               
                <div class="col-4">
                <img src="assets/products/<?php echo $products[0]['productimage'];?>" style="width:100%;border:1px solid #ccc">
                </div>
                <div class="col-8">
                   <div style="font-size:15px;font-weight:bold;padding-top:10px;padding-bottom:10px;"><?php echo $products[0]['itemname'];?> </div>
                     
                   <div style="font-size:13px;">
                   <span  class="btn btn-outline-primary" > INR <?php echo $products[0]['bidamount'];?>/Bid</span>&nbsp;
                   </div>
                     <br><br>
                     <b>Winning Amounts:</b><br>
                      <?php echo str_replace(",",", ",$products[0]['skey']);?><br><Br><br>
                      <?php
                          if ($products[0]['ispublish']=="0") {
                              echo "<span style='background:red;color:white;padding:3px 8px;'>Stopped</span>";
                          }
                      ?>
                    <a href="S2W_EditItem/<?php echo $products[0]['itemid'];?>" class="btn btn-success btn-sm" style="color:#fff"> Edit Item</a><br><br>
                </div>
                
         </div>
           <div class="row">
             
            <div class="col-8">
                <h4>Description</h4>
                <div style="font-size:12px" ><?php echo $products[0]['description'];?></div>
            </div>
           </div>
           
           
 
</div>
 
 
 
 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-12 margin-bottom">
                  <div class="box">
           <div class="row">
             
            <div class="col-12">
                <h4>Winner Details</h4>
                <div style="font-size:12px" >
                    <table>
                <?php
                $bidamount=0;
                $bidrate = 0;
                    $bids = $mysql->select("Select * from _bids left join _usertable on _usertable.userid=_bids.userid where _bids.productid='".$_GET['param']."' order by _bids.bidid desc");
                    foreach($bids as $b) {
                           $bidamount += $b['bidamount'];
                           $bidrate += $b['bidrate'];
                        ?>
                            <tr>
                                <td><?php echo $b['bidon'];?></td>
                                <td><?php echo $b['personname'];?></td>
                                <td><?php echo $b['userid'];?></td>
                                <td style="text-align: right"><?php echo number_format($b['bidamount'],2);?></td>
                                <td style="text-align: right"><?php echo number_format($b['bidrate'],2);?></td>
                                <td><?php echo $b['remarks'];?></td>
                            </tr>
                        <?php
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"><?php echo number_format($bidamount,2);?></td>
                    <td style="text-align: right"><?php echo number_format($bidrate,2);?></td>
                </tr>
                
                </table>
                </div>
            </div>
           </div>
           </div>
           </div>
           </div>
 </div>
           
           
           
           
           
           
           
           
           
           
           
           <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-12 margin-bottom">
                  <div class="box">
           <div class="row">
             
            <div class="col-8">
                <h4>Details User Wise</h4>
                <div style="font-size:12px" >
                    <table>
                <?php
                $bidamount=0;
                $bidrate = 0;
                    $bids = $mysql->select("Select _bids.userid,_usertable.personname, sum(bidamount) as bidamount, sum(bidrate) as bidrate   from _bids left join _usertable on _usertable.userid=_bids.userid where _bids.productid='".$_GET['param']."' group  by _bids.userid desc");
                    foreach($bids as $b) {
                           $bidamount += $b['bidamount'];
                           $bidrate += $b['bidrate'];
                        ?>
                            <tr>
                                <td><?php echo $b['bidon'];?></td>
                                <td><?php echo $b['personname'];?></td>
                                <td><?php echo $b['userid'];?></td>
                                <td style="text-align: right"><?php echo number_format($b['bidamount'],2);?></td>
                                <td style="text-align: right"><?php echo number_format($b['bidrate'],2);?></td>
                            </tr>
                        <?php
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"><?php echo number_format($bidamount,2);?></td>
                    <td style="text-align: right"><?php echo number_format($bidrate,2);?></td>
                </tr>
                
                </table>
                </div>
            </div>
           </div>
           </div>
           </div>
           </div>
 </div>

</div>

</div>
               </div>
              

   
    </div>
</div>

 