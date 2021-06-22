<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/GeneralSettings">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/GeneralSettings">General Settings</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">                                               
                <div class="card-header">
                    <div class="card-title">General Settings</div>
                </div>
                <div class="card-body">
                   
                        <div class="row"> 
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="email2">
                                            Monthly Sales Target
                                            <?php
                                                if (isset($_POST['Submitmsr_amt'])) {
                                                    $mysql->execute("update _temp_settings set paramvalue='".$_POST['paramvalue']."' where param='msr_amt'");    
                                                    echo "<span style='color:red'>Updated</span>";
                                                }
                                                $data = $mysql->select("select * from _temp_settings where param='msr_amt'");
                                            ?>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="paramvalue" name="paramvalue" value="<?php echo  $data[0]['paramvalue'];?>" placeholder="Monthly Sales Target" type="text">
                                            <div class="input-group-append">
                                                <input class="btn btn-primary"   value="Update"  name="Submitmsr_amt" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        
                         <div class="row"> 
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="email2">
                                            Monthly Sales Commission (%)
                                            <?php
                                                if (isset($_POST['Submitmsr_interet'])) {
                                                    $mysql->execute("update _temp_settings set paramvalue='".$_POST['paramvalue']."' where param='msr_interet'");    
                                                    echo "<span style='color:red'>Updated</span>";
                                                }
                                                   $data = $mysql->select("select * from _temp_settings where param='msr_interet'");
                                            ?>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="paramvalue" name="paramvalue" value="<?php echo  $data[0]['paramvalue'];?>" placeholder="Monthly Sales Target" type="text">
                                            <div class="input-group-append">
                                                <input class="btn btn-primary"   value="Update"  name="Submitmsr_interet" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="row"> 
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="email2">
                                            Jio POS Update
                                            <?php
                                                if (isset($_POST['Submitjpos'])) {
                                                    $mysql->execute("update _temp_settings set paramvalue='".$_POST['paramvalue']."' where param='jpos'");    
                                                    echo "<span style='color:red'>Updated</span>";
                                                }
                                                   $data = $mysql->select("select * from _temp_settings where param='jpos'");
                                            ?>
                                        </label>
                                        <div class="input-group">
                                            <select name="paramvalue" name="paramvalue" class="form-control">
                                                    <option value="1" <?php echo $data[0]['paramvalue']==1 ? ' selected="selected" ' : "";?>>ON</option>
                                                    <option value="0" <?php echo $data[0]['paramvalue']==0 ? ' selected="selected" ' : "";?>>OFF</option>
                                                </select>
                                            <div class="input-group-append">
                                                <input class="btn btn-primary"   value="Update"  name="Submitjpos" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>