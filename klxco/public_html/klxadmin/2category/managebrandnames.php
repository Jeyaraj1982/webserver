 <?php $i=1; ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Brand Names
                                <?php
                                      $category = $mysql->select("select * from _jcategory where categid='".$_GET['categid']."'");
                                      $subcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['subcateid']."'");
                                      echo "<div style='font-size:12px;color:#555'>".$category[0]['categname']. " / ". $subcategory[0]['subcatename']."</div>";
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php
                                 if (isset($_POST['btnBrand'])) {
                $mysql->insert("_jbrandnames",array("categid"=>$_GET['categid'],
                                                    "subcateid"=>$_GET['subcateid'],
                                                    "brandname"=>$_POST['brandname']));
                echo "<div class='alert alert-success' role='alert' style='border-right:1px solid #31CE36;border-top:1px solid #31CE36;border-bottom:1px solid #31CE36'>Saved Brand Name</div>";
        }
        if (isset($_POST['BtnDelete'])) {
            $mysql->execute("delete from _jbrandnames where brandid='".$_POST['dbrandid']."'");
             echo "<div class='alert alert-danger' role='alert' style='border-right:1px solid #F25961;border-top:1px solid #F25961;border-bottom:1px solid #F25961'>Deleted Brand Name</div>";
        }
                            ?>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">Brand Names</td>
                                            <td style="padding-right:10px;text-align:right">Model Names</td>
                                           <!-- <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> -->
                                            <td style="padding-left:10px;text-align:left;width:50px"></td>
                                            
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="background:#ccc;">
                                                <form action="" method="post">
                                                    <div class="row">
                                                       
                                                        <div class="col-8">
                                                        <input class="form-control" required type="text" name="brandname" value="" placeholder="Enter Brand Name">
                                                        </div>
                                                          <div class="col-4">
                                                         <input class="btn btn-primary" name="btnBrand" type="submit" value="Save Brand Name">
                                                        </div>
                                                    </div>
                                                
                                                
                                               
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                            $data = $mysql->select("select * from _jbrandnames where subcateid='".$_GET['subcateid']."'  order by brandname");
                                            foreach($data as $d) {
                                              //  $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                              //  $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                              //  $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                                $models = sizeof($mysql->select("select * from _JModels where brandid='".$d['brandid']."'  order by model"));
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="https://klx.co.in/klxadmin/dashboard.php?action=category/managemodelnames&brandid=<?php echo $d['brandid'];?>&subcateid=<?php echo $d['subcateid'];?>&categid=<?php echo $d['categid'];?>"><?php echo $d['brandname'];?></a></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $models;?></td>
                                           <!-- <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>-->
                                            <td>
                                            <?php if ($models==0) { ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="dbrandid" value="<?php echo $d['brandid'];?>">
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="BtnDelete">
                                                </form>
                                            <?php } else { ?>
                                                <input class="btn btn-danger btn-sm" disabled="disabled" type="button" value="Delete">
                                            <?php } ?>
                                            
                                            </td>
                                        </tr>
                                       <?php $i++; } ?>  
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

