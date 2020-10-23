<?php
      $list=array();
$month = "05";
$year = "2020";

$month = isset($_GET['m']) ? $_GET['m'] : date("m");
$year = isset($_GET['y']) ? $_GET['y'] : date("Y");

$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);

$end_time = strtotime("+1 month", $start_time);

for($i=$start_time; $i<$end_time; $i+=86400)
{
   //$list[] = date('Y-m-d-D', $i);
   $list[] = date('Y-m-d', $i);
}

//print_r($list);     

   $previous_bal = 0;  
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
                <form action="" method="get">
                <input type="hidden" value="Reports/MAB" name="action">
                 
                <select name="m">
                    <option value="1"  <?php echo $month==1 ? " selected='selected' " : "";?>>JAN</option>
                    <option value="2"  <?php echo $month==2 ? " selected='selected' " : "";?>>FEB</option>
                    <option value="3"  <?php echo $month==3 ? " selected='selected' " : "";?>>MAR</option>
                    <option value="4"  <?php echo $month==4 ? " selected='selected' " : "";?>>APR</option>
                    <option value="5"  <?php echo $month==5 ? " selected='selected' " : "";?> >MAY</option>
                    <option value="6"  <?php echo $month==6 ? " selected='selected' " : "";?> >JUN</option>
                    <option value="7"  <?php echo $month==7 ? " selected='selected' " : "";?> >JLY</option>
                    <option value="8"  <?php echo $month==8 ? " selected='selected' " : "";?>>AUG</option>
                    <option value="9"  <?php echo $month==9 ? " selected='selected' " : "";?>>SEP</option>
                    <option value="10" <?php echo $month==10 ? " selected='selected' " : "";?>>OCT</option>
                    <option value="11" <?php echo $month==11 ? " selected='selected' " : "";?>>NOV</option>
                    <option value="12" <?php echo $month==12 ? " selected='selected' " : "";?>>DEC</option>
                </select>
                <select name="y">
                    <option value="2020"  <?php echo $year==1 ? " selected='selected' " : "";?>>2020</option>
                </select>
                
                
                
<input type="submit" value="Report">
                </form>
                    <div class="table-responsive">
                    <?php
                    
                   
echo "<table border='1'>";
                        $data = $mysql->select("select * from _tbl_member where MAB_Enabled='1'");
                        
                                echo "<tr>";
                                    echo "<td>Member Name</td>";
                                    
                            foreach($list as $l) {
                                echo "<td>".$l."</td>";
                            }
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
                                   
                            foreach($list as $l) {
                                
                                $bal = $application->getBalanceDatewise($d['MemberID'],$l);
                                $nbal = ($bal != -1) ? $bal: $previous_bal ;
                                echo "<td style='text-align:right'>". number_format($nbal,2)."</td>";
                                $balances[]=$nbal;
                                if ($bal != -1) {
                                    $previous_bal = $nbal;
                                }
                                $overal_bal+= $nbal;
                            }                    
                            //$mab =   min($balances);
                            $mab =   $overal_bal/sizeof($list);
                            $interstable_amt = intval($mab-($mab*10/100));
                            $interst_amt = $interstable_amt*2/100;
                            echo "<td style='text-align:right'>". number_format($mab,2)."</td>";
                            echo "<td style='text-align:right'>". number_format($interstable_amt,2)."</td>";
                            echo "<td style='text-align:right'>". number_format($interst_amt,2)."</td>";
                            echo "</tr>";
                        }
echo "</table>";                               
                    ?>
                <form action="dashboard.php?action=Reports/MABConfrim" method="POST">
                    <input type="hidden" value="<?php echo $year;?>" name="y">
                    <input type="hidden" value="<?php echo $month;?>" name="m">
                      <input type="submit" value="Continue" name="ContinueButton">
                    </form>
                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
 
 