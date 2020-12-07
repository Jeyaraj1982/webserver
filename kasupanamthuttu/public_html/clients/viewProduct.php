 

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


 
     <?php
        
       
       
        
       $products =   $mysql->select("select * from _tblProducts where ProductID='".$_GET['param']."' and isActive='1'");
     ?>
         <div class="row">
              
                <div class="col-4">
                    <img src="assets/products/<?php echo $products[0]['ProductImage'];?>" style="width:100%;border:1px solid #ccc">
                    <br>
                    <a href="download.php?file=<?php echo $products[0]['ProductImage'];?>" style="color:green"><i class="fa fa-download"></i>&nbsp;Download Image</a>
                </div>
                <div class="col-8">
                   <div style="font-size:15px;font-weight:bold;padding-top:10px;padding-bottom:10px;"><?php echo $products[0]['ProductName'];?> </div>
                   <div style="font-size:13px;">
                   <span  class="btn btn-outline-primary"> INR <?php echo $products[0]['ProductPrice'];?></span>&nbsp;
                   </div>
                </div>
                  
         </div>
           <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <h4>Description</h4>
                <div style="font-size:12px" ><?php echo $products[0]['ProductDescription'];?></div>
            </div>
           </div>
 
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 