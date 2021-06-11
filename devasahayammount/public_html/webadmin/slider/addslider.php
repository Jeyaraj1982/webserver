<?php include_once("../../config.php"); ?>
<html>    
    <body style="margin:0px;">
        <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Slider</div>
        <?php  
           
            
            $obj = new CommonController();
            
            if (!($obj->isLogin())){
              echo $obj->printError("Login Session Expired. Please Login Again");
              exit;
            }

            $obj->err = 0;
            
            if (isset($_POST{"save"})) {
                
                if ($obj->isEmptyField($_POST['slidertitle'])) {
                    echo $obj->printError("Slider Title Shouldn't be blank");
                }
                
                if (isset($_FILES['filepath']['name'])) {
                        
                    if (in_array($_FILES["filepath"]["type"],$imageArray)) {
                        
                        if ($_FILES["filepath"]["size"]<=$imgMaxSize) {
                            $filename = $obj->formatFileName(basename($_FILES['filepath']['name']));
                            $param = array("slidertitle"=>$_POST['slidertitle'],"sliderdescription"=>$_POST['sliderdescription'],"filename"=>$filename,"ispublished"=>$_POST['ispublished']);
                            if (!(move_uploaded_file($_FILES['filepath']['tmp_name'],strtolower("../../assets/cms/".$filename)))) {
                                echo $obj->printError("There was an error uploading the file, please try again!");
                            }
                        } else {
                            echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                        }                                            
                        
                    } else {
                        echo $obj->printError("File Format Not Support");     
                    }
                    
                } else {
                       echo $obj->printError("Please Attach Slider Image");     
                }
                
                if ($obj->err==0) {
                    echo ( (JSlider::addSlider($param)>0) ?   $obj->printSuccess("Slider added successfully") : $obj->printError("error adding Slider") );
                    unset($_POST); 
                }
            } 
        ?>
<script src="./../../assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
        <form action="" method="post"  enctype="multipart/form-data">
            <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <td style="width:150px;">Slider Title</td>
                    <td><input type="text" name="slidertitle" size="40" style="width:100%;" value="<?php echo isset($_POST['slidertitle']) ? $_POST['slidertitle'] : ""; ?>"></td> 
                </tr>
                <tr>
                    <td colspan="2"><textarea name="sliderdescription" style="height: 350px;width:100%"><?php echo isset($_POST['sliderdescription']) ? $_POST['sliderdescription'] : ""; ?></textarea></td>
                </tr>
                <tr>
                    <td style="width:180px;height:40px;">Slider File Upload</td>
                    <td><input type="file" class="input" size="30" name="filepath"/></td>
                </tr>
                <tr>
                    <td style="width:150px;">Published</td>
                    <td><select name="ispublished"><option value="1">Yes</option><option value="0">No</option></select></td> 
                </tr>
                <tr>
                    <td align="left"><input type="submit" name="save" value="Save" bgcolor="grey"><input type="button" name="cancel" value="Cancel" bgcolor="grey" onclick="location.href='manageslider.php'"></td>
                </tr> 
            </table>
        </form>
    </body>
</html>