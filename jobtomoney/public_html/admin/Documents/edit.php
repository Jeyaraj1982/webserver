

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
if (isset($_POST['xAddCus'])) {
      echo "assigned document successfully";           
                       $item =  $mysql->select("select * from _tbl_documents where md5(DocID)='".$_GET['item']."'");
                       $mysql->insert("_tbl_documents_sold",array("RequestedOn"=>date("Y-m-d H:i:s"),
                                                                       "UserID"=>$_POST['xAddCus'],
                                                                       "PaymentID"=>"0",
                                                                       "DocID"=>$item[0]['DocID']));
}
 
        if (isset($_POST['AddCus'])) {
             $email = $mysql->select("select * from _tbl_documents_user where EmailID='".trim($_POST['Cus_EmailID'])."'");
                         $register_error=0;
                         if (sizeof($email)>0) {
                             $email_error="Email ID Already Exists";
                             $register_error++;
                         }
                           $moible = $mysql->select("select * from _tbl_documents_user where MobileNumber='".trim($_POST['Cus_MobileNumber'])."'");
                          if (sizeof($moible)>0) {
                             $mobile_error="Mobile Number Already Exists";
                             $register_error++;
                         }
                         
                         if (!($_POST['Cus_MobileNumber']>=6000000000 && $_POST['MobileNumber']<=Cus_MobileNumber)) {
                              $mobile_error="Invalid Mobile Number";
                             $register_error++;
                         }
                         if (strlen($_POST['Cus_Password'])<6) {
                               $password_error="Password must have 6 characters";
                             $register_error++;
                         }
                         
                         if ($register_error==0) {
                       $userid =  $mysql->insert("_tbl_documents_user",array("UserName"     => $_POST['Cus_UserName'],
                                                                            "MobileNumber" => trim($_POST['Cus_MobileNumber']),
                                                                            "EmailID"      => trim($_POST['Cus_EmailID']),
                                                                            "Password"     => trim($_POST['Cus_Password']),
                                                                            "CreatedOn"    => date("Y-m-d H:i:s")));
                       echo "Registration Completed and assigned documents";           
                       $item =  $mysql->select("select * from _tbl_documents where md5(DocID)='".$_GET['item']."'");
                       $mysql->insert("_tbl_documents_sold",array("RequestedOn"=>date("Y-m-d H:i:s"),
                                                                       "UserID"=>$userid,
                                                                       "PaymentID"=>"0",
                                                                       "DocID"=>$item[0]['DocID']));
                         } else {
                             $addUserError = $email_error."<br>".$mobile_error.'<br>'.'<br>'.$password_error;
                         }
        }

       if (isset($_POST['isDelete'])) {
           $mysql->execute("update _tbl_documents set IsDelete='1' where md5(DocID)='".$_REQUEST['item']."'");
           ?>
           <script>
           alert("Deleted Successfully");
           location.href='Doc_List';
           </script>
       <?php
             exit;
       }
    
    if (isset($_POST['isSubmit'])) {
    
        $filename = strtolower(time()."_".$_FILES["file"]["name"]);
        $filename2 = strtolower(time()."_".$_FILES["file2"]["name"]);
        
        
             $content = str_replace("'","&rsquo;", $_POST['description']);
            $content = str_replace('"','&rdquo;', $content);                     
            
        $sql = "update _tbl_documents set   DocumentName='".$_POST['DocumentName']."', Price='".$_POST['Price']."', IsPublish='".$_POST['IsPublish']."' , Description='".$content."'  ";
        
        if ( (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/documents/".$filename)) ) {
            
            $sql .= ", Photopath='".$filename."' ";  
        }
        
         if ( (move_uploaded_file($_FILES["file2"]["tmp_name"],"assets/documents/".$filename2)) ) {
            
            $sql .= ", Attachment='".$filename2."' ";  
        }
          
         
         
         $sql .= " where md5(DocID)='".$_REQUEST['item']."'"; 
                
              $mysql->execute($sql);
              echo "Successfully Updated";
            
            
                          
                       
       
               
    }
        $item =  $mysql->select("select * from _tbl_documents where md5(DocID)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
 
<form action="Doc_Edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Document Name</td>
            <td><input type="text" name="DocumentName" value="<?php echo $item['DocumentName'];?>"  required  class="form-control"></td>
        </tr>
         <tr>
            <td>Document Price</td>
            <td><input type="text" name="Price" value="<?php echo $item['Price'];?>" required  class="form-control" ></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo $item['Description'];?>" required  class="form-control" ></td>
        </tr>
         
        <tr>
            <td>Document Image</td>
            <td>
            <img src="assets/documents/<?php echo $item['Photopath']; ?>" style="height:100px"><br>
            <input type="file" name="file"  class="form-control"  ></td>
        </tr>
       
       <tr>
            <td>Document Link</td>
            <td>
            <a href="assets/documents/<?php echo $item['Attachment']; ?>"><?php echo "https://www.kasupanamthuttu.com/assets/documents".$item['Attachment']; ?></a><br>
            <input type="file" name="file2"  class="form-control"  ></td>
        </tr>  
        <tr>
            <td>Is Publish</td>
            <td>
                <select name="IsPublish" class="form-control">
                    <option value="1" <?php echo $item['IsPublish']==1 ? " selected='selected' " : ""; ?>>Publish</option>
                    <option value="0" <?php echo $item['IsPublish']==0 ? " selected='selected' " : ""; ?>>Un Publish</option>
                
                </select>
            </td>
        </tr>
     
                                             
        <tr>
            <td colspan="2"><input type="submit" value="Update Attachment" name="isSubmit" class="btn btn-primary">
           <!-- <input type="button"  onclick="window.open('winners.php','rightW');window.close('GoogleWindow')" value=" Close "> -->
            <input type="submit" name="isDelete"  value=" Delete " class="btn btn-danger">
            </td>                
        </tr>
    </table>
</form>


<div>
     <h3>Add New User</h3>
     <?php
         if (isset($addUserError)) {
             echo "<span style='color:red'>".$addUserError."</span>";
         }
     ?>
   <form action="" method="post">
    <table>
        <tr>
            <td>User Name</td>
            <td>Mobile Number</td>
            <td>Email</td>
            <td>Password</td>
            <td></td>
        </tr>
        <tr>
            <td><input type="text" name="Cus_UserName" value="<?php echo isset($_POST['Cus_UserName']) ? $_POST['Cus_UserName'] : "";?>" class="form-control"></td>
            <td><input type="text" name="Cus_MobileNumber" value="<?php echo isset($_POST['Cus_MobileNumber']) ? $_POST['Cus_MobileNumber'] : "";?>" class="form-control"></td>
            <td><input type="text" name="Cus_EmailID" value="<?php echo isset($_POST['Cus_EmailID']) ? $_POST['Cus_EmailID'] : "";?>" class="form-control"></td>
            <td><input type="text" name="Cus_Password" value="<?php echo isset($_POST['Cus_Password']) ? $_POST['Cus_Password'] : "";?>" class="form-control"></td>
            <td><input type="submit" value="Create & Assign" name="AddCus" class="btn btn-primary btn-sm"></td>
        </tr>
    </table>
    </form> 
    
     <h3>Add Existing Customer</h3>
     
   <form action="" method="post">
    <table>
        <tr>
            <td>User Name</td>
            
            <td></td>
        </tr>
        <tr>
            <td>
                <select name="xCus" class="form-control">
                    <?php
                        $allCus = $mysql->select("select * from _tbl_documents_user order by UserName");
                        foreach($allCus as $a) {
                            ?>
                                <option value="<?php echo $a['UserID'];?>"><?php echo $a['UserName']." - ".$a['MobileNumber']." - ".$a['EmailID'];?></option>
                            <?php
                        }
                    ?>
                </select>            
               </td>
             <td><input type="submit" value="Assign" name="xAddCus" class="btn btn-primary btn-sm"></td>
        </tr>
    </table>
    </form> 
    <?php 
    $data =   $mysql->select("select * from _tbl_documents_sold right join _tbl_documents_user on _tbl_documents_user.UserID=_tbl_documents_sold.UserID where md5(_tbl_documents_sold.DocID)='".$_REQUEST['item']."'"); 
    ?>
     <h3>Requested</h3>
    <table>
        <tr>
            <td>Sold on</td>
            <td>User Name</td>
            <td>Mobile Number</td>
            <td>Email</td>
            <td>Password</td>
            <td>IsPG</td>
        </tr>
        <?php foreach($data as $d) {?>
           <tr>
            <td><?php echo $d['RequestedOn'];?></td>
            <td><?php echo $d['UserName'];?></td>
            <td><?php echo $d['MobileNumber'];?></td>
            <td><?php echo $d['EmailID'];?></td>
            <td><?php echo $d['Password'];?></td>
            <td><?php echo $d['PaymentID']==0 ? "Admin" : "PG";?></td>
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

 