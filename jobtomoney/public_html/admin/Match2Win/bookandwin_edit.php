
<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
        <div class="box">
            <?php include_once("rightmenu.php"); ?>
        </div>
    </div>
    <div class="s-12 m-6 l-9 margin-bottom">
        <div class="box">
            <h5 style="text-align: left;font-family: arial;">Edit Match 2 Win</h5> 

            
         
<?php
 

       if (isset($_POST['isDeleteBtnx'])) {
           //where ispublish='1'
           $sql  = "update _items set ispublish='0' where md5(itemid)='".$_GET['item']."'";
           $mysql->execute($sql);
          
        //   $mysql->execute("delete from _items where md5(itemid)='".$_REQUEST['item']."'");
           ?>
           <script>
            
           location.href='https://www.kasupanamthuttu.com/bookandwin';</script>
           Successfully Deleted <br><br>
             
             <?php
             exit;
       }
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
                          
            
        $sql = "update _items set description='".$_POST['description']."', maximumbids='".strtoupper($_POST['maximumbids'])."',secretkeyrange='".strtoupper($_POST['secretkeyrange'])."', itemname='".strtoupper($_POST['itemname'])."', bidamount='".$_POST['bidamount']."', skey='".$_POST['skey']."', price='".$_POST['price']."' ";
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"assets/products/".$filename)) ) {
            echo "D";
                 
            $sql .= ", productimage='".$filename."' ";  
                     
         } else {
            
              
         }  
         
         $sql .= " where md5(itemid)='".$_GET['item']."'"; 
                
              $mysql->execute($sql);
              echo "Successfully Updated";
            
            
                          
                       
       
               
    }
        $item =  $mysql->select("select * from _items where md5(itemid)='".$_GET['item']."'");
    $item = $item[0];
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
<form action="bookandwin_edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="itemname" value="<?php echo $item['itemname'];?>" style="width:100%;border:1px solid #999"></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td><input type="text" name="price" value="<?php echo $item['price'];?>" style="border:1px solid #999"></td>
        </tr>
        <tr>
            <td>Key</td>
            
              <td><input type="text" name="skey" value="<?php echo $item['skey'];?>" style="border:1px solid #999;width:171px" autocomplete="Off">
            Key Range
            <input type="text" name="secretkeyrange" value="<?php echo $item['secretkeyrange'];?>"  style="border:1px solid #999;width:171px" autocomplete="Off"></td>
            
            
        </tr>        
        <tr>
            <td>Amount Per Bid</td>
            <td><input type="text" name="bidamount"  value="<?php echo $item['bidamount'];?>" style="border:1px solid #999">
             Maximum Bids
            <input type="text" name="maximumbids" value="<?php echo $item['maximumbids'];?>"  style="text-align:right;border:1px solid #999" autocomplete="Off">
            
            </td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td>
            <img src="assets/products/<?php echo $item['productimage']; ?>" height="200"><br>
            <input type="file" name="file" ></td>
        </tr> 
                          <tr>
            
            <td colspan="2"><textarea  name="description" style="width:100%;height:100px;"><?php echo $item['description'];?></textarea></td>
        </tr>                                                  
        <tr>
            <td colspan="2"><input type="submit" value="Update Product" name="isSubmit" class="btn btn-primary">
            <!--<input type="button"  onclick="window.open('timebasedAuction.php','rightW');window.close('GoogleWindow')" value=" Close ">-->
            <input type="submit" name="isDeleteBtnx"  value=" Delete " class="btn btn-danger">
            </td>                
        </tr>
    </table>
</form>


</div>
</div>
</div>
</div>
