<?php
if (isset($_POST['Reverse'])) {
    $param['status']="FAILURE";
    $param['yourref']=$_POST['txnid']; 
    $param['reason']="admin did reverse";
    print_r($param);
      echo   $application->reverseRecharge($param)    ;
    ?>
    <script>
              $(document).ready(function() {
            
                    swal("Transaction Reversed!", {
                        icon : "success" 
                    });
                 });
            </script>
    <?php
}

$optr_sql="";
if (isset($_GET['o'])) {
    if ($_GET['o']!="all") {
        $optr_sql=" and txn.operatorcode='".$_GET['o']."' ";
    }
}


$status_sql="";
if (isset($_GET['s'])) {
    if ($_GET['s']!="all") {
        $status_sql=" and txn.TxnStatus='".$_GET['s']."' ";
        
    }
}

$optr_sql .=  $status_sql;
                                                        
if ($_GET['mem']!="all") {
    $optr_sql .= " and txn.memberid='".$_GET['mem']."' ";
}

$operators = $mysql->select("select * from _tbl_operators ");
                
$d = isset($_GET['d']) ? $_GET['d'] : date("d");
$m = isset($_GET['m']) ? $_GET['m'] : date("m");
$y = isset($_GET['y']) ? $_GET['y'] : date("Y");
$reportDate = $y."-".$m."-".$d;
$requests=$mysql->select("select * from _tbl_transactions as txn left join _tbl_member as mem on
txn.memberid=mem.MemberID where date(txn.txndate)=date('".$reportDate."') ".$optr_sql."order by txn.txnid desc");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Transactions</a></li>
        </ul>
    </div>
    <!--<div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=all"><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=unused" ><small>Unused</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=used"><small>Used</small></a>
        </div>
    </div>-->
    <style>
    .list_td {font-size:11px;padding:0px 5px !important;}
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transactions</h4>
                    Report Date : <?php echo $reportDate; ?>
                </div>
                <div class="card-body">
                <form action="" method="get">
                <input type="hidden" value="Transactions/Report" name="action">
                <select name="d">
                    <option value="1"  <?php echo $d==1 ? " selected='selected' " : "";?> >1</option>
                    <option value="2"  <?php echo $d==2 ? " selected='selected' " : "";?>>2</option>
                    <option value="3"  <?php echo $d==3 ? " selected='selected' " : "";?>>3</option>
                    <option value="4"  <?php echo $d==4 ? " selected='selected' " : "";?>>4</option>
                    <option value="5"  <?php echo $d==5 ? " selected='selected' " : "";?>>5</option>
                    <option value="6"  <?php echo $d==6 ? " selected='selected' " : "";?>>6</option>
                    <option value="7"  <?php echo $d==7 ? " selected='selected' " : "";?>>7</option>
                    <option value="8"  <?php echo $d==8 ? " selected='selected' " : "";?>>8</option>
                    <option value="9"  <?php echo $d==9 ? " selected='selected' " : "";?>>9</option>
                    <option value="10" <?php echo $d==10 ? " selected='selected' " : "";?>>10</option>
                    <option value="11" <?php echo $d==11 ? " selected='selected' " : "";?>>11</option>
                    <option value="12" <?php echo $d==12 ? " selected='selected' " : "";?>>12</option>
                    <option value="13" <?php echo $d==13 ? " selected='selected' " : "";?>>13</option>
                    <option value="14" <?php echo $d==14 ? " selected='selected' " : "";?>>14</option>
                    <option value="15" <?php echo $d==15 ? " selected='selected' " : "";?>>15</option>
                    <option value="16" <?php echo $d==16 ? " selected='selected' " : "";?>>16</option>
                    <option value="17" <?php echo $d==17 ? " selected='selected' " : "";?>>17</option>
                    <option value="18" <?php echo $d==18 ? " selected='selected' " : "";?>>18</option>
                    <option value="19" <?php echo $d==19 ? " selected='selected' " : "";?>>19</option>
                    <option value="20" <?php echo $d==20 ? " selected='selected' " : "";?>>20</option>
                    <option value="21" <?php echo $d==21 ? " selected='selected' " : "";?>>21</option>
                    <option value="22" <?php echo $d==22 ? " selected='selected' " : "";?>>22</option>
                    <option value="23" <?php echo $d==23 ? " selected='selected' " : "";?>>23</option>
                    <option value="24" <?php echo $d==24 ? " selected='selected' " : "";?>>24</option>
                    <option value="25" <?php echo $d==25 ? " selected='selected' " : "";?>>25</option>
                    <option value="26" <?php echo $d==26 ? " selected='selected' " : "";?>>26</option>
                    <option value="27" <?php echo $d==27 ? " selected='selected' " : "";?>>27</option>
                    <option value="28" <?php echo $d==28 ? " selected='selected' " : "";?>>28</option>
                    <option value="29" <?php echo $d==29 ? " selected='selected' " : "";?>>29</option>
                    <option value="30" <?php echo $d==30 ? " selected='selected' " : "";?>>30</option>
                    <option value="31" <?php echo $d==31 ? " selected='selected' " : "";?>>31</option>
                </select>
                <select name="m">
                    <option value="1"  <?php echo $m==1 ? " selected='selected' " : "";?>>JAN</option>
                    <option value="2"  <?php echo $m==2 ? " selected='selected' " : "";?>>FEB</option>
                    <option value="3"  <?php echo $m==3 ? " selected='selected' " : "";?>>MAR</option>
                    <option value="4"  <?php echo $m==4 ? " selected='selected' " : "";?>>APR</option>
                    <option value="5"  <?php echo $m==5 ? " selected='selected' " : "";?> >MAY</option>
                    <option value="6"  <?php echo $m==6 ? " selected='selected' " : "";?> >JUN</option>
                    <option value="7"  <?php echo $m==7 ? " selected='selected' " : "";?> >JLY</option>
                    <option value="8"  <?php echo $m==8 ? " selected='selected' " : "";?>>AUG</option>
                    <option value="9"  <?php echo $m==9 ? " selected='selected' " : "";?>>SEP</option>
                    <option value="10" <?php echo $m==10 ? " selected='selected' " : "";?>>OCT</option>
                    <option value="11" <?php echo $m==11 ? " selected='selected' " : "";?>>NOV</option>
                    <option value="12" <?php echo $m==12 ? " selected='selected' " : "";?>>DEC</option>
                </select>
                <select name="y">
                    <option value="2020"  <?php echo $y==1 ? " selected='selected' " : "";?>>2020</option>
                </select>
                
                <select name="o">
                    <option value="all" <?php echo "all"==$_GET['o'] ? " selected='selected' " :"";?>>All</option>
                    <?php foreach($operators as $optr) {?>
                    <option value="<?php echo $optr['OperatorCode'];?>" <?php echo $optr['OperatorCode']==$_GET['o'] ? " selected='selected' " :"";?>><?php echo $optr['OperatorName']." (".$optr['OperatorCode'].")";?></option>
                    <?php } ?>
                </select>
                <select name="s">
                    <option value="all">ALL</option>
                    <option value="success">SUCCESS</option>
                    <option value="reversed">REVERSED</option>
                    <option value="pending">PENDING</option>
                    <option value="accepted">ACCEPTED</option>
                </select>
                
                 <select name="mem">
                    <option value="all">ALL</option>
                    <?php $mem = $mysql->select("select * from _tbl_member order by MemberName"); ?>
                    <?php foreach($mem as $m) {?>
                        <option value="<?php echo $m['MemberID'];?>"><?php echo $m['MemberName'];?></option>
                    <?php } ?>
                </select>
                
<input type="submit" value="Report">
                </form>
                
                                    <div class="table-responsive">
                         <table onmousemove="updateid()" onmouseout="clearid()" onmousedown="updateid()" onmouseover="updateid()" onmouseup="updateid()" id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr>
                                    <th class="border-top-0">txn_id</th>
                                    <th class="border-top-0"><b>txn_date</b></th>
                                    <th class="border-top-0"><b>member name</b></th>
                                    <th class="border-top-0"><b>operator</b></th>
                                    <th class="border-top-0"><b>number</b></th>
                                    <th class="border-top-0"><b>amount</b></th>
                                    <th class="border-top-0"><b>status</b></th>
                                    <th class="border-top-0"><b>operator_id</b></th>
                                    <th class="border-top-0"><b>agent_name</b></th>
                                    <th class="border-top-0"><b>agent_no</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($requests)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($requests as $request){ ?>
                                <?php
                                    $color="#222";
                                    switch($request['TxnStatus']) {
                                        case 'success' : $color = "Green"; break;
                                        case 'reversed' : $color = "orange"; break;
                                        case 'failure' : $color = "red"; break;
                                        case 'accepted' : $color = "blue"; break;
                                        default: $color = "#222"; break;
                                    }
                                ?>                    
                                <tr>
                                    <td class="list_td"><?php echo $request['txnid'];?></td>
                                    
                                    <td class="list_td"><?php echo $request['txndate'];?></td>
                                    <td class="list_td"><?php echo $request['MemberName'];?></td>
                                    <td class="list_td"><?php echo $request['operatorcode'];?></td>
                                    <td class="list_td"><?php echo $request['rcnumber'];?></td>
                                    <td class="list_td"><?php echo $request['rcamount'];?></td>
                                    <td style="color:<?php echo $color;?>;text-transform:uppercase;">
                                        <?php echo $request['TxnStatus'];?>
                                        <?php
                                            if ($request['TxnStatus']=="accepted") {
                                                ?>
                                                <form action="" method="post" onsubmit="return getConfirm()" >
                                                <input type="hidden" value="<?php echo $request['txnid'];?>" name="txnid">
                                                <input type="submit" name="Reverse" class="btn btn-danger btn-xs" value="Reverse">
                                                </form>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td class="list_td"><?php echo $request['OperatorNumber'];?></td>
                                    <td class="list_td"><?php echo $request['MemberName'];?></td>
                                    <td class="list_td"><?php echo $request['MobileNumber'];?></td>
                                </tr>
                                <tr>
                                    <td colspan="9">
                                     <div style="width:800px;height:100px;overflow:auto;border:1px solid #ccc;background:#fff9e5;padding:5px;">
                                       Lapu response: &nbsp;<span style="color:#888;font-size:11px"><?php echo $request['urlresponse'];?></span>
                                       <?php if (strlen($request['reverseResponse'])>150) {?>
                                       <br>
                                       Lapu callback response:
                                       <br>
                                       <span style="color:#888;font-size:11px"><?php echo str_replace("br","hr style='padding:2px;margin:0px' ",$request['reverseResponse']);?></span>
                                       <?php } elseif (strlen($request['reverseResponse'])>1) {?>
                                       <br>
                                       Lapu callback response:
                                       <span style="color:#888;font-size:11px"><?php echo $request['reverseResponse'];?></span>
                                       <?php } ?>
                                      </div> 
                                       
                                    </td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<script>
var id=0;
function updateid() {
    id=1;
}
function clearid() {
    id=0;
}

function doredirect() {
    if (id==0) {
       location.href=location.href; 
    }
}
function getConfirm() {
     var txt;
var r = confirm("Do you want to reverse this transaction?");
if (r == true) {
  return true;
} else {
  return true;
} 
}

  //($(".wrapper").removeClass("sidebar_minimize"), $(".wrapper").removeClass("toggled"), $(".wrapper").html('<i class="icon-menu"></i>'), v = 0) ;
  //($(".wrapper").addClass("sidebar_minimize"), w.addClass("toggled"), w.html('<i class="icon-options-vertical"></i>'), v = 1), $(window).resize()

</script>
 