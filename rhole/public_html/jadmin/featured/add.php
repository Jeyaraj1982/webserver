<?php
    include_once("../../config.php"); 
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
                
              $c = $mysql->select("select * from _jcategory where categid='".$_POST['categid']."'");
              
              $sn = $mysql->select("select * from _jstatenames where stateid='".$_POST['state']."'");
              
              
              if ($_POST['categid']!=0 && $_POST['state']!=0) {
                  
                  
                  
                  $sc = $mysql->select("select * from _jsubcategory where subcateid='".$_POST['subcategory']."'");
                  $dn = $mysql->select("select * from _jdistrictnames where distcid='".$_POST['district']."'");
                  
                  $param=array("adid"           => $_POST['adid'],
                               "categoryid"     => $_POST['categid'],
                               "categoryname"   => $c[0]['categname'],
                               "subcategoryid"  => $_POST['subcategory'],
                               "subcategoryname"=> $sc[0]['subcatename'],
                               "countryid"      => "1",                  
                               "countryname"    => "India",                  
                               "stateid"        => $_POST['state'],
                               "statename"      => $sn[0]['statenames'],
                               "districtid"     => $_POST['district'],
                               "districtname"   => $dn[0]['districtname'],
                               "duration"       => $_POST['duration'],
                               "startdate"      => date("Y-m-d H:i:s"),
                               "enddate"        => date('Y-m-d H:i:s', strtotime(' + '.$_POST['duration'].' days')),
                               "faamount"       => $_POST['amount'],
                               "createdon"      => date("Y-m-d H:i:s"));
                  $mysql->insert("_tbl_featured",$param);
                  echo $obj->printSuccess("New Featured ads added successfully");
              } elseif ($_POST['categid']>0 && $_POST['state']!=0) {
                   
                  $sc = $mysql->select("select * from _jsubcategory where subcateid='".$_POST['subcategory']."'");
                  $districtnames = $mysql->select("select * from _jdistrictnames where stateid='".$_POST['state']."'");
                  
                  foreach($districtnames as $dn) {
                  $param=array("adid"           => $_POST['adid'],
                               "categoryid"     => $_POST['categid'],
                               "categoryname"   => $c[0]['categname'],
                               "subcategoryid"  => $_POST['subcategory'],
                               "subcategoryname"=> $sc[0]['subcatename'],
                               "countryid"      => "1",                  
                               "countryname"    => "India",                  
                               "stateid"        => $_POST['state'],
                               "statename"      => $sn[0]['statenames'],
                               "districtid"     => $dn['distcid'],
                               "districtname"   => $dn['districtname'],
                               "duration"       => $_POST['duration'],
                               "startdate"      => date("Y-m-d H:i:s"),
                               "enddate"        => date('Y-m-d H:i:s', strtotime(' + '.$_POST['duration'].' days')),
                               "faamount"       => $_POST['amount'],
                               "createdon"      => date("Y-m-d H:i:s"));
                  $mysql->insert("_tbl_featured",$param);
                  }
                  echo $obj->printSuccess("New Featured ads added successfully ".sizeof($districtnames)." districts");
              } elseif ($_POST['categid']!=0 && $_POST['state']>0) {
                  
                   
                  $dn = $mysql->select("select * from _jdistrictnames where distcid='".$_POST['district']."'");
                  
                  $subcatgories = $mysql->select("select * from _jsubcategory where categid='".$_POST['categid']."'");
                 
                  foreach($subcatgories as $sc) {
                  $param=array("adid"           => $_POST['adid'],
                               "categoryid"     => $_POST['categid'],
                               "categoryname"   => $c[0]['categname'],
                               "subcategoryid"  => $sc['subcateid'],
                               "subcategoryname"=> $sc['subcatename'],
                               "countryid"      => "1",                  
                               "countryname"    => "India",                  
                               "stateid"        => $_POST['state'],
                               "statename"      => $sn[0]['statenames'],
                               "districtid"     => $_POST['district'],
                               "districtname"   => $dn[0]['districtname'],
                               "duration"       => $_POST['duration'],
                               "startdate"      => date("Y-m-d H:i:s"),
                               "enddate"        => date('Y-m-d H:i:s', strtotime(' + '.$_POST['duration'].' days')),
                               "faamount"       => $_POST['amount'],
                               "createdon"      => date("Y-m-d H:i:s"));
                  $mysql->insert("_tbl_featured",$param);
                  }
                  echo $obj->printSuccess("New Featured ads added successfully ".sizeof($subcatgories)." subcategories");
              }  else {
                  echo "error: not possible";
              }
                
      
       

          // echo (JPostads::addPostads($param)>0) ? $obj->printSuccess("New Postads added successfully") : $obj->printError("Error adding Postads");
          
           
      }                             
