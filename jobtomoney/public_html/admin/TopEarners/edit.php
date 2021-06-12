

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


<h5 style="text-align: left;font-family: arial;">Edit Top Earners</h5> 

 
<?php
 

       if (isset($_POST['isDelete'])) {
           $mysql->execute("delete from _tbl_topEarners where md5(id)='".$_REQUEST['item']."'");
           ?>
           <script>
           alert("Deleted Successfully");
           location.href='manageTopEarns';
           </script>
       <?php
             exit;
       }
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
        
        
             $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);                     
            
        $sql = "update _tbl_topEarners set   personname='".$_POST['personname']."', description='".$content."'  ";
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"assets/topearners/".$filename)) ) {
            
            $sql .= ", photopath='".$filename."' ";  
        }
        
         
         
         
         $sql .= " where md5(id)='".$_REQUEST['item']."'"; 
                
              $mysql->execute($sql);
              echo "Successfully Updated";
            
            
                          
                       
       
               
    }
        $item =  $mysql->select("select * from _tbl_topEarners where md5(id)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
 
<form action="topearners_edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Person Name</td>
            <td><input type="text" name="personname" value="<?php echo $item['personname'];?>"   class="form-control"  style="width:100%"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo $item['description'];?>"   class="form-control"  style="width:100%"></td>
        </tr>
         
        <tr>
            <td>User Image</td>
            <td>
            <img src="assets/topearners/<?php echo $item['photopath']; ?>" style="height:100px"><br>
            <input type="file" name="file"  class="form-control"  ></td>
        </tr>
      <!--  <tr>
            <td>Proof Copy</td>
            <td>
            <img src="assets/winners//<?php echo $item['courierpath']; ?>" style="height:100px"><br>
            <input type="file" name="file1" ></td>
        </tr>  -->
        
           <tr>
     
                                             
        <tr>
            <td colspan="2"><input type="submit" value="Update Earner" name="isSubmit" class="btn btn-primary">
           <!-- <input type="button"  onclick="window.open('winners.php','rightW');window.close('GoogleWindow')" value=" Close "> -->
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

 