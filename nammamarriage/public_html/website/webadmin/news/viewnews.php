<?php include_once(__DIR__."/../header.php"); ?>

<?php 
        
          $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }

        if(isset($_POST['rmimage'])) {
             $mysql->execute("update _jpages set filepath='' where pageid=".$_POST['rowid']);
             echo $obj->printSuccess("Image Removed Successfully");
             $_POST{"editbtn"}="editbtn";
        }

     if(isset($_POST{"updatebtn"})){      
         
          $param = array("pageid"=>$_POST['rowid'],"pagetitle"=>$_POST['pagetitle'],"pagedescription"=>str_replace("'","\\'",$_POST['pagedescription']),"ispublish"=>$_POST['ispublish']);
              $param['ishomepage']=0;   
              
             if ($obj->isEmptyField($_POST['pagetitle'])) {
                 echo $obj->printError("Page Title Shouldn't be blank");
             }
                
             if ( (isset($_FILES["filepath"]["tmp_name"])) && (strlen(trim($_FILES["filepath"]["tmp_name"]))>0)) {
         
                $obj->fileUpload($_FILES['filepath'],"../../assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename"]); 
             }   
                 
             if ($obj->err==0) {  
                echo (JPages::updatePage($param)>0) ? $obj->printSuccess("News Updated  Successfully") : $obj->printError("Error Updating News");
             }else {        
                echo $obj->printErrors();
             }  
        
         $_POST{"editbtn"}="editbtn";       
      
     } 

      if (isset($_POST{"editbtn"})){
       $pageContent = JPages::getNews($_POST['rowid']);
       
       ?>
       
<script src="<?php echo BaseUrl;?>assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
<style>
    table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
    textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
    <div class="titleBar">Edit News</div> 
    <form action="" method="post" style="height: 20px;"  enctype="multipart/form-data">
    <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['pageid'];?>">
        <table cellpadding="5" cellspacing="0" align="center">
            <tr>
                <td style="width:60px">Page Title</td> 
                <td><input type="text" name="pagetitle" style="width:100%;" value="<?php echo $pageContent[0]['pagetitle'];?>"><br></td> 
            </tr>
            <tr>
                <td colspan="2"><textarea name="pagedescription" style="height: 350px;width:100%"><?php echo $pageContent[0]['pagedescription'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="font-size:12px;"><b>Thumb Image:</b></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">
                                <?php if (strlen(trim($pageContent[0]['filepath']))>0) {?> 
                                    <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath'];?>" align="left" style="margin:5px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"><br>
                                <?php }?>
                            </td>
                            <td rowspan="2"> 
                                Is Publish?  <select name="ispublish"><option value='1' <?php echo ($pageContent[0]["ispublish"]) ? 'selected="selected"' : '';?>>Yes</option><option value='0' <?php echo ($pageContent[0]["ispublish"]!=1) ? 'selected="selected"' : '';?>>No</option></select><br>
                                No.of Visit: <?php echo $pageContent[0]['noofvisit'];?><br>
                                PostedOn:<?php echo $pageContent[0]['postedon'];?>  
                            </td>
                       </tr>
                       <tr>
                            <td><input type="submit" value="Remove Image" name="rmimage" id="rmimage">&nbsp;&nbsp;<input type="file" class="input" name="filepath"/></td>                        
                       </tr>
                    </table>
                </td>  
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatebtn" value="Update" bgcolor="grey">
                <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewnews_s.php'"> 
                </td>
            </tr>
        </table>
    </form>
     <script>$('#success').hide(3000);</script>
       <?php
       exit;
      }
      
     
      if (isset($_POST{"viewbtn"})){
            $pageContent = JPages::getNews($_POST['rowid']);
       
       ?>
       
       <div class="titleBar">View News</div> 
       <table  style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Page Title</td> 
            <td><?php echo $pageContent[0]['pagetitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Page Description</td>
            <td style="text-align:justify;font-family:arial;font-size:12px;">
              <?php if (strlen(trim($pageContent[0]['filepath']))>0) {?> 
                <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath'];?>" align="right" style="margin:5px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                <?php } ?> 
                <?php echo $pageContent[0]['pagedescription'];?>
            </td>
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>  
            <td> <?php if ($pageContent[0]["ispublish"]==1) {?>
                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td style="width:100px">PostedOn</td>
            <td><?php echo $pageContent[0]['postedon'];?></td>
        </tr>
        <tr>
            <td style="width:100px">Last Modified</td>
            <td><?php echo $pageContent[0]['lastmodified'];?></td>
        </tr>
        
       </table>
                <form action='viewnews.php' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $pageContent[0]['pageid'];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewnews_s.php'"> 
                </form>
                
        
       <?php
       exit;
      }
      if(isset($_POST{"cdeletebtn"})){
          
       $pageContent = JPages::deletePage($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       echo "<script>setTimeout(\"window.open('viewnews_s.php','rpanel')\",1500);</script>";
      }
      if (isset($_POST{"deletebtn"})){

       $pageContent = JPages::getNews($_POST['rowid']);
       
       ?>
       <div class="titleBar">Delete News</div> 
       <form action='' method="post">
       <table  style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
       
        <tr> 
            <td style="width:150px">Page Title</td>
            <td><?php echo $pageContent[0]['pagetitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Page Description</td>
            <td style="text-align:justify;font-family:arial;font-size:12px;">
              <?php if (strlen(trim($pageContent[0]['filepath']))>0) {?> 
                <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath'];?>" align="right" style="margin:5px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                <?php } ?> 
                <?php echo $pageContent[0]['pagedescription'];?>
            </td>
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>  
            <td> <?php if ($pageContent[0]["ispublish"]==1) {?>
                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td style="width:100px">PostedOn</td>
            <td><?php echo $pageContent[0]['postedon'];?></td>
        </tr>
        <tr>
            <td style="width:100px">Last Modified</td>
            <td><?php echo $pageContent[0]['lastmodified'];?></td>
        </tr>
       
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['pageid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewnews_s.php'"> 
         </form>
       <?php } ?>
       <script>$('#success').hide(3000);</script> 
