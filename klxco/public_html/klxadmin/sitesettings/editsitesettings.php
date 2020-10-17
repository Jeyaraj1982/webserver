<?php
     
     $obj = new CommonController();
    
  /*  if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }  */

   if (isset($_POST{"update"})) {
       
        /* for Background Image */
        if ((isset($_FILES['backgroundimg']['tmp_name'])) && (strlen(trim($_FILES['backgroundimg']['tmp_name']))>0)) {
            
            $filename    = strtolower("_".time()."_".basename($_FILES['backgroundimg']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
            if(move_uploaded_file($_FILES['backgroundimg']['tmp_name'], $target_path)) {
                 $_POST['param'][6] = $filename;
            } else {
                echo $obj->printError("Error: Background File upload");
            }
        }  
        
       if ((isset($_FILES['favicon']['tmp_name'])) && (strlen(trim($_FILES['favicon']['tmp_name']))>0)) {
    
           if (in_array($_FILES["favicon"]["type"],$iconimgArray)) {
              
            $filename    = strtolower("_".time()."_".basename($_FILES['favicon']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
                if(move_uploaded_file($_FILES['favicon']['tmp_name'], $target_path)) {
                     $_POST['param'][5] = $filename;
                } else {
                    echo $obj->printError("Error: Background File upload"); 
                }
             }else{
                 echo $obj->printError("Please upload .ico Format Image"); 
             }
        }  
        
       if ((isset($_FILES['menubgimage']['tmp_name'])) && (strlen(trim($_FILES['menubgimage']['tmp_name']))>0)) {
            
            $filename    = strtolower("_".time()."_".basename($_FILES['menubgimage']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
            if(move_uploaded_file($_FILES['menubgimage']['tmp_name'], $target_path)) {
                 $_POST['param'][9] = $filename;
            } else {
                echo $obj->printError("Error: Background File upload"); 
            }
        }  
        
       if ((isset($_FILES['logo']['tmp_name'])) && (strlen(trim($_FILES['logo']['tmp_name']))>0)) {
            
            $filename    = strtolower("_".time()."_".basename($_FILES['logo']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
            if(move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)) {
                 $_POST['param'][4] = $filename;
            } else {
                echo $obj->printError("Error: Background File upload"); 
            }
        }  
        
        if ((isset($_FILES['noimage']['tmp_name'])) && (strlen(trim($_FILES['noimage']['tmp_name']))>0)) {
            
            $filename    = strtolower("_".time()."_".basename($_FILES['noimage']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
            if(move_uploaded_file($_FILES['noimage']['tmp_name'], $target_path)) {
                 $_POST['param'][22] = $filename;
            } else {
                echo $obj->printError("Error: Background File upload"); 
            }
        }
        
        if ((isset($_FILES['footerbgimage']['tmp_name'])) && (strlen(trim($_FILES['footerbgimage']['tmp_name']))>0)) {
            
            $filename    = strtolower("_".time()."_".basename($_FILES['footerbgimage']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
            if(move_uploaded_file($_FILES['footerbgimage']['tmp_name'], $target_path)) {
                 $_POST['param'][15] = $filename;
            } else {
                echo $obj->printError("Error: Background File upload"); 
            }
        }
        
         if ((isset($_FILES['headerbgimg']['tmp_name'])) && (strlen(trim($_FILES['headerbgimg']['tmp_name']))>0)) {
            
            $filename    = strtolower("_".time()."_".basename($_FILES['headerbgimg']['name']));
            $target_path  = strtolower("../../assets/cms/".$filename); 
                
            if(move_uploaded_file($_FILES['headerbgimg']['tmp_name'], $target_path)) {
                 $_POST['param'][45] = $filename;
            } else {
                echo $obj->printError("Error: Background File upload"); 
            }
        }

                             
       foreach($_POST['param'] as $key=>$value)  {
           
           if(trim($_POST['param'][41])>0){
               
               $h=str_replace("'","\\'",$_POST['param'][41]);
               $tsql = "update _jsitesettings set paramvalue='".$h."' where settingsid=".$key; 
               $mysql->execute($tsql); 
           }else{
                $sql = "update _jsitesettings set paramvalue='".$value."' where settingsid=".$key;
                $mysql->execute($sql);  
           }
                      
       }
        if($obj->err==0){
            echo $obj->printSuccess("Updated Successfully");
        }
          
      } 
      
      if (isset($_POST['rmimage'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='backgroundimg'");
             echo $obj->printSuccess("Image Removed Successfully");
      }
        
      if (isset($_POST['rmimageicon'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='favicon'");
             echo $obj->printSuccess("Image Removed Successfully");
      }
        
      if (isset($_POST['rmimagemenu'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='menubgimage'");
             echo $obj->printSuccess("Image Removed Successfully");
      }
        
      if (isset($_POST['rmimagelogo'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='logo'");
             echo $obj->printSuccess("Image Removed Successfully");
      } 

      if (isset($_POST['rmimagenoimg'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='noimage'");
             echo $obj->printSuccess("Image Removed Successfully");
      }
        
      if (isset($_POST['rmimagefooter'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='footerbgimage'");
             echo $obj->printSuccess("Image Removed Successfully");
      }
      
      if (isset($_POST['rmimageheader'])) {
             $mysql->execute("update _jsitesettings set paramvalue='' where param='headerbgimg'");
             echo $obj->printSuccess("Image Removed Successfully");
      }    
 

    
    $data=$mysql->select("select * from _jsitesettings");           
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Site Settings
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkInputs();">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Site Title</label>
                                    <div class="col-md-3">
                                        <input type="text" name="param[1]" value="<?php echo $data[0]['paramvalue'];?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Site name</label>
                                    <div class="col-md-3">
                                        <input type="text" name="param[2]" value="<?php echo $data[1]['paramvalue'];?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Site Url</label>
                                    <div class="col-md-3">
                                        <input type="text" name="param[3]" value="<?php echo $data[2]['paramvalue'];?>" Class="form-control">(Ex:http://localhost/abc)
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Logo</label>
                                    <div class="col-md-3">
                                        <?php if (strlen(trim($data[3]['paramvalue']))>0) {?>
                                        <img src="../../assets/cms/<?php echo $data[3]['paramvalue'];?>" height="100"><br>
                                        <input type="submit" value="Remove" name="rmimagelogo">
                                        <?php } ?>
                                        <input type="file" class="input" size="30" name="logo"/>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Favorite Icon</label>
                                    <div class="col-md-3">
                                        <?php if (strlen(trim($data[4]['paramvalue']))>0) {?>  
                                        <img src="../../assets/cms/<?php echo $data[4]['paramvalue'];?>" width="20">
                                        <input type="submit" value="Remove" name="rmimageicon">
                                        <?php } ?>
                                        <input type="file" class="input" name="favicon" size="30"/>
                                    </div>
                               </div>  
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Header Background Image</label>
                                    <div class="col-md-3">
                                        <?php if (strlen(trim($data[44]['paramvalue']))>0) {?>
                                        <img src="../../assets/cms/<?php echo $data[44]['paramvalue'];?>" height="100"> <br>
                                        <input type="submit" value="Remove" name="rmimageheader">
                                        <?php } ?>
                                        <input type="file" class="input" size="30" name="headerbgimg"/><br>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Header background Color</label>
                                    <div class="col-md-3">                                                       
                                        <input name="param[46]" value="<?php echo $data[45]['paramvalue'];?>" class="form-control">
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Display Slider Prev/Next Icon</label>
                                    <div class="col-md-3">                                                       
                                        <select name="param[47]"  class="form-control">
                                                <option value='none' <?php echo ($data[46]['paramvalue']=='none') ? 'selected="selected"' : '';?>>none</option>
                                                <option value='block' <?php echo ($data[46]['paramvalue']=='block') ? 'selected="selected"' : '';?>>block</option>
                                        </select>
                                    </div>
                               </div>
                               <hr style="border:none;border-bottom:1px solid #e5e5e5">
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Background Image</label>
                                    <div class="col-md-3">                                                       
                                        <?php if (strlen(trim($data[5]['paramvalue']))>0) {?>
                                        <img src="../../assets/cms/<?php echo $data[5]['paramvalue'];?>" height="100"> <br>
                                        <input type="submit" value="Remove" name="rmimage">
                                        <?php } ?>
                                        <input type="file" class="input" size="30" name="backgroundimg"/><br>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Background Position</label>
                                    <div class="col-md-3">                                                       
                                        <select name="param[7]" class="form-control">
                                            <option value='no-repeat' <?php echo ($data[6]['paramvalue']=='no-repeat') ? 'selected="selected"' : '';?>>no-repeat</option>
                                            <option value='repeat-x' <?php echo ($data[6]['paramvalue']=='repeat-x') ? 'selected="selected"' : '';?>>repeat-x</option>
                                            <option value='repeat-y' <?php echo ($data[6]['paramvalue']=='repeat-y') ? 'selected="selected"' : '';?>>repeat-y</option>
                                            <option value='repeat' <?php echo ($data[6]['paramvalue']=='repeat') ? 'selected="selected"' : '';?>>repeat</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Background Color</label>
                                    <div class="col-md-3"><input name="param[8]" value="<?php echo $data[7]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <hr style="border:none;border-bottom:1px solid #e5e5e5">
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Menu Background Image</label>
                                    <div class="col-md-3">
                                        <?php if (strlen(trim($data[8]['paramvalue']))>0) {?>
                                        <img src="../../assets/cms/<?php echo $data[8]['paramvalue'];?>" height="100"><br>
                                        <input type="submit" value="Remove" name="rmimagemenu">
                                        <?php } ?> 
                                        <input type="file" class="input" size="30" name="menubgimage"/>    
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Menu Font Family</label>
                                    <div class="col-md-3">
                                        <select id="param[11]" name="param[11]" onchange="window.open('loadfont.php?fontid='+this.value,'loadfont')">
                                            <?php foreach($mysql->select("select * from _jfonts") as $font) { ?>
                                                    <option value="<?php echo $font['fontid'];?>" <?php echo ($font['fontid']==$data[10]['paramvalue'])? 'selected="selected"' : '';?>><?php echo $font['fontname'];?></option>
                                            <?php } ?>
                                                
                                            </select>
                                            <br>
                                            <iframe src="loadfont.php?fontid=<?php echo $data[10]['paramvalue']; ?>" id="loadfont" name="loadfont" style="height: 100px;width:500px;border:none;" scrolling="no">
                                            </iframe>   
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Menu-Hover</label>
                                    <div class="col-md-3"><input name="param[12]" value="<?php echo $data[11]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Menu Font Size</label>
                                    <div class="col-md-3">
                                        <select name="param[14]" class="form-control" value="<?php echo $data[13]['paramvalue'];?>">
                                            <?php for ($i=8;$i<=70;$i++){ ?>
                                            <option value="<?php echo $i;?>"<?php echo ($i==$data[13]['paramvalue']) ? 'selected="selected"' :'';?>><?php echo $i;?></option>
                                             <?php  } ?> 
                                         </select>
                                    </div>
                               </div>
                               <hr style="border:none;border-bottom:1px solid #e5e5e5">
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer Background Image</label>
                                    <div class="col-md-3">
                                        <?php if (strlen(trim($data[14]['paramvalue']))>0) {?>
                                        <img src="../../assets/cms/<?php echo $data[14]['paramvalue'];?>" height="100"><br>
                                        <input type="submit" value="Remove" name="rmimagefooter">
                                        <?php } ?> 
                                        <input type="file" class="input" size="30" name="footerbgimage"/>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer Background Color</label>
                                    <div class="col-md-3"><input name="param[16]" value="<?php echo $data[15]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer Font Family</label>
                                    <div class="col-md-3">
                                        <select id="param[17]" name="param[17]" onchange="window.open('loadfont.php?fontid='+this.value,'loadfont1')">
                                            <?php foreach($mysql->select("select * from _jfonts") as $font) { ?>
                                                    
                                                    <option value="<?php echo $font['fontid'];?>" <?php echo ($font['fontid']==$data[16]['paramvalue']) ? 'selected="selected"' : '';?>><?php echo $font['fontname'] ;?></option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                        <iframe src="loadfont.php?fontid=<?php echo $data[16]['paramvalue']; ?>" id="loadfont1" name="loadfont1" style="height: 100px;width:500px;border:none;" scrolling="no">
                                        </iframe>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer Font Color</label>
                                    <div class="col-md-3"><input name="param[18]" value="<?php echo $data[17]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer-Hover</label>
                                    <div class="col-md-3"><input name="param[19]" value="<?php echo $data[18]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer Font Size</label>
                                    <div class="col-md-3">
                                        <select name="param[20]" class="form-control" value="<?php echo $data[19]['paramvalue'];?>">
                                            <?php for ($i=8;$i<=70;$i++){ ?>
                                         <option value="<?php echo $i;?>" <?php echo ($i==$data[19]['paramvalue'])? 'selected="selected"' :'';?>><?php echo $i;?></option>
                                         <?php   }      ?> 
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Footer Banner</label>
                                    <div class="col-md-3"><input name="param[21]" value="<?php echo $data[20]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <hr style="border:none;border-bottom:1px solid #e5e5e5">
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Default No Image</label>
                                    <div class="col-md-3">
                                        <?php if (strlen(trim($data[21]['paramvalue']))>0) {?> 
                                        <img src="../../assets/cms/<?php echo $data[21]['paramvalue'];?>" height="100"><br>
                                        <input type="submit" value="Remove" name="rmimagenoimg">
                                        <?php } ?>
                                        <input type="file" class="input" size="30" name="noimage"/>
                                    </div>
                               </div>
                               <hr style="border:none;border-bottom:1px solid #e5e5e5">
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable Contact</label>
                                    <div class="col-md-3">
                                        <select name="param[23]" class="form-control">
                                                <option value='1' <?php echo $data[22]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                                <option value='0' <?php echo ($data[22]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Linked Page To</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="param[24]">
                                            <?php foreach(JPages::getPages() as $page) {?>
                                            <option value="<?php echo $page['pageid'];?>" <?php echo ($page['pageid']==$data[23]['paramvalue'])? 'selected="selected"' :'';?>><?php echo $page['pagetitle'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Email To</label>
                                    <div class="col-md-3"><input type="text" name="param[25]" id="emailto" value="<?php echo $data[24]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Email To</label>
                                    <div class="col-md-3"><input type="text" name="param[25]" id="emailto" value="<?php echo $data[24]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <hr style="border:none;border-bottom:1px solid #e5e5e5">
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable Faq</label>
                                    <div class="col-md-3">
                                        <select name="param[26]" class="form-control">
                                            <option value='1' <?php echo $data[25]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[25]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable SuccessStory</label>
                                    <div class="col-md-3">
                                        <select name="param[27]" class="form-control">
                                            <option value='1' <?php echo $data[26]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[26]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable Testimonials</label>
                                    <div class="col-md-3">
                                        <select name="param[28]" class="form-control">
                                            <option value='1' <?php echo $data[27]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[27]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable PostAd</label>
                                    <div class="col-md-3">
                                        <select name="param[29]" class="form-control">
                                            <option value='1' <?php echo $data[28]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[28]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable Support</label>
                                    <div class="col-md-3">
                                        <select name="param[30]" class="form-control">
                                            <option value='1' <?php echo $data[29]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[29]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable Product</label>
                                    <div class="col-md-3">
                                        <select name="param[43]" class="form-control">
                                            <option value='1' <?php echo $data[42]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[42]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Is Enable Subscriber</label>
                                    <div class="col-md-3">
                                        <select name="param[44]" class="form-control">
                                            <option value='1' <?php echo $data[43]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[43]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Facebook Url</label>
                                    <div class="col-md-3"><input type="text" name="param[34]" size="40" class="form-control" value="<?php echo $data[33]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Twitter Url</label>
                                    <div class="col-md-3"><input type="text" name="param[31]" size="40" class="form-control" value="<?php echo $data[30]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Youtube Url</label>
                                    <div class="col-md-3"><input type="text" name="param[32]" size="40" class="form-control" value="<?php echo $data[31]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">GooglePlus Url</label>
                                    <div class="col-md-3"><input type="text" name="param[33]" size="40" class="form-control" value="<?php echo $data[32]['paramvalue'];?>" class="form-control"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Share page</label>
                                    <div class="col-md-3">
                                        <select name="param[35]" class="form-control">
                                            <option value='1' <?php echo $data[34]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                            <option value='0' <?php echo ($data[34]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Share page Size</label>
                                    <div class="col-md-3">                                                                
                                        <select name="param[36]" class="form-control">
                                            <option value='large' <?php echo $data[35]['paramvalue'] ? 'selected="selected"' : '';?>>large</option>
                                            <option value='small' <?php echo ($data[35]['paramvalue']!=1) ? 'selected="selected"' : '';?>>small</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">No.of Success Story per Page</label>
                                    <div class="col-md-3">                                                                
                                        <select name="param[37]" value="<?php echo $data[36]['paramvalue'];?>" class="form-control">
                                            <?php for ($i=1;$i<=50;$i++){ ?>
                                             <option value="<?php echo $i;?>" <?php echo ($i==$data[36]['paramvalue'])? 'selected="selected"' :'';?>><?php echo $i;?></option>
                                             <?php   } ?> 
                                        </select>
                                    </div>
                               </div>                                 
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">No.of Testimonial per Page</label>
                                    <div class="col-md-3">                                                                
                                         <select name="param[39]" value="<?php echo $data[38]['paramvalue'];?>" class="form-control">
                                            <?php for ($i=1;$i<=50;$i++){ ?>
                                             <option value="<?php echo $i;?>" <?php echo ($i==$data[38]['paramvalue'])? 'selected="selected"' :'';?>><?php echo $i;?></option>
                                             <?php   } ?> 
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Layout</label>
                                    <div class="col-md-3">                                                                
                                         <table>
                                            <tr>
                                                <td><input type="radio" name="param[42]"  value="1" <?php echo ($data[41]['paramvalue']==1) ? 'checked="checked"' : '';?>></td>
                                                <td><input type="radio" name="param[42]"  value="2" <?php echo ($data[41]['paramvalue']==2) ? 'checked="checked"' : '';?>></td>
                                                <td><input type="radio" name="param[42]"  value="3" <?php echo ($data[41]['paramvalue']==3) ? 'checked="checked"' : '';?>></td>
                                            </tr>
                                            <tr>
                                                <td><img src="../../assets/images/layout_right.png"></td>
                                                <td><img src="../../assets/images/layout_left.png"></td>
                                                <td><img src="../../assets/images/layout_full.png"></td>
                                            </tr>
                                        </table>
                                    </div>
                               </div> 
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Display ContactUs On Homepage</label>
                                    <div class="col-md-3">                                                                
                                         <select name="param[40]" class="form-control">
                                                <option value='1' <?php echo $data[39]['paramvalue'] ? 'selected="selected"' : '';?>>Yes</option>
                                                <option value='0' <?php echo ($data[39]['paramvalue']!=1) ? 'selected="selected"' : '';?>>No</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="IsActive" class="col-md-3 text-right">Display ContactUs</label>
                                    <div class="col-md-3">                                                                
                                         <textarea class="mceEditor" style="height: 350px;width:100%" name="param[41]" class="form-control"><?php echo $data[40]['paramvalue'];?></textarea>
                                    </div>
                               </div>                                 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="update">update</button>
                                    </div>                                        
                                </div>
                            </div>
                        </form>                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>$('#success').hide(3000);</script> 