<?php 
    include_once('config.php'); 
    include_once('header.php');
    ?>  
 
                               
                <?php
                        if (isset($_POST['isadd'])) {
                            
                            $to = "pravinraj@mprbuilders.com";
                          //  $to = "projects@j2jsoftwaresolutions.com";
$subject = "Employers From MPRSECURITYSERVICES.COM";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<table border=1>
<tr>
    <td>Name</td>
    <td>".$_POST['name']."</td>
</tr>

<tr>
    <td>Company Name</td>
    <td>".$_POST['companyname']."</td>
</tr>


<tr>
    <td>Address</td>
    <td>".$_POST['address']."</td>
</tr>


<tr>
    <td>Telephone No</td>
    <td>".$_POST['telephoneno']."</td>
</tr>

<tr>
    <td>Fax</td>
    <td>".$_POST['fax']."</td>
</tr>
<tr>
    <td>Email ID</td>
    <td>".$_POST['emailid']."</td>
</tr>

<tr>
    <td>Website</td>
    <td>".$_POST['website']."</td>
</tr>
<tr>
    <td>Requirements</td>
    <td>".$_POST['requirements']."</td>
</tr>

</table>
</body>
</html>
";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <webmaster@mprsecurityservices.com>' . "\r\n";


mail($to,$subject,$message,$headers);

                            echo "<div style='border-radius:5px;padding:5px;margin:5px;font-weight:bold;font-size:13px;color:green;border:1px solid green'>Your Enquiry has been sent to administrator.</div>";
                        }
  ?>              
 <form action="" method="post" name="employerfrm" id="employerfrm">
 <input type="hidden" name="isadd" value="1">
<table  cellspacing="0" cellpadding="5" style="font-family:Trebuchet Ms;">
    <tr>
        <td  style="font-size:22px;font-weight:bold;">Employers Form</td>
    </tr>                                                                                                                   
    <tr>
       <td  style="font-size:13px;color:#222">Name*</td>
       <td>:</td>
       <td>
          <input type="text" autocomplete="off" placeholder="Enter Your Name" name="name" id="name" style="width:200px;">
          &nbsp;<span id="_name" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
       </td>
    </tr>
    <tr>
        <td  style="font-size:13px;color:#222">Company Name</td>
       <td>:</td>
        <td>
            <input type="text" autocomplete="off" placeholder="Enter Company Name" name="companyname" id="companyname" style="width:200px;">
            &nbsp;<span id="_companyname" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
        </td>
    </tr>
    <tr>
       <td  style="font-size:13px;color:#222">Address</td>
       <td>:</td>
       <td>
           <textarea style="width:200px;" name="address" id="address"></textarea>
           &nbsp;<span id="_address" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
       </td>
    </tr>
    <tr>
        <td style="font-size:13px;color:#222">Telephone No *</td>
        <td>:</td>
        <td>
            <input type="text" autocomplete="off" placeholder="Enter Telephone No" name="telephoneno" id="telephoneno" style="width:200px;">
            &nbsp;<span id="_telephoneno" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
        </td>
    </tr>
    <tr>
       <td  style="font-size:13px;color:#222">Fax  </td>
       <td>:</td>
        <td>
           <input type="text" autocomplete="off" placeholder="Enter Fax No" name="fax" id="fax" style="width:200px;">
           &nbsp;<span id="_fax" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
       </td>
    </tr>
    <tr>
       <td  style="font-size:13px;color:#222">E-mail ID * </td>
       <td>:</td>
       <td>
           <input type="text" autocomplete="off" placeholder="Enter Email ID" name="emailid" id="emailid" style="width:200px;">
           &nbsp;<span id="_emailid" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
       </td>
    </tr>
    <tr>
        <td  style="font-size:13px;color:#222">Website</td>
       <td>:</td>
        <td>
           <input type="text" autocomplete="off" placeholder="Enter Your Website" name="website" id="website" style="width:200px;">
           &nbsp;<span id="_website" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
        </td>
    </tr>
    <tr>
       <td  style="font-size:13px;color:#222">Requirements<br>
       <b style="font-size:13px;font-weight:normal;color:#222">( kindly post your requirement and one of our recruitment officers<br>
        will contact you shortly )</b></td>
        <td>:</td>
        <td>
            <textarea style="width:200px;height:80px;" name="requirements" id="requirements"></textarea>
            &nbsp;<span id="_requirements" class="_error" style="font-size:10px;color:red;">&nbsp;</span>  
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
       <td>
            <input type="button" value=" Send "  onclick="doemployers()">
            <input type="reset" value=" Reset ">
          
       </td>
    </tr>
</table>
</form>
<script>
      function doemployers() {
                        var name = $('#name').val();
                        var companyname = $('#companyname').val();
                        var address = $('#address').val();
                        var telephoneno = $('#telephoneno').val();
                        var fax =$ ('#fax').val();
                        var emailid = $ ('#emailid').val();
                        var website = $('#website').val();
                        var requirements = $('#requirements').val();
                        var isTrue = 0;
                                  if (name.length<4)  {
                                $('#_name').html( "Please enter your valid name"); 
                                isTrue++;
                                } else {
                                 $('#_name').html("&nbsp;"); 
                                  }  
                                  if (companyname.length<4)  {
                                $('#_companyname').html( "Please enter your valid companyname"); 
                                isTrue++;
                                } else {
                                 $('#_companyname').html("&nbsp;"); 
                                  }
                                  if (address.length<4)  {
                                $('#_address').html( "Please enter your valid address"); 
                                isTrue++;
                                } else {
                                 $('#_address').html("&nbsp;"); 
                                  }
                                  if (telephoneno.length<4)  {
                                $('#_telephoneno').html( "Please enter your valid telephoneno"); 
                                isTrue++;
                                } else {
                                 $('#_telephoneno').html("&nbsp;"); 
                                  }
                                  if (fax.length<4)  {
                                $('#_fax').html( "Please enter your valid fax"); 
                                isTrue++;
                                } else {
                                 $('#_fax').html("&nbsp;"); 
                                  }  
                                  if (emailid.length<4)  {
                                $('#_emailid').html( "Please enter your valid emailid"); 
                                isTrue++;
                                } else {
                                 $('#_emailid').html("&nbsp;"); 
                                  }
                                  if (website.length<4)  {
                                $('#_website').html( "Please enter your valid website"); 
                                isTrue++;
                                } else {
                                 $('#_website').html("&nbsp;"); 
                                  }
                                  if (requirements.length<4)  {
                                $('#_requirements').html( "Please enter your valid requirements"); 
                                isTrue++;
                                } else {
                                 $('#_requirements').html("&nbsp;"); 
                                  }
                                   if (isTrue==0){
                                   $('#employerfrm').submit();
                                    }
                        }

</script>
<?php include_once('footer.php'); ?>













