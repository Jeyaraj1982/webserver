
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
                                 $mysql->insert("_tbl_member_nominiinformation",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                      "MemberCode"        => $_SESSION['User']['MemberCode'],
                                                                                      "NominiName"        => $_POST['NominiName'],
                                                                                      "NominiRelation"    => $_POST['NominiRelation'],
                                                                                      "NominiDateOfBirth" => $_POST['NominiDateOfBirth'],
                                                                                      "AddedOn"           => date("Y-m-d H:i:s")));
                                 echo "Add successfully";
                             ?>
                                 <Script>
                                      setTimeout(function(){
                                      location.href='Dashboard.php?action=MyNominiInformation';
                                      },1000);
                                      </script>
                                 <?php
                                 exit;
                             }
                            ?> 
                            <form action="" method="post">
                                <div>
                                      <div class="form-group row">
                                       <div class="col-sm-3">Nominee Name</div>
                                        <div class="col-sm-9">
                                            <input type="text" name="NominiName"   class="form-control" value="<?php echo (isset($_POST['NominiName']) ? $_POST['NominiName'] : "");?>">
                                        </div>
                                    </div>
                                       <div class="form-group row">
                                       <div class="col-sm-3">Date of Birth</div>
                                        <div class="col-sm-9">
                                            <input type="text" name="NominiDateOfBirth"  class="form-control" value="<?php echo (isset($_POST['NominiDateOfBirth']) ? $_POST['NominiNominiDateOfBirthName'] : "");?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-3">Relation</div>
                                        <div class="col-sm-9">
                                            <input type="text" name="NominiRelation"  class="form-control" value="<?php echo (isset($_POST['NominiRelation']) ? $_POST['NominiRelation'] : "");?>">
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
 