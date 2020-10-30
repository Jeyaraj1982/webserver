<?php
    $page="KYC";    
    include_once("settings_header.php");      
?>
<form method="post" action=""  enctype="multipart/form-data">
    <div class="col-sm-9"  style="margin-top: -8px;">
        <h4 class="card-title" style="margin-bottom:5px">KYC Process</h4>
        <span style="color:#999;">KYC stands for Know Your Customer process of identifying and verifying identity of members.</span>
        <br><br>
        <div class="form-group row">
            <div class="col-sm-12">
            <?php
                if (isset($_POST['updateIDProof'])) {
                    
                    $target_dir = "uploads/franchisee/";
                    $err=0;
                    $_POST['IDProofFileName']= "";
                    if (isset($_FILES["IDProofFileName"]["name"]) && strlen(trim($_FILES["IDProofFileName"]["name"]))>0 ) {
                        $idprooffilename = time().basename($_FILES["IDProofFileName"]["name"]);
                        if (!(move_uploaded_file($_FILES["IDProofFileName"]["tmp_name"], $target_dir . $idprooffilename))) {
                            $err++;
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    
                    if ($err==0) {
                        $_POST['IDProofFileName']= $idprooffilename;
                        $res = $webservice->getData("Franchisee","UpdateKYC",$_POST);
                        if ($res['status']=="success") {
                            echo  $res['message']; 
                        } else {
                            $errormessage = $res['message']; 
                        }
                    } else {
                        $res =$webservice->getData("Franchisee","UpdateKYC");
                }
                }
                  else {
                     $res =$webservice->getData("Franchisee","UpdateKYC");
                     
                }
               $Kyc =$webservice->getData("Franchisee","GetKYC");
            ?>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-3">ID Proof</div>
              <?php 
              
              if ($Kyc['data']['isAllowToUploadIDproof']==1) { ?>
                <div class="col-sm-3" >
                    <select name="IDType" id="IDType"  class="selectpicker form-control" data-live-search="true">
                        <?php foreach($Kyc['data']['IDProof'] as $IDType) { ?>
                            <option value="<?php echo $IDType['SoftCode'];?>" <?php echo ($_POST['IDType']==$IDType['SoftCode']) ? " selected='selected' " : "";?>> <?php echo $IDType['CodeValue'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3" style="padding-top: 5px;"><input type="file" name="IDProofFileName"></div>
                <br>
                <br>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9" style="margin-top: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#666;">In order to submit your KYC, your identification documents need to pass a verification process, done by our document authentication team.</span><br>
                    <button type="submit" class="btn btn-primary" name="updateIDProof" style="font-family:roboto;margin-top: 10px;">Submit Documents</button></div>
                </div>
                 
              <?php } 
              foreach($Kyc['data']['IdProofDocument'] as $idProof)  { ?>
              
              <div class="col-sm-7" style="padding-top: 5px;color: #888;margin-top:10px">  
                    <img src="<?php echo AppUrl;?>uploads/franchisee/<?php echo $idProof['FileName'];?>" style="height:120px;"><br><br>
                    Document Type&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $idProof['FileType'];?>
                    <br><img src="<?php echo SiteUrl?>assets/images/clock_icon.png" style="height:16px;width:16px;">&nbsp;Updated On&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo putDateTime($Kyc['data']['IdProofDocument'][0]['SubmittedOn']);?>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status &nbsp;&nbsp;:&nbsp;&nbsp;
                    <?php 
                        if($idProof['IsVerified']==0 && $idProof['IsRejected']==0){ 
                            echo "Verification pending";
                        } else if ($idProof['IsVerified']==1 && $idProof['IsRejected']==0) { 
                            echo "verified";
                        } else if($idProof['IsRejected']==1) { 
                            echo '<span style="color:red">Rejected</span><br>';    ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reason &nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $idProof['RejectedRemarks'];?>  
                       <br><img src="<?php echo SiteUrl?>assets/images/clock_icon.png" style="height:16px;width:16px;">&nbsp;Rejected On&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo putDateTime($idProof['RejectedOn']);?>
                      <?php }  ?>                                                               
              </div>
              <?php  } ?>
              
              </div>
        </form>
        <div class="form-group row" style="margin-bottom: 0px;" >
            <hr style="border:none;border-bottom:1px solid #eee;width:90%;margin:15px">
        </div>
            <form method="post" action=""  enctype="multipart/form-data">
         <?php
                if (isset($_POST['updateKYC'])) {
                    
                    $target_dir = "uploads/franchisee/";
                    $err=0;
                    $_POST['AddressProofFileName']= "";
                    
                    if (isset($_FILES["AddressProofFileName"]["name"]) && strlen(trim($_FILES["AddressProofFileName"]["name"]))>0 ) {
                        $addressfilename = time().basename($_FILES["AddressProofFileName"]["name"]);
                        if (!(move_uploaded_file($_FILES["AddressProofFileName"]["tmp_name"], $target_dir . $addressfilename))) {
                            $err++;
                            echo "Sorry, there was an error uploading your file..";
                        }
                    }
                    
                    if ($err==0) {
                        $_POST['AddressProofFileName']= $addressfilename;
                        $res = $webservice->getData("Franchisee","UpdateKYC",$_POST);
                        if ($res['status']=="success") {
                            echo  $res['message']; 
                        } else {
                            $errormessage = $res['message']; 
                        }
                    } else {
                        $res =$webservice->getData("Franchisee","UpdateKYC");
                }
                }
                  else {
                     $res =$webservice->getData("Franchisee","UpdateKYC");
                     
                }
               $Kyc =$webservice->getData("Franchisee","GetKYC");
            ?>                                                                       
        <div class="form-group row">
            <div class="col-sm-3">Address Proof</div>
              <?php if ($Kyc['data']['isAllowToUploadAddressproof']==1) { ?>
                <div class="col-sm-3" >
                    <select name="AddressProofType" id="AddressProofType"  class="selectpicker form-control" data-live-search="true">
                        <?php foreach($Kyc['data']['AddressProof'] as $AddressProofTypee) { ?>
                            <option value="<?php echo $AddressProofTypee['SoftCode'];?>" <?php echo ($_POST['AddressProofType']==$AddressProofTypee['SoftCode']) ? " selected='selected' " : "";?>> <?php echo $AddressProofTypee['CodeValue'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3" style="padding-top: 5px;"><input type="file" name="AddressProofFileName"></div>
                <br>
                <br>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9" style="margin-top: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#666;">In order to submit your KYC, your identification documents need to pass a verification process, done by our document authentication team.</span><br>
                    <button type="submit" class="btn btn-primary" name="updateKYC" style="font-family:roboto;margin-top: 10px;">Submit Documents</button></div>
                </div>  
              <?php } 
              foreach($Kyc['data']['AddressProofDocument'] as $addressProof)  { ?>
              
              <div class="col-sm-7" style="padding-top: 5px;color: #888;">  
                    <img src="<?php echo AppUrl;?>uploads/franchisee/<?php echo $addressProof['FileName'];?>" style="height:120px;"><br><br>
                    Document Type&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $addressProof['FileType'];?>
                    <br><img src="<?php echo SiteUrl?>assets/images/clock_icon.png" style="height:16px;width:16px;">&nbsp;Updated On&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo putDateTime($Kyc['data']['AddressProofDocument'][0]['SubmittedOn']);?>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status &nbsp;&nbsp;:&nbsp;&nbsp;
                    <?php 
                        if($addressProof['IsVerified']==0 && $addressProof['IsRejected']==0){ 
                            echo "Verification pending";
                        } else if ($addressProof['IsVerified']==1 && $addressProof['IsRejected']==0) { 
                            echo "verified";
                        } else if($addressProof['IsRejected']==1) { 
                            echo '<span style="color:red">Rejected</span><br>';    ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reason &nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $addressProof['RejectedRemarks'];?>  
                       <br><img src="<?php echo SiteUrl?>assets/images/clock_icon.png" style="height:16px;width:16px;">&nbsp;Rejected On&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo putDateTime($addressProof['RejectedOn']);?>
                      <?php }  ?>                                                               
              </div>
              <?php  } ?>
              
              </div> 
           
                 
               
           
            
            
     
       
</form>
<script>
 
    
 
 $( document ).ready(function() {
//     setTimout(function(){
  //   $('.bootstrap-select .form-control').css({"border":"1px solid #ccc !important"});     
    // },2000);
    
});
</script>
<?php include_once("settings_footer.php");?>                                
