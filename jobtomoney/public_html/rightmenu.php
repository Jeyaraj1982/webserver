<style>
.lmenu {color:#444 !important}
</style>
<div style="width:90%;margin-top:10px;">
    <?php if ($_SESSION['user']['role']=="clients") { ?>
        <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;border:none;" width="100%">
            <tr><td style="border:none;padding-left:0px"><a href="myhome" class="lmenu">Home</a></td></tr>
            
            <tr style="background:none;"><td style="border:none;padding-left:0px">Earning Tools</td></tr>
            
            <tr><td style="border:none;padding-left:15px"><a href="AllProducts" class="lmenu">Proudcts</a></td></tr>
                                                             
            
            <tr style="background:none;"><td style="padding-left:0px"><a href="myprofile" class="lmenu">My Profile</a></td></tr>
            <tr style="background:none;"><td style="border:none;padding-left:0px"><a href="addbank" class="lmenu">Bank Details</a></td></tr>
            <tr style="background:none;"><td style="padding-left:0px"><a href="addnominee" class="lmenu">Nominee Details</a></td></tr>
            <tr style="background:none;"><td style="border:none;padding-left:0px"><a href="changepassword" class="lmenu">Change Password</a></td></tr>
            <tr style="background:none;"><td style="padding-left:0px"><a href="servicerequest" class="lmenu">Withdrawal Request</a></td></tr>
            <tr style="background:none;"><td style="border:none;padding-left:0px"><a href="myclients" class="lmenu">My Clients</a></td></tr>
            <tr style="background:none;"><td style="padding-left:0px"><a style=";padding-left:0px" href="visitorhistory" class="lmenu">Visitor's History</a></td></tr>
            <tr style="background:none;"><td style="border:none;padding-left:0px"><a href="logout" class="lmenu">Logout</a></td></tr>
        </table>
        
        
        <!--    <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                <tr><td><a href="profileadmatters" class="lmenu">Ad Matters</a></td></tr>  
                <tr><td><a href="startworking" class="lmenu">Start Working</a></td></tr>  
                <tr><td><a href="extraincome"  class="lmenu">Extra Income</a></td></tr>  
            </table>     -->
            
            <?php }  else if ($_SESSION['user']['role']=="staff") { ?>
                                                          <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="staff" class="lmenu">Home</a></td></tr>
                                                            <tr><td><a href="newclients" class="lmenu">New Clients</a></td></tr>
                                                            <tr><td><a href="contactlater" class="lmenu">Contact Later</a></td></tr>
                                                            <tr><td><a href="donotcontact" class="lmenu">Don't Contact</a></td></tr>
                                                            <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>
                                                         <?php } elseif ($_SESSION['user']['role']=="fadmin")  { ?>
                                                           <table cellpadding="2" cellspacing="5" style="border:none;text-align:left;font-size:12px;font-family:arial;background:#f1f1f1" width="100%">
                                                            <tr style="background:none;"><td style="border:none;"><a href="franchiseeadmin" class="lmenu">Admin Home</a></td></tr>
                                                            <tr style="background:none;"><td><a href="fnewclients" class="lmenu">New Clients</a></td></tr>
                                                            <tr style="background:none;"><td  style="border:none;"><a href="fblockedclients" class="lmenu">Blocked Clients</a></td></tr>
                                                            <tr style="background:none;"><td><a href="factiveclients" class="lmenu">Active Clients</a></td></tr>
                                                            <tr style="background:none;"><td  style="border:none;"><a href="fgameusers" class="lmenu">Game Users</a></td></tr>
                                                        </table>
                                                          <br><br><a href="logout" class="lmenu">Logout</a>
                                                        <?php } elseif ($_SESSION['user']['role']=="admin")  { ?>
                                                           <table cellpadding="2" cellspacing="5" style="border:none;text-align:left;font-size:12px;font-family:arial;background:#f1f1f1" width="100%">
                                                            <tr style="background:none;"><td style="border:none;"><a href="webadmin" class="lmenu">Admin Home</a></td></tr>
                                                            <tr style="background:none;"><td><a href="newclients" class="lmenu">New Clients</a></td></tr>
                                                            <tr style="background:none;"><td  style="border:none;"><a href="blockedclients" class="lmenu">Blocked Clients</a></td></tr>
                                                            <tr style="background:none;"><td><a href="activeclients" class="lmenu">Active Clients</a></td></tr>
                                                            <tr style="background:none;"><td><a href="addProduct" class="lmenu">Add Products</a></td></tr>
                                                            <tr style="background:none;"><td><a href="ListProducts" class="lmenu">List Prodcuts</a></td></tr>
                                                            <tr style="background:none;"><td><a href="adpayment" class="lmenu">Make Payment</a></td></tr>
                                                            
                                                            
                                                            <tr style="background:none;"><td><a href="manageTopEarns" class="lmenu">Manage Top Earners</a></td></tr>
                                                            <tr style="background:none;"><td><a href="addTopEarns" class="lmenu">Add Top Earners</a></td></tr>
                                                        </table>
                                                        <br><br><br> 
                                                          <table cellpadding="2" cellspacing="5" style="border:none;text-align:left;font-size:12px;font-family:arial;background:#f1f1f1" width="100%">
                                                            <tr style="background:none;"><td style="border:none;"><a href="paidresumes" class="lmenu">Resumes</a></td></tr>
                                                          </table>
                                                        <br><br><br>
                                                        Game Play                                                         
                                                        <table cellpadding="2" cellspacing="0" style="border:none;text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                               <tr style="background:none;"><td style="padding:5px;padding-left:20px"><a href="gameusers" class="lmenu">Users List</a></td></tr> 
                                                                                                  
                                                            <tr style="background:none;background:#b6f28e;"><td style="padding:5px;font-weight:bold"><a href="javascript:void(0)" class="lmenu">Match2Win</a></td></tr>
                                                            <tr style="background:none;background:#e2fcd1;"><td style="padding:5px;padding-left:20px"><a href="bookandwin" class="lmenu">Auctions</a></td></tr> 
                                                            <tr style="background:none;background:#e2fcd1;"><td style="padding:5px;padding-left:20px"><a href="bookandwin_new" class="lmenu">New Item</a></td></tr> 
                                                            <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#f0f29b;"><td style="padding:5px;font-weight:bold"><a href="javascript:void(0)" class="lmenu">Time Based Auction</a></td></tr>
                                                            <tr style="background:none;background:#fbfcd1;"><td style="padding:5px;padding-left:20px"><a href="timebasedAuction" class="lmenu">Auctions</a></td></tr> 
                                                            <tr style="background:none;background:#fbfcd1;"><td style="padding:5px;padding-left:20px"><a href="timebased_new" class="lmenu">New Item</a></td></tr> 
                                                            <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#f0f29b;"><td style="padding:5px;font-weight:bold"><a href="javascript:void(0)" class="lmenu">Scratch 2 Win Cash</a></td></tr>
                                                            <tr style="background:none;background:#fbfcd1;"><td style="padding:5px;padding-left:20px"><a href="S2W_AddItem" class="lmenu">Add Item</a></td></tr> 
                                                            <tr style="background:none;background:#fbfcd1;"><td style="padding:5px;padding-left:20px"><a href="S2W_ListItems" class="lmenu">List Item</a></td></tr> 
                                                            
                                                            <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#f2c993;"><td style="padding:5px;font-weight:bold"><a href="javascript:void(0)" class="lmenu">testimonials</a></td></tr>
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="testimonials" class="lmenu">testimonials</a></td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="testimonials_new" class="lmenu">New testimonials</a></td></tr> 
                                                            <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#6ddbdb;"><td style="padding:5px;font-weight:bold"><a href="javascript:void(0)" class="lmenu">winners</a></td></tr>
                                                            <tr style="background:none;background:#e0ffff;"><td style="padding:5px;padding-left:20px"><a href="winners" class="lmenu">winners</a></td></tr> 
                                                            <tr style="background:none;background:#e0ffff;"><td style="padding:5px;padding-left:20px"><a href="winners_new" class="lmenu">New winners</a></td></tr> 
                                                            <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;"><td style="padding:5px;padding-left:20px"><a href="GAME_WalletRequests" class="lmenu">Wallet Requests</a></td></tr> 
                                                            <tr style="background:none;"><td style="padding:5px;padding-left:20px"><a href="GAME_WithdrawRequests" class="lmenu">Withdraw Requests</a></td></tr> 
                                                            <tr style="background:none;"><td style="padding:5px;padding-left:20px"><a href="GAME_FundTransfer" class="lmenu">Fund Transfer</a></td></tr> 
                                                            
                                                            
                                                             <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#6ddbdb;"><td style="padding:5px;padding-left:20px;font-weight:bold"><a href="Service_Add" class="lmenu">Business Ads</a></td></tr> 
                                                            <tr style="background:none;background:#e0ffff;"><td style="padding:5px;padding-left:20px"><a href="Service_Add" class="lmenu">Add Ads</a></td></tr> 
                                                            <tr style="background:none;background:#e0ffff;"><td style="padding:5px;padding-left:20px"><a href="Service_List" class="lmenu">List All</a></td></tr> 
                                                            
                                                             <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#f2c993;"><td style="padding:5px;padding-left:20px;font-weight:bold">Take Free</td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="Offer_Add" class="lmenu">Add Take Free</a></td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="Offer_List" class="lmenu">List All</a></td></tr> 
                                                            
                                                            
                                                              <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#f2c993;"><td style="padding:5px;padding-left:20px;font-weight:bold">Sell Documents</td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="Doc_Add" class="lmenu">Add Documents</a></td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="Doc_List" class="lmenu">Documents List</a></td></tr>
                                                            
                                                             <tr>
                                                                <td style="background:#fff">&nbsp;</td>
                                                            </tr>
                                                            <tr style="background:none;background:#f2c993;"><td style="padding:5px;padding-left:20px;font-weight:bold">Franchisee</td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="Franchisee_Add" class="lmenu">Add Franchisee</a></td></tr> 
                                                            <tr style="background:none;background:#fcedd9;"><td style="padding:5px;padding-left:20px"><a href="Franchisee_List" class="lmenu">List Franchisee</a></td></tr>
                                                    
                                                        </table>
                                                        <br>
                                                          <table cellpadding="2" cellspacing="0" style="background:#fff;border:none;text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            
                                                            
                                                            <tr style="background: none;"><td><a href="PGTxn" class="lmenu">Payment Gateway Txn</a></td></tr>
                                                            <tr style="background: none;"><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>
                                                           <?php } else if ($_SESSION['user']['role']=="erode")  { ?>  
                                                            <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="erode" class="lmenu">Admin Home</a></td></tr>
                                                            
                                                             <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>                             
                                                      <?php } else if ($_SESSION['user']['role']=="12district")  { ?>  
                                                            <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="12district" class="lmenu">Admin Home</a></td></tr>
                                                            
                                                             <tr style="background:none;"><td  style="border:none;"><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>                             
                                                    <?php } else { ?>
                                                        <form action="" method="post">
                                                            <table style="text-align:left;font-family: arial;font-size:12px;color:#333" width="100%">
                                                                <tr><td>E-mail id</td></tr>
                                                                <tr><td><input type="text" name="username" style="border: 1px solid #97BEEF;width:100%;padding:2px;"></td></tr>
                                                                <tr><td>Password</td></tr>
                                                                <tr><td><input type="password" name="password" style="border: 1px solid #97BEEF;;width:100%;padding:2px;"></td></tr>
                                                                <tr><td style="padding-top:5px ;"><input type="image" src="images/insider_login_button.gif"></td></tr>
                                                                <tr><td style="padding-top:5px"><a href="forgotpassword" style="text-decoration: none;color:#214689;">Forgot Password?</a></td></tr>
                                                                <?php if (strlen($loginError)>4) {?>
                                                                <tr><td style="color: red"><?php echo $loginError;?></td></tr>
                                                                <?php } ?> 
                                                            </table>
                                                        </form>
                                                    <?php } ?>                                                
                                                </div>