<div class="page-wrapper" style="display: block;">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Placement Genealogy</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Placement Genealogy</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small><?php echo $_SESSION['User']['MemberCode'];?></small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
                $parentCode = isset($_GET['Code']) ? $_GET['Code'] : $_SESSION['User']['MemberCode'];
              
                $L = $mysqldb->select("select * from `_tbl_Members` where `MemberCode`='".$parentCode."'");
                $str = "[[{v:'".$L[0]['MemberCode']."',f:'<b><span style=color:green;>".$L[0]['MemberCode']."</span></b><div style=color:green; font-style:italic; >".$L[0]['MemberName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($L[0]['CreatedOn']))."</div><br>'},'', 'Active'],";
                           
               
                $A = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='L'");
                if (sizeof($A)==0) {
                    $str .= "[{v:'Vacant_1581', f:'<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$L[0]['MemberCode']."&p=1 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
                } else {
                   
                    $str .= "[{v:'".$A[0]['ChildCode']."', f:'<b><span style=color:green;>".$A[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$A[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($A[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$A[0]['ChildCode']." >Downline</a>]</div>'},'".$L[0]['MemberCode']."', 'Active'],";
                    
                    $AA = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='L'");
                    if (sizeof($AA)==0) {
                        $str .= "[{v:'Vacant_1582', f:'<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$A[0]['ChildCode']."&p=1 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
                    } else {
                        $str .= "[{v:'".$AA[0]['ChildCode']."', f:'<b><span style=color:green;>".$AA[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$AA[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($AA[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$AA[0]['ChildCode']." >Downline</a>]</div>'},'".$A[0]['ChildCode']."', 'Active'],";
                    }
                    
                    $AB = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='R'");
                    if (sizeof($AB)==0) {
                        $str .= "[{v:'Vacant_1583', f:'<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$A[0]['ChildCode']."&p=2 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
                    } else {
                        $str .= "[{v:'".$AB[0]['ChildCode']."', f:'<b><span style=color:green;>".$AB[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$AB[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($AB[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$AB[0]['ChildCode']." >Downline</a>]</div>'},'".$A[0]['ChildCode']."', 'Active'],";
                    }
                }
                
                $B = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='R'");
                if (sizeof($B)==0) {
                    $str .= "[{v:'Vacant_1584', f:'<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$L[0]['MemberCode']."&p=2 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
                } else {
                    $str .= "[{v:'".$B[0]['ChildCode']."', f:'<b><span style=color:green;>".$B[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$B[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($B[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$B[0]['ChildCode']." >Downline</a>]</div>'},'".$L[0]['MemberCode']."', 'Active'],";
                    
                    $BA = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='L'");
                    if (sizeof($BA)==0) {
                        $str .= "[{v:'Vacant_1585', f:'<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$B[0]['ChildCode']."&p=1 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
                    } else {
                        $str .= "[{v:'".$BA[0]['ChildCode']."', f:'<b><span style=color:green;>".$BA[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$BA[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($BA[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$BA[0]['ChildCode']." >Downline</a>]</div>'},'".$B[0]['ChildCode']."', 'Active'],";
                    }
                    
                    $BB = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='R'");
                    if (sizeof($BB)==0) {
                        $str .= "[{v:'Vacant_1586', f:'<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$B[0]['ChildCode']."&p=2 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
                    } else {
                        $str .= "[{v:'".$BB[0]['ChildCode']."', f:'<b><span style=color:green;>".$BB[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$BB[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($BB[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$BB[0]['ChildCode']." >Downline</a>]</div>'},'".$B[0]['ChildCode']."', 'Active'],";
                    }
                }
                
                    
                
                
                
                $str .= "]";
            ?>
            <div class="container-fluid">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages:["orgchart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Name');
data.addColumn('string', 'Manager');
data.addColumn('string', 'ToolTip');
// For each orgchart box, provide the name, manager, and tooltip to show.

data.addRows(<?php echo $str;?>);   

// Create the chart.
var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
// Draw the chart, setting the allowHtml option to true for the tooltips.
//chart.draw(data, {allowHtml:true});
chart.draw(data, {allowHtml:true,size:'medium',color:'#edf7ff'});
}
</script>
<style>
table.google-visualization-orgchart-table {
    border-collapse: separate;
}
</style>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-light-green">

        <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="m-b-0 text-orange "><i class="mdi mdi mdi-sitemap  p-r-10"></i>Placement Genealogy</h4>
                                    </div>
                                                                    </div>
                                        
                                      </div>
      
<div class="card " style="">
<div class="card-body" style=" overflow-x: auto;">
      <div id="chart_div" style="border:0px; width:100%; height: 600px;  overflow-x: auto; overflow-y: auto;  ">
      <!-- <table class="google-visualization-orgchart-table" dir="ltr" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td><td class="google-visualization-orgchart-space-medium"></td></tr><tr class="google-visualization-orgchart-noderow-medium"><td colspan="12" class="google-visualization-orgchart-linenode">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="Active"><b><span style="color:green;">AJAI7</span></b><div style="color:green;" font-style:italic;="">N kumar</div><div style="color:#B8B1AF;" font-style:italic;="">10/17/2018</div><br><div><center><table border="1"><tbody><tr><td>L : 1000.00000000</td><td>R : 1000.00000000</td></tr><tr><td>L : 0</td><td>R : 0</td></tr></tbody></table></center></div></td><td colspan="12" class="google-visualization-orgchart-linenode">&nbsp;</td></tr><tr class="google-visualization-orgchart-connrow-medium"><td colspan="7" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineleft google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td colspan="7" class="google-visualization-orgchart-linenode">&nbsp;</td></tr><tr class="google-visualization-orgchart-connrow-medium"><td colspan="7" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineleft">&nbsp;</td><td colspan="14" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineright">&nbsp;</td><td colspan="7" class="google-visualization-orgchart-linenode">&nbsp;</td></tr><tr class="google-visualization-orgchart-noderow-medium"><td colspan="4" class="google-visualization-orgchart-linenode">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="Active"><b><span style="color:green;">GOOD7</span></b><div style="color:green;" font-style:italic;="">Ajaikumar</div><div style="color:#B8B1AF;" font-style:italic;="">10/21/2018</div><br><div><center><table border="1"><tbody><tr><td>LBV : 0.00000000</td><td>RBV : 0.00000000</td></tr><tr><td>LT : 0</td><td>RT : 0</td></tr></tbody></table></center></div><div><a href="https://gcchub.org/panel/User/Pgene/R09PRDc~/">Downlines</a></div><div style="width:80px;"></div></td><td colspan="10" class="google-visualization-orgchart-linenode">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="Active"><b><span style="color:green;">AJAIGOOD</span></b><div style="color:green;" font-style:italic;="">Ajaikumar</div><div style="color:#B8B1AF;" font-style:italic;="">10/21/2018</div><br><div><center><table border="1"><tbody><tr><td>LBV : 0.00000000</td><td>RBV : 0.00000000</td></tr><tr><td>LT : 0</td><td>RT : 0</td></tr></tbody></table></center></div><div><a href="https://gcchub.org/panel/User/Pgene/QUpBSUdPT0Q~/">Downlines</a></div><div style="width:80px;"></div></td><td colspan="4" class="google-visualization-orgchart-linenode">&nbsp;</td></tr><tr class="google-visualization-orgchart-connrow-medium"><td colspan="3" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineleft google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td colspan="8" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineleft google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-linebottom">&nbsp;</td><td colspan="3" class="google-visualization-orgchart-linenode">&nbsp;</td></tr><tr class="google-visualization-orgchart-connrow-medium"><td colspan="3" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineleft">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineright">&nbsp;</td><td colspan="8" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineleft">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-linenode">&nbsp;</td><td class="google-visualization-orgchart-linenode google-visualization-orgchart-lineright">&nbsp;</td><td colspan="3" class="google-visualization-orgchart-linenode">&nbsp;</td></tr><tr class="google-visualization-orgchart-noderow-medium"><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="Blocked"><b><span style="color:black;">JEY6</span></b><div style="color:black;" font-style:italic;="">Jeyaraja</div><div style="color:#B8B1AF;" font-style:italic;="">10/29/2018</div><br><div><center><table border="1"><tbody><tr><td>LBV : 0.00000000</td><td>RBV : 0.00000000</td></tr><tr><td>LT : 0</td><td>RT : 0</td></tr></tbody></table></center></div><div><a href="https://gcchub.org/panel/User/Pgene/SkVZNg~~/">Downlines</a></div><div style="width:80px;"></div></td><td colspan="2" class="google-visualization-orgchart-linenode">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="GCCHub"><div style="color:red;"><a href="https://gcchub.org/panel/User/Refer/R09PRDc~/R" target="new">Add User</a></div><div style="width:80px;" font-style:italic="">&nbsp;</div><div style="width:80px;"></div><br></td><td colspan="2" class="google-visualization-orgchart-linenode">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium google-visualization-orgchart-nodesel" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="GCCHub"><div style="color:red;"><a href="https://gcchub.org/panel/User/Refer/QUpBSUdPT0Q~/L" target="new">Add User</a></div><div style="width:80px;" font-style:italic="">&nbsp;</div><div style="width:80px;"></div><br></td><td colspan="2" class="google-visualization-orgchart-linenode">&nbsp;</td><td colspan="6" class="google-visualization-orgchart-node google-visualization-orgchart-node-medium" style="background: rgb(237, 247, 255) none repeat scroll 0% 0%;" title="GCCHub"><div style="color:red;"><a href="https://gcchub.org/panel/User/Refer/QUpBSUdPT0Q~/R" target="new">Add User</a></div><div style="width:80px;" font-style:italic="">&nbsp;</div><div style="width:80px;"></div><br></td></tr><tr class="google-visualization-orgchart-connrow-medium"><td colspan="30" class="google-visualization-orgchart-linenode">&nbsp;</td></tr></tbody></table>-->
      </div>
</div>          
</div>
    </div>
  </div>
</div>
<style type="text/css">
.status-delete {
    color: #ffffff;
    border: 1px solid #ff0000;
    padding: 5px 7px;
    border-radius: 5px;
    text-transform: uppercase;
    font-size: 11px;
    background: #ff0000;
    margin-right: 25px;
    cursor: pointer;
    position: relative;
    z-index: 9999;
    top: 10px;
}
.status-delete:hover {
    color: #ffffff;
    border: 1px solid #ff0000;
    padding: 5px 7px;
    border-radius: 5px;
    text-transform: uppercase;
    font-size: 11px;
    background: #ff0000;
    margin-right: 25px;
    cursor: pointer;
    position: relative;
    z-index: 9999;
    top: 10px;
}
</style>
            </div>
            


             
<!-- Bootstrap tether Core JavaScript -->
    <script src="https://gcchub.org/panel/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="https://gcchub.org/panel/assets/dist/js/app.min.js"></script>
    <script src="https://gcchub.org/panel/assets/dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src="https://gcchub.org/panel/assets/dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="https://gcchub.org/panel/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://gcchub.org/panel/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Menu sidebar -->
    <script src="https://gcchub.org/panel/assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="https://gcchub.org/panel/assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="https://gcchub.org/panel/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="https://gcchub.org/panel/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="https://gcchub.org/panel/assets/extra-libs/jqbootstrapvalidation/validation.js"></script>

    <script src="https://gcchub.org/panel/assets/extra-libs/treeview/dist/bootstrap-treeview.min.js"></script>
    <script src="https://gcchub.org/panel/assets/extra-libs/treeview/dist/bootstrap-treeview-init.js"></script>
    <!--chartjs -->
    
    <script src="https://gcchub.org/panel/assets/dist/js/pages/dashboards/dashboard1.js"></script>
    
<script src="https://gcchub.org/panel/assets/js/countdown-timer.js"></script>
    <script type="text/javascript">
        (function($) {
    var $window = $(window),
        $html = $('.sidebar-item');

    $window.resize(function resize(){
        if ($window.width() < 514) {
            return $html.removeClass('width-50');
        } else{
            $('.last-li').addClass('width-50');
        }

        //$html.addClass('width-50');
    }).trigger('resize');
})(jQuery);
    </script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);

$(document).ready(function() {
    var scrollTop = $(".scrollTop");
  $(window).scroll(function() {
    var topPos = $(this).scrollTop();
    if (topPos > 500) {
      $(scrollTop).css("opacity", "1");

    } else {
      $(scrollTop).css("opacity", "0");
    }

  });
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;

  });
});
    </script>

<script type="text/javascript">
$( document ).ready(function() {
    $(".notify-count").on('click', function() {
        var baseURL = 'https://gcchub.org/';
        $.ajax({
            type: 'POST',
            url: baseURL+'panel/User/NotifyAlert',
            data:{},
            dataType: 'json',
            success: function(data){
                $('.notification-count').hide();
                return true;
            }
        });   
        return true; 
    
});
});
function emailActivation(){
var base_url = 'https://gcchub.org/panel/';
var username = 'AJAI7';
$.ajax({
      type: "POST",
      dataType: "json",
      url: base_url+"User/EmailActivation", //Relative or absolute path to response.php file
      data: {"username":username},
      success: function(data) {
        if(data["json"] == 'EmailVerify'){
            //alert('Please check your Inbox. Email verification link has been sent. ');
            $("#email-icon").css({"color":"#8dc63f"});
            $("#email-not-done").hide();
            $("#email-done").show();
        }
      }
    }); 
}
//  ----------------------------------------------------------------------------
</script>

        </div> 