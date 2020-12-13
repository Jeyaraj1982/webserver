<table cellpadding="0" cellspacing="0">
    <tr>
        <td><img src="images/student.jpg"></td>
        <td style="width: 314px;background:url(images/form-bg.jpg);">
                 <Br>
                <div style="font-family:arial;font-size:12px;color:#222">
                  
                    <?php
                        
                        if (isset($_POST['registerBtn'])) {
                            
                            $array = array("personname"     => trim($_POST['personname']),
                                           "mobileno"       => trim($_POST['mobileno']),
                                           "emailid"        => trim($_POST['emailid']),
                                           "cityname"       => trim($_POST['cityname']),
                                           "dateofregister" => date("Y-m-d H:i:s"));
                                           
                            if ( (strlen(trim($_POST['personname']))>0) && (strlen(trim($_POST['mobileno']))>0) && (strlen(trim($_POST['emailid']))>0) && (strlen(trim($_POST['cityname']))>0)  ) {
                                $c = $mysql->select("select * from  _pjusertable where emailid='".trim($_POST['emailid'])."' or mobileno='".trim($_POST['mobileno'])."'");
                                if (sizeof($c)==0) {
                                    $userid = $mysql->insert("_pjusertable",$array);
                                    echo "<div style='border-radius:5px;background:#FFFEF7;border:1px solid #EBBE01;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>Registration Completed.</div>";    
                                } else {
                                    echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>You have already registered.</div>";
                                }
                            } else {
                                echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>All Fields are required. </div>";
                            }
                            
                        }   
                    ?>
                <form action="" method="post" target="_self">
                <table style="font-family: arial;font-size:13px;color:#ffffff" align="center" cellpadding="5" cellspacing="5">
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Name</td>
                        <td><input type="text" style="border:1px solid #d5d5d5" name="personname" value="<?php echo ($userid>0) ? "" : $_POST['personname'];?>" id="personname"></td>
                    </tr>
                   
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Phone Number</td>
                        <td><input type="text" name="mobileno" id="mobileno"  value="<?php echo ($userid>0) ? "" : $_POST['mobileno'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>    
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Email ID</td>
                        <td><input type="text" name="emailid" id="emailid"  value="<?php echo ($userid>0) ? "" : $_POST['emailid'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>      
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">City Name</td>
                        <td><input type="text"  name="cityname" id="cityname"  value="<?php echo ($userid>0) ? "" : $_POST['cityname'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>
                   
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="Register" name="registerBtn" style="border:none;padding:5px;background:#FC6C05;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;"></td>
                    </tr>
                </table>
                </form>
        
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table cellpadding="0" cellspacing="0">
    <tr>
        <td><img src="images/list_0.png" width="250"></td>
        <td><img src="images/list_1.png" width="250"></td>
        <td><img src="images/list_2.png" width="250"></td>
        <td><img src="images/list_3.png" width="250"></td>
    </tr>   
    </table>
    </td>
    </tr>
</table>
<script>getMenuItems('freeparttimejob');</script>  
<div style="font-family:arial;font-size:13px;line-height:25px;text-align:justify;margin:10px;">             

<h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);" id="yui_3_13_0_1_1384247625179_18712">WHAT IS THE JOB? HOW DO I GET PAID?</h3>

In this Program your job is very simple, just you need to post free ads in different classifieds, blogs, forums and directories. Internet users, who read your Advertisement, will visit your website / Member link and register for this Program. You will receive the Payment every 7 days according to the payment method you choose.


<h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);" id="yui_3_13_0_1_1384247625179_18712">HOW TO POST FREE ADS?</h3>

    <ol id="yui_3_13_0_1_1384247625179_18677"><li id="yui_3_13_0_1_1384247625179_18710">Open any one Classified Website from the Lists of classified websites file given to you in your starter kit</li><li id="yui_3_13_0_1_1384247625179_18711">Now register Free with the Classified Website as an Ad Poster. 
(Note: Some websites may not ask you to register, if so you can directly
 start posting the ads)</li><li>After registering Login to your account and click the Post Ad or Post Free Ad Section.</li><li>After clicking, you will be given the instructions by the particular Classified Website that how you have to post Ads.</li>
<li>Select the appropriate category (Like Business Opportunities, Employment, Jobs, Work from Home, Part-Time Jobs etc.)</li><li id="yui_3_13_0_1_1384247625179_18683">Then you have to fill the Title, Description and other details. 
You can fill it up by copying and pasting from the Advertisement Matter 
given to you in your member area. Write your website address and your 
email address correctly.</li><li>They may also ask about your Ad Duration/Validity. It is recommended to post your Ad for 30 Days or even more, if it is free.</li><li>After completing all these, they may ask you to upload a photo. Proceed to the next step without uploading any photo.</li>
<li>In the next Step, you may be asked to confirm and preview your Ad. Do as directed.</li><li id="yui_3_13_0_1_1384247625179_18676">After confirming the Ad, your Ad will be posted on that 
particular Website or an Activation link will be sent to your Email 
Address (You have to click on the Activation Link to complete Posting 
your Ad)</li><li id="yui_3_13_0_1_1384247625179_18724">In this way, Post at least 3-4 Ads in a Particular website. If 
they don't allow you to post more than 1 Ad in a Particular Website then
 proceed to the next Website.</li><li>Here your work is completed.</li></ol>

