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
<script src="editor.js"></script>
<link href="editor.css" type="text/css" rel="stylesheet"/>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Notice Board
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <form method="post" action="" onsubmit="return submitPassword();">
                                    <div class="col-sm-3"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            News Title
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" name="NewsTitle" id="NewsTitle" placeholder="News Title" class="form-control" value="<?php echo (isset($_POST['NewsTitle']) ? $_POST['NewsTitle'] : "");?>">
                                            <span class="errorstring" id="ErrNewsTitle"><?php echo isset($ErrNewsTitle)? $ErrNewsTitle : "";?></span>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="NewsText" name="NewsText"><?php echo (isset($_POST['NewsText']) ? $_POST['NewsText'] : "");?></textarea> 
                                            <span class="errorstring" id="ErrNewsTitle"><?php echo isset($ErrNewsTitle)? $ErrNewsTitle : "";?></span>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                       <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-12"><button class="btn btn-primary" name="ChangePassword">Update Notice</button></div>
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
