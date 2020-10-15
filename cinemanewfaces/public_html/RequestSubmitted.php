<?php include_once("header.php");?>
<br><br><br>
<main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
                 <div class="row">
                    <div class="col-sm-9" style="margin:0px auto;text-align:center;color:#666">
                        <img src="assets/interface.png"><br><br><br>
                        <h4>Your requested sumitted.</h4>
                        <div style='margin:5px;padding:10px;'>
                        Hello member <b><?php echo $_POST['firstname']; ?></b>!<br><br>
                        Thank You For Joining Us.<br><br>
                        <span style="color:red;font-size:15px;font-weight:bold">Account Had Been Created But It's Not Active Yet.</span><br><br>
                        <span style="color:green;font-size:13px">To Activate Your Account, Please Make a Payment for Your Membership.</span><br><br>
                        
                        <div>
                        for instant activation, Pay Rs. 300 
                            <form action="https://www.cinemanewfaces.com/pay.php" method="post">
                            <input type="hidden" value="<?php echo $_GET['xnd'];?>" name="record">
                               <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;width: 100%;">
                               <tr>
                                <td colspan="2" style="text-align: center;">
                                    <input type="submit" name="paynow" value="Pay Now Rs. 300" class="btn btn-primary btn-sm">
                                </td>
                                </tr>
                                <tr>
                                <td colspan="2">
                                    support major net banking, debit cards and wallets
                                </td>
                                </tr>

                    </table>  
                            </form>
                        </div>
                        
                        
                      <!--  <span style="color:Orange;font-size:13px"><b>Note:</b>"<b>If You Have Not Paid Now Don't Worry. Just Choose The Below Payment Options. Go and Make a Payment then login with your login details send SMS to admin to activate your account instantly</b>"</span><br><br>
                        <span style="color:#FF00BF;font-size:15px">Lots of people much Younger than you Earning More In This ! WHY NOT YOU?<br><br>
                    Please Select Your Payment Method To Pay Manually:<br><br>
                    <b>Payment Option Through : Please Select</b>,<br><span style='color:#35A6FF'> Bank Deposit, Bank Transfer, -Money Order,western moneyorder :</span></span><br><br>-->
                    </div>
                    </div>
                 </div>
                                                      
            </div>
          </div>
        </div>
      </div>
    </div> 
<?php include_once("footer.php"); ?>