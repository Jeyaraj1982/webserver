<?php $action = explode("/",$_GET['cp']); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="DirectReferrals" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Team/DirectReferrals&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Direct Referrals</a>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="Downlines" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Team/Downlines&MCode=<?php echo $_GET['MCode'];?>">Downlines</a>
                </li> 
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="GenealogyTree" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Members/GenealogyTree&MCode=<?php echo $_GET['MCode'];?>">TreeView</a>
                </li>
            </ul> 
        </div>
    </div>
</div>
<?php 
    $parentCode = isset($_GET['Code']) ? $_GET['Code'] : $_SESSION['User']['MemberCode'];
    
    $L = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$parentCode."'");
    $str = "[[{v:'".$L[0]['MemberCode']."',f:'".getImage($L[0]['Thumb'],$L[0]['Sex'])."<br><b><span style=color:green;>".$L[0]['MemberCode']."</span></b><div style=color:green; font-style:italic; >".$L[0]['MemberName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($L[0]['CreatedOn']))."</div><br>'},'', 'Active'],";
    
    $A = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='L'");
    if (sizeof($A)==0) {
        $str .= "[{v:'Vacant_1581', f:'<div style=color:red;><a  target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
    } else {
        $_A = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$A[0]['ChildCode']."'");
        $str .= "[{v:'".$A[0]['ChildCode']."', f:'".getImage($_A[0]['Thumb'],$_A[0]['Sex'])."<br><b><span style=color:green;>".$A[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$A[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($A[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$A[0]['ChildCode']." >Downline</a>]</div>'},'".$L[0]['MemberCode']."', 'Active'],";
        
        $AA = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='L'");
        if (sizeof($AA)==0) {
            $str .= "[{v:'Vacant_1582', f:'<div style=color:red;><a target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
        } else {
            $_AA = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$AA[0]['ChildCode']."'");
            $str .= "[{v:'".$AA[0]['ChildCode']."', f:'".getImage($_AA[0]['Thumb'],$_AA[0]['Sex'])."<br><b><span style=color:green;>".$AA[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$AA[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($AA[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$AA[0]['ChildCode']." >Downline</a>]</div>'},'".$A[0]['ChildCode']."', 'Active'],";
        }
        
        $AB = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='R'");
        if (sizeof($AB)==0) {
            $str .= "[{v:'Vacant_1583', f:'<div style=color:red;><a target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
        } else {
            $_AB = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$AB[0]['ChildCode']."'");
            $str .= "[{v:'".$AB[0]['ChildCode']."', f:'".getImage($_AB[0]['Thumb'],$_AB[0]['Sex'])."<br><b><span style=color:green;>".$AB[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$AB[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($AB[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$AB[0]['ChildCode']." >Downline</a>]</div>'},'".$A[0]['ChildCode']."', 'Active'],";
        }
    }

    $B = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='R'");
    if (sizeof($B)==0) {
        $str .= "[{v:'Vacant_1584', f:'<div style=color:red;><a target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
    } else {
        $_B = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$B[0]['ChildCode']."'");
        $str .= "[{v:'".$B[0]['ChildCode']."', f:'".getImage($_B[0]['Thumb'],$_B[0]['Sex'])."<br><b><span style=color:green;>".$B[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$B[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($B[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$B[0]['ChildCode']." >Downline</a>]</div>'},'".$L[0]['MemberCode']."', 'Active'],";
        
        $BA = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='L'");
        if (sizeof($BA)==0) {
            $str .= "[{v:'Vacant_1585', f:'<div style=color:red;><a target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
        } else {
            $_BA = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$BA[0]['ChildCode']."'");
            $str .= "[{v:'".$BA[0]['ChildCode']."', f:'".getImage($_BA[0]['Thumb'],$_BA[0]['Sex'])."<br><b><span style=color:green;>".$BA[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$BA[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($BA[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$BA[0]['ChildCode']." >Downline</a>]</div>'},'".$B[0]['ChildCode']."', 'Active'],";
        }
                    
        $BB = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='R'");
        if (sizeof($BB)==0) {
            $str .= "[{v:'Vacant_1586', f:'<div style=color:red;><a  target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
        } else {
            $_BB = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$BB[0]['ChildCode']."'");
            $str .= "[{v:'".$BB[0]['ChildCode']."', f:'".getImage($_BB[0]['Thumb'],$_BB[0]['Sex'])."<br><b><span style=color:green;>".$BB[0]['ChildCode']."</span></b><div style=color:green; font-style:italic; >".$BB[0]['ChildName']."</div><div style=color:#B8B1AF;font-style:italic; >".date("Y-m-d",strtotime($BB[0]['PlacedOn']))."</div><br><div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$BB[0]['ChildCode']." >Downline</a>]</div>'},'".$B[0]['ChildCode']."', 'Active'],";
        }
    }
    $str .= "]";     
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/GenealogyTree">Genealogy Tree</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Genealogy Tree</h4>
                </div>
                <div class="card-body">
                    <div id="statisticsChart"></div>
                    <div id="chart_div" style="border:0px; width:100%; height: 600px;  overflow-x: auto; overflow-y: auto;  ">                </div>
            </div>          
        </div>       
    </div>
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