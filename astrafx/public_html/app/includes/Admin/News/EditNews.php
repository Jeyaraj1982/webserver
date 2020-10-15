<?php
    if (isset($_POST['AddBtn'])) {
        $error=0;
        if ($_POST['NewsTitle'] == "") {
            $error++;
            $errormsg = "Please Enter News Title";
        }
        if ($_POST['NewsDescription'] == "") {
            $error++;
            $errormsg = "Please Enter News Description";
        }
        if ($error==0) {
           $mysql->execute("update `_tbl_news` set `NewsTitle`       ='".$_POST['NewsTitle']."',
                                                   `NewsDescription` ='".$_POST['NewsDescription']."',
                                                   `IsPublish`       ='".$_POST['IsPublish']."'
                                                    where `NewsID`   ='".$_GET['Nid']."'");
            ?>
            <script>
                swal("News Updated", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=News/ManageNews'
                });
            </script>
        <?php } else { ?>
             <script>
              $(document).ready(function() {
                    swal("<?php echo $errormsg;?>", {
                        icon : "error"                                                                                       
                    });
                 });
            </script>
            <?php
        }
    }
    $data = $mysql->select("select * from `_tbl_news` where `NewsID`='".$_GET['Nid']."'");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/EditNews">News</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/EditNews">Edit News</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Edit News</div>
                </div>
            <div class="card-body">
                <form method="post" action="">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>News Title</strong>
                            <br>
                            <input type="text" name="NewsTitle" id="NewsTitle" class="form-control" value="<?php echo isset($_POST['NewsTitle']) ? $_POST['NewsTitle'] : $data[0]['NewsTitle'];?>">
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Description</strong>
                            <br>
                            <input type="text" name="NewsDescription" id="NewsDescription"  class="form-control" value="<?php echo isset($_POST['NewsDescription']) ? $_POST['NewsDescription'] : $data[0]['NewsDescription'];?>" >
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-2 col-xs-3 b-r"> 
                            <strong>IsPublish</strong>
                            <br>
                            <select name="IsPublish" class="form-control">
                                <option value="1" <?php echo ($data[0]['IsPublish']==1) ? " selected='selected' " : "";?>>Yes</option>
                                <option value="0" <?php echo ($data[0]['IsPublish']==0) ? " selected='selected' " : "";?>>No</option>
                            </select>
                        </div>
                    </div>          
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="AddBtn" id="AddBtn" class="btn btn-primary" >Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>                                                      
    </div>            
</div>                                                                                                              
<?php include_once("footer.php"); ?>