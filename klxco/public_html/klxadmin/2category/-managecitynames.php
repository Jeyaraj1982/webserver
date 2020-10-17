<?php
        $obj = new CommonController();
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $statename = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by statenames");
        $districtname = $mysql->select("select * from _jdistrictnames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' and distcid='".$_GET['distcid']."' order by districtname");
       
        if ($_POST['SaveBtn']) {
            $mysql->insert("_jcitynames",array("countryid"      => $_POST['countryid'],
                                               "countryname"    => $country[0]['countryname'],
                                               "stateid"        => $_POST['stateid'],
                                               "statename"      => $statename[0]['statenames'],
                                               "distcid"        => $_POST['distcid'],
                                               "districtname"   => $districtname[0]['districtname'],
                                               "cityname"       => $_POST['cityname']));
            echo  $obj->printSuccess("City Name added successfully");
        }
        $i=1;
         $data = $mysql->select("select * from _jcitynames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' and distcid='".$_GET['distcid']."' order by cityname");
    ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Disrict Names (<?php echo $country[0]['countryname'];?>) - (<?php echo $statename[0]['statenames'];?>) - (<?php echo $districtname[0]['districtname'];?>)
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post">
                                    <input type="hidden" name="countryid" value="<?php echo $_GET['countryid'];?>">
                                    <input type="hidden" name="stateid" value="<?php echo $_GET['stateid'];?>">
                                    <input type="hidden" name="distcid" value="<?php echo $_GET['distcid'];?>">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td style="padding-left:10px;text-align:left;">No</td>
                                                    <td style="padding-left:10px;text-align:left;width:250px">City Names</td>
                                                </tr>
                                            </thead>  
                                            <tbody>
                                                <?php foreach($data as $d) { ?>
                                                <!--  <tr>
                <td colspan="2">
                    <input type="text" name="cityname">
                    <input type="submit" value="Save City Name" name="SaveBtn">
                </td>
            </tr> -->
                                                <tr>
                                                    <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                                    <td style="padding-left:10px;text-align:left"><?php echo $d['cityname'];?></td>
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

