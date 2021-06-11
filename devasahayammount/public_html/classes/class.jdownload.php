<?php
    class JDownloads{
        
        function getDownloadAlbum($id=0) {
            global $mysql;
            return ($id==0) ? $mysql->select("select * from _jdownalbum ") : $mysql->select("select * from _jdownalbum where dalbumid='".$id."'");
        }
            
        function addDownloadAlbum($param){
            global $mysql; 
            return $mysql->insert("_jdownalbum",array("albumtit"=>$param["albumtitle"],"albumdesc"=>$param["albumdescription"],"filepath"=>$param["filename"],"ispublish"=>$param["ispublished"])); 
        }
   
        function updateDownloadAlbum($param,$albumid) {
            global $mysql;
            return $mysql->execute("update _jdownalbum set albumtit='".$param["albumtitle"]."',albumdesc='".$param["albumdescription"]."',ispublish='".$param["ispublished"]."' where dalbumid='".$albumid."'");
        }
        
        function deleteDownloadAlbum($albumid) {
            global $mysql;
            return $mysql->execute("delete from _jdownalbum where dalbumid='".$albumid."'");
        }         

        function getAlbumImages($albumid) { 
            global $mysql;
            return $mysql->select("select * from _jdownloads where albumid='".$albumid."'");
        }
        
        function getDownloads($downloadid=0) {
            global $mysql;
            return ($downloadid==0) ? $mysql->select("select * from _jdownloads ") : $mysql->select("select * from _jdownloads where downloadid='".$downloadid."'");
        }       
 
        function addDownloads($param){
            global $mysql; 
            return $mysql->insert("_jdownloads",array("downloadtitle"=>$param["downloadtitle"],"downloaddescription"=>$param["downloaddescription"],"downloadfilepath"=>$param["filename"],"ispublished"=>$param["ispublished"],"albumid"=>$param["albumid"],"thumb"=>$param["thumb"])); 
        }
   
        function updateDownloads($param,$downloadid) {
            global $mysql;
            return $mysql->execute("update _jdownloads set downloadtitle='".$param["downloadtitle"]."',downloaddescription='".$param["downloaddescription"]."',ispublished='".$param["ispublished"]."' where downloadid='".$downloadid."'");
        }
        
        function deleteDownloads($downloadid) {
            global $mysql;
            return $mysql->execute("delete from _jdownloads where downloadid='".$downloadid."'");
        }

    }
?>
