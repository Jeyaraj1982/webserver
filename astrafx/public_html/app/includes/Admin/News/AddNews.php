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
            $id=$mysql->insert("_tbl_news",array("NewsTitle"          => $_POST['NewsTitle'],                    
                                                 "NewsDescription"    => $_POST['NewsDescription'],
                                                 "CreatedOn"          => date("Y-m-d H:i:s")));
            ?>
            <script>
                swal("Latest News Added", {
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
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/AddNews">News</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/AddNews">Add News</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Add News</div>
                </div>
            <div class="card-body">
                <form method="post" action="">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>News Title</strong>
                            <br>
                            <input type="text" name="NewsTitle" id="NewsTitle" class="form-control" value="<?php echo isset($_POST['NewsTitle']) ? $_POST['NewsTitle'] : "";?>">
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Description</strong>
                            <br>
                            <input type="text" name="NewsDescription" id="NewsDescription"  class="form-control" value="<?php echo isset($_POST['NewsDescription']) ? $_POST['NewsDescription'] : "";?>" >
                        </div>
                    </div>          
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="AddBtn" id="AddBtn" class="btn btn-primary" >Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>                                                      
    </div>            
</div>
<?php include_once("footer.php"); ?>