    <?php 
     
     include_once("conf.php");
        
        if (isset($_REQUEST['isnew'])){
		    $id=$mysql->insRow("insert into _posts values (Null,'".$_POST['title']."','".$_POST['description']."','0','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','0','0','".$_POST['postedby']."','".$_POST['posttype']."','0','0','0')");    
			if ($id>0){
			    echo "Saved Successfully";  
			} else {
			    echo "Error saving your data. Try again";
			}
            exit;
        }
   ?>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <style>
    body, div, table, tr, td {font-family:arial}
    td {font-size:12px}
   </style>
   <body style="margin:0px">   <div class='ContainerTitle'>New <?php echo $array[$_REQUEST['new']];?></div>  
     
   <form action="?isnew=true" method="post">
   <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
   <script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
   <input type="hidden" name="posttype" value="<?php echo $arrayid[$_REQUEST['new']]; ?>">
   <table cellpadding="3" cellspacing="0" width="100%" >
        <tr>
            <td>Title</td>
            <td colspan="2"><input type="text" value="<?php echo $post[0]['title'];?>" name="title" style="width:850px;"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td colspan="2"><textarea  name="description" style="width:850px;height:350px;"><?php echo $post[0]['description'];?></textarea></td>
        </tr>
        <tr>
            <td>Title Thumb</td>
            <td width="200"><input type="file" value="<?php echo $post[0]['title'];?>" name="thumimage"  size="20"></td>
            <td rowspan="3" valign="top"><iframe src="fileupload.php" style="width:618px;border:1px solid #f1f1f1;"></iframe></td>
        </tr>
        <tr>
            <td>Posted From</td>
            <td>
           
            
                <Select name='postedby' id='postedby' style="width:223px">
                    <?php foreach($mysql->select("select * from _user order by id") as $usr) { ?>
                        <option value='<?php echo $usr['id'];?>'><?php echo $usr['username'];?></option>
                    <?php } ?>
                </Select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="newButton" value="Save"></td>
        </tr>
   </table>
   </form>
   </body> 