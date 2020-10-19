<?php
    include_once("header.php");
    $numberofseats = explode(",",$_POST['seats']);
    ?>
    <form action="booknow" method="post">
    <input type="hidden" name="From" value="<?php echo $_POST['From'];?>">
    <input type="hidden" name="fromid" value="<?php echo $_POST['fromid'];?>">
    <input type="hidden" name="To" value="<?php echo $_POST['To'];?>">
    <input type="hidden" name="toid" value="<?php echo $_POST['toid'];?>">
    <input type="hidden" name="doj" value="<?php echo $_POST['doj'];?>">
    <input type="hidden" name="seats" value="<?php echo $_POST['seats'];?>">
    <input type="hidden" name="ttfare" value="<?php echo $_POST['ttfare'];?>">
    <input type="hidden" name="seatscount" value="<?php echo $_POST['seatscount'];?>">
    <input type="hidden" name="tripid" value="<?php echo $_POST['tripid'];?>">
    <input type="hidden" name="bpointid" value="<?php echo $_POST['bpointid'];?>">
    <input type="hidden" name="dpointid" value="<?php echo $_POST['dpointid'];?>">
   
<?php
    $json=array();
    $user_name=array();
    $user_gender=array();
    $user_age=array();
    $user_primary=array();
    $user_title=array();
    $inventoryItems= array(array());
    $passenger = array(array());

    $checkbox_no       = $_POST['seatscount'];
    $user_mobile       = $_POST['mobile'];
    $user_email        = $_POST['email_id'];
    $user_address      = $_POST['address'];
    $user_id_no        = $_POST['id_no'];
    $user_idproof_type = $_POST['id_proof'];
    
    for ($i=0; $i <$checkbox_no ; $i++) {
        $user_name[$i]=$_POST['fname_'.$i.''];
        $user_gender[$i]=$_POST['sex_'.$i.''];
        $user_age[$i]=$_POST['age_'.$i.''];
        $user_title[$i]=$_POST['title_'.$i.''];
    }
                
    for ($i=0; $i <$checkbox_no ; $i++) {
        $user_primary[$i] =  ($i==0) ? 'true' : 'false';
    }
    
    $data = $webservice->getData("_getTripDetails&tripid=".$_POST['tripid']);
    $tripdetails = $data;
    $seats=explode(",", $_POST['seats']);
    
    for ($i=0; $i <$checkbox_no ; $i++) {
        
        foreach ($tripdetails["seats"] as $key => $v) {
            if(!strcmp($v['name'], $seats[$i])) {
                    $passenger[$i]['age']=$user_age[$i];
                                $passenger[$i]['primary']=$user_primary[$i];
                                $passenger[$i]['name']=$user_name[$i];
                                $passenger[$i]['title']=$user_title[$i];
                                $passenger[$i]['gender']=$user_gender[$i];
                                if ($i==0) {
                                    $passenger[$i]['idType']=$user_idproof_type;
                                    $passenger[$i]['email']=$user_email;
                                    $passenger[$i]['idNumber']=$user_id_no;
                                    $passenger[$i]['address']=$user_address;
                                    $passenger[$i]['mobile']=$user_mobile;
                                }
                                $inventoryItems[$i]['seatName']=$v["name"];
                                $inventoryItems[$i]['ladiesSeat']=$v["ladiesSeat"];
                                $inventoryItems[$i]['passenger']=$passenger[$i];
                                $inventoryItems[$i]['fare']=$v["fare"];
                            }                     
            }
        }
     
    
    $json['availableTripId'] = $_POST['tripid'];
    $json['boardingPointId'] = $_POST['bpointid'];
    $json['destination']     = $_POST['dpointid'];
    $json['inventoryItems']  = $inventoryItems;
    $json['source']          = $_POST['fromid'];
     
      echo "<hr>";           
             
      $resdata =file_get_contents("http://aaranju.in/busticket/api.php?action=_blockTicket&blockparam=".base64_encode(json_encode($json)));
      if (strlen(trim($resdata))>0 && strlen(trim($resdata))<20)  {
          echo "Blocked Successfully";
          
          //http://www.aaranju.in/sms/api.php?username=Z2djYXNoQGdtY&apipassword=WlsLmNvbQ==&number=<mobilenumber>&sender=GOODGW&message=<textmessage>&uid=<yourtxnid> 
          //Book Ticket
      } else {
          echo "Error To Block Seats";
      }
      
    ?>
     
         
               </form>
         <?php include_once("footer.php"); ?>



 
 


 
 