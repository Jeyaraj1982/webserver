 <?php $i=1; ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Categories
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">Category Names</td>
                                           <td style="padding-right:10px;text-align:right">SubCategories</td>
                                           <!--  <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> -->
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php
                                            $data = $mysql->select("select * from _jcategory order by categname");
                                            foreach($data as $d) {
                                              //  $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                              //  $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                              //  $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                                $subcategories = sizeof($mysql->select("select * from _jsubcategory where categid='".$d['categid']."'"));
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="<?php echo AppUrl;?>/admin/dashboard.php?action=category/managesubcategories&categid=<?php echo $d['categid'];?>"><?php echo $d['categname'];?></a></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $subcategories;?></td>
                                         <!--   <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>-->
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

