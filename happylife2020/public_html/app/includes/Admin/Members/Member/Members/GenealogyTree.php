<script src="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css" />

<style>
.Gold {background:#ffdabc !important;padding:5px;}
.Gold:hover {background:#fce8d9 !important;}

.Silver {background:#d1fccc !important;padding:5px;}
.Silver:hover {background:#e3fce0}

.Diamond {background:#a8e2f7 !important;padding:5px;}
.Diamond:hover {background:#cfedf7}

</style>
<?php 
$treepath = "dashboard.php?action=Members/ViewMember&cp=Members/GenealogyTree&MCode=".$_GET['MCode'];
    function getCss($packageID) {
        if ($packageID==1) {
            return "Silver";
        }
        if ($packageID==2) {
            return "Gold";
        }
        if ($packageID==3) {
            return "Diamond";
        }
        
    }

    $ids = array();
    
    $leftCode = $memberTree->GetLeftLastCode($data[0]['MemberCode']);
    $rightCode = $memberTree->GetLastRight($data[0]['MemberCode']);
    
    $parentCode = isset($_GET['Code']) ? $_GET['Code'] : $data[0]['MemberCode'];
    
    $L = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$parentCode."'");
    
    $str = "[[{v:'".$L[0]['MemberCode']."',f:'<div id=id_".$L[0]['MemberCode']." class=".getCss($L[0]['CurrentPackageID'])." >".getImage($L[0]['Thumb'],$L[0]['Sex'])."<br><b><span style=color:green;>".$L[0]['MemberCode']."</span></b><br>".$L[0]['MemberName']."</div>'},'', 'Active'],";
    
    $A = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='L'");
    if (sizeof($A)==0) {
        if ($leftCode==$parentCode) { 
            $str .= "[{v:'Vacant_1581', f:'".getImage($A[0]['Thumb'],$A[0]['Sex'])."<div style=color:red;>Add User</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
        } else {
            $str .= "[{v:'Vacant_1581', f:'".getImage($A[0]['Thumb'],$_A[0]['Sex'])."</div><div style=width:80px; font-style:italic>&nbsp;</div></div>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
        }                                                         
    } else {
        $_A = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$A[0]['ChildCode']."'");
        $str .= "[{v:'".$A[0]['ChildCode']."', f:'<div id=id_".$A[0]['ChildCode']."  class=".getCss($A[0]['PackageID'])." >".getImage($A[0]['Thumb'],$A[0]['Sex'])."<br><b><span style=color:green;>".$A[0]['ChildCode']."</span></b><br>".$A[0]['ChildName']."<div>[<a href=".$treepath."&Code=".$A[0]['ChildCode']." >Downline</a>]</div></div>'},'".$L[0]['MemberCode']."', 'Active'],";
        
        $AA = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='L'");
        if (sizeof($AA)==0) {
            if ($leftCode==$A[0]['ChildCode']) { 
                $str .= "[{v:'Vacant_1582', f:'<br>".getImage($_A[0]['Thumb'],$_A[0]['Sex'])."<div style=color:red;>Add User</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
            } else {
                $str .= "[{v:'Vacant_1582', f:'".getImage($A[0]['Thumb'],$_A[0]['Sex'])."</div></div>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
            }
        } else {
            $_AA = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$AA[0]['ChildCode']."'");
            $str .= "[{v:'".$AA[0]['ChildCode']."', f:'<div id=id_".$AA[0]['ChildCode']."  class=".getCss($AA[0]['PackageID'])." >".getImage($_AA[0]['Thumb'],$_AA[0]['Sex'])."<br><b><span style=color:green;>".$AA[0]['ChildCode']."</span></b><br>".$AA[0]['ChildName']."<div>[<a href=".$treepath."&Code=".$AA[0]['ChildCode']." >Downline</a>]</div></div>'},'".$A[0]['ChildCode']."', 'Active'],";
        }
        
        $AB = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='R'");
        if (sizeof($AB)==0) {
             if ($rightCode==$A[0]['ChildCode']) {
                $str .= "[{v:'Vacant_1583', f:'<br><div style=color:red;>Add User</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
             } else {
                $str .= "[{v:'Vacant_1583', f:'<br>".getImage($_AA[0]['Thumb'],$_AA[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";     
             }
        } else {
            $_AB = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$AB[0]['ChildCode']."'");
            $str .= "[{v:'".$AB[0]['ChildCode']."', f:'<div id=id_".$AB[0]['ChildCode']."  class=".getCss($AB[0]['PackageID'])." >".getImage($_AB[0]['Thumb'],$_AB[0]['Sex'])."<br><b><span style=color:green;>".$AB[0]['ChildCode']."</span></b><br>".$AB[0]['ChildName']."<div>[<a href=".$treepath."&Code=".$AB[0]['ChildCode']." >Downline</a>]</div></div>'},'".$A[0]['ChildCode']."', 'Active'],";
        }
    }

    $B = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='R'");
    if (sizeof($B)==0) { 
        if ($rightCode==$parentCode) {  
            $str .= "[{v:'Vacant_1584', f:'<br>".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=color:red;>Add User</div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
        } else {
            $str .= "[{v:'Vacant_1584', f:'".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
        }
    } else {
        $_B = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$B[0]['ChildCode']."'");
        $str .= "[{v:'".$B[0]['ChildCode']."', f:'<div id=id_".$B[0]['ChildCode']."  class=".getCss($B[0]['PackageID'])." >".getImage($_B[0]['Thumb'],$_B[0]['Sex'])."<br><b><span style=color:green;>".$B[0]['ChildCode']."</span></b><br>".$B[0]['ChildName']."<div>[<a href=".$treepath."&Code=".$B[0]['ChildCode']." >Downline</a>]</div></div>'},'".$L[0]['MemberCode']."', 'Active'],";
        
        $BA = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='L'");
        if (sizeof($BA)==0) {
             if ($leftCode==$B[0]['ChildCode']) {
                $str .= "[{v:'Vacant_1585', f:'<br>".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=color:red;>Add User</div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
             } else {
                $str .= "[{v:'Vacant_1585', f:'<br>".getImage($B[0]['Thumb'],$B[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
             }
        } else {
            $_BA = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$BA[0]['ChildCode']."'");
            $str .= "[{v:'".$BA[0]['ChildCode']."', f:'<div id=id_".$BA[0]['ChildCode']."  class=".getCss($BA[0]['PackageID'])." >".getImage($_BA[0]['Thumb'],$_BA[0]['Sex'])."<br><b><span style=color:green;>".$BA[0]['ChildCode']."</span></b><br>".$BA[0]['ChildName']."<div>[<a href=".$treepath."&Code=".$BA[0]['ChildCode']." >Downline</a>]</div></div>'},'".$B[0]['ChildCode']."', 'Active'],";
        }
                    
        $BB = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='R'");
        if (sizeof($BB)==0) {
             if ($rightCode==$B[0]['ChildCode']) {
                $str .= "[{v:'Vacant_1586', f:'<br>".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=color:red;>Add User</div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
             } else {              
                 $str .= "[{v:'Vacant_1586', f:'<br>".getImage($_B[0]['Thumb'],$_B[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
             }
        } else {
            $_BB = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$BB[0]['ChildCode']."'");
           $str .= "[{v:'".$BB[0]['ChildCode']."', f:'<div id=id_".$BB[0]['ChildCode']." class=".getCss($BB[0]['PackageID'])." >".getImage($BB[0]['Thumb'],$BB[0]['Sex'])."<br><b><span style=color:green;>".$BB[0]['ChildCode']."</span></b><br>".$BB[0]['ChildName']."<div>[<a href=".$treepath."&Code=".$BB[0]['ChildCode']." >Downline</a>]</div></div>'},'".$B[0]['ChildCode']."', 'Active'],";    
        }
    }
    $str .= "]";     
                            
$ids[]=isset($L[0]['MemberCode']) ? $L[0]['MemberCode']: "";    
$ids[]=isset($A[0]['ChildCode']) ? $A[0]['ChildCode'] : "";    
$ids[]=isset($AA[0]['ChildCode']) ? $AA[0]['ChildCode'] : "";    
$ids[]=isset($AB[0]['ChildCode']) ? $AB[0]['ChildCode'] : "";    
$ids[]=isset($B[0]['ChildCode']) ? $B[0]['ChildCode'] : "";    
$ids[]=isset($BA[0]['ChildCode']) ? $BA[0]['ChildCode'] : "";    
$ids[]=isset($BB[0]['ChildCode']) ? $BB[0]['ChildCode'] : "";    
?>

    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Genealogy Tree</h4>
                </div>
                <div class="card-body">
                  <?php
                          $leftCount = $memberTree->getTotalLeftCount($parentCode);
                          $member_leftPV=$memberTree->PV;
                          $rightCount = $memberTree->getTotalRightCount($parentCode);
                          $member_rightPV=$memberTree->PV;
                  ?>
                     
                    <div id="statisticsChart"></div>
                    <div id="chart_div" style="border:0px; width:100%; height: 600px;  overflow-x: auto; overflow-y: auto;  ">
                </div>
            </div>          
        </div>       
    </div>
</div>

<div style="display:none">

<?php
 // print_r($ids);
 foreach($ids as $a) {
     if ($a!="") {
         $memberinfo = $mysql->select("select * from _tbl_Members where MemberCode='".$a."'");
         
          $memberTree->GetNodeIDs($a,"L");
          $totalLeftPV = $memberTree->leftPV;
          $todayLeftPV = $memberTree->todayLeftPV;
          
          $memberTree->GetNodeIDs($a,"R");
          $totalRightPV = $memberTree->rightPV;
          $todayRightPV = $memberTree->todayRightPV;
          
          $leftCount = $memberTree->getTotalLeftCount($a);
          $rightCount = $memberTree->getTotalRightCount($a);
                          
                          
     ?>
     <div id="member_<?php echo $a;?>" >
<div style="height: 200px;width:200px;padding:10px;">
    <table style="width:100%;">
        <tr>
            <td style="text-align: center;">
                <?php echo getImage($memberinfo[0]['Thumb'],$memberinfo[0]['Sex']);?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center"><?php echo $memberinfo[0]['MemberCode'];?></td>
        </tr>
        <tr>
            <td style="text-align: center"><?php echo $memberinfo[0]['MemberName'];?></td>     
        </tr>
        <tr>
            <td style="text-align: center"><?php echo $memberinfo[0]['CurrentPackageName'];?></td>     
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <table align="center">
                    <tr>
                        <td></td>
                        <td style="padding-left:5px;padding-right:5px;">Left</td>
                        <td style="padding-left:5px;padding-right:5px;">Right</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Members</td>
                        <td style="text-align: center"><?php echo $leftCount;?></td>
                        <td style="text-align: center"><?php echo $rightCount;?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">PV</td>
                        <td style="text-align: center"><?php echo $totalLeftPV; ?></td>
                        <td style="text-align: center"><?php echo $totalRightPV; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Today PV</td>
                        <td style="text-align: center"><?php echo $todayLeftPV; ?></td>
                        <td style="text-align: center"><?php echo $todayRightPV; ?></td>
                    </tr>
                </table>
             </td>
            <td></td>
        </tr> 
           
    </table>

</div>


</div>
     <?php
 } }
?>


<script>

$(document).ready(function()
 {

<?php
 // print_r($ids);
 foreach($ids as $a) {
     if ($a != "") {
         $memberinfo = $mysql->select("select * from _tbl_Members where MemberCode='".$a."'");
         //qtip-ui qtip-youtube     qtip-light //gray
         if ($memberinfo[0]['CurrentPackageID']==3) {
             $style="qtip-blue";
         }
         if ($memberinfo[0]['CurrentPackageID']==1) {
             $style="qtip-green";
         }
         if ($memberinfo[0]['CurrentPackageID']==2) {
             $style="qtip-orange";
         }
         
     ?>
            $('#id_<?php echo $a;?>').qtip({
                
                content: {
                text:  $('#member_<?php echo $a;?>').html(),
                title: {
                    text: 'Member Information',
                    button: true
                }
            },
            hide: { 
                event: 'click',
                inactive: 150000
            },
            style: '<?php echo $style;?>'
               
         });                                           
         <?php } }?>
 });
</script>

</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages:["orgchart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Name');
data.addColumn('string', 'Manager');
data.addColumn('string', 'ToolTip');
data.addRows(<?php echo $str;?>);   
var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
chart.draw(data, {allowHtml:true,size:'medium',color:'#edf7ff'});
}
</script>
<style>
table.google-visualization-orgchart-table {    border-collapse: separate; }
</style>