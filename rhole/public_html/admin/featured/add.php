<?php
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
          
                  
               
                     
                      $post = $mysql->select("Select * from _jpostads where postadid='".$_POST['adid']."'");
                        $c = $mysql->select("select * from _jcategory where categid='".$post[0]['categid']."'");
              
              $sn = $mysql->select("select * from _jstatenames where stateid='".$post[0]['stateid']."'");
              
                         $sc = $mysql->select("select * from _jsubcategory where subcateid='".$post[0]['subcateid']."'");
                  $dn = $mysql->select("select * from _jdistrictnames where distcid='".$post[0]['distcid']."'");
                         $amount = 0;
                         if ($_POST['duration']==7) {
                             $amount = 100;
                         } else {
                             $amount = 299;
                         }
                  $param=array("adid"           => $_POST['adid'],
                               "categoryid"     => $post[0]['categid'],
                               "categoryname"   => $c[0]['categname'],
                               "subcategoryid"  => $post[0]['subcateid'],
                               "subcategoryname"=> $sc[0]['subcatename'],
                               "countryid"      => "1",                  
                               "countryname"    => "India",                  
                               "stateid"        => $post[0]['stateid'],
                               "statename"      => $sn[0]['statenames'],
                               "districtid"     => $post[0]['distcid'],
                               "districtname"   => $dn[0]['districtname'],
                               "duration"       => $_POST['duration'],
                               "startdate"      => date("Y-m-d H:i:s"),
                               "enddate"        => date('Y-m-d H:i:s', strtotime(' + '.$_POST['duration'].' days')),
                               "faamount"       => $amount,
                               "createdon"      => date("Y-m-d H:i:s"));
                  $mysql->insert("_tbl_featured",$param);
                  echo $obj->printSuccess("New Featured ads added successfully");
              
              
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
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Post New Ads
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Advt ID</label>
                                    <div class="col-md-3"><input type="text" name="adid" class="form-control" maxlength="74" value="<?php echo isset($_POST['adid']) ? $_POST['adid'] : ""; ?>"></div>
                                </div>
                                   <!--  <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">State Name</label>
                                    <div class="col-md-3">
                                        <select name="state" id="state" onchange="getDistrict($(this).val())" class="form-control">
                                            <option value="0" selected="selected">Select State Name</option> 
                                            <?php foreach(JPostads::getStateNames() as $statename) {?>
                                                <option value="<?php echo $statename['stateid'];?>" <?php echo ($statename['stateid']==$pageContent[0]['stateid'])? 'selected="selected"':'';?>><?php echo $statename['statenames'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                               </div>  
                          <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">District Name</label>
                                    <div class="col-md-3">
                                        <div id="list_district">
                                             <select name="district" id="district"  class="form-control">
                                                <option value="0" selected="selected">Select District Name</option> 
                                            </select> 
                                        </div>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Category</label>
                                    <div class="col-md-3">
                                        <select name="categid" id="categid" class="form-control" onchange="getSubcategory($(this).val())">
                                            <option value="0" selected="selected">Select Category Name</option>
                                                <?php foreach(JPostads::getCategory() as $category) {?>
                                                <option value="<?php echo $category['categid'];?>" <?php echo ($category['categid']==$pageContent[0]['categid'])? 'selected="selected"' : '';?>><?php echo $category['categname'];?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Subcategory</label>
                                    <div class="col-md-3">
                                        <div id='list_subcategory'>
                                        <select name="subcategory" class="form-control" id="subcategory">
                                            <option value="0" selected="selected">Select Sub Category</option> 
                                        </select>
                                    </div>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Days</label>
                                    <div class="col-md-3"><input type="text" name="duration" class="form-control" maxlength="74" value="<?php echo isset($_POST['duration']) ? $_POST['duration'] : ""; ?>"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Amount</label>
                                    <div class="col-md-3"><input type="text" name="amount" class="form-control" maxlength="74" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ""; ?>"></div>
                                </div> 
                                 -->
                                  <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Package</label>
                                    <div class="col-md-3">
                                      
                                        <select name="duration" class="form-control" id="duration">
                                            <option value="7">7 Days (Rs. 100)</option> 
                                            <option value="30">30 Days (Rs. 299)</option> 
                                        </select>
                                     
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                                </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">Post Ad</button>
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