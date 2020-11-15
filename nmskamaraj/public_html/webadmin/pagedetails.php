<h2>Page Details</h2>
<?php
    if (isset($_POST['BtnUpdate'])) {
    
        $target_path = "../images/";
        $filename = time().strtolower($_FILES['uploadedfile']['name']);
        $target_path = $target_path . basename($filename); 

        if (isset($_FILES['uploadedfile']['tmp_name'])) {                                       
        
            if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                $mysql->execute("update  pages set pageimage='".$filename."'  where pageref='".$_REQUEST['id']."'");
                
            }
        }
        
        $mysql->execute("update pages set pagecontent='".$_POST['pagecontent']."',pagetitle='".$_POST['pagetitle']."' where pageref='".$_REQUEST['id']."'");
        echo "<div class='success'>Updatd Successfully</div>";
    }
?>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
   <script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
 
<?php $pageinformation = $mysql->select("select * from pages where pageref='".$_REQUEST['id']."'"); ?>
<br>
<form action="" method="post"  enctype="multipart/form-data">
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Page Title</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="text" name="pagetitle" value="<?php echo $pageinformation[0]['pagetitle'];?>" style="width:100%"></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;vertical-align: top;">Comments</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">
        
        <textarea  style="height:300px;width:100%" name="pagecontent"><?php echo $pageinformation[0]['pagecontent'];?></textarea></td>
    </tr>  
    
   <!-- <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;vertical-align: top;">Thumb</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">
        <img src="../images/<?php echo $pageinformation[0]["pageimage"];?>" style="height: 150px;width:150px;"><br>
        
        <input type="file" name="uploadedfile"> </td>
    </tr> -->
    
</table>
<div style="text-align:left;padding:10px;padding-left:0px">   <input type="submit" name="BtnUpdate" value="Update"></div>
</form>
<br><Br>
<a href="dashboard.php?action=pages">Back</a>