?>

 <script>
     function getSubcategory(categoryID) {
      $.ajax({url:'../../webservice.php?f=1&action=getSubcategory&categoryID='+categoryID,success:function(data){
          alert(data);
           $('#list_subcategory').html(data);
      }});
     }
 </script>
 <script>
     function getDistrict(stateID) {
      $.ajax({url:'../../webservice.php?f=1&action=getDistrict&stateID='+stateID,success:function(data){
           $('#list_district').html(data);
      }});
     }
 </script>
<script src="https://www.klx.co.in/assets/js/jquery.3.2.1.min.js"></script>
<link rel="stylesheet" href="../../assets/css/demo.css">
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
#district {width:350px}
#subcategory {width:350px}
</style>
 <body style="margin:0px;">
 <div class="titleBar">Post New Ads</div>
 <table cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td style="vertical-align: top;">
                <form action="" method="post" style="background-color:#fff;" enctype="multipart/form-data"> 
                    <table style="margin:0px auto;color: #333;font-family:'Trebuchet MS';font-size: 13px;" cellpadding="3" cellspacing="0" align="left">
                        <tr>
                             <td style="text-align:left;">Advt ID&nbsp;&nbsp;</td>
                             <td colspan="2"><input type="text" name="adid" style="width:365px" maxlength="74" value="<?php echo isset($_POST['adid']) ? $_POST['adid'] : ""; ?>"></td> 
                       </tr>
                        <tr>
                            <td style="text-align:left;">State Name</td>
                            <td colspan="2">
                                <select name="state" id="state" onchange="getDistrict($(this).val())" style="width:180px;">
                                <option value="0" selected="selected">Select State Name</option> 
                                    <?php foreach(JPostads::getStateNames() as $statename) {?>
                                        <option value="<?php echo $statename['stateid'];?>" <?php echo ($statename['stateid']==$pageContent[0]['stateid'])? 'selected="selected"':'';?><?php echo isset($_POST['state']) ? $_POST['state'] : ""; ?>><?php echo $statename['statenames'];?></option>
                                    <?php } ?>
                                 </select> 
                            </td>
                        <tr>
                             <td style="text-align:left;">District Name</td>
                        
                            <td colspan="2">
                                <div id="list_district">
                                 <select name="district" id="district"  style="width:180px;">
                                <option value="0" selected="selected">Select District Name</option> 
                                </select> 
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Category&nbsp;&nbsp;</td>
                            <td colspan="2">
                                <select style="width:365px" name="categid" id="categid" onchange="getSubcategory($(this).val())">
                                <option value="0" selected="selected">Select Category</option>
                                    <?php foreach(JPostads::getCategory() as $category) {?>
                                    <option value="<?php echo $category['categid'];?>"<?php echo isset($_POST['categid']) ? $_POST['categid'] : ""; ?>><?php echo $category['categname'];?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Subcategory&nbsp;&nbsp;</td>
                            <td colspan="2"> 
                            <div id='list_subcategory'>
                                <select style="width:365px" name="subcategory" id="subcategory">
                                    <option value="0" selected="selected">Select Sub Category</option> 
                                </select>
                            </div>      
                            </td>
                       </tr>
                      
                       <tr>
                             <td style="text-align:left;">Days&nbsp;&nbsp;</td>
                             <td colspan="2"><input type="text" name="duration" style="width:365px" maxlength="74" value="<?php echo isset($_POST['duration']) ? $_POST['duration'] : ""; ?>"></td> 
                       </tr>
                         <tr>
                             <td style="text-align:left;">Amount&nbsp;&nbsp;</td>
                             <td colspan="2"><input type="text" name="amount" style="width:365px" maxlength="74" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ""; ?>"></td> 
                       </tr>
                    
                       <tr>
                            <td></td>
                            <td colspan="2" align="left"><input type="submit" name="save" value="Post Ad" bgcolor="grey">  
                       </tr> 
                    </table>
                </form>
              <script>$('#success').hide(3000);</script> 
        </td>
    </tr>
  </table>
  </body>
                    


