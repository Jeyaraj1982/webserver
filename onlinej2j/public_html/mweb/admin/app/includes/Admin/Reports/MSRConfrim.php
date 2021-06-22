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
                    <h4 class="card-title">MAB Interest Settlement</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php
                       
                       if (isset($_POST['ContinueButton'])) {
                           
                            $myFile = "MSR".date("Y_m_d")."_.txt";
                            $fh = fopen($myFile, 'a') or die ("can't open file..");
                            $ids = explode(",",$_POST['ids']);
                            foreach($ids as $id)  {
                             if ($id>0) {
                                $tSale = $mysql->select("select sum(rcamount) as dbt from _tbl_transactions where TxnStatus='success' and (month(txndate)='".$_POST['m']."' and year(txndate)='".$_POST['y']."') and memberid='".$id."' ");
                                
                                $commission = $mysql->select("select * from _temp_settings where param='msr_interet'");
                                $interstable_amt =    $tSale[0]['dbt'] * $commission[0]['paramvalue']/100;
                                $particulars = 'Incentive Credited '.$month_names[$month].' of '.$year.' Additional Sales Commission: '.number_format($tSale[0]['dbt'],2).',  Interest: '.number_format($interstable_amt,2);
                                $balance =  $application->getBalance($id)+$interstable_amt;
                                $postSql = "insert into `_tbl_accounts` values (Null,'".$id."','".date("Y-m-d H:i:s")."','".$particulars."','".$interstable_amt."','".$interstable_amt."','0','".$balance."','989','0');"; 
                                echo "<br>Commission Updated. Rs.". $interstable_amt;
                               
                                $mysql->execute($postSql);
                                fwrite($fh, str_replace(";","\n",$postSql));
                             }
                            
                            }
                            fclose($fh);
                            //$mysql->execute(base64_decode($_POST['postSQL']));
                            echo "Processed successfully";
                       }
                        ?>
                       
                    </div>  
                </div>
            </div>                                                    
        </div>
    </div>
</div>