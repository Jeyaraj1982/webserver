<?php 
  {
    $pageContent =JPostads::getPostad($_GET['rowid']); 
?>
       
      <div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               View PostAds
                            </div>
                        </div>
                        <div class="card-body"> 
                <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
                    <tr>
                        <td>Post Ad Id</td>
                        <td><?php echo $pageContent[0]['postadid'];?></td>
                    </tr>
                    <tr>
                        <td>Ad Title</td>
                        <td><?php echo $pageContent[0]['title'];?></td>
                    </tr>
                    <tr>
                        <td style="width:150px">Ad Description</td>
                        <td style="text-align:justify;font-family:arial;font-size:12px;">
                            <?php echo $pageContent[0]['content'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><?php echo $pageContent[0]['location'];?></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td><?php echo $pageContent[0]['amount'];?></td>
                    </tr>
                    <tr>
                        <td>Posted On</td>
                        <td><?php echo $pageContent[0]['postedon'];?></td>
                    </tr>
                    <tr>
                        <td>Is Active</td>  
                        <td> <?php if ($pageContent[0]["isactive"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Active</span> 
                            <?php } else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td >Is Delete</td>  
                        <td> <?php if ($pageContent[0]["isdelete"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Delete</span> 
                            <?php } else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>UnDelete</span> 
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Is Published</td>  
                        <td> <?php if ($pageContent[0]["ispublish"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Published</span>  
                            <?php }else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>Unpublished</span> 
                            <?php  }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Expired On</td>
                        <td><?php echo $pageContent[0]['expiredon'];?></td>
                    </tr>
                    <tr>
                        <td>Upload Image</td>
                        <td>
                          <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?>    
                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                          <?php } ?>
                        </td>
                    </tr> 
                    <tr>
                        <td>Upload Image</td> 
                        <td>
                          <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?>    
                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                          <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           
                            <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewpostads.php'"> 
                        </td>
                    </tr>
                </table>
               </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?> 