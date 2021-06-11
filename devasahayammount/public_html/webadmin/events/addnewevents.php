<?php 
include_once("../../config.php");
        $obj = new CommonController();
    
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
  
       if(isset($_POST{"save"})) { 
        
          if ($obj->isEmptyField($_POST['pagetitle'])) {
            echo $obj->printError("Page Title Shouldn't be blank");
          }
           $param = array("pagetitle"       => $_POST['pagetitle'],
                          "pagedescription" => str_replace("'","\\'",$_POST['pagedescription']),
                          "ispublish"       => $_POST['ispublish'],
                          "pagetype"        => 'E',
                          'eventtime'       => $_POST['datepicker']);
                       
              if((isset($_FILES["filepath"]["tmp_name"])) && (strlen(trim($_FILES["filepath"]["tmp_name"]))>0)) { 
                    if(in_array($_FILES["filepath"]["type"],$imageArray)) {
                    
                    if($_FILES["filepath"]["size"]<=$imgMaxSize) {
                        $filename = $obj->formatFileName(basename($_FILES['filepath']['name']));
                      (move_uploaded_file($_FILES['filepath']['tmp_name'],strtolower("../../assets/cms/".$filename))) ? ($param["filename"]=$filename)  : $obj->printError("There was an error uploading the file, please try again!");
                    } else {
                        echo $obj->printError("File Size should have greater ".number_format($imgMaxSize/8/1024/1024,2)." MB"); 
                    }                                            
                }else {
                        echo $obj->printError("File Format Not Support");     
                }  
             } 
             
             if ($obj->err==0) {
                  echo (JPages::addPage($param)>0) ? $obj->printSuccess("New Event added successfully") : $obj->printError("Error adding New Event");
                   
             }             
  } 
?>
<script src="./../../assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>                              
$(function() {
       $( "#datepicker" ).datepicker({showOn: 'button', buttonImage:'http://theonlytutorials.com/demo/x_office_calendar.png',width:20,height:20,buttonImageOnly: true,changeMonth: true,changeYear: true,showAnim: 'slideDown',duration: 'fast',dateFormat: 'yy-mm-dd'});
});
</script>
 <style type="text/css">
.ui-datepicker {font-size:9pt;font-family:Verdana; background-color:grey;}
.datepicker{color:black;text-decoration: none;font-size:inherit;font-size:12px;position: relative; top: 1px;}
</style>
<body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>New Events</div>
        <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
            <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
                <tr>
                    <td style="width:60px">Page Title</td> 
                    <td><input type="text" name="pagetitle" size="40" style="width:100%;"></td> 
                </tr>
                <tr>
                    <td colspan="2"><textarea name="pagedescription" style="height: 350px;width:100%"></textarea></td>
                </tr>
                <tr>
                    <td><input type="file" class="input" size="30" name="filepath"/></td>
                </tr>
                <tr>
                    <td>Event Date: <input id="datepicker" class="datepicker" type="text" size="30" name="datepicker"/></td>
                </tr>
                <tr>
                    <td>Is Publish? <select name="ispublish"><option value='1'>Publish</option><option value='0'>Unpublish</option></select>&nbsp;<input type="submit" name="save" value="Save" bgcolor="grey"> </td>
                </tr>
            </table>
        </form>
</body>
