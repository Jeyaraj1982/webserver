<?php include_once("header.php");?>
            <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Affiliate Link</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Affiliate Link</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small>F1</small>
                                <h4 class="text-primary m-b-0 font-medium">AJAI7</h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row m-b-30">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light-green"><h4 class="m-b-0 text-orange"><i class="mdi mdi-share-variant"></i>&nbsp;Share on Social Media & Increase Bonus</h4></div>
            <div class="card-body">
                <h6>Share on social medias and get more income!</h6>
                
                <div class="row button-group p-t-30">
                                    <div class="col-lg-6 col-xlg-6 mb-4">
                                        <button class="btn btn-lg btn-block font-medium btn-orange overlay-unblock text-white" id="left" >Left</button>
                                    </div>
                                    <div class="col-lg-6 col-xlg-6 mb-4">
                                        <button class="btn btn-lg btn-block font-medium btn-danger text-white without-overlay" id="right" >Right</button>
                                    </div>
                                    
            </div>
            <div class="row button-group">
                                    <div class="col-lg-12 col-xlg-6 mb-4">
                                        <button class="text-black position-relative border-left border-success text-bg bg-image bg-overlay-success p-0 btn btn-lg btn-block font-normal overlay-unblock text-left text-dark"  id="url"><i class="mdi mdi-hand-pointing-right display-6 float-left m-r-10"></i>&nbsp;&nbsp;<h6 class="font-normal" id="aff_url">https://ggcash.in/signup.php?ref=QUpBSTc~</h6></button>
                                    </div>
                                    
            </div>
        </div>
    </div>
</div>
</div>


<div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-facebook">
                                    <div class="card-body">
                                        <a  href="javascript: void(0)">
                                        <div class="d-flex no-block align-items-center">
                                            
                                            <div class="text-white">
                                                <h4>Facebook Share</h4>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-facebook"></i></span>
                                            </div>
                                            
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-6">
                                <a href="">
                                <div class="card bg-twitter">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-white">
                                                <h4>Twitter</h4>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-twitter-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        
                            <div class="col-lg-4 col-md-6">
                                
                                <div class="card bg-linkedin">
                                    <a href="javascript:void()">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-white">
                                                <h4>LinkedIn</h4>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-white display-6"><i class="ti-linkedin"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <script>

function setURL(pos){

var sitepath = "signup.php";    

var ref="QUpBSTc~";
if(pos == 'L'){
    $('#url').removeClass('btn-success');
    $('#url').removeClass('btn-cyan');
    $('#url').addClass('btn-primary');
} else if(pos == 'R'){
    $('#url').removeClass('btn-cyan');
    $('#url').addClass('btn-cyan');
}

document.getElementById('url').innerHTML="<i class='mdi mdi-hand-pointing-right display-6 float-left m-r-10'></i>&nbsp;&nbsp;<h6 class='font-medium' id='aff_url'>"+sitepath+"?ref="+ref+"&pos="+pos+"</h6>";

}    

</script>
<script type="text/javascript">
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  alert('URL Copied Successfully');
}
</script>            </div>
            

         <?php include_once("footer.php"); ?>



 
