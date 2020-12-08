<?php
    class JPages {
        
        function getPages($pageid=0,$sql="") {
            global $mysql;
            $sql = ($sql=="") ? "" : " and ".$sql;  
            return ($pageid==0) ? $mysql->select("select * from _jpages where pagetype='P' ".$sql) : $mysql->select("select * from _jpages where pagetype='P' and pageid=".$pageid.$sql);
        } 
        
        function addPage($param){
            global $mysql; 
            if ($param['ishomepage']==1) {
                $mysql->execute("update _jpages set ishomepage=0 where pagetype='P'");
            }
            return $mysql->insert("_jpages",array("pagetitle"=> $param['pagetitle'],"pagedescription" => $param['pagedescription'],"pagetype"=> $param['pagetype'],"filepath"=> $param['filename'],"postedon" => date("Y-m-d H:i:s"),"lastmodified"=> date("Y-m-d H:i:s"),"ispublish"=> $param['ispublish'],"ishomepage"=>$param['ishomepage'])); 
        }
       
        function updatePage($param,$pageid){
            global $mysql;

            if ($param['ishomepage']==1) {
                $mysql->execute("update _jpages set ishomepage=0 where pagetype='P'");
            }
       
            $sql = (isset($param['filename'])) ? ", filepath='".$param['filename']."' " : "";
            return $mysql->execute("update _jpages set pagetitle='".$param['pagetitle']."',pagedescription='".$param['pagedescription']."',ispublish='".$param['ispublish']."',ishomepage='".$param['ishomepage']."',lastmodified='".date("Y-m-d H:i:s")."'".$sql." where pageid='".$param['pageid']."'");
        }
        
        function deletePage($pageid) {
            global $mysql;
            return $mysql->execute("delete from _jpages where pageid='".$pageid."'");
        }

    }
?>