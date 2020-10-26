

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
     <?php   
      if (isset($_POST['hContent'])) {
        
        $content = str_replace("'","&rsquo;", $_POST['hContent']);
            $content = str_replace('"','&rdquo;', $content);
       
   
        $mysql->execute("update _tbl_news set NewsTitle='".$_POST['NewsTitle']."',
                                              IsPublish='".$_POST['IsPublish']."',
                                              NewsDescription='".$content."' where   md5(concat('J!',NewsID))='".$_GET['d']."'");
                                         
                                         
                                         ?>
                                         <script>
              $(document).ready(function() {
                    swal("News Updated", {
                        icon : "success" 
                    });
                 });
            </script>
                                         <?php
    }
    $data = $mysql->select("select * from _tbl_news where md5(concat('J!',NewsID))='".$_GET['d']."'");
   
?>

            <form action="" method="post" id="formsbmt">
            <textarea cols="" rows="" id="hContent" name="hContent" style="display: none;"><?php echo $data[0]['NewsDescription'];?></textarea>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                 Edit News
                                 
                            </div>
                        </div>
                        
                       
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-12">
                                        <label>Title</label>
                                        <input type="text" name="NewsTitle" value="<?php echo $data[0]['NewsTitle'];?>" placeholder="News Title" class="form-control">
                                    </div>
                            </div>
                             <div class="row">
                                    <div class="col-sm-12">
                                       <label>&nbsp;</label> 
                                       <div id="summernote"></div>
                                    </div>
                            </div>
                              <div class="row">
                                    <div class="col-sm-12">
                                        <label>Status</label>
                                        <select name="IsPublish" class="form-control">
                                            <option value="1" <?php echo $data[0]['IsPublish']==1 ? " selected='selected' " : "";?>>Publish</option>
                                            <option value="0" <?php echo $data[0]['IsPublish']==0 ? " selected='selected' " : "";?>>Un Publish</option>
                                        </select>
                                    </div>
                            </div> 
                             <div class="row">
                                    <div class="col-sm-12">
                                        <label>&nbsp;</label>
                                        <br><br>
                                        <input type="button" onclick="SendNews()" class="btn btn-warning" value="Update">
                                    </div>
                            </div> 
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>

function SendNews() {
       $('#hContent').val($('.note-editable').html());
       $('#formsbmt').submit();
}
$( document ).ready(function() {
    $('#summernote').summernote({
            placeholder: ' ',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
        
        $('.note-editable').html($('#hContent').val());
});
       
    </script>
