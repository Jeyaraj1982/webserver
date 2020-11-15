<h2>Registered User Details</h2>
<?php $regdetails = $mysql->select("select * from register where RegID=".$_REQUEST['id']); ?>
<br>
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:120px;border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;width:450px">Applicant Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantName'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Email</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantEmail'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Phone Number</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantMobile'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Address</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantAddress'];?></td>
    </tr>  
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Name of the Parent/Guardian</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantParentName'];?></td>
    </tr>  
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Parent's Mobile number</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantParentMobile'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Date of Birth</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['DateofBirth'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Age</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php if(strlen($regdetails[0]['Age']>0)) { echo $regdetails[0]['Age']. "&nbsp; Years"; }?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Gender</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['Gender'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Name of the School/Institution Last Studied</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['ApplicantInstitution'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Course Completed</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['CourseCompleted'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Course Willing to Learn</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['courseToSelect'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Are you are a sports player/Athlete represented in District/State/National/International level</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['SportsPlayer'];?></td>
    </tr>
    <?php if($regdetails[0]['SportsPlayer']=="Yes"){ ?>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">If yes kindly note the details and attach a copy of the certificate to avail Sports scholarship</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['SportsFile'];?>&nbsp;<a href="http://nmskamarajpolytechnic.com/download.php?file=<?php echo $regdetails[0]['SportsFile']; ?>"><img src="../images/download.png"></a></td>
    </tr>
    <?php } ?>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Community</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['Community'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Created On</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $regdetails[0]['CreatedOn'];?></td>
    </tr>   
</table>
<br><Br>
<a href="dashboard.php?action=registeredenquiry">Back</a>