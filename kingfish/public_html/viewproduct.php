<?php
$page="product2";
 include_once("config.php");
 include_once("header.php"); 
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
$category= $mysql->Select("select * from _tbl_product_categories where CategoryID='".$data[0]['CategoryID']."'");
?>
<div class="container">
  <ul class="breadcrumbs-custom-path">
    <li><a href="../index.php">Home</a></li>
    <li><a href="#"><?php echo $category[0]['CategoryName'];?></a></li>                   
    <li class="active"><?php echo $data[0]['ProductName'];?></li>
  </ul>
</div>
<section class="section section-sm section-first bg-default text-left">
        <div class="container">
          <div class="row row-60">
            <div class="col-md-7 col-xl-8">
              <div class="single-service"><img src="https://kingfish.in/<?php echo "uploads/".$data[0]['filepath1'];?>" alt="" width="770" height="426">
                <h4><?php echo $data[0]['ProductName'];?></h4>
                <h6><?php echo "Rs ." .$data[0]['ProductPrice'];?></h3>
                <p><?php echo $data[0]['Description'];?></p>
              </div>
            <div class="col-md-5 col-xl-4">
              
            </div>
          </div>
        </div>
      </section>
        <?php include_once("footer.php");?>