<?php 
    class JFrame {
        
        function getAppSetting($property) {
            
            global $mysql;
            $settings = $mysql->select("select * from _jsitesettings");    
            $f = 0;
            
            switch($property) {

                case 'sitetitle'            : $keyvalue = 0; break;
                case 'sitename'             : $keyvalue = 1; break;
                case 'backgroundimage'      : $keyvalue = 2; break;
                case 'backgroundcolor'      : $keyvalue = 3; break;
                case 'menubackgroundimage'  : $keyvalue = 23; break;
                case 'logo'                 : $keyvalue = 24; break;
                case 'isenablevideo'        : $keyvalue = 5; break;
                case 'isenablephoto'        : $keyvalue = 6; break;
                case 'isenablenews'         : $keyvalue = 13; break;
                case 'isenableevents'       : $keyvalue = 14; break;
                case 'isenablemusic'        : $keyvalue = 7; break;
                case 'isenabledownloads'    : $keyvalue = 8; break;
                case 'isenablefaq'          : $keyvalue = 9; break;
                case 'isenablesuccessstory' : $keyvalue = 10; break;
                case 'isenabletestimonial'  : $keyvalue = 11; break;
                case 'isenablesubscriber'   : $keyvalue = 12; break;
                case 'sharepage'            : $keyvalue = 19; break;
                case 'googletranslator'     : $keyvalue = 20; break;
                case 'isenableproduct'      : $keyvalue = 25; break;
                case 'facebookurl'          : $keyvalue = 15; break;
                case 'twitterurl'           : $keyvalue = 16; break;
                case 'youtubeurl'           : $keyvalue = 17; break;
                case 'googleplusurl'        : $keyvalue = 18; break;
                case 'noimg'                : $keyvalue = 29; break;
                case 'newsperpage'          : $keyvalue = 30; break;
                case 'eventsperpage'        : $keyvalue = 31; break;
                case 'storyperpage'         : $keyvalue = 32; break;
                case 'testmperpage'         : $keyvalue = 33; break;
                case 'menubgcolor'          : $keyvalue = 42; break;
                case 'menufontcolor'        : $keyvalue = 34; break;
                case 'menufont'             : $f = $mysql->select("select * from _jfonts where fontid=".$settings[35]['paramvalue']);
                                              $settings[$keyvalue]['paramvalue']=$f[0]['fontname'];break;
                case 'menufontsize'         : $keyvalue = 36; break;
                case 'footerbgimage'        : $keyvalue = 37; break;
                case 'footerbgcolor'        : $keyvalue = 38; break;
                case 'footerfontcolor'      : $keyvalue = 39; break;
                case 'footerfont'           : $f = $mysql->select("select * from _jfonts where fontid=".$settings[40]['paramvalue']);
                                               $settings[$keyvalue]['paramvalue']=$f[0]['fontname'];break;
                case 'footerfontsize'       : $keyvalue = 41; break;
                case 'layout'               : $keyvalue = 43; break;  
                case 'headerhover'          : $keyvalue = 44; break;  
                case 'footerhover'          : $keyvalue = 45; break;  
                case 'linkedpage'           : $keyvalue = 46; break;  
                case 'emailto'              : $keyvalue = 47; break;
                case 'isenablecontact'      : $keyvalue = 26; break;
                case 'sitebgposition'       : $keyvalue = 48; break;
                case 'sharesize'            : $keyvalue = 49; break; 
                case 'siteurl'              : $keyvalue = 50; break;
                case 'seometadesc'          : $keyvalue = 51; break; 
                case 'seometakey'           : $keyvalue = 52; break; 
                case 'seometacontent'       : $keyvalue = 53; break;  
            } 
            
            return $settings[$keyvalue]['paramvalue'];
        }
    }
   
   
   class MenuItems 
   {
     
       function addMenu($param) {
          global $mysql; 
          return $mysql->insert("_jmenu",array("menuname"=>$param['menuname'],"pageid"=>$param['pagenameid'],"isheader"=>$param['isHeader'],"target"=>$param['target'],"customurl"=>$param['customurl'])); 
       }
       
       function updateMenu($param,$menuid) {
           
          global $mysql; 
       
          return $mysql->execute("UPDATE _jmenu SET menuname='".$param['menuname']."',pageid='".$param['pagenameid']."',isheader='".$param['isHeader']."',target='".$param['target']."',customurl='".$param['customurl']."',orderf='".$param['orderf']."' WHERE menuid='".$menuid."'"); 
       }
         
       function getMenu($menuid){
          global $mysql;
          return $mysql->select("select * from _jmenu where menuid='".$menuid."'");
       }
       
       function deleteMenu($menuid){
          global $mysql;
          $record=$mysql->execute("delete from _jmenu where menuid='".$menuid."'");
       }
 
       function getHeaderMenuItems() {
          global $mysql;
          $menus = array();
          $menu_data = $mysql->select("select * from _jmenu where isheader=1 order by orderf");
          foreach($menu_data as $m) {
                $tmp = array(); 
                $tmp = $m;
                $submenu = $mysql->select("select * from _jmenu where mainmenu='".$m['menuid']."' order by orderf");
                if (sizeof($submenu)>0) {
                    $tmp['submenu']=$submenu;
                } else {
                    $tmp['submenu']=array();
                }
                $menus[]=$tmp;
          }
          return $menus; 
       }
       
       function getFooterMenuItems() {
            global $mysql;
          return $mysql->select("select * from _jmenu where isheader=0 order by orderf"); 
       }
       
     
  }
  
   
  
 class JContact {
       
      function getContact($id) {
          global $mysql;
          if ($id==0) {
            return $mysql->select("select * from _jcontact");
            
        } else {
            return $mysql->select("select * from _jcontact where  contactid=".$id);
            
        }         
      }
  
       function deleteContact($rowid) {
           global $mysql;
           return $mysql->execute("delete from _jcontact where contactid='".$rowid."'");
       }
      
  }
  


    
  
      class JSubscriber{
          
       function getSubscriber($id) { 
          global $mysql;
          if ($id==0) {
            return $mysql->select("select * from _jsubscriber");
            
        } else {
            return $mysql->select("select * from _jsubscriber where subscriberid='".$id."'");
             
        }         
      }
      
       function addSubscriber($subscribername,$subscriberemail,$subscribermobile,$others){
          global $mysql; 
          return $mysql->insert("_jsubscriber",array("subscribername"=>$subscribername,"subscriberemail"=>$subscriberemail,"subscribermobile"=>$subscribermobile,"others"=>$others)); 
       }
        function deleteSubscriber($rowid) {
           global $mysql;
           return $mysql->execute("delete from _jsubscriber where subscriberid='".$rowid."'");
       }
     
       function updateSubscriber($subscribername,$subscriberemail,$subscribermobile,$others,$rowid) {
           global $mysql;
           return $mysql->execute("update _jsubscriber set subscribername='".$subscribername."',subscriberemail='".$subscriberemail."',subscribermobile='".$subscribermobile."',others='".$others."' where subscriberid='".$rowid."'");
       }
  }
  
        class JProduct{
            
       function getProduct($id) { 
           global $mysql;
        if($id==0){
            return $mysql->select("select * from _jproduct");
            
        }else {
            return $mysql->select("select * from _jproduct where productid='".$id."'");
             
       }         
      }
       function addProduct($itemname,$itemdescription,$itemprice,$ispublished){
          global $mysql; 
          return $mysql->insert("_jproduct",array("itemname"=>$itemname,"itemdesc"=>$itemdescription,"itemprice"=>$itemprice,"ispublished"=>$ispublished,"postedon"=>date("Y-m-d H:i:s"))); 
 
       }
        function deleteProduct($rowid) {
           global $mysql;
           return $mysql->execute("delete from _jproduct where productid='".$rowid."'");
       }
     
       function updateProduct($itemname,$itemdescription,$itemprice,$ispublished,$rowid) {
           global $mysql;
           return $mysql->execute("update _jproduct set itemname='".$itemname."',itemdesc='".$itemdescription."',itemprice='".$itemprice."',ispublished='".$ispublished."' where productid='".$rowid."'");
       }
  }
  
    class JProductSubCategory
          {
          function getProductSubcategory ($id){ 
             global $mysql;
          if ($id==0) {
            return $mysql->select("select * from _jsubcategoryproduct");
          } else {
            return $mysql->select("select * from _jsubcategoryproduct where subcateid='".$id."'");
             
          }         
          }
       function addProductSubcategory($subcategoryname) {
          global $mysql; 
          return $mysql->insert("_jsubcategoryproduct",array("subcatename"=>$subcategoryname)); 
           
       }
        function deleteProductSubcategory($rowid) {
           global $mysql;
           return $mysql->execute("delete from _jsubcategoryproduct where subcateid='".$rowid."'");
       }
     
       function updateProductSubcategory($subcategoryname,$rowid){
           global $mysql;
           return $mysql->execute("update _jsubcategoryproduct set subcatename='".$subcategoryname."' where subcateid='".$rowid."'");
       }
  }
  
      class JProductMainCategory
          {
          function getProductMaincategory($id){ 
             global $mysql;
          if ($id==0) {
            return $mysql->select("select * from _jmaincateproduct");
          } else {
            return $mysql->select("select * from _jmaincateproduct where maincateid='".$id."'");
             
          }         
          }
      
       function addProductMaincategory($maincatename) {
          global $mysql; 
          return $mysql->insert("_jmaincateproduct",array("maincatename"=>$maincatename)); 
       }
        function deleteProductMaincategory($rowid) {
           global $mysql;
           return $mysql->execute("delete from _jmaincateproduct where maincateid='".$rowid."'");
       }
     
       function updateProductMaincategory($maincatename,$rowid){
           global $mysql;
           return $mysql->execute("update _jmaincateproduct set maincatename='".$maincatename."' where maincateid='".$rowid."'");
       }
  }
  
    class JContactus{
        
        function getContactus($contactid=0){
            global $mysql;
            return ($contactid==0) ?  $mysql->select("select * from _jcontactus") : $mysql->select("select * from _jcontactus where contid='".$contactid."'");   
        }
      
       function addContactus($param){
          global $mysql; 
          return $mysql->insert("_jcontactus",array("contmob"=>$param["mobileno"],"contemail"=>$param["email"],"personname"=>$param["personname"],"subject"=>$param["subject"],"content"=>$param["content"],"convtime"=>$param["convtime"])); 
       }
       
       function deleteContactus($contactid) {
           global $mysql;
           return $mysql->execute("delete from _jcontactus where contid='".$contactid."'");
       }
     
       function updateContactus($param,$contactid) {
           global $mysql;
           return $mysql->execute("update _jcontactus set contmob='".$param["mobileno"]."',contemail='".$param["email"]."',personname='".$param["personname"]."',subject='".$param["subject"]."',content='".$param["content"]."',convtime='".$param["convtime"]."' where contid='".$contactid."'");
       }
  }
  
     class JCustomize
  {
       function getCustomize($id=0){
          global $mysql;
          if ($id==0) {
            return $mysql->select("select * from _jdayevent");
            
        } else {
           return $mysql->select("select * from _jdayevent where eventid='".$id."'");

        }         
      }
      
       function addCustomize($datepicker,$desctamil,$desceng,$descmal,$eventcate)
       {
          global $mysql; 
          return $mysql->insert("_jdayevent",array("edate"=>$datepicker,"descT"=>$desctamil,"descE"=>$desceng,"descM"=>$descmal,"eventcate"=>$eventcate)); 

       }
        function deleteCustomize($rowid) {
           global $mysql;
           return $mysql->execute("delete from _jdayevent where eventid='".$rowid."'");
       }
     
       function updateCustomize($datepicker,$desctamil,$desceng,$descmal,$eventcate,$rowid) {
           global $mysql;
           return $mysql->execute("update _jdayevent set edate='".$datepicker."',descT='".$desctamil."',descE='".$desceng."',descM='".$descmal."',eventcate='".$eventcate."' where eventid='".$rowid."'");
       }
  }
  
  class JUsertable{
            
       function getUser($userid=0) { 
           global $mysql;
           return($userid==0) ?  $mysql->select("select * from _jusertable"):  $mysql->select("select * from _jusertable where userid='".$userid."'");
        
       }
       
       function addUser($personname,$username,$pwd,$isactive){
          global $mysql; 
          return $mysql->insert("_jusertable",array("personname"=>$personname,"uname"=>$username,"pwd"=>$pwd,"createdon"=>date("Y-m-d H:i:s"),"isactive"=>$isactive)); 
 
       }
       
       function updateUser($personname,$username,$pwd,$isactive,$rowid) {
           global $mysql;
           return $mysql->execute("update _jusertable set personname='".$personname."',uname='".$username."',pwd='".$pwd."',isactive='".$isactive."' where userid='".$rowid."'");
       }
 
  }
  
  class JReading{
      function getReading($readingid=0,$sql="") {
          global $mysql;
          $sql = ($sql=="") ? "" : "  ".$sql;  
          return ($readingid==0)? $mysql->select("select * from _jreading".$sql): $mysql->select("select * from _jreading where readingid=".$readingid.$sql);
      }
      
      function addReading($param){
          global $mysql;
          return $mysql->insert("_jreading",array("date"=>$param['date'],"title"=>$param['title'],"details"=>$param['details'],"title_t"=>$param['title_t'],"details_t"=>$param['details_t'],"isreading"=>$param['isreading']));
          
      } 
      function updateReading($param,$readingid=""){
          global $mysql;
          return $mysql->execute("update _jreading set date='".$param['date']."',title='".$param['title']."',details='".$param['details']."',title_t='".$param['title_t']."',isreading='".$param['isreading']."',details_t='".$param['details_t']."' where readingid='".$param['readingid']."'");
      }
      function deleteReading($readingid){
          global $mysql;
          return $mysql->execute("delete from _jreading where readingid='".$readingid."'");
      }
  }
  
  
  class CommonController {
      
      var $err=0;
      var $errmsg = array();
      
      function formatFileName($filename) {
          return str_replace(" ","_",strtolower("_".time()."_".$filename));
      }
      
      function isEmptyField($string) {
          return (strlen(trim($string))>0) ? false : true;
      }
      
      function printSuccess($message) {
        return "<div style='font-size:11px;font-family:arial;background:lightgreen;;margin:10px;padding:10px;border-radius: 5px;color:green;font-weight: bold;text-align:center'>".$message."</div>";
    }
    
    function printError($message) {
        $this->err++;
        $this->errmsg[]=$message;
        return "<div style='font-size:11px;font-family:arial;background:#FCB8B8;;margin:10px;padding:10px;border-radius: 5px;color:brown;font-weight: bold;text-align:center'>".$message."</div>";
    }
    function isLogin() {
            return  $_SESSION['USER']['userid']>0 ? true : false;
    }
    
      
  }
  
  $iconimgArray = array("image/x-icon");
  $imgMaxSize = 20000000;
  $imageArray = array("image/jpeg","image/jpg","image/gif","image/png");
  $imgMaxSize = 20000000;
  $MusicArray = array("audio/mp3","audio/mpeg","audio/wav");
  $musicMaxSize = 20000000;
  $DownloadArray = array("image/jpeg","image/jpg","image/gif","image/png","application/pdf","application/doc","application/zip","application/oda","application/odt","application/x-zip-compressed");
  $downloadMaxSize = 20000000;
  
  
?>


