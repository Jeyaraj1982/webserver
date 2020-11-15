<?php 
    $mysql =   new MySql(); 
    $data = $mysql->select("select * from admission_secondyear where AdmissionID='".$_SESSION['S']."'");
    if (sizeof($data)>0) {
        if(Isset($_POST['submitbtn'])){
                    $_SESSION['ID']=md5($_SESSION['S']);
                    echo "<script>location.href='editsecondyear?id=".md5($_SESSION['S'])."'</script>";     
            }
?>
<section class="kamaraj-contact-field">
        <div class="container">
            <div class="row" >
                <div class="col-md-12"  >
                    <div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                    <form action="" method="POST" enctype=multipart/form-data>
                    <input type="hidden" name="EmailID" id="EmailID">
                        <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                           <tr>
                            <td colspan="3" style="padding-bottom:10px;">
                            <div>
                                <div style="width:100px;float:left">
                                    <img style="width:100px" src="images/nms_logo.png">
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
                                    APPLICATION FOR ADMISSION TO SECOND YEAR DIPLOMA COURSES - 2020
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
                                        <img id="src_image1" src="http://nmskamarajpolytechnic.com/uploads/<?php echo $data[0]['filepath1'];?>" style="width:100%;height:80%;cursor: pointer;">
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
                             &nbsp;&nbsp;&nbsp;&nbsp;PIN Code&nbsp;&nbsp;&nbsp;<input type="text"  value="<?php echo $data[0]['Pincode'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:102px"></td>
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
                            <?php if($data[0]['Nationality']=="Others"){?><input type="text" value="<?php echo $data[0]['AdditionalNationality'];?>" readonly="readonly"  style="width:45%;float:right;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"><?php } ?>
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
                                <?php if($data[0]['Religion']=="Others"){?><input type="text" value="<?php echo $data[0]['OtherReligion'];?>" id="OtherReligion" name="OtherReligion"  style="width:45%;float:right;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"> <?php } ?>
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
                                            <input type="text" readonly="readonly" value="<?php echo $data[0]['HscAcademicTotal'];?>" name="HscAcademicTotal" id="HscAcademicTotal"   style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:30px;"></td>
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
                                            <input type="text" readonly="readonly" value="<?php echo $data[0]['HscVocationalTotal'];?>" name="HscVocationalTotal" id="HscVocationalTotal" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;text-align:right;padding-right:30px;">
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
                                        <td style="text-align: center;"><input type="text" value="<?php echo $data[0]['HSCInstitute'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:95%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">2</td>
                                        <td style="text-align: center;">X Std.</td>
                                        <td style="text-align: center;">
                                            <input type="text" value="<?php echo $data[0]['SSLCPassMonth'];?>" readonly="readonly" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                            <input type="text" value="<?php echo $data[0]['SSLCPassYear'];?>" readonly="readonly"style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        </td>
                                        <td style="text-align: center;"><input type="text" value="<?php echo $data[0]['SSLCInstitute'];?>" readonly="readonly" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:95%"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">3</td>
                                        <td style="text-align: center;">HSC/Equivalent.</td>
                                        <td style="text-align: center;">
                                            <input type="text" value="<?php echo $data[0]['HSCOREquivalentPassMonth'];?>" readonly="readonly" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                            <input type="text" value="<?php echo $data[0]['HSCOREquivalentPassYear'];?>" readonly="readonly" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        </td>
                                        <td style="text-align: center;"><input type="text" readonly="readonly" value="<?php echo $data[0]['HSCOREquivalentInstitute'];?>" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:95%"></td>
                                    </tr>
                                </table>
                            </td>                                                                                                                                                                                                                                                                    
                        </tr>
                        <tr>
                         <td style="padding:5px;text-align:left;width:30px"> 12. </td>                                                                                                         
                            <td colspan="2">Certificate Attachment (Optional) &nbsp;&nbsp;
                               <span id="div_certificate" style="padding: 4px 11px 4px 11px;border:#9dc6a2;background: #fff;">
                                <?php echo $data[0]['Certificate1'];?>
                                </span>    
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center;padding-top:10px;padding-bottom: 10px;"><b>DECLARATION BY THE APPLICANT</b></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td colspan="2">
                                I&nbsp;&nbsp;<input type="text" readonly="readonly" value="<?php echo $data[0]['DeclarationName'];?>" readonly="readonly" id="DeclarationName" style="line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none;width:230px">&nbsp;&nbsp;(Name in full) Son/Daughter of &nbsp;<input type="text" readonly="readonly" value="<?php echo $data[0]['SonorDaughterof'];?>" readonly="readonly" name="SonorDaughterof" id="SonorDaughterof" style="width:230px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none">&nbsp;
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
                            <td style="text-align:right"><button type="submit" class="btn btn-success" name="submitbtn" style="padding: 10px 50px;"> Edit</button></td>
                        </tr>
                        
                        </table>
                    </form>
                    </div>
                    <?php if($data[0]['IsPaid']=="1"){?>
                                                    <br><br><div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                        <?php $sql= $mysql->select("select * from `_tblPayments` where TblName='admission_secondyear' and `FormID`='".$data[0]['AdmissionID']."'"); ?>    
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
                                                                <td>:&nbsp;<?php echo number_format($sql[0]['TxnAmount'],2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Txn Status</td>
                                                                <td>:&nbsp;<?php echo $sql[0]['TxnStatus'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 100px">Payment Mode</td>
                                                                <td>:&nbsp;<?php echo "Payment gateway";?></td>
                                                            </tr>
                                                        </table>
                                                    </div> 
                                                    <?php } ?> 
                                                    <?php if($data[0]['IsPaid']=="2"){?>
                                                    <br><br><div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                        <?php $sql= $mysql->select("select * from `_tblPayments` where TblName='admission_secondyear' and `FormID`='".$data[0]['AdmissionID']."'"); ?>    
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
                                                    <?php } ?> 
                                                    <?php if($data[0]['IsPaid']=="0"){?>
                                                    <br><br><div style="background:#e0ffe4;padding:20px;width: 870px;margin:0px auto;border:1px solid #9dc6a2;border-radius:10px">
                                                        <?php $sql= $mysql->select("select * from `_tblPayments` where TblName='admission_secondyear' and `FormID`='".$data[0]['AdmissionID']."'"); ?>    
                                                        <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                                                            <tr>
                                                                <td colspan="2" style="font-size:16px;font-weight:bold;color:#222">Transaction Details</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Incomplete Trnsaction</td>
                                                            </tr>
                                                        </table>
                                                    </div> 
                                                    <?php } ?>  
                </div>
            </div>
        </div>
    </section>
    <?php } else {?>
        <section class="kamaraj-contact-field">
        <div class="container">
            <div class="row" >
                <div class="col-md-12"  >
                Invalid Access. <a href="viewform" style="color:blue"> Click to here to continue</a>
                </div>
            </div>
        </div>
        </section>
    <?php } ?>