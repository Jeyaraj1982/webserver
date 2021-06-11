<?php include_once("../../config.php"); ?>
<body style="margin:0px;">

<?php 
    
    $obj = new CommonController();
        
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }

     if(isset($_POST{"updatebtn"})){
              
         $param = array("videoid"=>$_POST['rowid'],"videotitle"=>$_POST['videotitle'],"videodescription"=>$_POST['videodescription'],"videourl"=>$_POST['videourl']);
         
         if ($obj->isEmptyField($_POST['videotitle'])) {
             echo $obj->printError("Video Title Shouldn't be blank");
         }
            
         if ($obj->err==0) {
             echo (JVideos::updateVideos($param)) ? $obj->printSuccess("Videos Updated  Successfully") : $obj->printError("Error Updating Videos");
             echo "<script>setTimeout(\"window.open('viewvideos.php','rpanel')\",1500);</script>"; 
         }
     } 

      if (isset($_POST{"editbtn"})){

       $pageContent = JVideos::getVideos($_POST['rowid']);
       
       ?>
       
<script src="./../../assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>

    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Videos</div>
    <form action="" method="post" style="height: 20px;">
    <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['videoid'];?>">
        <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
            <tr>
                <td style="width:60px">Video Title</td> 
                <td><input type="text" name="videotitle" style="width:100%;" value="<?php echo $pageContent[0]['videotitle'];?>"><br></td> 
            </tr>
            <tr>
                <td colspan="2"><textarea name="videodescription" style="height: 350px;width:100%"><?php echo $pageContent[0]['videodescription'];?></textarea></td>
            </tr> 
            <tr>
                <td style="width:60px">Video Url</td> 
                <td><input type="text" name="videourl" size="40" style="width:100%;" value="<?php echo $pageContent[0]['videourl'];?>"><br></td>
            </tr>
            <tr>
            <td><iframe width="160" height="120" src="http://www.youtube.com/embed/<?php echo $pageContent[0]['videourl'];?>" frameborder="0" allowfullscreen></iframe></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatebtn" value="Update" bgcolor="grey">
                <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewvideos.php'"> 
                </td>
            </tr>
        </table>
    </form>
       <?php
       exit;
      }
      
      if (isset($_POST{"viewbtn"})){
        $pageContent = JVideos::getVideos($_POST['rowid']);
               
       ?>
       
       <div style='border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;font-family:arial;font-size:12px;'>View Videos</div>
       <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Video title</td>
            <td><?php echo $pageContent[0]['videotitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Video Description</td> 
            <td style="text-align:justify;font-family:arial;font-size:12px;">
              <?php echo $pageContent[0]['videodescription'];?>
            </td>
        </tr>
        <tr>
        <td><iframe width="160" height="120" src="http://www.youtube.com/embed/<?php echo $pageContent[0]['videourl'];?>" frameborder="0" allowfullscreen></iframe></td> 
        </tr>
        <tr>
            <td style="width:150px">Video Url</td>
            <td><?php echo $pageContent[0]['videourl'];?></td>
        </tr>
       </table>
                <form action='managevideos.php' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $pageContent[0]['videoid'];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewvideos.php'"> 
                </form>
                
        
       <?php
       exit;
      }
      if(isset($_POST{"cdeletebtn"})){
       $pageContent = JVideos::deleteVideos($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       echo "<script>setTimeout(\"window.open('viewvideos.php','rpanel')\",1500);</script>";
      }
      if (isset($_POST{"deletebtn"})){
        
       $pageContent = JVideos::getVideos($_POST['rowid']);
       
       ?>
       <div style='border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;font-family:arial;font-size:12px;'>Delete Videos</div>
       <form action='' method="post">
       <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
       
        <tr>
            <td style="width:150px">Video title</td>
            <td><?php echo $pageContent[0]['videotitle'];?></td>
        </tr>
        <tr>
            <td>Video Description</td> 
            <td><?php echo $pageContent[0]['videodescription'];?></td>
        </tr>
        <tr>
            <td><iframe width="160" height="120" src="http://www.youtube.com/embed/<?php echo $pageContent[0]['videourl'];?>" frameborder="0" allowfullscreen></iframe></td> 
        </tr>
        <tr>
            <td style="width:150px">Video Url</td>
            <td><?php echo $pageContent[0]['videourl'];?></td>
        </tr>
       
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['videoid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewvideos.php'"> 
         </form>
       <?php }              
?>
</body>
    
   
