<?php
    $list=array();
    
    $month = isset($_GET['m']) ? $_GET['m'] : date("m");
    $year = isset($_GET['y']) ? $_GET['y'] : date("Y");
       $_GET['c'] = isset($_GET['c']) ? $_GET['c'] : 0;
    
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
                    <input type="hidden" value="Reports/MonthlySalesReport" name="action">
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
                        <?php for($i=$_CONFIG['START_YEAR'];$i<=$_CONFIG['END_YEAR'];$i++) { ?>
                            <option value="<?php echo $i;?>"  <?php echo $year==$i ? " selected='selected' " : "";?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>
                    <?php
                         $commission = $mysql->select("select * from _temp_settings where param='msr_interet'");
                         $msrAmount = $mysql->select("select * from _temp_settings where param='msr_amt'");
                             
                    ?>
                     <select name="c">
                            <option value="0" <?php echo $_GET['c']==0 ? " selected='selected' " : "";?>>All</option>
                            <option value="1" <?php echo $_GET['c']==1 ? " selected='selected' " : "";?>>Above <?php echo $msrAmount[0]['paramvalue'];?>, (<?php echo $commission[0]['paramvalue'];?>% incentive)</option>
                    </select>
                    <input type="submit" value="Report">
                </form>
                <div class="table-responsive" style="margin-top:100px">
                <?php
                    $data = $mysql->select("select * from _tbl_member");
                      $mebers="";
                    echo "<table border='1'>";
                        echo "<tr>";
                            echo "<td>Member Name</td>";
                            echo "<td>Total Sales</td>";                                 
                        echo "</tr>";
                       
                        foreach($data as $d) {
                            $tSale = $mysql->select("select sum(rcamount) as dbt from _tbl_transactions where TxnStatus='success' and (month(txndate)='".$month."' and year(txndate)='".$year."') and memberid='".$d['MemberID']."' ");
                            if ($_GET['c']==0) {
                            echo "<tr>";
                                echo "<td>".$d['MemberName']."</td>";
                                   
                        
                          
                            echo "<td style='text-align:right'>". number_format($tSale[0]['dbt'],2)."</td>";
                            echo "</tr>";
                            }
                             if ($_GET['c']==1) {
                                 if ($tSale[0]['dbt']>=$msrAmount[0]['paramvalue']) {
                                     $mebers .= $d['MemberID'].",";
                                 echo "<tr>";
                                 echo "<td>".$d['MemberName']."</td>";
                            echo "<td style='text-align:right'>". number_format($tSale[0]['dbt'],2)."</td>";
                            echo "</tr>";
                                 }
                            }
                        }
echo "</table>";                               
                    ?>
                    <?php  if ($_GET['c']==1) { ?> 
                     <form action="dashboard.php?action=Reports/MSRConfrim" method="POST">
                    <input type="hidden" value="<?php echo $mebers;?>" name="ids">
                    <input type="hidden" value="<?php echo $year;?>" name="y">
                    <input type="hidden" value="<?php echo $month;?>" name="m">
                      <input type="submit" value="Confrim & Continue" name="ContinueButton">
                    </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  