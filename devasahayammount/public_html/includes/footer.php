                                </td>
                                <?php
                                if (JFrame::getAppSetting('layout')==1) {
                                    include_once("includes/side.php");
                                }
                                ?>
                                </tr>
                        </table> 
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#aaa" colspan="2">
                        <table style="margin:10px;width:100%;">
                            <tr>
                                <td style="vertical-align:top;width:33%;">
                                
                                  <a href='<?php echo JFrame::getAppSetting('facebookurl');?>'><img src="assets/images/facebook.png"></a>
                                  <a href='<?php echo JFrame::getAppSetting('twitterurl');?>'><img src="assets/images/twitter.png"></a>
                                  <a href='<?php echo JFrame::getAppSetting('youtubeurl');?>'><img src="assets/images/youtube.png"></a>
                                  <a href='<?php echo JFrame::getAppSetting('googleplusurl');?>'><img src="assets/images/googleplus.png"></a>
                                        
                                   <!-- <table>
                                        <tr>
                                            <td colspan="2">
                                                
                                                  </td>
                                        </tr>   
                                        <?php if (JFrame::getAppSetting('isenablesuccessstory')) { ?>
                                        <tr><td><img src="http://www.freundcontainer.com/images/art/grid-arrow-right.png"></td><td><a class="rmenu" href="successstory.php">Success Story</a></td></tr>
                                        <?php } ?>
                                        <?php if (JFrame::getAppSetting('isenablefaq')) { ?>
                                        <tr><td><img src="http://www.freundcontainer.com/images/art/grid-arrow-right.png"></td><td><a class="rmenu" href="faq.php">Faq</a></td></tr>
                                        <?php } ?>
                                        <?php if (JFrame::getAppSetting('isenabletestimonial')) { ?>
                                        <tr><td><img src="http://www.freundcontainer.com/images/art/grid-arrow-right.png"></td><td><a class="rmenu" href="testimonials.php">Testimonial</a></td></tr>
                                        <?php } ?>
                                    </table>  -->
                                    
                                    <div style="height:119px;">&nbsp;</div>
                                    <br><br>
                                    <div style='font-family:"Droid Sans";font-size:13px;'>
                                    <b>For Contact:</b><br>
                                    
                                    Parish Priest,<br>
                                    Our Lady of Sorrows Shrine, <br>
                                    26/87, South Street, Devasahayam Mount,<br>
                                    Aralvaimozhi, K.K. Dt - 629301<br>
                                    Tel: +91 4652 263135<br> 
                                    </div>   
                                </td>
                                <td>

                                </td>
                                <td style="vertical-align:top;width:25%;padding-right:5px;padding-left:5px">
                                    <?php 
                                        if (JFrame::getAppSetting('isenablesubscriber')) {
                                            
                                            if (isset($_POST{"save"})) {
                                                $menu= new JSubscriber();
                                                if($menu->addSubscriber($_POST['subscribername'],$_POST['subscriberemail'],$_POST['subscribermobile'],$_POST['others'])>0){
                                                    echo "Subscriber Added successfully";       
                                                } else {
                                                    echo "Error Adding Subscriber";
                                                }
                                            }
                                    ?>
    
    <style type="text/css">
    

.myrButton {
    -moz-box-shadow:inset 0px 1px 0px 0px #f5978e;
    -webkit-box-shadow:inset 0px 1px 0px 0px #f5978e;
    box-shadow:inset 0px 1px 0px 0px #f5978e;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f));
    background:-moz-linear-gradient(top, #f24537 5%, #c62d1f 100%);
    background:-webkit-linear-gradient(top, #f24537 5%, #c62d1f 100%);
    background:-o-linear-gradient(top, #f24537 5%, #c62d1f 100%);
    background:-ms-linear-gradient(top, #f24537 5%, #c62d1f 100%);
    background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f',GradientType=0);
    background-color:#f24537;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    border-radius:6px;
    border:1px solid #d02718;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:arial;
    font-size:12px;
    font-weight:bold;
    padding:3px 18px !important;
    text-decoration:none;
    text-shadow:0px 1px 0px #810e05;
}
.myrButton:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24537));
    background:-moz-linear-gradient(top, #c62d1f 5%, #f24537 100%);
    background:-webkit-linear-gradient(top, #c62d1f 5%, #f24537 100%);
    background:-o-linear-gradient(top, #c62d1f 5%, #f24537 100%);
    background:-ms-linear-gradient(top, #c62d1f 5%, #f24537 100%);
    background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537',GradientType=0);
    background-color:#c62d1f;
}
.myrButton:active {
    position:relative;
    top:1px;
}

    </style>    
    <div style="border:1px solid #e5e5e5;background:#C9C9C9;padding:5px;border-radius:5px;height:160px">
                                    <div class='jContent_title' style="margin-bottom:5px;margin-top:5px; border-bottom: 2px solid #047d9b;">Subscriber</div>
                                    <form action="" method="post">
                                        <table  style="font-family:arial;font-size:12px;" cellpadding="3" cellspacing="0">
                                            <tr>
                                                <td style="width:70px">Name</td>
                                                <td><input type="text" name="subscribername" style="width:150px;"></td> 
                                            </tr>
                                            <tr>
                                                <td>Email Id</td>
                                                <td><input type="text" name="subscriberemail" style="width:150px;"></td>  
                                            </tr>
                                            <tr>
                                                <td>Mobile No.</td>
                                                <td><input type="text" name="subscribermobile" style="width:150px;"></td>  
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="padding-top:6px"><input name="save"  type="submit"  class="myrButton" value=" Subscribe Me " >
                                               </td>
                                            </tr> 
                                        </table>
                                    </form>
                                    <?php } ?>
                                    <Br><Br> 
                                     <div style='font-family:"Droid Sans";font-size:13px;'>
                                    <img src="assets/ebslogo.png">
<br>
<span style="color:#333;font-size:11px">You can pay using any one of Credit Cards | Debit Cards | Net Banking Credentials</span>
</div>
                             </div>       
                                </td>
                                <td style="width:308px;">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FDevasahayammountshrine&amp;width=290&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false&amp;appId=195924193811162" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:290px; height:290px;background:#fff" allowTransparency="true"></iframe>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php if (sizeof(MenuItems::getFooterMenuItems())>0) { ?>
                <tr>
                    <td colspan="2" id="Jfooter" style="clear:both;background:url('assets/cms/<?php echo JFrame::getAppSetting('footerbgimage');?>');background-color:<?php echo JFrame::getAppSetting('footerbgcolor');?>;padding: 10px">
                        <div class="JFooter">
                            <?php foreach(MenuItems::getFooterMenuItems() as $m) { ?>
                                <a class="JFooter" style='font-family:"Droid Sans";font-size:13px;color:#222' href='index.php?page=<?php echo $m['pageid'];?>'><?php echo $m['menuname'];?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <?php } ?>
                           <a class="JFooter" style='font-family:"Droid Sans";font-size:13px;color:#222' href='index.php?page=31'>Contact Us</a>
                            
                        </div>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>
                        <table style="width: 100%;font-size:12px;font-family:'comic sans ms';text-decoration:none;color:#222;">
                            <tr>
                                <td width="50%">All Copy rights @ <?php echo JFrame::getAppSetting('sitename');?> 2014-2015</td>
                                <td style="text-align:right">Designed & Maintain By <a style="color:#CE0C9A" href="http://www.j2jsoftwaresolutions.com" target="_blank">J2J Software Solutions</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
  </table>
</body>
</html>
 
