<?php include_once("header.php");?>
<?php
if (isset($_POST['ChangePassword'])) {

    
  $id = $mysql->insert("_tbl_noticeboard",array("NewsTitle"=>$_POST['NewsTitle'],
                                                  "NewsText"=>str_replace('"','\"',str_replace("'","\'",$_POST['NewsText'])),
                                                  "CreatedOn"=>date("Y-m-d H:i:s"),
                                                  "IsPublish"=>"1"));
                                                  $successMessage = "News added  successfully";
                                                  unset($_POST);
                
}

?> 
<script>
     function submitPassword() {
         
                $('#ErrNewsText').html("");
                $('#ErrNewsTitle').html("");

                ErrorCount = 0;
                
                IsNonEmpty("NewsText", "ErrNewsText", "Please Enter News Title");
                IsNonEmpty("NewsTitle", "ErrNewsTitle", "Please Enter Content");
                  
                  $('#NewsText').html($('.Editor-editor').html());

                  return (ErrorCount==0) ? true : false;
    }

</script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
        <script src="editor.js"></script>
  
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
        
        <link href="editor.css" type="text/css" rel="stylesheet"/>
        
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Notice Board
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">New Notice</h5>
                                        <form method="post" action="" onsubmit="return submitPassword();">
                                            <div>
                                           
                                           <div class="col-sm-3"></div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        New Title
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="NewsTitle" id="NewsTitle" placeholder="News Title" class="form-control" value="<?php echo (isset($_POST['NewsTitle']) ? $_POST['NewsTitle'] : "");?>">
                                                        <span class="errorstring" id="ErrNewsTitle"><?php echo isset($ErrNewsTitle)? $ErrNewsTitle : "";?></span>
                                                    </div>
                                                </div>
                                                 
                                                </div>
                                                   <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        
                                                        <textarea id="NewsText" name="NewsText"><?php echo (isset($_POST['NewsText']) ? $_POST['NewsText'] : "");?></textarea> 
                                                        <span class="errorstring" id="ErrNewsTitle"><?php echo isset($ErrNewsTitle)? $ErrNewsTitle : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                   <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button class="mb-2 mr-2 btn btn-gradient-primary" name="ChangePassword">Update Notice</button></div>
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
                <script>
            $(document).ready(function() {
                $("#NewsText").Editor();
               
            });
        </script>
 <?php include_once("footer.php");?>             