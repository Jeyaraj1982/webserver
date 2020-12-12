<?php
 include_once("config.php");
 include_once("header.php"); 
?>
<main>
    <div id="shopify-section-about-template" class="shopify-section">
        <section class="page-content about-page-content mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h2>Services</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="about-single-block">
                            <div class="featured-points">
                                <ul>
                                <?php $StoreTypes = $mysql->select("select * from _tbl_store_types where IsActive='1'");
                                     foreach($StoreTypes as $StoreType){ ?>
                                        <li style="color:#333;font-weight:normal;border:none;"><?php echo $StoreType['StoreTypeName'];?></li>
                                     <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>                                          
    </div>
</main>
<?php include_once("footer.php"); ?> 


    
    
    
    
    
