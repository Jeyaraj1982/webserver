 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">
                     <h2>My Home</h2>
                     <div style="border-bottom:1px solid #D4E3F6;"></div><br>
                     <?php
                $data = $mysql->select("select * from _clients where id=".$_SESSION['user']['id']);
                $rusers = $mysql->select("select * from _clients where isactive=1 and referringby=".$data[0]['id']);
            ?>
            <h5>Welcome <?php echo $data[0]['firstname'];?></h5>
            <br>                       
            <p align="right">
            <a href="pjhowtoplay" class="btn btn-primary btn-sm" style="color:#fff">Demo Work</a>
            <a href="Description" class="btn btn-danger btn-sm" style="color:#fff">Description</a>
            <a href="adPostingList" class="btn btn-primary btn-sm" style="color:#fff">Ad Posting Websites</a>
            <a href="adPostingTitles" class="btn btn-info btn-sm" style="color:#fff">Ad Posting Titles</a>
            </p>  
            
            <h5>Activated Jobs</h5>
            <div class="row">
                <div class="col-sm-4">
                    <div style="border:1px solid #ccc;border-radius:5px;padding:10px;text-align:center;font-size:25px">
                     Ad Posting Job <br><br>
                    <?php if ($data[0]['adposting_enabled']=="1") {
                        echo "<span style='font-size:13px;'>Activated on<br>".$data[0]['adposting_enabledon']."</span>";
                    } else {
                         $jobtypes = $mysql->select("select * from _tbl_JobTypes where JobTypeID='1'");
                       ?>
                       
                         <form action="https://www.kasupanamthuttu.com/pay.php" method="post">
                            <input type="hidden" value="<?php echo md5("x".$data[0]['id']);?>" name="record">
                            <input type="hidden" value="1" name="JobType">
                             <input type="hidden" value="1" name="paymentroute">
                            <input type="submit" value="Pay Rs.<?php echo $jobtypes[0]['JobTrainingFee'];?> and Activate" class="btn btn-success btn-sm" name="paynow">
                       </form>
                       <?php 
                    }
                    ?>
                    </div>
                
                </div>
                
                <div class="col-sm-4">
                <div style="border:1px solid #ccc;border-radius:5px;padding:10px;text-align:center;font-size:25px">
                    Email Sending Job   <br><br>
                    
                    <?php if ($data[0]['emailjob_enabled']=="1") {
                        echo "<span style='font-size:13px;'>Activated on<br> ".$data[0]['emailjob_enabledon']."</span>";
                    } else {
                         $jobtypes = $mysql->select("select * from _tbl_JobTypes where JobTypeID='2'");
                       ?>
                       
                         <form action="https://www.kasupanamthuttu.com/pay.php" method="post">
                            <input type="hidden" value="<?php echo md5("x".$data[0]['id']);?>" name="record">
                            <input type="hidden" value="2" name="JobType">
                            <input type="hidden" value="1" name="paymentroute">
                            <input type="submit" value="Pay Rs.<?php echo $jobtypes[0]['JobTrainingFee'];?> and Activate" class="btn btn-success btn-sm" name="paynow">
                       </form>
                       <?php 
                    }
                    ?>
                    </div>
                
                </div>
                
                <div class="col-sm-4">
                <div style="border:1px solid #ccc;border-radius:5px;padding:10px;text-align:center;font-size:25px">
                    SMS Sending Job    <br><br>
                    <?php if ($data[0]['smsjob_enabled']=="1") {
                        echo "<span style='font-size:13px;'>Activated on<br>".$data[0]['smsjob_enabledon']."</span>";
                    } else {
                         $jobtypes = $mysql->select("select * from _tbl_JobTypes where JobTypeID='3'");
                       ?>
                       
                         <form action="https://www.kasupanamthuttu.com/pay.php" method="post">
                            <input type="hidden" value="<?php echo md5("x".$data[0]['id']);?>" name="record">
                            <input type="hidden" value="3" name="JobType">
                             <input type="hidden" value="1" name="paymentroute">
                            <input type="submit" value="Pay Rs.<?php echo $jobtypes[0]['JobTrainingFee'];?> and Activate" class="btn btn-success btn-sm" name="paynow">
                       </form>
                       <?php 
                    }
                    ?>
                    </div>
                
                </div>
            
            </div>
            <br><br>
            <table cellpadding="5" cellspacing="5" style="font-family: arial;font-size:12px;" width="100%">
    <tr>
        <td width="100">Name</td>
        <td>&nbsp;:&nbsp;</td> 
        <td><?php echo $data[0]['firstname'];?></td>
    </tr>
    <tr>
        <td>Account No</td>
        <td>&nbsp;:&nbsp;</td> 
        <td><?php echo $data[0]['id'];?></td>
    </tr>
    <tr>
        <td>Visitors</td>
        <td>&nbsp;:&nbsp;</td> 
        <td>
        
          
            <?php
            $visitors_count = $mysql->select("select * from _visitor where  userid='".$data[0]['id']."'");
        
        echo sizeof($visitors_count);
?>
            <?php //echo $data[0]['visitors']; ?>
            
            
            
        </td>
    </tr>
     <?php if ($data[0]['adposting_enabled']=="1") { ?>
    <tr>
        <td>My Link</td>
        <td>&nbsp;:&nbsp;</td> 
        <td>http://www.kasupanamthuttu.com/<?php echo $data[0]['userlink'];?></td>
    </tr>    
    <?php } ?>
    <tr>
        <td>Registered Users</td>
        <td>&nbsp;:&nbsp;</td> 
        <td><?php echo sizeof($rusers);?></td>
    </tr>
    <tr>
        <td valign="top">Available Amount</td>
        <td valign="top">&nbsp;:&nbsp;</td> 
        <td colspan="2" valign="top">
            <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;"  width="100%">
                <tr>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;border-right:none">Total Earning</td>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;border-right:none">Total Withdrawal</td>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;">Available</td>
                </tr>
                <?php
                    //_clients_account
                    $Amount = $mysql->select("select sum(cramount) as cr,  sum(dramount) as dr  from _clients_account where clientid=".$_SESSION['user']['id']);
                    
                    
                    ?>
                <tr>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo getCurrency($data[0]['country']);?>&nbsp;<?php echo number_format($Amount[0]['cr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo getCurrency($data[0]['country']);?>&nbsp;<?php echo number_format($Amount[0]['dr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-top: none;"><?php echo getCurrency($data[0]['country']);?>&nbsp;<?php echo number_format(($Amount[0]['cr']-$Amount[0]['dr']),2);?></td> 
                </tr>
                <tr>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;"><a href="earning" style="color:#333">Details</a></td>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;"><a href="withdrawal" style="color:#333">Details</a></td>
                    <td align="center" style="border:1px solid #ccc;border-top: none;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>
                  </div>
               </div>
              

   
    </div>
</div>

 

<?php                                               
           
       function getCurrency($country) {
            
           switch($country) {
               case 'dubai' : return "AED"; break;
               case 'india' : return "RS"; break;
               case 'malaysia' :   return "MYR"; break;
               case 'singapore' : return "SGD"; break;
              
           }
           
       }
?>