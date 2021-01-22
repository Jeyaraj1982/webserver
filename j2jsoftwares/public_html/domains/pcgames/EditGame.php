<?php 
    $page="Games";
    include_once("header.php");
    include_once("sidebar.php");
?>
 <?php

        if (isset($_POST['btnsubmit'])) {
            $Error=0;
             if (!(strlen(trim($_POST['Name']))>0)) {
                $ErrName ="Please Enter Name";
                $Error++;
             }
             if (!(strlen(trim($_POST['Size']))>0)) {
                $ErrSize ="Please Enter Size";                      
                $Error++;
             }
            if (!(strlen(trim($_POST['Date']))>0)) {
                $ErrDate ="Please Enter Date";
                $Error++;                                                       
             }
            
             if (!(strlen(trim($_POST['Release']))>0)) {
                $ErrRelease ="Please Enter Release";
                $Error++;
             }
           
            
             $datas = $mysql->select("select * from `_tbl_game_details` where  `GameName`='".$_POST['Name']."' and `GameID`<>'".$_GET['Code']."'");
             if (sizeof($datas)>0) {
                 $ErrName = "Name Already Exists";
                 $Error++;
             }
             if(strlen($_POST['DiscNumber'])>0){
             $datas = $mysql->select("select * from `_tbl_game_details` where  `DiscNumber`='".$_POST['DiscNumber']."' and `GameID`<>'".$_GET['Code']."'");
             if (sizeof($datas)>0) {
                 $ErrDiscNumber = "Disc Number Already Exists";
                 $Error++;
             }
             }
             
              $acceptable = array('image/jpeg',
                                        'image/jpg',
                                        'image/png'
                                    );
               $GameImage = "";
               if (isset($_FILES["GameImage"]["name"]) && strlen(trim($_FILES["GameImage"]["name"]))>0 ) {
                   $target_dir = "/home/japps/public_html/games/uploads/GameImage/";
                   if((!in_array($_FILES['GameImage']['type'], $acceptable)) && (!empty($_FILES["GameImage"]["type"]))) {
                       $Error++;
                       $ErrGameImage= "Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                   } else {
                       if (isset($_FILES["GameImage"]["name"]) && strlen(trim($_FILES["GameImage"]["name"]))>0 ) {
                           $GameImage = time().$_FILES["GameImage"]["name"];
                           if (!(move_uploaded_file($_FILES["GameImage"]["tmp_name"], $target_dir . $GameImage))) {
                               $Error++;
                               $ErrGameImage= "Sorry, there was an error uploading your files.";
                           }
                       }
                   }
               }
             
             $GameFile = "";
             if (isset($_FILES["GameFile"]["name"]) && strlen(trim($_FILES["GameFile"]["name"]))>0 ) {
                 
                 $target_dir_file = "/home/japps/public_html/games/uploads/GameFile/";
                 
                 
                 if (isset($_FILES["GameFile"]["name"]) && strlen(trim($_FILES["GameFile"]["name"]))>0 ) {
                    $GameFile = time().$_FILES["GameFile"]["name"];
                    if (!(move_uploaded_file($_FILES["GameFile"]["tmp_name"], $target_dir_file . $GameFile))) {
                        $Error++;
                        $ErrGameFile= $_FILES["GameFile"]["tmp_name"].$target_dir_file . $GameFile."Sorry, there was an error uploading your files.";
                    }
                 }
             }
             
             if($Error==0){
                 
                 $Languages = $_POST['Languages'];
                 $lang="";  
                 foreach($Languages as $Lang1)  
                 {  
                 $lang.= $Lang1.",";  
                 }
                 $Genre = $_POST['Genre'];                                                     
                 $gen="";  
                 foreach($Genre as $gen1)  
                 {  
                 $gen.= $gen1.",";  
                 }  
                 $sql = "update `_tbl_game_details` set `GameName`  ='".$_POST['Name']."',
                                                                        `DiskSize`  ='".$_POST['Size']."',
                                                                        `Platform`  ='".$_POST['Platform']."',
                                                                        `GameDate`  ='".$_POST['Date']."',
                                                                        `Languages`  ='".$lang."',
                                                                        `Release`  ='".$_POST['Release']."',
                                                                        `Genre`  ='".$gen."',
                                                                        `DiskFormat`  ='".$_POST['Format']."',
                                                                        `DiscNumber`  ='".$_POST['DiscNumber']."',
                                                                        `YoutubeUrl`  ='".$_POST['YoutubeUrl']."',
                                                                        `GameUrl`  ='".$_POST['GameUrl']."',
                                                                        `Description`  ='".$_POST['Description']."' ";
                 if ($GameImage!=""){
                     $sql .= ", `GameImage` ='".$GameImage."' ";
                 }
                 
                 if ($GameFile!=""){
                     $sql .= ", `GameFile`  ='".$GameFile."' ";
                 }
                 $id= $mysql->execute( $sql. " where `GameID`='".$_GET['Code']."'");
             
            } 
      
       }
           $data = $mysql->select("Select * from _tbl_game_details where GameID='".$_GET['Code']."'");
      ?>   
                                                                                 
            <style>
                .errorstring {
                    color: #FF5B5C;
                }
            </style>
            <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                        <div class="content-header-left col-12 mb-2 mt-1">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h5 class="content-header-title float-left pr-1 mb-0">Games</h5>
                                    <div class="breadcrumb-wrapper col-12">
                                        <ol class="breadcrumb p-0 mb-0">
                                            <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Games</a>
                                            </li>
                                            <li class="breadcrumb-item active">Edit Game Details
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body">
                        <section class="input-validation">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Edit Game Details</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Name<span id="star">*</span></label>               
                                                            <div class="controls">
                                                                <input type="text" name="Name" class="form-control" id="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] : $data[0]['GameName']);?>">
                                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label>Size<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="Size" class="form-control" id="Name" value="<?php echo (isset($_POST['Size']) ? $_POST['Size'] : $data[0]['DiskSize']);?>">
                                                                <span class="errorstring" id="ErrSize"><?php echo isset($ErrSize)? $ErrSize : "";?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Platform</label> 
                                                            <div class="controls">
                                                                <select name="Platform" id="Platform" class="form-control">
                                                                      <option value="PC" <?php echo (isset($_POST[ 'Platform'])) ? (($_POST[ 'Platform']=="PC" ) ? " selected='selected' " : "") : (($data[0][ 'Platform']=="PC" ) ? " selected='selected' " : "");?>>PC</option>
                                                                </select>
                                                            </div>                                                       
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Date<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="Date" class="form-control" id="Date" value="<?php echo (isset($_POST['Date']) ? $_POST['Date'] : $data[0]['GameDate']);?>">
                                                                <span class="errorstring" id="ErrDate"><?php echo isset($ErrDate)? $ErrDate : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label>Release<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <select name="Release" id="Release" class="form-control">
                                                                      <option value="CODEX" <?php echo (isset($_POST[ 'Release'])) ? (($_POST[ 'Release']=="CODEX" ) ? " selected='selected' " : "") : (($data[0][ 'Release']=="CODEX" ) ? " selected='selected' " : "");?>>CODEX</option>
                                                                      <option value="NA" <?php echo (isset($_POST[ 'Release'])) ? (($_POST[ 'Release']=="NA" ) ? " selected='selected' " : "") : (($data[0][ 'Release']=="NA" ) ? " selected='selected' " : "");?>>NA</option>
                                                                </select>
                                                                <span class="errorstring" id="ErrRelease"><?php echo isset($ErrRelease)? $ErrRelease : "";?></span>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4">
                                                            <label>Format</label>                                                                      
                                                            <div class="controls">
                                                                <select name="Format" id="Format" class="form-control">
                                                                    <option value="BIN-CUE" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="BIN-CUE" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="BIN-CUE" ) ? " selected='selected' " : "");?>>BIN-CUE</option>
                                                                    <option value="CSO" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="CSO" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="CSO" ) ? " selected='selected' " : "");?>>CSO</option>
                                                                    <option value="DMG" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="DMG" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="DMG" ) ? " selected='selected' " : "");?>>DMG</option>
                                                                    <option value="ISO" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="ISO" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="ISO" ) ? " selected='selected' " : "");?>>ISO</option>
                                                                    <option value="MDF-MDS" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="MDF-MDS" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="MDF-MDS" ) ? " selected='selected' " : "");?>>MDF-MDS</option>
                                                                    <option value="NRG" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="NRG" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="NRG" ) ? " selected='selected' " : "");?>>NRG</option>
                                                                    <option value="PAL" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="PAL" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="PAL" ) ? " selected='selected' " : "");?>>PAL</option>
                                                                    <option value="RAR" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="RAR" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="RAR" ) ? " selected='selected' " : "");?>>RAR</option>
                                                                    <option value="USES" <?php echo (isset($_POST[ 'Format'])) ? (($_POST[ 'Format']=="USES" ) ? " selected='selected' " : "") : (($data[0][ 'DiskFormat']=="USES" ) ? " selected='selected' " : "");?>>USES</option>
                                                                </select>
                                                            </div>                                                       
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Disc Number</label>
                                                            <div class="controls">
                                                                <input type="Text" name="DiscNumber" class="form-control" id="DiscNumber" value="<?php echo (isset($_POST['DiscNumber']) ? $_POST['DiscNumber'] : $data[0]['DiscNumber']);?>">      <br>
                                                                <span class="errorstring" id="ErrDiscNumber"><?php echo isset($ErrDiscNumber)? $ErrDiscNumber : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-8">
                                                            <label>Languages<span id="star">*</span></label>
                                                            <div class="controls">   
                                                             <?php $checklan  = explode(',',$data[0]['Languages']);?>                                                                              
                                                                <input type="checkbox" name="Languages[]" value="German" <?php if (in_array(German,$checklan)){ echo "checked"; }?>>German
                                                                <input type="checkbox" name="Languages[]" value="Chinese" <?php if (in_array(Chinese,$checklan)){ echo "checked"; }?>>Chinese
                                                                <input type="checkbox" name="Languages[]" value="Korean" <?php if (in_array(Korean,$checklan)){ echo "checked"; }?>>Korean
                                                                <input type="checkbox" name="Languages[]" value="Spanish" <?php if (in_array(Spanish,$checklan)){ echo "checked"; }?>>Spanish
                                                                <input type="checkbox" name="Languages[]" value="French" <?php if (in_array(French,$checklan)){ echo "checked"; }?>>French
                                                                <input type="checkbox" name="Languages[]" value="English" <?php if (in_array(English,$checklan)){ echo "checked"; }?>>English
                                                                <input type="checkbox" name="Languages[]" value="Italian" <?php if (in_array(Italian,$checklan)){ echo "checked"; }?>>Italian
                                                                <input type="checkbox" name="Languages[]" value="Japanese" <?php if (in_array(Japanese,$checklan)){ echo "checked"; }?>>Japanese
                                                                <input type="checkbox" name="Languages[]" value="Portuguese" <?php if (in_array(Portuguese,$checklan)){ echo "checked"; }?>>Portuguese
                                                                <input type="checkbox" name="Languages[]" value="Russian" <?php if (in_array(Russian,$checklan)){ echo "checked"; }?>>Russian
                                                                <input type="checkbox" name="Languages[]" value="Others" <?php if (in_array(Others,$checklan)){ echo "checked"; }?>>Others
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Genre<span id="star">*</span></label>
                                                            <div class="controls">
                                                            <?php $checkgenre  = explode(',',$data[0]['Genre']);?>
                                                                <input type="checkbox" name="Genre[]" value="Adventure" <?php if (in_array(Adventure,$checkgenre)){ echo "checked"; }?>>Adventure
                                                                <input type="checkbox" name="Genre[]" value="RPG" <?php if (in_array(RPG,$checkgenre)){ echo "checked"; }?>>RPG
                                                                <input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Simulators,$checkgenre)){ echo "checked"; }?>>Simulators
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label>Game Image<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <img src="uploads/GameImage/<?php echo $data[0]['GameImage'];?>"><br>
                                                                <input type="File" name="GameImage" id="GameImage">      <br>
                                                                <span class="errorstring" id="ErrGameImage"><?php echo isset($ErrGameImage)? $ErrGameImage : "";?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label>Youtube Url<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="YoutubeUrl" class="form-control" id="YoutubeUrl" value="<?php echo (isset($_POST['YoutubeUrl']) ? $_POST['YoutubeUrl'] : $data[0]['YoutubeUrl']);?>">      <br>
                                                                <span class="errorstring" id="ErrYoutubeUrl"><?php echo isset($ErrYoutubeUrl)? $ErrYoutubeUrl : "";?></span>
                                                                <iframe width="560" height="315" src="<?php echo $data[0]['YoutubeUrl'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <div class="col-md-12" style="text-align: center;">
                                                            <label>Game File<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <?php echo $data[0]['GameFile'];?><br>
                                                                <input type="File" name="GameFile" id="GameFile">      <br>                
                                                                <span class="errorstring" id="ErrGameFile"><?php echo isset($ErrGameFile)? $ErrGameFile : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Description<span id="star">*</span></label>
                                                            <div class="controls">                                                                                 
                                                                <textarea name="Description" class="form-control" id="Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : $data[0]['Description']);?></textarea>
                                                                <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Game Url<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="GameUrl" class="form-control" id="GameUrl" value="<?php echo (isset($_POST['GameUrl']) ? $_POST['GameUrl'] : $data[0]['GameUrl']);?>">      <br>
                                                                <span class="errorstring" id="ErrGameUrl"><?php echo isset($ErrGameUrl)? $ErrGameUrl : "";?></span>
                                                               <!-- <iframe width="560" height="315" src="<?php //echo $data[0]['GameUrl'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label style="color:green;">
                                                    <?php echo $successmessage;?>
                                                </label>        <br>
                                                    <button type="submit" class="btn btn-primary" name="btnsubmit">Update</button> &nbsp;&nbsp;<a href="Games.php">List</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                      
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            <?php include_once("footer.php");?>