<?php
    $obj = new CommonController();
             $obj = new CommonController();
    
       /* if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }    */

        if (isset($_POST{"save"})) {
       
            if ($obj->isEmptyField($_POST['faqquestion'])) {
                    echo $obj->printError("Question Shouldn't be blank");
                }
                
            if ($obj->isEmptyField($_POST['faqanswer'])) {
                echo $obj->printError("Answer Shouldn't be blank");
            }
                $param=array("faqquestion"=>$_POST['faqquestion'],"faqanswer"=>str_replace("'","\\'",$_POST['faqanswer']),"ispublished"=>$_POST['ispublished']);
                
            if ($obj->err==0) {
                echo (JFaq::addFaq($param)>0) ? $obj->printSuccess("FAQ Added successfully") : $obj->printError("Error Adding FAQ");
            } 
            
        }                        
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               Add FAQ
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Question</label>
                                    <div class="col-md-3"><input type="text" name="faqquestion" style="width:100%;" value="<?php echo isset($_POST['faqquestion']) ? $_POST['faqquestion'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <textarea name="faqanswer" style="height: 350px;width:100%" class="form-control"><?php echo isset($_POST['faqanswer']) ? $_POST['faqanswer'] : ""; ?></textarea>
                                    </div>
                               </div>  
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Is Publish? </label>
                                    <div class="col-md-3"><select name="ispublished" class="form-control"><option value='1'>Yes</option><option value='0'>No</option></select></div>
                               </div> 
                               <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                               </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">save</button>
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
<script>$('#success').hide(3000);</script>  