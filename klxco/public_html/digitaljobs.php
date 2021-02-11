<?php
include_once("header.php");
$data = $mysql->select("select * from Ads_Photo order by PhotoAdID Desc");
?>
<div class="main-panel" style="width:100% !important;height:auto !important;">
    <div class="container" style="margin-top:0px;">
        <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>         
               <div class="row">                                                     
                <div class="col-md-12">
                    <div class="card">  
    <div class="container row ">
        <div class="col-6">
            <div class="stats-card">
                <h2 id="digitalCards" style="color: red;font-size: 40px;font-weight: bold;">0</h2>
                <p>Digital Cards</p>
            </div>
        </div>
        <div class="col-6">
            <div class="stats-card">
                <h2 id="digitalResume" style="color: red;font-size: 40px;font-weight: bold;">0</h2>
                <p>Digital Resume</p>
            </div>
        </div>
        <div class="col-6">
            <div class="stats-card">
                <h2 id="happyCustomers" style="color: red;font-size: 40px;font-weight: bold;">0</h2>
                <p>Customers</p>
            </div>
        </div>
        <div class="col-6">
            <div class="stats-card">
                <h2 id="franchisee" style="color: red;font-size: 40px;font-weight: bold;">0</h2>
                <p>Franchisees</p>
            </div>
        </div>
    </div>
    
    <hr>
      <div class="col-md-12">
    
          <b>Demo Links</b><br><br>
          <b>Resume</b>          <br>
          <input onclick="location.href='https://www.klx.co.in/share/r-M.-Balu-1'" type="text" value="https://share.klx.co.in/r-M.-Balu-1" disabled="disabled" style="padding:10px;border: 1px solid #ccc;border-radius: 10px;width:100%;cursor:pointer">
          <div class="learn-more-btn-section" style="padding-left:0px;text-align:right">
            <a class="nav-link learn-more-btn btn-header" href="https://www.klx.co.in/share/r-M.-Balu-1">View Demo Resume Link</a>
          </div>
          <br> 
          <b>Visiting Card</b><br>
          <input onclick="location.href='https://www.klx.co.in/share/c-Balu-1'" type="text" value="https://share.klx.co.in/c-Balu-1" disabled="disabled" style="padding:10px;border: 1px solid #ccc;border-radius: 10px;width:100%;cursor:pointer">
          <div class="learn-more-btn-section" style="padding-left:0px;text-align:right">
            <a class="nav-link learn-more-btn btn-header" href="https://www.klx.co.in/share/c-Balu-1">View Demo visting Card Link</a>
          </div>
          <br><br>
      </div>
    
    </div>
    </div>                                                                            
    </div>
    
<script>
<?php      
$d = $mysql->select("select * from _counter order by dayid desc limit 0,1");
if (sizeof($d)==1) {
    $i=$d[0]['count_1'];
    $j=$d[0]['count_2'];
    $k=$d[0]['count_3'];
    $l=$d[0]['count_4'];
}  
?>
    var i=0;
    setInterval(function() {
        if (i<=<?php echo $i;?>) {
            $('#digitalCards').html(i);
            i=i+10;
        } else {
           $('#digitalCards').html(<?php echo $i;?>);  
        }},10);
                                              
    var j=0;
    setInterval(function() {
        if (j<=<?php echo $j;?>) {
            $('#digitalResume').html(j);  
            j=j+20;
        }else {
            $('#digitalResume').html(<?php echo $j;?>);  
        }},10);
    
    var k=0;
    setInterval(function() {
        if (k<=<?php echo $k;?>) {
            $('#happyCustomers').html(k);
            k=k+17;
        }else {
            $('#happyCustomers').html(<?php echo $k;?>);  
        }},10);

    var l=0;
    setInterval(function() {
        if (l<=<?php echo $l;?>) {
            $('#franchisee').html(l);
            l++;
        }},1);
</script> 

            <div class="row" style="display: none;">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert" style="background: #D4EDDA;">
                        The photo advertisement on this website, which is viewed by millions of people, is only Rs. 250 per month
                    </div>
                </div>
            </div>
          
            <div class="row">                                                     
                <div class="col-md-6">
                    <div class="card">                                                     
                        <div class="card-header">
                            <h4>Digital Jobs</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($data as $r) { ?>
                                <div class="col-sm-4" style="padding-left:0px;padding-right:0px;">
                                    <img src="https://www.klx.co.in/assets/photoads/<?php echo $r["FileName"];?>" style="width:100%"        >
                                </div>                      
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include_once("footer.php"); ?>