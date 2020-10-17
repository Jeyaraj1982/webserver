<html>    
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="./../../assets/js/jquery-1.7.2.js"></script>
    <link rel="stylesheet" href="./../../assets/css/demo.css">     
    <body style="margin:0px;">
        <div class="titleBar">Add Menu Page</div>
        <?php 
            include_once("../../config.php");
            
            $obj = new CommonController(); 
                
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
                
            if (isset($_POST{"save"})) {
            
                $param=array("menuname"=>$_POST['menuname'],"isHeader"=>$_POST['isHeader'],"target"=>$_POST['target'],"linkedto"=>$_POST['linkTo']);               
 
                if (!((strlen(trim($_POST['menuname']))>=3))) {
                    echo $obj->printError("Please Enter Valid Menu Name");    
                }

                switch($_POST['linkTo']) {
                    case 'frmgrp'       :  $param["customurl"] = $_POST['customurlG'];
                                           $param['pagenameid'] = 0;
                                           break; 
                    case 'exturl'       :  $param["customurl"] = $_POST['customurl'];
                                           $param['pagenameid'] = 0;
                                           break;
                    case 'frmpage'      :  $param["customurl"] = "";
                                           $param['pagenameid'] = $_POST['frmpageNo'];
                                           break;
                                           
                    case 'frmpostad'     : $param["customurl"] = "";
                                           $param['pagenameid'] = $_POST['frmpostadNo'];
                                           break;
                                                   
                }  
                if ($obj->err==0) {
                    echo (MenuItems::addMenu($param)>0) ? $obj->printSuccess("New Menu Added successfully") : $obj->printError("Error Occured Adding New Menu");
                } 
            } 
        ?>
        <form action="" method="post" style="height: 20px;">
            <table style="margin:10px;width:450px;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <td style="padding-left:10px;">Menu Name</td>
                    <td><input type="text" name="menuname" style="width:272px;"></td> 
                </tr>
                <tr>
                    <td style="padding-left:10px;">Target</td>
                    <td>
                        <select style="width:100px;" name="target" id="target">
                            <option value="0">Self Window</option>
                            <option value="1">New Window</option>
                        </select>
                        &nbsp;&nbsp;Menu Position&nbsp;
                        <select name="isHeader">
                            <option value="1">Header</option>
                            <option value="0">Footer</option>
                        </select>
                    </td>
                </tr>                                   
                <tr>
                    <td style="vertical-align: text-bottom;padding-left:10px;">Linked To</td>
                    <td>
                        <select name="linkTo" id="linkTo" style="width:272px;" onchange="getOpt()">
                            <option value="frmpage">From Page</option>
                            <option value="frmpostad">From PostAd</option> 
                            <option value="exturl">External Url</option>
                            <option value="frmgrp">From Group</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td valign="top">
                        
                        <div id='frmpage'>
                            <select style="width:272px;" name="frmpageNo" id="frmpageNo">
                                <?php foreach(JPages::getPages() as $page) {?>
                                <option value="<?php echo $page['pageid'];?>"><?php echo $page['pagetitle'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id='frmpostad' style="display:none;">
                            <select style="width:272px;" name="frmpostadNo" id="frmpostadNo">
                                <?php foreach(JPostads::getPostad() as $postad) {?>
                                <option value="<?php echo $postad['postadid'];?>"><?php echo $postad['title'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id='frmgrp' style="display:none;">       
                            <select style="width:272px;" name="customurlG" id="customurlG">
                                <option value="<?php echo Jca::getAppSetting('siteurl');?>/postads.php">Post New Ads</option>
                                <option value="<?php echo Jca::getAppSetting('siteurl');?>/successstory.php">Success Story</option>
                                <option value="<?php echo Jca::getAppSetting('siteurl');?>/testimonials.php">Testimonials</option>
                                <option value="<?php echo Jca::getAppSetting('siteurl');?>/faq.php">FAQ</option>
                            </select>
                        </div>   
                        <div id="exturl" style="display:none;">
                            http://<input type="text" name="customurl" style="width:220px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="save" value="Save Menu" bgcolor="grey"></td>
                </tr>
            </table>
        </form>
        <script>$('#success').hide(3000);</script>
    </body>
</html>
<script>
    function getOpt() {
        
        var linkTo = $('#linkTo').val();
        
        switch(linkTo) {
            case 'frmpage'  :   $('#frmpage').show();
                                $('#exturl').hide();
                                $('#frmpostad').hide();
                                $('#frmgrp').hide();
                                break;
                                
            case 'exturl'  :    $('#exturl').show();
                                $('#frmpage').hide();
                                $('#frmpostad').hide();
                                $('#frmgrp').hide();
                                break;
                                
            case 'frmpostad':   $('#frmpostad').show();
                                $('#frmpage').hide();
                                $('#exturl').hide();
                                $('#frmgrp').hide();
                                break;                                 

            case 'frmgrp'     : $('#frmgrp').show();
                                $('#frmpage').hide();
                                $('#exturl').hide();
                                $('#frmpostad').hide();
                                break;                     
        }
    }
</script>