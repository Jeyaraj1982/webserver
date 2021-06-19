<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>New Case </h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
<?php
    $client_information = $mysql->select("select * from _tbl_master_clients where md5(concat(CreatedOn,ClientID))='".$_GET['client']."'");
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if ($_POST['CourtID']==0) {
            $StaffName = "Please select court";
            $error++;
        }
        
        // duplicate CNR Number
     
        if ($error==0) {
            
            $courtname = $mysql->select("select * from _tbl_master_courts where CourtID='".$_POST['CourtID']."'"); 
            $appearingmodel_name = $mysql->select("select * from _tbl_master_appearingmodels where AppearingModelName='".$_POST['AppearingModelID']."'"); 
            $prioirtie_name = $mysql->select("select * from _tbl_master_priorities where PriorityID='".$_POST['PriorityID']."'"); 
            $appear = explode("-",$appearingmodel_name[0]['AppearingModelName']);
            $casetype_name = $mysql->select("select * from _tbl_master_casetypes where CaseTypeID='".$_POST['CaseTypeID']."' ");

            $HighCourtID   = "0";
            $HighCourtName = "";
            if ($_POST['HighCourtID']>0){
                $HighCourt     = $mysql->select("select * from _tbl_master_highcourts where HighCourtID='".$_POST['HighCourtID']."'");
                $HighCourtID   = $_POST['HighCourtID'];
                $HighCourtName = $HighCourt[0]['HighCourtName'];
            }

            $HighCourtBenchtID  = "0";
            $HighCourtBenchName = "";
            if ($_POST['HighCourtBenchtID']>0){
                $HighCourtBench     = $mysql->select("select * from _tbl_master_highcourts_bench where HighCourtBenchtID='".$_POST['HighCourtBenchtID']."'");
                $HighCourtBenchtID  = $_POST['HighCourtBenchtID'];
                $HighCourtBenchName = $HighCourtBench[0]['BenchName'];
            }

            $DistrctCourtStateNameID = "0";
            $DistrctCourtStateName   = "";
            if ($_POST['DistrctCourtStateNameID']>0) {
                $StateNameData = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['DistrctCourtStateNameID']."'");
                $DistrctCourtStateNameID = $_POST['DistrctCourtStateNameID'];
                $DistrctCourtStateName   = $StateNameData[0]['StateName'];
            }

            $DistrctCourtDistrictNameID = "0";
            $DistrctCourtDistrictName   = "";
            if ($_POST['DistrctCourtDistrictNameID']>0) {
                $DistrictNameData = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrctCourtDistrictNameID']."'");
                $DistrctCourtDistrictNameID = $_POST['DistrctCourtDistrictNameID'];
                $DistrctCourtDistrictName   = $DistrictNameData[0]['DistrictName'];
            }
            
            $TribunalsID   = "0";
            $TribunalsName = "";
            $TribunalNote  = "";
            if ($_POST['TribunalsID']>0) {
                $Tribunals = $mysql->select("select * from _tbl_master_tribunals where TribunalsID='".$_POST['TribunalsID']."'");
                $TribunalsID = $_POST['TribunalsID'];
                $TribunalsName   = $Tribunals[0]['TribunalsName'];
                $TribunalNote = $_POST['TribunalNote'];
            }
            
            $RevenueCourtStateID   = "0";
            $RevenueCourtStateName = "";
            if ($_POST['RevenueCourtStateID']>0) {
                $RevenueCourtStateName = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['RevenueCourtStateID']."'");
                $RevenueCourtStateID   = $RevenueCourtStateName[0]['RevenueCourtStateID'];
                $RevenueCourtStateName = $RevenueCourtStateName[0]['StateName'];
            }
            
            $ConsumerForumID   = "0";
            $ConsumerForumName = "";
            if ($_POST['ConsumerForumID']>0) {
                $ConsumerData       = $mysql->select("select * from _tbl_master_consumerfourm where ConsumerForumID='".$_POST['ConsumerForumID']."'");
                $ConsumerForumID    = $ConsumerData[0]['ConsumerForumID'];
                $$ConsumerForumName = $ConsumerData[0]['ConsumerForumName'];
            }
            
            $ConsumerDistrctStateID = "0";
            $ConsumerDistrctStateName   = "";
            if ($_POST['ConsumerDistrctStateID']>0) {
                $Record = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['ConsumerDistrctStateID']."'");
                $ConsumerDistrctStateID   = $Record[0]['StateNameID'];
                $ConsumerDistrctStateName = $Record[0]['StateName'];
            }
           
            $ConsumerDistrctID   = "0";
            $ConsumerDistrctName = "";
            if ($_POST['ConsumerDistrctID']>0) {
                $Record = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['ConsumerDistrctID']."'");
                $ConsumerDistrctID   = $Record[0]['DistrictNameID'];
                $ConsumerDistrctName = $Record[0]['DistrictName'];
            }
            
            $ConsumerStateID = "0";
            $ConsumerStateName   = "";
            if ($_POST['ConsumerStateID']>0) {
                $Record = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['ConsumerStateID']."'");
                $ConsumerStateID   = $Record[0]['StateNameID'];
                $ConsumerStateName = $Record[0]['StateName'];
            }
            
            $CommissionerateStateID = "0";
            $CommissionerateStateName   = "";
            if ($_POST['CommissionerateStateID']>0) {
                $Record = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['CommissionerateStateID']."'");
                $CommissionerateStateID   = $Record[0]['StateNameID'];
                $CommissionerateStateName = $Record[0]['StateName'];
            }
     
            $CommissionerateAuthorityID = "0";
            $CommissionerateAuthorityName   = "";
            if ($_POST['CommissionerateAuthorityID']>0) {
                $Record = $mysql->select("select * from _tbl_master_commissionerateauthority where CommissionerateAuthorityID='".$_POST['CommissionerateAuthorityID']."'");
                $CommissionerateAuthorityID   = $Record[0]['CommissionerateAuthorityID'];
                $CommissionerateAuthorityName = $Record[0]['CommissionerateAuthorityName'];
            } 
  

            $CaseID = 0;
            $CaseID = $mysql->insert("_tbl_cases_register",array(
                                                        "ClientID"                     => trim($client_information[0]['ClientID']),
                                                        "ClientName"                   => trim($client_information[0]['ClientName']),
                                                        "CourtID"                      => trim($_POST['CourtID']),
                                                        "CourtName"                    => trim($courtname[0]['CourtName']),
                                                        "DairyNumber"                  => $_POST['DairyNumber'],
                                                        "DairyYear"                    => $_POST['DairyYear'],
                                                        "HighCourtID"                  => $HighCourtID,
                                                        "HighCourtName"                => $HighCourtName,
                                                        "HighCourtBenchtID"            => $HighCourtBenchtID,
                                                        "HighCourtBenchtName"          => $HighCourtBenchName,
                                                        "DistrctCourtStateNameID"      => $DistrctCourtStateNameID,
                                                        "DistrctCourtStateName"        => $DistrctCourtStateName,
                                                        "DistrctCourtDistrictNameID"   => $DistrctCourtDistrictNameID,
                                                        "DistrctCourtDistrictName"     => $DistrctCourtDistrictName,                 
                                                        "TribunalsID"                  => $TribunalsID,
                                                        "TribunalsName"                => $TribunalsName,
                                                        "TribunalNote"                 => $TribunalNote,                                                  
                                                        "RevenueCourtStateID"          => $RevenueCourtStateID,
                                                        "RevenueCourtStateName"        => $RevenueCourtStateName, 
                                                        "ConsumerForumID"              => $ConsumerForumID,
                                                        "ConsumerForumName"            => $ConsumerForumName, 
                                                        "ConsumerDistrctStateID"       => $ConsumerDistrctStateID,
                                                        "ConsumerDistrctStateName"     => $ConsumerDistrctStateName,
                                                        "ConsumerDistrctID"            => $ConsumerDistrctID,
                                                        "ConsumerDistrctName"          => $ConsumerDistrctName,
                                                        "ConsumerForumNational"        => $ConsumerForumNational,
                                                        "ConsumerStateID"              => $ConsumerStateID,
                                                        "ConsumerStateName"            => $ConsumerStateName,
                                                        "Commissionerate"              => $Commissionerate,
                                                        "CommissionerateStateID"       => $CommissionerateStateID,
                                                        "CommissionerateStateName"     => $CommissionerateStateName,
                                                        "CommissionerateAuthorityID"   => $CommissionerateAuthorityID,
                                                        "CommissionerateAuthorityName" => $CommissionerateAuthorityName,
                                                        "CaseTypeID"                   => trim($casetype_name[0]['CaseTypeID']),
                                                        "CaseTypeName"                 => trim($casetype_name[0]['CaseTypeName']),
                                                        "AppearingModelID"             => trim($appearingmodel_name[0]['AppearingModelID']),
                                                        "AppearingModelName"           => trim($appearingmodel_name[0]['AppearingModelName']),
                                                        "Appear_1"                     => trim($appear[0]),
                                                        "Appear_2"                     => trim($appear[1]),
                                                        "AppearNumber"                 => trim($_POST['AppearNumber']),
                                                        "SelectedAppear"               => trim($_POST['SelectedAppear']),
                                                        "OldCaseNumber"                => trim($_POST['OldCaseNumber']),
                                                        "CaseNumber"                   => trim($_POST['CaseNumber']),
                                                        "CaseYear"                     => trim($_POST['CaseYear']),
                                                        "DateOfFirstAppearance"        => trim($_POST['DateOfFirstAppearance']),
                                                        "HaveCNR"                      => trim($_POST['HaveCNR']),
                                                        "CNRNumber"                    => trim($_POST['CNRNumber']),
                                                        "DateOfFilling"                => trim($_POST['DateOfFilling']),
                                                        "CourtHallNumber"              => trim($_POST['CourtHallNumber']),
                                                        "FloorNumber"                  => trim($_POST['FloorNumber']),
                                                        "Clarification"                => trim($_POST['Clarification']),
                                                        "Title"                        => trim($_POST['Title']),
                                                        "Description"                  => trim($_POST['Description']),
                                                        "BeforeJudge"                  => trim($_POST['BeforeJudge']),
                                                        "ReferredBy"                   => trim($_POST['ReferredBy']),
                                                        "SectionCategory"              => trim($_POST['SectionCategory']),
                                                        "PriorityID"                   => trim($_POST['PriorityID']),
                                                        "PriorityName"                 => trim($prioirtie_name[0]['PriorityName']),
                                                        "AffidavitFilled"              => trim($_POST['AffidavitFilled']),
                                                        "AffdavitDate"                 => trim($_POST['AffdavitDate']),
                                                        "Remarks"                      => trim($_POST['Remarks']),
                                                        "CreatedOn"                    => date("Y-m-d H:i:s"),
                                                        "IsActive"                     => "1"));
            if ($mysql->error!="") {
                
            
            echo $mysql->qry;
            echo $mysql->error;
            }
            if ($CaseID>0) {                                                      
                foreach($_POST['AdvocateID'] as $v) {
                    $mysql->insert("_tbl_cases_assigned_advocates",array("CaseID"=>$CaseID,"AdvocateID"=>$v,"AssignedOn"=>date("Y-m-d H:i:s"),"IsActive"=>'1'));
                }
                
                for($i=0;$i<sizeof($_POST['ra_name']);$i++) {                 
                    $mysql->insert("_tbl_cases_assigned_opponents",array("CaseID"=>$CaseID,"FullName"=>$_POST['ra_name'][$i],"Email"=>$_POST['ra_email'][$i],"MobileNumber"=>$_POST['ra_mobile'][$i],"CreatedOn"=>date("Y-m-d H:i:s"),"IsActive"=>'1'));
                }
                
                for($i=0;$i<sizeof($_POST['radv_name']);$i++) {                 
                    $mysql->insert("_tbl_cases_assigned_opponents_advocates",array("CaseID"=>$CaseID,"FullName"=>$_POST['radv_name'][$i],"Email"=>$_POST['radv_email'][$i],"MobileNumber"=>$_POST['radv_mobile'][$i],"CreatedOn"=>date("Y-m-d H:i:s"),"IsActive"=>'1'));
                }
                unset($_POST);
                echo DisplaySuccessMessage("Case Created");  
            } else {
                echo DisplayErrorMessage("Couldn't able to save case information"); 
            }
            
        }  else {
            echo DisplayErrorMessage("Couldn't able to create case information");
        }
    }
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_case" name="create_case" onsubmit="return formvalidation('create_case');" enctype="multipart/form-data">
                        <div class="row g-3 mb-3">
                            <div class="col-md=3">
                                <label  class="form-label" for="validationCustom02" style="font-weight:bold">Client Name</label><br>
                                <?php echo $client_information[0]['ClientName'];?>  (ID: <?php echo $client_information[0]['ClientID'];?>)
                            </div>
                        </div>
                       <script>
                        function getAddCaseParam() {
                            $('#case_appeal_number').hide();
                            $('#districtcourt_statenames').hide();
                            $('#case_Commissionerate').hide();
                            $('#case_revenuecourt').hide();
                            $('#case_tribunals').hide();
                            $('#ConsumerForum').hide();
                            $('#requireCNR_YN').hide();
                            $('#require_cnr').hide();
                            $('#highcourts').hide();
                            $('#case_supremecourtofindia').hide();
                            $('#caseDairyNumber').hide();
                            
                            if ($('#CourtID').val()==9) {
                                $('#case_appeal_number').show();
                            } 
                            //Commissionerate 
                             if ($('#CourtID').val()==7) {
                                $('#case_appeal_number').show();
                                $('#case_Commissionerate').show();
                            } 
                            
                            //case_revenuecourt 
                             if ($('#CourtID').val()==6) {
                                $('#case_appeal_number').show();
                                $('#case_revenuecourt').show();
                            }
                            //case_tribunals   Tribunals and Authorities
                             if ($('#CourtID').val()==5) {
                                $('#case_appeal_number').show();
                                $('#case_tribunals').show();
                            } 
                            //ConsumerForum   Tribunals and Authorities
                             if ($('#CourtID').val()==4) {
                                $('#case_appeal_number').show();
                                $('#ConsumerForum').show();
                            } 
                            
                            //District Court
                            if ($('#CourtID').val()==3) {
                                $('#districtcourt_statenames').show();
                                
                                $('#requireCNR_YN').show();
                                
                                $('#require_cnr').show();
                                $("#haveCNR1").prop("checked", true);
                                $('#case_appeal_number').hide();  
                            } 
                            
                            // highcourts --- working fine
                             if ($('#CourtID').val()==2) {
                                 $('#requireCNR_YN').show();
                                 $('#require_cnr').show();
                                 $("#haveCNR1").prop("checked", true);
                                 $('#case_appeal_number').hide();  
                                 $('#highcourts').show();
                            }  
                            
                            if ($('#CourtID').val()==1) {
                                   $('#case_supremecourtofindia').show();
                            } 
                            
                            
                        }
                       </script> 
