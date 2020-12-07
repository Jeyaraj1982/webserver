<div class="line">
<div class="margin">
 <div class="s-12 m-6 l-3 margin-bottom">
      <div class="box">
        <?php
            include_once("rightmenu.php");
        ?>
      </div>
   </div>
   <div class="s-12 m-6 l-9 margin-bottom">                                                   
      <div class="box">
        <h5 style="text-align: left;font-family: arial;">View Resume</h5> 
        <div style="border-bottom:1px solid #D4E3F6;"></div><br> 
        <?php $data = $mysql->select("select * from _full_time_job_resume where ResumeID=".$_POST['resumeid']); ?>     

        <div style="border-bottom:1px solid #D4E3F6;"></div><br>
            <table cellpadding='5' cellspacing='5' style='font-size:12px;' width="100%">
                <tr><td width="100">Applicant Name </td><td>: <?php echo $data[0]['ResumeName'];?> </td></tr>
                <tr><td>Email Id</td><td>: <?php echo $data[0]['EmailID']; ?></td></tr>
                <tr><td>Sex</td><td>: <?php echo $data[0]['Gender']; ?></td></tr>
                <tr><td>City</td><td>: <?php echo $data[0]['City']; ?></td></tr>
                <tr><td>Country</td><td>: <?php echo $data[0]['Country']; ?></td></tr>
                <tr><td>State</td><td>: <?php echo $data[0]['State']; ?></td></tr>
                <tr><td>District</td><td>: <?php echo $data[0]['District']; ?></td></tr>
                <tr><td>Mobile Number</td><td>: <?php echo $data[0]['MobileNumber']; ?></td></tr>
                <tr><td>Password</td><td>: <?php echo $data[0]['Password']; ?></td></tr>
                <tr><td>Expectations</td><td>: <?php echo $data[0]['Expectations']; ?></td></tr>
                <tr><td>Resume</td><td>: <?php echo $data[0]['Resume']; ?>&nbsp;<a href="https://www.kasupanamthuttu.com/resume_download.php?file=<?php echo $data[0]['Resume']; ?>"><img src="../assets/download.png"></a></td></tr>
            </table>
        </div>
      </div>
   </div>
 </div>

 