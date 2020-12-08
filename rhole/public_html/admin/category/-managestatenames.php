<?php
        $obj = new CommonController();
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
        $i=1;
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $data = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' order by statenames");
    ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of State Names (<?php echo $country[0]['countryname'];?>)
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;">No</td>
                                            <td style="padding-left:10px;text-align:left;width:250px">State Names</td>
                                            <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php
                                            foreach($data as $d) {
                                                $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where stateid='".$d['stateid']."'");
                                                $citynames = $mysql->select("select count(*) as cnt from _jcitynames where stateid='".$d['stateid']."'");
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="<?php echo AppUrl;?>/admin/dashboard.php?action=country/managedistrictnames&countryid=<?php echo $country[0]['countryid'];?>&stateid=<?php echo $d['stateid'];?>" target="rpanel"><?php echo $d['statenames'];?></a></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>
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

