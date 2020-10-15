
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
         
         if (isset($_POST['updateBtn'])){
             
                                             
             $mysql->execute("update _Members set 
                                            MemberName='".$_POST['MemberName']."',
                                            Age='".$_POST['Age']."',
                                            MemberMobile='".$_POST['MemberMobile']."',
                                            MemberEmail='".$_POST['MemberEmail']."',
                                            Category='".$_POST['Category']."',
                                            Fresher='".$_POST['Fresher']."',
                                            ExperienceDetails='".$_POST['ExperienceDetails']."',
                                            BodyHeight='".$_POST['BodyHeight']."',
                                            BodyWeight='".$_POST['BodyWeight']."',
                                            PlaceName='".$_POST['PlaceName']."',
                                            youtubevideo1='".$_POST['youtubevideo1']."',
                                            youtubevideo2='".$_POST['youtubevideo2']."',
                                            Languages='".$_POST['Languages']."'  where MemberID='".$id[0]."'"); 
             
             
              echo "<script>alert('updated successfull');</script>";
         }
           
            
          $activemembsers= $mysql->select("select * from _Members where MemberID='".$id[0]."'"); 
          ?> 
                  <div class="row">         
                    <div class="col-sm-3">
                          <img src="../assets/profile/<?php echo $activemembsers[0]['ProfilePhoto'];?>" style="width:100%" alt=""><br><bR> 
                    </div>
                  
                    <div class="col-sm-9">
                      <form action="" method="post">
                        <table style="width:100%;" >                                                      
                            <tr>
                                <td style="padding:10px;width:100px">Name</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="MemberName" value="<?php echo $activemembsers[0]['MemberName'];?>"></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">Age</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="Age" value="<?php echo $activemembsers[0]['Age'];?>"></td>
                            </tr> 
                            <tr>
                                <td style="padding:10px;">Mobile</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="MemberMobile" value="<?php echo $activemembsers[0]['MemberMobile'];?>"></td>
                            </tr>
                              <tr>
                                <td style="padding:10px;">Email</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="MemberEmail" value="<?php echo $activemembsers[0]['MemberEmail'];?>"></td>
                            </tr>
                            <tr>                                                    
                                <td style="padding:10px;">Category</td>
                                <td style="padding:10px;">
                                
                                                         <select name="Category" id="Category" class="form-control">
                        <?php $statenames = $mysql->select("select * from _Category   order by CategoryName ");?>
                            <?foreach($statenames as $statename) {?>
                            <option value="<?php echo $statename['CategoryName'];?>" <?php echo $activemembsers[0]['Category']==$statename['CategoryName'] ? " selected='selected' " :"";?> ><?php echo $statename['CategoryName'];?></option>
                             <?php } ?>
                        </select>

                                
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px;">Fresher</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="Fresher" value="<?php echo $activemembsers[0]['Fresher'];?>"></td>
                            </tr>
                            <tr>
                                <td style="padding:10px;">ExperienceDetails</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="ExperienceDetails" value="<?php echo $activemembsers[0]['ExperienceDetails'];?>"></td>
                            </tr>
                             <tr>          
                                <td style="padding:10px;">BodyHeight</td>
                                <td style="padding:10px;"><input  class="form-control" type="text" name="BodyHeight" value="<?php echo $activemembsers[0]['BodyHeight'];?>"></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">BodyWeight</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="BodyWeight" value="<?php echo $activemembsers[0]['BodyWeight'];?>"></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">PlaceName</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="PlaceName" value="<?php echo $activemembsers[0]['PlaceName'];?>"></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">youtubevideo1</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="youtubevideo1" value="<?php echo $activemembsers[0]['youtubevideo1'];?>"></td>
                            </tr>
                             <tr>
                                <td style="padding:10px;">youtubevideo2</td>
                                <td style="padding:10px;"><input  class="form-control"type="text" name="youtubevideo2" value="<?php echo $activemembsers[0]['youtubevideo2'];?>"></td>
                            </tr> 
                            <tr>
                                <td style="padding:10px;">Languages</td>
                                <td style="padding:10px;"><input class="form-control" type="text" name="Languages" value="<?php echo $activemembsers[0]['Languages'];?>"></td>
                            </tr>
                            <tr>
                                <td style="padding:10px;" colspan="2">  
                                    <input type="submit" name="updateBtn" value="Update" class="btn btn-info btn-sm">
                                 </td>
                            </tr>
                        </table>
                          </form>
                    </div>
                  
                  </div>
 
 
      </div>
          </div>
        </div>
      </div>
    </div> 
     