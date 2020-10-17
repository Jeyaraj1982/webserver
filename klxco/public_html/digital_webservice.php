<?php
include_once("config.php");
    echo $_REQUEST['action']();
    
function AddEducationDetails(){
       global $mysql;
       
       $html = '<form action="" method="POST" id="ResumeIDFrm'.$_REQUEST['ResumeID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Education Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Academic Year</label>';
                                $html .='<input type="text" class="form-control" name="AcademicYear" id="AcademicYear" placeholder="Academic Year">';
                                $html .='<div id="ErrorAcademicYear" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Course<span style="color:red">*</span></label>';
                                $html .='<input type="text" class="form-control" name="Course" id="Course" placeholder="Course">';
                                $html .='<div id="ErrorCourse" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Percentage<span style="color:red">*</span></label>';
                                $html .='<select class="form-control" name="Percentage" id="Percentage">';
                                           for($i=1;$i<=100;$i++){ 
                                                $html .='<option value="'.$i.'" '.(($_POST[ 'Percentage']==$i) ? " selected='selected' " : "").'>'.$i.'%</option>';
                                             }
                                            
                                $html .='</select>';
                                $html .='<div id="ErrorPercentage" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Institute</label>';
                                $html .='<input type="text" class="form-control" name="Institute" id="Institute" placeholder="Institute">';
                                $html .='<div id="ErrorInstitute" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                      /*  $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description"></textarea>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<select class="form-control" name="DateandCost" id="DateandCost" aria-label="DateandCost" aria-describedby="basic-addon1">';
                                        foreach($DateandCosts as $DateandCost) {
                                            $html .='<option value="'.$DateandCost['DateandCostID'].'">'.date("M,d Y", strtotime($DateandCost['TourDate'])).' :: Rs  '.$DateandCost['SavePrice'].'</option>';    
                                        }if(sizeof($DateandCosts)=="0"){
                                            $html .='<option>Date and Cost Not Updated</option>';
                                        }
                                $html .='</select>';
                            $html .='</div>';
                        $html .='</div>'; */
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="AddEducation('.$_REQUEST['ResumeID'].')" >Continue</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
    
function AddEducation(){
    global $mysql;
    $id = $mysql->insert("_tbl_resume_education",array("ResumeID"      => $_POST['ResumeID'],
                                                       "AcademicYear"  => $_POST['AcademicYear'],
                                                       "Course"        => $_POST['Course'],
                                                       "Percentage"        => $_POST['Percentage'],
                                                       "Institute"     => $_POST['Institute'],
                                                    //   "Description"   => $_POST['Description'],
                                                       "CreatedOn"     => date("Y-m-d H:i:s")));
                                                       
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Education Details Added Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
    }else{
        $result = array();
        $result['status']="Failure";
        $result['message']="Error Add Education Details";
        return json_encode($result);    
    }
}

function EditEducationDetails(){
       global $mysql;
       $Education = $mysql->select("select * from _tbl_resume_education where EducationID='".$_REQUEST['EducationID']."'");
       $html = '<form action="" method="POST" id="EducationFrm'.$_REQUEST['EducationID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['EducationID'].'" id="EducationID" Name="EducationID">';
            $html.= '<input type="hidden" value="'.$Education[0]['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Edit Education Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Academic Year</label>';
                                $html .='<input type="text" value="'.$Education[0]['AcademicYear'].'" class="form-control" name="AcademicYear" id="AcademicYear" placeholder="Academic Year">';
                                $html .='<div id="ErrorAcademicYear" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Course</label>';
                                $html .='<input type="text" value="'.$Education[0]['Course'].'" class="form-control" name="Course" id="Course" placeholder="Course">';
                                $html .='<div id="ErrorCourse" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                         $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Percentage<span style="color:red">*</span></label>';
                                $html .='<select class="form-control" name="Percentage" id="Percentage">';
                                           for($i=1;$i<=100;$i++){ 
                                                $html .='<option value="'.$i.'" '.(($Education[0][ 'Percentage']==$i) ? " selected='selected' " : "").'>'.$i.'%</option>';
                                             }
                                            
                                $html .='</select>';
                                $html .='<div id="ErrorPercentage" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Institute</label>';
                                $html .='<input type="text" value="'.$Education[0]['Institute'].'" class="form-control"  name="Institute" id="Institute" placeholder="Institute">';
                                $html .='<div id="ErrorInstitute" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                       /* $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description">'.$Education[0]['Description'].'</textarea>';
                            $html .='</div>';
                        $html .='</div>';   */
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="UpdateEducation('.$_REQUEST['EducationID'].')" >Update</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }                                            

function UpdateEducation(){
    global $mysql;
   
     $mysql->execute("update _tbl_resume_education set `AcademicYear`   ='".$_POST['AcademicYear']."',
                                                       `Course`         ='".$_POST['Course']."',
                                                       `Percentage`      ='".$_POST['Percentage']."',
                                                       `Institute`      ='".$_POST['Institute']."'
                                                        where EducationID  ='".$_POST['EducationID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Education Details Updated Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
   
}
function DeleteEducation(){
    global $mysql;
     $Education = $mysql->select("select * from _tbl_resume_education where EducationID='".$_POST['EducationID']."'");
     $mysql->execute("DELETE FROM _tbl_resume_education  where EducationID  ='".$_POST['EducationID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Education Details Deleted Successfully";
        $result['ResumeID']=$Education[0]['ResumeID'];
        return json_encode($result);
   
}

function AddExperienceDetails(){
       global $mysql,$month;
       
       $html = '<form action="" method="POST" id="ResumeExperienceFrm'.$_REQUEST['ResumeID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Experience Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                                $html .= '<div class="col-sm-6"><label>From Year</label>';
                                    $html .='<div class="form-group row">';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="FromYear" id="FromYear">';
                                                       for($i=ExperienceYearStart;$i<=ExperienceYearEnd;$i++){ 
                                                            $html .='<option value="'.$i.'" '.(($_POST[ 'FromYear']==$i) ? " selected='selected' " : "").'>'.$i.'</option>';
                                                         }
                                                        
                                            $html .='</select>';
                                        $html .='</div>';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="FromMonth" id="FromMonth" >';
                                                       for($i=1;$i<sizeof($month);$i++){
                                                            $html .='<option value="'.$month[$i].'" '.(($_POST[ 'FromMonth']==$month[$i]) ? " selected='selected' " : "").'>'.$month[$i].'</option>';
                                                         }
                                            $html .='</select>';
                                        $html .='</div>';
                                    $html .='</div>';
                                    $html .='<div id="ErrorYear" style="font-size:12px;color:red"></div>';
                                $html .='</div>';
                                $html .= '<div class="col-sm-6"><label>To Year</label>';
                                    $html .='<div class="form-group row">';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="ToYear" id="ToYear">';
                                                       for($i=ExperienceYearStart;$i<=ExperienceYearEnd;$i++){ 
                                                            $html .='<option value="'.$i.'" '.(($_POST[ 'ToYear']==$i) ? " selected='selected' " : "").'>'.$i.'</option>';
                                                         }
                                                        
                                            $html .='</select>';
                                        $html .='</div>';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="ToMonth" id="ToMonth" >';
                                                       for($i=1;$i<sizeof($month);$i++){
                                                            $html .='<option value="'.$month[$i].'" '.(($_POST[ 'ToMonth']==$month[$i]) ? " selected='selected' " : "").'>'.$month[$i].'</option>';
                                                         }
                                            $html .='</select>';
                                        $html .='</div>';
                                    $html .='</div>';
                                    $html .='<div id="ErrorToMonth" style="font-size:12px;color:red"></div>';
                                $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';                                             
                            $html .= '<div class="col-sm-12"><label>Designation</label>';
                                $html .='<input type="text" class="form-control" name="Designation" id="Designation" placeholder="Designation">';
                                $html .='<div id="ErrorDesignation" style="font-size:12px;color:red"></div>';
                            $html .='</div>';                                                                    
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Job Description</label>';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description"></textarea>';
                            $html .='</div>';
                        $html .='</div>';
                       $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Name of Company</label>';
                                $html .='<input type="text" class="form-control" name="NameofCompany" id="NameofCompany" placeholder="Name of Company">';
                                $html .='<div id="ErrorNameofCompany" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Company Address</label>';
                                $html .='<input type="text" class="form-control" name="WorkingPlace" id="WorkingPlace" placeholder="Company Address">';
                                $html .='<div id="ErrorWorkingPlace" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="AddExperience('.$_REQUEST['ResumeID'].')" >Continue</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
function AddExperience(){
    global $mysql;
    $id = $mysql->insert("_tbl_resume_experience",array("ResumeID"     => $_POST['ResumeID'],
                                                        "FromYear"         => $_POST['FromYear'],
                                                        "FromMonth"         => $_POST['FromMonth'],
                                                        "ToYear"         => $_POST['ToYear'],
                                                        "ToMonth"         => $_POST['ToMonth'],
                                                        "Designation"  => $_POST['Designation'],
                                                        "NameofCompany"=> $_POST['NameofCompany'],
                                                        "WorkingPlace" => $_POST['WorkingPlace'],
                                                        "Description"  => $_POST['Description'],
                                                        "CreatedOn"    => date("Y-m-d H:i:s")));
                                                       
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";                                                        
        $result['message']="Experience Details Added Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
    }else{
        $result = array();
        $result['status']="Failure";
        $result['message']="Error Add Experience Details";
        return json_encode($result);    
    }
}
function EditExperienceDetails(){
       global $mysql,$month;
       $Experience = $mysql->select("select * from _tbl_resume_experience where ExperienceID='".$_REQUEST['ExperienceID']."'");
       $html = '<form action="" method="POST" id="ExperienceFrm'.$_REQUEST['ExperienceID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['ExperienceID'].'" id="ExperienceID" Name="ExperienceID">';
            $html.= '<input type="hidden" value="'.$Experience[0]['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Edit Experience Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                                $html .= '<div class="col-sm-6"><label>From Year</label>';
                                    $html .='<div class="form-group row">';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="FromYear" id="FromYear">';
                                                       for($i=ExperienceYearStart;$i<=ExperienceYearEnd;$i++){ 
                                                            $html .='<option value="'.$i.'" '.(($Experience[0][ 'FromYear']==$i) ? " selected='selected' " : "").'>'.$i.'</option>';
                                                         }
                                                        
                                            $html .='</select>';
                                        $html .='</div>';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="FromMonth" id="FromMonth" >';
                                                       for($i=1;$i<sizeof($month);$i++){
                                                            $html .='<option value="'.$month[$i].'" '.(($Experience[0][ 'FromMonth']==$month[$i]) ? " selected='selected' " : "").'>'.$month[$i].'</option>';
                                                         }
                                            $html .='</select>';
                                        $html .='</div>';
                                    $html .='</div>';
                                    $html .='<div id="ErrorYear" style="font-size:12px;color:red"></div>';
                                $html .='</div>';
                                $html .= '<div class="col-sm-6"><label>To Year</label>';
                                    $html .='<div class="form-group row">';                           
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="ToYear" id="ToYear">';
                                                       for($i=ExperienceYearStart;$i<=ExperienceYearEnd;$i++){ 
                                                            $html .='<option value="'.$i.'" '.(($Experience[0][ 'ToYear']==$i) ? " selected='selected' " : "").'>'.$i.'</option>';
                                                         }
                                                        
                                            $html .='</select>';
                                        $html .='</div>';
                                        $html .='<div class="col-sm-6" style="padding: 0px;">';
                                            $html .='<select class="form-control" name="ToMonth" id="ToMonth" >';
                                                       for($i=1;$i<sizeof($month);$i++){
                                                            $html .='<option value="'.$month[$i].'" '.(($Experience[0][ 'ToMonth']==$month[$i]) ? " selected='selected' " : "").'>'.$month[$i].'</option>';
                                                         }
                                            $html .='</select>';
                                        $html .='</div>';
                                    $html .='</div>';
                                    $html .='<div id="ErrorToMonth" style="font-size:12px;color:red"></div>';
                                $html .='</div>';
                        $html .='</div>';
                        
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Designation</label>';
                                $html .='<input value="'.$Experience[0]['Designation'].'" type="text" class="form-control" name="Designation" id="Designation" placeholder="Designation">';
                                $html .='<div id="ErrorDesignation" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Job Description</label>';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description">'.$Experience[0]['Description'].'</textarea>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Name of Company</label>';
                                $html .='<input value="'.$Experience[0]['NameofCompany'].'" type="text" class="form-control" name="NameofCompany" id="NameofCompany" placeholder="Name of Company">';
                                $html .='<div id="ErrorNameofCompany" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Company Address</label>';
                                $html .='<input value="'.$Experience[0]['WorkingPlace'].'" type="text" class="form-control" name="WorkingPlace" id="WorkingPlace" placeholder="Company Address">';
                                $html .='<div id="ErrorWorkingPlace" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="UpdateExperience('.$_REQUEST['ExperienceID'].')" >Update</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
function UpdateExperience(){
    global $mysql;
   
     $mysql->execute("update _tbl_resume_experience set `FromYear`   ='".$_POST['FromYear']."',
                                                       `FromMonth`   ='".$_POST['FromMonth']."',
                                                       `ToYear`   ='".$_POST['ToYear']."',
                                                       `ToMonth`   ='".$_POST['ToMonth']."',
                                                       `Designation`         ='".$_POST['Designation']."',
                                                       `NameofCompany`      ='".$_POST['NameofCompany']."',
                                                       `WorkingPlace`      ='".$_POST['WorkingPlace']."',
                                                       `Description`    ='".$_POST['Description']."'
                                                        where ExperienceID  ='".$_POST['ExperienceID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Experience Details Updated Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
   
}  
function DeleteExperience(){
    global $mysql;
     $Experience = $mysql->select("select * from _tbl_resume_experience where ExperienceID='".$_POST['ExperienceID']."'");
     $mysql->execute("DELETE FROM _tbl_resume_experience  where ExperienceID  ='".$_POST['ExperienceID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Experience Details Deleted Successfully";
        $result['ResumeID']=$Experience[0]['ResumeID'];
        return json_encode($result);                                                                    
   
}

function AddSkillsDetails(){
       global $mysql;
       
       $html = '<form action="" method="POST" id="ResumeSkillsFrm'.$_REQUEST['ResumeID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Skills Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Title</label>';
                                $html .='<input type="text" class="form-control" name="Title" id="Title" placeholder="Title">';
                                $html .='<div id="ErrorTitle" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Skills Range</label>';
                                 $html .='<select class="form-control" name="SkillsRange" id="SkillsRange">';
                                           for($i=5;$i<=100;$i++){ 
                                                $html .='<option value="'.$i.'" '.(($_POST[ 'SkillsRange']==$i) ? " selected='selected' " : "").'>'.$i.'&nbsp; % </option>';
                                             }
                                            
                                $html .='</select>';
                                $html .='<div id="ErrorSkillsRange" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description"></textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="AddSkills('.$_REQUEST['ResumeID'].')" >Continue</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
function AddSkills(){
    global $mysql;
    $id = $mysql->insert("_tbl_resume_skills",array("ResumeID"     => $_POST['ResumeID'],
                                                        "Title"        => $_POST['Title'],
                                                        "SkillsRange"   => $_POST['SkillsRange'],
                                                        "Description"   => $_POST['Description'],
                                                        "CreatedOn"     => date("Y-m-d H:i:s")));
                                                       
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";                                                        
        $result['message']="Skills Added Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
    }else{
        $result = array();
        $result['status']="Failure";
        $result['message']="Error Add Skills";
        return json_encode($result);    
    }
}
function EditSkillsDetails(){
       global $mysql;
       $Skills = $mysql->select("select * from _tbl_resume_skills where SkillsID='".$_REQUEST['SkillsID']."'");
       $html = '<form action="" method="POST" id="SkillsFrm'.$_REQUEST['SkillsID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['SkillsID'].'" id="SkillsID" Name="SkillsID">';
            $html.= '<input type="hidden" value="'.$Skills[0]['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Edit Skills Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Title</label>';
                                $html .='<input value="'.$Skills[0]['Title'].'" type="text" class="form-control" name="Title" id="Title" placeholder="Title">';
                                $html .='<div id="ErrorTitle" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Skills Range</label>';
                                 $html .='<select class="form-control" name="SkillsRange" id="SkillsRange">';
                                           for($i=5;$i<=100;$i++){ 
                                                $html .='<option value="'.$i.'" '.(($Skills[0][ 'SkillsRange']==$i) ? " selected='selected' " : "").'>'.$i.'&nbsp; % </option>';
                                             }
                                            
                                $html .='</select>';
                                $html .='<div id="ErrorSkillsRange" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description">'.$Skills[0]['Description'].'</textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="UpdateSkills('.$_REQUEST['SkillsID'].')" >Update</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
function UpdateSkills(){
    global $mysql;
   
     $mysql->execute("update _tbl_resume_skills set `Title`         ='".$_POST['Title']."',
                                                       `SkillsRange`    ='".$_POST['SkillsRange']."',
                                                       `Description`    ='".$_POST['Description']."'
                                                        where SkillsID  ='".$_POST['SkillsID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Skills Updated Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
   
}  
function DeleteSkills(){
    global $mysql;
     $Skills = $mysql->select("select * from _tbl_resume_skills where SkillsID='".$_POST['SkillsID']."'");
     $mysql->execute("DELETE FROM _tbl_resume_skills  where SkillsID  ='".$_POST['SkillsID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Skills Details Deleted Successfully";
        $result['ResumeID']=$Skills[0]['ResumeID'];                                                           
        return json_encode($result);                                                                    
   
}

function AddHobbiesDetails(){
       global $mysql;
       
       $html = '<form action="" method="POST" id="ResumeHobbiesFrm'.$_REQUEST['ResumeID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Hobbies Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Select Additional Information</label>';
                                 $html .='<select class="form-control" name="AdditionalInfo" id="AdditionalInfo" onchange="otheradditionalinfo($(this).val())">';
                                            $html .='<option value="AdditionalSoftwares" '.(($_POST[ 'AdditionalInfo']=="AdditionalSoftwares") ? " selected='selected' " : "").'>Additional Softwares</option>';
                                            $html .='<option value="Languages" '.(($_POST[ 'AdditionalInfo']=="Languages") ? " selected='selected' " : "").'>Languages</option>';
                                            $html .='<option value="Certifications" '.(($_POST[ 'AdditionalInfo']=="Certifications") ? " selected='selected' " : "").'>Certifications</option>';
                                            $html .='<option value="Interests" '.(($_POST[ 'AdditionalInfo']=="Interests") ? " selected='selected' " : "").'>Interests</option>';
                                            $html .='<option value="Accoumplishment" '.(($_POST[ 'AdditionalInfo']=="Accoumplishment") ? " selected='selected' " : "").'>Accoumplishment</option>';
                                            $html .='<option value="Affliation" '.(($_POST[ 'AdditionalInfo']=="Affliation") ? " selected='selected' " : "").'>Affliation</option>';
                                            $html .='<option value="Others" '.(($_POST[ 'AdditionalInfo']=="Others") ? " selected='selected' " : "").'>Others</option>';
                                $html .='</select>';
                                $html .='<div id="ErrorAdditionalInfo" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row" id="other_additional_info_div" style="display:none">';
                            $html .= '<div class="col-sm-12"><label>Other Additional Information</label>';
                                $html .='<input type="text" class="form-control" name="OtherAdditionalInformation" id="OtherAdditionalInformation" placeholder="Other Additional Information">';
                                $html .='<div id="ErrorOtherAdditionalInformation" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description"></textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="AddHobbies('.$_REQUEST['ResumeID'].')" >Continue</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
function AddHobbies(){
    global $mysql;
    if($_POST['AdditionalInfo']=="Others"){
        $otherinfo = $_POST['OtherAdditionalInformation'];
    }else {
        $otherinfo = "";
    }
    $id = $mysql->insert("_tbl_resume_additional_info",array("ResumeID"             => $_POST['ResumeID'],
                                                             "AdditionalInfo"       => $_POST['AdditionalInfo'],
                                                             "OtherAdditionalInfo"  => $otherinfo,
                                                             "Description"          => $_POST['Description'],
                                                             "CreatedOn"            => date("Y-m-d H:i:s")));
                                                       
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";                                                        
        $result['message']="Hobbies Added Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
    }else{
        $result = array();
        $result['status']="Failure";
        $result['message']="Error Add Hobbies";
        return json_encode($result);    
    }
}
function EditHobbiesDetails(){
       global $mysql;
       $Hobbies = $mysql->select("select * from _tbl_resume_additional_info where AdditionalInfoID='".$_REQUEST['AdditionalInfoID']."'");
       $html = '<form action="" method="POST" id="HobbiesFrm'.$_REQUEST['AdditionalInfoID'].'">';
            $html.= '<input type="hidden" value="'.$_REQUEST['AdditionalInfoID'].'" id="AdditionalInfoID" Name="AdditionalInfoID">';
            $html.= '<input type="hidden" value="'.$Hobbies[0]['ResumeID'].'" id="ResumeID" Name="ResumeID">';
            $html.= '<div class="modal-header" style="padding-bottom:5px">';
                $html.= '<h4 class="heading"><strong>Edit Hobbies Details</strong> </h4>';
                $html.= '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">';
                    $html.= '<span aria-hidden="true" style="color:black">&times;</span>';
                $html.= '</button>';
            $html.= '</div>';
            $html .='<div class="modal-body">';
                $html .= '<div class="form-group row">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label>Select Additional Information</label>';
                                 $html .='<select class="form-control" name="AdditionalInfo" id="AdditionalInfo" onchange="otheradditionalinformation($(this).val())">';
                                            $html .='<option value="AdditionalSoftwares" '.(($Hobbies[0][ 'AdditionalInfo']=="AdditionalSoftwares") ? " selected='selected' " : "").'>Additional Softwares</option>';
                                            $html .='<option value="Languages" '.(($Hobbies[0][ 'AdditionalInfo']=="Languages") ? " selected='selected' " : "").'>Languages</option>';
                                            $html .='<option value="Certifications" '.(($Hobbies[0][ 'AdditionalInfo']=="Certifications") ? " selected='selected' " : "").'>Certifications</option>';
                                            $html .='<option value="Interests" '.(($Hobbies[0][ 'AdditionalInfo']=="Interests") ? " selected='selected' " : "").'>Interests</option>';
                                            $html .='<option value="Accoumplishment" '.(($Hobbies[0][ 'AdditionalInfo']=="Accoumplishment") ? " selected='selected' " : "").'>Accoumplishment</option>';
                                            $html .='<option value="Affliation" '.(($Hobbies[0][ 'AdditionalInfo']=="Affliation") ? " selected='selected' " : "").'>Affliation</option>';
                                            $html .='<option value="Others" '.(($Hobbies[0][ 'AdditionalInfo']=="Others") ? " selected='selected' " : "").'>Others</option>';
                                $html .='</select>';
                                $html .='<div id="ErrorAdditionalInfo" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        if($Hobbies[0]['AdditionalInfo']=="Others"){
                        $html .= '<div class="form-group row" id="other_additional_info_divs">';
                            $html .= '<div class="col-sm-12"><label>Other Additional Information</label>';
                                $html .='<input type="text" class="form-control" name="OtherAdditionalInformation" value="'.$Hobbies[0]['OtherAdditionalInfo'].'" id="OtherAdditionalInformation" placeholder="Other Additional Information">';
                                $html .='<div id="ErrorOtherAdditionalInformation" style="font-size:12px;color:red"></div>';
                            $html .='</div>';
                        $html .='</div>';
                        }
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Description">'.$Hobbies[0]['Description'].'</textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-success" onclick="UpdateHobbies('.$_REQUEST['AdditionalInfoID'].')" >Update</button>';
       $html .='</div>';
       $html .='</form>';
       return $html;                                                                                
    }
function UpdateHobbies(){
    global $mysql;
     if($_POST['AdditionalInfo']=="Others"){
        $otherinfo = $_POST['OtherAdditionalInformation'];
    }else {
        $otherinfo = "";
    }
     $mysql->execute("update _tbl_resume_additional_info set `AdditionalInfo`         ='".$_POST['AdditionalInfo']."',
                                                             `OtherAdditionalInfo`    ='".$otherinfo."',
                                                             `Description`    ='".$_POST['Description']."'
                                                              where AdditionalInfoID  ='".$_POST['AdditionalInfoID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Hobbies Updated Successfully";
        $result['ResumeID']=$_POST['ResumeID'];
        return json_encode($result);
   
}  
function DeleteHobbies(){
    global $mysql;
     $Skills = $mysql->select("select * from _tbl_resume_additional_info where AdditionalInfoID='".$_POST['AdditionalInfoID']."'");
     $mysql->execute("DELETE FROM _tbl_resume_additional_info  where AdditionalInfoID  ='".$_POST['AdditionalInfoID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Hobbies Details Deleted Successfully";
        $result['ResumeID']=$Skills[0]['ResumeID'];                                                           
        return json_encode($result);                                                                    
   
}


function DeleteResume(){
    global $mysql;
   
     $General = $mysql->select("select * from _tbl_resume_general_info where ResumeID='".$_POST['ResumeID']."'");
     
     $mysql->execute("update _tbl_resume_general_info set `IsDelete` ='1' where ResumeID  ='".$_POST['ResumeID']."'");
    /* $mysql->execute("update _tbl_resume_education set `IsDelete` ='1' where  ResumeID  ='".$General[0]['ResumeID']."'");
     $mysql->execute("update _tbl_resume_experience set `IsDelete` ='1' where ResumeID  ='".$General[0]['ResumeID']."'");
     $mysql->execute("update _tbl_resume_skills set `IsDelete` ='1' where ResumeID  ='".$General[0]['ResumeID']."'");
     $mysql->execute("update _tbl_resume_hobbies set `IsDelete` ='1' where ResumeID  ='".$General[0]['ResumeID']."'");
     
    */
        $result = array();
        $result['status']="Success";
        $result['message']="Resume Deleted Successfully";
        return json_encode($result);
   
}
function DeleteCard(){
    global $mysql;
   
     $mysql->execute("update _tbl_card_general_info set `IsDelete` ='1' where ResumeID='".$_POST['ResumeID']."'");
   
        $result = array();
        $result['status']="Success";
        $result['message']="Card Deleted Successfully";
        return json_encode($result);
   
}                                                                                                        
                                                                                                               
?>