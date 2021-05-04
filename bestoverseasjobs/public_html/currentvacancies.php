<?php include_once("header.php"); ?>
<section class="ls about s-pt-25">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6" data-animation="slideInLeft">
                            <div class="heading-about" style="margin-top:0px">
                                
                                <h4>
                                    <font color="#0e691a">Current Vacancies</font>
                                </h4>
                                <!--<h3>
                                    <font color="#0e691a;" style="font-size:54px">Overseas Service</font> 
                                </h3>-->
                                                    
                               
                                 <div class="row">
                                    <?php 
                                            $Sliders = $mysql->select("select * from _tbl_joboffers order by JobOfferID desc"); 
                                            foreach($Sliders as $Slider){ 
                                        ?>
                                            <div class="col-md-4">
                                            <img src="https://bestoverseasjobsconsultancy.com/uploads/<?php echo $Slider['JobOfferImage'];?>">
                                            
                                            </div>
                                        <?php } ?>
                                    
                                 </div>
                                 
                                 <br><Br><Br>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </section>
<?php include_once("footer.php"); ?>