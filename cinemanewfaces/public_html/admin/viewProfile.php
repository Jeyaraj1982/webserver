
             <main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
            
  <?php
         $id = explode("-",$_GET['profile']);
         
           
            if (isset($_POST['deleteBtn'])) {
                $mysql->execute("delete from _Members  where MemberID='".$id[0]."'"); 
                ?>
                    <script>
                        alert("deleted Successfully");
                    </script>
                <?php
            }  
            if (isset($_POST['publishBtn'])) {
                $mysql->execute("update _Members set IsPaidMember='1' where MemberID='".$id[0]."'"); 
                ?>
                    <script>
                        alert("Updated Successfully");
                    </script>
                <?php
            }
            
             if (isset($_POST['unpublishBtn'])) {
                $mysql->execute("update _Members set IsPaidMember='0' where MemberID='".$id[0]."'"); 
                ?>
                    <script>
                        alert("Updated Successfully");
                    </script>
                <?php
            }
          $activemembsers= $mysql->select("select * from _Members where MemberID='".$id[0]."'"); 
          ?> 
                  <div class="row">         
                    <div class="col-sm-3">
                          <img src="../assets/profile/<?php echo $activemembsers[0]['ProfilePhoto'];?>" style="width:100%" alt=""><br><bR> 
                    </div>
                    <form action="" method="post">
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
                                <td style="padding:10px;">Mobile</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['MemberMobile'];?></td>
                            </tr>
                              <tr>
                                <td style="padding:10px;">Email</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['MemberEmail'];?></td>
                            </tr>
                            <tr>
                                <td style="padding:10px;">Category</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['Category'];?></td>
                            </tr>
                            <tr>
                                <td style="padding:10px;">Fresher</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['Fresher'];?></td>
                            </tr>
                            <tr>
                                <td style="padding:10px;">ExperienceDetails</td>
                                <td style="padding:10px;">:<?php echo $activemembsers[0]['ExperienceDetails'];?></td>
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
                                <td style="padding:10px;">youtubevideo1</td>
                                <td>:<?php echo $activemembsers[0]['youtubevideo1'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">youtubevideo2</td>
                                <td>:<?php echo $activemembsers[0]['youtubevideo2'];?></td>
                            </tr> 
                            <tr>
                                <td style="padding:10px;">Languages</td>
                                <td>:<?php echo $activemembsers[0]['Languages'];?></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">RegisteredOn</td>
                                <td>:<?php echo $activemembsers[0]['RegisteredOn'];?></td>
                            </tr>
                              <tr>
                                <td style="padding:10px;">Publish</td>
                                <td>:<?php echo $activemembsers[0]['IsPaidMember']==1 ? "Yes" : "No";?></td>
                            </tr>
                            
                              <tr>
                                <td style="padding:10px;">Paid Amount</td>
                                <td>:<?php echo $activemembsers[0]['PaidAmount'];?></td>
                            </tr>
                              <tr>
                                <td style="padding:10px;">Paid on</td>
                                <td>:<?php echo $activemembsers[0]['PaidOn'];?></td>
                            </tr>
                              <tr>
                                <td style="padding:10px;">Publish</td>
                                <td>:<?php echo $activemembsers[0]['PaymentID']>0 ? "PayU" : "Manual";?></td>
                            </tr>
                            
                             <tr>
                                <td style="padding:10px;" colspan="2">  
                                                                                  
                                    <?php
                                        if ($activemembsers[0]['IsPaidMember']==1) {?>
                                            <input type="submit" name="unpublishBtn" value="UnPublish" class="btn btn-warning btn-sm">
                                        <?php } else {?>
                                            <input type="submit" name="publishBtn" value="Publish" class="btn btn-primary btn-sm">
                                        <?php } ?>
                                    <input type="submit" name="deleteBtn" value="Delete" class="btn btn-danger btn-sm">
                                    <a href="dashboard.php?action=editProfile&profile=<?php echo $_GET['profile'];?>">Edit</a>
                            </tr>
                        </table>
                    </div>
                    </form>
                  </div>
 
 
      </div>
          </div>
        </div>
      </div>
    </div> 
     