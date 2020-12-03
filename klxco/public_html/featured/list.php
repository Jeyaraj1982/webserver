<?php 
 if (isset($_POST['deleteBtn'])) {
        $mysql->execute("update _tbl_featured set ispublish='0' where featureadid='".$_POST['fid']."'");
        echo "<script>alert('Feature ad deleted');</script>";
    }                                                 
    if (isset($_GET['f']) && $_GET['f']=="a") {
          $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and date(fad.enddate)>=date('".date("Y-m-d")."') ORDER BY fad.featureadid desc");
          
          $title = "Active Ads";
    } elseif (isset($_GET['f']) && $_GET['f']=="e") {
         $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and  date(fad.enddate)<date('".date("Y-m-d")."')   ORDER BY fad.featureadid desc");
         $title = "Expire Ads";
     } elseif (isset($_GET['f']) && $_GET['f']=="d") {
         $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='0' ORDER BY fad.featureadid desc");
         $title = "Deleted Ads";
    } else {
        $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid ORDER BY fad.featureadid desc");    
        $title = "All Ads";
        $_GET['f']='all';
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of <?php echo $title;?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="mytdhead" style="width:50px;">Ad ID</td>
                                            <td class="mytdhead" style="width:120px;">Created</td>
                                            <td class="mytdhead" style="">Title</td>
                                            <td class="mytdhead" style="width:60px;">Start Date</td>
                                            <td class="mytdhead" style="width:60px;">End Date</td>
                                            <td class="mytdhead" style="width:50px;">Duration</td>
                                            <td class="mytdhead" style="width:50px;">Amount</td>
                                            <td class="mytdhead" style="width:110px;">Publish To</td>
                                            <td class="mytdhead" style="width:50px">Category</td>  
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php foreach($data as $r){   ?>
                                        <tr>
                                           <td class="mytd"><?php echo $r["adid"];?></td>
                                           <td class="mytd"><?php echo $r["createdon"];?></td>
                                           <td class="mytd"><?php echo $r["title"];?></td>
                                           <td class="mytd"><?php echo date("Y-m-d",strtotime($r["startdate"]));?></td>
                                           <td class="mytd"><?php echo date("Y-m-d",strtotime($r["enddate"]));?></td> 
                                           <td class="mytd"><?php echo $r["duration"];?></td> 
                                           <td class="mytd"><?php echo $r["faamount"];?></td> 
                                           <td class="mytd"><?php echo $r["countryname"];?>, <?php echo $r["statename"];?>, <?php echo $r["districtname"];?></td> 
                                           <td class="mytd"><?php echo $r["categoryname"];?>, <?php echo $r["subcategoryname"];?></td> 
                                           <?php
                                                if ($_GET['f']=='all' || $_GET['f']=='a') {
                                                   ?>
                                                   <td><form action="" method="post">
                                                    <input type="hidden" value="<?php echo $r['featureadid'];?>" name="fid">
                                                    <input type="submit"   name="deleteBtn" value="Delete" style="background:red;border:none;color:white;">
                                                   </form></td>
                                                   <?php
                                               }
                                           ?>
                                     </tr>
                                        <?php } ?>
                                    </tbody> 
                                 </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

