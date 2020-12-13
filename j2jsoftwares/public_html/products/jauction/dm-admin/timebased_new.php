<h3 style="font-family:arial">Add New <?php echo $_REQUEST['list'];?> Products</h3>
<?php
    include_once("config.php");                               
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"../productimages/" .$filename)) ) {
     
             
            $mysql->insert("_items",array("itemcategoryid"     => "1",
                                          "itemsubcategoryid"  => "1",
                                          "itemname"           => strtoupper($_POST['itemname']), 
                                          "bidamount"          => $_POST['bidamount'],
                                          "starts"             => $_POST['starts_year']."-".$_POST['starts_month']."-".$_POST['starts_date']." ".$_POST['starts_hour'].":".$_POST['starts_minute'].":".$_POST['starts_second'],
                                          "endon"              => $_POST['ends_year']."-".$_POST['ends_month']."-".$_POST['ends_date']." ".$_POST['ends_hour'].":".$_POST['ends_minute'].":".$_POST['ends_second'],
                                          "productimage"       => $filename,
                                          "price"              => $_POST['price'],
                                          "lastsold"           => "0",
                                          "auctiontype"        => "tba",
                                          "totalbids"          => "0",
                                          "productfrom"        => $_REQUEST['list'],
                                          "posted"             => date("Y-m-d H:i:s"),
                                          "description"        => $_POST['description']));
            echo "Successfully Added";    
     
        } else {
            echo "Error Adding Product. Please try again";
        }
    }
?>
    <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode : "textareas",
            theme : "advanced",
            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            content_css : "css/content.css",
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",
            style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],
            template_replace_values : {username : "Some User",staffid : "991234"}
        });
    </script>
<form action="" method="post" enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;width:100%;" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td width="100">Location</td>
            <td>
            <?php if ($_REQUEST['list']=="India") {?>
            <img src="../images/india_flag_icon.png" style="height:16px" align="absmiddle">
            <?php } else {?>
            <img src="../images/malaysian.gif" style="height:16px" align="absmiddle">
            <?php } ?>
            <?php echo $_REQUEST['list'];?></td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="itemname" style="width:100%;border:1px solid #999" autocomplete="Off"></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td>
             <?php if ($_REQUEST['list']=="India") {?>
            RS.
            <?php } else {?>
            RM.
            <?php } ?> 
             <input type="text" name="price" style="border:1px solid #999;text-align:right" autocomplete="Off"></td>
        </tr>
        <tr>
            <td>Auction Start</td>
            <td>
                <select name="starts_date" style="border:1px solid #999">
                <?php for($i=1;$i<=31;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
                </select >
                
                <select name="starts_month" style="border:1px solid #999">
                <?php for($i=1;$i<=12;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $month[$i];?></option>
                <?php } ?>
                </select>
            
                <select  name="starts_year" style="border:1px solid #999">
                <?php for($i=YEAR_FROM;$i<=YEAR_TO;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
                </select>&nbsp;
                
                <select name="starts_hour" style="border:1px solid #999">
                <?php for($i=0;$i<=23;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo (strlen($i)==1) ? "0".$i : $i ;?></option>
                <?php } ?>
                </select >
                
                <select name="starts_minute" style="border:1px solid #999">
                <?php for($i=0;$i<=59;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo (strlen($i)==1) ? "0".$i : $i ;?></option>
                <?php } ?>
                </select >
            
                <select name="starts_second" style="border:1px solid #999">
                    <option value="00">00</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Auction Ends</td>
            <td>
                <select name="ends_date" style="border:1px solid #999">
                <?php for($i=1;$i<=31;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
                </select >
                
                <select name="ends_month" style="border:1px solid #999">
                <?php for($i=1;$i<=12;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $month[$i];?></option>
                <?php } ?>
                </select>
                
                <select  name="ends_year" style="border:1px solid #999">
                <?php for($i=YEAR_FROM;$i<=YEAR_TO;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
                </select>&nbsp;
                
                <select name="ends_hour" style="border:1px solid #999">
                <?php for($i=0;$i<=23;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo (strlen($i)==1) ? "0".$i : $i ;?></option>
                <?php } ?>
                </select >
                
                <select name="ends_minute" style="border:1px solid #999">
                <?php for($i=0;$i<=59;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo (strlen($i)==1) ? "0".$i : $i ;?></option>
                <?php } ?>
                </select >
                
                <select name="ends_second" style="border:1px solid #999">
                    <option value="00">00</option>
                </select >
            </td>
        </tr>
        <tr>
            <td>Amount Per Bid</td>
            <td>
              <?php if ($_REQUEST['list']=="India") {?>
            RS.
            <?php } else {?>
            RM.
            <?php } ?> 
            <input type="text" name="bidamount" style="border:1px solid #999;text-align:right" autocomplete="Off"></td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td><input type="file" name="file"></td>
        </tr>
          <tr>
          
            <td colspan="2"><textarea  name="description" style="width:100%;height:400px;"><?php echo $post[0]['description'];?></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="Add Product" name="isSubmit"></td>
        </tr>
    </table>
</form>