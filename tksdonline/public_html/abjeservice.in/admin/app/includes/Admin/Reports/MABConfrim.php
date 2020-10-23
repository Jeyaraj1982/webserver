<?php
$month_names = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC");

    $list=array();
    $month =  $_POST['m'];
    $year = $_POST['y'];
    $start_date = "01-".$month."-".$year;
    $start_time = strtotime($start_date);

    $end_time = strtotime("+1 month", $start_time);
    for($i=$start_time; $i<$end_time; $i+=86400) {
        $list[] = date('Y-m-d', $i);
    }
   $previous_bal = 0;  
?>
<style>.list_td {font-size:11px;padding:0px 5px !important;}</style>
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
   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transactions Report</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php
                        $postSql = "";
                        $data = $mysql->select("select * from _tbl_member where MAB_Enabled='1'");
                        echo "<table border='1'>";
                            echo "<tr>";
                                    echo "<td>Member Name</td>";
                                    echo "<td>Mobile Number</td>";
                                    echo "<td>MAB</td>";
                                    echo "<td>Interestable amount</td>";
                                    echo "<td>Interest</td>";
                            echo "</tr>";
                            foreach($data as $d) {
                                $previous_bal = 0;
                                $overal_bal = 0;
                                $balances=array();
                                echo "<tr>";
                                    echo "<td>".$d['MemberName']."</td>";
                                    echo "<td>".$d['MobileNumber']."</td>";
                                    foreach($list as $l) {
                                        $bal = $application->getBalanceDatewise($d['MemberID'],$l);
                                        $nbal = ($bal != -1) ? $bal: $previous_bal ;
                                        $balances[]=$nbal;
                                        if ($bal != -1) {
                                            $previous_bal = $nbal;
                                        }
                                        $overal_bal+= $nbal;
                                    }                    
                                    $mab =   $overal_bal/sizeof($list);
                                    $interstable_amt = intval($mab-($mab*10/100));
                                    $interst_amt = $interstable_amt*2/100;
                                    echo "<td style='text-align:right'>". number_format($mab,2)."</td>";
                                    echo "<td style='text-align:right'>". number_format($interstable_amt,2)."</td>";
                                    echo "<td style='text-align:right'>". number_format($interst_amt,2)."</td>";
                            echo "</tr>";
                            
                            if ($interst_amt>0) {
                                $particulars = 'Interst Credited '.$month_names[$month].' of '.$year.' MAB: '.number_format($mab,2).', Interestable Amount: '.number_format($interstable_amt,2).', Interest: '.number_format($interst_amt,2);
                                $balance =  $application->getBalance($d['MemberID'])+$interst_amt;
                               $postSql .= "insert into `_tbl_accounts` values (Null,'".$d['MemberID']."','".date("Y-m-d H:i:s")."','".$particulars."','".$interst_amt."','".$interst_amt."','0','".$balance."','985','0');"; 
                            }
                            }                    
                        echo "</table>";
                       // echo $postSql;
                        ?>
                        <form action="dashboard.php?action=Reports/MABProcessed" method="post">
                            <textarea cols="0" rows="0" style="width: 0px;height:0px;" name="postSQL"><?php echo base64_encode($postSql);?></textarea>
                            <input type="submit" value="Confirm and Send Interest to users" name="sendSQL" class="btn btn-primary btm-sm">
                        </form>
                    </div>  
                </div>
            </div>                                                    
        </div>
    </div>
</div>