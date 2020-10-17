<?php 
include_once("header.php"); 
$data = $mysql->select("select * from _tbl_products where IsDeleted='0' and IsActive='1' order by ProductID Desc");
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
                    <?php foreach($data as $P) { 
                        
                          $q = $mysql->select("select * from _tbl_share_products_link where ProductID='".$P['ProductID']."' and UserID='".$_SESSION['USER']['userid']."'");
  
                        ?>
                    <div class="card"> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4" style="padding-left:0px;padding-right:0px;text-align: center;">
                                    <img src="https://www.klx.co.in/assets/products/<?php echo $P["ProductImage"];?>" style="width:80%;margin:0px auto;">
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><?php echo $P['ProductName'];?></h3></div>
                                    <div class="col-sm-12"><h3 class="mb-0 fw-bold"><span style="color:blue">Rs <?php echo $P['SellingPrice'];?></span>&nbsp;&nbsp;<span style="color:#6e6e6e;"><strike>Rs <?php echo $P['ProductPrice'];?></strike></span></h3></div>
                                    <br>
                                    <?php if (sizeof($q)==0) {?>
                                    <button type="button" class="btn btn-primary " data-toggle="modal" onclick="showReferal('<?php echo $P['ProductID'];?>','<?php echo str_replace(" ","-",$P['ProductName']);?>')">
  &nbsp;&nbsp;&nbsp;Refer & Earn INR <?php echo $P['ReferalIncome'];?>&nbsp;&nbsp;&nbsp;
</button><br>
<?php } else {
        $link = "https://www.klx.co.in/pp_".$q[0]['Link'];
    ?>
         Your Referal Link<br><br>
                                    <div style="border:1px dashed #ccc;padding:10px;text-align:center;color:#222;background:#f2efd7"><?php echo $link;?></div>
<?php } ?>
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
    function showReferal(pid,pname) {
          $('#ReferalModal').modal("show");
        var isLogin = "<?php echo ((isset($_SESSION['USER']['userid'])) && $_SESSION['USER']['userid']>0) ? 1 : 0;?>"  ;
        if (isLogin=="0") {
          $('.modal-content').html($('#notlogin').html());  
        } else {
            var content = '<form action="https://www.klx.co.in/p'+pid+'_'+pname+'" method="post">';
            content +=  $('#logincontent').html();
            content += '</form>';
            $('.modal-content').html(content);
        }
          
    }
</script>
 

<div id="notlogin">
 <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Refer & Earn Program</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
              You must login to coninue
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-outline-primary" onclick="location.href='https://www.klx.co.in/in/register'" >Signup</button>
        <button type="button" class="btn btn-primary" onclick="location.href='https://www.klx.co.in/in/login'">Goto Login</button>
      </div>
</div>

<div id="logincontent">
 <!-- Modal Header -->
 
      <div class="modal-header">
        <h4 class="modal-title">Refer & Earn Program</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
              Dear <?php echo $_SESSION['USER']['personname'];?>, are you continue with refer & earn program.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" >No</button>
        <button type="submit" name="CLink" class="btn btn-primary">Yes Continue</button>
      </div>
      </form>
</div>
<!-- The Modal -->
<div class="modal " id="ReferalModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

     

    </div>
  </div>
</div>

<?php include_once("footer.php"); ?>