<?php
    include_once("config.php");
    include_once("includes/header.php");
     if (isset($_GET['subc'])) {
          $SubCategories  = $mysql->select("SELECT * FROM _tbl_shopping_subcategories where SubCategoryCode='".$_GET['subc']."' and IsActive='1'" );
                              $products  = $mysql->select("SELECT * FROM _tbl_shopping_products where SubCategoryCode='".$_GET['subc']."' and IsActive='1'" );
            
     } else {
         $SubCategories[0]['SubCategoryName']="Product Category";
     }
?>
 
    
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary background-transparent text-center" data-image-src="assets/img/parallax-02.jpg" style="padding:50px !important">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1" style="line-height:30px;">
                Products<br>
                <span style="font-size:16px;"><?php echo $SubCategories[0]['SubCategoryName'];?></span>
            </h1>
            <div class="background-parallax" style="background-image:url(assets/img/parallax-06.jpg)"></div>
        </header>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin">
              <?php 
              if (isset($_GET['subc'])) {
                 foreach($products as $sc) {
              ?>
              <div class="s-12 m-6 l-3" style="text-align: center;">
                <a class="image-with-hover-overlay image-hover-zoom margin-bottom" data-rel="lightcase:portfolio" href="app/assets/products/<?php echo $sc['ProductImage'];?>">
                  <div class="image-hover-overlay background-primary"> 
                    <div class="image-hover-overlay-content text-center padding-2x">
                      <i class="icon-magnifying icon2x text-white"></i>  
                    </div> 
                  </div> 
                  <img src="app/assets/products/<?php echo $sc['ProductImage'];?>" alt="" title="Portfolio Image 1" />
                  <br>
                  
                </a>  
                <A href="products.php?pro=<?php echo $sc['ProductCode'];?>" class="text-dark text-primary-hover" style="font-weight:bold;"><?php echo $sc['ProductName'];?></a>
                <br>
                <h6 class="text-padding-small background-green text-white text-strong text-uppercase margin-bottom-30" style="line-height:20px;text-align:left">
                    Price<br>
                    <span style="font-weight:normal"><?php echo number_format($sc['ProductPrice'],2);?></span> (<span style="font-weight:normal"><strike>MRP: <?php echo number_format($sc['ProductMRP'],2);?></strike></span>)
                </h6>
                <h6 class="text-padding-small background-orange text-white text-strong text-uppercase margin-bottom-30" style="line-height:20px;">
                    BV<br>
                    <span style="font-weight:normal"><?php echo $sc['ProductBV'];?></span>
                </h6> 
              </div>
              <?php } ?>
                  
                  <?php
              } elseif (isset($_GET['pro'])) {
                  $products = $mysql->select("select * from _tbl_shopping_products where ProductCode='".$_GET['pro']."'");
                  ?>
                  
                  <div class="line">
                <div class="margin">  
                  <article class="s-12 m-12 l-3 margin-m-bottom">
                    <img class="margin-bottom" src="app/assets/products/<?php echo $products[0]['ProductImage'];?>" alt=""> 
                    
                    <h6 class="text-padding-small background-green text-white text-strong text-uppercase margin-bottom-30" style="line-height:20px;text-align:left">
                    Price<br>
                    <span style="font-weight:normal"><?php echo number_format($products[0]['ProductPrice'],2);?></span> (<span style="font-weight:normal"><strike>MRP: <?php echo number_format($sc['ProductMRP'],2);?></strike></span>)
                </h6>
                <h6 class="text-padding-small background-orange text-white text-strong text-uppercase margin-bottom-30" style="line-height:20px;">
                    BV<br>
                    <span style="font-weight:normal"><?php echo $products[0]['ProductBV'];?></span>
                </h6> 
                
                  </article>
                  <article class="s-12 m-12 l-9 margin-m-bottom">
                    <h3 class="text-strong"><a class="text-dark text-aqua-hover" href="/"><?php echo $products[0]['ProductName'];?></a></h3>
                    <p><?php echo $products[0]['ProductLongDesc'];?></p> 
                    
                  </article>
                </div>                                                                                                                      
              </div>
              
                  <?php
                  
              } else {
                 $SubCategories  = $mysql->select("SELECT * FROM _tbl_shopping_subcategories where IsActive='1'" );
                 foreach($SubCategories as $sc) {
              ?>
              <div class="s-12 m-6 l-3" style="text-align: center;">
                <a class="image-with-hover-overlay image-hover-zoom margin-bottom" data-rel="lightcase:portfolio" href="app/assets/products/<?php echo $sc['SubCategoryImage'];?>">
                  <div class="image-hover-overlay background-primary"> 
                    <div class="image-hover-overlay-content text-center padding-2x">
                      <i class="icon-magnifying icon2x text-white"></i>  
                    </div> 
                  </div> 
                  <img src="app/assets/products/<?php echo $sc['SubCategoryImage'];?>" alt="" title="Portfolio Image 1" />
                  <br>
                  
                </a>  
                <A href="products.php?subc=<?php echo $sc['SubCategoryCode'];?>"><?php echo $sc['SubCategoryName'];?></a>
              </div>
              <?php } ?>
              <?php } ?>
            </div>  
          </div>
        </div> 
      </article>
    </main>
    
    
<?php include_once("includes/footer.php"); ?>    