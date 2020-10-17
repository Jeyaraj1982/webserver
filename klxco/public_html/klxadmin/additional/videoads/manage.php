
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Video Ads
                            </div>
                        </div>
                        <div class="card-body">    
                            <div style="text-align: right;">
                            
                                <a href="dashboard.php?action=additional/videoads/newad" class="btn btn-info btn-sm">Add</a>
                            </div>
                        
                           <?php
                                    if (isset($_POST['DeleteBtn'])) {
                                        $mysql->execute("delete from Ads_Video where VideoAdID='".$_POST['VideoAdID']."'");
                                        echo "<div style='color:green'>Deleted Successfully</div>";
                                    }
                                ?>
                                
                            <div class="table-responsive">
                             
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td class="mytdhead" style="width:50px;">Ad ID</td>
                                            <td class="mytdhead" style="width:50px;">Video</td>
                                            <td class="mytdhead" style="width:110px;">Created On</td>
                                            <td class="mytdhead">&nbsp;</td>  
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php 
                                        $data = $mysql->select("select * from Ads_Video order by VideoAdID Desc");
                                        foreach($data as $r){     ?>
                                        <tr>
                                            <td><?php echo $r["VideoAdID"];?></td>
                                           <td class="mytd">
                                           
                                           <div style="padding:10px;margin:10px;border:1px solid #ccc;font-size:13px;margin-left:0px">
   <video width="320px" height="240px" controls poster="images/aaranjudefault.jpg">
          <source src="https://www.klx.co.in/assets/videoads/<?php echo $r["FileName"];?>" type="video/mp4">
        Your browser does not support the video tag.
       </video>
</div>


                                             </td>
                                           <td class="mytd"><?php echo $r["CreatedOn"];?></td>
                                           <td class="mytd">
                                           <form action="" method="post">
                                           <input type="hidden" value="<?php echo $r['VideoAdID'];?>" name="VideoAdID">
                                            <button type="submit" style="display: none;" class="btn btn-success btn-sm" id="DeleteBtn" name="DeleteBtn">Delete</button>
                                            <button type="button" onclick="CallConfirmation()" class="btn btn-success btn-sm">Delete</button>
                                           </form>
                                           
                                           
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
 <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
function CallConfirmation(){
    var text = '<div class="modal-header" style="padding-bottom:5px">'
                    +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                    +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                        +'<span aria-hidden="true" style="color:black">&times;</span>'
                    +'</button>'
                 +'</div>'
                 +'<div class="modal-body">'
                    +'<div class="form-group row">'                                                            
                        +'<div class="col-sm-12">'
                            +'Are you sure want to delete ad?<br>'
                        +'</div>'
                    +'</div>'
                 +'</div>'
                 +'<div class="modal-footer">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-danger" onclick="DeleteAd()" >Yes, Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
} 
function DeleteAd(){
    $( "#DeleteBtn" ).trigger( "click" );
}
</script>
