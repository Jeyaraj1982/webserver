<?php 
  
    if (isset($_POST['BtnSubmit'])) {
        
        $Error=0;
        if (!(strlen(trim($_POST['CustomerName']))>0)) {
            $ErrCustomerName ="Please Enter Customer Name";
            $Error++;
        }
        if (!(strlen(trim($_POST['CustomerMobileNumber']))>0)) {
            $ErrCustomerMobileNumber = "Please Enter Customer Mobile Number";                                      
            $Error++;
        }
        
        $dataA = $mysql->select("select * from `_tbl_Members` where `MemberName`='".$_POST['CustomerName']."'");
        if (sizeof($dataA)>0) {
            $ErrCustomerName = "Customer Name Already Exists";
            $Error++;
        }
        $dataA = $mysql->select("select * from `_tbl_Members` where `MobileNumber`='".$_POST['CustomerMobileNumber']."'");
        if (sizeof($dataA)>0) {
            $ErrCustomerMobileNumber = "Customer Mobile Number Already Exists";
            $Error++;
        }
         $dataA = $mysql->select("select * from `_tbl_Members` where `EmailID`='".$_POST['CustomerEmailID']."'");
        if (sizeof($dataA)>0) {
            $ErrCustomerEmailID = "Customer Email ID Already Exists";
            $Error++;
        }
        
        if($Error==0){
            $MemberCode   = SeqMaster::GetNextMemberCode();
            
                 $Mid = $mysql->insert("_tbl_Members",array("MemberName"     => $_POST['CustomerName'],
                                                           "MemberCode"     => $MemberCode,
                                                           "MobileNumber"   => $_POST['CustomerMobileNumber'],
                                                           "EmailID"        => $_POST['CustomerEmailID'],
                                                           "IsCustomer"     => "1",
                                                           "AgentID"        => $_SESSION['User']['AgentID'],
                                                           "CreatedOn"      => date("Y-m-d H:i:s")));   
                                                           
                if(sizeof($Mid)>0){
                    echo "<script>location.href='dashboard.php?action=CustomerCreated';</script>";
                }
            }                                                                                                                     
        } 
?>
<script>
    $(document).ready(function () {
        $("#CustomerMobileNumber").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#ErrCustomerMobileNumber").html("Digits Only").fadeIn().fadeIn("fast");
                return false;
            }
        });
        
        $("#CustomerName").blur(function () {
            if(IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name")){
                IsAlphabet("CustomerName","ErrCustomerName","Please Enter Alphabet Characters Only");
            }
        });
        $("#CustomerMobileNumber").blur(function () {
            if(IsNonEmpty("CustomerMobileNumber","ErrCustomerMobileNumber","Please Enter Customer Mobile Number")){
                IsMobileNumber("CustomerMobileNumber","ErrCustomerMobileNumber","Please enter valid mobile number");
            }
        });
        $("#CustomerEmailID").blur(function () {
            if(IsNonEmpty("CustomerEmailID","ErrCustomerEmailID","Please Enter Customer Email ID")){
                IsEmail("CustomerEmailID","ErrCustomerEmailID","Please enter valid Customer Email ID");
            }
        });
        
    });
    var count=0;
    function SubmitProfile() {
        ErrorCount=0;                                                                                                               
        $('#ErrCustomerName').html("");            
        $('#ErrCustomerMobileNumber').html("");
        $('#ErrCustomerEmailID').html("");
       
        if(IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name")){
            IsAlphabet("CustomerName","ErrCustomerName","Please enter Alphabet Characters Only");
        }
        if(IsNonEmpty("CustomerMobileNumber","ErrCustomerMobileNumber","Please Enter Customer Mobile Number")){                                    
            IsMobileNumber("CustomerMobileNumber","ErrCustomerMobileNumber","Please enter valid Mobile Number");
        }
        if(IsNonEmpty("CustomerEmailID","ErrCustomerEmailID","Please Enter Customer Email ID")){
            IsEmail("CustomerEmailID","ErrCustomerEmailID","Please enter valid Customer Email ID");
        }
        if (ErrorCount==0) {
            if (count==1) {
                return true;
            }
            
            swal({title: 'Are you sure?',
                  text: "You want to submit !",
                  type: 'warning',
                  buttons:{
                            cancel: {
                                visible: true,                      
                                text : 'No, cancel!',
                                className: 'btn btn-danger'
                            },                    
                            confirm: {
                                text : 'Yes, submit it!',                   
                                className : 'btn btn-success'       
                            }
                        }
                    }).then((willDelete) => {
                        if (willDelete) {
                            count++;
                           $("#BtnSubmit").trigger("click");
                            return true;
                            /*swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                                buttons : {
                                    confirm : {
                                        className: 'btn btn-success'
                                    }
                                }
                            }); */
                        } else {
                            return false;
                            /*
                            swal("Your imaginary file is safe!", {
                                buttons : {
                                    confirm : {
                                        className: 'btn btn-success'
                                    }
                                }
                            });  */
                        }
                    });
           return false;
     }  else {
         swal("Couldn't be processed", "Somthing was missed, please check", {
                        icon : "warning",
                        buttons: {                    
                            confirm: {
                                text : " Continue ",
                                className : 'btn btn-warning'
                            }
                        },
                    });
         return false;
     }
}                   
</script>

        <!-- Sidebar -->
