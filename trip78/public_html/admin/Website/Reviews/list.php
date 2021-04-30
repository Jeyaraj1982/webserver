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
                                            Manage Customer Review
                                        </div>
                                    </div>                                                    
                                    <div class="col-md-6" style="text-align: right;">
                                        <a href="dashboard.php?action=Website/Reviews/add" class="btn btn-primary btn-xs">Add Customer Review</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Thumb</th>
                                                <th scope="col"> </th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sliders = $mysql->select("select * from _tbl_customer_reviews where IsActive='1'");?>
                                            <?php foreach($sliders as $slider){ ?>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <img src="<?php echo "../uploads/customerreview/".$slider['CustomerThumb'];?>" style='height:100px;margin-top: 5px;border-radius:50%'><br>
                                                    <?php echo $slider['CustomerName']; ?>
                                                </td>
                                                <td>
                                                    <div style="padding-top:10px">
                                                        <?php
                                                        echo "<b>". $slider['CustomerSubject']."</b><br>";
                                                        echo $slider['CustomerDescription']."<br>";
                                                        echo "Added: ".$slider['AddedOn']."<br>";
                                                        ?>
                                                    </div>
                                                    <div class="reviews-item-rating" style="color:#ffaa00">
                                                        <?php for($i=1;$i<=$slider['CustomerRating'];$i++) {?>
                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                    </div>
                                                    <div style="padding-bottom:10px">
                                                        <a href="dashboard.php?action=Website/Reviews/edit&Review=<?php echo $slider['CustomerReviewID'];?>" class="btn btn-primary btn-sm"  style='padding: 0px 10px;font-size: 10px;'>Edit</a>
                                                        &nbsp;&nbsp;<span onclick='CallConfirmation(<?php echo $slider['CustomerReviewID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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