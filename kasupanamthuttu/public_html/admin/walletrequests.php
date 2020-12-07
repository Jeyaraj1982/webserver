             <?php include_once("game_clients/menu.php");?>
     <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <article class="s-9 m-7 l-9">
                 
<h4>Wallet Requests</h4>
 
                                                
<div class="row">
 
<?php
 
 $products = $mysql->select("select * from `_walletupdaterequests`   order by id desc");
?>
    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Requested</td>   
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">User ID</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Amount</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Remarks</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Action</td>
        </tr>
        <?php  foreach($products as $p ) { ?>
        <tr>  
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['requestedon'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['userid'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['amount'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['details'];?></td>
            <td style="padding-left:5px;padding-right:5px;text-align:center">
            <?php if ($p['isapproved']==0 && $p['isrejected']==0) {?>
               <form action="approve" method="post">
                <input type="hidden" name="id" value="<?php echo $p['id'];?>">
                <input type="submit" value="View" class="btn btn-primary btn-sm">
               </form>
            <?php } else {?>
                 <?php echo ($p['isapproved']==1) ? "Approved on ".$p['approvedon'] : "Rejected On ".$p['rejectedon']; ?>
            <?php } ?>
            
            </td>
        </tr>        
        <?php } ?>
    </table>
    </div>
    </article>
    </div>
    </div>