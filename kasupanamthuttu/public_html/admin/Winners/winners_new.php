

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


<h5 style="text-align: left;font-family: arial;">Add Winner</h5> 

 
<?php

    include_once("config.php");                               
    
    if (isset($_POST['isSubmit'])) {
    
        $filename  = strtolower(time()."_".$_FILES["file"]["name"]);
        //$filename1  = strtolower(time()."_".$_FILES["file1"]["name"]);
        $filename2  = strtolower(time()."_".$_FILES["file3"]["name"]);
           // && (move_uploaded_file($_FILES["file1"]["tmp_name"],"assets/winners/" .$filename1))
        if ( (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/winners/" .$filename)) 
            
             && (move_uploaded_file($_FILES["file3"]["tmp_name"],"assets/winners/" .$filename2))   
              ) {
     
                  
                          $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);
            
            $array = array("test_name"=>strtoupper($_POST['itemname']), 
                           "productname"=>$_POST['productname'],
                           "photopath"=>$filename,
                           "courierpath"=>"",
                           "ProductPhoto"=>$filename2,
                           "date"=>date("Y-m-d H:i:s"),
                           "testimonials"=>$content);
                          
                            $mysql->insert("_tblwinners",$array);
                                echo "<div style='color:green'>Successfully Added</div>";     
     
        } else {
            
            echo "<div style='color:red'>Error Adding Testimonial. Please choose file</div>";
            
        }
         
    }
?>
  <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
            <script type="text/javascript">
            /*    tinyMCE.init({
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
                }); */
            </script>
<form action="" method="post" enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td> Name</td>
            <td><input type="text" name="itemname" style="border:1px solid #ccc;width:100%"></td>
        </tr>
       <tr>
            <td> Product Name</td>
            <td><input type="text" name="productname"  class="form-control"  style="width:100%"></td>
        </tr>
             <tr>
            <td>Product Photo</td>
            <td><input type="file" name="file3"  class="form-control" ></td>
        </tr>           
        <tr>
            <td>User Photo</td>
            <td><input type="file" name="file"  class="form-control" ></td>
        </tr>
     <!--   <tr>
            <td>Proof Copy</td>
            <td><input type="file" name="file1"></td>
        </tr>  -->
         
          <tr>
             
            <td colspan="2"><textarea  name="description" class="form-control" style="width:100%;height:100px;"><?php echo $post[0]['description'];?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add Winner" name="isSubmit" class="btn btn-primary"></td>
        </tr>
    </table>
</form>

</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 