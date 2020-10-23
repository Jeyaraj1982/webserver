<?php
include_once("header.php");               
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sales_customers where md5(CustomerID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            //$cstmrname = $mysql->select("select * from _tbl_sales_customers where CustomerName='".$_POST['CustomerName']."' and CustomerID<>'".$data[0]['CustomerID']."'");
           // if(sizeof($cstmrname)>0){
             //   $ErrCustomerName ="Customer Name Already Exist";
               // $ErrorCount++;
            //}
            $dupmob = $mysql->select("select * from _tbl_sales_customers where MobileNumber='".$_POST['MobileNumber']."' and CustomerID<>'".$data[0]['CustomerID']."'");
            if(sizeof($dupmob)>0){
                $ErrMobileNumber ="Mobile Number Already Exist";
                $ErrorCount++;
            }
            if($_POST['EmailID']!=""){
            $dupemail = $mysql->select("select * from _tbl_sales_customers where EmailID='".$_POST['EmailID']."' and CustomerID<>'".$data[0]['CustomerID']."'");
            if(sizeof($dupemail)>0){
                $ErrEmailID ="EmailID Already Exist";
                $ErrorCount++;
            }
            }
            
            if($ErrorCount==0){
                                                                    
               $mysql->execute("update _tbl_sales_customers set `CustomerName`      ='".$_POST['CustomerName']."',
                                                                `CustomerNameTamil` ='".$_POST['CustomerNameTamil']."',
                                                                `ShopName`          ='".$_POST['ShopName']."',
                                                                `ShopNameTamil`     ='".$_POST['ShopNameTamil']."',
                                                                `MobileNumber`      ='".$_POST['MobileNumber']."',
                                                                `EmailID`           ='".$_POST['EmailID']."',
                                                                `MaximumCreditLimit`='".$_POST['MaximumCreditLimit']."',
                                                                `AddressLine1`      ='".str_replace("'","\\'",$_POST['AddressLine1'])."',
                                                                `AddressLine2`      ='".str_replace("'","\\'",$_POST['AddressLine2'])."',
                                                          `AddressLine3`            ='".str_replace("'","\\'",$_POST['AddressLine3'])."',
                                                          `IsActive`                ='".$_POST['IsActive']."' where CustomerID='".$data[0]['CustomerID']."'");
           
                $successmessage ="<span style='color:green'>Updated Successfully</span>";
      
              } else {
                $successmessage =  "<span style='color:red'>Sorry, there was an error update customer.</span>";
              }
                                         
                
    }
    
?>
<script>
$(document).ready(function () {
    $("#CustomerName").blur(function () {
        if(IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name In English")){
           IsAlphaNumeric("CustomerName","ErrCustomerName","Please Enter Alpha Numerics Character"); 
        }
    });
    /*$("#CustomerNameTamil").blur(function () {
        IsNonEmpty("CustomerNameTamil","ErrCustomerNameTamil","Please Enter Customer Name In Tamil");
    });*/
    $("#ShopName").blur(function () {
        if(IsNonEmpty("ShopName","ErrShopName","Please Enter Shop Name In English")){
           IsAlphaNumeric("ShopName","ErrShopName","Please Enter Alpha Numerics Character"); 
        }
    });
    /*$("#ShopNameTamil").blur(function () {
        IsNonEmpty("ShopNameTamil","ErrShopNameTamil","Please Enter Shop Name In Tamil");
    }); */
    $("#MobileNumber").blur(function () {
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
        }
    });
    $("#EmailID").blur(function () {
        var EmailID = $('#EmailID').val().trim();
         if (EmailID.length!=0) {
            if(IsNonEmpty("EmailID","ErrEmailID","Please Enter EmailID")){
               IsEmail("EmailID","ErrEmailID","Please Enter Valid EmailID"); 
            }
            }else {
               $('#ErrEmailID').html(""); 
            }
    });
    $("#AddressLine1").blur(function () {
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    });
    $("#MaximumCreditLimit").blur(function () {
        IsNonEmpty("MaximumCreditLimit","ErrMaximumCreditLimit","Please Enter Maximum Credit Limit");
    });
});
function SubmitCustomer() {
        ErrorCount=0;    
        $('#ErrCustomerName').html("");
        //$('#ErrCustomerNameTamil').html("");
        $('#ErrShopName').html("");
       // $('#ErrShopNameTamil').html("");
        $('#ErrMobileNumber').html("");
        $('#ErrEmailID').html("");
        $('#ErrMaximumCreditLimit').html("");
        $('#ErrAddressLine1').html("");
        
        if(IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name In Tamil")){
           IsAlphaNumeric("CustomerName","ErrCustomerName","Please Enter Alpha Numerics Character"); 
        }
        IsNonEmpty("CustomerNameTamil","ErrCustomerNameTamil","Please Enter Customer Name In Tamil");
        if(IsNonEmpty("ShopName","ErrShopName","Please Enter Shop Name In Tamil")){
           IsAlphaNumeric("ShopName","ErrShopName","Please Enter Alpha Numerics Character"); 
        }
        IsNonEmpty("ShopNameTamil","ErrShopNameTamil","Please Enter Shop Name In Tamil");
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
        }
        var EmailID = $('#EmailID').val().trim();
         if (EmailID.length!=0) {
            if(IsNonEmpty("EmailID","ErrEmailID","Please Enter EmailID")){
               IsEmail("EmailID","ErrEmailID","Please Enter Valid EmailID"); 
            }
         }
        IsNonEmpty("MaximumCreditLimit","ErrMaximumCreditLimit","Please Enter Maximum Credit Limit");
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");                                                                                                            
        return (ErrorCount==0) ? true : false;
}
</script>
 <script type="text/javascript" src="assets/js/google_jsapi.js"></script>
