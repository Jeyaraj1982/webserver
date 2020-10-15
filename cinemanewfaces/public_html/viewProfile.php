<?php include_once("header.php");?>
<br><br><br>
  <main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Profile Information</h2>
            </div>
          </div>
        </div>
        <div class="row">
         <?php
         $id = explode("-",$_GET['profile']);
          $activemembsers= $mysql->select("select * from _Members where MemberID='".$id[0]."'"); 
          ?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="well-middle">
              <div class="single-well" style="background:#fff;padding:20px;">
                  <div class="row">         
                    <div class="col-sm-3">
                          <img src="assets/profile/<?php echo $activemembsers[0]['ProfilePhoto'];?>" alt=""><br><bR> 
                          <?php
                              $c= $activemembsers[0]['MemberMobile']; 
                              $contact = substr($c,0,2)."xxxxxx".substr($c,8,2);
                          ?>
                          Cotnact No :  <?php echo $contact; ?>
                          
                    </div>
                    <div class="col-sm-9">
                        <table >
                            <tr>
                                <td style="padding:10px;">Name</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['MemberName'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">Age</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['Age'];?></td>
                            </tr> 
                            <tr>
                                <td style="padding:10px;">Category</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['Category'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">BodyHeight</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['BodyHeight'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">BodyWeight</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['BodyWeight'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">PlaceName</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['PlaceName'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">StateName</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['StateName'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">DistrictName</td>
                                <td>:<?php echo $activemembsers[0]['DistrictName'];?></td>
                            </tr> 
                            <tr>
                                <td style="padding:10px;">Languages</td>
                                <td>:<?php echo $activemembsers[0]['Languages'];?></td>
                            </tr>
                        </table>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
<?php include_once("footer.php"); ?>