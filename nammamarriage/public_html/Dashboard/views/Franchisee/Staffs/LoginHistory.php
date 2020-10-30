<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="margin-bottom:5px">Login History</h4>
            <div class="table-responsive" style="width: 120%;">
        <table id="myTable" class="table table-striped" style="width:100%;border-bottom:1px solid #ccc;">
            <thead>  
                <tr>
                    <th></th> 
                    <th></th> 
                    <th></th> 
                    <th>Loggedin</th>  
                    <th>Last accessed</th>  
                    <th>Loggedout</th>
                    <th>IP Address</th>                                    
                    <th>Country</th>
                </tr>  
            </thead>
            <tbody>  
            <?php   $response = $webservice->getData("Franchisee","GetLoginHistory");
             foreach($response['data']['StaffLoginHistory'] as $History) {
                    
                    if ($History['LoginFrom']=="Web") {
                        $LoginFrom   = "domain.svg";
                        $accessTitle ="Web Browser";
                    } 
                    
                    if ($History['Device']=="Desktop") {
                        $device      = "desktop.svg";
                        $deviceTitle = "Desktop";
                    }
                    
                    if ($History['Device']=="Mobile") {
                        $device      = "smartphone.svg";
                        $deviceTitle = "Smart Phone";
                    }
            ?>
                <tr>
                    <td style="width:16px">
                        <?php if ($History['LoginStatus']==1){?>
                            <img src="<?php echo ImagePath?>tick.gif" tilte="Successed Login" style="border-radius:0px !important;width: 16px;height: 16px;">
                        <?php }else{ ?>
                            <img src="<?php echo ImagePath?>Red-Cross-Mark-PNG-Pic.png" tilte="Failed Login"  style="border-radius:0px !important;width: 10px;height: 10px;">
                        <?php } ?>
                    </td>
                    <td style="width:16px"><img src="<?php echo ImagePath.$LoginFrom?>" title="<?php echo $accessTitle;?>" style="border-radius:0px !important;width: 16px;height: 16px;"></td>
                    <td style="width:16px"><img src="<?php echo ImagePath.$device?>" title="<?php echo $deviceTitle;?>" style="border-radius:0px !important;width: 16px;height: 16px;"></td>
                    <td style="width:110px"><?php echo putDateTime($History['LoginOn']);?></td>                         
                    <td style="width:110px"><?php echo (strlen(trim($History['LastAccessOn']))>0) ? putDateTime($History['LastAccessOn']) : "";?></td>
                    <td style="width:110px"><?php echo (strlen(trim($History['UserLogout']))>0) ? putDateTime($History['UserLogout']) : "";?></td>
                    <td style="width:80px"><?php echo $History['BrowserIp'];?></td>
                    <td><?php echo $History['CountryName'];?></td>
                </tr>
            <?php } ?>            
            </tbody>                        
        </table>
    </div>
        </div>
    </div>
</div>