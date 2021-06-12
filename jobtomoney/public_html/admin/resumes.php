


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


<h5 style="text-align: left;font-family: arial;">Resumes</h5> 
<div style="text-align: right;">
    <a href="paidresumes" style="text-decoration: none;">Paid</a><!--&nbsp;&nbsp;|&nbsp;&nbsp; 
    <a href="resumes" style="text-decoration: underline;font-size:bold">Unpaid</a>--> 
</div>
<br><br>
<?php // $data = $mysql->select("select * from _clients where isblock=-1 and isactive=0 order by id desc"); ?>
  <?php
   $data = $mysql->select("select * from _full_time_job_resume where Paid='0'");

?>

<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">Applicant Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80"  style="border:1px solid #ccc;">Phone No</td>
        <td width="120" colspan="2"  style="border:1px solid #ccc;">Registered on</td>
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['ResumeName']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['EmailID']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['MobileNumber'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['CreatedOn']));?></td>
              <td style="padding-top:12px;border-bottom:1px solid #ccc;text-align: center"><form action="viewresume" method="post"><input type="hidden" value="<?php echo $d['ResumeID'];?>" name="resumeid"><input type="submit"  class="btn btn-success btn-sm" value="..." ></form></td>
        </tr>
    <?php } ?>
</table>

</div>
</div>
               </div>
              

   
    </div>
</div>

  