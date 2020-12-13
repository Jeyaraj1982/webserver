<?php
    session_start();
    
    if (isset($_REQUEST['logout'])) {
      $_SESSION['USER']=0;
            
    }
    
    if (isset($_POST['submit'])) {
        if ( ($_POST['username']=="dmadmin") && ($_POST['password']=="9876543210") ) {
            $_SESSION['USER']=2;
        }  else {
            $msg = "Invalid Login Details";
        }
    }
    if (isset($_SESSION['USER']) && $_SESSION['USER']==2) {
?>

<style>
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\02795';
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2796";
}

div.panel {
    padding: 5px 15px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.6s ease-in-out;
    opacity: 0;
    line-height: 20px;
}

div.panel.show {
    opacity: 1;
    max-height: 500px;  
}
</style>

<table cellpadding="0" cellspacing="0" width="100%" style="font-size:12px;font-family:arial;">      
    <tr>
        <td width="190" valign="top">
            
            <button class="accordion">Time Based Auction</button>
            <div class="panel">
                <a href='timebased_new.php?list=India' target="rightW" style="color:green;font-weight:bold;">Add Indian Products</a><Br>
                <a href='timebased_new.php?list=Malaysia' target="rightW" style="color:green;font-weight:bold;">Add Malaysian Products</a> 
                <a href='timebasedAuction.php?list=India' target="rightW" style="color:blue;font-weight:bold;">View Indian Products</a> <Br>
                <a href='timebasedAuction.php?list=Malaysia' target="rightW" style="color:blue;font-weight:bold;">View Malaysian Products</a> <Br>
            </div>
            
            <button class="accordion">Bid Based Auction</button>
            <div class="panel">
                <a href='bidbased_new.php?list=India' target="rightW" style="color:green;font-weight:bold;">Add Indian Products</a><Br>
                <a href='bidbased_new.php?list=Malaysia' target="rightW" style="color:green;font-weight:bold;">Add Malaysian Products</a> 
                <a href='bidbasedAuction.php?list=India' target="rightW" style="color:blue;font-weight:bold;">View Indian Products</a> <Br>
                <a href='bidbasedAuction.php?list=Malaysia' target="rightW" style="color:blue;font-weight:bold;">View Malaysian Products</a> <Br>
            </div>
            
               <button class="accordion">Match and Win</button>
            <div class="panel">
                <a href='bookandwin_new.php?list=India' target="rightW" style="color:green;font-weight:bold;">Add Indian Products</a><Br>
                <a href='bookandwin_new.php?list=Malaysia' target="rightW" style="color:green;font-weight:bold;">Add Malaysian Products</a> 
                <a href='bookandwin.php?list=India' target="rightW" style="color:blue;font-weight:bold;">View Indian Products</a> <Br>
                <a href='bookandwin.php?list=Malaysia' target="rightW" style="color:blue;font-weight:bold;">View Malaysian Products</a> <Br>
            </div>


 

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>
               <br><Br><Br>
            <hr>
              
                 
               <a href='testimonials.php' target="rightW" style="color:#444">Testimonials</a> [&nbsp;&nbsp;<a href='testimonials_new.php' target="rightW" style="color:green;font-weight:bold;">New</a>&nbsp;&nbsp;] <br><Br>
               <a href='winners.php' target="rightW" style="color:#444">Courier Proof</a> [&nbsp;&nbsp;<a href='winners_new.php' target="rightW" style="color:green;font-weight:bold;">New</a>&nbsp;&nbsp;] <br><Br>
              <hr>
               <a href='partimeusers.php' target="rightW" style="color:#444">Part Time USers</a><br><Br>
               <a href='users.php' target="rightW" style="color:#444">.in Registered Users</a><br><Br>
               
                <hr>
                <a href='walletrequests.php' target="rightW" style="color:#444">View Wallet Request</a><br><Br>
               <a href='fundtransfer.php' target="rightW" style="color:#444">Transfer Fund</a><br><Br>
                <hr>                               
                <a href='?do=logout' target="rightW" style="color:#444">Logout</a><br><Br>
                   
        </td>
        <td>
            <iframe width="100%" name='rightW' height="1000px" style="border: 1px solid #f1f1f1;"> </iframe>
        </td>
    </tr>
</table>
<?php } else { ?>
<br><Br><br><Br><br><Br><Br><br><Br>
<form action=""  method="post">
<table align="center" cellpadding="5" cellspacing="0" style="font-size:12px;font-family:arial;">
    <tr>
        <td>User Name</td>
        <td><input type="text" name="username"></td>
    </tr>                                         
    <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
    </tr> 
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Login"></td>
    </tr>
    <?php if (isset($msg)) {?>
    <tr>
        <td></td>
        <td style="color:red"><?php echo $msg; ?></td>
    </tr>    
    <?php } ?>
</table>
 </form>
<?php } ?>