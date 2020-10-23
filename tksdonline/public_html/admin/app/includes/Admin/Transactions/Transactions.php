<?php
if (isset($_POST['Reverse'])) {
    $param['status']="FAILURE";
    $param['yourref']=$_POST['txnid'];
    $param['reason']="admin did reverse";
        $application->reverseRecharge($param)    ;
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
$requests=$mysql->select("select * from _tbl_transactions as txn left join _tbl_member as mem on
txn.memberid=mem.MemberID where date(txn.txndate)=date('".date("Y-m-d")."') order by txn.txnid desc");
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
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table onmousemove="updateid()" onmouseout="clearid()" onmousedown="updateid()" onmouseover="updateid()" onmouseup="updateid()" id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr>
                                    <th class="border-top-0">txn_id</th>
                                    <th class="border-top-0"><b>txn_date</b></th>
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
                                    <td class="list_td"><?php echo $request['operatorcode'];?></td>
                                    <td class="list_td"><?php echo $request['rcnumber'];?></td>
                                    <td class="list_td"><?php echo $request['rcamount'];?></td>
                                    <td style="color:<?php echo $color;?>;text-transform:uppercase;">
                                        <?php echo $request['TxnStatus'];?>
                                        <?php
                                            if ($request['TxnStatus']=="accepted") {
                                                ?>
                                                <form action="" method="post" onsubmit="return getConfirm()" >
                                                <input type="hidden" value="web_x<?php echo $request['txnid'];?>" name="txnid">
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
setInterval("doredirect()",20000);
  //($(".wrapper").removeClass("sidebar_minimize"), $(".wrapper").removeClass("toggled"), $(".wrapper").html('<i class="icon-menu"></i>'), v = 0) ;
  //($(".wrapper").addClass("sidebar_minimize"), w.addClass("toggled"), w.html('<i class="icon-options-vertical"></i>'), v = 1), $(window).resize()

</script>
 