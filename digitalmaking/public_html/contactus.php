<?php include_once("header.php"); ?> 
<div class="video-section" style="padding-bottom:0px;padding-top:0px;margin-top:100px">
                <div class="container video-container" style="box-shadow:none;background-color:#fff !important;border-radius:0px;margin-top:0px;">
                    <div class="col-md-6 video-title-section">
                        <p class="video-number" style="max-width:180px !important;min-width:180px !important">Contact Us</p>
                        <h2 class="video-title" style="font-size:16px;">Digital Making</h2>
                        <!--<p class="innovate-text" style="text-align: justify;line-height:28px">
                           Unit 29 Abbey Road Ind Est.<br>NW10 7XF London.
                        </p>
                        
                        <p class="innovate-text" style="text-align: justify;line-height:28px">
                           <br>LG 213 Nu center,<br>Brickfield Kuala Lumpur,<br>Malaysia.
                        </p>
                        
                        <p class="innovate-text" style="text-align: justify;line-height:28px">
                           <br>Harikrishna Street, Saligramam,<br>Chennai. India.<br>+91 8903833896
                        </p>
                            -->
                    </div>
                    <div class="col-md-5 offset-1 col-sm-12">
                        <div class="video-header-img">
                        <img src="https://www.digitalmaking.in/assets/img/contact.jpg">
                        </div>
                    </div>
                </div>                                      
            </div>
            
            <div class="video-section" style="padding-bottom:0px;padding-top:0px;margin-top:100px">
                <div class="container video-container" style="box-shadow:none;background-color:#fff !important;border-radius:0px;margin-top:0px;padding:10px !important">
                  
                         
                    <?php
                             $Contacts = $mysql->select("select * from _tbl_Contacts where IsDelete='0' order by ContactID desc");?>
                                        <?php foreach($Contacts as $Contact){ ?>
                                          <div class="col-md-3 video-title-section">
                                        <img src="<?php echo "../contacts/".$Contact['ContactImage'];?>" style='height:150px;margin-bottom:15px;border:1px solid #ccc;background:#fff;border-radius:5px'>
                                           </div>
                                        <?php } ?>    
                 
                     
                </div>                                      
            </div>
<?php include_once("footer.php"); ?>               