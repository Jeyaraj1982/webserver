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
                                            Manage WebSite Round Slider
                                        </div>
                                    </div>                                                    
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                   <div class="row">
                                    <div class="col-md-12">
                                    
                                    <div class="row">
                                                                                         
                                    <div class="col-md-12">
                                        <?php
                                            if (isset($_POST['UploadThumb'])) {
                                              
                                            $dup = $mysql->select("select * from _tbl_homepage where SubTourTypeID='".$_POST['SubTourTypeID']."'")  ;
                                            if (sizeof($dup)==0) {
                                               
                                                    $mysql->insert("_tbl_homepage",array("SubTourTypeID"=>$_POST['SubTourTypeID']));
                                                    echo "Added Successfully";
                                            } else {
                                                echo "Already exists";
                                            }
                                                
                                            }
                                        ?>
                                        <fieldset style="background:#f6f6f6;text-align:left;padding:10px;border:1px solid #f1f1f1">
                                         
                                                <form action="" method="post" enctype="multipart/form-data">
                                               <select name="SubTourTypeID" class="form-control">
                                               <?php
                                                   $SubTours = $mysql->select("select * from _tbl_sub_tour order by SubTourTypeName");
                                                   foreach($SubTours as $SubTour) {
                                                       ?>
                                                       <option value="<?php echo $SubTour['SubTourTypeID'];?>"><?php echo $SubTour['SubTourTypeName'];?></option>
                                                       <?php
                                                   }
                                               ?>
                                               </select>
                                               
                                                <button type="submit" name="UploadThumb" class="btn btn-primary btn-xs">Add Website</button>
                                            </form>
                                        </fieldset>
                                            
                                            
                                  
                                            
                                               
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                    </div>
                                    
                                </div>
                                    <hr>
                                <div class="row" style="margin-top: 40px;">
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $mysql->execute("delete from  _tbl_homepage  where md5(SubTourTypeID)='".$_GET['id']."'");
                                        }
                                        
                                         $SubTours = $mysql->select("select * from _tbl_sub_tour where SubTourTypeID in (select SubTourTypeID from _tbl_homepage) order by SubTourTypeName");
                                        
                                          {
                                    ?>
                                         <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Tour Name</th>
                                                <th scope="col">Sub Tour Name</th>
                                                <th scope="col" style="text-align: right">Packages</th>    
                                                <th scope="col">Added On</th>                           
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($SubTours as $tour){
                                            $t= $mysql->Select("select * from _tbl_tour where TourTypeID='".$tour['TourTypeID']."'");
                                            ?>
                                        <?php $packages= $mysql->Select("SELECT COUNT(PackageID) AS cnt FROM _tbl_tours_package where SubTourTypeID='".$tour['SubTourTypeID']."'"); ?>
                                            <tr>
                                                <td><img src="../<?php echo "uploads/".$tour['Image'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $t[0]['TourTypeName'];?></td>
                                                <td><?php echo $tour['SubTourTypeName'];?></td>
                                                <td style="text-align: right"><?php echo $packages[0]['cnt'];?></td>
                                                <td><?php echo $tour['AddedOn'];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Website/RoundSlider/list&id=<?php echo md5($tour['SubTourTypeID']);?>" draggable="false">Remove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            
                                            </tr>
                                        <?php } ?>
                                        
                                        </tbody>
                                    </table>
                            </div>
                                        <?php } ?>
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
    <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="confrimation_text" style="padding:10px;">
                    <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
                </div>
            </div>
        </div>
    </div>
<script>
    var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
    
    function CallConfirmation(CustomerReviewID){
        var txt = '<form action="" method="POST" id="Frm_'+CustomerReviewID+'">'
                    +'<input type="hidden" value="'+CustomerReviewID+'" id="CustomerReviewID" Name="CustomerReviewID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete Customer Review?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteCustomerReview(\''+CustomerReviewID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }                                                                                                 
 
    function DeleteCustomerReview(SliderID) {
        var param = $( "#Frm_"+SliderID).serialize();          
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=DeleteCustomerReview",param,function(data) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
            } else {
                html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Website/Reviews/list' class='btn btn-outline-danger'>Continue</a></div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
        });
    }
</script>