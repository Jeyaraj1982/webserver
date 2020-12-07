<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12" style="text-align:justify">
            <h3 style="text-align: left;font-family: arial;border:none">Account Activation</h3> 
            <br> 
            <form action="https://www.kasupanamthuttu.com/pay.php" method="post">
            Dear <?php echo $_SESSION['xuser']['firstname'];?>,<br><br>
            Your account not activate, please pay to activate your account instantly.
                            <input type="hidden" value="<?php echo md5("x".$_SESSION['xuser']['id']);?>" name="record">
                               <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;width: 100%;">
                    <tr>
                        <td>Your ID</td>
                        <td><?php echo $_SESSION['xuser']['id'];?></td>
                    </tr>
                    <tr>
                        <td>Registered On</td>
                        <td><?php echo $_SESSION['xuser']['postedon'];?></td>
                    </tr>
                              <tr>
                        <td>Job</td>
                        <td>
                           <?php $jobtypes = $mysql->select("select * from _tbl_JobTypes order by JobTypeID"); ?>
                            <select name="JobType" style="border:1px solid #D4E3F6;padding:3px;">
                                <?php foreach($jobtypes as $jp) {?>
                                    <option value="<?php echo $jp['JobTypeID'];?>"><?php echo $jp['JobName'];?>  [Rs. <?php echo $jp['JobTrainingFee'];?>]</option>
                                <?php } ?>
                            </select>
                        </td>
                       
                    </tr>
                     <tr>
                            <td>Payment Using</td>
                            <td><select name="paymentroute" class="form-control">
                                    <option value="1">Payu (Domestic Indian Gateway)</option>
                                    <option value="2">Paypal (International Gateway)</option>
                            
                            </select></td>
                        </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="paynow" value="Pay Now" class="btn btn-primary btn-sm">
                        </td>
                    </tr>
                                        <tr>
                        <td colspan="2">
                           support major net banking, debit cards and wallets
                        </td>
                    </tr>

                    </table>  
                            </form>
        </article>
    </div>
</div>