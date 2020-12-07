

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


<h5 style="text-align: left;font-family: arial;">Add Offers</h5> 

 
<?php

    include_once("config.php");                               
    
    if (isset($_POST['isSubmit'])) {
    
        $filename  = strtolower(time()."_".$_FILES["file"]["name"]);
       
       
        if ( (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/offers/" .$filename)) 
            
               
              ) {
     
                  
                          $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);
            
            $array = array("productname"=>strtoupper($_POST['ProductName']), 
                           "photopath"=>$filename,
                           "points"=>$_POST['Points'],
                           "description"=>$content);
                          
                            $mysql->insert("_tbl_offers",$array);
                                echo "<div style='color:green'>Successfully Added</div>";     
     
        } else {
            
            echo "<div style='color:red'>Error Adding Earner. Please choose file</div>";
            
        }
         
    }
?>
 
<form action="" method="post" enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Product Name</td>
            <td><input type="text" class="form-control" required name="ProductName" style="border:1px solid #ccc;width:100%"></td>
        </tr>
       <tr>
            <td>Points</td>
            <td><input type="text" name="Points" required  class="form-control"  style="width:100%"></td>
        </tr> <tr>
            <td>Description</td>
            <td><input type="text" name="description" required  class="form-control"  style="width:100%"></td>
        </tr>
             <tr>
            <td>Product Photo</td>
            <td><input type="file" name="file"  class="form-control" ></td>
        </tr>           
        <tr>
            <td colspan="2"><input type="submit" value="Add Offer" name="isSubmit" class="btn btn-primary"></td>
        </tr>
    </table>
</form>

</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 