

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


<h5 style="text-align: left;font-family: arial;">Edit Services</h5> 

 
<?php
 

       if (isset($_POST['isDelete'])) {
           $mysql->execute("delete from _tblservices where md5(ServiceID)='".$_REQUEST['item']."'");
           ?>
           <script>
           alert("Deleted Successfully");
           location.href='Service_List';
           </script>
       <?php
             exit;
       }
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
                    
            
        $sql = "update _tblservices set  ServiceName='".$_POST['ServiceName']."', Description='".$_POST['Description']."'  ";
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"assets/services/".$filename)) ) {
            
            $sql .= ", photopath='".$filename."' ";  
        }
        
        
         $sql .= " where  md5(ServiceID)='".$_REQUEST['item']."'";
                
              $mysql->execute($sql);
              echo "Successfully Updated";
            
            
                          
                       
       
               
    }
        $item =  $mysql->select("select * from _tblservices where md5(ServiceID)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
 
<form action="Service_Edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Service Name</td>
            <td><input type="text" name="ServiceName" value="<?php echo $item['ServiceName'];?>"   class="form-control"  style="width:100%"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="Description" value="<?php echo $item['Description'];?>"   class="form-control"  style="width:100%"></td>
        </tr>
         
        <tr>
            <td>Img</td>
            <td>
            <img src="assets/services/<?php echo $item['photopath']; ?>" style="height:100px"><br>
            <input type="file" name="file"  class="form-control"  ></td>
        </tr>
                                              
        <tr>
            <td colspan="2"><input type="submit" value="Update Winner" name="isSubmit" class="btn btn-primary">
            
            <input type="submit" name="isDelete"  value=" Delete " class="btn btn-danger">
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

 