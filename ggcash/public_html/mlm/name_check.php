<?php
    include_once(__DIR__."/config.php");
          $data = $mysql->select("select * from `_tblPlacements`");
          foreach($data as $d) {
              $m = $mysql->select("select * from _tbl_Members where  MemberCode='".$d['ParentCode']."'");
              if ($d['ParentName']!=$m[0]['MemberName']) {
                  //echo $d['PlacementID']."<br>";
                  $mysql->execute(" update _tblPlacements set ParentName='".$m[0]['MemberName']."' where PlacementID='".$d['PlacementID']."'");
              }
              
              $n = $mysql->select("select * from _tbl_Members where  MemberCode='".$d['ChildCode']."'");
              if ($d['ChildName']!=$n[0]['MemberName']) {
                  //echo $d['PlacementID']."<br>";
                  $mysql->execute(" update _tblPlacements set ChildName='".$n[0]['MemberName']."' where PlacementID='".$d['PlacementID']."'");
              }
              
                $q = $mysql->select("select * from _tbl_Members where  MemberCode='".$d['PlacedByCode']."'");
              if ($d['PlacedByName']!=$q[0]['MemberName']) {
                  //echo $d['PlacementID']."<br>";
                    $mysql->execute("update _tblPlacements set PlacedByName='".$q[0]['MemberName']."' where PlacementID='".$d['PlacementID']."'");
              }
              
          }
?>