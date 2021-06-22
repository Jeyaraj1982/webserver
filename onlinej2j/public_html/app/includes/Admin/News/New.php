
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <form action="" method="post" id="formsbmt">
            <textarea cols="" rows="" id="hContent" name="hContent" style="display: none;"></textarea>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                 Manage News
                                 <?php
    if (isset($_POST['hContent'])) {
        
        $content = str_replace("'","&rsquo;", $_POST['hContent']);
            $content = str_replace('"','&rdquo;', $content);
       
   
        $mysql->insert("_tbl_news",array("NewsTitle"=>$_POST['NewsTitle'],
                                         "NewsDescription"=>$content,
                                         "IsPublish"=>"1",
                                         "NewsFor"=>$_GET['f'],
                                         "CreatedOn"=>date("Y-m-d H:i:s")));
                                         ?>
                                         <script>
              $(document).ready(function() {
                    swal("News Published", {
                        icon : "success" 
                    });
                 });
            </script>
                                         <?php
    }
?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-12">
                                        <label>Title</label>
                                        <input type="text" name="NewsTitle" required placeholder="News Title" class="form-control">
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
                                        <label>&nbsp;</label>
                                        <input type="button" onclick="SendNews()" class="btn btn-warning" value="Display All <?php echo $_GET['f'];?>">
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
});
       
    </script>
