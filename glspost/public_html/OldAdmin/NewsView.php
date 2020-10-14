<?php include_once("header.php");?>
<?php
if (isset($_POST['ChangePassword'])) {

    
  $mysql->execute("update _tbl_noticeboard set NewsTitle='".$_POST['NewsTitle']."',
                                               NewsText='".str_replace('"','\"',str_replace("'","\'",$_POST['NewsText']))."',
                                               CreatedOn='".date("Y-m-d H:i:s")."',
                                               IsPublish='".$_POST['IsPublish']."' where NewsID='".$_GET['News']."'");
                                                  $successMessage = "Updated successfully";
                                                  unset($_POST);
                
}

?> 
 

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
        <script src="editor.js"></script>
  
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
        
        <link href="editor.css" type="text/css" rel="stylesheet"/>
          
           <?php $news = $mysql->select("select * from `_tbl_noticeboard` where  NewsID='".$_GET['News']."'"); ?>
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
                                        <div class="card-body"> 
                                        <form method="post" action="" onsubmit="return submitPassword();">
                                            <div>
                                                 
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                         <?php echo $news[0]['NewsTitle'];?>
                                                    </div>
                                                </div>
                                                </div>
                                                   <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <?php echo str_replace("</pre>","",str_replace('<pre class="tw-data-text tw-text-large tw-ta" data-placeholder="Translation" id="tw-target-text" style="text-align:left" dir="ltr">',"",$news[0]['NewsText']));?>
                                                        <span class="errorstring" id="ErrNewsTitle"><?php echo isset($ErrNewsTitle)? $ErrNewsTitle : "";?></span>
                                                    </div>
                                                </div>
                                                  <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        Is Publish  : <?php echo $news[0]['IsPublish']==1 ? " Yes" : " No ";?>
                                                    </div>
                                                </div>
                                                  <div class="form-group row">
                                                    <div class="col-sm-12">
                                                       Created On : <?php echo $news[0]['CreatedOn']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
 <?php include_once("footer.php");?>             