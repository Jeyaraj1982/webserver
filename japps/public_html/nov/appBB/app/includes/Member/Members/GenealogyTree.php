<style>
    .j2j_box{border:1px solid #fff;width:150px;min-height:150px;text-align:center;margin:0px auto}
    .j2j_box_img {width:150px;height:150px;}
</style>
<?php 
    $leftCode = $memberTree->GetLeftLastCode($_SESSION['User']['MemberCode']);
    $rightCode = $memberTree->GetLastRight($_SESSION['User']['MemberCode']);
    $parentCode = isset($_GET['Code']) ? $_GET['Code'] : $_SESSION['User']['MemberCode'];
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/GenealogyTree">Tree View</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tree View</h4>
                </div>
                <div class="card-body" style="overflow: auto;">
                    <div class="diagram">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="6">
                                    <?php $L = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$parentCode."'"); ?>
                                    <?php echo printNodeDetails($L[0]);?> 
                                </td>
                            </tr>  
                            <tr>
                                <td></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Ldown.png"></td>
                                <td colspan="2" style="text-align: center;"><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/F_Hr.png" style="width:100%"></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Rdown.png"></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td colspan="3">
                                    <?php 
                                        $A = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='L'"); 
                                        if (sizeof($A)==0) {
                                            if ($leftCode==$parentCode) {
                                                //$str .= "[{v:'Vacant_1581', f:'".getImage($A[0]['Thumb'],$A[0]['Sex'])."<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$L[0]['MemberCode']."&p=1 target=new>Add User</a></div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
                                            } else {
                                                //$str .= "[{v:'Vacant_1581', f:'".getImage($A[0]['Thumb'],$_A[0]['Sex'])."</div><div style=width:80px; font-style:italic>&nbsp;</div></div>'},'".$L[0]['MemberCode']."', 'GCCHub'],";   
                                            } 
                                            echo printNodeDetails(array());     
                                        } else {
                                            $_A = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$A[0]['ChildCode']."'");
                                            echo printNodeDetails($_A[0],$A[0]);
                                        }
                                    ?>
                                </td>
                                <td colspan="3">
                                    <?php 
                                        $B = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parentCode."' and Position='R'");
                                        if (sizeof($B)==0) {
                                            if ($rightCode==$parentCode) {
                                                //$str .= "[{v:'Vacant_1584', f:'<br>".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$L[0]['MemberCode']."&p=2 target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
                                            } else {
                                                //$str .= "[{v:'Vacant_1584', f:'".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$L[0]['MemberCode']."', 'GCCHub'],";
                                            }
                                            echo printNodeDetails(array());     
                                        } else {
                                            $_B = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$B[0]['ChildCode']."'");
                                            echo printNodeDetails($_B[0], $B[0]);
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Ldown.png"></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Down.png"></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Rdown.png"></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Ldown.png"></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Down.png"></td>
                                <td><img class="j2j_box_img" src="https://www.astrafx.uk/app/assets/Rdown.png"></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                        if (sizeof($A)>0) {
                                            $AA = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='L'");
                                            if (sizeof($AA)==0) {
                                                if ($leftCode==$A[0]['ChildCode']) { 
                                                    //$str .= "[{v:'Vacant_1582', f:'<br>".getImage($_A[0]['Thumb'],$_A[0]['Sex'])."<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$A[0]['ChildCode']." target=new>Add User</a></div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
                                                } else {
                                                    //$str .= "[{v:'Vacant_1582', f:'".getImage($A[0]['Thumb'],$_A[0]['Sex'])."</div></div>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
                                                }
                                                echo printNodeDetails(array());     
                                            } else {
                                                $_AA = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$AA[0]['ChildCode']."'");
                                                //$str .= "[{v:'".$AA[0]['ChildCode']."', f:'<div id=id_".$AA[0]['ChildCode']."  class=".getCss($AA[0]['PackageID'])." >".getImage($_AA[0]['Thumb'],$_AA[0]['Sex'])."<br><b><span style=color:green;>".$AA[0]['ChildCode']."</span></b><br>".$AA[0]['ChildName']."<div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$AA[0]['ChildCode']." >Downline</a>]</div></div>'},'".$A[0]['ChildCode']."', 'Active'],";
                                                echo printNodeDetails($_AA[0],$AA[0]);
                                            }
                                        } else {
                                             echo printNodeDetails(array());   
                                        }
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                        if (sizeof($A)>0) {
                                            $AB = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$A[0]['ChildCode']."' and Position='R'");
                                            if (sizeof($AB)==0) {
                                                if ($rightCode==$A[0]['ChildCode']) {
                                                    // $str .= "[{v:'Vacant_1583', f:'<br><div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$A[0]['ChildCode']." target=new>Add User</a></div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";
                                                } else {
                                                    //$str .= "[{v:'Vacant_1583', f:'<br>".getImage($_AA[0]['Thumb'],$_AA[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$A[0]['ChildCode']."', 'GCCHub'],";     
                                                }
                                                echo printNodeDetails(array());     
                                            } else {
                                                $_AB = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$AB[0]['ChildCode']."'");
                                                //$str .= "[{v:'".$AB[0]['ChildCode']."', f:'<div id=id_".$AB[0]['ChildCode']."  class=".getCss($AB[0]['PackageID'])." >".getImage($_AB[0]['Thumb'],$_AB[0]['Sex'])."<br><b><span style=color:green;>".$AB[0]['ChildCode']."</span></b><br>".$AB[0]['ChildName']."<div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$AB[0]['ChildCode']." >Downline</a>]</div></div>'},'".$A[0]['ChildCode']."', 'Active'],";
                                                echo printNodeDetails($_AB[0],$AB[0]);
                                            }
                                        } else {
                                             echo printNodeDetails(array());   
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if (sizeof($B)>0) {
                                            $BA = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='L'");
                                            if (sizeof($BA)==0) {
                                                if ($leftCode==$B[0]['ChildCode']) {
                                                    // $str .= "[{v:'Vacant_1585', f:'<br>".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$B[0]['ChildCode']." target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
                                                } else {
                                                    // $str .= "[{v:'Vacant_1585', f:'<br>".getImage($B[0]['Thumb'],$B[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
                                                }
                                                echo printNodeDetails(array());     
                                            } else {
                                                $_BA = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$BA[0]['ChildCode']."'");
                                                //$str .= "[{v:'".$BA[0]['ChildCode']."', f:'<div id=id_".$BA[0]['ChildCode']."  class=".getCss($BA[0]['PackageID'])." >".getImage($_BA[0]['Thumb'],$_BA[0]['Sex'])."<br><b><span style=color:green;>".$BA[0]['ChildCode']."</span></b><br>".$BA[0]['ChildName']."<div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$BA[0]['ChildCode']." >Downline</a>]</div></div>'},'".$B[0]['ChildCode']."', 'Active'],";
                                                echo printNodeDetails($_BA[0],$BA[0]);
                                            }
                                        } else {
                                             echo printNodeDetails(array());   
                                        }
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                 
                                    <?php
                                     
                                        if (sizeof($B)>0) {
                                            $BB = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$B[0]['ChildCode']."' and Position='R'");
                                            
                                            if (sizeof($BB)==0) {
                                                if ($rightCode==$B[0]['ChildCode']) {
                                                    //$str .= "[{v:'Vacant_1586', f:'<br>".getImage($B[0]['Thumb'],$_B[0]['Sex'])."<div style=color:red;><a href=dashboard.php?action=Members/CreateMem&Code=".$B[0]['ChildCode']." target=new>Add User</a></div><div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
                                                } else {              
                                                    //$str .= "[{v:'Vacant_1586', f:'<br>".getImage($_B[0]['Thumb'],$_B[0]['Sex'])."<div style=width:80px; font-style:italic>&nbsp;</div><div style=width:80px;></div><br>'},'".$B[0]['ChildCode']."', 'GCCHub'],";
                                                }
                                                echo printNodeDetails(array());     
                                            } else {
                                                 
                                                $_BB = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$BB[0]['ChildCode']."'");
                                                //$str .= "[{v:'".$BB[0]['ChildCode']."', f:'<div id=id_".$BB[0]['ChildCode']." class=".getCss($BB[0]['PackageID'])." >".getImage($BB[0]['Thumb'],$BB[0]['Sex'])."<br><b><span style=color:green;>".$BB[0]['ChildCode']."</span></b><br>".$BB[0]['ChildName']."<div>[<a href=dashboard.php?action=Members/GenealogyTree&Code=".$BB[0]['ChildCode']." >Downline</a>]</div></div>'},'".$B[0]['ChildCode']."', 'Active'],";    
                                                echo printNodeDetails($_BB[0],$BB[0]);
                                            }
                                        } else {
                                             echo printNodeDetails(array());   
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>          
        </div>       
    </div>
</div>
<?php 
   function printNodeDetails($param,$tbl=array()) {
       global $mysql; 
       if (sizeof($param)==0) {
           echo '<div class="j2j_box"><img src="https://www.astrafx.uk/app/assets/logo.png" style="width: 60px;"><br></div>';
           return;
       }
       $totalLeftCount = 0;
       $totalLeftPV = 0;
       $todayLeftPV = 0;
       
       $totalRightCount = 0;
       $totalRightPV = 0;
       $todayRightPV = 0;
       
       $mTree = new MemberTree();
       
       $mTree->member_code = $param['MemberCode'];
       $mTree->$process_date=date("Y-m-d");
       //$mTree->primary=$_SESSION['User']['MemberCode'];
       $mTree->GetNodeIDs($param['MemberCode'],"L");
       $totalLeftCount = $mTree->leftIDs;
       $totalLeftPV = $mTree->leftPV;
       $todayLeftPV = $mTree->todayLeftPV;
       //$mTree->primary=$_SESSION['User']['MemberCode'];
       $mTree->GetNodeIDs($param['MemberCode'],"R");
       $totalRightCount = $mTree->rightIDs;                              
       $totalRightPV = $mTree->rightPV;
       $todayRightPV = $mTree->todayRightPV;
       $mTree->Carryforward();
       
       $carryforward =   $mysql->select("select * from _tbl_payoutsummary where   MemberID='".$param['MemberID']."'  Order by `PayoutID` Desc");
      
   ?>
   <div class="j2j_box">
    <?php
    //echo "DA";
   // echo $param['PlacedByCode'];
   $direct_style="";
         if ($tbl['PlacedByCode']==$_SESSION['User']['MemberCode']) {
           $direct_style="background:#c6e0ff;";
       }                                                
    ?>
        <a href='dashboard.php?action=Members/GenealogyTree&Code=<?php echo $param['MemberCode'];?>'><img src="https://www.astrafx.uk/app/assets/logo.png" style="width: 60px;"></a><br>
        <div style="font-size:12px;padding-top:10px;<?php echo $direct_style;?>">
            <a href='dashboard.php?action=Members/GenealogyTree&Code=<?php echo $param['MemberCode'];?>'><b><?php echo $param['MemberCode'];?></b></a><br>
            <?php echo $param['MemberName'];?><br>
            <span style='font-size:12px'>Today L: <?php echo $todayLeftPV;?> / R: <?php echo $todayRightPV;?></span>
            <div class="input-group-append" style="text-align: center;margin-top:10px">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin:0px auto;width:100%;font-weight:bold;font-size:12px">L: <?php echo $totalLeftPV;?> / R: <?php echo $totalRightPV;?></button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(226px, 43px, 0px); top: 0px; left: 0px; will-change: transform;border:1px solid #f1f1f1">
                    <a class="dropdown-item">DOJ: <?php echo date("M d, Y",strtotime($param['CreatedOn']));?></a>
                    <a class="dropdown-item"><?php echo $param['CurrentPackageName'];?></a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item">Left Count: <?php echo sizeof($totalLeftCount);?></a>
                    <a class="dropdown-item">Right Count: <?php echo sizeof($totalRightCount);?></a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item">Left Carryforward: <?php echo $mTree->availableLeftCarryForward;?></a>
                    <a class="dropdown-item">Right Carryforward: <?php echo $mTree->availableRightCarryForward;?></a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item">Direct Left: <?php echo $param['DirectLeft'];?></a>
                    <a class="dropdown-item">Direct Right: <?php echo $param['DirectRight'];?></a>
                </div>
            </div>
        </div>
   </div>
   <?php
   }   
?> 