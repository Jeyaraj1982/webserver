<?php include_once("header.php"); ?>
<h3>Send SMS through Excel file</h3>
   <?php
       if (isset($_POST['isupload'])) {
           $target_path = "excels/";
           $filename = str_replace(array(" ",",","_"),"",strtolower($_FILES['uploadedfile']['name']));
           $target_path = $target_path.basename($filename); 
           
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           
           if( $ext == 'xls' || $ext == 'xlsx') {
               
           
           
           if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
               //verification
               $batchid = $mysql->insert("_tblbatch",array("batchname"=>$filename,
                                                           "addedon"=>date("Y-m-d H:i:s"),
                                                           "filename"=>$filename,
                                                           "userid"=>$_SESSION['user']['id']));
               if ($batchid>0) {
               echo "<style>#ufrom{display:none}</style>";
               include_once("verification.php");
               }else{
                   echo "error";
               }
              
           } else {
                echo "There was an error uploading the file, please try again!";
           }
           } else {
               echo "Error: Unknown Format. (must have microsoft excel formats like xls/xlsx)";
           }

       }
   ?>
<div id="ufrom"> 
<table cellpadding="5" cellspacing="5" width="100%">
    <tr>
        <td style="vertical-align:top;">
            <form enctype="multipart/form-data" action="" method="POST">
                <table>
                    <tr>    
                        <td>Choose Excel File</td>
                        <td><input type="file" name="uploadedfile"></td>
                    </tr>
                    <tr>
                        <td>Options</td>
                        <td><input type="checkbox" name="rm">Remove Duplicate Number(s)</td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Export" name="isupload" class="myButton"></td>
                    </tr>
                </table>
            </form>
        </td>
        <td style="vertical-align:top;width:400px;">
        Formats:<br>
        <ol>
            <li>Must have extension .xls or .xlsx (Supports  Microsoft Excel)</li>
            <li>First Column must have valid mobile Numbers.</li>
            <li>Second Columns must have valid Text Message.</li>
            <li>Third Column must have type like normal/unicode.</li>
            <li>Fourth Column must have type valid sender's id.</li>
            <li>Maximum Supports Columns (A, B, C & D).</li>
            <li>Maximum Supports Rows (1 To 500).</li>
            <li>Maximum File size supports 2 MB.</li>
        </ol>
        <img src="images/sampleexcel.png">
        </td>
    </tr>
</table>




  </div>
<?php
include_once("footer.php");
?>