             <?php include_once("game_clients/menu.php");?>
     <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <article class="col-m-8">
                 
<h4 style="border:none;">My Page</h4><br>
 
 <div class="row" style="margin-bottom:10px">
    <div class="col-sm-6" style="margin-bottom:10px;">
        <div style="border:1px solid #ccc;padding:10px;font-size:20px;border-radius:7px;color:#0B3472">
            <span style="font-size:25px;color:#666">Wallet Balance</span><br>
            <?php echo number_format($dealmaass->getBalance(),2); ?><br>
            <a target="_self" href="AdMoney" style="background:orange;padding:5px 10px;font-size:12px;color:#fff;border-radius:5px;">Wallet Update</a>
            <a target="_self" href="Withdraw" style="background:#5f8eb5;padding:5px 10px;font-size:12px;color:#fff;border-radius:5px;">Withdraw</a>
            <a target="_self" href="usr_accountsumary" style="background:#d870bb;padding:5px 10px;font-size:12px;color:#fff;border-radius:5px;">View Summary</a>
        </div>
    </div>
    
    <div class="col-sm-3" style="margin-bottom:10px;">
        <div style="border:1px solid #ccc;padding:10px;font-size:20px;border-radius:7px;color:#0B3472">
            <span style="font-size:25px;color:#666">Referal Earned</span><br>
            <?php echo number_format($dealmaass->getReferalEarnings($_SESSION['USER']['userid']),2); ?><br>
             <a href="earningfromreferal" style="background:orange;padding:5px 10px;font-size:12px;color:#fff;border-radius:5px;">View Transactions</a> 
        </div>
    </div>
    
     <div class="col-sm-3" style="margin-bottom:10px;">
        <div style="border:1px solid #ccc;padding:10px;font-size:20px;border-radius:7px;color:#0B3472">
            <span style="font-size:25px;color:#666">Cash  Won</span><br>
            <?php echo number_format($dealmaass->getCashWining($_SESSION['USER']['userid']),2); ?><br>
            <a href="earningcashwinning" style="background:orange;padding:5px 10px;font-size:12px;color:#fff;border-radius:5px;">View Transactions</a> 
        </div>                                    
    </div>  
           <div class="col-sm-3" style="margin-bottom:10px;">
        <div style="border:1px solid #ccc;padding:10px;font-size:20px;border-radius:7px;color:#0B3472">
            <span style="font-size:25px;color:#666">Free Points</span><br>
            <?php echo $dealmaass->getPoints($_SESSION['USER']['userid']); ?><br>
            <a href="Offer" style="background:orange;padding:5px 10px;font-size:12px;color:#fff;border-radius:5px;">Benifits</a> 
        </div>
    </div>                      
 </div>
                                                
<div class="row" style="margin-bottom:10px">
    <div class="col-sm-8">
     <div style="border:1px solid #ccc;padding:10px;font-size:20px;border-radius:7px;color:#0B3472">    
    <table cellpadding="3" cellspacing="0" align="center" style="border:none;font-family:arial;font-size:12px;width:100%">
            <tr>
                <td style="width:100px;border-right:none;">Account ID</td>
                <td style="border-right:none;">:&nbsp;<?php echo $_SESSION['USER']['userid'];?></td>
                 
            
            </tr>
            <tr>
                <td style="border-right:none;">Name</td>
                <td style="border-right:none;">:&nbsp;<?php echo $_SESSION['USER']['personname'];?></td>
                
               
            </tr>
            <tr>
                <td style="border-right:none;">Mobile No</td>
                <td style="border-right:none;">:&nbsp;<?php echo $_SESSION['USER']['mobileno'];?></td>
                
            </tr>
            <tr>
                <td style="border-right:none;">E-Mail ID</td>
                <td style="border-right:none;">:&nbsp;<?php echo $_SESSION['USER']['emailid'];?></td>
            </tr>
            
           
            <tr>
                <td style="border-right:none;">Visitors</td>
                <td style="border-right:none;">:&nbsp;<?php echo sizeof($mysql->select("select userid from _uservisits where userid=".$_SESSION['USER']['userid']." order by viewon desc ")); ?>
                &nbsp;&nbsp;&nbsp; [ <a href="gamevisitorhistory">Visitor's Hisotry</a> ]
                </td>
              </tr>
              <tr>
                <td style="border-right:none;">Registered</td>
                <td style="border-right:none;">:&nbsp;<?php echo sizeof($mysql->select("select userid from _usertable where referedby='".$_SESSION['USER']['userid']."'")); ?>&nbsp;&nbsp;&nbsp; [ <a href="myreferals">Registered Persons</a> ]
                </td>
              </tr>
        </table>
        </div>
        </div>
</div>

<div class="row">
    <div class="col-sm-8">
    <div style="border:1px solid #ccc;padding:10px;font-size:15px;border-radius:7px;color:#0B3472"> 
    <h5 style="border:none">Refer and Earn</h5>
    Get 40% in your wallet, when your referral update their wallet every time.
    <br><br>
    <table cellpadding="3" cellspacing="0" align="center" style="border:none;font-family:arial;font-size:12px;width:100%">
            <tr>
                <td style="border-right:none;padding:0px;font-weight:bold;">My referal Link</td>
            </tr>
            
            <tr style="background:#fff;">
                <td style="border-right:none;padding:0px;padding-top:5px">
                    <div style="border:1px solid #8ebf67;border-radius:5px;background:#DCF8C6;padding:20px;font-size:15px">
                https://www.jobtomoney.com/<?php echo $_SESSION['USER']['rlink'];?>
                </div>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>                                           
 
 
 
 </article>
 </div>
 </div>
 


 