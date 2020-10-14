<?php include_once("header.php");?>
<?php 

    print_r($_POST);
    $duplicate = $mysql->select("select * from  _tbl_member where MemberCode='".trim($_POST['MemberCode'])."'");
        if (sizeof($duplicate)>0) {
             $ErrMemberCode="Member Code already Exists";    
             $ErrorCount++;
        }
        
        $duplicate = $mysql->select("select * from  _tbl_member where EmailID='".trim($_POST['EmailID'])."'");
        if (sizeof($duplicate)>0) {
             $ErrEmailID="EmailID Already Exists";    
             $ErrorCount++;
        }
        
        $duplicate = $mysql->select("select * from  _tbl_member where MemberMobileNumber='".trim($_POST['MobileNumber'])."'");
        if (sizeof($duplicate)>0) {
             $ErrMobileNumber="Mobile Number Already Exists";    
             $ErrorCount++;
        }
        if ($ErrorCount==0) {     
                      $MemberCode=SeqMaster::GetNextMemberCode();                                                                      
     $Member = $mysql->insert("_tbl_member",array("MemberCode"          =>$MemberCode,
                                                  "MemberName"          => trim($_POST['FirstName']),
                                                  "MemberSurname"       => trim($_POST['Surname']),
                                                  "Username"            => trim($_POST['Username']),
                                                  "EmailID"             => trim($_POST['EmailID']),
                                                  "MemberPassword"      => trim($_POST['Password']),
                                                  "AddressLine1"        => trim($_POST['Address1']),
                                                  "AddressLine2"        => trim($_POST['Address2']),
                                                  "Country"             => trim($_POST['Country']),
                                                  "City"                => trim($_POST['City']),
                                                  "State"               => trim($_POST['State']),
                                                  "PinCode"             => trim($_POST['Pincode']),
                                                  "MemberMobileNumber"  => trim($_POST['MobileNumber']),
                                                  "SponsorID"           => $_SESSION['User']['MemberID'],
                                                  "SponsorCode"         => $_SESSION['User']['MemberCode'],
                                                  "Sponsorname"         => $_SESSION['User']['MemberName'],
                                                  "CreatedOn"           => date("Y-m-d H:i:s")));
     if ($Member>0) 
     $successmessage = "Member added successfully";
           // unset($_POST);
        } else {
            $errorMessage = "Error occured. Couldn't save member infomration";
        }
    
?>
<?php 
//$mdetail =$mysql->select("select * from  _tbl_member Where MemberID ='".$_GET['id']."'");
?>
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Add New Member
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="2">Enrollment Details</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>First Name</td>
                                                        <td><?php echo $_POST['FirstName'];?>
                                                            <input type="text"  value="<?php echo $_POST['FirstName'];?>" name="FirstName">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Surname</td>                                     .
                                                        <td><?php echo $_POST['Surname'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mail</td>
                                                        <td><?php echo $_POST['EmailID'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sponser</td>
                                                        <td><?php echo $_POST['SponsorName'];?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        <div class="form-group row">
                                        <div class="col-sm-3">
                                        <?php include_once("PaymentHeader.php");?>
                                        </div>
                                        <div class="col-sm-9">
                                        <div class="Col-sm-12" id="resdiv" style="width: 74%;">   
                                         
                                            </div>
                                            <div>
                                                <div style="display:none">
                                                    <div class="E-Pin" id="E-Pindiv" style="padding:40px;padding-bottom:100px;text-align:center;color:#aaa">
                                                        E-pin     <br>
                                                        <input type="text" name="E-Pin" id="E-Pin" class="form-control">
                                                    </div>
                                                    <div class="Paypal" id="Paypaldiv" style="padding:40px;padding-bottom:100px;text-align:center;color:#aaa">
                                                    
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="paymentsubmit">Submit</button>
                        </div>
                    </div>
                </div>
       </div>
       <script>
 function loadPaymentOption(pOption){
     $("#resdiv").html($("E-Pindiv"));
     if (pOption=="E-Pin") {                  
        $("#resdiv").html($('#E-Pindiv').html());
        $('#E-Pin').css({"background":"#95abfb"});
        $('#Paypal').css({"background":"Transparent"});
     }
     if (pOption=="Paypal") {
        $("#resdiv").html($('#Paypaldiv').html());
        $('#E-Pin').css({"background":"Transparent"});
        $('#Paypal').css({"background":"#95abfb"});
     }
 }
</script>
 <?php include_once("footer.php");?>             