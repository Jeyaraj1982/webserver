<?php include_once("../config.php");?>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>     
</head>
<body>
<style>
.card, .card-light {
    border-radius: 5px;
    background-color: #ffffff;
    margin-bottom: 30px;
    -webkit-box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);
    -moz-box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);
    box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);
    border: 0px;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;
    position: relative;
}
</style>
<?php 
     $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
     $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
     $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
?>
    <div class="row" style="margin-right:0px;margin-left:0px">
        <div class="col-12" style="padding-left: 0px;padding-right: 0px;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">     
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://www.trip78.in/uploads/package/<?php echo $Packages[0]['Image1'];?>" alt="First slide" style="height: 140px;">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://www.trip78.in/uploads/package/<?php echo $Packages[0]['Image2'];?>" alt="First slide" style="height: 140px;">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://www.trip78.in/uploads/package/<?php echo $Packages[0]['Image3'];?>" alt="First slide" style="height: 140px;">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://www.trip78.in/uploads/package/<?php echo $Packages[0]['Image4'];?>" alt="First slide" style="height: 140px;">
                </div>  
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 10px;">
                <div class="card-body">
                    <div class="form-group row" style="margin-left:0px !imporatant">
                        <div class="col-md-12">
                            <div class="col-md-2" style="width:100px;float:left">
                                <div style="font-size:15px"><?php echo $Packages[0]['NightsCount'];?></div>
                            </div>
                            <div class="col-md-10">
                                <h4><?php echo $Packages[0]['PackageName'];?></h4> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <button type="button" class="btn btn-danger" style="width:100%;color: white;font-weight:bold" onclick="getEnquiryDetails('<?php echo md5($Packages[0]['PackageID']);?>')">ENQUIRY FOR THIS PACKAGE</button>
        </div>
    </div>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
        <script>
          $(function(){
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $(window).resize(function(e) {
              if($(window).width()<=768){
                $("#wrapper").removeClass("toggled");
              }else{
                $("#wrapper").addClass("toggled");
              }
            });
          });
        $(document).ready( function(){
          // $("#sidebar-wrapper").hide(); 
            
        }); 
        $(document).ready(function () {
  $('#carouselExampleIndicators').find('.carousel-item').first().addClass('active');
}); 
        </script>
        <div class="modal fade"  id="ConfirmationPopup"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>
   <script>
   var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/images/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
    function getDateandCostDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=getDateandCostDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    function getEnquiryDetails(PackageID) {   
        
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=getEnquiryDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    
    function SaveEnquiryDetails() {
     var param = $( "#EnquiryFrom").serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=SubmitEnquiryDetails",param,function(data) {                                       
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/images/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
        } else {
            html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/images/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a data-dismiss='modal' class='gradient-button'>Continue</a></div></div>";
            html += "</div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
   </script>
</html> 