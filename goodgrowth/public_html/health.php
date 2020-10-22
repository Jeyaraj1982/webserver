<?php $page ='health';

include("file/header.php");?>
	<!--Main Slider-->
    <section class="main-slider" data-start-height="450" data-slide-overlay="yes">
    	
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <?php
                    $sliders = $mysql->select("select * from _tbl_Web_Sliders where PublishArea='Health' and IsPublish='1' order by SliderOrder");
                    foreach($sliders as $s) {
                ?>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/<?php echo $s['SliderFileName'];?>"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="images/main-slider/<?php echo $s['SliderFileName'];?>"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    </li> 
                <?php } ?>
                </ul>
            </div>
        </div>
    </section>
  	<!--End Main Slider-->
		<?php  include("file/products.php");?>
   <?php  include("file/footer.php");?>
