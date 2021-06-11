<?php
    class JMusics {
        
        function getMusicAlbum($id=0) {
            global $mysql;
            return ($id==0) ? $mysql->select("select * from _jalbum ") : $mysql->select("select * from _jalbum where albumid='".$id."'");
        }
         
        function addMusicAlbum($param){
            global $mysql; 
            return $mysql->insert("_jalbum",array("albumtit"=>$param["albumtitle"],"albumdesc"=>$param["albumdescription"],"filepath"=>$param["filename"],"ispublish"=>$param["ispublished"])); 
             
        }
       
       function updateMusicAlbum($param,$albumid) {
            global $mysql;
            return $mysql->execute("update _jalbum set albumtit='".$param["albumtitle"]."',albumdesc='".$param["albumdescription"]."',ispublish='".$param["ispublished"]."' where albumid='".$albumid."'");
       }
       
       function deleteMusicAlbum($albumid) {
            global $mysql;
            return $mysql->execute("delete from _jalbum where albumid='".$albumid."'");
       }
       
       function getAlbumImages($albumid) {
            global $mysql;
            return $mysql->select("select * from _jmusics where albumid='".$albumid."'");
       }
        
       function getMusic($musicid) { 
            global $mysql;
            return ($musicid==0) ? $mysql->select("select * from _jmusics ") : $mysql->select("select * from _jmusics where musicid='".$musicid."'");
       }        
       
       function addMusics($param){
            global $mysql; 
            return $mysql->insert("_jmusics",array("musictitle"=>$param["musictitle"],"musicdescription"=>$param["musicdescription"],"musicfilepath"=>$param['filename'],"ispublished"=>$param['ispublished'],"albumid"=>$param['albumid'])); 
       }
          
       function updateMusics($param,$musicid) {
            global $mysql;
            return $mysql->execute("update _jmusics set musictitle='".$param["musictitle"]."',musicdescription='".$param["musicdescription"]."',ispublished='".$param['ispublished']."' where musicid='".$musicid."'");
       }
          
       function deleteMusics($musicid) {
            global $mysql;
            return $mysql->execute("delete from _jmusics where musicid='".$musicid."'");
       }
            
  }
  
?>
