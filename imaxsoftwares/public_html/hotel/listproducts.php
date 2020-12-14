<?php
  include_once("apiconfig.php");
  
   if (isset($_REQUEST['delete'])) {
     
     $d = $mysql->select("select * from aproducts where productid=".$_REQUEST['delete']);
     if (sizeof($d)>0) {
         $mysql->execute("delete from aproducts where productid=".$_REQUEST['delete']);
         echo "successfully deleted";
     }
 }
?>
<table border="1">
   
    <?php
    $sql = "";
    if (isset($_REQUEST['categoryid'])) {
        $sql = " and c.categoryid=".$_REQUEST['categoryid'];
        
    }
    $data = $mysql->select("SELECT * FROM aproducts AS p, acategorynames AS c WHERE p.categoryid=c.categoryid ".$sql);
        foreach($data as $d) {
            ?>
                <tr>
        <td>
            <img src="assets/products/<?php echo $d['productimage'];?>" style="height:100px;width:100px">        </td>
        <td><?php echo $d['categoryname'];?></td>
        <td><?php echo $d['productname'];?></td>
        <td><?php echo $d['productdescription'];?></td>
        <td>
            <a href="listproducts.php?delete=<?php echo $d['productid'];?>">Delete</a>
        </td> 
        
    </tr>
            <?php
        }
    ?>
</table>