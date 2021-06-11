<?php 
include_once("../../config.php");
    
    $obj = new CommonController();
    
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }  
  
    if (isset($_POST{"save"})) {
        
        $param = array();   
        $home_pagedata = $mysql->select("select * from _tbl_homepage where ID=1");             
        if ( (isset($_FILES["LiveStreamImage"]["tmp_name"])) && (strlen(trim($_FILES["LiveStreamImage"]["tmp_name"]))>0)) { 
            
            if (in_array($_FILES["LiveStreamImage"]["type"],$imageArray)) {
                
                if ($_FILES["LiveStreamImage"]["size"]<=$imgMaxSize) {
                    $filename = $obj->formatFileName(basename($_FILES['LiveStreamImage']['name']));
                    (move_uploaded_file($_FILES['LiveStreamImage']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($home_pagedata[0]["LiveStreamImage"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                } else {
                    echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                }                                            
                    
            } else {
                echo $obj->printError("File Format Not Support");     
            } 

        }
        if ( (isset($_FILES["MassBookingImage"]["tmp_name"])) && (strlen(trim($_FILES["MassBookingImage"]["tmp_name"]))>0)) { 
            
            if (in_array($_FILES["MassBookingImage"]["type"],$imageArray)) {
                
                if ($_FILES["MassBookingImage"]["size"]<=$imgMaxSize) {
                    $filename = $obj->formatFileName(basename($_FILES['MassBookingImage']['name']));
                    (move_uploaded_file($_FILES['MassBookingImage']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($home_pagedata[0]["MassBookingImage"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                } else {
                    echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                }                                            
                    
            } else {
                echo $obj->printError("File Format Not Support");     
            } 

        }
        
        
             if ( (isset($_FILES["PietaImage"]["tmp_name"])) && (strlen(trim($_FILES["PietaImage"]["tmp_name"]))>0)) { 
            
            if (in_array($_FILES["PietaImage"]["type"],$imageArray)) {
                
                if ($_FILES["PietaImage"]["size"]<=$imgMaxSize) {
                    $filename = $obj->formatFileName(basename($_FILES['PietaImage']['name']));
                    (move_uploaded_file($_FILES['PietaImage']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($home_pagedata[0]["PietaImage"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                } else {
                    echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                }                                            
                    
            } else {
                echo $obj->printError("File Format Not Support");     
            } 

        }
        
         if ( (isset($_FILES["DonationImage"]["tmp_name"])) && (strlen(trim($_FILES["DonationImage"]["tmp_name"]))>0)) { 
            
            if (in_array($_FILES["DonationImage"]["type"],$imageArray)) {
                
                if ($_FILES["DonationImage"]["size"]<=$imgMaxSize) {
                    $filename = $obj->formatFileName(basename($_FILES['DonationImage']['name']));
                    (move_uploaded_file($_FILES['DonationImage']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($home_pagedata[0]["DonationImage"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                } else {
                    echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                }                                            
                    
            } else {
                echo $obj->printError("File Format Not Support");     
            } 

        }
        
        
          if ( (isset($_FILES["PriestPhoto"]["tmp_name"])) && (strlen(trim($_FILES["PriestPhoto"]["tmp_name"]))>0)) { 
            
            if (in_array($_FILES["PriestPhoto"]["type"],$imageArray)) {
                
                if ($_FILES["PriestPhoto"]["size"]<=$imgMaxSize) {
                    $filename = $obj->formatFileName(basename($_FILES['PriestPhoto']['name']));
                    (move_uploaded_file($_FILES['PriestPhoto']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($home_pagedata[0]["PriestPhoto"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                } else {
                    echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                }                                            
                    
            } else {
                echo $obj->printError("File Format Not Support");     
            } 

        }
        
          
          if ( (isset($_FILES["bishopPhoto"]["tmp_name"])) && (strlen(trim($_FILES["bishopPhoto"]["tmp_name"]))>0)) { 
            
            if (in_array($_FILES["bishopPhoto"]["type"],$imageArray)) {
                
                if ($_FILES["bishopPhoto"]["size"]<=$imgMaxSize) {
                    $filename = $obj->formatFileName(basename($_FILES['bishopPhoto']['name']));
                    (move_uploaded_file($_FILES['bishopPhoto']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($home_pagedata[0]["bishopPhoto"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                } else {
                    echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                }                                            
                    
            } else {
                echo $obj->printError("File Format Not Support");     
            } 

        }
        
        function parseContent($content) {
             $return = str_replace("'","\'",$content);
             $return = str_replace('"','\"',$return);
             return $return;
        }    
      
             
        if ($obj->err==0) {
            $id =  $mysql->execute("update _tbl_homepage set HomePageMainContent_English='".parseContent($_POST['HomePageMainContent_English'])."',
                                                             HomePageMainContent_Tamil='".parseContent($_POST['HomePageMainContent_Tamil'])."', 
                                                             HomePageMainContent_Malayalam='".parseContent($_POST['HomePageMainContent_Malayalam'])."', 
                                                             
                                                             LiveStreamImage='".$home_pagedata[0]["LiveStreamImage"]."', 
                                                             LiveStreamUrl='".$_POST['LiveStreamUrl']."', 
                                                             
                                                             MassBookingImage='".$home_pagedata[0]["MassBookingImage"]."',
                                                             MassBookingUrl='".$_POST['MassBookingUrl']."', 
                                                             
                                                             PietaImage='".$home_pagedata[0]["PietaImage"]."',
                                                             PietaUrl='".$_POST['PietaUrl']."',  
                                                             
                                                             DonationImage='".$home_pagedata[0]["DonationImage"]."',
                                                             DonationURL='".$_POST['DonationURL']."', 
                                                             
                                                             PriestPhoto='".$home_pagedata[0]["PriestPhoto"]."',
                                                             PriestName='".$_POST['PriestName']."',  
                                                            
                                                             bishopPhoto='".$home_pagedata[0]['bishopPhoto']."',  
                                                             bishopName='".$_POST['bishopName']."',  
                                                             
                                                             Aboutbishop_Tamil='".parseContent($_POST['Aboutbishop_Tamil'])."',  
                                                             Aboutbishop_English='".parseContent($_POST['Aboutbishop_English'])."',  
                                                             Aboutbishop_Malayalam='".parseContent($_POST['Aboutbishop_Malayalam'])."',  
                                                             
                                                             PageContent_Tamil='".parseContent($_POST['PageContent_Tamil'])."',  
                                                             PageContent_English='".parseContent($_POST['PageContent_English'])."',  
                                                             PageContent_Malayalam='".parseContent($_POST['PageContent_Malayalam'])."'     
            
            
            
            where ID=1"); 
            echo $obj->printSuccess("homepage updated successfully");
         //   echo (JPages::addPage($param)>0) ? $obj->printSuccess("Page added successfully") : $obj->printError("Error adding Page");
        //    unset($_POST); 
      } else {
          
      }
    
    }
?>
 <?php
            $home_pagedata = $mysql->select("select * from _tbl_homepage where ID=1");
        ?>
<script src="./../../assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
<body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>New Page</div>
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
          
            <tr>
                <td colspan="4">
                For English
                <textarea name="HomePageMainContent_English" style="height: 350px;width:100%"><?php echo $home_pagedata[0]['HomePageMainContent_English'];?></textarea></td>
            </tr>
             <tr>
                <td colspan="4">
                For Tamil
                <textarea name="HomePageMainContent_Tamil" style="height: 350px;width:100%"><?php echo $home_pagedata[0]['HomePageMainContent_Tamil'];?></textarea></td>
            </tr>
             <tr>
                <td colspan="4">
                For Malayalam
                <textarea name="HomePageMainContent_Malayalam" style="height: 350px;width:100%"><?php echo $home_pagedata[0]['HomePageMainContent_Malayalam'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="4"><bR><br></td>
            </tr>
             <tr>
                <td style="background:#ccc;font-weight:Bold;text-align:center;">Live Stream</td>
                <td style="background:#f1f1f1;font-weight:Bold;text-align:center;">Mass Booking</td>
                 <td style="background:#ccc;font-weight:Bold;text-align:center;">Pieta Shopping</td>
                 <td style="background:#f1f1f1;font-weight:Bold;text-align:center;">Donation</td>
            </tr>
            <tr>
                <td>
                    <img src="../../assets/cms/<?php echo $home_pagedata[0]['LiveStreamImage'];?>" style="height:150px"/>
                    <input type="file" class="input" size="30" name="LiveStreamImage"/><br>
                    Link<br>
                    <input type="text" name="LiveStreamUrl" value="<?php echo $home_pagedata[0]['LiveStreamUrl'];?>">
                </td>
                 <td>
                    <img src="../../assets/cms/<?php echo $home_pagedata[0]['MassBookingImage'];?>" style="height:150px"/>
                    <input type="file" class="input" size="30" name="MassBookingImage"/><br>
                    Link<br>
                    <input type="text" name="MassBookingUrl" value="<?php echo $home_pagedata[0]['MassBookingUrl'];?>">
                </td>
                 <td>
                    <img src="../../assets/cms/<?php echo $home_pagedata[0]['PietaImage'];?>" style="height:150px"/>
                    <input type="file" class="input" size="30" name="PietaImage"/><br>
                    Link<br>
                    <input type="text" name="PietaUrl" value="<?php echo $home_pagedata[0]['PietaUrl'];?>">
                </td> 
                <td>    
                    <img src="../../assets/cms/<?php echo $home_pagedata[0]['DonationImage'];?>" style="height:150px"/>
                    <input type="file" class="input" size="30" name="DonationImage"/><br>
                    Link<br>
                    <input type="text" name="" value="<?php echo $home_pagedata[0]['DonationURL'];?>">
                </td>
            </tr>
               <tr>
                <td style="background:#ccc;font-weight:Bold;text-align:center;">Priest's Photo</td>
                 
            </tr>
             <tr>
                <td>
                      <img src="../../assets/cms/<?php echo $home_pagedata[0]['PriestPhoto'];?>" style="height:150px"/>
                    <input type="file" class="input" size="30" name="PriestPhoto"/><br>
                    Priesst's Name<br>
                    <input type="text" name="PriestName" value="<?php echo $home_pagedata[0]['PriestName'];?>">
                </td>
                
                <td>
                      <img src="../../assets/cms/<?php echo $home_pagedata[0]['bishopPhoto'];?>" style="height:150px"/>
                    <input type="file" class="input" size="30" name="bishopPhoto"/><br>
                    bishop's Name<br>
                    <input type="text" name="bishopName" value="<?php echo $home_pagedata[0]['bishopName'];?>">
                    <br>
                   
                </td>
                <td colspan="2">
                 About bishop English<br>
                 <input type="text" name="Aboutbishop_English" value="<?php echo $home_pagedata[0]['Aboutbishop_English'];?>" style="width:100%;"><br>
                  About bishop Tamil<br>
                 <input type="text" name="Aboutbishop_Tamil" value="<?php echo $home_pagedata[0]['Aboutbishop_Tamil'];?>" style="width:100%;"><br>
                   About bishop Malayalam<br>
                 <input type="text" name="Aboutbishop_Malayalam" value="<?php echo $home_pagedata[0]['Aboutbishop_Malayalam'];?>" style="width:100%;">
                </td>
             </tr>
             <tr>
                <td colspan="4">
               Page Content For English
                <textarea name="PageContent_English" style="height: 350px;width:100%"><?php echo $home_pagedata[0]['PageContent_English'];?></textarea></td>
            </tr>
             <tr>
                <td colspan="4">
                Page Content For Tamil
                <textarea name="PageContent_Tamil" style="height: 350px;width:100%"><?php echo $home_pagedata[0]['PageContent_Tamil'];?></textarea></td>
            </tr>
             <tr>
                <td colspan="4">
                Page Content For Malayalam
                <textarea name="PageContent_Malayalam" style="height: 350px;width:100%"><?php echo $home_pagedata[0]['PageContent_Malayalam'];?></textarea></td>
            </tr>
            <tr>
                <td colspan="4"><bR><br></td>
            </tr>
            <tr>
            <td>
               <input type="submit" name="save" value="Save" bgcolor="grey"> 
            </td>
            </tr>
        </table>
    </form>
</body>
