<?php
     include_once("config.php");
     
     if (isset($_GET['action'])) {
     echo $_GET['action']();
     }
     
     
     function getDistrictNames() {
         global $mysql;
         $DistrictNames = $mysql->select("select * from _tbl_master_districtnames where IsActive='1' and StateNameID='".$_GET['StateNameID']."' order by DistrictName");
         ?>
         <label class="form-label" for="validationCustom03">District Name</label>
         <select class="form-select" name="DistrictNameID" id="DistrictNameID">
            <option value="0">Select District Name</option>
            <?php foreach($DistrictNames as $Districtname) { ?>
                <option value="<?php echo $Districtname['DistrictNameID'];?>" <?php echo $_GET['DistrctNameID']==$Districtname['DistrictNameID'] ? ' selected="selected" ' : '';?> ><?php echo $Districtname['DistrictName'];?></option>
            <?php } ?>
         </select>
         <div id="ErrDistrictName" style="color:red"><?php echo isset($DistrictName) ? $DistrictName : "";?></div>
         <?php
     } 
     
    
     function clientNames() {
         global $mysql; 
         if (isset($_GET['q']) && strlen(trim($_GET['q']))>0) {
             $clients = $mysql->select("select ClientID as value,ClientName as text from _tbl_master_clients where IsActive='1' and ClientName like '".$_GET['q']."%' order by ClientName");
         } else {
         $clients = $mysql->select("select ClientID as value,ClientName as text from _tbl_master_clients where IsActive='1' order by ClientName");
         }
         
        
         return json_encode($clients);
     }
     
     function getHighCourtBench() {
         global $mysql; 
         $benches = $mysql->select("select * from _tbl_master_highcourts_bench where HighCourtID='".$_GET['HighCourt']."' and IsActive='1' order by BenchName") ;
         
         echo "<script>";
         echo "\$('#HighCourtBenchID').children().remove().end();";
         echo "\$('#HighCourtBenchID').append(new Option('Select Bench', '0'));";
            foreach($benches as $benche) {
                echo "\$('#HighCourtBenchID').append(new Option('".$benche['BenchName']."', '".$benche['HighCourtBenchID']."'));";
            }
            
         echo "</script>";
     }
     

     
     function getConsumerCourtDistrictNames() {
         global $mysql;   
         $DistrictNames = $mysql->select("select * from _tbl_master_districtnames where IsActive='1' and StateNameID='".$_GET['StateNameID']."' order by DistrictName");
         
          echo "<script>";
         echo "\$('#ConsumerDistrctID').children().remove().end();";
         echo "\$('#ConsumerDistrctID').append(new Option('Select Distrct', '0'));";
            foreach($DistrictNames as $DistrictName) {
                echo "\$('#ConsumerDistrctID').append(new Option('".$DistrictName['DistrictName']."', '".$DistrictName['DistrictNameID']."'));";
            }
            
         echo "</script>";
          
     }
     
     
     function getDistrictNamesList() {
         global $mysql;   
         $DistrictNames = $mysql->select("select * from _tbl_master_districtnames where IsActive='1' and StateNameID='".$_GET['StateNameID']."' order by DistrictName");
         echo "<script>";
         echo "\$('#".$_GET['DivID']."').children().remove().end();";
         echo "\$('#".$_GET['DivID']."').append(new Option('Select Distrct', '0'));";
         foreach($DistrictNames as $DistrictName) {
             if ($DistrictName['DistrictNameID']==$_GET['Selected']) {
                echo "\$('#".$_GET['DivID']."').append(new Option('".$DistrictName['DistrictName']."', '".$DistrictName['DistrictNameID']."',true, true));";
             } else {
                echo "\$('#".$_GET['DivID']."').append(new Option('".$DistrictName['DistrictName']."', '".$DistrictName['DistrictNameID']."'));";     
             }
         }
         echo "</script>";
     }

     
     
     function getDistrictCourtDistrictNames() {
         global $mysql;   
         $DistrictNames = $mysql->select("select * from _tbl_master_districtnames where IsActive='1' and StateNameID='".$_GET['StateNameID']."' order by DistrictName");
         
         echo "<script>";
         echo "\$('#DistrctCourtDistrictNameID').children().remove().end();";
         echo "\$('#DistrctCourtDistrictNameID').append(new Option('Select Distrct', '0'));";
         foreach($DistrictNames as $DistrictName) {
            echo "\$('#DistrctCourtDistrictNameID').append(new Option('".$DistrictName['DistrictName']."', '".$DistrictName['DistrictNameID']."'));";
         }
         
         echo "\$('#DistrctCourtPlaceNameID').children().remove().end();";
         echo "\$('#DistrctCourtPlaceNameID').append(new Option('Select Place', '0'));";
         echo "\$('#DistrictCourtTypeID').children().remove().end();";
         echo "\$('#DistrictCourtTypeID').append(new Option('Select SubCourt', '0'));";
         
         echo "</script>";
     }
     
     function getDistrictCourtPlaceNames() {
         global $mysql;   
         $PlaceNames = $mysql->select("select * from _tbl_master_placenames where IsActive='1' and DistrictNameID='".$_GET['DistrictNameID']."' order by PlaceName");
         echo "<script>";
         echo "\$('#DistrctCourtPlaceNameID').children().remove().end();";
         echo "\$('#DistrctCourtPlaceNameID').append(new Option('Select Place', '0'));";
         if (sizeof($PlaceNames)>0) {
             foreach($PlaceNames as $PlaceName) {
                echo "\$('#DistrctCourtPlaceNameID').append(new Option('".$PlaceName['PlaceName']."', '".$PlaceName['PlaceNameID']."'));";     
             }
             echo "\$('#DistrictCourtTypeID').children().remove().end();";
             echo "\$('#DistrictCourtTypeID').append(new Option('Select SubCourt', '0'));";
             $DistrictCourts = $mysql->select("select * from _tbl_master_districtcourttypes where IsActive='1'   order by DistrictCourtTypeName");
              foreach($DistrictCourts as $DistrictCourt) {
                echo "\$('#DistrictCourtTypeID').append(new Option('".$DistrictCourt['DistrictCourtTypeName']."', '".$DistrictCourt['DistrictCourtTypeID']."'));";     
             }
         } else {
              echo "\$('#DistrictCourtTypeID').children().remove().end();";
              echo "\$('#DistrictCourtTypeID').append(new Option('Select SubCourt', '0'));";
         }
         echo "</script>";
     }
     
     
     function getCalandarHirings() {
          global $mysql;   
          $cases = $mysql->select("select * from _tbl_cases_register where IsActive=1 and CaseID in ( SELECT CaseID FROM _tbl_cases_hirings WHERE DATE(NextHiringDate)=date('".$_GET['param']."'))");
          
          ?>
           <div class="modal-header">
                <h5 class="modal-title">Hirings: 
                <br>
                <span style="color:#555;font-size:14px;"><?php echo date("M d, Y", strtotime($_GET['param']));?></span>
                
                </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
           <div class="table-responsive" style="overflow: hidden;">
                        <table class="display" id="basic-8" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Case Number</th>
                                    <th>CNR Number</th>
                                    <th>Client Name</th>
                                    <th>Court Name</th>
                                    <th>Case Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($cases as $case) {
                                        $pirority = $mysql->select("Select * from _tbl_master_priorities where PriorityID='".$case['PriorityID']."'");
                                ?>
                                <tr>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CaseNumber'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CNRNumber'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['ClientName'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CourtName'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CaseTypeName'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>;text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a href="dashboard.php?action=Cases/view&case=<?php echo md5($case['CreatedOn'].$case['CaseID']);?>"> 
                                        View
                                        </a>&nbsp;
                                        <a style="color:red" href="dashboard.php?action=Cases/edit&edit=<?php echo md5($case['CreatedOn'].$case['CaseID']);?>"> 
                                        <input class="jsgrid-button jsgrid-edit-button" type="button" title="" data-bs-original-title="Edit" aria-label="Edit">
                                        </a>
                                        <!--
                                        <input class="jsgrid-button jsgrid-delete-button" type="button" title="" data-bs-original-title="Delete" aria-label="Delete">
                                        -->
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
          <?php
     }
     
 ?> 
 