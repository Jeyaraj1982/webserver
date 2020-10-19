<?php
$month = array("","Jan","Feb","Mar","Apr","May","Jun","Jly","Aug","Sep","Oct","Nov","Dec");

if (isset($_POST['ReGenerate'])) {
    $xdata = $mysqldb->select("select * from _BonusCardRegistration where  md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'");
    generateBonusCard($xdata[0]['BonusCardRegID']);
} 

    if (isset($_POST['FormUpdate'])) {
               $error = 0;
                 if (!($_POST['Amount']>=100 && $_POST['Amount']<=1000000)) {
                    $error++;
                  $errorAmount = "Amount must be Rs. 100 To Rs. 1000000"  ;    
                 }
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)){
            $error++;
            $errorAmount = "Invalid Mobile Number";    
        } 
                 
          
          if ($error==0)    {
            $EntryDate = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
            
               $DueDate = date('Y-m-d', strtotime($EntryDate. ' + '.$_POST['Days'].' days')); ;   
            $id =  $mysqldb->execute("update _BonusCardRegistration set ApplicantName       ='". trim($_POST['ApplicantName'])."',
                                                                        BonusCardNumber     ='". trim($_POST['BonusCardNumber'])."',
                                                                        MobileNumber     ='". trim($_POST['MobileNumber'])."',
                                                                        EntryDate           ='". $EntryDate."',
                                                                        DueDate             ='". $DueDate."',
                                                                        Days                ='". trim($_POST['Days'])."',
                                                                        GoldGrams           ='". trim($_POST['GoldGrams'])."',
                                                                        Amount              ='". trim($_POST['Amount'])."',
                                                                        Scheme              ='". trim($_POST['Scheme'])."',
                                                                        Remarks             ='". trim($_POST['Remarks'])."' where
                                                                        md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'");
                                                                      
               $data = $mysqldb->select("select * from _BonusCardRegistration where md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'"); 
                 generateBonusCard($data[0]['BonusCardRegID']);
          }
    }
    $data = $mysqldb->select("select * from _BonusCardRegistration where md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'");
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">                                                                     
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">Bonus Cards</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bonus Cards</li>
                                </ol>
                            </nav>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-xlg-7 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form action="" class="customform ajax-form" id="signupForm" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">     
                    <label for="fullName">NAME OF THE APPLICANT (Mr/Mrs/Others)<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="ApplicantName" id="ApplicantName" value="<?php echo (isset($_POST['ApplicantName']) ? $_POST['ApplicantName'] : $data[0]['ApplicantName']);?>" required placeholder="Applicant's Name">
                    <span style="color:red"><?php echo $errorMember;?></span>                              
                </div>
                 <div class="col-sm-6">     
                                    <label for="fullName">MobileNumber<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="MobileNumber" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>" required placeholder="Applicant's MobileNumber">
                                    <span style="color:red"><?php echo $errorMobileNumber;?></span>                              
                                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-6">
                    <label>Entry Date<span style="color:red">*</span></label><br>                       
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control" required="" name="date" id="date">
                                <?php for($i=1;$i<=31;$i++) {?>
                                <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) ? (($_POST['date']==$i) ? " selected='selected' ": "") : (date("d",strtotime($data[0]['EntryDate']))==$i) ? " selected='selected' ": "") ;?> ><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>                
                        <div class="col-sm-5">
                            <select class="form-control" required="" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
                            <?php for($i=1;$i<=12;$i++) { ?>
                                <option value="<?php echo $i;?>" <?php echo (isset($_POST['month']) ? (($_POST['month']==$i) ? " selected='selected' ": "") : (date("m",strtotime($data[0]['EntryDate']))==$i) ? " selected='selected' ": "") ;?> ><?php echo $month[$i];?></option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                                <?php for($i=2020;$i<=date("Y")+2;$i++) {?>
                                <option value="<?php echo $i;?>" <?php echo (isset($_POST['year']) ? (($_POST['year']==$i) ? " selected='selected' ": "") : (date("Y",strtotime($data[0]['EntryDate']))==$i) ? " selected='selected' ": "") ;?> ><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                 
                                <div class="col-sm-3">
                                    <label for="Days">Days<span style="color:red">*</span></label>
                                    <input type="text" onblur="addDaysWRONG()" class="form-control" name="Days" id="Days" value="<?php echo isset($_POST['Days']) ? $_POST['Days'] :  $data[0]['Days'];?>" required placeholder="Days">
                                    <span style="color:red"><?php echo $errorDays;?></span>
                                </div>
                                <div class="col-sm-3">
                                    <label for="Days">Expire Date</label>
                                    <input type="text" class="form-control"   id="eDays" value="<?php echo isset($_POST['eDays']) ? $_POST['eDays'] : date("d-M-Y",strtotime($data[0]['DueDate']));?>"  disabled="disabled" placeholder="Expire Date">
                                    <span style="color:red"><?php echo $errorDays;?></span>
                                </div>
            </div>                                                                                      
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-6">
                    <label for="BonusCardNumber">Bonus Card Number<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="BonusCardNumber" id="BonusCardNumber" value="<?php echo (isset($_POST['BonusCardNumber']) ? $_POST['BonusCardNumber'] : $data[0]['BonusCardNumber']);?>" required placeholder="Bonus Card Number">
                    <span style="color:red"><?php echo $errorBonusCardNumber;?></span>                         
                </div>
                
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-6">
                    <label for="GoldGrams">Gold Grams<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="GoldGrams" id="GoldGrams" value="<?php echo (isset($_POST['GoldGrams']) ? $_POST['GoldGrams'] : $data[0]['GoldGrams']);?>" required placeholder="Gold Grams">
                    <span style="color:red"><?php echo $errorGoldGrams;?></span>
                </div>
                <div class="col-sm-6">
                    <label for="Amount">Amount<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="Amount" id="Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : $data[0]['Amount']);?>" required placeholder="Amount ">
                    <span style="color:red"><?php echo $errorAmount;?></span>
                </div> 
            </div>
            <div class="row" style="margin-top:10px;">                                          
                <div class="col-sm-6">
                    <label for="Scheme">Scheme<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="Scheme" id="Scheme" value="<?php echo (isset($_POST['Scheme']) ? $_POST['Scheme'] : $data[0]['Scheme']);?>"   placeholder="Scheme">
                    <span style="color:red"><?php echo $errorScheme;?></span>
                </div>
                <div class="col-sm-6">
                    <label for="Remarks">Remarks</label>
                    <input type="text" class="form-control" name="Remarks" id="Remarks" value="<?php echo (isset($_POST['Remarks']) ? $_POST['Remarks'] : $data[0]['Remarks']);?>"   placeholder="Remarks">
                    <span style="color:red"><?php echo $errorRemarks;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <button class="btn btn-primary" name="FormUpdate" type="submit">Udate</button>
                </div>
            </div>
        </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-xlg-5 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Created On</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['RequestedOn'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">QRCode</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['QrCode'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Binary Code</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['BonusCardNumber'];?>">
                            </div>
                        </div> 
                        
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                            <label for="fullName">Bonus Card</label>  
                         <img src="assets/bonus_cards/<?php echo $data[0]['FileName'];?>" style="width: 100%;">
                         <br>  <br>
                         <form action="" method="post">
                          <input type="submit" value="Re-Generate" name="ReGenerate" class="btn btn-primary"> 
                          <a href="download.php?file=bonus_cards/<?php echo $data[0]['FileName'];?>" target="_blank" class="btn btn-secondary">Download</a>
                          <input type="button" disabled="disabled" value="Send To Whatsapp">&nbsp;
                          </form>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </div>
                </div>
            </div>    
            <script>
 function getData() {
     var pin = $('#PinCode').val();
      $('#errorPincode').html("");
     $.ajax({url:'../pincode.php?pincode='+pin,success:function(data){
         if (data=="") {
             $('#errorPincode').html("invalid pincode");
               $('#State').val("");
               $('#District').val("");
         } else {
          
          var array = data.split(","); 
               $('#State').val(array[1]);
               $('#District').val(array[0]);
         }
     }});
 }
 </script>
 
 
 
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="http://www.ggcash.in/app/assets/tick.png"><br><br>
        Updated successfully.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <a href="dashboard.php?action=BonusCard/Edit&code=<?php echo md5("JJ".$data[0]['BonusCardRegID']);?>" class="btn btn-danger" data-dismiss="modal">Close</a>
      </div>

    </div>
  </div>
</div>
 
<!-- The Modal -->
<div class="modal" id="myModalError">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="http://www.ggcash.in/app/assets/info.png"><br><br>
        Upadate failed, some required fields are missing.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 
<?php
    if (isset($id) && $id>0) {
        ?>
        <script>
               
                    setTimeout(function(){
                        $('#myModal').modal("show");    
                    },2000)
               
                </script>                            
        <?php
    }
?>
<?php
    if (isset($error) && $error>0) {
        ?>
        <script>
                                                                   
                    setTimeout(function(){
                        $('#myModalError').modal("show");    
                    },2000)                                                         
               
                </script>
        <?php
    }
?>

<script>
function formatDate(date) {
    var a = ['','Jan','Feb','Mar','Apr','May','Jun','Jly','Aug','Sep','Oct','Nov','Dec'];
    return date.getDate() + '-'+ a[(date.getMonth() + 1)] + '-' + date.getFullYear();   
}
function addDaysWRONG() {
    var d = $('#year').val()+"-"+$('#month').val()+"-"+$('#date').val();
    var ndate =   new Date(d);
    var resultd = new Date(d);
    resultd.setDate(ndate.getDate() + parseInt($('#Days').val()));
    $('#eDays').val(formatDate(resultd));
}
</script>