<?php
    include_once("header.php");
    $adID = $_GET['ad'];
    $d = JPostads::getAd($adID,isset($_SESSION['USER']['userid']) ? $_SESSION['USER']['userid'] : 0);
    $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
    $t = "";
    foreach(explode(" ",$d[0]['title']) as $x) {
        if (trim($x)!="") {
            $x = str_replace(array(","),"",trim($x));
           $t.=trim($x); 
        }
        $t.="-";
    }                                                    
   $t .= $d[0]['postadid']; 
?>

<div class="main-panel" style="width: 100%;height:auto !important;">
    <div class="container">
        <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
            <div class="row">                                                     
                <div class="col-md-12">
                    <div class="card">  
                    Please Contact Administrator
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main-panel" style="width: 100%;height:auto !important;display:none">
    <div class="container">
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
            <div class="row">                                                     
                <div class="col-md-12">
                    <div class="card">                                                     
                        <div class="card-header" style="text-align: center;border:none">
                            <h2 style="text-transform: uppercase;">Reach more buyers and sell faster</h2>
                            <h6>Upgrade your Ad to a top position</h6>
                        </div>
                        <div class="card-body" style="border:none">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="https://www.klx.co.in/pay_instamajo.php" method="post">
                                        <input type="hidden" value="<?php echo $adID;?>" name="adID">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3>Top Ad</h3>
                                                    <ul>
                                                        <li>Get noticed with 'Top Ad' tag in a top position</li>
                                                        <li>Ad will be highlighted to top positions</li>
                                                    </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div style="border:1px solid #ccc;padding:10px;padding-right:0px;padding-left:5px" onclick="$('#submitbtn').val('Pay Rs. 299');">
                                                    <div class="custom-control custom-radio" style="margin-right:0px">
                                                        <input type="radio" class="custom-control-input" id="Plan" name="Plan" value="1" checked="checked">
                                                        <label class="custom-control-label" for="Plan"><b>Top 1 Ad for 30 Days</b><br>Rs. 299<br>
                                                        <span style="color:#999;font-size:12px">Reach upto 10 times more buyers</span></label>
                                                    </div> 
                                               </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-top:10px">
                                               <div style="border:1px solid #ccc;padding:10px;padding-right:0px;padding-left:5px" onclick="$('#submitbtn').val('Pay Rs. 100');">
                                                    <div class="custom-control custom-radio" style="margin-right:0px">
                                                        <input type="radio" class="custom-control-input" id="Plan2"  value="2"  name="Plan">
                                                        <label class="custom-control-label" for="Plan2"><b>Top 1 Ad for 7 Days</b><br>Rs. 100<br>
                                                        <span style="color:#999;font-size:12px">Reach upto 4 times more buyers</span></label>
                                                    </div> 
                                               </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-top:10px;">
                                                <div style="background:#a5d8ff;padding:10px;">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div style="font-weight:bold;font-size:15px;padding-top: 5px;padding-left: 20px;">Heavy  discount on Business Packages</div>
                                                         </div>
                                                         <div class="col-sm-4" style="text-align: right;">
                                                            <a class="btn btn-primary btn-sm" style="border:1px solid #fff !important;" href="https://www.klx.co.in/in/upgrade/c<?php echo $d[0]['postadid'];?>">VIEW PACKAGES</a>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top:20px;padding:0px;text-align:center">
                                            <input type="submit" value="Pay Rs. 299" id="submitbtn" name="submitbtn" class="btn btn-primary" style="width:60%;margin:0px auto">
                                        </div>
                                    </form>
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
var ht;
function requestToViewAdContact(id) {
    
    if (id==0) {
         $('#myModal').modal("show");
        return;
    }                        
    
    $.ajax({url:'<?php echo base_url;?>rest.php?action=requestToViewAdContact&postid='+id,success:function(data){
        ht = $('#contactinfo').html();
        $('#contactinfo').html(data);
        
    }});
}

function errorModal(msg) {
    $('#errormsg').html(msg);
     $('#myErrorModal').modal("show");
        return;
}
</script>

 <div class="modal fade " id="myModal">
<div class="modal-dialog">
    <div class="modal-content">

       
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       
      <div class="modal-body" style="text-align: center;">
       You must login <br>to view contact information<br><br><br>
       <a class="btn btn-outline-primary" href="<?php echo path_url;?>login" style="width: 200px;">
                                Login 
                            </a>        <br><br>
                                <a class="btn btn-primary" style="color:#fff;width:200px" href="<?php echo path_url;?>register">
                                Register 
                            </a>
                            <br><br>
        
      </div>

       
       
    </div>
  </div>
  </div>
  
  
   <div class="modal fade " id="myErrorModal">
<div class="modal-dialog">
    <div class="modal-content">

       
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       
      <div class="modal-body" id="errormsg" style="text-align: center;">
       
        
      </div>

       
       <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div> 
    </div>
  </div>
  </div>
  <script>
 
 setInterval("sendMessage(0)",10000);
 
  </script>
<?php include_once("footer.php"); ?>