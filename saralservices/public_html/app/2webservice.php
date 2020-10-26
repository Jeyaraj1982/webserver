<?php 
function get_mobile_operator($mobile_number) {
    
    $url = "https://digitalapiproxy.paytm.com/v1/mobile/getopcirclebyrange?channel=web&version=2&number=".$mobile_number."&child_site_id=1&site_id=1&locale=en-in";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
    ]);
    $resp =json_decode(curl_exec($curl),true); 
    curl_close($curl);
    //{"Operator":"Airtel","Circle":"Tamil Nadu","product_id":221,"status":true,"postpaid":false,"source":"prefix"} 
    $res[]=$resp;
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/mobile/7166?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".$resp['Operator']."&pageCount=1&itemsPerPage=20&sort_price=asce&pagination=1&circle=".urlencode($resp['Circle']);
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
    ]);
    $resp2 =json_decode(curl_exec($curl),true); 
    curl_close($curl);
    $res[]=$resp2;  
    return $res;
}

function get_mobile_operator_plan($Operator) {
  //  
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/mobile/7166?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".$Operator."&pageCount=1&itemsPerPage=20&sort_price=asce&pagination=1&circle=".urlencode("Tamil Nadu");
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}



//print_r($products);
echo $_GET['action']();

function getMobileRechargePlan() {
    $data = get_mobile_operator($_GET['number']);

$products = $data[1]['groupings'];
    switch($data[0]['Operator']) {
        case   'Airtel':
                    $optr="RA";
                    break;
        case   'BSNL':
                    $optr="RB";
                    break;
         case   'Vodafone':
                    $optr="RV";
                    break;
         case   'Jio':
                    $optr="RJ";                
                    break;
          case   'Idea':
                    $optr="RI";
                    break;
    }
    
    ?>
   <div>
   <script>
        Region= "<?php echo $data[0]['Circle'];?>";
        $("#optr").val("<?php echo $optr;?>").change();
   </script>
    <div style="margin-bottom:10px;">
        <table>                   
            <tr>
                <td><img src='assets/operator/<?php echo $data[0]['Operator'];?>.png' style="width:64px"></td>
                <td style="padding-left:10px;line-height:15px;;">
                    <span style="font-size:25px"><?php echo $data[0]['Operator'];?></span><br>
                    <span style="font-size:12px;color:#888"><?php echo $data[0]['Circle'];?><br></span>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="accordion">
                    <?php $i=1; foreach($products as $p) { ?>
                        <div class="card" style="margin-bottom:5px;">
                            <div style="margin-bottom:5px;">
                                <a class="card-header card-link collapsed" data-toggle="collapse" href="#collapse1_<?php echo $i;?>" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                                    <?php echo $p['name']; ?>
                                </a>                    
                            </div>
                            <div id="collapse1_<?php echo $i;?>" class="collapse" data-parent="#accordion" style="padding: 0px;">
                                <div class="card-body" style="padding:5px;">
                                    <table style="width:100%;">
                                        <tbody>
                                            <?php foreach($p['productList'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo $pl['description'];?>
                                                </td>
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
                                                        <?php echo $pl['price'];?>
                                                    </a>
                                                </td>
                                            </tr>      
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
</div>
 
    </div> 
    
    <?php
}


function GetMobileOperatorPlan() {
    


    switch($_GET['optr']) {
        case   'RA':
                    $optr="Airtel";
                    break;
        case   'RB':
                    $optr="BSNL";
                    break;
         case   'RV':
                    $optr="Vodafone";
                    break;
         case   'RJ':
                    $optr="Jio";                
                    break;
          case   'RI':
                    $optr="Idea";
                    break;
    }
    
    $data = get_mobile_operator_plan($optr);
    $products = $data['groupings'];
    ?>
   <div>
   <!--
      <div>
        <?php echo print_r($products); ?>
      </div>
   -->
   <script>
        //$("#optr").val("<?php echo $optr;?>").change();
   </script>
    <div style="margin-bottom:10px;">
        <table>
            <tr>
                <td><img src='assets/operator/<?php echo $optr;?>.png' style="width:64px"></td>
                <td style="padding-left:10px;line-height:15px;;">
                    <span style="font-size:25px"><?php echo $optr;?></span><br>
                    <span style="font-size:12px;color:#888"><?php echo $data[0]['Circle'];?><br></span>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="accordion">
                    <?php $i=1; foreach($products as $p) { ?>
                        <div class="card" style="margin-bottom:5px;">
                            <div style="margin-bottom:5px;">
                                <a class="card-header card-link collapsed" data-toggle="collapse" href="#collapse1_<?php echo $i;?>" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                                    <?php echo $p['name']; ?>
                                </a>                    
                            </div>
                            <div id="collapse1_<?php echo $i;?>" class="collapse" data-parent="#accordion" style="padding: 0px;">
                                <div class="card-body" style="padding:5px;">
                                    <table style="width:100%;">
                                        <tbody>
                                            <?php foreach($p['productList'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo $pl['description'];?>
                                                </td>
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
                                                        <?php echo $pl['price'];?>
                                                    </a>
                                                </td>
                                            </tr>      
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
</div>
    </div> 
    <?php
}
?> 