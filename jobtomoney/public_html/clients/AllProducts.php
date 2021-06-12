

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


<h5 style="text-align: left;font-family: arial;">Product List</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
     <?php
        
       
            
        
       $products =   $mysql->select("select * from _tblProducts where isActive='1'");
     ?>
         <div class="row">
               <?php foreach($products as $p) { ?>
                <div class="col-4">
                    <img src="assets/products/<?php echo $p['ProductImage'];?>" style="width:100%;border:1px solid #ccc">
                   <div style="font-size:15px;padding-top:10px;padding-bottom:10px;"><?php echo $p['ProductName'];?> </div>
                   <div style="font-size:13px;">
                   <span  class="btn btn-outline-primary"> INR <?php echo $p['ProductPrice'];?></span>&nbsp;
                   <span ><a href="viewProduct/<?php echo $p['ProductID'];?>">Read More</a></span>
                   
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

 