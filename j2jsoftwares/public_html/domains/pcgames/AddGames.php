<?php 
    $page="Games";
    include_once("header.php");
    include_once("sidebar.php");
?>                                                                                   
 <?php                                                                     
        if (isset($_POST['btnsubmit'])) {
            $Error=0;
           //  if (!(strlen(trim($_POST['Name']))>0)) {
          //      $ErrName ="Please Enter Name";
          //      $Error++;
            // }
             //if (!(strlen(trim($_POST['Size']))>0)) {
            //    $ErrSize ="Please Enter Size";
            //    $Error++;
            // }
            if (!(strlen(trim($_POST['Date']))>0)) {
                $ErrDate ="Please Enter Date";
                $Error++;
             }
            
             if (!(strlen(trim($_POST['Release']))>0)) {
                $ErrRelease ="Please Enter Release";
                $Error++;
             }
           
            
          //   $data = $mysql->select("select * from `_tbl_game_details` where  `GameName`='".$_POST['Name']."'");
            // if (sizeof($data)>0) {
              //   $ErrName = "Name Already Exists";
                // $Error++;
            // }
             if(strlen($_POST['DiscNumber'])>0){
             $data = $mysql->select("select * from `_tbl_game_details` where  `DiscNumber`='".$_POST['DiscNumber']."'");
             if (sizeof($data)>0) {
                 $ErrDiscNumber = "DiscNumber Already Exists";
                 $Error++;
             }
             }
             if($Error==0){                                                       
                 $target_dir = "/home/j2jsoftwares/public_html/domains/pcgames/uploads/GameImage/";
                 $target_dir_file = "/home/j2jsoftwares/public_html/domains/pcgames/uploads/GameFile/";
                  //  if (!is_dir($target_dir)) {
                    //    mkdir($target_dir, 0777, true);
                    //}
               
                    $err=0;
                    $_POST['GameImage']= "";
                    $_POST['GameFile']= "";
                    $acceptable = array('image/jpeg',
                                        'image/jpg',
                                        'image/png'
                                    );
                   $GameImage="";
                   $GameFile="";
                                    
                   if((!in_array($_FILES['GameImage']['type'], $acceptable)) && (!empty($_FILES["GameImage"]["type"]))) {
                        $err++;
                           $ErrGameImage= "Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                           echo "eroor1";
                    }
              
                    if (isset($_FILES["GameImage"]["name"]) && strlen(trim($_FILES["GameImage"]["name"]))>0 ) {
                        $GameImage = time().$_FILES["GameImage"]["name"];
                        if (!(move_uploaded_file($_FILES["GameImage"]["tmp_name"], $target_dir . $GameImage))) {
                           $err++;
                           $ErrGameImage= $_FILES["GameImage"]["tmp_name"].$target_dir . $GameImage."Sorry, there was an error uploading your files.";
                           echo "eroor2";
                        }
                    }
                    
                    if (isset($_FILES["GameFile"]["name"]) && strlen(trim($_FILES["GameFile"]["name"]))>0 ) {
                        $GameFile = time().$_FILES["GameFile"]["name"];
                        if (!(move_uploaded_file($_FILES["GameFile"]["tmp_name"], $target_dir_file . $GameFile))) {
                           $err++;
                           $ErrGameFile= $_FILES["GameFile"]["tmp_name"].$target_dir_file . $GameFile."Sorry, there was an error uploading your files.";
                           echo "eroor2";
                        }
                    }
                    
                    if ($err==0) {
                        
                        function getHttp($url) {
                            $curl = curl_init();
                            curl_setopt_array($curl, [CURLOPT_RETURNTRANSFER => 1,CURLOPT_URL => $url]);
                            $resp = curl_exec($curl);
                            curl_close($curl);
                            return $resp; 
                        }
                        
                        if (true) {
                            $resp = getHttp($_POST['GameUrl'])  ;
                            $data = explode(' class="post_imagem" src="',$resp);
                            $imageurl =  explode('"',$data[1]);
                            
                            $torrent = explode('/wp-content/uploads/files/',$resp);
                            $torrentulr =  explode('"',$torrent[1]);

                            $youtube = explode('https://www.youtube.com/embed/',$resp);
                            $youtubeulr =  explode('"',$youtube[1]);
     
                            $result = array("image"=>$imageurl[0],"torrent"=>"https://www.gamestorrents.nu/wp-content/uploads/files/".$torrentulr[0],"youtube"=>"https://www.youtube.com/embed/".$youtubeulr[0]);
                            
                            $GameImage = time()."_".basename($imageurl[0]);
                            file_put_contents("/home/j2jsoftwares/public_html/domains/pcgames/uploads/GameImage/".$GameImage,getHttp($imageurl[0]));
                            
                            $GameFile = time()."_".basename($torrentulr[0]);
                            file_put_contents("/home/j2jsoftwares/public_html/domains/pcgames/uploads/GameFile/".$GameFile,getHttp($result['torrent']));

                            $youtubeurl = ($_POST['YoutubeUrl']==1) ? $result['youtube'] :  $_POST['YoutubeUrl'];
                        }

                        $_POST['GameImage']= $GameImage;
                        $_POST['GameFile']= $GameFile;
                       
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
                                   
                                $diskSize = 0;
                                if ((isset($_POST['SizeMB']) && $_POST['SizeMB']>0)) {
                                        $diskSize =    $_POST['SizeMB'];
                                } else {
                                        $diskSize = 1024 * $_POST['SizeGB'];
                                }                                                                    
                                
                            $description = $_POST['Description'];
                            $description = str_replace('"','\"',$description);
                            $description = str_replace("'","\'",$description);
                                       //"Description"   => addslashes($_POST['Description']),
                        $id = $mysql->insert("_tbl_game_details",array("GameName"          => $_POST['Name'],
                                                                       "DiskSize"          => $diskSize,
                                                                       "Platform"      => $_POST['Platform'],
                                                                       "GameDate"          => $_POST['Date'],
                                                                       "Languages"     => $lang,
                                                                       "Release"       => $_POST['Release'],
                                                                       "Genre"         => $gen,
                                                                       "DiskFormat"        => $_POST['Format'],
                                                                       "YoutubeUrl"    => $youtubeurl,
                                                                       "DiscNumber"    => $_POST['DiscNumber'],
                                                                       "GameImage"     => $GameImage,
                                                                       "GameFile"      => $GameFile,
                                                                       "Description"   => addslashes($_POST['Description']),   
                                                                       "GameUrl"       => $_POST['GameUrl'],
                                                                       "CreatedOn"     => date("Y-m-d H:i:s")));
                          
                        unset($_POST);
                 if (sizeof($id)>0) {     
                   ?>

        <script>
        //    location.href = 'Games.php';
        </script>
        <?php  }
            } 
       }
       }
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
                                            <li class="breadcrumb-item active">Add Game Details
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
                                    <div class="card" style="background:#e5e5e5;">
                                        <div class="card-header">
                                            <h4 class="card-title">New Game Details</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Name<span id="star">*</span></label>               
                                                            <div class="controls">
                                                                <input type="text" name="Name" class="form-control" id="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>">
                                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <label>Size MB<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="SizeMB" class="form-control" id="Name" value="<?php echo (isset($_POST['Size']) ? $_POST['Size'] :"0");?>" style="text-align:right;">
                                                                <span class="errorstring" id="ErrSize"><?php echo isset($ErrSize)? $ErrSize : "";?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Size GB<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="SizeGB" class="form-control" id="Name" value="<?php echo (isset($_POST['Size']) ? $_POST['Size'] :"0");?>"  style="text-align:right;">
                                                                <span class="errorstring" id="ErrSize"><?php echo isset($ErrSize)? $ErrSize : "";?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Platform</label> 
                                                            <div class="controls">
                                                                <select name="Platform" id="Platform" class="form-control">
                                                                      <option value="PC" <?php echo ($_POST['Platform']=="PC") ? " selected='selected' " : "";?>>PC</option>
                                                                </select>
                                                            </div>                                                       
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Date<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="Date" class="form-control" id="Date" value="<?php echo (isset($_POST['Date']) ? $_POST['Date'] :"");?>">
                                                                <span class="errorstring" id="ErrDate"><?php echo isset($ErrDate)? $ErrDate : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label>Release<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <select name="Release" id="Release" class="form-control">
                                                                      <option value="CODEX" <?php echo ($_POST['Release']=="CODEX") ? " selected='selected' " : "";?>>CODEX</option>
                                                                      <option value="NA" <?php echo ($_POST['Release']=="NA") ? " selected='selected' " : "";?>>NA</option>
                                                                </select>
                                                                <span class="errorstring" id="ErrRelease"><?php echo isset($ErrRelease)? $ErrRelease : "";?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Format</label> 
                                                            <div class="controls">
                                                                <select name="Format" id="Format" class="form-control">
                                                                      <option value="BIN-CUE" <?php echo ($_POST['Format']=="BIN-CUE") ? " selected='selected' " : "";?>>BIN-CUE</option>
                                                                      <option value="CSO" <?php echo ($_POST['Format']=="CSO") ? " selected='selected' " : "";?>>CSO</option>
                                                                      <option value="DMG" <?php echo ($_POST['Format']=="DMG") ? " selected='selected' " : "";?>>DMG</option>
                                                                      <option value="ISO" <?php echo ($_POST['Format']=="ISO") ? " selected='selected' " : "";?>>ISO</option>
                                                                      <option value="MDF-MDS" <?php echo ($_POST['Format']=="MDF-MDS") ? " selected='selected' " : "";?>>MDF-MDS</option>
                                                                      <option value="NRG" <?php echo ($_POST['Format']=="NRG") ? " selected='selected' " : "";?>>NRG</option>
                                                                      <option value="PAL" <?php echo ($_POST['Format']=="PAL") ? " selected='selected' " : "";?>>PAL</option>
                                                                      <option value="RAR" <?php echo ($_POST['Format']=="RAR") ? " selected='selected' " : "";?>>RAR</option>
                                                                      <option value="USES" <?php echo ($_POST['Format']=="USES") ? " selected='selected' " : "";?>>USES</option>
                                                                </select>
                                                            </div>                                                       
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Disc Number<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="Text" name="DiscNumber" class="form-control" id="DiscNumber" value="<?php echo (isset($_POST['DiscNumber']) ? $_POST['DiscNumber'] :"");?>">      <br>
                                                                <span class="errorstring" id="ErrDiscNumber"><?php echo isset($ErrDiscNumber)? $ErrDiscNumber : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-8">
                                                            <label>Languages<span id="star">*</span></label>
                                                            <div class="controls">
                                                               <?php $checklan  = explode(',',$_POST['Languages']);?>                                                                              
                                                                <div class="row">
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="German" <?php if (in_array(German,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/ger.png" style="height:15px">&nbsp;German</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Chinese" <?php if (in_array(Chinese,$checklan)){ echo "checked"; }?>>&nbsp;Chinese</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Korean" <?php if (in_array(Korean,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/kor.png" style="height:15px">&nbsp;Korean</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Spanish" <?php if (in_array(Spanish,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/spa.png" style="height:15px">&nbsp;Spanish</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="French" <?php if (in_array(French,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/fre.png" style="height:15px">&nbsp;French</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="English" <?php if (in_array(English,$checklan)){ echo "checked"; }?>>&nbsp;<img src='https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/eng.png' style="height:15px">&nbsp;English</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Italian" <?php if (in_array(Italian,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/ita.png" style="height:15px">&nbsp;Italian</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Japanese" <?php if (in_array(Japanese,$checklan)){ echo "checked"; }?>>&nbsp;Japanese</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Portuguese" <?php if (in_array(Portuguese,$checklan)){ echo "checked"; }?>>&nbsp;Portuguese</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Russian" <?php if (in_array(Russian,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/rus.png" style="height:15px">&nbsp;Russian</div>
                                                                
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Russian" <?php if (in_array(Brazil,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/por.png" style="height:15px">&nbsp;Brazil</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Russian" <?php if (in_array(Turkish,$checklan)){ echo "checked"; }?>>&nbsp;<img src="https://www.gamestorrents.nu/wp-content/themes/GamesTorrent/css/images/flags/tur.png" style="height:15px">&nbsp;Turkish</div>
                                                                    <div class="col-sm-3"><input type="checkbox" name="Languages[]" value="Others" <?php if (in_array(Others,$checklan)){ echo "checked"; }?>>&nbsp;Others</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Genre<span id="star">*</span></label>
                                                            <div class="controls">
                                                            <div class="row">
                                                            <?php $checkgenre  = explode(',',$_POST['Genre']);?>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Action,$checkgenre)){ echo "checked"; }?>>&nbsp;Action</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Adventure" <?php if (in_array(Adventure,$checkgenre)){ echo "checked"; }?>>&nbsp;Adventure</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Driving,$checkgenre)){ echo "checked"; }?>>&nbsp;Driving</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Everyone,$checkgenre)){ echo "checked"; }?>>&nbsp;Everyone</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="RPG" <?php if (in_array(RPG,$checkgenre)){ echo "checked"; }?>>&nbsp;RPG</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Simulators,$checkgenre)){ echo "checked"; }?>>&nbsp;Simulators</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(sports,$checkgenre)){ echo "checked"; }?>>&nbsp;Sports</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Strategy,$checkgenre)){ echo "checked"; }?>>&nbsp;Strategy</div>
                                                                <div class="col-sm-6"><input type="checkbox" name="Genre[]" value="Simulators" <?php if (in_array(Others,$checkgenre)){ echo "checked"; }?>>&nbsp;Others</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                       <div class="col-md-12">
                                                            <label>Game Thumb<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="File"  class="form-control" name="GameImage" id="GameImage" value="<?php echo (isset($_POST['GameImage']) ? $_POST['GameImage'] :"");?>">      <br>
                                                                <span class="errorstring" id="ErrGameImage"><?php echo isset($ErrGameImage)? $ErrGameImage : "";?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label>Youtube Url<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="YoutubeUrl" class="form-control" id="YoutubeUrl" value="<?php echo (isset($_POST['YoutubeUrl']) ? $_POST['YoutubeUrl'] :"");?>">      <br>
                                                                <span class="errorstring" id="ErrYoutubeUrl"><?php echo isset($ErrYoutubeUrl)? $ErrYoutubeUrl : "";?></span>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <label>Game Torrent File<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="File" class="form-control" name="GameFile" id="GameFile" value="<?php echo (isset($_POST['GameFile']) ? $_POST['GameFile'] :"");?>">      <br>
                                                                <span class="errorstring" id="ErrGameFile"><?php echo isset($ErrGameFile)? $ErrGameFile : "";?></span>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                       
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Description<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <textarea name="Description" id="Description" style="height:170px" class="form-control"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?> </textarea>
                                                                <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                                            </div>    
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Game Url<span id="star">*</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="GameUrl" class="form-control" id="GameUrl" value="<?php echo (isset($_POST['GameUrl']) ? $_POST['GameUrl'] :"");?>">      <br>
                                                                <span class="errorstring" id="ErrGameUrl"><?php echo isset($ErrGameUrl)? $ErrGameUrl : "";?></span>
                                                            </div>
                                                        </div>
                                                    </div>                                                                 
                                                    <button type="submit" class="btn btn-primary" name="btnsubmit">Save Game</button> &nbsp;&nbsp;<a href="Games.php">List</a>
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