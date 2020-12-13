<h3 style="font-family:arial">New Bid Based Auction</h3>
<?php

    include_once("config.php");                               
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"../productimages/" .$filename)) ) {
     
            $array = array("itemcategoryid"=>"1",
                           "itemsubcategoryid"=>"1",
                           "itemname"=>strtoupper($_POST['itemname']), 
                          "bidamount"=>$_POST['bidamount'],
                          "starts"=>"0000-00-00 00:00:00",
                          "endon"=>"0000-00-00 00:00:00",
                          "productimage"=>$filename,
                          "price"=>$_POST['price'],
                          "lastsold"=>"0",
                          "auctiontype"=>"bba",
                          "totalbids"=>$_POST['totalbids'],
                          "posted"=>date("Y-m-d H:i:s"),
                          "description"=>$_POST['description']
                          );
                          
                          $mysql->insert("_items",$array);
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
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="itemname"></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td>Rs. <input type="text" name="price"></td>
        </tr>
        <tr>
            <td>Amount Per Bid</td>
            <td>Rs. <input type="text" name="bidamount"></td>
        </tr>
                <tr>
            <td>Total Bids</td>
            <td><input type="text" name="totalbids"></td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td>Contents</td>
            <td><textarea  name="description" style="width:650px;height:400px;"><?php echo $post[0]['description'];?></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="Add Product" name="isSubmit"></td>
        </tr>
    </table>
</form>