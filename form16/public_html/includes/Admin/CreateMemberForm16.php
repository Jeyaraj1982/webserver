<?php 
    $_Month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $_SES = array("AM","PM");
    $_DOB_Year_Start = (date("Y")-18)-55;
    $_DOB_Year_End = date("Y")-18;
    $member= $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_GET['MCode']."'");
    if (isset($_POST['BtnSubmit'])) {
         echo "1";
        $Error=0;
        if (!(strlen(trim($_POST['Name']))>0)) {
            $ErrName ="Please Enter Your Name";
            $Error++;
        }
        
        if (!(strlen(trim($_POST['MobileNumber']))>0)) {
            $ErrMobileNumber = "Please Enter Mobile Number";                                      
            $Error++;
        }
        
        if (!(strlen(trim($_POST['EmailID']))>0)) {
            $ErrEmailID = "Please Enter Your Email";
            $Error++;
        }                                                                                                                       
                                                                                                                            
        
        echo "2";
        $data = $mysql->select("select * from `_tbl_form_16` where `FinancialYearID`='".$_POST['FinYear']."' and `FormByCode`='".$_GET['MCode']."'");
        if (sizeof($data)>0) {
            $ErrFinancialYear = "Financial Year Already Exists";
            $Error++;
        }
        
        if($Error==0){
            
            echo "3";
            
            $target_dir = "uploads/Form16/".$member[0]['MemberCode']."/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $err=0;
            $AadhaarCard="";
            $Form16="";
            $Pancard="";
            
            /* form16 upload */
            if (($_FILES['Form16']['size'] >= $maxfilesizeinbyes) || ($_FILES["Form16"]["size"] == 0)) {
                $err++;                                                                                                            
                $ErrForm16= "Please upload file. File must be less than ".$maxfilesizeinmb." megabytes.";
            } elseif ((!in_array($_FILES['Form16']['type'], $acceptableform16)) && (!empty($_FILES["Form16"]["type"]))) {
                $err++;
                $ErrForm16= "Invalid file type. Only JPG,PNG,JPEG,PDF types are accepted.";
            } else {
                $Form16 = strtolower("Form16_".time().$_FILES["Form16"]["name"]);
                if (!(move_uploaded_file($_FILES["Form16"]["tmp_name"], $target_dir . $Form16))) {
                    $err++;
                    $ErrForm16= "Sorry, there was an error uploading your files.";
                }
            }
            /* end of form16 upload */
           
            /* aadhar file upload */
            if (isset($_POST['AadhaarNumber']) && (strlen(trim($_POST['AadhaarNumber']))>0) ) {
                
            } else {
                if(($_FILES['AadhaarCard']['size'] >= $maxfilesizeinbyes) || ($_FILES["AadhaarCard"]["size"] == 0)) {
                    $err++;
                    $ErrAadhaarCard= "Please upload file. File must be less than ".$maxfilesizeinmb." megabytes.";
                } elseif ((!in_array($_FILES['AadhaarCard']['type'], $acceptableform16)) && (!empty($_FILES["AadhaarCard"]["type"]))) {
                    $err++;
                    $ErrAadhaarCard= "Invalid file type. Only JPG,PNG,JPEG,PDF types are accepted.";
                } else {
                    $AadhaarCard = strtolower("AadhaarCard_".time().$_FILES["AadhaarCard"]["name"]);
                    if (!(move_uploaded_file($_FILES["AadhaarCard"]["tmp_name"], $target_dir . $AadhaarCard))) {
                        $err++;
                        $ErrAadhaarCard= "Sorry, there was an error uploading your files.";
                    }
                } 
            }
            /* end aadhar file upload */
            
            /* pancard upload */
             if (isset($_POST['PanCardNumber']) && (strlen(trim($_POST['PanCardNumber']))>0) ) {
                
            } else {
                if(($_FILES['Pancard']['size'] >= $maxfilesizeinbyes) || ($_FILES["Pancard"]["size"] == 0)) {
                    $err++;
                    $ErrPancard= "Please upload file. File must be less than ".$maxfilesizeinmb." megabytes.";
                } elseif((!in_array($_FILES['Pancard']['type'], $acceptableform16)) && (!empty($_FILES["Pancard"]["type"]))) {
                    $err++;
                    $ErrPancard= "Invalid file type. Only JPG,PNG,JPEG,PDF types are accepted.";
                } else {
                    $Pancard = strtolower("PanCard_".time().$_FILES["Pancard"]["name"]);
                    if (!(move_uploaded_file($_FILES["Pancard"]["tmp_name"], $target_dir . $Pancard))) {
                        $err++;
                        $ErrPancard= "Sorry, there was an error uploading your file.";
                    }
                }
            }
            /* end of pancard upload */
            /* end of pancard upload */
            
            if ($err==0) {
                 
                $zip_file = "myattachments_".date("Y_d_h_i_s").".zip";
                
                switch($_POST['FormFor']) {
                    case 'Son of' : $gender="Male";break;
                    case 'Daughter of' : $gender="Female";break;
                    case 'Wife of' : $gender="Female";break;
                    default : $gender="";break;
                }
                
                    

                
                $Finance = $mysql->select("select * from _tblFinancialYears where FinancialYearID='".$_POST['FinYear']."'");
                $id = $mysql->insert("_tbl_form_16",array("FinancialYearID"  => $_POST['FinYear'],                          
                                                          "FinancialYear"    => $Finance[0]['FinancialYear'],                          
                                                          "AssestmentYear"   => $_POST['assyearval'],                          
                                                          "AadhaarCard"      => $AadhaarCard,                          
                                                          "Form16"           => $Form16, 
                                                          "PanCard"          => $Pancard,
                                                          "PanCardNumber"    => trim($_POST['PanCardNumber']), 
                                                          "AadhaarNumber"    => trim($_POST['AadhaarNumber']),   
                                                          "AccountNumber"    => $_POST['AccountNumber'], 
                                                          "AccountName"      => $_POST['AccountName'], 
                                                          "IFSCode"          => $_POST['IFSCode'], 
                                                          "Name"             => $_POST['Name'], 
                                                          "Gender"           => $gender, 
                                                          "DateofBirth"      => trim($_POST['dateofbirth']), 
                                                          "MobileNumber"     => $_POST['MobileNumber'], 
                                                          "EmailID"          => $_POST['EmailID'], 
                                                          "AddressLine1"     => $_POST['AddressLine1'], 
                                                          "AddressLine2"     => $_POST['AddressLine2'],                         
                                                          "Pincode"          => $_POST['Pincode'], 
                                                          "CityName"         => $_POST['CityName'], 
                                                          "FormFor"          => $_POST['FormFor'], 
                                                          "FormForName"      => $_POST['FormForName'], 
                                                          "FormBy"           => $member[0]['MemberName'], 
                                                          "Remarks"          => $_POST['Remarks'], 
                                                          "FormByID"         => $member[0]['MemberID'], 
                                                          "FormByCode"       => $member[0]['MemberCode'], 
                                                          "StaffID"          => $_SESSION['User']['AdminID'],
                                                          "zip_file"         => $zip_file, 
                                                          "CreatedOn"        => date("Y-m-d H:i:s"))); 
                                                          
               if ($id>0) {
                    $form_target =  $target_dir.$id;
                    if (!is_dir($form_target)) {
                        mkdir($form_target, 0777, true);
                    }
                    rename($target_dir.$Form16, $form_target.'/'.$Form16);
                    if ($AadhaarCard!="") {
                        rename($target_dir.$AadhaarCard, $form_target.'/'.$AadhaarCard);    
                    }
                    if ($Pancard!="") {
                        rename($target_dir.$Pancard, $form_target.'/'.$Pancard);
                    }
                    
                    $filename = $form_target."/".$zip_file;
                    $zip = new ZipArchive();
                    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
                        
                    }
                    createZip($zip,$form_target."/"); 
                    $zip->close();  
                    
                    $mysql->insert("_tbl_formlogs",array("ActionPerformed"    => date("Y-m-d H:i:s"),
                                                         "FormID"             => $id,
                                                         "CustomerID"         => '0',
                                                         "ActionTitle"        => 'Form 16 Submitted by Staff',
                                                         "ActionDescription"  => '0',
                                                         "MemberID"           => $member[0]['MemberID'],
                                                         "UserRemarks"        => "",
                                                         "AdminRemarks"       => "",
                                                         "UpdatedStaffID"     => $_SESSION['User']['AdminID'],
                                                         "UpdatedStaffName"   => $_SESSION['User']['AdminName']));
                  MobileSMS::sendSMS($_POST['MobileNumber'],SMSTemplate::submitTemplete("Member",$id,$member[0]['MemberName'] ),$member[0]['MemberID']);
                
                $mparam['MailTo']=$_POST['EmailID'];
                $mparam['MemberID']=$id;
                $mparam['Subject']="Form16 Created";
                $mparam['Message']=$message;
                MailController::Send($mparam,$mailError);
                 echo "<script>location.href='dashboard.php?action=Form16Created';</script>";
                    exit;
                } else {
                    echo "<script>location.href='dashboard.php?action=Form16Created';</script>"; 
                }                                           
            }                                                                                                                     
        } 
    }
