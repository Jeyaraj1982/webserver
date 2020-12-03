 <?php $i=1; ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Sub Categories
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">SubCategory Names</td>
                                            <td style="padding-right:10px;text-align:right">Brand Names</td>
                                            <!--  <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> -->
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php
                                            $data = $mysql->select("select * from _jsubcategory where categid='".$_GET['categid']."'  order by subcatename");
                                            foreach($data as $d) {
                                              //  $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                              //  $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                              //  $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                               $brandnames = sizeof($mysql->select("select * from _jbrandnames where subcateid='".$d['subcateid']."'  order by brandname"));
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="https://klx.co.in/klxadmin/dashboard.php?action=category/managebrandnames&subcateid=<?php echo $d['subcateid'];?>&categid=<?php echo $_GET['categid'];?>" ><?php echo $d['subcatename'];?></a></td>
                                          <td style="padding-right:10px;text-align:right"><?php echo $brandnames;?></td>
                                          <!--    <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
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

