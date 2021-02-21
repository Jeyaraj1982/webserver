<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5><?php echo $data[0]['OperatorTypeCode'];?></h5>
    <h6 style="color:#999">Balance: Rs. <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?></h6>
</div> 
<div class="row">
        <div class="col-12">
          <?php
              $member_benifechery = $mysql->select("select * from _tbl_moneytransfer_benifechery where MemberID='".$_SESSION['User']['MemberID']."' and IsActive='1' order by AccountHolderName" );
          ?>
            
              <div class="card">
                        <div  class="card-body" id="ListDiv" style="padding:0px !important;">
                            <ul class="list-group list-group-bordered">
                            <?php foreach($member_benifechery as $benifechery) { ?> 
                                <li class="list-group-item cursor-hand" style="display: block;padding-left:10px !important;cursor:pointer" onclick="location.href='dashboard.php?action=moneytranser_tobank&bid=<?php echo md5($benifechery['BenificheryID'].$benifechery['AccountNumber']);?>'">
                                <b><?php echo $benifechery['AccountHolderName'];?></b><i class="flaticon-right-arrow-4" style="float: right;"></i>  <Br> 
                                <?php echo $benifechery['AccountNumber'];?><Br> 
                                <?php echo $benifechery['IFSCCode'];?><br> 
                                <?php echo $benifechery['CustomerMobileNumber'];?> 
                                </li>
                            <?php } ?> 
                            </ul>
                        </div>
                  </div>         
        </div>
        </div>
 
  