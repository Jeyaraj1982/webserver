 
<?php
    if (isset($_POST['postissue'])) {
         
        $project = $mysql->select("select * from _tblProjects where ProjectID=".$_POST['ProjectID']) ; 
       $id=   $mysql->insert("_tblPrototype",array(
                                    "prototypeTitle"=>$_POST['IssueTitle'],
                                    "prototypeDescription"=>$_POST['IssueDescription'],
                                    "prototypeStatus"=>"1",
                                    "ProjectID"=>$_POST['ProjectID'],
                                    "ProjectName"=>$project[0]['ProjectName'],
                                    "prototypePostedBy"=>$_SESSION['User']['UserID'],
                                    "prototypePostedByName"=>$_SESSION['User']['EmployeeName'],
                                    "prototypeCreatedOn"=>date("Y-m-d H:i:s")));
                                   
       if ($id>0) {
           echo "Prototype Posted Successfully";

           for($i=0;$i<sizeof($_FILES['image']['name']);$i++) {

                $target_dir = "prototype/";
              
                $filename = strtolower("_".time().$_FILES['image']['name'][$i]);
       
                if (move_uploaded_file($_FILES['image']["tmp_name"][$i], $target_dir.$filename)) {
                   
                        $mysql->insert("_tblAttachment",array(
                                    "IssueID"=>"0",
                                    "prototypeID"=>$id,
                                    "ProjectID"=>$_POST['ProjectID'],
                                    "UserID"=>$_SESSION['User']['UserID'],
                                    "FileName"=>$filename,
                                    "IsDirect"=>"1"));
                    
    } else {
        echo "file uploaded error".$_FILES["image"]["error"][$i];
    }  
    

 
 
      
 
    
            }
                  
       } else {
           echo "error: Posting issue.";
       }
    }
?>
<form action="" method="post" enctype="multipart/form-data">

<table style="width:100%;" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:140px;padding-left:0px;">Project</td>
        <td>
        <?php $projcts=$mysql->select("select p.* from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID  and pa.UserID='".$_SESSION['User']['UserID']."'  group by pa.ProjectID"); ?>
            <select name="ProjectID" style="width:200px">
            <?php foreach($projcts as $p){ ?>
                <option value="<?php echo $p['ProjectID'];?>"><?php echo $p['ProjectName'];?></option>                
            <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style=";padding-left:0px;">Prototype Title</td>
        <td><input type="text" name="IssueTitle" style="width:100%"></td>
    </tr>
    <tr>
        <td style="vertical-align:top;;padding-left:0px;">Prototype Description</td>
        <td><textarea name="IssueDescription" style="width:100%;height:300px"></textarea></td>
    </tr>
    <tr>
        <td style=";padding-left:0px;">Attachment</td>
        <td>
            <input type="file" name="image[]" multiple>
        </td>
    </tr>
    <tr>
        <td style=";padding-left:0px;"><input type="submit" value="Post Prototype" name="postissue"></td>
    </tr>
</table> 

</form>