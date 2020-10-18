<?php 
 $page="product2";                                           
 include_once("config.php");       
 include_once("header.php");
 $Products = $mysql->select("select * from _tbl_products where CategoryID='4' and IsPublish='1'");
 
?>
 <section class="section section-xl bg-default text-center">
        <div class="container">
          <div class="title-group">
            <h3 class="oh"><span class="d-inline-block wow slideInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: slideInUp;">மற்ற உணவுகள்</span></h3>
            <!--<p class="text-width-small wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Our company provides first-class petroleum solutions &amp; services for governmental and private organizations worldwide.</p>-->
          </div>
          <div class="row row-lg row-40 justify-content-center">
            <?php foreach($Products as $Product){ ?>
            <div class="col-md-6 col-lg-5 col-xl-4">                                                                                                                                                                                                                                                                                                                          
              <div class="oh">
                <!-- Services Classic-->
                <article class="services-classic wow slideInLeft" data-wow-delay="0s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: slideInLeft;"><a class="services-classic-figure" href="https://kingfish.in/viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><img src="https://kingfish.in/uploads/<?php echo $Product['filepath1'];?>" alt="" style="width:370px;height:274px"></a>
                  <div class="services-classic-caption">
                    <div class="unit align-items-lg-center">
                      <div class="unit-left"></div>
                      <div class="unit-body">
                        <h5 class="services-classic-title"><a href="https://kingfish.in/viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><?php echo $Product['ProductName'];?></a></h5>
                        <p class="services-classic-text"><?php echo "RS.". $Product['ProductPrice'];?></p>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <?php } ?>
             <?php if(sizeof($Products)==0){ ?>
                   <div class="col-md-6 col-lg-5 col-xl-4">                                                                                                                                                                                                                                                                                                                          
                        <div class="oh">
                             <p class="services-classic-text"><?php echo "No Products Found";?></p>
                        </div>
                   </div>
             <?php } ?>
          </div>
        </div>
      </section>
      <br><br>
<?php include_once("footer.php");?>