<script type="text/javascript">
   google.load("elements", "1", {
            packages: "transliteration"          });
      function onLoad() {
        var options = {
          sourceLanguage: 'en',
          destinationLanguage: ['ta'], 
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true        };
             var control =
            new google.elements.transliteration.TransliterationControl(options);
        var ids = ["CustomerNameTamil","ShopNameTamil"];
        control.makeTransliteratable(ids);
        //control.showControl('translControl'); 
         control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
        }
      google.setOnLoadCallback(onLoad);
</script>
         
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Customer</div>
                                </div>
                                <form method="POST" action="" onsubmit="return SubmitCustomer();" enctype="multipart/form-data">
                                    <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Code</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['CustomerCode'];?>">
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Name(In English)<span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="CustomerName" name="CustomerName" placeholder="Enter Customer Name In english" value="<?php echo (isset($_POST['CustomerName']) ? $_POST['CustomerName'] : $data[0]['CustomerName']);?>">
                                                <span class="errorstring" id="ErrCustomerName"><?php echo isset($ErrCustomerName)? $ErrCustomerName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Name (In Tamil)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="CustomerNameTamil" name="CustomerNameTamil" placeholder="Enter Customer Name In Tamil" value="<?php echo (isset($_POST['CustomerNameTamil']) ? $_POST['CustomerNameTamil'] :$data[0]['CustomerNameTamil']);?>">
                                                <span class="errorstring" id="ErrCustomerNameTamil"><?php echo isset($ErrCustomerNameTamil)? $ErrCustomerNameTamil : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Shop Name (In English)<span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ShopName" name="ShopName" placeholder="Enter Shop Name In English" value="<?php echo (isset($_POST['ShopName']) ? $_POST['ShopName'] :$data[0]['ShopName']);?>">
                                                <span class="errorstring" id="ErrShopName"><?php echo isset($ErrShopName)? $ErrShopName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Shop Name (In Tamil)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ShopNameTamil" name="ShopNameTamil" placeholder="Enter Shop Name In Tamil" value="<?php echo (isset($_POST['ShopNameTamil']) ? $_POST['ShopNameTamil'] :$data[0]['ShopNameTamil']);?>">
                                                <span class="errorstring" id="ErrShopNameTamil"><?php echo isset($ErrShopNameTamil)? $ErrShopNameTamil : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" maxlength="10" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :$data[0]['MobileNumber']);?>">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter Email ID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :$data[0]['EmailID']);?>">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Maximum Credit limit<span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MaximumCreditLimit" name="MaximumCreditLimit" placeholder="0.00" value="<?php echo (isset($_POST['MaximumCreditLimit']) ? $_POST['MaximumCreditLimit'] : $data[0]['MaximumCreditLimit']);?>">
                                                <span class="errorstring" id="ErrMaximumCreditLimit"><?php echo isset($ErrMaximumCreditLimit)? $ErrMaximumCreditLimit : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line 1</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :$data[0]['AddressLine1']);?>">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :$data[0]['AddressLine2']);?>">
                                                <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine3" name="AddressLine3" placeholder="Enter Address Line3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] :$data[0]['AddressLine3']);?>">
                                                <span class="errorstring" id="ErrAddressLine3"><?php echo isset($ErrAddressLine3)? $ErrAddressLine3 : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is Active</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsActive" id="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
                                                </select>                                                                                                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Customer">&nbsp;
                                                <a href="dashboard.php?action=Customers/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include_once("footer.php");?>