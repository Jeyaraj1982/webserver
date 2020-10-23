<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
    
        $ErrorCount =0;
            $cstmrname = $mysql->select("select * from _tbl_sales_admin where AdminName='".$_POST['UserName']."'");
            if(sizeof($cstmrname)>0){
                $ErrUserName ="User Name Already Exist";
                $ErrorCount++;
            }
            $dupmob = $mysql->select("select * from _tbl_sales_admin where UserName='".$_POST['LoginName']."'");
            if(sizeof($dupmob)>0){
                $ErrLoginName ="Login Name Already Exist";
                $ErrorCount++;                                                                    
            }
            
            if($ErrorCount==0){
                $random = sizeof($mysql->select("select * from _tbl_sales_admin")) + 1;
                $UserCode ="ADS0000".$random;
             
                        $id = $mysql->insert("_tbl_sales_admin",array("AdminCode"       => $UserCode,
                                                                          "AdminName"       => $_POST['UserName'],
                                                                          "UserName"  => $_POST['LoginName'],
                                                                          "Password"           => $_POST['Password'],
                                                                          "IsAdmin"           => "0",
                                                                          "CreatedOn"          => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){
                unset($_POST);
                $link="Users/list&status=All";
               ?>
                <script>
                 $(document).ready(function() {
                    successpopup('<?php echo $link;?>');
                 }); 
            </script>
       <?php
            }
      
              } else {  ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Add User", "warning")
             });
            </script>
            <?php  }
                                         
                
    }
    
?>
 <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add User</div>
                                </div>
                                <form method="POST" action=" " id="frm_User" onsubmit="return SubmitUser();" enctype="multipart/form-data">
                                    <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">User Name <span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter User Name In English" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :"");?>">
                                                <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Login Name <span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="LoginName" name="LoginName" placeholder="Enter Login Name" value="<?php echo (isset($_POST['LoginName']) ? $_POST['LoginName'] :"");?>">
                                                <span class="errorstring" id="ErrLoginName"><?php echo isset($ErrLoginName)? $ErrLoginName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password <span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Password" name="Password" placeholder="Enter Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>                                                     
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="beforeSubmit()">Add User</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display:none">Add User</button>&nbsp;
                                                <a href="dashboard.php?action=Users/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
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
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://klx.co.in/klxfranchisee/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
     var IsConfirm = 0;
$(document).ready(function () {
    $("#UserName").blur(function () {
        if(IsNonEmpty("UserName","ErrUserName","Please Enter User Name")){
           IsAlphaNumeric("UserName","ErrUserName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#LoginName").blur(function () {
        IsNonEmpty("LoginName","ErrLoginName","Please Enter Login Name");
    });
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
    });
});
function beforeSubmit() {
        ErrorCount=0;    
        $('#ErrUserName').html("");
        $('#ErrLoginName').html("");
        $('#ErrPassword').html("");
        
        if(IsNonEmpty("UserName","ErrUserName","Please Enter User Name")){
           IsAlphaNumeric("UserName","ErrUserName","Please Enter Alpha Numerics Character"); 
        }
        IsNonEmpty("LoginName","ErrLoginName","Please Enter Login Name");
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
         
        if(ErrorCount==0) {
            var txt = '<div class="form-group row">'
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'CONFIRMATION'
                            +'</div>'
                       +'</div>'
                       +'<div class="form-group row">'
                            +'<div class="col-sm-12" style="text-align:left">'
                            +'Are you sure want to add User?'
                            +'</div>'
                        +'</div>'
                        +'<div style="padding:20px;text-align:center">'
                            +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                            +'<button type="button" class="btn btn-success" onclick="AddUser()" >Yes, Confirm</button>'
                         +'</div>';  
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
}                                                                                                          
function AddUser() {
   $( "#btnsubmit" ).trigger( "click" );
}
function successpopup(link){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="http://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>User Added Successfully</span>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action='+link+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

</script>
        <?php include_once("footer.php");?>