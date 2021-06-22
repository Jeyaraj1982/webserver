<?php
    get_mobile_operator_plan($Operator,$Region) {
  //  
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/mobile/7166?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".$Operator."&pageCount=1&itemsPerPage=20&sort_price=asce&pagination=1&circle=".urlencode($Region);
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}
?>
<div class="modal" id="plans">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" id="mbody" style="padding:10px;">
        <?php $category = $mysql->select("select * from _tbl_plancategory where OperatorCode='".$_OPERATOR."'"); ?>
        <div class="container" style="padding:0px !important">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6>Recharge Plans</h6>
            <p style="font-size:10px;line-height:12px;"><strong>Disclaimer:</strong> While we support most recharges, we request you to verify with your operator once before proceeding.</p>
            <div id="accordion">
                <?php foreach($category as $c) { ?>
                <div class="card" style="margin-bottom:5px;">
                    <div style="margin-bottom:5px;">
                        <a class="card-header card-link" data-toggle="collapse" href="#collapse1_<?php echo $c['PlanCategory'];?>" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9">
                            <?php echo $c['CategoryName'];?>
                        </a>
                    </div>
                    <div id="collapse1_<?php echo $c['PlanCategory'];?>" class="collapse" data-parent="#accordion" style="padding:0px">
                        <div class="card-body" style="padding:5px;">
                            <?php $plans  = $mysql->select("SELECT * FROM _tbl_operator_plans  where Category='".$c['PlanCategory']."' and IsActive='1'  and OperatorCode='".$_OPERATOR."' order by Amount" ); ?>   
                            <?php if (sizeof($plans)>0) { ?>
                            <table style="width:100%;">
                                <?php foreach($plans as $p) { ?>
                                <tr>                                          
                                    <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;"><?php echo $p['Description'];?></td>
                                    <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right"><a href="javascript:void(0)" onclick="selectAmount('<?php echo $p['Amount'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;"><?php echo $p['Amount'];?></a></td>
                                </tr>
                                <?php } ?>
                            </table>   
                            <?php } else { ?>
                                <div style="text-align: center;font-size:12px;">No plans found</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div> 
        </div>
      </div>
    </div>
  </div>
</div>