<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Add Video Addvertisement
                            </div>
                        </div>
 <?php
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
            
         
            
           
     /*             if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("mp4");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a mp4 file.";
      }
      
      if($file_size > 20971520*5) {
         $errors[]='File size must be excately 100 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../assets/videoads/".$file_name);
         
         
            $param=array("FileName" => $file_name,
                              
                               "CreatedOn"      => date("Y-m-d H:i:s"));
                               
               $id = $mysql->insert("Ads_Video",$param);
               
               if(sizeof($id)>0){
                   unset($_POST);
                  echo $obj->printSuccess("Saved Successfully");
              }  else {
                  echo $obj->printError("Error");
              }  
         
         
      }else{
         echo $obj->printError(implode(",",$errors));
      }
   }*/
        $file_name = $_FILES['image']['name'];          
     $param=array("FileName"    => $_POST['image'],
                   "CreatedOn"  => date("Y-m-d H:i:s"));
                               
               $id = $mysql->insert("Ads_Video",$param);
               
               if(sizeof($id)>0){
                   unset($_POST);
                  echo $obj->printSuccess("Saved Successfully");
              }  else {
                  echo $obj->printError("Error");
              }            
            
      }                             
?>        
<script>
$(document).ready(function(){
     $("#uploadimage1").blur(function(){     
           $('#Errimage1').html("");   
            var im = $('#uploadimage1').val().trim();
                if (im.length==0) {
                    $('#Errimage1').html("Please Upload Image");
                }
        });
});
function dovalidation() {
    $('#Errimage1').html("");
     error=0;
     var im = $('#uploadimage1').val().trim();
            if (im.length==0) {
                $('#Errimage1').html("Please Upload Image");
                error++;
            }
     if(error==0){
         return true;
     }else{
         return false
     }
}        
</script>
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return dovalidation();">
                            <div class="card-body">  
                            
                                                <input type="file" id='files' name="files[]" multiple style="display:none">
                                    <input type="hidden" name="image" id="uploadimage1">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Video File</label>
                                    <div class="col-md-3">
                                        <div id="div_1">
                                            <img id="src_image1" onclick="fupload()" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                        </div> 
                                        <!--<input type="file" name="image" required="required">-->
                                        <span class="errorstring" id="Errfile"></span>
                                        <div id="previews"></div>
                                        <div id="progressdiv" style="border:1px solid #ccc;background:#f1f1f1;height:20px">
                                        <div id="progress-bar" class="progress-bar" style="height:18px"></div>
                                        </div>
                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">Save</button>
                                        <a href="dashboard.php?action=additional/videoads/manage" class="btn btn-outline-success">Back</a>
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
<string name="image_chooser" style="display:none">File Chooser</string>
<script>
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://klx.co.in/klxadmin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function fupload() {
    $('#files').trigger('click');
}

    var loadingGif="<img src='https://www.klx.co.in/assets/loading.gif' style='width:96px'>";
    
    
   var img_count=0;
   var uploaded_count=0;
   var img_path = '<?php echo "../assets/videoads/";?>';
   
   $(document).ready(function(){
       
       $('#files').change(function() {
           $('#file_upload_progress').html();
           $('#file_upload_error').html();
           var form_data = new FormData();
           var p="";
           var error_txt="";
           var totalfiles = document.getElementById('files').files.length;
         
          // for (var index = uploaded_count; index < (uploaded_count+totalfiles); index++) {
           for (var index = 0; index < (totalfiles); index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
                  $('#file_upload_error').html(document.getElementById('files').files[index]);
                
              //  p += "<div id='img"+img_count+"' style='border:1px solid #ccc;height:100px;width:100px;float:left;margin-right:5px;margin-bottom:5px;'>"+loadingGif+"</div>";
                $('#div_'+(img_count+1)).html("<div id='img"+img_count+"'>"+loadingGif+"</div>");
                   img_count++;
            }
           
            $.ajax({                                     
                url: 'https://www.klx.co.in/ajaxfile2.php',
                   type: 'post',
                   xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                       $(".progress-bar").width(percentComplete + '%');
                        $("#file_upload_error").html(percentComplete+'%');
                        $('#Errimage1').html("");
                        
                    }
                }, false);
                return xhr;
            },
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('#file_upload_progress').html('-');
            },
             error:function(){
                $('#file_upload_progress').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
                   data: form_data,                
                   dataType: 'json',
                   contentType: false,                                            
                   processData: false,
                   success: function (response) {
                   $('#files').val("");
                   
                       
                   for(var index = 0; index < response.length; index++) {
                       if (response[index]['error']==0) {
                        var src = response[index]['filename'];
                            $('#img'+uploaded_count).html('<video width="320px" height="240px" controls poster="images/aaranjudefault.jpg"><source src="https://www.klx.co.in/assets/videoads/'+src+'" type="video/mp4">Your browser does not support the video tag.</video>');
                            $('#uploadimage1').val(src);
                            $(".progress-bar").hide();
                            $("#progressdiv").hide();
                            $('#Errimage1').html("");
                            uploaded_count++;       
                       } else {
                            $('#uploadimage1').val("");
                            $('#img'+uploaded_count).html("<div style='font-size:10px;color:red;text-align:center'>"+response[index]['message']+"</div>");
                            uploaded_count++;  
                       }
                    }                                        
                    
                   
                }
            });
        });
        
         $(".progress-bar").width('0%');
    });                        
    
    
   
    
    </script> 