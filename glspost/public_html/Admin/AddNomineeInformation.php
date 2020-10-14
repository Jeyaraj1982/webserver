<?php 
 $Member = $mysql->select("Select * from _tbl_member where MemberCode='".$_GET['code']."'");
 
 if (isset($_POST['SaveBtn'])) {
     $mysql->insert("_tbl_member_nominiinformation",array("MemberID"          => $Member[0]['MemberID'],
                                                          "MemberCode"        => $Member[0]['MemberCode'],
                                                          "NominiName"        => $_POST['NominiName'],
                                                          "NominiRelation"    => $_POST['NominiRelation'],
                                                          "NominiDateOfBirth" => $_POST['NominiDateOfBirth'],
                                                          "AddedOn"           => date("Y-m-d H:i:s")));
     echo "Add successfully";
 ?>
    <script>location.href='dashboard.php?action=ViewMember&code=<?php echo $Member[0]['MemberCode'];?>';</script>
     <?php
     exit;
 }
                                            
 ?>
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
                                        Add Nominee Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>


