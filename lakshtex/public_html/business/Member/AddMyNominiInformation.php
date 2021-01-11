
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My Nominee Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $nominiInformation = $mysql->select("Select * from _tbl_member_nominiinformation where MemberID='".$_SESSION['User']['MemberID']."'  order by NominationID desc limit 0,1"); ?> 
                             <?php if(sizeof($nominiInformation)>0){?>
                             <div class="form-group row" style="text-align:center;">
                                       <div class="col-sm-12"><a class="mb-2 mr-2 btn btn-gradient-primary" href="Dashboard.php?action=MyNominiInformation">View Nominee Information</a></div>
                                    </div>  
                             <?php } else {?>
                               
                             <?php
                               
                             if (isset($_POST['SaveBtn'])) {
                                  $DateofBirth = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
                                 $mysql->insert("_tbl_member_nominiinformation",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                      "MemberCode"        => $_SESSION['User']['MemberCode'],
                                                                                      "NominiName"        => $_POST['NominiName'],
                                                                                      "NominiRelation"    => $_POST['NominiRelation'],
                                                                                      "NominiDateOfBirth" => $DateofBirth,
                                                                                      "AddedOn"           => date("Y-m-d H:i:s")));
                                // echo "Add successfully";
                             ?>
                                 <script>
                                    $(document).ready(function() {
                                        swal("Add successfully", { 
                                            icon:"success",
                                            confirm: {value: 'Continue'}
                                        }).then((value) => {
                                            location.href='Dashboard.php?action=MyNominiInformation'
                                        });
                                    });
                                 </script>
                                 <?php
                             }
                            ?> 
                            <form action="" method="post" onsubmit="return submitnominee();">
                                <div>
                                      <div class="form-group row">
                                       <div class="col-sm-3">Nominee Name<span id="star">*</span></div>
                                        <div class="col-sm-9">
                                            <input type="text" name="NominiName" id="NominiName" class="form-control" value="<?php echo (isset($_POST['NominiName']) ? $_POST['NominiName'] : "");?>">
                                            <span class="errorstring" id="ErrNominiName"><?php echo isset($ErrNominiName)? $ErrNominiName : "";?></span>
                                        </div>
                                    </div>
                                       <div class="form-group row">
                                       <div class="col-sm-3">Date of Birth<span id="star">*</span></div>
                                        <div class="col-sm-9">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" data-live-search="true" id="date" name="date">
                                                                <?php for($i=1;$i<=31;$i++) {?>
                                                                    <option value="<?php echo $i; ?>" <?php echo ($_POST[ 'date']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="month" id="month" class="form-control" >
                                                                <?php foreach($_monthname as $key=>$value) {?>
                                                                    <option value="<?php echo $key+1; ?>" <?php echo ($_POST[ 'month']==$key+1) ? " selected='selected' " : "";?>><?php echo $value;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" data-live-search="true" id="year" name="year">
                                                                <?php for($i=$_DOB_Year_Start;$i>=$_DOB_Year_End;$i--) {?>
                                                                    <option value="<?php echo $i; ?>" <?php echo ($_POST['year']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                                                <?php } ?>                                                 
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-3">Relation<span id="star">*</span></div>
                                        <div class="col-sm-9">
                                            <input type="text" name="NominiRelation" id="NominiRelation"  class="form-control" value="<?php echo (isset($_POST['NominiRelation']) ? $_POST['NominiRelation'] : "");?>">
                                            <span class="errorstring" id="ErrNominiRelation"><?php echo isset($ErrNominiRelation)? $ErrNominiRelation : "";?></span>
                                        </div>
                                    </div>    
                                    <div class="form-group row">
                                       <div class="col-sm-12"><button class="btn btn-primary" type="submit" name="SaveBtn">Add Nominee Information</button></div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
  $(document).ready(function () {
        $("#NominiName").blur(function () {
            if(IsNonEmpty("NominiName", "ErrNominiName", "Please Enter Nominee Name")){
                IsAlphaNumeric("NominiName", "ErrNominiName", "Please Enter Alpha Numerics Characters Only");
            }
        });
        $("#NominiRelation").blur(function () {
            if(IsNonEmpty("NominiRelation", "ErrNominiRelation", "Please Enter Nominee Relation")){
                IsAlphaNumeric("NominiRelation", "ErrNominiRelation", "Please Enter Alpha Numerics Characters Only");
            }
        });
  });
  function submitnominee(){
      ErrorCount=0;
        $('#ErrNominiName').html("");
        $('#ErrNominiRelation').html("");
        
        if(IsNonEmpty("NominiName", "ErrNominiName", "Please Enter Nominee Name")){
            IsAlphaNumeric("NominiName", "ErrNominiName", "Please Enter Alpha Numerics Characters Only");
        }
        if(IsNonEmpty("NominiRelation", "ErrNominiRelation", "Please Enter Nominee Relation")){
            IsAlphaNumeric("NominiRelation", "ErrNominiRelation", "Please Enter Alpha Numerics Characters Only");
        }
        return (ErrorCount==0) ? true : false;
  }
 </script>