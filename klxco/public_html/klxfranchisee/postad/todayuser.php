<?php   {?> 
  <style>
 .mytd {border:1px solid #f1f1f1;padding:3px;color:#444}
 .mytd form{height:0px;}
 .mytdhead{font-weight:bold;text-align:center;color:#222;background:#ccc;padding:5px;font-size:12px;}
 .trodd{background:#fff;}
 .treven{background:#f6f6f6}
 .trodd:hover{background:#e9e9e9;cursor:pointer}
 .treven:hover{background:#e9e9e9;cursor:pointer}
</style>
<?php
    $data = $mysql->select("select * from _jusertable where districtid='".$_SESSION['FRANCHISEE']['DistrictID']."' and date(createdon)=date('".date("Y-m-d")."') order by userid desc"); 
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of User
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellspacing='0' cellspadding='3' style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';">
                                    <tr>
                                        <td class="mytdhead" style="width:110px;">Created On</td>
                                        <td class="mytdhead">Person Name</td>
                                        <td class="mytdhead">Email ID</td>
                                        <td class="mytdhead">Mobile Number</td>
                                    </tr>
                                    <?php foreach($data as $r){ ?> 
                                    <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
                                        <td class="mytd"><?php echo $r["createdon"];?></td>
                                        <td class="mytd"><?php echo $r["personname"];?></td>
                                        <td class="mytd"><?php echo $r["email"];?></td>
                                        <td class="mytd"><?php if($r['countryid']==1){ echo "+91-"; } ?><?php echo $r["mobile"];?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>