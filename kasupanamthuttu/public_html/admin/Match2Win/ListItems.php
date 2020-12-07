

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


<h5 style="text-align: left;font-family: arial;">Item List</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
     <?php
        
       
            
        
       $products =   $mysql->select("select * from _items where auctiontype='m2w'");
     ?>
         <div class="row">
               <?php foreach($products as $p) { ?>
                <div class="col-4">
                    <img src="assets/products/<?php echo $p['productimage'];?>" style="width:100%;border:1px solid #ccc">
                   <div style="font-size:15px;padding-top:10px;padding-bottom:10px;"><?php echo $p['itemname'];?> </div>
                   <div style="font-size:15px;padding-top:10px;padding-bottom:10px;">INR <?php echo $p['price'];?> </div>
                   <div style="font-size:13px;">
                   <span  class="btn btn-outline-primary">INR <?php echo $p['bidamount'];?>/Bid</span>&nbsp;
                   <span ><a href="M2W_viewItem/<?php echo $p['itemid'];?>" style="color:green">view details</a></span>
                   
                   </div>
                </div>
                   <?php 
               }         ?>
         
         </div>
 
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 