<h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);">HOW DO I KNOW IF SOMEONE REGISTER FROM MY MEMBER LINK / WEBSITE?</h3>
    <ol id="yui_3_13_0_1_1384247625179_18728"><li id="yui_3_13_0_1_1384247625179_18727">Internet users who read your Advertisement, will visit the 
website, (You can check the website visitors in your member area) If you
 wish you can send Emails to those customers along with your 
“Registration details� (you can download from the member area).</li><li>After paying the fees, they will submit their payment details to
 us. (As soon as their payment is confirmed your Account will be 
credited immediately. You can check the registered users by clicking 
“Incentives� option in the member area)</li></ol>


<h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);" id="yui_3_13_0_1_1384247625179_18678">IMPORTANT TIPS WHILE WORKING:</h3>
  <ol id="yui_3_13_0_1_1384247625179_18680"><li>Post Ads on Websites with Good Visitors Traffic.</li><li id="yui_3_13_0_1_1384247625179_18725">Post Ads on Classified Websites, Job Forums, Blogs, Social Networking Sites etc.</li><li>Remember that there is no Ad Posting Limitation. The more Ads 
you Post, the more you earn. In this way, there is no Earning 
Limitation. You can even earn Lakhs of Rupees in a single month.</li><li id="yui_3_13_0_1_1384247625179_18682">If you finish posting Ads in all websites then start searching 
for more Classified Websites, Forums &amp; Blogs on Search Engines like 
Google, Yahoo, MSN, Altavista etc.,</li><li id="yui_3_13_0_1_1384247625179_18679">Always try to put Different Ad Matters during posting Ads. Do 
not post same Ads again and again as it doesn’t put good impression on 
the Reader.</li><li>While Posting ads if you wish you can also use own words. But remember that don't change the concept of this Program.</li><li>Try to post good Headers/Titles.</li><li>It may take 5-10 days to start getting response for the Ad. Do 
not wait for getting response. Continue posting Ads in other Websites.</li><li>Always be positive about your work.</li><li>If you get any reply from your ads, you just advice them to visit your website and join our Program.</li>
<li id="yui_3_13_0_1_1384247625179_18726">If you wish you can show the Payment proofs that you will 
receive from <a href="http://dealmaass.com" target="_blank" rel="nofollow">dealmaass.com</a> to the customers. This may get you more 
Registrations.</li></ol>       <div id="yui_3_13_0_1_1384247625179_18681">                        
              
              
             
Join Now
<h2 style="text-align:left;font-family:arial;">Your Opportunity</h2>  
       
Becoming financially independent means controlling your own destiny - it
 makes almost anything you want in life possible. If your job or career 
isn't taking you where you want to go, Forever Living Products offers a 
great opportunity to change your course<br><br>
What's more important than earning more money? Time. More specifically, 
time to do the things you enjoy most with family and friends. The effort
 you put into your FLP(Forever Living Products) business.<br><br>
Now will be returned many times over as the sales from your team of 
distributors help provide you with the time and income to live the kind 
of life you want. Forever Living has all the tools you need to succeed:<br><br>
<h2 style="text-align:left;font-family:arial;">Online Part Time Jobs   </h2>         
<div style="font-weight:bold;font-style:italic;">
    Do you dream about Earning Money Online?<br>  
    Are you Searching for a Legitimate Work at Home Opportunity?<br>
    Yes! You had found it<br><br> 
</div>
Are you looking for Online Jobs, Part Time Jobs, Internet Jobs, Data 
Entry Jobs, Earn money online, work at home Jobs. Don't worry, Your 
search ended here. We challenge you that you can fulfill all your dreams
 in your life. No Skills necessary. You are the own boss so you can sit 
comfortably at your home and work at your part time. Even if you don't 
own a computer or Internet connection you can work from any Cyber Cafe. 
  
<h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);">HOW IT WORKS</h3></div>
In this Program your job is very simple, just you have to post free ads 
in different classifieds, blogs, forums and directories. We will provide
 you a Website / Member Link and Private Member area .You can collect 
all the details about how to place your ads, list of websites to place 
your ads, admatters and tools to increase your earnings in the Members 
area. You can also check your A/C balance Instantly in the Members area 
and Analyze your Earning, Payment history and Reports. You are the own 
boss so you can sit comfortably at your home. Just turn your free time 
in to money, Even if you don't own a computer or Internet connection you
 can work from any Cyber Cafe. You can post as many ads you want. There 
is no limitation for your earning. No matter you Reside anywhere in the 
world your Payments are 100% guarantee. if u post 100 ads 1 ad give 1 
registration u will earn 150 per day.As soon as your Account reaches 
Rs.1000/- or$20 We will be paid.
</div>