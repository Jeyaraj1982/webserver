<?php
  include_once("apiconfig.php");
  
   if (isset($_REQUEST['delete'])) {
     
     $d = $mysql->select("select * from astores where storeid=".$_REQUEST['delete']);
     if (sizeof($d)>0) {
         $mysql->execute("delete from astores where storeid=".$_REQUEST['delete']);
         echo "successfully deleted";
     }
 }
?>
<table border="1">
   
    <?php
    $data = $mysql->select("select * from astores");
        foreach($data as $d) {
            ?>
                <tr>
        <td>
            <img src="assets/stores/<?php echo $d['storeimage'];?>" style="height:100px;width:100px">        </td>
        <td><?php echo $d['storename'];?></td>
        <td><?php echo $d['storeaddress'];?></td>
        <td>
            <a href="liststores.php?delete=<?php echo $d['storeid'];?>">Delete</a>
        </td> 
        
    </tr>
            <?php 
        }
    ?>
</table>