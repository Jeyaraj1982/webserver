<?php
 
function get_dth_plan($operator) {
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/dth/7167?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".urlencode($operator)."&pageCount=1&itemsPerPage=50&sort_price=asce&pagination=1";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}

function get_mobile_operator_plan($Operator,$Region) {
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/mobile/7166?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".urlencode($Operator)."&pageCount=1&itemsPerPage=20&sort_price=asce&pagination=1&circle=".urlencode($Region);
        
    $curl = curl_init();
    curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
    ]);
    $resp = json_decode(curl_exec($curl),true); 
    curl_close($curl);
    return $resp;
}
     $roffer = 0;
      $e=1;
      $isDth = false;
    switch($_OPERATOR) {
        case   'RA':
                    $optr="Airtel";
                    $roffer=2;
                    break;
                    
        case   'RB':
                    $optr="BSNL";
                    break;
         case   'RV':
                    $optr="Vodafone Idea";
                     $roffer=23;
                    break;
         case   'RJ':
                    $optr="Jio";                
                    break;
          case   'RI':
                    $optr="Idea";
                    $roffer=6;
                    break;
                    
           case   'DS':
                    $optr="Sun Direct";
                    $img = "SunDirect.png";
                    $isDth = true;
                    break; 
        case   'DA':
                    $optr="Airtel Digital TV";
                    $img = "airteldth.png";
                    $isDth = true;
                    break; 
        case   'TA':
                    $optr="Airtel Digital TV";
                    $img = "airteldth.png";
                    $isDth = true;
                    break;
         case   'DV':
                    $optr="Videocon d2h";
                    $img = "videocond2h.jpg";
                    $isDth = true;
                    break; 
         case   'DB':
                    $optr="Reliance Big TV";
                    $img = "bigtv.png";
                    $isDth = true;
                    break;
         
         case   'DT':
                    $optr="Tatasky";
                    $img = "tatasky.png";
                    $isDth = true;
                    break;
                    
         case   'DD':
                    $optr="Dish Tv";
                    $img = "Dishtv.png";
                    $isDth = true;
                    break;
                    
          default :
            
                    $e=0;
                    
                    break;
                
    }
    if ($e==1) {
?>
<div class="modal" id="plans">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" id="mbody" style="padding:10px;">
        <div class="container" style="padding:0px !important">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6>Recharge Plans</h6>
            <p style="font-size:10px;line-height:12px;"><strong>Disclaimer:</strong> While we support most recharges, we request you to verify with your operator once before proceeding.</p>
             
           <?php  
 
              

         if ($isDth == true) {
          $data = get_dth_plan($optr);    
         }   else {
             
             
    $data = get_mobile_operator_plan($optr,'Tamil Nadu');         
    
         }
    
    $products = $data['groupings'];
    
  
 

    ?>
   <div>
 
                
    
    <div id="accordion">
    
                                                                     
                    <?php $i=1;
                     foreach($products as $p) { ?>
                        <div class="card" style="margin-bottom:5px;">
                            <div style="margin-bottom:5px;">
                                <a class="card-header card-link collapsed" id="xcollapse1_<?php echo $i;?>" data-toggle="collapse" href="#collapse1_<?php echo $i;?>" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                                    <?php echo str_replace("Jio","",$p['name']); ?>
                                </a>                    
                            </div>
                            <div id="collapse1_<?php echo $i;?>" class="collapse" data-parent="#accordion" style="padding: 0px;">
                                <div class="card-body" style="padding:5px;">
                                    <table style="width:100%;">
                                        <tbody>
                                            <?php foreach($p['productList'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo str_replace("_","",$pl['description']);?><br>
                                                    <span style="color:red"><?php echo $pl['validity'];?></span>
                                                </td> 
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>','collapse1_<?php echo $i;?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
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
                    <?php $i++; } 
                    ?>
</div>
    </div> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

