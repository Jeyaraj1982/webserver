 <?php
 
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  } else {
    $filename = time()."_".$_FILES["file"]["name"];
    $filename = strtolower(str_replace(" ","",$filename));

 

    if (move_uploaded_file($_FILES["file"]["tmp_name"],"../profile/".$_POST['facebook'].$filename )) {
        echo "<span style='color:brown;font-size:30px;font-family:arial;text-align:center'>http://files.indiansvictoryparty.com/profile/".$_POST['facebook'].$filename."</span><br>";
        echo "<img src='http://www.indiansvictoryparty.com/profile/".$_POST['facebook'].$filename."' width=300><br>";
       // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    } else {
        echo "Error";
    }
  }
 
 
?> 