?>
<script>
    
    var IsAadhaarAttached=0;
    function showAddhar(action) {
        $("#ErrAadhaarCard").html("");
        if (action=='1') {
            $('#AadhaarNumber').show();
            $('#AadhaarCard').hide();
            $("#AadhaarCard").val("");
            IsAadhaarAttached=0;
        } else {
            $('#AadhaarNumber').hide();
            $('#AadhaarNumber').val("");
            $('#AadhaarCard').show();
            $( "#AadhaarCard" ).trigger( "click" );
            IsAadhaarAttached=1;
        }
    }  
              
    var IsPanCardAttached=0;
    function showPanCard(action) { 
        $("#ErrPancard").html("");
        if (action=='1') {
            $('#PanCardNumber').show();
            $('#Pancard').hide();
            $("#Pancard").val("");
            IsPanCardAttached=0;
        } else {
            $('#PanCardNumber').hide();
            $('#PanCardNumber').val("");   
            $('#Pancard').show();
            $("#Pancard").trigger( "click" );
            IsPanCardAttached=1;
        }
    }
  
    
    $(document).ready(function () {
        $("#MobileNumber").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#ErrMobileNumber").html("Digits Only").fadeIn().fadeIn("fast");
                return false;
            }
        });
        
        $("#Name").blur(function () {
            if(IsNonEmpty("Name","ErrName","Please Enter Name")){
                IsAlphabet("Name","ErrName","Please Enter Alphabet Characters Only");
            }
        });
              
        $("#FinYear").change(function () {
            if ($('#FinYear').val()==0)  {
                $("#ErrFinYear").html("Please select financial year");  
            } else {
                $("#ErrFinYear").html("");  
            }
        });
        $("#MobileNumber").blur(function () {
            if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
                IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid mobile number");
            }
        });
        
        $("#EmailID").blur(function () {
            if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
                IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
            }
        });
        $("#datepicker").blur(function () {
            if(IsNonEmpty("datepicker","Errdatepicker","Please Select Date of Birth")){
                var current_year = new Date();
                var seleted_year = new Date($("#datepicker").val());
                if (parseInt(seleted_year.getFullYear())<=(parseInt(current_year.getFullYear())-18)) {
                    $("#Errdatepicker").html("");  
                } else {
                    $("#Errdatepicker").html("must have greater than 18 Years");  
                    ErrorCount++;
                }
            }
        });
        $("#Form_16").change(function () {
            if ($('#Form_16')[0].files.length ===0 ) {
                $("#ErrForm16").html("Please select Form16");  
            } else {
                $("#ErrForm16").html("");  
            }
            var filename = $("#Form_16").val();
            var extension = filename.replace(/^.*\./, '');
            if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
            var c=0;
            switch (extension) {                   
                case 'jpg': c++; break;              
                case 'jpeg': c++; break;
                case 'pdf': c++; break;         
                case 'png': c++; break;
                default: $("#ErrForm16").html("allowed only jpg, png and pdf"); break;
            }
            
            if (c>0) {
                $('#Form16Lbl').html("<i class='fas fa-check'></i> Selected");
            }
        });
        
        $("#Pancard").change(function () {
            if ($('#Pancard')[0].files.length ===0 ) {
                $("#ErrPancard").html("Please select Pancard");  
                ErrorCount++;
            } else {
                $("#ErrPancard").html("");  
            }
            var filename = $("#Pancard").val();
            var extension = filename.replace(/^.*\./, '');
            if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
            var c=0;
            switch (extension) {
                case 'jpg': c++; break;            
                case 'jpeg': c++; break;
                case 'pdf':c++; break;         
                case 'png': c++; break;
                default: $("#ErrPancard").html("allowed only jpg, png and jpeg"); break;
            }
            if (c>0) {
                $('#PancardLbl').html("<i class='fas fa-check'></i> Selected");
                $('#PanCardNumber').val("");
                IsPanCardAttached=1;                  
            }
        });
         $("#PanCardNumber").blur(function () {
             if ($("#PanCardNumber").val().length>0) {
                  $('#PancardLbl').html("<i class='fas fa-cloud-upload-alt''></i> Upload");
                   $("#Pancard").val("");
                   IsPanCardAttached=0;
             } else {
                
             }
        }); 
        
        $("#AadhaarCard").change(function () {
            if ($('#AadhaarCard')[0].files.length ===0 ) {
                $("#ErrAadhaarCard").html("Please select AadhaarCard");  
                ErrorCount++;
            } else {
                $("#ErrAadhaarCard").html("");  
            }
            var filename = $("#AadhaarCard").val();
            var extension = filename.replace(/^.*\./, '');
            if (extension == filename) {                           
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
            var c=0;
            switch (extension) {
                case 'jpg': c++;break;             
                case 'jpeg':  c++;break;
                case 'pdf': c++;break;         
                case 'png':   c++;break;
                default: $("#ErrAadhaarCard").html("allowed only jpg, png and jpeg"); break;
            }
            if (c>0) {
                $('#AadhaarCardLbl').html("<i class='fas fa-check'></i> Selected");
                $('#AadhaarNumber').val("");
                IsAadhaarAttached=1;                  
            }
        });
        $("#AadhaarNumber").blur(function () {
            //IsNonEmpty("AadhaarNumber","ErrAadhaarCard","Please Enter Aadhaar Number");
            
            if ($("#AadhaarNumber").val().length>0) {
                  $('#AadhaarCardLbl').html("<i class='fas fa-cloud-upload-alt''></i> Upload");
                   $("#AadhaarCard").val("");
                   IsAadhaarAttached=0;
             } else {
                
             }
        });
        
        //  IsAadhaarAttached=0;  AadhaarNumber
        
        $("#AccountNumber").blur(function () {
            IsNonEmpty("AccountNumber","ErrAccountNumber","Please Enter Account Number");
        });
        $("#AccountName").blur(function () {       
            IsNonEmpty("AccountName","ErrAccountName","Please Enter Account Name");
        });                                                                                                                   
        $("#IFSCode").blur(function () {
            IsNonEmpty("IFSCode","ErrIFSCode","Please Enter IFSC Code");
            var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;    
            if ($("#IFSCode").val().match(reg)) {    
                $("#ErrIFSCode").html("");    
            } else { 
                $("#ErrIFSCode").html("Invalid IFSC Code");    
            } 
        });
        $("#AddressLine1").blur(function () {
            IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter AddressLine1");
        });
        $("#Pincode").blur(function () {
            IsNonEmpty("Pincode","ErrPincode","Please Enter Pincode");
            if ($("#Pincode").val().length!=6) {
                $("#ErrPincode").html("Invalid pincode");      
            }
            if (!(parseInt($("#Pincode").val())>100000 && parseInt($("#Pincode").val())<999999)) {
                $("#ErrPincode").html("Invalid pincode");  
            }
        });
        $("#CityName").blur(function () {
            IsNonEmpty("CityName","ErrCityName","Please Enter CityName");
        });
        $("#FormForName").blur(function () {
            IsNonEmpty("FormForName","ErrFormForName","Please Enter For Name");
        });
         
       
    });
    var count=0;
    function SubmitProfile() {
        ErrorCount=0;                                                                                                               
        $('#ErrName').html("");            
        $('#ErrMobileNumber').html("");
        $('#ErrEmailID').html("");
        $('#ErrForm16').html("");
        $('#ErrPanCard').html("");
        $('#ErrAadhaarCard').html("");
        $('#ErrAccountNumber').html("");
        $('#ErrAccountName').html("");
        $('#ErrIFSCode').html("");
        $('#ErrAddressLine1').html("");
        $('#ErrPincode').html("");
        $('#ErrCityName').html("");
        $('#ErrFormForName').html(""); 
        $('#ErrFinYear').html(""); 
        if ($('#FinYear').val()==0)  {
            $("#ErrFinYear").html("Please select financial year");  
            ErrorCount++; 
        }
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
            IsAlphabet("Name","ErrName","Please enter Alphabet Characters Only");
        }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){                                    
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid Mobile Number");
        }
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
            IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
        }
         var current_year = new Date();
        var seleted_year = new Date($("#datepicker").val());
        if (parseInt(seleted_year.getFullYear())<=(parseInt(current_year.getFullYear())-18)) {
            $("#Errdatepicker").html("");  
        } else {
            $("#Errdatepicker").html("must have greater than 18 Years");  
            ErrorCount++;
        }
        if ($('#Form_16')[0].files.length ===0 ) {
            $("#ErrForm16").html("Please select Form16");  
            ErrorCount++;
        } else {
            $("#ErrForm16").html("");  
        }
        if (IsAadhaarAttached==1) {
            if ($('#AadhaarCard')[0].files.length ===0 ) {
                $("#ErrAadhaarCard").html("Please select AadhaarCard");  
                ErrorCount++;
            } else {
                $("#ErrAadhaarCard").html("");  
            }
        }                                                                                                            
        if (IsPanCardAttached==1) {
        if ($('#Pancard')[0].files.length ===0 ) {
            $("#ErrPancard").html("Please select Pancard");  
            ErrorCount++;
        } else {
            $("#ErrPancard").html("");  
        }
        
        }
        IsNonEmpty("AccountNumber","ErrAccountNumber","Please Enter Account Number")
        IsNonEmpty("AccountName","ErrAccountName","Please Enter Account Name")
        IsNonEmpty("IFSCode","ErrIFSCode","Please Enter IFSC Code")
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter AddressLine1");
        IsNonEmpty("Pincode","ErrPincode","Please Enter Pincode");
        IsNonEmpty("CityName","ErrCityName","Please Enter City Name");
        IsNonEmpty("FormForName","ErrFormForName","Please Enter For Name");   
            
        var filename = $("#Form_16").val();
        var extension = filename.replace(/^.*\./, '');
        if (extension == filename) {
            extension = '';
        } else {
            extension = extension.toLowerCase();
        }
        switch (extension) {
            case 'jpg': break;              
            case 'jpeg':  break;
            case 'pdf': break;
            case 'png': break;
            default: ErrorCount++; $("#ErrForm16").html("allowed only jpg, png and pdf"); break;
        } 
        
          
    
        if (IsPanCardAttached==1) {
        var filename = $("#Pancard").val();
        var extension = filename.replace(/^.*\./, '');
        if (extension == filename) {
            extension = '';
        } else {
            extension = extension.toLowerCase();
        }

        switch (extension) {
            case 'jpg':  break;            
            case 'jpeg': break;
            case 'pdf': break;             
            case 'png': break;
            default: ErrorCount++; $("#ErrPancard").html("allowed only jpg, png and jpeg"); break;
        }
        } else {
              IsNonEmpty("PanCardNumber","ErrPancard","Please Enter Pancard Number");
        }
        
        if (IsAadhaarAttached==1) {
        var filename = $("#AadhaarCard").val();
        var extension = filename.replace(/^.*\./, '');
        if (extension == filename) {                           
            extension = '';
        } else {
            extension = extension.toLowerCase();
        }                 

        switch (extension) {
            case 'jpg': break;             
            case 'jpeg':  break;
            case 'pdf': break;          
            case 'png':   break;
            default: ErrorCount++; $("#ErrAadhaarCard").html("allowed only jpg, png and jpeg"); break;
        }
        } else {
            IsNonEmpty("AadhaarNumber","ErrAadhaarCard","Please Enter Aadhaar Number");
        }
        
        
        IsNonEmpty("IFSCode","ErrIFSCode","Please Enter IFSC Code");
        var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;    
        if ($("#IFSCode").val().match(reg)) {    
            $("#ErrIFSCode").html("");    
        } else {
            ErrorCount++; 
            $("#ErrIFSCode").html("Invalid IFSC Code");    
        } 
        if ($("#Pincode").val().length!=6) {
            ErrorCount++;
            $("#ErrPincode").html("Invalid pincode");      
        }
        if (!(parseInt($("#Pincode").val())>100000 && parseInt($("#Pincode").val())<999999)) {
            ErrorCount++;
            $("#ErrPincode").html("Invalid pincode");  
        }
        if (ErrorCount==0) {
            if (count==1) {
                return true;
            }
            
            swal({title: 'Are you sure?',
                  text: "You want to submit form16!",
                  type: 'warning',
                  buttons:{
                            cancel: {
                                visible: true,                      
                                text : 'No, cancel!',
                                className: 'btn btn-danger'
                            },                    
                            confirm: {
                                text : 'Yes, submit it!',                   
                                className : 'btn btn-warning'       
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
                    <div class="page-header">
                        <h4 class="page-title">Form16</h4>
                    </div>
                    <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitProfile();">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Member Details</div>
                                </div>
                                <div class="card-body"> 
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Member Name  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MemberName'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Member Mobile Number  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MobileNumber'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Member Email ID  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['EmailID'];?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="form-group form-show-validation row">                                                                                                                                                         
                                            <label for="Gender" class="col-sm-3 text-left" style="font-weight:normal">Financial Year<span class="required-label">*</span></label>
                                            <div class="col-sm-4 text-left">
                                                <select id="FinYear" name="FinYear" class="form-control">   
                                                    <option value="0">Select Financial Year</option>
                                                <?php $FinancialYears = $mysql->select("select * from _tblFinancialYears");?>                          
                                                     <?php foreach($FinancialYears as $FinancialYear) { ?>
                                                     <option value="<?php echo $FinancialYear['FinancialYearID'];?>" assyear="<?php echo $FinancialYear['AssesmentYear'];?>" <?php echo ($_POST[ 'FinYear']) ? " selected='selected' " : "";?>><?php echo $FinancialYear['FinancialYear'];?></option>
                                                     <?php } ?>
                                                </select>                                 
                                                 <span class="errorstring" id="ErrFinYear"><?php echo isset($ErrFinancialYear)? $ErrFinancialYear : "";?></span>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">                                                                                                                                                         
                                            <label for="Gender" class="col-sm-3 text-left" style="font-weight:normal">Assessment Year</label>
                                            <div class="col-sm-4 text-left">
                                                <input type="text" readonly="readonly" class="form-control" name="assyearval" id="assyearval">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="AadhaarCard" class="col-sm-3 text-left" style="font-weight:normal">Form16<span class="required-label">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="Form_16" name="Form16" style="display: none;">
                                            <label for="Form_16" class="btn btn-info" id="Form16Lbl" style="margin-bottom:0px;color:#fff !important;width:100%"><i class="fas fa-cloud-upload-alt"></i> Form 16</label>
                                            <span class="errorstring" id="ErrForm16"><?php echo isset($ErrForm16)? $ErrForm16 : "";?></span>
                                        </div>
                                    </div>                                                       
                                    <div class="form-group form-show-validation row">
                                        <label for="AadhaarCard" class="col-sm-3 text-left" style="font-weight:normal">Aadhaar Card  <span class="required-label">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="AadhaarCard" name="AadhaarCard" style="display: none;" >
                                             <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Aadhaar Number" aria-label="" value="<?php echo $_POST['AadhaarNumber'];?>" aria-describedby="basic-addon1" id="AadhaarNumber" name="AadhaarNumber">
                                                <div class="input-group-postend">
                                                    <label for="AadhaarCard" class="btn btn-info" id="AadhaarCardLbl" style="margin-bottom:0px;color:#fff !important"><i class="fas fa-cloud-upload-alt"></i> Upload</label>
                                                </div>
                                            </div>
                                            <span style="color:#888;font-size:12px">either enter aadhaar card number or upload</span><br>
                                            <span class="errorstring" id="ErrAadhaarCard"><?php echo isset($ErrAadhaarCard)? $ErrAadhaarCard : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="Pancard" class="col-sm-3 text-left" style="font-weight:normal">PanCard  <span class="required-label">*</span></label>
                                        <div class="col-sm-5">                               
                                            <input type="file" class="form-control" id="Pancard" name="Pancard"  style="display: none;">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Pan Card Number" aria-label="" value="<?php echo $_POST['PanCardNumber'];?>" aria-describedby="basic-addon1" id="PanCardNumber" name="PanCardNumber">
                                                <div class="input-group-postend">
                                                    <label for="Pancard" class="btn btn-info" id="PancardLbl" style="margin-bottom:0px;color:#fff !important"><i class="fas fa-cloud-upload-alt"></i> Upload</label>
                                                </div>
                                            </div>
                                            <span style="color:#888;font-size:12px">either enter pancard number or upload</span><br>
                                            <span class="errorstring" id="ErrPancard"><?php echo isset($ErrPancard)? $ErrPancard : "";?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Bank Details</div>
                                </div>
                                <div class="card-body">        
                                        <div class="form-group form-show-validation row">
                                            <label for="AccountName" class="col-sm-3 text-left" style="font-weight:normal">Account Name  <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="AccountName" name="AccountName" value="<?php echo (isset($_POST['AccountName']) ? $_POST['AccountName'] :"");?>" Placeholder="Account Name">
                                                <span class="errorstring" id="ErrAccountName"><?php echo isset($ErrAccountName)? $ErrAccountName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AccountNumber" class="col-sm-3 text-left" style="font-weight:normal">Account Number  <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="AccountNumber" name="AccountNumber" value="<?php echo (isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] :"");?>" Placeholder="Account Number">
                                                <span class="errorstring" id="ErrAccountNumber"><?php echo isset($ErrAccountNumber)? $ErrAccountNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AccountName" class="col-sm-3 text-left" style="font-weight:normal">IFSC Code <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="IFSCode" name="IFSCode" value="<?php echo (isset($_POST['IFSCode']) ? $_POST['IFSCode'] :"");?>" Placeholder="IFSC Code">
                                                <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Personal Details</div>
                                </div>
                                <div class="card-body"> 
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3" style="font-weight:normal">Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>"Placeholder="Name">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left"></label>
                                            <div class="col-sm-2 text-left">
                                                <select id="FormFor" name="FormFor" class="form-control" style="width:83px;padding-left: 2px;">
                                                    <option value="Son of" <?php echo ($_POST['FormFor']=="Son of") ? " selected='selected' " : "";?>>Son of</option>
                                                    <option value="Daughter of" <?php echo ($_POST['FormFor']=="Daughter of") ? " selected='selected' " : "";?>>Daughter of</option>
                                                    <option value="Wife of" <?php echo ($_POST['FormFor']=="Wife of") ? " selected='selected' " : "";?>>Wife of</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 text-left" style="font-weight:normal">
                                                <input type="text" class="form-control" id="FormForName" name="FormForName" value="<?php echo (isset($_POST['FormForName']) ? $_POST['FormForName'] :"");?>" Placeholder="Name">
                                                <span class="errorstring" id="ErrFormForName"><?php echo isset($ErrFormForName)? $ErrFormForName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Gender" class="col-sm-3 text-left" style="font-weight:normal">Date of Birth</label>
                                            <div class="col-sm-5 text-left">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker" name="dateofbirth"  placeholder="Date of Birth" value="<?php echo (isset($_POST['dateofbirth'])) ? $_POST['dateofbirth'] : "";?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar-check"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                 <span class="errorstring" id="Errdatepicker"><?php echo isset($Errdatepicker)? $Errdatepicker : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">                                                                  
                                            <label for="MobileNumber" class="col-sm-3 text-left" style="font-weight:normal">Mobile Number <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="MobileNumber" maxlength="10" name="MobileNumber" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" Placeholder="Mobile Number">
                                                </div>
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Email" class="col-sm-3 text-left" style="font-weight:normal">Email <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" Placeholder="Email ID">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AddressLine1" class="col-sm-3 text-left" style="font-weight:normal">Address <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>" Placeholder="AddressLine1">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AddressLine2" class="col-sm-3 text-left"></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :"");?>" Placeholder="AddressLine2">
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="CityName" class="col-sm-3 text-left" style="font-weight:normal">City Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="CityName" name="CityName" value="<?php echo (isset($_POST['CityName']) ? $_POST['CityName'] :"");?>" Placeholder="City Name">
                                                <span class="errorstring" id="ErrCityName"><?php echo isset($ErrCityName)? $ErrCityName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Pincode" class="col-sm-3 text-left" style="font-weight:normal">Pincode <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="Pincode" name="Pincode" value="<?php echo (isset($_POST['Pincode']) ? $_POST['Pincode'] :"");?>" Placeholder="Pincode">
                                                <span class="errorstring" id="ErrPincode"><?php echo isset($ErrPincode)? $ErrPincode : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Pincode" class="col-sm-3 text-left" style="font-weight:normal">Remarks</label>
                                            <div class="col-sm-5">
                                                <textarea name="Remarks" id="Remarks" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $Successmessage;?> </div>
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
                                            <a href="dashboard.php?action=ManageForm16&Status=All" class="btn btn-outline-warning">Cancel</a>
                                            <button type="submit" class="btn btn-warning" name="BtnSubmit" id="BtnSubmit">Submit Order</button>
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
$(function() { 
    $("#FinYear").change(function(){ 
        var element = $(this).find('option:selected'); 
        var myTag = element.attr("assyear"); 

        $('#assyearval').val(myTag); 
    }); 
    
     $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#FormFor').select2({
            theme: "bootstrap"
        });
         <?php if (isset($_POST['FinYear'])) {?>
            var element = $("#FinYear").find('option:selected'); 
        var myTag = element.attr("assyear"); 
        $('#assyearval').val(myTag);
        <?php } ?>
}); 
</script>
 