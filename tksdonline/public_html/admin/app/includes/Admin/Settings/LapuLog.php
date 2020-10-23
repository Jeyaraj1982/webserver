<?php
    $data = $mysql->select("select * from `_tbl_admin` where  `AdminID`='".$_SESSION['User']['AdminID']."'");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">lapulog</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Lapu log [<?php echo date("Y-m-d");?>]<br>
                    <span style="font-size:11px">current server time: <?php echo date("Y-m-d H:i:s");?></span>
                    </div>
                    
                    
                </div>
                <div class="card-body">
                     <?php
                         $f = file_get_contents("/home/tksdonlineservic/public_html/admin/lapu_ping_".date("Y_m_d").".txt");
                         echo "<pre>".$f."</pre>";
                     ?>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
function doredirect() {
       location.href=location.href; 
}
setInterval("doredirect()",20000);
</script>