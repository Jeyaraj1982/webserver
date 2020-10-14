<?php include_once("header.php"); ?> 
 
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>My Nominee Information
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
                                         <?php $nominiInformation = $mysql->select("Select * from _tbl_member_nominiinformation where MemberID='".$_SESSION['User']['MemberID']."'  order by NominationID desc limit 0,1"); ?> 
                                         <?php if(sizeof($nominiInformation)>0){?>
                                            <div>
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">Nominee Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $nominiInformation[0]['NominiName'];?>">
                                                    </div>
                                                </div>
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Date of Birth</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $nominiInformation[0]['NominiDateOfBirth'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Relation</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $nominiInformation[0]['NominiRelation'];?>">
                                                    </div>
                                                </div>    
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Last Updated</div>                                                                                 
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $nominiInformation[0]['AddedOn'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                         <?php } else {?>
                                                 <div class="form-group row" style="text-align:center;">
                                                   <div class="col-sm-12"><a class="mb-2 mr-2 btn btn-gradient-primary" href="AddMyNominiInformation.php">Add Nominee Information</a></div>
                                                </div>
                                         <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             