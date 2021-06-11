<?php 
include_once("../../config.php");
    $obj = new CommonController();
        
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    } 
  
    if (isset($_POST{"save"})) {
        
            if ($obj->isEmptyField($_POST['videotitle'])) {
                echo $obj->printError("Video Title Shouldn't be blank");
            }
    
            $param = array("videotitle"=>$_POST['videotitle'],"videodescription"=>$_POST['videodescription'],"videourl"=>$_POST['videourl']);
            
            if ($obj->err==0) {
            echo (JVideos::addVideos($param)>0) ? $obj->printSuccess("New Videos Added Successfully") : $obj->printError("Error Adding New Videos");
            unset($_POST); 
            } 
    } 
   
?>

<script src="./../../assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>

<body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>New Videos</div> 
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
            <tr>
                <td style="width:60px">Video Title</td> 
                <td><input type="text" name="videotitle" style="width:100%;"></td> 
            </tr>
            <tr>
                <td colspan="2"><textarea name="videodescription" style="height: 350px;width:100%"></textarea></td>
            </tr>
            <tr>
                <td style="width:60px">Video Url:</td>
                <td>
                    http://www.youtube.com/watch?v=<input type="text" name="videourl" style="width:80%;"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="save" value="Save" bgcolor="grey"> 
                </td>
            </tr>
        </table>
    </form>
</body>

