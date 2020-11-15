<?php
include_once("header.php");
include_once("LeftMenu.php");  
$display=true;
if (isset($_POST['adComm'])) {
       $q = $mysql->select("select * from _tbl_share_products_link where Link='".$_POST['Link']."'");
       if (sizeof($q)>0) {
           
           $display=false;
          $data = $mysql->select("select * from _tbl_products where ProductID='".$q[0]['ProductID']."'"); 
          $customer = $mysql->select("select * from _jusertable where userid='".$q[0]['UserID']."'");
         ?>
         <div class="main-panel">
            <div class="container">
                <div class="page-inner">  
            <div class="row">                                                     
                <div class="col-md-6">
                    <?php foreach($data as $P) { ?>
                    <div class="card"> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12" style="padding-left:0px;padding-right:0px;text-align: center;">
                                    <img src="https://www.klx.co.in/assets/products/<?php echo $P["ProductImage"];?>" style="width:80%;margin:0px auto;">
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><?php echo $P['ProductName'];?></h3></div>
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><span style="color:blue">Rs <?php echo $P['SellingPrice'];?></span>&nbsp;&nbsp;<span style="color:#6e6e6e;"><strike>Rs <?php echo $P['ProductPrice'];?></strike></span></h3></div>
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold">Referal Income <span style="color:blue">Rs <?php echo $P['ReferalIncome'];?></span></h3></div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            
               <div class="col-md-6">
                      <div class="card"> 
                        <div class="card-body">
                          <br><br>
                                    Contact Details<br><br>
                                    <div style="border:1px dashed #ccc;padding:10px;text-align:center;color:#222;background:#f2efd7">
                                    
                                    <?php echo $customer[0]['useid'];?>,<br>
                                    <?php echo $customer[0]['personname'];?>,<br>
                                    <?php echo $customer[0]['mobile'];?>,<br>
                                    <?php echo $customer[0]['email'];?>,<br>
                        </div>
                      </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <?php
                    if (isset($_POST['LinkID'])) {
                        
                        $bal = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_share_products_earning where UserID='".$q[0]['UserID']."'");
                        $balance = isset($bal[0]['bal']) ?  $bal[0]['bal'] : 0;
                        
                        $mysql->insert("_tbl_share_products_earning",array("TxnDate"=>date("Y-m-d H:i:s"),
                                                                           "UserID"=> $q[0]['UserID'],
                                                                           "ProductID"=> $q[0]['ProductID'],
                                                                           "ShareLinkID"=> $q[0]['ShareProductID'],
                                                                           "Particular"=> "Earn from https://www.klx.co.in/pp_".$q[0]['Link'],
                                                                           "Credits"=> $P['ReferalIncome'],
                                                                           "Debits"=> "0",
                                                                           "Balance"=> $balance+$P['ReferalIncome']));
                        ?>
                       Rs <?php echo $P['ReferalIncome'];?> Comission Added.
                        <?php
                    }  else {
                ?>
                    <form action="" method="post">
                      <input type="hidden"  id="Link" name="Link" value="<?php echo $q[0]['Link'];?>" aria-describedby="basic-addon3">

                        <input type="hidden" name="LinkID" value="<?php echo $q[0]['ShareProductID'];?>">
                        <input type="submit" value="Add Commission Rs <?php echo $P['ReferalIncome'];?>" name="adComm" class="btn btn-primary">
                    </form>
                    <?php } ?>
                    <br><br><a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning">Back</a>
                </div>
            </div>
         </div>
         </div>
         </div>
        
         <?php
               
            
       }   else {
           echo "Link Not found";
            $display=true;
       }
}

 
   if ($display) {
?>
     
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">                                                       
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Commission</div>
                                </div>
                                <form   method="POST" action=""  enctype="multipart/form-data">
                                    <div class="card-body">
                                    
                                    <label for="basic-url">Your klx product url<br></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://www.klx.co.in/pp_</span>
  </div>
  <input type="text" class="form-control" id="Link" name="Link" aria-describedby="basic-addon3">
</div>


                                       
                                         
                                    </div>   
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="submit" name="adComm" >Add Commission</button>&nbsp;
                                                <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

  
    <?php } ?>

  
          