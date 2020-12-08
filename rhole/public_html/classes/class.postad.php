<?php
  
  class JPostads{
      
       function getPostad($postadid=0,$sql="") {
            global $mysql;
            $sql = ($sql=="") ? "" : "  ".$sql;
            
           // return($postadid==0) ? $mysql->select("SELECT * FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid  where  _jpostads.isdeleted='0'  order by postadid desc  limit 0,24 ".$sql):  
           // $mysql->select("SELECT * FROM _jpostads AS p, _jcategory AS c, _jsubcategory AS s WHERE  p.isdeleted='0' and s.categid=c.categid and p.postadid=".$postadid.$sql);       
            //return($postadid==0) ? $mysql->select("SELECT * FROM _jpostads AS p, _jcategory AS c, _jsubcategory AS s WHERE p.subcateid=s.subcateid AND s.categid=c.categid ".$sql):  $mysql->select("SELECT * FROM _jpostads AS p, _jcategory AS c, _jsubcategory AS s WHERE p.subcateid=s.subcateid AND s.categid=c.categid and p.postadid=".$postadid.$sql);       
            $result = $mysql->select("SELECT * FROM _jpostads where _jpostads.postadid='".$postadid."'");       
            $main_category = $mysql->select("select * from _jcategory where categid='".$result[0]['categid']."'");
            $sub_category = $mysql->select("select * from _jsubcategory where subcateid='".$result[0]['subcateid']."'");
            $count = $mysql->select("select count(*) as cnt from _jrecentlyviewed where adid='".$adid."' group by ip");
            $result[0]['viewercount']= sizeof($count);       
            $result[0]['categname']= $main_category[0]['categname'];       
            $result[0]['subcatename']=  $sub_category[0]['subcatename']; 
            return $result; 
       }   
       
       function getAd($adid=0,$userid=0) {
            global $mysql;
            $sql = ($sql=="") ? "" : "  ".$sql;
            //if ($userid!=0) {
                $mysql->insert("_jrecentlyviewed",array("userid"=>$userid,"adid"=>$adid,"viewedon"=>date("Y-m-d H:i:s"),"ip"=>$_SERVER['REMOTE_ADDR']));
            //}
            //return($adid==0) ? $mysql->select("SELECT * FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid order by postadid desc  limit 0,25 ".$sql): 
            $result = $mysql->select("SELECT * FROM _jpostads where _jpostads.postadid='".$adid."'");       
            $main_category = $mysql->select("select * from _jcategory where categid='".$result[0]['categid']."'");
            $sub_category = $mysql->select("select * from _jsubcategory where subcateid='".$result[0]['subcateid']."'");
            $count = $mysql->select("select count(*) as cnt from _jrecentlyviewed where adid='".$adid."' group by ip");
            $result[0]['viewercount']= sizeof($count);       
            $result[0]['categname']= $main_category[0]['categname'];       
            $result[0]['subcatename']=  $sub_category[0]['subcatename'];       
            
            $dup = $mysql->select("select * from _jviewedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$adid."'");
            
            if (sizeof($dup)==0) {
                $result[0]['viewedContact']=array();
            } else {
                $u = $mysql->select("select * from _jusertable where userid='".$result[0]['postedby']."'");
                
                if($result[0]['CustomerMobileNumber']==""){
                    $mobile = $u[0]['mobile'];
                }else {
                    $mobile = $result[0]['CustomerMobileNumber'];
                }
                if($result[0]['CustomerEmailID']==""){
                    $email = $u[0]['email'];
                }else {
                    $email = $result[0]['CustomerEmailID'];
                }
                
                $result[0]['viewedContact']=array("email"=>$email,"mobile"=>$mobile,"viewed"=>$dup[0]['viewedon']);
            }
             
            return $result;
            //return($postadid==0) ? $mysql->select("SELECT * FROM _jpostads AS p, _jcategory AS c, _jsubcategory AS s WHERE p.subcateid=s.subcateid AND s.categid=c.categid ".$sql):  $mysql->select("SELECT * FROM _jpostads AS p, _jcategory AS c, _jsubcategory AS s WHERE p.subcateid=s.subcateid AND s.categid=c.categid and p.postadid=".$postadid.$sql);       
       }
 
        function getPostadByCategory($postadid=0,$sql="") {
            global $mysql;
            $sql = ($sql=="") ? "" : "  ".$sql;
              return $mysql->select("SELECT * FROM _jpostads right join _jcategory on _jpostads.categid=_jcategory.categid where _jpostads.categid='".$postadid."' order by _jpostads.postadid desc");
       }
       
       
         
        function getPostadBySubCategory($subcateid=0,$sql="") {
            global $mysql;
            $sql = ($sql=="") ? "" : "  ".$sql;
            return $mysql->select("SELECT * FROM _jpostads   where _jpostads.subcateid='".$subcateid."' and _jpostads.isdeleted='0' order by _jpostads.postadid desc");
       }
       function getPostads($postbyid=0,$sql="") { 
            global $mysql;
            //$sql = ($sql=="") ? "" : " and ".$sql;
            if ($postbyid==0) {
                return $mysql->select("select * from _jpostads ".$sql." ");
            }
            return $mysql->select("select * from _jpostads where postedby=".$postbyid.$sql);
       }
       
       function addPostads($param){
            global $mysql; 
            //"adtype"=>$param['adtype'],
            $content = str_replace("'","&rsquo;", $param['content']);
            $content = str_replace('"','&rdquo;', $content);
            
             $title = str_replace("'","&rsquo;", $param['title']);
            $title = str_replace('"','&rdquo;', $title);
            return $mysql->insert("_jpostads",array(
                                "categid"=> $param['categid'],
                                "subcateid" => $param['subcategory'],
                                "title"=> $title,
                                "content"=>$content,
                                "filepath1"=> $param['filename1'],
                                "filepath2"=> $param['filename2'],
                                "stateid"=>$param['state'],
                                "distcid"=>$param['district'],
                                "countryid"=>$param['countryid'],
                                "postedon" => date("Y-m-d H:i:s"),
                                "expiredon"=> date("Y-m-d H:i:s"),
                                "postedby"=>$param['postedby'],
                                "pposted"=>$param['pposted'],
                                "location"=>$param['location'],
                                "amount"=>$param['amount'])); 
            //return $mysql->qry;
       }
       
       function updatePostads($param,$postadid) {
            global $mysql;
            $sql  = (isset($param['filename1'])) ? ", filepath1='".$param['filename1']."' " : "";
            $tsql = (isset($param['filename2'])) ? ", filepath2='".$param['filename2']."' " : "";
            //adtype='".$param["adtype"]."'
           // return true;
            return $mysql->execute("update _jpostads set title='".$param["title"]."',content='".$param["content"]."',categid='".$param["categid"]."',subcateid='".$param["subcategory"]."',stateid='".$param["state"]."',distcid='".$param["district"]."',postedby='".$param['postby']."',location='".$param['location']."',amount='".$param['amount']."'".$sql."".$tsql." where postadid='".$postadid."'");
       }
       
       function getBrandNames($subcate=0) {
            global $mysql;
            return ($subcate==0)? $mysql->select("select * from _jbrandnames order by brandname") : $mysql->select("select * from _jbrandnames where subcateid=".$subcate." order by brandname");       
       }
       
       
       function getCountryNames($countryid=0) {
            global $mysql;
            return ($countryid==0)? $mysql->select("select * from _jcountrynames") : $mysql->select("select * from _jcountrynames where countryid=".$countryid);       
       }
       
         function getStateNamesByCountry($countryid) {
            global $mysql;
            return $mysql->select("select * from _jstatenames where countryid=".$countryid);       
       }                       
       
       function getStateNames($stateid=0) {
            global $mysql;
            return ($stateid==0)? $mysql->select("select * from _jstatenames"): $mysql->select("select * from _jstatenames where stateid=".$stateid);       
       }
       
       function getDistrict($distid=0) {
            global $mysql;
            return ($distid==0)? $mysql->select("select * from _jdistrictnames"): $mysql->select("select * from _jdistrictnames where distcid=".$distid);       
       }
       function getCity($cityid=0) {
            global $mysql;
            return ($cityid==0)? $mysql->select("select * from _jcitynames"): $mysql->select("select * from _jcitynames where citynameid=".$cityid);       
       }
       
       function getDistricts($stateid) {
            global $mysql;
            return $mysql->select("select * from _jdistrictnames where stateid='".$stateid."' order by districtname");
       }
       
       function getCategory($categoryid=0) {
            global $mysql;
            return ($categoryid==0)? $mysql->select("select * from _jcategory"): $mysql->select("select * from _jcategory where categid='".$categoryid."' order by categname");
       }
      
       function getModels($brandid=0) {
            global $mysql;
            return ($brandid==0)? $mysql->select("select * from _JModels"): $mysql->select("select * from _JModels where brandid='".$brandid."'");
       }
       function getVariants($modelid=0) {
            global $mysql;
            return ($modelid==0)? $mysql->select("select * from _JVariants"): $mysql->select("select * from _JVariants where modelid='".$modelid."'");
       }
       function getCityNames($districtid=0) {
            global $mysql;
            return ($districtid==0)? $mysql->select("select * from _jcitynames"): $mysql->select("select * from _jcitynames where distcid='".$districtid."'");
       }
       
       function getSubcategories($categid) {
            global $mysql;
            return $mysql->select("select * from _jsubcategory where categid='".$categid."' order by subcatename");
       }
       
       function getAdtype($adtypeid=0) {
            global $mysql;
            return ($adtypeid==0)? $mysql->select("select * from _jadtype"): $mysql->select("select * from _jadtype where typeid=".$adtypeid);
       }
       
       function getAdtypes($categid) {
            global $mysql;
            return $mysql->select("select * from _jadtype where categid=".$categid);
       }
      
       function getSubcategory($subcategid=0) {
            global $mysql;
            return ($subcategid==0)? $mysql->select("select * from _jsubcategory"): $mysql->select("select * from _jsubcategory where subcatid=".$subcategid);
       }                                                                                        
       
       
       
       function getMyAd($adid=0,$userid=0) {
           
           global $mysql;
           $sql = ($sql=="") ? "" : "  ".$sql;
           if ($userid==0){
               return array();
           }
           return $mysql->select("SELECT * FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid where   _jpostads.postadid='".$adid."' and ( _jpostads.postedby='".$userid."' or _jpostads.pposted='".$userid."' )");       
       }
             
        function getMyads($userid) {
            global $mysql;
            return $mysql->select("SELECT * FROM _jpostads  WHERE  _jpostads.postedby='".$userid."' or _jpostads.pposted='".$userid."' order by postadid desc  ");       
       } 
       
       function getMyActiveads($userid) {
            global $mysql;
            return $mysql->select("SELECT * FROM _jpostads  WHERE  isdeleted='0' and ( _jpostads.postedby='".$userid."' or _jpostads.pposted='".$userid."' )  order by postadid desc  ");       
       }
       
       
       function getMyDeletedAds($userid=0) {
           global $mysql;
           return $mysql->select("SELECT * FROM _jpostads  where isdeleted='1' and ( _jpostads.postedby='".$userid."' or _jpostads.pposted='".$userid."' )");       
       }
       
       
       function getMyRecentlyViewedAds($userid=0) {
           global $mysql;
           return $mysql->select("select * from  _jpostads where postadid in (select adid from _jrecentlyviewed where userid='".$userid."' group by adid) and isdelete='0' and (postedby<>'".$userid."' or pposted<>'".$userid."' )   order by postadid desc" );
       }
       
       function getLikedAd($userid=0) {
           global $mysql;
           return $mysql->select("select * from  _jpostads where postadid in (select adid from _jfeatures_likedcontact where userid='".$userid."' group by adid) and isdelete='0' and (postedby<>'".$userid."' or pposted<>'".$userid."' ) order by postedby desc" );
       }  
       
    
       function getAds($country,$district,$limitf,$limitt,$stateid,$searchkey="") {
           
            global $mysql;
            
             if ($searchkey!="") {
    $sql =   " and (_jpostads.title like '%".$searchkey."%' or _jpostads.content like '%".$searchkey."%')  ";
   } 
           
             if ($stateid>0) {
                 
                 return  $mysql->select("SELECT *, '0' AS featured FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid  where 
                 _jpostads.countryid='".$country."' and
                 _jpostads.stateid='".$stateid."' and
                 _jpostads.isdeleted='0' ".$sql." 
             
             order by _jpostads.postadid desc  limit ".$limitf.",".$limitt);
             }
             
             
             if ($district>0) {
                 
                      
                   return  $mysql->select("SELECT *, '0' AS featured FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid  where 
                 _jpostads.countryid='".$country."' and
                 _jpostads.distcid='".$district."' and
                 _jpostads.isdeleted='0'   ".$sql."
             
             order by _jpostads.postadid desc  limit ".$limitf.",".$limitt);
             }
             
             
           return $mysql->select("SELECT *, 0 AS featured FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid  where 
                 _jpostads.countryid='".$country."' and
              
                 _jpostads.isdeleted='0' ".$sql."  
             
             order by _jpostads.postadid desc  limit ".$limitf.",".$limitt);
       }   
       
       function getFeaturedAds($country,$district,$limitf,$limitt,$stateid) {
           
           global $mysql;
           
           if ($stateid>0) {
               
               return  $mysql->select("SELECT *, '1' AS featured FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid  where 
                                          _jpostads.isdeleted='0' and _jpostads.postadid in (select adid from _tbl_featured where ispublish='1' and date(enddate)>=date('".date("Y-m-d")."')   and countryid='".$country."' and stateid='".$stateid."') 
                                          order by _jpostads.postadid desc  ");
           }
           
           if ($district>0) {
               return  $mysql->select("SELECT *, '1' AS featured FROM _jpostads left join _jcategory on  _jpostads.categid=_jcategory.categid  where 
                                            _jpostads.isdeleted='0'  and _jpostads.postadid in (select adid from _tbl_featured where ispublish='1' and    date(enddate)>=date('".date("Y-m-d")."')    and countryid='".$country."' and districtid='".$district."')
                                            order by _jpostads.postadid desc ");
           }
           return array(); 
       }   
            
   } 
?>
