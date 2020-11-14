<?php
    include_once("webadmin/mysql.php");    
    $mysql =   new MySql(); 
    $data = $mysql->select("select * from admission_firstyear where AdmissionID='".$_GET['id']."'");
?>
<?php 
    if($_GET['tbl']=="1"){ 
    $data = $mysql->select("select * from admission_firstyear where AdmissionID='".$_GET['formid']."'");
?>

<table>
<tr>
    <td colspan="3" >
        <div>
            <div >                                                                                   
                <img src="http://nmskamarajpolytechnic.com/images/nms_logo.png">
            </div>
            <div>
                <div>Nadar Mahajana Sangam</div>
                <div>KAMARAJ POLYTECHNIC COLLEGE</div>
                <div>Pazhavilai, Kanyakumari District - 629 501</div>
                <div>Phone No : 04652-253900, Email: kamarajpolytechniccollege@gmail.com, nmskptc_2003@yahoo.co.in</div>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td colspan="3">
        <div>
            APPLICATION FOR ADMISSION TO FIRST YEAR DIPLOMA COURSES - 2020-21
        </div>
    </td>
</tr>                                 
 <tr>
        <td colspan="3">&nbsp;</td>
    </tr> 
    
       <tr>
       <td colspan="3">
            <div>
                <div id="div_1">
                    <img id="src_image1" src="http://nmskamarajpolytechnic.com/uploads/<?php echo $data[0]['filepath1'];?>">
                </div> 
            </div>
        </td>
    </tr>
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td >&nbsp;</td>
    <td>Select Course</td>
    <td><?php echo $data[0]['FirstCourse'];?></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $data[0]['SecondCourse'];?></td>
</tr>
<tr>
    <td>1.</td>
    <td>SSLC/Equivalent Total Marks</td>
    <td><?php echo $data[0]['PreviousTotalMarks'];?></td>
</tr>
<tr>
    <td>2.</td>
    <td>(a) Name of the Candidiate (In Block Letters)</td>
    <td><?php echo $data[0]['CandidiateName'];?></td>
</tr>
  <tr>                                                                     
  <td>&nbsp; </td>
    <td>(b) Name of the Parent / Guardian</td>
    <td><?php echo $data[0]['ParentName'];?>
    </td>
</tr>
 <tr>
 <td>&nbsp; </td>
    <td>(c) Address for Communication</td>
    <td><?php echo $data[0]['Address1'];?></td>
</tr>
 <tr>
    <td> &nbsp;</td>
    <td> </td>
    <td><?php echo $data[0]['Address2'];?></td>
</tr>
 <tr>
    <td>&nbsp; </td>
    <td> </td>
    <td><?php echo $data[0]['Address3'];?></td>
</tr>
 <tr>
    <td>&nbsp; </td>
    <td> </td>
    <td><?php echo $data[0]['Address4'];?> 
     &nbsp;&nbsp;&nbsp;&nbsp;PIN Code&nbsp;&nbsp;&nbsp;<?php echo $data[0]['Pincode'];?></td>
</tr>
 <tr>
 <td>&nbsp; </td>
    <td>Aadhaar Number</td>
    <td><?php echo $data[0]['AadhaarNumber'];?></td>
</tr>
<tr>
<td> </td>
    <td>Father's Mobile Number</td>
    <td><?php echo $data[0]['FathersMobile'];?></td>
</tr>
<tr>
<td>&nbsp; </td>
    <td>Mother's Mobile Number</td>
    <td><?php echo $data[0]['MothersMobile'];?></td>
</tr>
<tr>
<td>3. </td>
    <td>Nationality</td>
    <td><?php echo $data[0]['Nationality'];?>
        <?php if($data[0]['Nationality']=="Others"){ ?><?php echo $data[0]['AdditionalNationality'];?><?php } ?>
    </td>
</tr>
 <tr>
 <td>4. </td>
    <td>Native District</td>
    <td><?php echo $data[0]['NativeDistrict'];?></td>
</tr>
 <tr>                                                                                                   
 <td>5. </td>
    <td>Place of Birth</td>
    <td><?php echo $data[0]['PlaceofBirth'];?></td>
</tr>
 <tr>
 <td>6. </td>
    <td>Mother Tounge</td>
    <td><?php echo $data[0]['Mothertongue'];?>
        <?php if($data[0]['Mothertongue']=="Others") { ?><?php echo $data[0]['AdditionalMothertongue'];?><?php } ?>
    </td>
</tr>                                               
 <tr>
 <td> 7. </td>                                                                                                        
    <td>Sex</td>
    <td><?php echo $data[0]['Gender'];?></td>
</tr>
 <tr>
 <td>8. </td>
    <td> as found in SSLC or its equivalen certificate</span></td>
    <td><?php echo $data[0]['DateofBirth'];?></td>
</tr>
<tr>
    <td>9. </td>
    <td>(a). Religion</td>
    <td><?php echo $data[0]['Religion'];?>
        <?php if($data[0]['Religion']=="Others"){?> <?php echo $data[0]['OtherReligion'];?><?php } ?>
    </td>
</tr>
<tr>
<td>&nbsp;</td>
<td>(b). Name of the community</td>
<td><?php echo $data[0]['Community'];?></td>
</tr>
 <tr>
    <td>&nbsp;</td>
    <td>(c). Caste</td>
    <td><?php echo $data[0]['Caste'];?></td>
</tr>
 <tr>
    <td>&nbsp;</td>
    <td>(d). Sl. No. of the Community Certificate </td>
    <td><?php echo $data[0]['CommunityCertificateNo'];?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>(e). Designation of the Officer <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Who issued the Community Certificate</span></td>
<td><?php echo $data[0]['DesignationofTheOfficer'];?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>(f). Name of the Revenue Division / Taluk</td>
<td>
    <table>
        <tr>
            <td>Division </td>
            <td width="10%"></td>
            <td>Taluk</td>
        </tr>
        <tr>
            <td><?php echo $data[0]['DivisionName'];?></td>
            <td></td>
            <td><?php echo $data[0]['TalukName'];?></td>
        </tr>
    </table>
</td>
</tr>
<tr>
<td>10.</td>
<td>(a). Examination Passed </td>
<td>   
    <?php echo $data[0]['ExaminationPassed'];?>
    &nbsp;&nbsp;&nbsp;&nbsp;Year of Passing&nbsp;&nbsp;&nbsp;<?php echo $data[0]['PassedYear'];?>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">(b). Marks obtained in SSLC / Equivalent Examination: <br> (False information will lead to cancellation and Criminal Action) </td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">
    <table class="table-bordered">
        <tr>
            <td rowspan="2">Sl.No.</td>
            <td rowspan="2">Subject</td>
            <td colspan="2">Marks</td>
            <td rowspan="2">Month and Year of Passing</td>
        </tr>
        <tr>
            <td>Scored</td>
            <td>Maximum</td>
        </tr>
        <tr>
            <td>(i)</td>
            <td>Tamil or any other Language</td>
            <td><?php echo $data[0]['SubjectTamil'];?></td>
            <td>100</td>
            <td><?php echo $data[0]['TamilPassMnth'];?>
                <?php echo $data[0]['TamilPassYear'];?>
            </td>
        </tr>
        <tr>
            <td>(ii)</td>
            <td>English</td>
            <td><?php echo $data[0]['SubjectEnglish'];?></td>
            <td>100</td>
            <td>
                <?php echo $data[0]['EnglishPassMnth'];?>
                <?php echo $data[0]['EnglishPassYear'];?>
            </td>
        </tr>
        <tr>
            <td>(iii)</td>
            <td>Mathametics</td>
            <td><?php echo $data[0]['SubjectMathemetics'];?></td>
            <td>100</td>
            <td><?php echo $data[0]['MathsPassMnth'];?>
                <?php echo $data[0]['MathsPassYear'];?>
            </td>
        </tr>
        <tr>                                                                                
            <td>(iv)</td>
            <td>Science</td>
            <td><?php echo $data[0]['SubjectScience'];?></td>
            <td>100</td>
            <td><?php echo $data[0]['SciencePassMnth'];?>
                <?php echo $data[0]['SciencePassYear'];?>
            </td>
        </tr>
        <tr>
            <td>(v)</td>
            <td>Social Science</td>
            <td><?php echo $data[0]['SubjectSocial'];?></td>
            <td>100</td>
            <td>
                <?php echo $data[0]['SocialPassMnth'];?>
                <?php echo $data[0]['SocialPassYear'];?>
            </td>
        </tr>
        
        <tr>
            <td>(vi)</td>
            <td>Total</td>
            <td><?php echo $data[0]['SubjectTotal'];?></td>
            <td><b>500</b></td>
            <td></td>
        </tr>
        
    </table>
</td>
</tr>
<tr>
<td>11.</td>
<td colspan="2">Details of Studies :</td>    
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">
    <table class="table-bordered">
        <tr>
            <td>Sl.No.</td>
            <td>Class</td>
            <td>Month and Year of Passing</td>
            <td>Name of the Institution and Address</td>
        </tr>
        <tr>
            <td>1</td>
            <td>IX Std.</td>
            <td>
                <?php echo $data[0]['HSCPassMnth'];?>
                <?php echo $data[0]['HSCPassYear'];?>
            </td>
            <td><?php echo $data[0]['HSCInstitute'];?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>X Std.</td>
            <td>
                <?php echo $data[0]['SSLCPassMnth'];?>
                <?php echo $data[0]['SSLCPassYear'];?>
            </td>
            <td><?php echo $data[0]['SSLCInstitute'];?></td>
        </tr>
    </table>
</td>
</tr>
<tr>
<td> 12. </td>                                                                                                         
<td colspan="2">Certificate Attachment &nbsp;&nbsp;
    <?php 
        if(strlen($data[0]['Certificate1']>3)){
        echo "Attached";
        }else {
            echo "Not Attached";
        }
    ?>
</td>
</tr>
<tr>
<td colspan="3"><b>DECLARATION BY THE APPLICANT</b></td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">
    I&nbsp;&nbsp;<?php echo $data[0]['DeclarationName'];?>&nbsp;&nbsp; Son/Daughter of &nbsp;<?php echo $data[0]['SonorDaughterof'];?>&nbsp;
    hereby solemnly declare that the information given to the application and enclosures are true corract and complete.
</td>    
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">Place : &nbsp;<?php echo $data[0]['Place'];?>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>Date :&nbsp;&nbsp;&nbsp;<?php echo $data[0]['CreatedOn'];?></td>
</tr> 
</table>
                   
<?php }
    if($_GET['tbl']=="2"){  
    $data = $mysql->select("select * from admission_secondyear where AdmissionID='".$_GET['formid']."'");
 ?>
<table style="width:100%">
    <tr>
    <td colspan="3">
    <div>
        <div>
            <img style="width:100px" src="images/nms_logo.png">
        </div>
        <div>
            <div>Nadar Mahajana Sangam</div>
            <div>KAMARAJ POLYTECHNIC COLLEGE</div>
            <div>Pazhavilai, Kanyakumari District - 629 501</div>
            <div>Phone No : 04652-253900, Email: kamarajpolytechniccollege@gmail.com, nmskptc_2003@yahoo.co.in</div>
        </div>
    </div>
    </td>
    </tr>

    <tr>

    <td colspan="3">
        <div>
            APPLICATION FOR ADMISSION TO SECOND YEAR DIPLOMA COURSES - 2020
        </div>
    </td>
    </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
    </tr> 
    <tr>
    <td colspan="3">
        <div>
            <div id="div_1">
                <img id="src_image1" src="http://nmskamarajpolytechnic.com/uploads/<?php echo $data[0]['filepath1'];?>">
            </div> 
        </div>
    </td>
    </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>Select Course</td>
    <td><?php echo $data[0]['FirstCourse'];?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $data[0]['SecondCourse'];?></td>
    </tr>
    <tr>
    <td>1.</td>
    <td>Hr.&nbsp;&nbsp;Sec.&nbsp;&nbsp;Academic/Vocational/ITI Total Marks</td>
    <td><?php echo $data[0]['PreviousTotalMarks'];?></td>
    </tr>
    <tr>
    <td>2.</td>
    <td>(A) Name of the Candidate (In Block Letters)</td>
    <td><?php echo $data[0]['CandidiateName'];?></td>
    </tr>
    <tr>
    <td>&nbsp; </td>
    <td>(B) Name of the Parent / Guardian</td>
    <td><?php echo $data[0]['ParentName'];?></td>
    </tr>
    <tr>
    <td>&nbsp; </td>
    <td>(C) Address for Communication</td>
    <td><?php echo $data[0]['Address1'];?></td>
    </tr>
    <tr>
    <td> &nbsp;</td>
    <td> </td>
    <td><?php echo $data[0]['Address2'];?>></td>
    </tr>
    <tr>
    <td>&nbsp; </td>
    <td> </td>
    <td><?php echo $data[0]['Address3'];?></td>
    </tr>
    <tr>
    <td>&nbsp; </td>
    <td> </td>
    <td><?php echo $data[0]['Address4'];?>
     &nbsp;&nbsp;&nbsp;&nbsp;PIN Code&nbsp;&nbsp;&nbsp;<?php echo $data[0]['Pincode'];?></td>
    </tr>
    <tr>
    <td>&nbsp; </td>
    <td>Adhar Number</td>
    <td><?php echo $data[0]['AadhaarNumber'];?></td>
    </tr>
    <tr>
    <td> </td>
    <td>Father's Mobile Number</td>
    <td><?php echo $data[0]['FathersMobile'];?></td>
    </tr>
    <tr>
    <td>&nbsp; </td>
    <td>Mother's Mobile Number</td>
    <td><?php echo $data[0]['MothersMobile'];?></td>
    </tr>                                                                                                                     
    <tr>
    <td>3. </td>
    <td>Nationality</td>                                                                                                                                                                                                                            
    <td><?php echo $data[0]['Nationality'];?>
    <?php if($data[0]['Nationality']=="Others"){?><?php echo $data[0]['AdditionalNationality'];?><?php } ?>
    </td>
    </tr>
    <tr>
    <td>4. </td>
    <td>Native District</td>
    <td><?php echo $data[0]['NativeDistrict'];?></td>
    </tr>
    <tr>
    <td>5. </td>
    <td>Place of Birth</td>
    <td><?php echo $data[0]['PlaceofBirth'];?></td>
    </tr>
    <tr>
    <td>6. </td>
    <td>Mother Tongue</td>
    <td><?php echo $data[0]['Mothertongue'];?>
        <?php if($data[0]['Mothertongue']=="Others"){?><?php echo $data[0]['AdditionalMothertongue'];?><?php } ?>
    </td>
    </tr>
    <tr>
    <td> 7. </td>                                                                                                        
    <td>Sex</td>
    <td><?php echo $data[0]['Gender'];?></td>
    </tr>
    <tr>
    <td>8. </td>
    <td>Date of Birth (Christian era)<br><span> as found in SSLC or its equivalent certificate</span></td>
    <td><?php echo $data[0]['DateofBirth'];?></td>
    </tr>
    <tr>
    <td>9. </td>
    <td>(a). Religion</td>
    <td><?php echo $data[0]['Religion'];?>
        <?php if($data[0]['Religion']=="Other"){?><?php echo $data[0]['OtherReligion'];?> <?php } ?>
    </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>(b). Name of the community</td>
    <td><?php echo $data[0]['Community'];?>></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>(c). Caste</td>
    <td><?php echo $data[0]['Caste'];?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>(d). Sl.No. of the Community Certificate </td>
    <td><?php echo $data[0]['CommunityCertificateNo'];?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>(e). Designation of the Officer <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Who issued the Community Certificate</span></td>
    <td><?php echo $data[0]['DesignationofTheOfficer'];?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>(f). Name of the Revenue Division / Taluk</td>
    <td>
        <table>
            <tr>
                <td>Division </td>
                <td></td>
                <td>Taluk</td>
            </tr>
            <tr>
                <td><?php echo $data[0]['DivisionName'];?></td>
                <td></td>
                <td><?php echo $data[0]['TalukName'];?></td>
            </tr>
        </table>
    </td>
    </tr>

    <tr>
    <td>10.</td>
    <td>(a). Examination Passed </td>
    <td><?php echo $data[0]['ExaminationPassed'];?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">(b). Marks obtained in SSLC / Equivalent Examination: (False information will lead to cancellation and Criminal Action) </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>
        <table> 
            <tr>
                <td colspan="3">HSC (Academic) Marks</td>
            </tr>    
            <tr>                              
                <td>Subject</td>
                <td>Marks Obtained</td>
                <td>Maximum Marks</td>
            </tr>
            <tr>
                <td>Part I Tamil or Language</td>
                <td><?php echo $data[0]['HscAcademicTamil'];?></td>
            </tr>
            <tr>
                <td>Part II English</td>
                <td><?php echo $data[0]['HscAcademicEnglish'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>
                    Part III : Maths
                </td>
                <td><?php echo $data[0]['HscAcademicMaths'];?></td>            
                <td>100</td>
            </tr>
            <tr>
                <td>
                    Part III : Physics
                </td>
                <td><?php echo $data[0]['HscAcademicPhysics'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>
                  Part III : Chemistry
                </td>
                <td><?php echo $data[0]['HscAcademicChemistry'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>
                    Part III : Elective &nbsp;<?php echo $data[0]['ElectiveSubject'];?>
                </td>
                <td><?php echo $data[0]['HscAcademicElective'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>
                    Total                                   
                </td>
                <td><?php echo $data[0]['HscAcademicTotal'];?></td>
                <td>600</td>
            </tr>
        </table>
    </td>
    <td>
        <table> 
            <tr>
                <td colspan="3">HSC (Vocational) Marks</td>
            </tr>    
            <tr>                              
                <td>Subject</td>
                <td>Marks Obtained</td>
                <td>Maximum Marks</td>
            </tr>
            <tr>
                <td>Part I Tamil or Language</td>
                <td><?php echo $data[0]['HscVocationalTamil'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>Part II English</td>
                <td><?php echo $data[0]['HscVocationalEnglish'];?></td>
                <td>100</td>
            </tr>                 
            <tr>
                <td>
                    Part III : Maths
                </td>
                <td><?php echo $data[0]['HscVocationalMaths'];?></td>
                <td>100</td>                              
            </tr>
            <tr>    
                <td colspan="3">
                    <table>
                        <tr>
                            <td >Name of the Vocational Course</td>
                            <td><?php echo $data[0]['VocationalCourseName'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>Theory</td>
                <td><?php echo $data[0]['HscVocationalTheory'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>Practical I</td>
                <td><?php echo $data[0]['HscVocationalPractical1'];?></td>
                <td>100</td>
            </tr>
            <tr>   
                <td>Practical II</td>
                <td><?php echo $data[0]['HscVocationalPractical2'];?></td>
                <td>100</td>
            </tr>
            <tr>
                <td>
                    Total
                </td>
                <td><?php echo $data[0]['HscVocationalTotal'];?></td>
                <td>600</td>
            </tr>
        </table>
    </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">(Incase of CBSC, the marks obtained may be entered accordingly, If the certificate is found to be bogus is will lead to cancellation of admission at any stage of study criminal action being taken)</td>
    </tr>
    <tr>
    <td>11.</td>
    <td colspan="2">Details of Studies :</td>    
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">
        <table class="table-bordered">
            <tr>
                <td>Sl.No.</td>
                <td>Class</td>
                <td>Month and Year of Passing</td>
                <td>Name of the Institution and Address</td>
            </tr>
            <tr>
                <td>1</td>
                <td>IX Std.</td>
                <td><?php echo $data[0]['HSCPassMonth'];?>
                    <?php echo $data[0]['HSCPassYear'];?>
                <td><?php echo $data[0]['HSCInstitute'];?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>X Std.</td>
                <td><?php echo $data[0]['SSLCPassMonth'];?>
                    <?php echo $data[0]['SSLCPassYear'];?>
                </td>
                <td><?php echo $data[0]['SSLCInstitute'];?></td>
            </tr>
            <tr>                                                                     
                <td>3</td>
                <td>HSC/Equivalent.</td>
                <td><?php echo $data[0]['HSCOREquivalentPassMonth'];?>
                    <?php echo $data[0]['HSCOREquivalentPassYear'];?>
                </td>
                <td><?php echo $data[0]['HSCOREquivalentInstitute'];?></td>
            </tr>
        </table>
    </td>                                                                                                                                                                                                                                                                    
    </tr>
    <tr>
    <td> 12. </td>                                                                                                         
    <td colspan="2">Certificate Attachment (Optional) &nbsp;&nbsp;
        <?php if(strlen($data[0]['Certificate1'])>3){ echo "Attached";}else{ echo "Not Attached";};?>
    </td>
    </tr>
    <tr>
    <td colspan="3"><b>DECLARATION BY THE APPLICANT</b></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">
        I&nbsp;&nbsp;<?php echo $data[0]['DeclarationName'];?>&nbsp;&nbsp;(Name in full) Son/Daughter of &nbsp;<?php echo $data[0]['SonorDaughterof'];?>&nbsp;
        hereby solemnly declare that the information in the statements given in the application, and the enclosures are true, correct and complete.
    </td>    
    </tr>
    <tr>                                                                     
    <td>&nbsp;</td>
    <td colspan="2">Place : &nbsp;<?php echo $data[0]['Place'];?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>Date :&nbsp;&nbsp;&nbsp;<?php echo $data[0]['CreatedOn'];?></td>
    </tr>
                                                                                                       
    </table>
 <?php } ?>