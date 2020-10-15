
 <?php 
 if (isset($_GET['f'])) {
 $activemembsers= $mysql->select("select * from _Members where Category='".$_GET['f']."'    order by MemberID Desc"); 
    $title = $_GET['f'];
 } else {
     $activemembsers= $mysql->select("select * from _Members    order by MemberID Desc"); 
     $title = " Profiles";
 }
     ?>
     
             <main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2><?php echo  "List of ".$title;?></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
            
            
       <div class="row">                                   
 <?php foreach($activemembsers as $mem) {?>
        <div class="col-sm-3" style="margin:25px;border:1px solid #ccc;text-align:center;padding:10px">
        <img src="../assets/profile/<?php echo $mem['ProfilePhoto'];?>" alt="" style="height:100px;width:100px;"><br>
            Profile ID: <?php echo $mem['MemberID'];?><br>
            <?php echo $mem['MemberName'];?><br>
            <?php echo $mem['Category'];?><br>
            <a href="dashboard.php?action=viewProfile&profile=<?php echo $mem['MemberID'];?>-<?php echo $mem['MemberName'];?>-" style="border-radius:5px;background:Green;color:#fff;padding:5px 10px;;">View Profile</a>
            <br><br>
            <?php if ($mem['IsPaidMember']==1) {?>
                <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Paid Member
                <?php if ($mem['PaymentID']>0) {?>
                    - PayU
                <?php } ?>
                </a>
            <?php } ?>
            
        </div>
 <?php } ?>
 </div>
 
 
 
     </div>
          </div>
        </div>
      </div>
    </div> 
     