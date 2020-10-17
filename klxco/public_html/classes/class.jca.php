<?php
  $iconimgArray = array("image/x-icon");
  $MusicArray = array("audio/mp3","audio/mpeg","audio/wav");
  $musicMaxSize = 20000000;
  $DownloadArray = array("image/jpeg","image/jpg","image/gif","image/png","application/pdf","application/doc","application/zip","application/oda","application/odt","application/x-zip-compressed");
  $downloadMaxSize = 20000000;
  $imageArray   = array("image/jpeg","image/jpg","image/gif","image/png","image/bmp");
  $imgMaxSize   = 20000000;
  
  class Jca{
      
            function getAppSetting($property){
                global $mysql;
                $settings = $mysql->select("select * from _jsitesettings");    
                $f = 0;
                
            switch($property) {
                case 'sitetitle'                : $keyvalue = 0; break;
                case 'sitename'                 : $keyvalue = 1; break;
                case 'siteurl'                  : $keyvalue = 2;break;
                case 'logo'                     : $keyvalue = 3; break;  
                case 'backgroundimg'            : $keyvalue = 5; break;
                case 'sitebgposition'           : $keyvalue = 6; break;
                case 'backgroundcolor'          : $keyvalue = 7; break;
                case 'menubgimage'              : $keyvalue = 8; break;
                case 'menubgcolor'              : $keyvalue = 9; break;
                case 'menufontcolor'            : $keyvalue = 11; break;
                case 'menufont'                 : $f = $mysql->select("select * from _jfonts where fontid=".$settings[10]['paramvalue']);
                                                  $settings[$keyvalue]['paramvalue']=$f[0]['fontname'];break;
                case 'headerhover'              : $keyvalue = 12; break;
                case 'menufontsize'             : $keyvalue = 13; break;
                case 'footerbgimage'            : $keyvalue = 14; break;
                case 'footerbgcolor'            : $keyvalue = 15; break;
                case 'footerfontcolor'          : $keyvalue = 17; break;
                case 'footerfont'               : $f = $mysql->select("select * from _jfonts where fontid=".$settings[16]['paramvalue']);
                                                  $settings[$keyvalue]['paramvalue']=$f[0]['fontname'];break;
                case 'footerhover'              : $keyvalue = 18; break; 
                case 'footerfontsize'           : $keyvalue = 19; break;
                case 'footerbanner'             : $keyvalue = 20; break;
                case 'noimage'                  : $keyvalue = 21; break; 
                case 'isenablecontact'          : $keyvalue = 22; break; 
                case 'linkedpage'               : $keyvalue = 23; break;  
                case 'emailto'                  : $keyvalue = 24; break;
                case 'isenablefaq'              : $keyvalue = 25; break;
                case 'isenablestory'            : $keyvalue = 26; break;
                case 'isenabletestimonial'      : $keyvalue = 27; break;
                case 'isenableadpost'           : $keyvalue = 28; break;
                case 'isenablesupport'          : $keyvalue = 29; break;
                case 'twitterurl'               : $keyvalue = 30; break;
                case 'youtubeurl'               : $keyvalue = 31; break;
                case 'googleplusurl'            : $keyvalue = 32; break;
                case 'facebookurl'              : $keyvalue = 33; break;
                case 'sharepage'                : $keyvalue = 34; break;   
                case 'sharesize'                : $keyvalue = 35; break; 
                case 'postadperpage'            : $keyvalue = 36; break;
                case 'storyperpage'             : $keyvalue = 37; break;
                case 'testmperpage'             : $keyvalue = 38; break;
                case 'displaycontactushome'     : $keyvalue = 39; break;
                case 'displaycontact'           : $keyvalue = 40; break; 
                case 'layout'                   : $keyvalue = 41; break;
                case 'isenableproduct'          : $keyvalue = 42; break; 
                case 'isenablesubscriber'       : $keyvalue = 43; break; 
                case 'headerbgimg'              : $keyvalue = 44; break;
                case 'headerbgcolor'            : $keyvalue = 45; break;
                case 'sliderhideicon'           : $keyvalue = 46; break;
                      
            } 
            return $settings[$keyvalue]['paramvalue'];
        }
    }
    
   class MenuItems{
       
       function addMenu($param){
          global $mysql; 
          $m = ($param['isHeader']==1) ? $mysql->select("select * from _jmenu where isheader=1") : $mysql->select("select * from _jmenu where isheader=0");   
          $param['orderf']=sizeof($m)+1;
          return $mysql->insert("_jmenu",array("menuname"=>$param['menuname'],"pageid"=>$param['pagenameid'],"isheader"=>$param['isHeader'],"target"=>$param['target'],"customurl"=>$param['customurl'],"linkedto"=>$param['linkedto'],"orderf"=>$param['orderf'])); 
       }
       
       function updateMenu($param,$menuid){
          global $mysql;                                                                                                                                                                                                                    
          return $mysql->execute("UPDATE _jmenu SET menuname='".$param['menuname']."',pageid='".$param['pagenameid']."',isheader='".$param['isHeader']."',target='".$param['target']."',customurl='".$param['customurl']."',orderf='".$param['orderf']."',linkedto='".$param['linkedto']."' WHERE menuid='".$param['menuid']."'"); 
       }
       
       function getMenu($menuid){
          global $mysql;
          return $mysql->select("select * from _jmenu where menuid='".$menuid."'");
       }
       
       function deleteMenu($menuid){
          global $mysql;
          return $mysql->execute("delete from _jmenu where menuid='".$menuid."'");
       }
       
       function getHeaderMenuItems(){
          global $mysql;
          return $mysql->select("select * from _jmenu where isheader=1 order by orderf"); 
       }
       
       function getFooterMenuItems(){
          global $mysql;
          return $mysql->select("select * from _jmenu where isheader=0 order by orderf"); 
       } 
  }
  
  class JSubscriber{
      
        function getSubscriber($subscriberid=0){ 
            global $mysql;
            return ($subscriberid==0) ?  $mysql->select("select * from _jsubscriber") : $mysql->select("select * from _jsubscriber where subscribid='".$subscriberid."'");   
        }
      
       function addSubscriber($param){
            global $mysql; 
            return $mysql->insert("_jsubscriber",array("subscribname"=>$param['subscribname'],"subscribemail"=>$param['subscribemail'],"subscribmob"=>$param['subscribmobile'],"others"=>$param['others'],"postedon"=>date("Y-m-d H:i:s"))); 
       }
        
       function deleteSubscriber($subscriberid){
           global $mysql;
           return $mysql->execute("delete from _jsubscriber where subscribid='".$subscriberid."'");
       }
        
       function updateSubscriber($param,$subscriberid) {
           global $mysql;
           return $mysql->execute("update _jsubscriber set subscribname='".$param['subscribname']."',subscribemail='".$param['subscribemail']."',subscribmob='".$param['subscribmobile']."',others='".$param['others']."' where subscribid='".$param['rowid']."'");
       }
  }
  
    
  class JContactus{
        
       function getContactus($contactid=0){
           global $mysql;
           return ($contactid==0) ?  $mysql->select("select * from _jcontactus") : $mysql->select("select * from _jcontactus where contid='".$contactid."'");   
       }
      
       function addContactus($param){
           global $mysql; 
           return $mysql->insert("_jcontactus",array("contmob"=>$param["mobileno"],"contemail"=>$param["email"],"personname"=>$param["personname"],"subject"=>$param["subject"],"content"=>$param["content"],"convtime"=>$param["convtime"],"postedon"=>date("Y-m-d H:i:s"))); 
       }
       
       function deleteContactus($contactid){
           global $mysql;
           return $mysql->execute("delete from _jcontactus where contid='".$contactid."'");
       }
     
       function updateContactus($param,$contactid){
           global $mysql;
           return $mysql->execute("update _jcontactus set contmob='".$param["mobileno"]."',contemail='".$param["email"]."',personname='".$param["personname"]."',subject='".$param["subject"]."',content='".$param["content"]."',convtime='".$param["convtime"]."' where contid='".$contactid."'");
       }
  }
  
  
  class JUsertable{
      
      function getUser($userid=0){ 
           global $mysql;                 
           return($userid==0) ?  $mysql->select("select * from _jusertable order by userid desc"):  $mysql->select("select * from _jusertable where userid='".$userid."'");
      }
      function getVerifiedUser($userid=0){ 
           global $mysql;                 
           return($userid==0) ?  $mysql->select("select * from _jusertable where ismobileverified='1' order by userid desc"):  $mysql->select("select * from _jusertable where ismobileverified='1' and userid='".$userid."'");
      }
      function getNonVerifiedUser($userid=0){ 
           global $mysql;                 
           return($userid==0) ?  $mysql->select("select * from _jusertable where ismobileverified='0' order by userid desc"):  $mysql->select("select * from _jusertable where ismobileverified='0' and userid='".$userid."'");
      }
      function getAdPostedUser($userid=0){ 
           global $mysql;                 
           return($userid==0) ?  $mysql->select("SELECT * FROM _jusertable left join _jpostads on  _jusertable.userid=_jpostads.postedby order by _jusertable.userid desc"):  $mysql->select("SELECT * FROM _jusertable left join _jpostads on  _jusertable.userid=_jpostads.postedby where _jusertable.userid='".$userid."'");
      }

      function addUser($param){
           global $mysql; 
           return $mysql->insert("_jusertable",array("personname"=>$param['personname'],"countryid"=>$param['countryid'],"mobile"=>$param['mobile'],"email"=>$param['email'],"pwd"=>$param['pwd'],"createdon"=>date("Y-m-d H:i:s"))); 
          
      }
       
      function updateUser($param,$userid){
           global $mysql;
           return $mysql->execute("update _jusertable set personname='".$param['personname']."',email='".$param['email']."',pwd='".$param['pwd']."',dob='".$param['dob']."',mobile='".$param['mobile']."',state='".$param['state']."',district='".$param['district']."' where userid='".$param['userid']."'");
      
      }
  }
   class JFavorites{
      function getFavorites($favid=0,$sql="") {
           global $mysql;
           $sql = ($sql=="") ? "" : " ".$sql;
           return($favid==0) ? $mysql->select("SELECT * FROM _jpostads AS p, _jusertable AS u, _jfavorites AS f, _jcategory AS c, _jsubcategory AS s WHERE p.subcateid=s.subcateid AND s.categid=c.categid And p.postadid=f.postadid AND u.userid=f.userid ".$sql):  $mysql->select("SELECT * FROM _jpostads AS p, _jusertable AS u, _jfavorites AS f, _jcategory AS c, _jsubcategory AS s WHERE p.subcateid=s.subcateid AND s.categid=c.categid And p.postadid=f.postadid AND u.userid=f.userid and f.favid=".$favid.$sql);       
      }
      
      function addFavorites($param){
          global $mysql;
           return $mysql->insert("_jfavorites",array("userid"=>$param['userid'],"adid"=>$param['adid'],"addedon"=>date("Y-m-d H:i:s"))); 
      }
                                                                                           
      function deleteFavorites($param){
           global $mysql;
           return $mysql->execute("delete from _jfavorites where userid='".$param['userid']."' and postadid='".$param['postadid']."'");
      } 
   }
   
   class JFranchiseetable{
      
      function getFranchisee($userid=0){ 
           global $mysql;                 
           return($userid==0) ?  $mysql->select("select * from _tbl_franchisee order by userid desc"):  $mysql->select("select * from _tbl_franchisee where userid='".$userid."'");
      }

    /*  function addFranchisee($param){
           global $mysql; 
           return $mysql->insert("_tbl_franchisee",array("FranchiseeName"=>$param['franchiseename'],"EmailID"=>$param['emailid'],"Password"=>$param['email'],"CountryID"=>$param['pwd'],"CountryName","StateID"=>$param['pwd'],"StateName"=>$param['pwd'],"DistrictID"=>$param['pwd'],"DistrictName"=>$param['pwd'],"CreatedOn"=>date("Y-m-d H:i:s"))); 
          
      }*/
  }
  
   
  class CommonController{
      
      public $err=0;
      public $errmsg = array();
      
      function formatFileName($filename){
          return str_replace(" ","_",strtolower("_".time()."_".$filename));
      }
      
      function isEmptyField($string){
          return (strlen(trim($string))>0) ? false : true;
      }
      
      function printSuccess($message){
        return "<div id='success' style='font-size:11px;font-family:arial;background:lightgreen;;margin:0px;padding:5px;border-radius: 5px;color:green;font-weight: bold;text-align:center'>".$message."</div>";
      }
    
      function printError($message){
        $this->err++;
        $this->errmsg[]=$message;
        return "<div style='font-size:11px;font-family:arial;background:#FCB8B8;;margin:0px;padding:5px;border-radius: 5px;color:brown;font-weight: bold;text-align:center'>".$message."</div>";
      }
    
      function isLogin(){
        return  $_SESSION['USER']['userid']>0 ? true : false;
      }
      
       function isFranchiseeLogin(){
        return  $_SESSION['FRANCHISEE']['userid']>0 ? true : false;
      }

      function fileUpload($file,$uploadTo,$typeArray,$fileSize,&$filename,&$errorMessage=""){
        
        $filename = $this->formatFileName(basename($file['name']));
      
        if($file["size"]>$fileSize){
            $errorMessage="File Size should have greater ".number_format($fileSize/8/1024/1024,2)." MB";
            $this->printError("File Size should have greater ".number_format($fileSize/8/1024/1024,2)." MB");       
            return false;
        }

        if(!(in_array($file["type"],$typeArray))){
            $errorMessage="File Format Not Support";
            $this->printError("File Format Not Support");    
            return false;
        }
                
        if(!(move_uploaded_file($file['tmp_name'],strtolower($uploadTo.$filename)))){
            $errorMessage="There was an error uploading the file, please try again!";
            $this->printError("There was an error uploading the file, please try again!");
            return false;
        }
            return true;
      }
      
      function validEmail($email){
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",(trim($email)))? true :false;
      }
      function validPhone($phone){
        return preg_match("/^([0-9]-)?[0-9]$/",(trim($phone)) && strlen(trim($phone))==10 && ((strlen(trim($phone))>666666)||(strlen(trim($phone))<9999999999))) ? true :false;
      }
    
    function printErrors(){
        
        $return = "";
        foreach($this->errmsg as $e){
            $return .= "<div style='font-size:11px;font-family:arial;background:#FCB8B8;;margin:10px;padding:10px;border-radius: 5px;color:brown;font-weight: bold;text-align:center'>".$e."</div>";
        }
        return $return;
    }
    
    function displayAd($postad) {
       global $config,$mysql; 
        $filename = ((strlen(trim($postad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$postad['filepath1'])) ? "assets/".$config['thumb'].$postad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
        
         $return = "<div class='jAdContainer' id='adcontainer_".$postad['postadid']."'>
                        <table cellpadding='2' cellspacing='0' style='width:100%'>
                            <tr>
                                <td style='vertical-align:top;padding-left:0px;width:103px'>
                                    <div style='padding:3px'>
                                        <img src='".$filename."' style='height:77px;width:103px;border:1px solid #ccc;border-bottom:none;'>
                                        <br><img src='assets/images/shadow_220.png' style='margin-top:0px;width:103px;'>
                                    </div>
                                </td>
                                <td style='vertical-align:top;padding-left:5px;width:100%'>
                                    <a class='jAdTitle' href='index.php?adpage=".$postad['postadid']."'>".$postad['title']."</a>
                                    <div class='jAdContent' style='height:32px;'>".strip_tags(substr(strip_tags($postad["content"]),0,130))."... </div>
                                    <div class='jAdContent'>
                                     Posted: <span style='color:#666;font-weight:normall;'>".$postad["postedon"]."</span>&nbsp;&nbsp;
                                     Viewed: <span style='color:#444;font-weight:bold;'>".$postad["visitors"]."</span><br>
                                        <table cellpadding='0' cellspacing='0' style='width:100%'>
                                            <tr>
                                                <td style='width:450px;'>
                                                    <div class='jAdContent'>
                                                         <a class='a' href='subcategory.php?v=".$postad['categid']."'>".$postad['categname']."</a> /
                                                         <a class='a' href='viewads.php?v=".$postad['subcateid']."'>".$postad['subcatename']."</a>
                                                    </div>
                                                </td>
                                                <td style='text-align:right;'>
                                                    <div class='jAdContent' style=\"font-family:'Trebuchet MS';text-align:right;\" id='ads_".$postad['postadid']."'> ";
                                                              $f = $mysql->select("select * from _jfavorites where userid='".$_SESSION['USER']['userid']."' and postadid='".$postad['postadid']."'");
                                                              if (sizeof($f)==0) {
                                                                    $return .="<a class='a' href='javascript:void(0);' onclick=\"addFav('".$postad['postadid']."');\" >Add To Favorites</a>";
                                                              } else {
                                                                  
                                                                  if ( strpos($_SERVER['REQUEST_URI'],"favorites.php")>0) {
                                                                        $return .="<a class='a' href='javascript:void(0);' style='color:red;font-weight:bold;' onclick=\"removeFav('".$postad['postadid']."');\" >Remove</a>";
                                                                  } else {
                                                                      $return .="<a class='a' href='myfavorites.php' style='color:green;font-weight:bold;' >Added to your Favorites</a>&nbsp;&nbsp;"; 
                                                                      $return .="<a class='a' href='javascript:void(0);' style='color:red;font-weight:bold;' onclick=\"removeFav('".$postad['postadid']."');\" >Remove</a>";
                                                                  }
                                                              }
                                                    $return .="   </div> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div> 
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style='text-align: center;margin:2px'>
                        <hr style='margin:0px;width: 100%;border:none;border-bottom:1px solid #f1f1f1'>
                    </div>
                    ";
                    
                    return $return;
    }
 
 
  } 
?>