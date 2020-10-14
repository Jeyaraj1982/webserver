<?php include_once("header.php");?>
<?php
if (isset($_POST['ChangePassword'])) {

    
  $id = $mysql->insert("_tbl_noticeboard",array("NewsTitle"=>$_POST['NewsTitle'],
                                                  "NewsText"=>str_replace('"','\"',str_replace("'","\'",$_POST['NewsText'])),
                                                  "CreatedOn"=>date("Y-m-d H:i:s"),
                                                  "IsPublish"=>"1"));
                                                  $successMessage = "Password changed  successfully";
                                                  unset($_POST);
                
}

$news = $mysql->select("select * from _tbl_noticeboard order by NewsID Desc");

?> 
 

 
        
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
                                        <?php foreach($news as $n) {?>
                                        <div class="card-body">
                                           <div class="form-group row">
                                               <div class="col-sm-9">
                                                    <h5 class="card-title"><?php echo $n['NewsTitle'];?></h5>
                                                    <?php echo strip_tags(str_replace("</pre>","",str_replace('<pre class="tw-data-text tw-text-large tw-ta" data-placeholder="Translation" id="tw-target-text" style="text-align:left" dir="ltr">',"",$n['NewsText'])));?>
                                               </div>
                                               <div class="col-sm-3" style="background:#f1f1f1;">
                                                <a href="NewsEdit.php?News=<?php echo $n['NewsID'];?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
                                                <a href="NewsView.php?News=<?php echo $n['NewsID'];?>">View</a> <br><br>
                                                <b>Created</b><br>
                                                <?php echo $n['CreatedOn'];?><br><br>
                                                <b>Is Published</b><br>
                                                <?php echo ($n['IsPublish']==1) ? "Yes" : "No";?>
                                               
                                               </div>
                                               
                                           </div>
                                           </div>
                                         <hr style="border-bottom:2px solid #e5e5e5">
                                        <?php } ?>
                           
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