<div class="row g-3  mb-3">
    <div class="col-md-8">
        <?php $courts = $mysql->select("select * from _tbl_master_courts where IsActive='1' order by ListOrder"); ?>
        <label class="form-label" for="validationCustom01">Court</label>
        <select class="form-select" id="CourtID" name="CourtID" onchange="getAddCaseParam()">
            <option value="0">Select Court</option>
            <?php foreach($courts as $court) {?>
            <option value="<?php echo $court['CourtID'];?>" <?php echo ($court['CourtID']==$_POST['CourtID']) ? " selected='selected' " : ""; ?>><?php echo $court['CourtName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrCourtID" style="color:red"><?php echo isset($CourtID) ? $CourtID : "";?></div>
    </div>
</div>
<script>
    function getSupremeCourtOfIndia() {
        $('#caseDairyNumber').hide();
        $('#case_appeal_number').hide();
        if ($('#SupremeCourtOfIndia').val()=="CaseNumber") {
                             $('#case_appeal_number').show();
        } 
        if ($('#SupremeCourtOfIndia').val()=="DairyNumber") {
            $('#caseDairyNumber').show();
        }
    }
</script>

<div class="row g-3  mb-3" id="case_supremecourtofindia" style="display:none">
      <div class="col-md-4">
        <label class="form-label" for="validationCustom01">Supreme Court of India</label>
        <select class="form-select" id="SupremeCourtOfIndia" name="SupremeCourtOfIndia" onchange="getSupremeCourtOfIndia()">
            <option value="0">Please Select</option>
            <option value="CaseNumber">Case Number</option>
            <option value="DairyNumber">Dairy Number</option>
        </select>
        <div id="ErrSupremeCourtOfIndia" style="color:red"><?php echo isset($SupremeCourtOfIndia) ? $SupremeCourtOfIndia : "";?></div>
      </div>
</div>                                             
<div class="row g-3  mb-3" id="caseDairyNumber" style="display: none;">
    <div class="col-md-4">
        <label class="form-label" for="validationCustom03">Diary Number</label>
        <input class="form-control" name="DairyNumber" id="DairyNumber" type="text" placeholder="Diary Number"  value="<?php echo isset($_POST['DairyNumber']) ? $_POST['DairyNumber'] : "";?>">
        <div id="ErrDairyNumber" style="color:red"><?php echo isset($DairyNumber) ? $DairyNumber : "";?></div>
    </div>
    <div class="col-md-2">
        <label class="form-label" for="validationCustomUsername">Year</label>
        <select class="form-select" name="DairyYear" id="DairyYear">
            <option value="0">Select Year</option>
            <?php for($year=date("Y");$year>(date("Y")-60);$year--) { ?>
            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php } ?>
        </select>
        <div id="ErrDairyYear" style="color:red"><?php echo isset($DairyYear) ? $DairyYear : "";?></div>
    </div>
</div>
                       
<script>
    function getHighCourtBench() {
        var _HighCourtID = $('#HighCourtID').val();
        $.ajax({url:'webservice.php?action=getHighCourtBench&rand='+Math.random()+'&HighCourt='+_HighCourtID,success:function(data){
              $('#ajax_getHighCourtBench').html(data);
        }});
    }      
</script> 

<div class="row g-3  mb-3" id="highcourts" style="display:none">
    <div class="col-md-4">
        <label class="form-label" for="validationCustom01">High Court</label>
        <?php $high_courts = $mysql->select("select * from _tbl_master_highcourts where IsActive='1' order by CourtName"); ?>
        <select class="form-select" id="HighCourtID" name="HighCourtID" onchange="getHighCourtBench()">
            <option value="0">Select High Court</option>
            <?php foreach($high_courts as $high_court) {?>
            <option value="<?php echo $high_court['HighCourtID'];?>" <?php echo ($high_court['HighCourtID']==$_POST['HighCourtID']) ? " selected='selected' " : ""; ?>><?php echo $high_court['CourtName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrHighCourtID" style="color:red"><?php echo isset($HighCourtID) ? $HighCourtID : "";?></div>
        <span id="ajax_getHighCourtBench"></span>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="validationCustom01">Bench</label>
        <select class="form-select" id="HighCourtBenchtID" name="HighCourtBenchtID">
            <option value="0">Select Bench</option>
        </select>
        <div id="ErrHighCourtBenchtID" style="color:red"><?php echo isset($HighCourtBenchtID) ? $HighCourtBenchtID : "";?></div>
    </div>
</div>
                         
<script>
    function getDistrictCourtDistrictNames() {
        var _DistrctCourtStateNameID = $('#DistrctCourtStateNameID').val();
        $.ajax({url:'webservice.php?action=getDistrictCourtDistrictNames&rand='+Math.random()+'&StateNameID='+_DistrctCourtStateNameID,success:function(data){
            $('#ajax_getDistrictCourtDistrictNames').html(data);
        }});
    }
</script> 
<div class="row g-3 mb-3" id="districtcourt_statenames" style="display:none">
    <div class="col-md-4">
        <label class="form-label" for="validationCustom01">State Name</label>
        <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
        <select class="form-select" id="DistrctCourtStateNameID" name="DistrctCourtStateNameID" onchange="getDistrictCourtDistrictNames()">
            <option value="0">Select State</option>
            <?php foreach($statenames as $statename) {?>
            <option value="<?php echo $statename['StateNameID'];?>" <?php echo ($statename['StateNameID']==$_POST['StateNameID']) ? " selected='selected' " : ""; ?>><?php echo $statename['StateName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrDistrctCourtStateNameID" style="color:red"><?php echo isset($DistrctCourtStateNameID) ? $DistrctCourtStateNameID : "";?></div>
        <span id="ajax_getDistrictCourtDistrictNames"></span>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="validationCustom01">District Name</label>
        <select class="form-select" id="DistrctCourtDistrictNameID" name="DistrctCourtDistrictNameID">
            <option value="0">Select District</option>
        </select>
        <div id="ErrDistrctCourtDistrictNameID" style="color:red"><?php echo isset($DistrctCourtDistrictNameID) ? $DistrctCourtDistrictNameID : "";?></div>
    </div>
</div>



<div class="row g-3  mb-3" id="case_tribunals"  style="display: none;">
    <div class="col-md-6">
        <label class="form-label" for="validationCustom01">Tribunals and Authorities</label>
        <?php $tribunals = $mysql->select("select * from _tbl_master_tribunals where IsActive='1' order by TribunalsName"); ?>
        <select class="form-select" id="TribunalsID" name="TribunalsID">
            <option value="0">Please Select </option>
            <?php foreach($tribunals as $tribunal) {?>
            <option value="<?php echo $tribunal['TribunalsID'];?>"><?php echo $tribunal['TribunalsName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrRevenueCourt" style="color:red"><?php echo isset($ErrRevenueCourt) ? $ErrRevenueCourt : "";?></div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="validationCustom01">Details</label>
        <input class="form-control" name="TribunalNote" id="TribunalNote" type="text" placeholder="Notes for Tribunals & Authorities"  value="<?php echo isset($_POST['TribunalNote']) ? $_POST['TribunalNote'] : "";?>">
    </div>
</div>

<div class="row g-3  mb-3" id="case_revenuecourt"  style="display: none;">
    <div class="col-md-6">
        <label class="form-label" for="validationCustom01">Revenue Court</label>
        <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
        <select class="form-select" id="RevenueCourtStateID" name="RevenueCourtStateID">
            <option value="0">Please Select </option>
            <?php foreach($statenames as $statename) {?>
            <option value="<?php echo $statename['StateNameID'];?>"><?php echo $statename['StateName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrRevenueCourtStateID" style="color:red"><?php echo isset($RevenueCourtStateID) ? $RevenueCourtStateID : "";?></div>
    </div>
</div>  

          
                       <!--Consumer Forum-->
                       <script>
                       function getConsumerForum() {
                           
                           $('#ConsumerForum_State_District').hide();
                           $('#ConsumerForum_National').hide();
                           $('#ConsumerForum_State').hide();
                           $('#ConsumerForum_District').hide();
                              
                          if ($('#ConsumerForumID').val()=="1")   {
                              $('#ConsumerForum_State_District').show();
                              $('#ConsumerForum_District').show();
                          }
                          if ($('#ConsumerForumID').val()=="2")   {
                              $('#ConsumerForum_National').show();
                          }
                          if ($('#ConsumerForumID').val()=="3")   {
                              $('#ConsumerForum_State').show();
                          }
                       }
                       </script>
<script>
function getConsumerCourtDistrictNames() {
    var _ConsumerDistrctStateID = $('#ConsumerDistrctStateID').val();
    $.ajax({url:'webservice.php?action=getConsumerCourtDistrictNames&rand='+Math.random()+'&StateNameID='+_ConsumerDistrctStateID,success:function(data){
        $('#ajax_getDistrictCourtDistrictNames').html(data);
    }});
}
</script>  
<div class="row g-3  mb-3" id="ConsumerForum"  style="display: none;">
    <div class="col-md-6">
        <label class="form-label" for="validationCustom01">ConsumerForum</label>
        <select class="form-select" id="ConsumerForumID" name="ConsumerForumID" onchange="getConsumerForum()">
            <option value="0">Please Select</option>
            <?php $fourms = $mysql->select("select * from _tbl_master_consumerfourm where IsActive='1' order by ForumName"); ?>
            <?php foreach($fourms as $fourm) {?>
            <option value="<?php echo $fourm['ConsumerForumID'];?>"><?php echo $fourm['ForumName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrConsumerForumID" style="color:red"><?php echo isset($ErrConsumerForumID) ? $ErrConsumerForumID : "";?></div>
    </div>
    <div class="col-md-3" id='ConsumerForum_State_District' style="display: none;">
        <label class="form-label" for="validationCustom01">State Name</label>
        <select class="form-select" id="ConsumerDistrctStateID" name="ConsumerDistrctStateID" onclick="getConsumerCourtDistrictNames()">
            <option value="0">Select State</option>
            <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
            <?php foreach($statenames as $statename) {?>
            <option value="<?php echo $statename['StateNameID'];?>"><?php echo $statename['StateName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrConsumerDistrctStateID" style="color:red"><?php echo isset($ConsumerDistrctStateID) ? $ConsumerDistrctStateID : "";?></div>
        <span id="ajax_ConsumerDistrctStateID"></span>
    </div> 
    <div class="col-md-3" id='ConsumerForum_District' style="display: none;">
        <label class="form-label" for="validationCustom01">District Name</label>
        <select class="form-select" id="ConsumerDistrctID" name="ConsumerDistrctID">
            <option value="0">Select District</option>
        </select>
        <div id="ErrConsumerDistrctID" style="color:red"><?php echo isset($ConsumerDistrctID) ? $ConsumerDistrctID : "";?></div>
    </div> 
    <div class="col-md-6" id='ConsumerForum_National' style="display: none;">
        <label class="form-label" for="validationCustom01">Bench</label>
        <select class="form-select" id="ConsumerForumNational" name="ConsumerForumNational">
            <option value="0">Please Select</option>
            <option value="1">New Delhi</option>
        </select>
        <div id="ErrCommissionerate" style="color:red"><?php echo isset($ErrCommissionerate) ? $ErrCommissionerate : "";?></div>
    </div>
    <div class="col-md-6" id='ConsumerForum_State' style="display: none;">
        <label class="form-label" for="validationCustom01">State Name</label>
        <select class="form-select" id="ConsumerStateID" name="ConsumerStateID">
            <option value="0">Please Select State</option>
            <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
            <?php foreach($statenames as $statename) {?>
                <option value="<?php echo $statename['StateNameID'];?>"><?php echo $statename['StateName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrConsumerStateID" style="color:red"><?php echo isset($ConsumerStateID) ? $ConsumerStateID : "";?></div>
    </div>
</div>


<div class="row g-3 mb-3" id="requireCNR_YN" style="display:none">
    <div class="col-md-4">
        <label class="form-label" for="validationCustom03">Do you have CNR#? </label>
        <div class="m-t-15 m-checkbox-inline custom-radio-ml" style="margin-top:0px !important">
            <div class="form-check form-check-inline radio radio-primary">
                <input class="form-check-input" id="haveCNR1" type="radio" name="HaveCNR" onclick="$('#require_cnr').show();$('#case_appeal_number').hide();" value="1" data-bs-original-title="" title="">
                <label class="form-check-label mb-0" for="haveCNR1">Yes</label>
            </div>
            <div class="form-check form-check-inline radio radio-primary">
                <input class="form-check-input" id="haveCNR2" type="radio"  name="HaveCNR" onclick="$('#require_cnr').hide();$('#require_cnr').hide(); $('#case_appeal_number').show();"  value="0" data-bs-original-title="" title="">
                <label class="form-check-label mb-0" for="haveCNR2">No</label>
            </div>
        </div>
    </div>
</div>

<div class="row g-3  mb-3" id="require_cnr" style="display:none">
    <div class="col-md-3">
        <label class="form-label" for="validationCustom03">CNR #</label>
        <input class="form-control" name="CNRNumber" id="CNRNumber" type="text" placeholder="CNR #"  value="<?php echo isset($_POST['CNRNumber']) ? $_POST['CNRNumber'] : "";?>">
        <div id="ErrCNRNumber" style="color:red"><?php echo isset($CNRNumber) ? $CNRNumber : "";?></div>
    </div>
</div>

             
                         
                          
                       <script>
                       function getCommissionerate() {
                           
                           $('#CharityCommissionerate').hide();
                           $('#CommercialCommissionerate').hide();
                              
                          if ($('#Commissionerate').val()=="1")   {
                              $('#CharityCommissionerate').show();
                              $('#CommercialCommissionerate').hide();
                          }
                          if ($('#Commissionerate').val()=="2")   {
                              $('#CharityCommissionerate').hide();
                              $('#CommercialCommissionerate').show();
                          }
                       }
                       </script> 
                      
                       <div class="row g-3  mb-3" id="case_Commissionerate"  style="display: none;">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Commissionerate</label>
                                <select class="form-select" id="Commissionerate" name="Commissionerate" onchange="getCommissionerate()">
                                    <option value="0">Please Select</option>
                                        <option value="1">Charity Commissionerate</option>
                                        <option value="2">Commissionerate of Commercial Taxes</option>
                                </select>
                                <div id="ErrCommissionerate" style="color:red"><?php echo isset($ErrCommissionerate) ? $ErrCommissionerate : "";?></div>
                            </div>
                            
                              <div class="col-md-6" id='CharityCommissionerate' style="display: none;">
                                <label class="form-label" for="validationCustom01">State Name</label>
                                <select class="form-select" id="CommissionerateStateID" name="CommissionerateStateID">
                                    <option value="0">Please Select State</option>
                                    <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
                                    <?php foreach($statenames as $statename) {?>
                                        <option value="<?php echo $statename['StateNameID'];?>"><?php echo $statename['StateName'];?></option>
                                    <?php } ?>
                                </select>
                                <div id="ErrCommissionerateStateID" style="color:red"><?php echo isset($CommissionerateStateID) ? $CommissionerateStateID : "";?></div>
                            </div>
                            
                              <div class="col-md-6"  id='CommercialCommissionerate' style="display: none;">
                                <label class="form-label" for="validationCustom01">Authority</label>
                                <?php $autorities = $mysql->select("select * from _tbl_master_commissionerateauthority where IsActive='1' order by CommissionerateAuthorityName"); ?>
                                <select class="form-select" id="CommissionerateAuthorityID" name="CommissionerateAuthorityID">
                                    <option value="0">Please Select Authority</option>
                                    <?php foreach($autorities as $autority) {?>
                                        <option value="<?php echo $autority['CommissionerateAuthorityID'];?>"><?php echo $autority['CommissionerateAuthorityName'];?></option>
                                    <?php } ?>
                                </select>
                                <div id="ErrCommissionerateAuthorityID" style="color:red"><?php echo isset($CommissionerateAuthorityID) ? $CommissionerateAuthorityID : "";?></div>
                            </div>
                        </div>
                        
                      <div class="row g-3  mb-3" id="case_appeal_number" style="display: none;">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Case/Appeal Number</label>
                                <input class="form-control" name="CaseNumber" id="CaseNumber" type="text" placeholder="Case/Appeal Number"  value="<?php echo isset($_POST['CaseNumber']) ? $_POST['CaseNumber'] : "";?>">
                                <div id="ErrCaseNumber" style="color:red"><?php echo isset($CaseNumber) ? $CaseNumber : "";?></div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="validationCustomUsername">Year</label>
                                   <select class="form-select" name="CaseYear" id="CaseYear">
                                    <option value="0">Select Year</option>
                                    <?php for($year=date("Y");$year>(date("Y")-60);$year--) { ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php } ?>
                                   </select>
                                <div id="ErrCaseYear" style="color:red"><?php echo isset($CaseYear) ? $CaseYear : "";?></div>
                            </div>
                      </div>  
                      
                      
                      
                   
                           <div class="row g-3  mb-3"> 
                        <div class="col-sm-12">
                            <hr>
                        </div>
                      </div> 
                          
                        <script>
                        function AppearingModel_Effect() {
                          
                            if ($('#AppearingModelID').val()=="0" || $('#AppearingModelID').val()==0) {
                                  $('#AppearingModelList').hide();
                            }  else {
                                $('#AppearingModelList').show();
                                     var array_data = $('#AppearingModelID').val().split("-");
                                    $('#label_1').html(array_data[0].trim());
                                    $('#appearingas1').val(array_data[0].trim());
                                    $('#label_2').html(array_data[1].trim());
                                    $('#appearingas2').val(array_data[1].trim());
                                    $('#label_3').html(array_data[0].trim()+" #");
                            }
                        }
                        </script>
                        
                        <div class="row g-3 mb-4">                         
                            <?php $appearingmodels = $mysql->select("select * from _tbl_master_appearingmodels where IsActive='1' order by AppearingModelName"); ?>
                            <div class="col-md-12">  
                                <label class="form-label" for="validationCustom03">Appearing Model</label>
                                <select class="form-select" id="AppearingModelID" name="AppearingModelID" onchange="AppearingModel_Effect()">
                                    <option value="0">Select Appearing</option>
                                    <?php foreach($appearingmodels as $appearingmodel) {?>
                                        <option value="<?php echo $appearingmodel['AppearingModelName'];?>" <?php echo ($appearingmodel['AppearingModelID']==$_POST['AppearingModelID']) ? " selected='selected' " : ""; ?>><?php echo $appearingmodel['AppearingModelName'];?></option>
                                    <?php } ?>
                                </select>                              
                                <div id="ErrAppearingModelID" style="color:red"><?php echo isset($AppearingModelID) ? $AppearingModelID : "";?></div>
                            </div>
                        </div>
                                 
                       <div class="row g-3 mb-4" id="AppearingModelList" style="display: none;"> 
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Are you appearing as?</label>
                                <div class="m-t-15 m-checkbox-inline custom-radio-ml" style="margin-top:0px !important;padding-top:12px">
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="appearingas1" type="radio" checked="checked" onclick="$('#label_3').html($('#label_1').html()+'#')" name="AppearingAs" value="" data-bs-original-title="" title="">
                                        <label class="form-check-label mb-0" for="appearingas1" id="label_1">Petitioner</label>
                                    </div>                                                   
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="appearingas2" type="radio" onclick="$('#label_3').html($('#label_2').html()+' #')" name="AppearingAs"  value=""  data-bs-original-title="" title="">
                                        <label class="form-check-label mb-0" for="appearingas2" id="label_2">Respondent</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03" id="label_3">Petitioner #</label>
                                <input class="form-control" name="AppearNumber" id="AppearNumber" type="text" placeholder="#"  value="<?php echo isset($_POST['AppearNumber']) ? $_POST['AppearNumber'] : "";?>">
                            </div>
                        </div>
                        
                        
                
                      
                      
                      <div class="row g-3  mb-3"> 
                        <div class="col-sm-12">
                            <hr>
                        </div>
                      </div>
                      
                      
                      
<div class="row g-3  mb-3">
    <div class="col-md-3">
        <label class="form-label" for="validationCustom03">Old Case/Appeal No</label>
        <input class="form-control" name="OldCaseNumber" id="OldCaseNumber" type="text" placeholder="Old Case Number"  value="<?php echo isset($_POST['OldCaseNumber']) ? $_POST['OldCaseNumber'] : "";?>">
        <div id="ErrOldCaseNumber" style="color:red"><?php echo isset($OldCaseNumber) ? $OldCaseNumber : "";?></div>
    </div>
    <div class="col-md-2">
        <label class="form-label" for="validationCustomUsername">Year</label>
        <select class="form-select" name="OldCaseYear" id="OldCaseYear">
            <option value="0">Select Year</option>
            <?php for($year=date("Y");$year>(date("Y")-60);$year--) { ?>
            <option value="<?php echo $year; ?>" <?php echo ($_POST['OldCaseYear']==$year) ? " selected='selected' " : ''; ?> ><?php echo $year; ?></option>
            <?php } ?>
        </select>
        <div id="ErrOldCaseYear" style="color:red"><?php echo isset($OldCaseYear) ? $OldCaseYear : "";?></div>
    </div>
    <div class="col-md-3">
        <label class="form-label" for="validationCustom03">First Appearance</label>
        <input class="datepicker-here form-control digits"     data-language="en" data-date-format="yyyy-mm-dd" id="DateOfFirstAppearance" name="DateOfFirstAppearance" type="text" placeholder="Date of First Appearance" aria-describedby="inputGroupPrepend" style="background:#fff"  value="<?php echo isset($_POST['DateOfFirstAppearance']) ? $_POST['DateOfFirstAppearance'] : "";?>">
        <div id="ErrDateOfFirstAppearance" style="color:red"><?php echo isset($DateOfFirstAppearance) ? $DateOfFirstAppearance : "";?></div>
    </div>
</div>

<div class="row g-3  mb-3"> 
    <?php $casetypes = $mysql->select("select * from _tbl_master_casetypes where IsActive='1' order by CaseTypeName"); ?>
    <div class="col-md-5">
        <label class="form-label" for="validationCustom01">Case Type</label>
        <select class="form-select" id="CaseTypeID" name="CaseTypeID">
            <option value="0">Select Case Type</option>
            <?php foreach($casetypes as $casetype) {?>
            <option value="<?php echo $casetype['CaseTypeID'];?>" <?php echo ($casetype['CaseTypeID']==$_POST['CaseTypeID']) ? " selected='selected' " : ""; ?> ><?php echo $casetype['CaseTypeName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrCaseTypeID" style="color:red"><?php echo isset($CaseTypeID) ? $CaseTypeID : "";?></div>
    </div>
    <div class="col-md-3">
        <label class="form-label" for="validationCustomUsername">Date of Filling</label>
        <input class="datepicker-here form-control digits"    data-language="en" data-date-format="yyyy-mm-dd" id="DateOfFilling" name="DateOfFilling" type="text" placeholder="Date of Filling" aria-describedby="inputGroupPrepend" style="background:#fff"  value="<?php echo isset($_POST['DateOfFilling']) ? $_POST['DateOfFilling'] : "";?>">
        <div id="ErrDateOfFilling" style="color:red"><?php echo isset($DateOfFilling) ? $DateOfFilling : "";?></div>
    </div>
    <div class="col-md-2">
        <label class="form-label" for="validationCustom03">Court Hall #</label>
        <input class="form-control" name="CourtHallNumber" id="CourtHallNumber" type="text" placeholder="Court Hall #"  value="<?php echo isset($_POST['CourtHallNumber']) ? $_POST['CourtHallNumber'] : "";?>">
    </div>
    <div class="col-md-2">
        <label class="form-label" for="validationCustom03">Floor #</label>
        <input class="form-control" name="FloorNumber" id="FloorNumber" type="text" placeholder="Floor #"  value="<?php echo isset($_POST['FloorNumber']) ? $_POST['FloorNumber'] : "";?>">
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-12">
        <label class="form-label" for="validationCustom02">Clarification</label>
        <input class="form-control" id="Clarification" name="Clarification" type="text" placeholder="Clarifications"  value="<?php echo isset($_POST['Clarification']) ? $_POST['Clarification'] : "";?>">
        <div id="ErrClarification" style="color:red"><?php echo isset($Clarification) ? $Clarification : "";?></div>
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-12">
        <label class="form-label" for="validationCustom02">Title</label>
        <input class="form-control" id="Title" name="Title" type="text" placeholder="Title"  value="<?php echo isset($_POST['Title']) ? $_POST['Title'] : "";?>">
        <div id="ErrTitle" style="color:red"><?php echo isset($Title) ? $Title : "";?></div>
    </div>
</div>

<div class="row g-3  mb-3">
    <div class="col-md-12">
        <label class="form-label" for="validationCustom03">Description</label>
        <textarea class="form-control" name="Description" id="Description" type="text" placeholder="Description"><?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?></textarea>
    </div>
</div>  

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label" for="validationCustomUsername">Before Hon'ble Judge(s)</label>
        <input class="form-control"  id="BeforeJudge" name="BeforeJudge" type="text" placeholder="BeforeJudge" aria-describedby="inputGroupPrepend"  value="<?php echo isset($_POST['BeforeJudge']) ? $_POST['BeforeJudge'] : "";?>">
        <div id="ErrBeforeJudge" style="color:red"><?php echo isset($BeforeJudge) ? $BeforeJudge : "";?></div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="validationCustom03">Referred By</label>
        <input class="form-control" name="ReferredBy" id="ReferredBy" type="text" placeholder="Referred By"  value="<?php echo isset($_POST['ReferredBy']) ? $_POST['ReferredBy'] : "";?>">
    </div>
</div>   

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label" for="validationCustom03">Section/Category</label>
        <input class="form-control" name="SectionCategory" id="SectionCategory" type="text" placeholder="Section/Category"  value="<?php echo isset($_POST['SectionCategory']) ? $_POST['SectionCategory'] : "";?>">
    </div>
    <?php $prioirties = $mysql->select("select * from _tbl_master_priorities where IsActive='1' order by PriorityName"); ?>
    <div class="col-md-6">
        <label class="form-label" for="validationCustom03">Prioirty</label>
        <select class="form-select" id="PriorityID" name="PriorityID">
            <option value="0">Select Priority</option>
            <?php foreach($prioirties as $prioirty) {?>
            <option value="<?php echo $prioirty['PriorityID'];?>"><?php echo $prioirty['PriorityName'];?></option>
            <?php } ?>
        </select>
        <div id="ErrPriorityID" style="color:red"><?php echo isset($PriorityID) ? $PriorityID : "";?></div>
    </div>
</div>   

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label" for="validationCustom03">Is the affidavit/vakalath filled ? </label>
        <div class="m-t-15 m-checkbox-inline custom-radio-ml" style="margin-top:0px !important;padding-top:12px;">
            <div class="form-check form-check-inline radio radio-primary">
                <input class="form-check-input" id="AffidavitFilled_y"  checked="checked"  type="radio" name="AffidavitFilled" onclick="$('#affFillDate').show();$('#AffdavitDate').show();" value="1" data-bs-original-title="" title="">
                <label class="form-check-label mb-0" for="AffidavitFilled_y">Yes</label>
            </div>
            <div class="form-check form-check-inline radio radio-primary">
                <input class="form-check-input" id="AffidavitFilled_n" type="radio" name="AffidavitFilled" onclick="$('#affFillDate').hide();$('#AffdavitDate').hide();" value="0" data-bs-original-title="" title="">
                <label class="form-check-label mb-0" for="AffidavitFilled_n">No</label>
            </div>
            <div class="form-check form-check-inline radio radio-primary">
                <input class="form-check-input" id="AffidavitFilled_o"type="radio" onclick="$('#affFillDate').hide();$('#AffdavitDate').hide();" name="AffidavitFilled" value="-1" data-bs-original-title="" title="">
                <label class="form-check-label mb-0" for="AffidavitFilled_o">Not Applicable</label>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label class="form-label" for="validationCustom03" id="affFillDate">Affdavit Filling Date</label>                                                                          
        <input class="datepicker-here form-control digits"   style="background:#fff"   data-language="en" data-date-format="yyyy-mm-dd"  name="AffdavitDate" id="AffdavitDate" type="text" placeholder="Affdavit Date"  value="<?php echo isset($_POST['AffdavitDate']) ? $_POST['AffdavitDate'] : "";?>">
    </div>
</div>   

<div class="row g-3  mb-3">
    <div class="col-md-12">
        <label class="form-label" for="validationCustom03">Remarks</label>
        <input class="form-control" name="Remarks" id="Remarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>">
    </div>
</div>
                        
                        
                  
                  <style>
table.myTable{
    width: 100%;
    border-collapse: collapse;
    margin-top:20px;
}
table.myTable th, table.myTable td{
    border-bottom: 1px solid #cdcdcd;
    padding: 7px;
}
</style>
      
      
      <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        
   
<h6 style="margin-top:35px;background: #f6f6ff;padding: 10px 10px;font-size: 17px;border-bottom: 2px solid #e5e5e5;margin-bottom:10px;">Your Advocate</h6>
          
           <div class="col-sm-12">
                <div id="ErrAdvocateID" style="color:red"><?php echo isset($AdvocateID) ? $AdvocateIDD : "";?></div>
             </div>
          <div class="row" style="height:140px;overflow:auto">
            
                <?php $advocates = $mysql->select("select * from _tbl_master_advocates where IsActive='1' order by AdvocateName"); ?>
                
                <?php
                    foreach($advocates as $advocate)  {
                ?>
                <div class="col-sm-3">
                    <label class="d-block" for="chk_<?php echo $advocate['AdvocateID'];?>">
                        <input class="checkbox_animated advocate_checked" id="chk_<?php echo $advocate['AdvocateID'];?>" name="AdvocateID[]" type="checkbox"  value="<?php echo $advocate['AdvocateID'];?>" data-bs-original-title="" title="<?php echo $advocate['AdvocateName'];?>">
                        <?php echo $advocate['AdvocateName'];?>
                    </label>
                </div>
                <?php } ?>
            
          </div> 
                                  
                          
                          
                          
         
                          
                          
                          
                          
                          
                          
                          
              </div>
                        </div>
                        
                        <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        
   
<h5 style="background: #f6f6ff;padding: 10px 10px;font-size: 17px;border-bottom: 2px solid #e5e5e5;">Opponents (Respondent)</h5>
<table class="myTable Table_Add_Respondent">
    <thead>
        <tr>                                  
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>  
            <th style="text-align: right;"><button type="button" onclick="Add_Respondent()" class="btn btn-primary btn-addrow">Add</button></th>
        </tr> 
       <!-- <tr>
            <td><input type="text" class="form-control ra_fullname" placeholder="Enter Fill Name">
                <span id="err_ra_fullname" style="color:red"></span>
            </td>
            <td><input type="text" class="form-control ra_email" placeholder="Enter Email Address"></td>
            <td><input type="text" class="form-control ra_mobile" placeholder="Enter Phone Number"></td>
            <td style="text-align:right;"><button type="button" onclick="Add_Respondent_Advocate()" class="btn btn-primary btn-addrow">Add</button></td>
        </tr>   
        -->                                                                   
    </thead>    
      <tbody>                          
            <tr>
      <td><input type='text' name='ra_name[]' class='form-control' value=''></td> 
      <td><input type='text' name='ra_email[]' class='form-control' value=''></td> 
      <td><input type='text' name='ra_mobile[]' class='form-control' value=''></td> 
      <td></td>
      </tr>                               
    </tbody>
</table>         
                          
<script>

 

function Add_Respondent(){
    
    //$('#err_ra_fullname').html("");
    //var ra_fullname = $('.ra_fullname').val();
    //var ra_email = $('.ra_email').val();
    //var ra_mobile = $('.ra_mobile').val();
      
    //if (ra_fullname!="") {
        $('.Table_Add_Respondent tbody').append("<tr>" 
                                        + "<td><input type='text' name='ra_name[]' class='form-control' value=''></td>"
                                        + "<td><input type='text' name='ra_email[]' class='form-control' value=''></td>"
                                        + "<td><input type='text' name='ra_mobile[]' class='form-control' value=''></td>"
                                        + "<td style='text-align:right'><a href='javascript:void(0)' onclick=\"$(this).parents('tr').remove();\">Remove</a></td></tr>");
      //  $('.ra_fullname').val("");
      // $('.ra_email').val("");
      //  $('.ra_mobile').val("");
    //} else {
      //  $('#err_ra_fullname').html("Enter Name");
    //}
}
</script>                         
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
              </div>
                        </div>
                        
                        
                          <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        
   
<h6 style="margin-top:35px;background: #f6f6ff;padding: 10px 10px;font-size: 17px;border-bottom: 2px solid #e5e5e5;">Opponent Advocates (Respondent)</h6>
<table class="myTable Add_Respondent_Advocate">
    <thead>
        <tr>                                  
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>  
            <th style="text-align: right;"><button type="button" onclick="Add_Respondent_Advocate()" class="btn btn-primary btn-addrow">Add</button></th>
        </tr> 
       <!-- <tr>
            <td><input type="text" class="form-control ra_fullname" placeholder="Enter Fill Name">
                <span id="err_ra_fullname" style="color:red"></span>
            </td>
            <td><input type="text" class="form-control ra_email" placeholder="Enter Email Address"></td>
            <td><input type="text" class="form-control ra_mobile" placeholder="Enter Phone Number"></td>
            <td style="text-align:right;"><button type="button" onclick="Add_Respondent_Advocate()" class="btn btn-primary btn-addrow">Add</button></td>
        </tr>   
        -->                                                                   
    </thead>    
      <tbody>  
      <tr>
      <td><input type='text' name='radv_name[]' class='form-control' value=''></td> 
      <td><input type='text' name='radv_email[]' class='form-control' value=''></td> 
      <td><input type='text' name='radv_mobile[]' class='form-control' value=''></td> 
      <td></td>
      </tr>                                 
    </tbody>
</table>         
                          
<script>

function Add_Respondent_Advocate(){
    
    //$('#err_ra_fullname').html("");
    //var ra_fullname = $('.ra_fullname').val();
    //var ra_email = $('.ra_email').val();
    //var ra_mobile = $('.ra_mobile').val();
      
    //if (ra_fullname!="") {
        $('.Add_Respondent_Advocate tbody').append("<tr>" 
                                        + "<td><input type='text' name='radv_name[]' class='form-control' value=''></td>"
                                        + "<td><input type='text' name='radv_email[]' class='form-control' value=''></td>"
                                        + "<td><input type='text' name='radv_mobile[]' class='form-control' value=''></td>"
                                       + "<td style='text-align:right'><a href='javascript:void(0)' onclick=\"$(this).parents('tr').remove();\">Remove</a></td></tr>");
      //  $('.ra_fullname').val("");
      // $('.ra_email').val("");
      //  $('.ra_mobile').val("");
    //} else {
      //  $('#err_ra_fullname').html("Enter Name");
    //}
}
</script>                         
                          
                          
         
                          
                          
                          
                          
                          
                          
                          
              </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;margin-top:50px;">
                                <a href="dashboard.php?action=Cases/new" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Create Case</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!--<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Vertically centered</button>-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to create Staff account.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal-->

