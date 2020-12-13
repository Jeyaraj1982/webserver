<h3 style="font-family:arial">Part Time Registered Users</h3>
<?php
 include_once("config.php");
    
    //where date(endon)>=date('".date("Y-m-d H:i:s")."')
    $products = $mysql->select("select * from _usertable order by userid desc");
               ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr  style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">User ID</td>   
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Person Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Address</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Mobile No</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Email ID</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Password</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Date of Register</td>
                        </tr>
               <?php  foreach($products as $p ) { ?>
        <tr>  
                     <td style="text-align:right;padding-left:5px;padding-right:5px;"><?php echo $p['userid'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['personname'];?></td>
            <td style="text-align:left;padding-left:5px;padding-right:5px;"><?php echo $p['address1'].",".$p['address2'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['mobileno'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['emailid'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['password'];?></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px;"><?php echo $p['dateofregister'];?></td>
             
  
             
        </tr>        
        <?php
    }
?>