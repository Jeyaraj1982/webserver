<?php
include_once("config.php"); 

echo $_GET['action']();


function getDistrictName() {
    global $mysql;
      $statenames = $mysql->select("select * from _jstatenames where  statenames='".$_GET['statename']."' ");
    $districtnames = $mysql->select("select * from _jdistrictnames where stateid='".$statenames[0]['stateid']."' order by districtname ");
    ?>
    <label>District Name Name</label>
                        <select name="DistrictName" id="DistrictName" class="form-control">
                           
                            <?foreach($districtnames as $districtname) {?>
                             <option value="<?php echo $districtname['districtname'];?>"><?php echo $districtname['districtname'];?></option>
                             <?php } ?>
                        </select>
    <?php
    
}

function ScrollThumb() {
    global $mysql;
       $scrollings = $mysql->select("select * from _Scrollings   "); 
       ?>
        <marquee>
     <?php foreach($scrollings as $s ) {
         ?>
               <img src="assets/profile/<?php echo $s['ProfilePhoto'];?>" alt="" style="height:120px;border:1px solid #ccc;background:#fff;padding:3px;margin-right:20px;">
         <?php
     }
     ?>
     </marquee>
       <?php
}

function activeMembers() {
    global $mysql;
       
       ?>
            <?php $activemembsers= $mysql->select("select * from _Members where IsPaidMember='1'    order by MemberID Desc limit 0,8"); ?>
        <?php foreach($activemembsers as $mem) {?>
          <div class="col-md-3 col-sm-3 col-xs-12" style="margin-bottom:20px">
            <div class="single-team-member">
              <div class="team-img" style="text-align: center;">
                
                  <img src="assets/profile/<?php echo $mem['ProfilePhoto'];?>" alt="" style="height:200px;margin:0px auto;">
                
              </div>
              <div class="team-content text-center">
                <h4><?php echo $mem['MemberName'];?></h4>
                <p><?php echo $mem['Category'];?></p><br>
                <a href="viewProfile.php?profile=<?php echo $mem['MemberID'];?>-<?php echo $mem['MemberName'];?>-" style="border-radius:5px;background:Green;color:#fff;padding:5px 10px;;">View Profile</a>
              </div>
            </div>
          </div>      
       <?php } ?>
       
       <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px;text-align:center">
             <a href="https://cinemanewfaces.com/profiles.php" class="btn btn-danger btn-sm">View all profiles</a>
       </div>    
       <?php
}


?>