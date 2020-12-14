<?php
  include_once("hotel/apiconfig.php");
  
  if (isset($_POST['btnSendRequest'])) {
      
      $shopDetails = $mysql->select("select * from astores where storeid='".$_POST['shopid']."'");
      
      if (sizeof($shopDetails)==0) {
          
          echo json_encode(array("status"=>"failed","error"=>"Shop/Store Not Found"));
          exit;
      }
      
      if (!(isset($_POST['mobilenumber']) && strlen($_POST['mobilenumber'])==10 && ($_POST['mobilenumber']>7000000000  && $_POST['mobilenumber']<99999999999))) {
          echo json_encode(array("status"=>"failed","error"=>"Invalid Mobile Number"));
          exit;
      }
      
      $billinfo = $mysql->select("select * from api where shopid='".$_POST['shopid']."' and billnumber ='".$_POST['billnumber']."'");
      
      if (sizeof($billinfo)>0) {
          echo json_encode(array("status"=>"failed","error"=>"Duplicate Bill Number"));
          exit;
      }
      
      if (!(isset($_POST['poinstoadd']) && $_POST['poinstoadd']>=0)) {
         echo json_encode(array("status"=>"failed","error"=>"Invalid Points To Credit. Ponits must be equal/greaterthan Zero"));  
      }
      
     if (!(isset($_POST['pointstodebit']) && $_POST['pointstodebit']>=0)) {
         echo json_encode(array("status"=>"failed","error"=>"Invalid Points To Debit. Ponits must be equal/greaterthan Zero"));  
      }
       
      $userdata = $mysql->select("SELECT * FROM _tbluser WHERE contactno='".$_POST['mobilenumber']."'");
      
      if (!(sizeof($userdata)>0)) {
      
          $mysql->insert("_tbluser",array("username"    => $_POST['customername'],
                                          "emailid"     => $_POST['emailid'],
                                          "contactno"   => $_POST['mobilenumber'],
                                          "password"    => time(),
                                          "isadmin"     => "0",
                                          "createdon"   => date("Y-m-d H:i:s")));
      }
        
      $id = $mysql->insert("api",array("shopid"          => $_POST['shopid'],
                                       "shopconstantkey" => $_POST['shopconstantkey'],
                                       "billnumber"      => $_POST['billnumber'],
                                       "billdate"        => $_POST['billdate'],
                                       "billamount"      => $_POST['billamount'],
                                       "mobilenumber"    => $_POST['mobilenumber'],
                                       "customername"    => $_POST['customername'],
                                       "poinstoadd"      => $_POST['poinstoadd'],
                                       "pointstodebit"   => $_POST['pointstodebit'],
                                       "requestedon"     => date("Y-m-d H:i:s")  ));
      
       
      if ($id>0) {
          
          $points = $mysql->select("SELECT SUM(billamount) AS billamount, SUM(poinstoadd) AS credit,SUM(pointstodebit) AS debit FROM api WHERE mobilenumber='".$_REQUEST['mobileno']."'");
          
          $mysql->execute("update api set availablepoints='".($points[0]['credit']-$points[0]['debit'])."' where apiid=".$id);
          
          $array = array("status"          => "success",
                           "responseid"      => $id,
                           "mobilenumber"    => $userdata[0]['contactno'],
                           "billamount"      => (isset($points[0]['billamount']) ? number_format($points[0]['billamount'],2) : "0.00"), 
                           "creditedpoints"  => (isset($points[0]['credit']) ? $points[0]['credit'] : "0"), 
                           "debitedpoints"   => (isset($points[0]['debit']) ? $points[0]['debit'] : "0"),
                           "availablepoints" => ($points[0]['credit']-$points[0]['debit']) 
                           );
                        
            echo json_encode($array);
      
      } else {
            echo json_encode(array("status"=>"failed","error"=>"user not found"));
      }
      exit;
  }
?>
<form action="" method="post">
post vairables :<br>
shopid, shopconstantkey, billnumber, billdate, billamount, mobilenumber,  customername,  poinstoadd,  pointstodebit, btnSendRequest=send

<table>
    <tr>
        <td>Shop ID</td>
        <td><input type="text" name="shopid"></td>
    </tr>
    <tr>
        <td>Shop Constant Key</td>
        <td><input type="text" name="shopconstantkey"></td>
    </tr>
    <tr>
        <td>BillNumber</td>
        <td><input type="text" name="billnumber"></td>
    </tr>
    <tr>
        <td>BillDate</td>
        <td><input type="text" name="billdate"></td>
    </tr>
    <tr>
        <td>Bill Amount</td>
        <td><input type="text" name="billamount"></td>
    </tr>
    <tr>
        <td>Customer Mobile Number</td>
        <td><input type="text" name="mobilenumber"></td>
    </tr>
    <tr>
        <td>Customer Name</td>
        <td><input type="text" name="customername"></td>
    </tr>
    <tr>
        <td>Points To Add</td>
        <td><input type="text" name="poinstoadd"></td>
    </tr>
    <tr>
        <td>Points To Debit</td>
        <td><input type="text" name="pointstodebit"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" value=" Send Request" name="btnSendRequest">
        </td>
    </tr>
</table>
</form>