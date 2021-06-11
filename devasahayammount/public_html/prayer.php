<?php error_reporting(0);
include_once("config.php");
include_once("includes/header.php");
?> 

                    <div class="jTitle" style="margin-left:2px;">Latest Prayer</div> 
                    <?php 
                   foreach($mysql->select("select * from _jprayer")as $pray){
                    ?> 
                        <div style="margin-top:3px">
                            <table cellpadding="0" cellpadding="5">
                                <tr>
                                    <td style="vertical-align:top;padding-left:5px;">
                                        <div class="jContent">
                                            <a class="jContent_title" style="text-decoration:none" href=""><?php echo $pray['name'];?></a> <Br>
                                           <?php echo strip_tags(substr(strip_tags($pray["description"]),0,130))."... ";?> </div>  
                                    </td>
                                </tr>
                                 <tr>
                                    <td style="vertical-align:top;padding-left:5px;">
                                        <div class="jContent">
                                         Email:  <?php echo $pray["email"];?>
                                    </td>
                                </tr>
                               <tr>
                                    <td style="vertical-align:top;padding-left:5px;">
                                        <div class="jContent">
                                         Address:  <?php echo $pray["address"];?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="text-align: center;margin:2px">
                            <hr style="margin:0px;width: 90%;border:none;border-bottom:1px solid #f1f1f1">
                        </div>
                    <?php }
        include_once("includes/footer.php");             
                    
                     ?>

