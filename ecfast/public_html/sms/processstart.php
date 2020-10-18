<?php include_once("header.php"); ?>
<div>
<?php
  if ($_POST['isStart']) {
    $bb = $mysql->select("select * from _tblbatch where batchid=".$_POST['batchid']);
    
    if (strlen(trim($bb[0]['started']))==0) {
        $mysql->execute("update _tblbatch set started='".date("Y-m-d H:i:s")."' where batchid=".$_POST['batchid']);   
        $mysql->execute("update _tblbatchdetails set isstart='1' where batchid=".$_POST['batchid']);   
        echo "Process Started";
    }  else {
        echo "Error";
    }
  }
?>
</div>
<?php include_once("footer.php"); ?>
