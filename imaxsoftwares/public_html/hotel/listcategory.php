<?php
  include_once("apiconfig.php");
  
   if (isset($_REQUEST['delete'])) {
     
     $d = $mysql->select("select * from acategorynames where categoryid=".$_REQUEST['delete']);
     if (sizeof($d)>0) {
         $p = $mysql->select("select * from aproducts where categoryid=".$_REQUEST['delete']);
         if ($sizeof($p)>0) {
         echo "Error: Couldn't be delete, because category has products.";
         } else {
         $mysql->execute("delete from acategorynames where categoryid=".$_REQUEST['delete']);
         echo "successfully deleted";
         }
     }
 }
?>
<?php     include_once("header.php"); ?>
<table border="1" style="width: 100%;" cellpadding="5" cellspacing="0"   >
   
    <?php
    $data = $mysql->select("select * from acategorynames");
        foreach($data as $d) {
            ?>
                <tr>
        <td width="100">
            <img src="assets/categories/<?php echo $d['categoryimage'];?>" style="height:100px;width:100px;border:1px solid #ccc;">        </td>
        <td><?php echo $d['categoryname'];?></td>
        <td>
            <a href="listproducts.php?categoryid=<?php echo $d['categoryid'];?>">View Products</a>
        </td>   <td>
            <a href="listcategory.php?delete=<?php echo $d['categoryid'];?>">Delete</a>
        </td> 
        
    </tr>
            <?php 
        }
    ?>
</table>