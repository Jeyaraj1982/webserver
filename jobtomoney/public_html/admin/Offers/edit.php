

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


<h5 style="text-align: left;font-family: arial;">Edit Offer</h5> 

 
<?php
 

       if (isset($_POST['isDelete'])) {
           $mysql->execute("delete from _tbl_offers where md5(id)='".$_REQUEST['item']."'");
           ?>
           <script>
           alert("Deleted Successfully");
           location.href='Offer_List';
           </script>
       <?php
             exit;
       }
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
        
        
             $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);                     
            
        $sql = "update _tbl_offers set   productname='".$_POST['ProductName']."', points='".$_POST['Points']."', description='".$content."'  ";
        
        if ((move_uploaded_file($_FILES["file"]["tmp_name"],"assets/offers/".$filename)) ) {
            
            $sql .= ", photopath='".$filename."' ";  
        }
        
         
         
         
         $sql .= " where md5(id)='".$_REQUEST['item']."'"; 
                
              $mysql->execute($sql);
              echo "Successfully Updated";
            
            
                          
                       
       
               
    }
        $item =  $mysql->select("select * from _tbl_offers where md5(id)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
 
<form action="Offer_Edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Person Name</td>
            <td><input type="text" name="ProductName" value="<?php echo $item['productname'];?>"  required  class="form-control"  style="width:100%"></td>
        </tr>
         <tr>
            <td>Points</td>
            <td><input type="text" name="Points" value="<?php echo $item['points'];?>" required  class="form-control"  style="width:100%"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo $item['description'];?>" required  class="form-control"  style="width:100%"></td>
        </tr>
         
        <tr>
            <td>User Image</td>
            <td>
            <img src="assets/offers/<?php echo $item['photopath']; ?>" style="height:100px"><br>
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
            <td colspan="2"><input type="submit" value="Update Points" name="isSubmit" class="btn btn-primary">
           <!-- <input type="button"  onclick="window.open('winners.php','rightW');window.close('GoogleWindow')" value=" Close "> -->
            <input type="submit" name="isDelete"  value=" Delete " class="btn btn-danger">
            </td>                
        </tr>
    </table>
</form>


<div>
    <h3>Requested</h3>
    <?php 
    $data =   $mysql->select("select * from _tbl_offers_requested where where md5(OfferID)='".$_REQUEST['item']."'"); 
    ?>
    <table>
        <tr>
            <td>Requested on</td>
            <td>User id</td>
            <td>Points</td>
        </tr>
        <?php foreach($data as $d) {?>
           <tr>
            <td><?php echo $d['RequestedOn'];?></td>
            <td><?php echo $d['userid'];?></td>
            <td><?php echo $d['points'];?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</div>
</div>
</div>
               </div>
              

   
    </div>
</div>

 