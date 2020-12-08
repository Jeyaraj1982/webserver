<?php
         $obj = new CommonController();
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $statename = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by statenames");
        
        if ($_POST['SaveBtn']) {
            $mysql->insert("_jdistrictnames",array("countryid"      => $_POST['countryid'],
                                                   "countryname"    => $country[0]['countryname'],
                                                   "stateid"        => $_POST['stateid'],
                                                   "statename"      => $statename[0]['statenames'],
                                                   "districtname"   => $_POST['districtname']));
            echo  $obj->printSuccess("District Name added successfully");
        }
        $i=1;
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $statename = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by statenames");
        $data = $mysql->select("select * from _jdistrictnames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by districtname");
    ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Disrict Names (<?php echo $country[0]['countryname'];?>) - (<?php echo $statename[0]['statenames'];?>)
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post">
                                    <input type="hidden" name="countryid" value="<?php echo $_GET['countryid'];?>">
                                    <input type="hidden" name="stateid" value="<?php echo $_GET['stateid'];?>">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td style="padding-left:10px;text-align:left;">No</td>
                                                    <td style="padding-left:10px;text-align:left;width:250px">District Names</td>
                                                    <td style="padding-right:10px;text-align:right">City Names</td>
                                                </tr>
                                            </thead>  
                                            <tbody>
                                                <?php
                                                    foreach($data as $d) {
                                                        $citynames = $mysql->select("select count(*) as cnt from _jcitynames where distcid='".$d['distcid']."'");
                                                ?>
                                                <tr>
                                                    <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                                    <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="<?php echo AppUrl;?>/admin/dashboard.php?action=country/managecitynames&countryid=<?php echo $country[0]['countryid'];?>&stateid=<?php echo $statename[0]['stateid'];?>&distcid=<?php echo $d['distcid'];?>" target="rpanel"><?php echo $d['districtname'];?></a></td>
                                                    <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>
                                                </tr>
                                                <?php $i++; } ?> 
                                            </tbody> 
                                        </table>
                                </form>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

