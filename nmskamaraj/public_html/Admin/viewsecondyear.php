<?php include_once("header.php");?>
<?php include_once("LeftMenu.php");
$data = $mysql->select("select * from admission_secondyear where AdmissionID='".$_GET['id']."'");
?>
<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Second Year</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Application Forms</a>
							</li>                                                                 
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Second Year</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12" style="background: white;">
							<div class="card">
								<div class="card-body">
								    <section class="kamaraj-contact-field" style="background: #444;">
                                        <div class="container">
                                            <div class="row" >
                                                <div class="col-md-12"  style="background: white;">
                                                    <div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                    <form action="" method="POST" id="SecondYearForm">
                                                        <input type="hidden" name="ApproveRemarks" id="ApproveRemarks">
                                                        <input type="hidden" name="RejectRemarks" id="RejectRemarks">
                                                        <input type="hidden" name="WeightingRemarks" id="WeightingRemarks">
                                                        <input type="hidden" name="AdmissionID" id="AdmissionID" value="<?php echo $data[0]['AdmissionID'];?>">
                                                        <input type="hidden" name="EmailID" id="EmailID" value="<?php echo $data[0]['EmailID'];?>">
                                                        <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                                                           <tr>
                                                            <td colspan="3" style="padding-bottom:10px;">
                                                            <div>
                                                                <div style="width:100px;float:left">
                                                                    <img style="width:100px" src="https://www.nmskamarajpolytechnic.com/images/nms_logo.png">
                                                                </div>
                                                                <div style="float:left;padding:0px 5px;">
                                                                    <div style="font-size:16px;font-weight:bold;text-align:center;color:#222">Nadar Mahajana Sangam</div>
                                                                    <div style="font-size:32px;font-weight:bold;text-align:center;padding:5px;color:#222;font-family:arial">KAMARAJ POLYTECHNIC COLLEGE</div>
                                                                    <div style="font-size:16px;font-weight:bold;text-align:center;color:#222">Pazhavilai, Kanyakumari District - 629 501</div>
                                                                    <div style="font-size:14px;font-weight:bold;text-align:center;color:#222">Phone No : 04652-253900, Email: kamarajpolytechniccollege@gmail.com, nmskptc_2003@yahoo.co.in</div>
                                                                </div>
                                                            </div>
                                                            </td>
                                                           </tr>
                                                        
                                                        <tr>
                                                            
                                                            <td colspan="3">
                                                                <div style="background:#4a634d;color:#fff;padding:10px;text-align:center;font-weight:bold;font-size:18px;letter-spacing:1.2px;">
                                                                    APPLICATION FOR ADMISSION TO SECOND YEAR DIPLOMA COURSES - 2020-21
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">&nbsp;</td>
                                                        </tr> 
                                                        <tr>
                                                            <td colspan="3">
                                                                <div style="float:right;border: 1px solid black;background: #fff;padding:5px;width:130px;height:170px;text-align:center">
                                                                    <div id="div_1">
                                                                        <img id="src_image1" src="http://nmskamarajpolytechnic.com/uploads/<?php echo $data[0]['filepath1'];?>" style="width:100%;height:158px;cursor: pointer;">
                                                                    </div> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <td colspan="3">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 5px;text-align:left;width:30px">&nbsp;</td>
                                                            <td>Select Course</td>
                                                            <td><input type="text" value="<?php echo $data[0]['FirstCourse'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 5px;text-align:left;width:30px">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td><input type="text" value="<?php echo $data[0]['SecondCourse'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">1.</td>
                                                            <td>Hr.&nbsp;&nbsp;Sec.&nbsp;&nbsp;Academic/Vocational/ITI Total Marks</td>
                                                            <td><input type="text" value="<?php echo $data[0]['PreviousTotalMarks'];?>" readonly="readonly" style="line-height:normal;padding-right:10px;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 80px"> / 600 Maximum
                                                                <div id="ErrPreviousTotalMarks" class="errorstring"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px">2.</td>
                                                            <td>(A) Name of the Candidate (In Block Letters)</td>
                                                            <td>
                                                                <input type="text" value="<?php echo $data[0]['CandidiateName'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                          <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                                            <td>(B) Name of the Parent / Guardian</td>
                                                            <td>
                                                                <input type="text" value="<?php echo $data[0]['ParentName'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                         <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                                            <td>(C) Address for Communication</td>
                                                            <td>
                                                                <input  value="<?php echo $data[0]['Address1'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;" type="text">
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px"> &nbsp;</td>
                                                            <td> </td>
                                                            <td><input  value="<?php echo $data[0]['Address2'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;" type="text"></td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                                            <td> </td>
                                                            <td><input  value="<?php echo $data[0]['Address3'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;" type="text"></td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                                            <td> </td>
                                                            <td><input  value="<?php echo $data[0]['Address4'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 50%;" type="text"> 
                                                             &nbsp;&nbsp;&nbsp;&nbsp;PIN Code&nbsp;&nbsp;&nbsp;<input type="text"  value="<?php echo $data[0]['Pincode'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:101px"></td>
                                                        </tr>
                                                         <tr>
                                                         <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                                            <td>Adhar Number</td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['AadhaarNumber'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td style="padding:5px;text-align:left;width:30px"> </td>
                                                            <td>Father's Mobile Number</td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['FathersMobile'];?>" readonly="readonly" maxlength="10" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                                            <td>Mother's Mobile Number</td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['MothersMobile'];?>" readonly="readonly" maxlength="10" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>                                                                                                                     
                                                        <tr>
                                                        <td style="padding:5px;text-align:left;width:30px">3. </td>
                                                            <td>Nationality</td>                                                                                                                                                                                                                            
                                                            <td><input type="text"  value="<?php echo $data[0]['Nationality'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                            <?php if($data[0]['Nationality']=="Others"){?> <input type="text" value="<?php echo $data[0]['AdditionalNationality'];?>" readonly="readonly"  style="width:45%;float:right;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"><?php } ?>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                         <td style="padding:5px;text-align:left;width:30px">4. </td>
                                                            <td>Native District</td>
                                                            <td>
                                                                <input type="text" value="<?php echo $data[0]['NativeDistrict'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                                <div id="ErrNativeDistrict" class="errorstring"></div> 
                                                            </td>
                                                        </tr>
                                                         <tr style="padding:5px">
                                                         <td style="padding:5px;;text-align:left;width:30px">5. </td>
                                                            <td>Place of Birth</td>
                                                            <td>
                                                                <input type="text" value="<?php echo $data[0]['PlaceofBirth'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                         <td style="padding:5px;text-align:left;width:30px">6. </td>
                                                            <td>Mother Tongue</td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['Mothertongue'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"> 
                                                                <?php if($data[0]['Mothertongue']=="Others"){?><input type="text"  value="<?php echo $data[0]['AdditionalMothertongue'];?>" readonly="readonly" style="width:45%;float:right;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"><?php } ?>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                         <td style="padding:5px;text-align:left;width:30px"> 7. </td>                                                                                                        
                                                            <td>Sex</td>
                                                            <td><input type="text" value="<?php echo $data[0]['Gender'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"></td>
                                                        </tr>
                                                         <tr>
                                                         <td style="padding:5px;text-align:left;width:30px;vertical-align: top;padding-top: 0px;line-height: 17px;">8. </td>
                                                            <td style="line-height: 17px;">Date of Birth (Christian era)<br><span style="font-size:12px"> as found in SSLC or its equivalent certificate</span></td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['DateofBirth'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">9. </td>
                                                            <td>(a). Religion</td>
                                                            <td> 
                                                                <input type="text"  value="<?php echo $data[0]['Religion'];?>" readonly="readonly"style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                <?php if($data[0]['Religion']=="Others"){ ?><input type="text" value="<?php echo $data[0]['OtherReligion'];?>" readonly="readonly" style="width:45%;float:right;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"> <?php } ?>
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td>(b). Name of the community</td>
                                                            <td><input type="text" value="<?php echo $data[0]['Community'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"></td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td>(c). Caste</td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['Caste'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td>(d). Sl.No. of the Community Certificate </td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['CommunityCertificateNo'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td style="line-height: 17px;">(e). Designation of the Officer <br>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:12px">Who issued the Community Certificate</span></td>
                                                            <td><input type="text"  value="<?php echo $data[0]['DesignationofTheOfficer'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"></td>
                                                        </tr>
                                                          <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td>(f). Name of the Revenue Division / Taluk</td>
                                                            <td>
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td style="width: 50%;text-align:center">Division </td>
                                                                        <td width="10%"></td>
                                                                        <td style="text-align: center;">Taluk</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="text"  value="<?php echo $data[0]['DivisionName'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;"></td>
                                                                        <td></td>
                                                                        <td><input type="text"  value="<?php echo $data[0]['TalukName'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">10.</td>
                                                            <td>(a). Examination Passed </td>
                                                            <td>
                                                                <input type="text"  value="<?php echo $data[0]['ExaminationPassed'];?>" readonly="readonly" style="width:50%;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td colspan="2">(b). Marks obtained in SSLC / Equivalent Examination: (False information will lead to cancellation and Criminal Action) </td>
                                                        </tr>
                                                        <tr style="vertical-align: top;">
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td colspan="2">
                                                            <?php if($data[0]['ExaminationPassed']=="HSC Academic"){?>
                                                                <div id="hsc_acadamic" >
                                                                <table style="width: 100%;border:1px solid black"> 
                                                                    <tr>
                                                                        <td colspan="3" style="text-align:center;border-bottom:1px solid black">HSC (Academic) Marks</td>
                                                                    </tr>    
                                                                    <tr>                              
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">Subject</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">Marks Obtained</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">Maximum Marks</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Part I Tamil or Language</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscAcademicTamil'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">                          
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Part II English</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscAcademicEnglish'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">
                                                                            Part III : Mathematics
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscAcademicMaths'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>            
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 1px solid black;border-bottom: 1px solid black;padding-left: 10px;">
                                                                              Physics
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscAcademicPhysics'];?>" readonly="readonly"  style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 1px solid black;border-bottom:1px solid black;padding-left: 10px;">
                                                                           Chemistry
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right:1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscAcademicChemistry'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 1px solid black;border-bottom:1px solid black;padding-left: 10px;">
                                                                             Elective &nbsp;<input type="text" value="<?php echo $data[0]['ElectiveSubject'];?>" readonly="readonly" name="ElectiveSubject" id="ElectiveSubject" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:30px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right:1px solid black">
                                                                            <input type="text" value="<?php echo $data[0]['HscAcademicElective'];?>" readonly="readonly"  style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                            </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 1px solid black;padding-left: 10px;">
                                                                            Total                                   
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right:1px solid black">
                                                                            <input type="text" readonly="readonly" value="<?php echo $data[0]['HscAcademicTotal'];?>" name="HscAcademicTotal" id="HscAcademicTotal"   style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;font-weight:bold"></td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">600</td>
                                                                    </tr>
                                                                </table>
                                                                </div>
                                                            <?php } if($data[0]['ExaminationPassed']=="HSC Vocational"){ ?>
                                                                <div id="hsc_vocational" >
                                                                <table style="width: 100%;border:1px solid black"> 
                                                                    <tr>
                                                                        <td colspan="3" style="text-align:center;border-bottom:1px solid black">HSC (Vocational) Marks</td>
                                                                    </tr>    
                                                                    <tr>                              
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">Subject</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">Marks Obtained</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">Maximum Marks</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Part I Tamil or Language</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscVocationalTamil'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Part II English</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscVocationalEnglish'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>                 
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">
                                                                            Part III : Mathematics
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscVocationalMaths'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>    
                                                                        <td colspan="3" style="border-bottom:1px solid black;">
                                                                            <table>
                                                                                <tr>
                                                                                    <td style="padding-left: 10px;">Name of the Vocational Course</td>
                                                                                    <td><input type="text" name="VocationalCourseName" readonly="readonly"  value="<?php echo $data[0]['VocationalCourseName'];?>" id="VocationalCourseName" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Theory</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscVocationalTheory'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Practical I</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscVocationalPractical1'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>   
                                                                        <td style="border-bottom:1px solid black;border-right: 1px solid black;padding-left: 10px;">Practical II</td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right: 1px solid black;">
                                                                            <input type="text" value="<?php echo $data[0]['HscVocationalPractical2'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:10px;">    
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-right: 1px solid black;padding-left: 10px;">
                                                                            Total
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black;border-right:1px solid black">
                                                                            <input type="text" readonly="readonly" value="<?php echo $data[0]['HscVocationalTotal'];?>" name="HscVocationalTotal" id="HscVocationalTotal" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;font-weight:bold">
                                                                        </td>
                                                                        <td style="text-align:center;border-bottom:1px solid black">600</td>
                                                                    </tr>
                                                                </table>
                                                                </div>
                                                            <?php } ?>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td colspan="2">(Incase of CBSC, the marks obtained may be entered accordingly, If the certificate is found to be bogus is will lead to cancellation of admission at any stage of study criminal action being taken)</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">11.</td>
                                                            <td colspan="2">Details of Studies :</td>    
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td colspan="2">
                                                                <table class="table-bordered" style="width:100%">
                                                                    <tr>
                                                                        <td style="text-align: center;width: 50px;">Sl.No.</td>
                                                                        <td style="text-align: center;width:65px;">Class</td>
                                                                        <td style="text-align: center;width:170px">Month and Year of Passing</td>
                                                                        <td style="text-align: center;">Name of the Institution and Address</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center;">1</td>
                                                                        <td style="text-align: center;">IX Std.</td>
                                                                        <td style="text-align: center;">
                                                                            <input type="text" value="<?php echo $data[0]['HSCPassMonth'];?>" readonly="readonly" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                            <input type="text" value="<?php echo $data[0]['HSCPassYear'];?>" readonly="readonly" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                        <td style="text-align: center;"><input type="text" value="<?php echo $data[0]['HSCInstitute'];?>" readonly="readonly"  style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:95%"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center;">2</td>
                                                                        <td style="text-align: center;">X Std.</td>
                                                                        <td style="text-align: center;">
                                                                            <input type="text" value="<?php echo $data[0]['SSLCPassMonth'];?>" readonly="readonly" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                            <input type="text" value="<?php echo $data[0]['SSLCPassYear'];?>" readonly="readonly"style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                        </td>
                                                                        <td style="text-align: center;"><input type="text" value="<?php echo $data[0]['SSLCInstitute'];?>" readonly="readonly"  style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:95%"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center;">3</td>
                                                                        <td style="text-align: center;">HSC/Equivalent.</td>
                                                                        <td style="text-align: center;">
                                                                            <input type="text" value="<?php echo $data[0]['HSCOREquivalentPassMonth'];?>" readonly="readonly" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                            <input type="text" value="<?php echo $data[0]['HSCOREquivalentPassYear'];?>" readonly="readonly" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                                        </td>
                                                                        <td style="text-align: center;"><input type="text" value="<?php echo $data[0]['HSCOREquivalentInstitute'];?>" readonly="readonly"  style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:95%"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>                                                                                                                                                                                                                                                                    
                                                        </tr>
                                                        <tr>
                                                         <td style="padding:5px;text-align:left;width:30px"> 12. </td>                                                                                                         
                                                            <td colspan="2">Certificate Attachment (Optional) &nbsp;&nbsp;                                                 
                                                               <span id="div_certificate" style="padding: 4px 11px 4px 11px;border:#9dc6a2;background: #fff;">
                                                               <?php  
                                                                    if(strlen($data[0]['Certificate1'])>1){ 
                                                                        echo $data[0]['Certificate1'];?>&nbsp;<a href="javascript:void(0)" onclick="viewAttacment('<?php echo $data[0]['Certificate1'];?>')">View</a>&nbsp;/&nbsp;<a href="https://nmskamarajpolytechnic.com/Admin/download.php?FileName=<?php echo $data[0]['Certificate1'];?>"><i class="fas fa-cloud-download-alt"></i></a>
                                                                  <?php  } else {
                                                                        echo "Not Attached";
                                                                    }
                                                               ?>
                                                                </span>    
                                                            </td>                                                               
                                                        </tr>                                                                                    
                                                        <tr>                                                                                          
                                                            <td colspan="3" style="text-align:center;padding-top:10px;padding-bottom: 10px;"><b>DECLARATION BY THE APPLICANT</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td colspan="2">
                                                                I&nbsp;&nbsp;<input type="text" value="<?php echo $data[0]['DeclarationName'];?>" readonly="readonly" id="DeclarationName" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none;width:230px">&nbsp;&nbsp;(Name in full) Son/Daughter of &nbsp;<input type="text" value="<?php echo $data[0]['SonorDaughterof'];?>" readonly="readonly" name="SonorDaughterof" id="SonorDaughterof" style="width:230px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none">&nbsp;
                                                                hereby solemnly declare that the information in the statements given in the application, and the enclosures are true, correct and complete.
                                                            </td>    
                                                        </tr>
                                                        <tr>                                                                     
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td colspan="2" style="width:50px">Place : &nbsp;<input type="text" readonly="readonly" value="<?php echo $data[0]['Place'];?>"style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none"><div id="ErrPlace" class="errorstring"></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td>Date :&nbsp;&nbsp;&nbsp;<input type="text" name="Date" id="Date" value="<?php echo $data[0]['CreatedOn'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none"></td>
                                                        </tr>
                                                         <tr>
                                                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                                            <td><a href="../pdf.php?formid=<?php echo $data[0]['AdmissionID'];?>&tbl=2"><i class="fas fa-cloud-download-alt"></i>&nbsp;Download</a></td>
                                                            <td style="text-align: right;">
                                                                <?php if($data[0]['Status']=="1"){ ?>
                                                                <input type="hidden" name="ApproveFrom" id="ApproveFrom" value="FirstApprove">
                                                                    <button type="button" name="Approve" id="Approve" onclick="ConfirmationforApprove()" class="btn btn-success">Approve</button>&nbsp;
                                                                    <button type="button" name="Reject" id="Reject" onclick="ConfirmationforReject()" class="btn btn-danger">Reject</button>&nbsp;
                                                                    <button type="button" name="Waiting" id="Waiting" onclick="ConfirmationforWaiting()" class="btn btn-warning">Waiting</button>
                                                                <?php }else if($data[0]['Status']=="2") {?>
                                                                    Approved (<?php echo $data[0]['ApprovedOn'];?>)<br>
                                                                    <?php echo $data[0]['ApproveRemarks'];?>
                                                                <?php } else if($data[0]['Status']=="3") {?>
                                                                <input type="hidden" name="ApproveFrom" id="ApproveFrom" value="ReApprove">
                                                                    Rejected (<?php echo $data[0]['RejectedOn'];?>) <br>
                                                                    <?php echo $data[0]['RejectRemarks'];?> <br>
                                                                    <button type="button" name="Approve" id="Approve" onclick="ConfirmationforApprove()" class="btn btn-success">Re-Approve</button>&nbsp;  
                                                                <?php }else { ?>
                                                                       Weighting (<?php echo $data[0]['RejectedOn'];?>) <br>
                                                                    <?php echo $data[0]['WeightingRemarks'];?> <br>  
                                                                    <input type="hidden" name="ApproveFrom" id="ApproveFrom" value="FirstApprove">
                                                                      <button type="button" name="Approve" id="Approve" onclick="ConfirmationforApprove()" class="btn btn-success">Approve</button>&nbsp;
                                                                      <button type="button" name="Reject" id="Reject" onclick="ConfirmationforReject()" class="btn btn-danger">Reject</button>
                                                                <?php } ?>
                                                            </td>    
                                                        </tr>
                                                        </table>                                             
                                                    </form>
                                                    </div>
                                                    <?php if($data[0]['IsPaid']!="0"){?>
                                                    <br><br><div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                        <?php $sql= $mysql->select("select * from `_tblPayments` where TblName='admission_secondyear' and `FormID`='".$_GET['id']."' order by PaymentID Desc"); 
                                                        foreach($sql as $s){ 
                                                        ?>    
                                                        <span style="font-size:16px;font-weight:bold;color:#222">Transaction Details</span>
                                                         <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                                                            <tr>
                                                                <td style="width: 100px">Txn date </td>
                                                                <td>:&nbsp;<?php echo $s['TxnDate'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Txn Amount</td>
                                                                <td>:&nbsp;<?php echo number_format($s['TxnAmount'],2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Txn Status</td>
                                                                <td>:&nbsp;<?php echo $s['TxnStatus'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Payment Mode</td>
                                                                <td>:&nbsp;<?php echo "Payment gateway";?></td>
                                                            </tr>
                                                        </table>
                                                         <br><b>Payu Summary</b><br><br>
                                                        <table border="1">
                                                         <?php
                                                       $string = $s['PaymentResponse'];
                                                       $string = str_replace('"productinfo":"','"productinfo":',$string);
                                                       $string = str_replace('"isRequired":"false"}]"','"isRequired":"false"}]',$string);
                                                       $string = str_replace('"amount_split":"','"amount_split":[',$string);
                                                       $string = str_replace('","payuMoneyId"','],"payuMoneyId"',$string);
                                                       $myArray = json_decode($string, true);
                                                     
                                                            foreach($myArray as $k=>$v) {
                                                                if ($k!="hash") {
                                                                if (strlen(trim($v))>0) {
                                                                    
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $k;?></td>
                                                                        <td>:&nbsp;<?php echo $v;?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                            }
                                                            }
                                                        ?>
                                                        </table>
                                                        <hr>
                                                        <?php }} ?>
                                                    <?php/* if($data[0]['IsPaid']=="2"){?>
                                                    <br><br><div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                        <?php $sql= $mysql->select("select * from `_tblPayments` where TblName='admission_secondyear' and `FormID`='".$_GET['id']."'"); ?>    
                                                        <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                                                            <tr>
                                                                <td colspan="2" style="font-size:16px;font-weight:bold;color:#222">Transaction Details</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Txn date </td>
                                                                <td>:&nbsp;<?php echo $sql[0]['TxnDate'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Txn Amount</td>
                                                                <td>:&nbsp;<?php echo "0.00";?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Txn Status</td>
                                                                <td>:&nbsp;<?php echo $sql[0]['TxnStatus'];?></td>           
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Payment Mode</td>
                                                                <td>:&nbsp;<?php echo "SC / ST";?></td>
                                                            </tr>
                                                        </table>
                                                    </div> 
                                                    <?php }*/ ?> 
                                                    <?php if($data[0]['IsPaid']=="0"){?>
                                                    <br><br><div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                        <?php $sql= $mysql->select("select * from `_tblPayments` where TblName='admission_secondyear' and `FormID`='".$_GET['id']."'"); ?>    
                                                        <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                                                            <tr>
                                                                <td colspan="2" style="font-size:16px;font-weight:bold;color:#222">Transaction Details</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Incomplete Transaction / may not be initialized</td>
                                                            </tr>
                                                        </table>
                                                    </div> 
                                                    <?php } ?>  
                                                </div>
                                            </div>                                                  
                                        </div>
                                    </section>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;background: #e0ffe4;border:1px solid #9dc6a2;">
         
         <div id="xconfrimation_text" style="font-size:15px;text-align:center"></div>  
      </div>
    </div>
  </div>                                                                                                          
</div>
<!-- Button trigger modal-->
<!--Modal: modalYT-->
<div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body mb-0 p-0">
                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="imgsrc" style="overflow: auto;">
                </div>
            </div>
            <div class="modal-footer justify-content-center flex-column flex-md-row">
                <div id="downloadfile">
                    
                </div>
                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Modal: modalYT-->
<script>
function viewAttacment(filename){                                                                              
  var txt = '<img src="http://nmskamarajpolytechnic.com/uploads/'+filename+'" style="margin-top: -450px;width:100%"></td>';
  var dowwnloadtxt = '<a type="button" class="btn-floating btn-sm btn-fb" href="https://nmskamarajpolytechnic.com/Admin/download.php?FileName='+filename+'">'
                +'<span>Download</span>&nbsp;&nbsp;<i class="fas fa-download"></i>'                                                     
             +'</a>';
        $('#imgsrc').html(txt);                                       
        $('#downloadfile').html(dowwnloadtxt);                                       
        $('#modalYT').modal("show");                                                                    
}
function ConfirmationforWaiting(){
    var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to add waiting list?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Remarks</td>'
                            +'<td><textarea name="Remarks" id="Remarks" placeholder="Remarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"></textarea><div id="ErrRemarks" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'                                                                 
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doWeighting()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;background:#f24395">Yes, Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function doWeighting(){
    $('#WeightingRemarks').val($('#Remarks').val());
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
  
    $("#xconfrimation_text").html(loading);
        
        $.post( "../webservice.php?action=WeighingSecondYearForm",  $( "#SecondYearForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data);                                                                   
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='assets/accessdenied.png' style='width:128px'><br>Failed.<br>"+obj.message;
                  html += '<br><button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;">Cancel</button>';
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br>";
                html += '<br><a href="viewsecondyear.php?id='+obj.id+'" class="btn btn-outline" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;color:#9dc6a2;">Continue</a></div>';
            }
            $("#xconfrimation_text").html(html);
        });
    }
function ConfirmationforApprove(){
    var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'                                                   
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to Approve?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'                                                                              
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Remarks</td>'
                            +'<td><textarea name="Remarks" id="Remarks" placeholder="Remarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"></textarea><div id="ErrRemarks" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'                                                                 
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doApprove()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;background:#f24395">Yes, Confirm to Approve</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function doApprove(){
    $('#ApproveRemarks').val($('#Remarks').val());
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
  
    $("#xconfrimation_text").html(loading);
        
        $.post( "../webservice.php?action=ApproveSecondYearForm",  $( "#SecondYearForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='assets/accessdenied.png' style='width:128px'><br>Failed.<br>"+obj.message;
                  html += '<br><button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;">Cancel</button>';
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br>";
                html += '<br><a href="viewsecondyear.php?id='+obj.id+'" class="btn btn-outline" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;color:#9dc6a2;">Continue</a></div>';
            }
            $("#xconfrimation_text").html(html);
        });
    }
function ConfirmationforReject(){
    var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to Reject?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Remarks</td>'
                            +'<td><textarea name="Remarks" id="Remarks" placeholder="Remarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"></textarea><div id="ErrRemarks" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'                                                                 
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doReject()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;background:#f24395">Yes, Confirm to Reject</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function doReject(){
    $('#RejectRemarks').val($('#Remarks').val());
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
  
    $("#xconfrimation_text").html(loading);
        
        $.post( "../webservice.php?action=RejectSecondYearForm",  $( "#SecondYearForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='assets/accessdenied.png' style='width:128px'><br>Failed.<br>"+obj.message;
                  html += '<br><button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;">Cancel</button>';
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br>";
                html += '<br><a href="viewsecondyear.php?id='+obj.id+'" class="btn btn-outline" style="padding: 10px 50px;border: 1px solid #9dc6a2;background: #e0ffe4;color:#9dc6a2;">Continue</a></div>';
            }
            $("#xconfrimation_text").html(html);
        });
    }
</script>
<?php include_once("footer.php");?> 
