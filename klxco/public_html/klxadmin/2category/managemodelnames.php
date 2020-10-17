 <?php $i=1; ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Modal Names
                                <?php
                                      $category = $mysql->select("select * from _jcategory where categid='".$_GET['categid']."'  ");
                                      $subcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['subcateid']."'  ");
                                      $brand = $mysql->select("select * from _jbrandnames where subcateid='".$_GET['subcateid']."' ");
                                      echo "<div style='font-size:12px;color:#555'>".$category[0]['categname']. " / ". $subcategory[0]['subcatename'] ." / ".$brand[0]['brandname']."</div>";
                                ?>
                            </div>                  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php
                                 if (isset($_POST['btnBrand'])) {
                $mysql->insert("_JModels",array("categid"=>$_GET['categid'],
                                                    "subcateid"=>$_GET['subcateid'],
                                                    "brandid"=>$_GET['brandid'],
                                                    "model"=>$_POST['model']));
                echo "<div class='alert alert-success' role='alert' style='border-right:1px solid #31CE36;border-top:1px solid #31CE36;border-bottom:1px solid #31CE36'>Saved Model Name</div>";
        }
        if (isset($_POST['BtnDelete'])) {
            $mysql->execute("delete from _JModels where ModelID='".$_POST['dModelID']."'");
          
             echo "<div class='alert alert-danger' role='alert' style='border-right:1px solid #F25961;border-top:1px solid #F25961;border-bottom:1px solid #F25961'>Deleted Model Name</div>";
        }
                            ?>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">Modal Names</td>
                                           <!-- <td style="padding-right:10px;text-align:right">State Names</td>
                                            <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> -->
                                              <td style="padding-left:10px;text-align:left;width:50px">Ads</td>
                                              <td style="padding-left:10px;text-align:left;width:50px"></td>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                     <tr>
                                      <td colspan="4" style="background:#ccc;">
                                                <form action="" method="post">
                                                    <div class="row">
                                                       
                                                        <div class="col-8">
                                                        <input class="form-control" type="text" name="model" value="" placeholder="Enter Model Name">
                                                        </div>
                                                          <div class="col-4">
                                                         <input class="btn btn-primary" type="submit" value="Save Model Name" name="btnBrand">
                                                        </div>
                                                    </div>
                                                
                                                
                                               
                                                </form>
                                            </td>
                                      </tr>
                                        <?php                                                                                                                                                                                               
                                            $data = $mysql->select("select * from _JModels where brandid='".$_GET['brandid']."'  order by model");
                                            foreach($data as $d) {
                                              //  $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                              //  $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                              //  $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                              $posts = sizeof($mysql->select("select * from _jpostads where Model='".$d['ModelID']."'"));
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><?php echo $d['model'];?></td>
                                            <td style="padding-left:10px;text-align:left"><?php echo $posts?></td>
                                            <!--<td style="padding-left:10px;text-align:left"><a class="leftMenu" href="https://klx.co.in/klxadmin/dashboard.php?action=category/managemodelnames&brandid=<?php echo $d['brandid'];?>&subcateid=<?php echo $d['subcateid'];?>&categid=<?php echo $d['categid'];?>"><?php echo $d['model'];?></a></td>-->
                                         <!--   <td style="padding-right:10px;text-align:right"><?php echo $statenames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>-->
                                             <td>
                                            <?php if ($posts==0) { ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="dModelID" value="<?php echo $d['ModelID'];?>">
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

