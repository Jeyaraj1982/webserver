<?php include_once("header.php"); ?>
<?php 
 
 
 if ($_GET['a']>0) {
$array[1]="a";
$array[2]="B";
$array[3]="1";
$array[4]="d";
$array[5]="E";
$array[6]="5";
$array[7]="G";
$array[8]="h";
$array[9]="9";
$array[0]="j";
$array["-"]="z";

$ds = str_split($_GET['a']."-".$_SESSION['USER']['userid']);
$ulink = "";
foreach($ds as $d) {
     $ulink.=$array[$d];
}


 
//if (isset($_POST['CLink'])) {
    $q = $mysql->select("select * from _tbl_share_products_link where ProductID='".$_GET['a']."' and UserID='".$_SESSION['USER']['userid']."'");
    if (sizeof($q)==0) {
         $mysql->insert("_tbl_share_products_link",array("ProductID"=>$_GET['a'],
                                                         "UserID"=>$_SESSION['USER']['userid'],
                                                         "CreatedOn"=>date("Y-m-d H:i:s"),
                                                         "Link"=>$ulink));
         $link = "https://www.klx.co.in/pp_".$ulink;
    } else {
        $link = "https://www.klx.co.in/pp_".$q[0]['Link'];
    }
     
//}
 $data = $mysql->select("select * from _tbl_products where ProductID='".$_GET['a']."'");
?>
<div class="main-panel" style="width:100% !important;height:auto !important;">
    <div class="container" style="margin-top: 0px !important;">
        <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>          
            <div class="row">                                                     
                <div class="col-md-6">
                    <div class="card">                                                     
                        <div class="card-header">
                            <h4>Earn Money</h4>
                        </div>
                    </div>
                  
                    <?php foreach($data as $P) { ?>
                    <div class="card"> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4" style="padding-left:0px;padding-right:0px;text-align: center;">
                                    <img src="https://www.klx.co.in/assets/products/<?php echo $P["ProductImage"];?>" style="width:80%;margin:0px auto;">
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><?php echo $P['ProductName'];?></h3></div>
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><span style="color:blue">Rs <?php echo $P['SellingPrice'];?></span>&nbsp;&nbsp;<span style="color:#6e6e6e;"><strike>Rs <?php echo $P['ProductPrice'];?></strike></span></h3></div>
                                    <br>
                                    <div>
                                        <h3>Description</h3>
                                       <div style="color:red"><?php echo $P['Description'];?></div> 
                                    </div>
                                    <br>
                                    Your Referal Link<br><br>
                                    <div style="border:1px dashed #ccc;padding:10px;text-align:center;color:#222;background:#f2efd7"><?php echo $link;?></div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div> 
<?php } ?>



 
<?php 
 if ($_GET['a']=="p") {
     
    $q = $mysql->select("select * from _tbl_share_products_link where Link='".$_GET['link']."' ");
 $data = $mysql->select("select * from _tbl_products where ProductID='".$q[0]['ProductID']."'");
 $customer = $mysql->select("select * from _jusertable where userid='".$q[0]['UserID']."'");
?>
<div class="main-panel" style="width:100% !important;height:auto !important;">
    <div class="container" style="margin-top: 0px !important;">
        <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>          
            <div class="row">                                                     
                <div class="col-md-6">
                    <?php foreach($data as $P) { ?>
                    <div class="card"> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4" style="padding-left:0px;padding-right:0px;text-align: center;">
                                    <img src="https://www.klx.co.in/assets/products/<?php echo $P["ProductImage"];?>" style="width:80%;margin:0px auto;">
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><?php echo $P['ProductName'];?></h3></div>
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><span style="color:blue">Rs <?php echo $P['SellingPrice'];?></span>&nbsp;&nbsp;<span style="color:#6e6e6e;"><strike>Rs <?php echo $P['ProductPrice'];?></strike></span></h3></div>
                                    <br>
                                    <div>
                                        <h3>Description</h3>
                                       <div style="color:red"><?php echo $P['Description'];?></div> 
                                    </div>
                                    
                                    <a href="javascript:void(0)" id="buynowlink" onclick="showContact()" class="btn btn-primary">Buy Now</a>
                                    <div style="display: none;" id="showcontact">
                                    <br><br>
                                    Contact Details<br><br>
                                    <div style="border:1px dashed #ccc;padding:10px;text-align:center;color:#222;background:#f2efd7">
                                    
                                    <?php echo $customer[0]['personname'];?>,<br>
                                    <?php echo $customer[0]['mobile'];?>,<br>
                                    <?php echo $customer[0]['email'];?>,<br>
                                    </div>
                                    
                                    
                                    </div>
                                    
                                    
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div> 
<script>
function showContact() {
     $('#buynowlink').hide();
     $('#showcontact').show();
}
</script>
<?php } ?>
 
 <?php include_once("footer.php"); ?>