<style>
label{
    font-weight: normal;
}
</style>              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    
                    <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitProfile();">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create Customer</div>
                                </div>
                                <div class="card-body"> 
                                    <div class="form-group form-show-validation row">
                                        <label for="CustomerName" class="col-sm-3" style="font-weight:normal">Customer Name <span class="required-label">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="CustomerName" name="CustomerName" value="<?php echo (isset($_POST['CustomerName']) ? $_POST['CustomerName'] :"");?>"Placeholder="Customer Name">
                                            <span class="errorstring" id="ErrCustomerName"><?php echo isset($ErrCustomerName)? $ErrCustomerName : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="CustomerMobileNumber" class="col-sm-3" style="font-weight:normal">Customer Mobile Number <span class="required-label">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="CustomerMobileNumber" maxlength="10" name="CustomerMobileNumber" value="<?php echo (isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] :"");?>"Placeholder="Customer Mobile Number">
                                            <span class="errorstring" id="ErrCustomerMobileNumber"><?php echo isset($ErrCustomerMobileNumber)? $ErrCustomerMobileNumber : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="CustomerEmailID" class="col-sm-3" style="font-weight:normal">Customer Email ID <span class="required-label">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="CustomerEmailID" name="CustomerEmailID" value="<?php echo (isset($_POST['CustomerEmailID']) ? $_POST['CustomerEmailID'] :"");?>"Placeholder="Customer Email ID">
                                            <span class="errorstring" id="ErrCustomerEmailID"><?php echo isset($ErrCustomerEmailID)? $ErrCustomerEmailID : "";?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                     <div class="row">
                        <div class="col-md-12"> 
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                            <a href="dashboard.php?action=ManageCustomer&Status=All" class="btn btn-outline-danger">Cancel</a>
                                            <button type="submit" class="btn btn-warning" name="BtnSubmit" id="BtnSubmit">Create Customer</button>
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
function submitForm() {
     
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        buttons:{
                            cancel: {
                                visible: true,
                                text : 'No, cancel!',
                                className: 'btn btn-danger'
                            },                    
                            confirm: {
                                text : 'Yes, delete it!',
                                className : 'btn btn-warning'
                            }
                        }
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                                buttons : {
                                    confirm : {
                                        className: 'btn btn-warning'
                                    }
                                }
                            });
                        } else {
                            swal("Your imaginary file is safe!", {
                                buttons : {
                                    confirm : {
                                        className: 'btn btn-warning'
                                    }
                                }
                            });
                        }
                    });
                
}

</script>
