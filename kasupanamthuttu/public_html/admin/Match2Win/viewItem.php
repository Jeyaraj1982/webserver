

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
                    
                    <br><br>
                    <a href="M2W_EditItem/<?php echo $products[0]['itemid'];?>" class="btn btn-success btn-sm" style="color:#fff"> Edit Item</a><br><br>
                    
                   Secret Key : <?php echo $products[0]['skey'];?>
                </div>
                <div class="col-8">
                   <div style="font-size:15px;font-weight:bold;padding-top:10px;padding-bottom:10px;"><?php echo $products[0]['itemname'];?> </div>
                    <div style="font-size:13px;">
                   <span    >Product Price INR <?php echo $products[0]['price'];?></span>&nbsp;
                   </div>
                   <div style="font-size:13px;">
                   <span  class="btn btn-outline-primary" > INR <?php echo $products[0]['bidamount'];?>/Bid</span>&nbsp;
                   </div>
                </div>
                  
         </div>
           <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <h4>Description</h4>
                <div style="font-size:12px" ><?php echo $products[0]['description'];?></div>
            </div>
           </div>
           
           
 
</div>
  <div class="row">
             
            <div class="col-8">
                <h4>Earnings</h4>
                <div style="font-size:12px" > No records found</div>
            </div>
           </div>
           
           <div class="row">
             
            <div class="col-8">
                <h4>Winner Details</h4>
                <div style="font-size:12px" > No records found</div>
            </div>
           </div>

</div>

</div>
               </div>
              

   
    </div>
</div>

 