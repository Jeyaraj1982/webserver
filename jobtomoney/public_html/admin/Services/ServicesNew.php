

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


<h5 style="text-align: left;font-family: arial;">Add Service</h5> 

 
<?php

    include_once("config.php");                               
    
    if (isset($_POST['isSubmit'])) {
    
        $filename  = strtolower(time()."_".$_FILES["file3"]["name"]);
        //$filename1  = strtolower(time()."_".$_FILES["file1"]["name"]);
        if ( (move_uploaded_file($_FILES["file3"]["tmp_name"],"assets/services/" .$filename)) ) {
     
                  
                          $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);
            
            $array = array("ServiceName"=>strtoupper($_POST['ServiceName']), 
                           "Description"=>$_POST['Description'],
                           "photopath"=>$filename,
                           "addeddate"=>date("Y-m-d H:i:s"));
                          
                            $mysql->insert("_tblservices",$array);
                                echo "<div style='color:green'>Successfully Added</div>";     
     
        } else {
            
            echo "<div style='color:red'>Error Adding Services. Please choose file</div>";
            
        }
         
    }
?>    
<form action="" method="post" enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Service Name</td>
            <td><input type="text" name="ServiceName"  class="form-control" style="width:100%"></td>
        </tr>
       <tr>
            <td>Service Description</td>
            <td><input type="text" name="Description"  class="form-control"  style="width:100%"></td>
        </tr>
             <tr>
            <td>Image</td>
            <td><input type="file" name="file3"  class="form-control" ></td>
        </tr>           
         
        <tr>
            <td colspan="2"><input type="submit" value="Add Service" name="isSubmit" class="btn btn-primary"></td>
        </tr>
    </table>
</form>

</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 