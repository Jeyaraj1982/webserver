

 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">


<h5 style="text-align: left;font-family: arial;">Edit TESTIMONIALS</h5> 

<?php


       if (isset($_POST['isDelete'])) {
           $mysql->execute("delete from _tbltestimonials where md5(id)='".$_REQUEST['item']."'");
           ?>
           <script>
           alert("Deleted successfully");
           location.href='testimonials';</script>
             <?php
             exit;
       }
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
       
       
                          $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);
            
                                    
            
        $sql = "update _tbltestimonials set IsPublish='".$_POST['IsPublish']."', testimonials='".$content."', test_name='".strtoupper($_POST['itemname'])."' ";
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"assets/testimonials/".$filename)) ) {
            
            $sql .= ", photopath='".$filename."' ";  
                     
         } else {
            
              
         }  
         
         $sql .= " where md5(id)='".$_REQUEST['item']."'"; 
                
              $mysql->execute($sql);
              echo "Successfully Updated";
            
            
                          
                       
       
               
    }
        $item =  $mysql->select("select * from _tbltestimonials where md5(id)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
            <script type="text/javascript">
             /*   tinyMCE.init({
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
                });  */
            </script>
<form action="testimonials_edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="itemname" value="<?php echo $item['test_name'];?>" class="form-control" style="width:100%"></td>
        </tr>
         
        <tr>
            <td>Product Image</td>
            <td>
            <img src="assets/testimonials/<?php echo $item['photopath']; ?>" style="height:85px !important"><br>
            <input type="file" name="file"  class="form-control"></td>
        </tr> 
        <tr>
            <td>Is Publish</td>
            <td>
                <select name="IsPublish"  class="form-control">
                    <option value="1"  <?php echo $item['IsPublish']==1 ? " selected='selected' " : ""; ?> >Yes</option>
                    <option value="0" <?php echo $item['IsPublish']==0 ? " selected='selected' " : ""; ?> >No</option>
                </select>
            </td>
        </tr>
        
                          <tr>
            
            <td colspan="2"><textarea   class="form-control" name="description" style="width:100%;height:100px;"><?php echo $item['testimonials'];?></textarea></td>
        </tr>                                      
        <tr>
            <td colspan="2"><input type="submit" value="Update Testimonial" name="isSubmit" class="btn btn-primary">
         <!--   <input type="button"  onclick="window.open('testimonials.php','rightW');window.close('GoogleWindow')" value=" Close "> -->
            <input type="submit" name="isDelete"  value=" Delete "  class="btn btn-danger">
            </td>                
        </tr>
    </table>
</form>

</div>
</div>
</div>
               </div>
              

   
    </div>
</div>
