<?php
      class JSlider {
      
          function getSliders($id=0) {
              global $mysql;
              return ($id==0) ? $mysql->select("select * from _jslider") : $mysql->select("select * from _jslider where sliderid='".$id."'");
          }
          
          function getActiveSliders() { 
                global $mysql;
                return $mysql->select("select * from _jslider where ispublished=1");
          }
          
          function getInActiveSliders() { 
              global $mysql;
              return $mysql->select("select * from _jslider where ispublished=0");
          }
          
          function addSlider($param) {
              global $mysql; 
              return $mysql->insert("_jslider",array("slidertitle"=>$param['slidertitle'],"sliderdescription"=>$param['sliderdescription'],"filepath"=>$param['filename'],"ispublished"=>$param['ispublished'])); 

          }
          
          function deleteSlider($sliderid) {
              global $mysql;
              return $mysql->execute("delete from _jslider where sliderid='".$sliderid."'");
          }
         
          function updateSlider($param,$sliderid) {
              global $mysql;
              return $mysql->execute("update _jslider set slidertitle='".$param['slidertitle']."',sliderdescription='".$param['sliderdescription']."',ispublished='".$param['ispublished']."' where sliderid='".$sliderid."'");
          }
      
      }
?>