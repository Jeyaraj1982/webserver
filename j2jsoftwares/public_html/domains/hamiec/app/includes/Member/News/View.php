<?php
    $data = $mysql->select("select * from _tbl_news where md5(concat('J!',NewsID))='".$_GET['d']."'");
   
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                 <?php echo $data[0]['NewsTitle'];?>
                                 <br><span style="color:#888;font-size:12px"><?php echo $data[0]['CreatedOn'];?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            
                             <div class="row">
                                    <div class="col-sm-12">
                                       <label>&nbsp;</label> 
                                       <div>
                                             <?php echo $data[0]['NewsDescription'];?>
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
<script>
    
    </script>
