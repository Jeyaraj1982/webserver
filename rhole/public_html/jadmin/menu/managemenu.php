<body style="margin:0px;">
    <script src="./../../assets/js/jquery-1.7.2.js"></script>  
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
    setTimeout("getOpt()",1500);
</script>
    <?php 
        include_once("../../config.php");
            $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
  
     if(isset($_POST{"updatebtn"})){
         
         $param=array("menuid"=>$_POST['rowid'],"menuname"=>$_POST['menuname'],"pagenameid"=>$_POST['pagenameid'],"isHeader"=>$_POST['isHeader'],"linkedto"=>$_POST['linkTo'],"target"=>$_POST['target'],"customurl"=>$_POST['customurl'],"orderf"=>$_POST['orderf']);            
 
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
             echo (MenuItems::updateMenu($param)>0) ? $obj->printSuccess("Menu Updated  Successfully") : $obj->printError("Error Updating Menu Items");
         }
        
         $_POST{"editbtn"}="editbtn";       
      } 

      if (isset($_POST{"editbtn"})){
          
       $pageContent = MenuItems::getMenu($_POST['rowid']);
                             
       ?>
    <form action="" method="post">
    <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['menuid'];?>">
        <table style="margin:10px;width:450px;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
            <tr>
                <td style="padding-left:10px;">Menu Name</td>
                <td><input type="text" name="menuname" style="width:272px;" value="<?php echo $pageContent[0]['menuname'];?>"></td> 
            </tr>
            <tr>
                <td style="padding-left:10px;">Target</td>
                <td>
                    <select style="width:100px;" name="target" id="target">
                        <option value="0" <?php echo ($pageContent[0]['target']==0) ? "selected='selected'" : "";?>>Self Window</option>
                        <option value="1" <?php echo ($pageContent[0]['target']==1) ? "selected='selected'" : "";?>>New Window</option>
                    </select>
                    &nbsp;&nbsp;Menu Position&nbsp;
                    <select name="isHeader">
                        <option value="1" <?php echo ($pageContent[0]['isheader']==1) ? "selected='selected'" : "";?>>Header</option>
                        <option value="0" <?php echo ($pageContent[0]['isheader']==0) ? "selected='selected'" : "";?>>Footer</option>
                    </select>
                </td>
            </tr>
            <tr>
               <td>Menu Order</td>
               <td>
                    <select name="orderf">
                     <?php 
                        $m = ($pageContent[0]['isheader']==1) ? $mysql->select("select * from _jmenu where isheader=1") : $mysql->select("select * from _jmenu where isheader=0");   
                        for($i=1;$i<=sizeof($m);$i++) {?>
                        <option value="<?php echo $i;?>" <?php echo ($i==$pageContent[0]['orderf'])? 'selected="selected"' :'';?>><?php echo $i;?></option>
                    <?php } ?>
                    </select>
               </td>
            </tr>
            <tr>
                <td style="vertical-align: text-bottom;padding-left:10px;">Linked To</td>
                <td>
                    <select name="linkTo" id="linkTo" style="width:272px;" onchange="getOpt()">
                        <option value="frmpage" <?php echo ($pageContent[0]['linkedto']=='frmpage') ? "selected='selected'" : "";?>>From Page</option>
                        <option value="frmpostad" <?php echo ($pageContent[0]['linkedto']=='frmpostad') ? "selected='selected'" : "";?>>From Postad</option> 
                        <option value="exturl" <?php echo ($pageContent[0]['linkedto']=='exturl') ? "selected='selected'" : "";?>>External Url</option>
                        <option value="frmgrp" <?php echo ($pageContent[0]['linkedto']=='frmgrp') ? "selected='selected'" : "";?>>From Group</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td valign="top">
                
                    <div id='frmpage'>
                        <select style="width:272px;" name="frmpageNo" id="frmpageNo">
                            <?php foreach(JPages::getPages() as $page) {?> 
                            <option value="<?php echo $page['pageid'];?>" <?php echo ($page['pageid']==$pageContent[0]['pageid'])? 'selected="selected"' : '';?>><?php echo $page['pagetitle'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id='frmpostad' style="display:none;">
                        <select style="width:272px;" name="frmpostadNo" id="frmpostadNo">
                            <?php foreach(JPostads::getPostad() as $postad) {?>
                            <option value="<?php echo $postad['postadid'];?>" <?php echo ($postad['postadid']==$pageContent[0]['postadid'])? 'selected="selected"' : '';?>><?php echo $postad['title'];?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div id='frmgrp' style="display:none;">       
                        <select style="width:272px;" name="customurlG" id="customurlG">
                            <option value="<?php echo Jca::getAppSetting('siteurl');?>/postads.php" <?php echo ($pageContent[0]['customurl']==Jca::getAppSetting('siteurl').'/postads.php') ? "selected='selected'" : "";?>>Postads</option>
                            <option value="<?php echo Jca::getAppSetting('siteurl');?>/successstory.php" <?php echo ($pageContent[0]['customurl']==Jca::getAppSetting('siteurl').'/successstory.php') ? "selected='selected'" : "";?>>Success Story</option>
                            <option value="<?php echo Jca::getAppSetting('siteurl');?>/testimonials.php"<?php echo ($pageContent[0]['customurl']==Jca::getAppSetting('siteurl').'/testimonials.php') ? "selected='selected'" : "";?>>Testimonials</option>
                            <option value="<?php echo Jca::getAppSetting('siteurl');?>/faq.php" <?php echo ($pageContent[0]['customurl']==Jca::getAppSetting('siteurl').'/faq.php') ? "selected='selected'" : "";?>>FAQ</option>
                        </select>
                    </div>   
                    <div id="exturl" style="display:none;">
                        http://<input type="text" name="customurl" value="<?php echo $pageContent[0]['customurl'];?>" style="width:220px;">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="updatebtn" value="Update" bgcolor="grey">
                    <input type="submit" name="deletebtn" value="Delete" bgcolor="grey">
                </td>
            </tr>
        </table>
    </form>
     echo "<script>$('#success').hide(3000);</script>";
       <?php
       exit;
      }
      
        if(isset($_POST{"cdeletebtn"})) {
            MenuItems::deleteMenu($_POST['rowid']);
            echo CommonController::printSuccess("deleted Successfully");
            echo "<script>$('#success').hide(3000);</script>"; 
        }
        
        if (isset($_POST{"deletebtn"})){
            $pageContent = MenuItems::getMenu($_POST['rowid']); 
       ?>
       <form action='' method="post">
       <table style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
       <tr> 
            <td style="width:150px">Menu Name</td>
            <td><?php echo $pageContent[0]['menuname'];?></td>
        </tr>
        <tr>
            <td>Linked Page To</td>
            <td><?php echo $pageContent[0]['pageid'];?></td> 
        </tr>
        <tr> 
            <td>Menu Position</td>
            <td> <?php if ($pageContent[0]["isheader"]==1) {?>
                <span style='color:#08912A;font-weight:bold;'>Header</span> 
                 <?php } else { ?>
                <span style='color:#FF090D;font-weight:bold;'>Footer</span> 
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Target</td> 
            <td> <?php if ($pageContent[0]["target"]==1) {?>
                <span style='color:#08912A;font-weight:bold;'>New Window</span> 
                 <?php } else { ?>
                <span style='color:#08912A;font-weight:bold;'>Self Window</span> 
                <?php } ?>
            </td>
        </tr>
        <tr> 
            <td>Custom Page Link</td>
            <td><?php echo $pageContent[0]['customurl'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['menuid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn"> 
      </form>
       <?php }  ?>
</body>
 