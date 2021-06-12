<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
            <div class="box">
                <?php include_once("rightmenu.php"); ?>
            </div>
        </div>
        <div class="s-12 m-6 l-9 margin-bottom">
            <div class="box">
                <h5 style="text-align: left;font-family: arial;">Add Documents</h5> 
                <?php
                
                if (isset($_POST['isSubmit'])) {
                    
                    $filename  = strtolower(time()."_".$_FILES["file"]["name"]);
                    $filename2  = strtolower(time()."_".$_FILES["file2"]["name"]);
                    if ( 
                            (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/documents/" .$filename)) &&  
                            (move_uploaded_file($_FILES["file2"]["tmp_name"],"assets/documents/" .$filename2)) ) {
                                
                        $content = str_replace("'","&rsquo;", $_POST['description']);
                        $content = str_replace('"','&rdquo;', $content);
                        $mysql->insert("_tbl_documents",array("DocumentName"    => strtoupper($_POST['ProductName']), 
                                                              "Photopath"       => $filename,
                                                              "Attachment"      => $filename2,
                                                              "Price"           => $_POST['Price'],
                                                              "AddedOn"         => date("Y-m-d H:i:s"),
                                                              "IsPublish"       => "1",
                                                              "IsDelete"        => "0",
                                                              "Description"     => $content));
                        echo "<div style='color:green'>Successfully Added</div>";     
                    } else {
                        echo "<div style='color:red'>Error Adding Documents. Please choose file</div>";
                    }
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
                        <tr>
                            <td>Document Title</td>
                            <td><input type="text" class="form-control" required name="ProductName"></td>
                        </tr>
                        <tr>
                            <td>Document Price</td>
                            <td><input type="text" name="Price" required  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Document Description</td>
                            <td><input type="text" name="description" required  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Document Photo</td>
                            <td><input type="file" name="file" required  class="form-control" ></td>
                        </tr>
                        <tr>
                            <td>Document Attachment</td>
                            <td><input type="file" name="file2" required  class="form-control" ></td>
                        </tr>           
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Add Document" name="isSubmit" class="btn btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>