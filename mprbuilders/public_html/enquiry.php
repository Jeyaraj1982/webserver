 <?php include_once("header.php");?>
    <tr>
        <td style="text-align:justify;font-size:14px;font-family:'Trebuchet MS';color:#222;line-height:20px;padding:20px">
            
            <h2>Enquiry Form</h2>
                <?php
                        if (isset($_POST['submit'])) {
                            
                            $to = "pravinraj@mprbuilders.com";
$subject = "Enquiry From MPRBUILERS.COM";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<table border=1>
<tr>
    <td>Name</td>
    <td>".$_POST['pname']."</td>
</tr>

<tr>
    <td>Mobile Number</td>
    <td>".$_POST['mobieno']."</td>
</tr>


<tr>
    <td>E-mail ID</td>
    <td>".$_POST['emailid']."</td>
</tr>


<tr>
    <td>Title</td>
    <td>".$_POST['title']."</td>
</tr>

<tr>
    <td>Details</td>
    <td>".$_POST['details']."</td>
</tr>

</table>
</body>
</html>
";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <webmaster@mprbuilders.com>' . "\r\n";


mail($to,$subject,$message,$headers);

                            echo "<div style='border-radius:5px;padding:5px;margin:5px;font-weight:bold;font-size:13px;color:green;border:1px solid green'>Your Enquiry has been sent to administrator.</div>";
                        }
                ?>
             <form action="" method="post">
             <table style="font-size:14px;font-family:'Trebuchet MS';color:#222;line-height:20px;vertical-align: top;" cellpadding="5" cellspacing="0">
                <tr>
                    <td style="width: 150px;">Name</td>
                    <td><input type="text" name="pname" placeholder="Enter Name" style="width:300px;padding:5px;"></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><input type="text" name="mobieno" placeholder="Mobile Number" style="width:300px;padding:5px;"></td>
                </tr>
                <tr>
                    <td>Email ID</td>
                    <td><input type="text" name="emailid" placeholder="Email ID" style="width:300px;padding:5px;"></td>
                </tr>                                
                 <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Enquiry Title" style="width:300px;padding:5px;"></td>
                </tr>
                 <tr>
                    <td>Details</td>
                    <td><textarea cols="30" name="details" rows="5" style="width:300px;padding:5px;"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="submit" value="Send Enquiry"></td>
                </tr>
             </table>
             </form>
        </td>
    </tr>
<?php include_once("footer.php");?>