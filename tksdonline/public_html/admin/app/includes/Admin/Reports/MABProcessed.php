 
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
                       
                       if (isset($_POST['sendSQL'])) {
                            $myFile = "MAB".date("Y_m_d")."_.txt";
                            $fh = fopen($myFile, 'a') or die ("can't open file..");
                            fwrite($fh, str_replace(";","\n",base64_decode($_POST['postSQL'])));
                            fclose($fh);
                            $mysql->execute(base64_decode($_POST['postSQL']));
                            echo "Processed successfully";
                       }
                        ?>
                       
                    </div>  
                </div>
            </div>                                                    
        </div>
    </div>
</div>