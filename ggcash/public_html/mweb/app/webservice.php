<?php
   // ini_set('max_execution_time',360);
include_once("/home/ggcash/public_html/config.php");
    if ($_SESSION['User']['MemberID']>0) {
        
    }   else {
        echo "Session expired";
        exit;
    }
    class Webservice {
        
        var $serverURL="";
        
        function Webservice() {
            global $loginID;
            $this->serverURL  = "http://www.aaranju.in/busticket/api.php?action="; 
        }

        function getData($method,$param=array()) {  
            return $this->_callUrl($method,$param) ;
        }
        
        function _callUrl($method,$param) {
            
            global $__Global;
            $postvars = '';
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$this->serverURL.$method."&rand=".rand(3,33333333333333));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
            curl_setopt($ch,CURLOPT_TIMEOUT, 600); 
            $response = curl_exec($ch);
            curl_close ($ch);
            return $response;
        }
    }
    
  
    
    $webservice = new Webservice();
    echo $_GET['action']();
    
      
    function _getdestinationList() {
        global $webservice;
        $data = $webservice->getData("_getdestinationList&sourceList=".$_GET['sourceList']);
        $data = substr($data,12,strlen($data)-13);
        return $data;
    }
    
    function ViewSeats() {
        global $webservice;  
        $data = $webservice->getData("_getTripDetails&tripid=".$_GET['tripid']);
       ?>
       <div>
        <form action='' method='post' id="bfrom_<?php echo $_GET['tripid'];?>" name="bfrom_<?php echo $_GET['tripid'];?>">
         <?php
            $image_seater_vacant= "assets/images/ac_semi_sleeper_vacant.jpg";
            $image_seater_selected= "assets/images/ac_sleeper_selected.jpg";
            $image_seater_unavailable= "assets/images/ac_semi_sleeper_unavailable.jpg";
            $image_seater_ladies="assets/images/non_ac_seater_ladies.jpg";
            $image_sleeper_vacant="assets/images/volvo_sleeper_available.jpg";
            $image_sleeper_unavailable="assets/images/volvo_sleeper_unavailable.jpg";
            $image_sleeper_ladies="assets/images/non_sleeper_ac_ladies.jpg";
            $image_vertical_sleeper_vacant="assets/images/volvo_sleeper_vertical_vacant.jpg";
            $image_vertical_sleeper_unavailable="assets/images/volvo_sleeper_vertical_unavailable.jpg";
            $image_vertical_sleeper_ladies="assets/images/non_ac_vertical_sleeper_ladies.jpg";
            $image_empty_row="assets/images/no_seat.jpg";
        
            $tripdetails     =  $data ;  
            $availabletrips  = json_decode($tripdetails);
            $travels_name    = "";
            $bus_type_name   = "";
            $departure_time  = "";
            $arrival_time    = "";
            
            echo "<div id='slayouts' style='background:#fff;border:1px solid #ccc'>
            ";
            echo "<div style='background:#ddd'>
                <table style='width:100%;'>
                    <tr>
                        <td style='padding:10px;' colspan='2'>
                            <h3 style='font-size:14px;margin-bottom:0px'>SEAT LAYOUT</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style='background:#fff;padding:10px;'><div>";
                        
            $flag=0;  // for flaging if sleeper or seater bus
            $flag2=0; //  for flaging if completely vertical sleepers
            $flagseatsleep1=0; // for seaters in lower
            $flagseatsleep2=0; // for upper sleepers
    
            $flaglsleep=0;  // flag if lower has sleepers
            $flaglseat=0;  // flag if lower has seats   
            $rowvalue=1;
            $y=0;
            // Getting the chosen bus id.
            if(isset($_GET['chosentwo'])) {
                $chosenbusid=$_GET['chosentwo']; //echo "The chosen bus id on second page ( after the filtering) is".$chosenbusid;
            } else { 
                $chosenbusid=$_GET['chosenone']; // echo "The chosen bus id on main page is".$chosenbusid;
            }
            $tripdetails2 = json_decode($tripdetails);
            $seats = $tripdetails2->seats;
            // foreach loop for the value variable
            foreach ($tripdetails2 as $key => $value) {
                
                if(is_array($value)) {
                    $s=array(array());
                    $sleeper=array(array(array()));
                    $seatsleep=array(array(array()));

                    foreach ($value as $k => $v) {
                        foreach ($v as $k1 => $v1) { //checking first for seater and sleeper bus 
                            if(isset($v->zIndex)&&isset($v->length)&&isset($v->width)) {
                            if ($v->zIndex==0) { // checks lower berths
                                if (($v->length==2 && $v->width==1 )||($v->length==1 && $v->width==2 )) { // both vertical and horizontal sleepers in Lower Berth
                                    $flaglsleep=1;
                                    $seatsleep[$v->zIndex][$v->row][$v->column]=$v;  
                                } elseif ($v->length==1 && $v->width==1) {
                                    $flagseatsleep1=1; 
                                    $flaglseat=1;
                                    $seatsleep[$v->zIndex][$v->row][$v->column]=$v;
                                }
                            } elseif ($v->zIndex==1) { // only sleepers in  upper berths
                                $seatsleep[$v->zIndex][$v->row][$v->column]=$v;
                                $flagseatsleep2=1;
                            }
                        }
                    }//ends foreach ($v as $k1 => $v1)
                }//ends foreach ($value as $k => $v)
                
                if (($flagseatsleep1==1)&&($flagseatsleep2==1)) { // if it is a seater+sleeper
                    //echo "THIS IS SEATER+ SLEEPER";
                    /*
                        $seatsleep[0]  // this is seats/sleepers lower level;
                        $seatsleep[1]   // these are sleepers upper level
                    */
                    $rowcountseater = count($seatsleep[0]);
                    $max=0;
                    $mini = array(); // holds the number of seats in every row
                    for ($i=0; $i <=$rowcountseater ; $i++) { 
                        if(isset($seatsleep[0][$i])) {
                            $mini[$i]=count($seatsleep[0][$i]);
                        }
                    }
                    $min=max($mini);
                    $posi=array();
                    $countter=0;
                    for ($j=0; $j <=$rowcountseater ; $j++) { // for finding the maximum number of seats in each row and using that as the limit in the for loop
                        $countter=0;
                        $i=0;
                        do { 
                            if(!empty($seatsleep[0][$j])) {
                                if(empty($seatsleep[0][$j][$i])) {
                                    if (empty($seatsleep[0][$j][$i+1])) {
                                        if(isset($mini[$j])) {
                                            if($countter==$mini[$j]) {
                                                $posi[$j]=$i; 
                                                break;
                                            }
                                        }
                                    }
                                } else { 
                                    $countter++;
                                    $pos=$i;
                                }
                            }
                            $i++;
                        } 
                        while (($i<$min*2));
                    }
                    $actual = max($posi);
                    for($i=0;$i<=$rowcountseater;$i++) {
                        if(!empty($seatsleep[0][$i])) {
                            if(count($seatsleep[0][$i])>$max) {
                                $max=count($seatsleep[0][$i]);
                            }
                            if (count($seatsleep[0][$i])<$min) {
                                $min=count($seatsleep[0][$i]);
                            }
                        }
                    }
                    $rowcountsleeper = count($seatsleep[1]); 
                    $rowcountseater = count($seatsleep[0]);
                    $sleeperperrowcount = count($seatsleep[1][0]);
                    //For getting the number of seats per row in seater
                    for($i=0;$i<=$rowcountseater;$i++) {
                    if(!empty($seatsleep[0][$i])) {
                        $flagS=0;
                        $flagSL=0;
                        $seatcount=count($seatsleep[0][$i]);
                        if(!empty($seatsleep[0][$i][0])) {
                            if(($seatsleep[0][$i][0]->length==2 && $seatsleep[0][$i][0]->width==1)||($seatsleep[0][$i][0]->length==1 && $seatsleep[0][$i][0]->width==2)) {
                              $flagSL=1;
                            } else {
                              $flagS=1;
                            }
                            for ($j=1; $j <$seatcount ; $j++) { 
                                if(!empty($seatsleep[0][$i][$j])) {
                                    if ($flagS==1 && (($seatsleep[0][$i][$j]->length==2 && $seatsleep[0][$i][$j]->width==1)||($seatsleep[0][$i][$j]->length==1 && $seatsleep[0][$i][$j]->width==2))) {
                                        $flagSL=1;
                                        break;
                                    } elseif ($flagSL==1 && ($seatsleep[0][$i][$j]->length==1 && $seatsleep[0][$i][$j]->width==1)) {
                                        $flagS=1;
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    if($flagS==1 && $flagSL==1){ 
                        break;
                    }
                }
                if($flagS==1 && $flagSL==1) {
                  $seatperrowcount=$min*2;
                } else {
                    $seatperrowcount = $max;
                }
                // ends finding the limit for the seater loop (number of seats in a row)
                // FUNCTION CALL (1) UPPER BERTHS IN SEATER+SLEEPER
                generatelayout($rowcountsleeper,$sleeperperrowcount,$seatsleep,1,1);   
                //LOWER BERTHS
                // if seats and sleepers lower berths
                if ($flaglseat==1 && $flaglsleep==1) {
                    generatelayout($rowcountseater,$actual,$seatsleep,0,1);
                } elseif ($flaglseat==1 && $flaglsleep==0) {
                    generatelayout($rowcountseater,$seatperrowcount,$seatsleep,0,1);
                }
                  //ends if it is a seater+sleeper
                  //  If its not sleeper+seater -> basic seater/ sleeper
                } elseif((($flagseatsleep1==0)&&($flagseatsleep2==0))||(($flagseatsleep1==1)&&($flagseatsleep2==0))||(($flagseatsleep1==0)&&($flagseatsleep2==1))) {
                    $sleepersize=array(array(array()));
                    foreach ($value as $k => $v) {
                    foreach ($v as $k1 => $v1) {
                        if(isset($v->length)&&isset($v->width)) {
                            if($v->length==1 && $v->width==1) { // condition for seater or semi-sleeper
                                $flag=2;
                                if(!strcmp($k1,'row')) {
                                    $s[$v1][$v->column]=$v;
                                }
                            } else if(($v->length==2 && $v->width==1)||($v->length==1 && $v->width==2)) {  // condition for horizontal sleeper                            
                                $flag=1;
                                if($v->length==2 && $v->width==1) { 
                                   $flag2=1;
                                }
                                if(!strcmp($k1,'row')) {
                                    if($v1>=$rowvalue)
                                   { $rowvalue=$v1;}
                                    $sleeper[$v->zIndex][$v1][$v->column]=$v;
                                    $sleepersize[$v->zIndex][$v1][$v->column]=$v->column;
                                }
                            }
                        }
                    }
                }
                $rowcountseater = count($s);  
                $seatperrowcount = count($s[0]);
                $c=0;
                for($i=0;$i<=$rowvalue;$i++)
                {
                  if(!empty($sleeper[0][$i]))
                    {$c++;}
                }
                $rowcountsleeper=$c;
                // If it is a sleeper
                if ($flag==1)
                {
                    if (!empty($sleeper[0][$rowvalue])) {  
                     $sleeperperrowcount0= count($sleeper[0][$rowvalue]);
                    } else { 
                        $sleeperperrowcount0=0;
                    }

                    if (!empty($sleeper[1][$rowvalue])) {   
                    $sleeperperrowcount1= count($sleeper[1][$rowvalue]);
                    } // change made here
                    else {
                        $sleeperperrowcount1=0;
                    }
                    $sleeperperrowcount = max($sleeperperrowcount1,$sleeperperrowcount0);
                    $MAXX=0;
                    for ($i=1; $i >=0 ; $i--) {   
                        for ($j=0; $j <=$rowvalue ; $j++) {
                           if(!empty($sleepersize[$i][$j])) {
                              $X=max($sleepersize[$i][$j]);  
                            } else {
                               $X=0; 
                            }
                            if($X>$MAXX) {
                                $MAXX = $X;
                            }
                        }
                        if($flag2==1) // horizontal + vertical sleepers
                       {
                       //generate seatlayout 
                        generatelayout($rowvalue,$MAXX,$sleeper,$i,0);
                       } else {
                        $Z=$sleeperperrowcount+1;
                        generatelayout($rowvalue,$Z,$sleeper,$i,0);
                       }
                    }
                } elseif ($flag==2) // If it is seater
                {
                    if(!empty($s)) {
                        generateLayoutSeater($rowcountseater,$seatperrowcount,$s);
                    }
                }
        } // ends if NOT sleeper+seater
    } //ends if(is_array($value))
}// foreach loop for the value variable ends
echo " </div>
</td>
<td style='width:500px;padding:10px;vertical-align:top;background:#f1f1f1'>

<div style='width:500px;'> 
    <div id='display_bpdp_".$_GET['tripid']."'></div>
    <div id='billform_bpdp_".$_GET['tripid']."'></div>

    <div id='ttfare_".$_GET['tripid']."'></div> 
    <input type='hidden' name='ttfare' id='ttfare'>
    
    <div id='no_Seats_".$_GET['tripid']."'></div>
    <input type='hidden'  name='seatscount' id='seatscount'> 
    
    <div id='tsts_".$_GET['tripid']."'></div>
    <input type='hidden' id='seats' name='seats'>  
    
    <input type='hidden' name='tripid' value='".$_REQUEST['tripid']."' />
<div style='text-align:right'><input class='btn btn-success' type='button' id='booking_submit_btn' disabled='disabled' value=' Continue ' onclick='ConfrimTicket()' class='viewSeatsBtn'> </div> 
</div>
</td>
</tr>
<!--<div style='text-align:right'><input type='submit' value=' Continue ' onclick='goToForm()' class='viewSeatsBtn'>-->
</table>
</div>";

?>
  </form>
</div>
       <?php
         }
    function generatelayout($rowcountsleeper,$sleeperperrowcount,$seatsleep,$UpperLower,$horVer) {
     if  ($UpperLower==1) {
        echo "<br><h3 style='font-size:12px;'>UPPER SECTION</h3>";
        $i=1;
        if($horVer==1) {
            $klimit = ($sleeperperrowcount*2+1) ;
        } elseif ($horVer==0) {
            $klimit = $sleeperperrowcount+1 ;
        }
     } elseif ($UpperLower==0) {
        echo "<h3 style='font-size:12px;'>LOWER SECTION</h3> ";
        $i=0;
        $klimit=$sleeperperrowcount;
     }
     
     $x=0;
     global $y;
     echo "<table frame='box'  style='border:none; border-collapse: separate; border-spacing: 5;margin-left:10px'><tbody>";
     $l=0;
     for ($j=0; $j <=$rowcountsleeper ; $j++) { 
        echo "<tr>";
        for ($k=0; $k <=$klimit ; $k++) { 
            if(!empty($seatsleep[$i][$j][$k])) { 
                if($seatsleep[$i][$j][$k]->length==2 && $seatsleep[$i][$j][$k]->width==1) {
                    if(!strcmp($seatsleep[$i][$j][$k]->available,'true')) {
                        if(!strcmp($seatsleep[$i][$j][$k]->ladiesSeat,'true')) {
                            echo "<td><div id='c_b' class='seatcontainer' style='font-size:11px;color:#555;padding:5px;text-align:center'><label style='margin-bottom: 0px;' for='hsleep".$i.$j.$k."'><img name='hsleep".$y."'src='assets/images/non_sleeper_ac_ladies.jpg'title='Seat Number:".$seatsleep[$i][$j][$k]->name." | Fare: ".$seatsleep[$i][$j][$k]->fare."' class='imagehover'/><input tfare='".$seatsleep[$i][$j][$k]->fare."' type='checkbox' name='chkchk[]' class='checkbox' id='hsleep".$i.$j.$k."' value='".$seatsleep[$i][$j][$k]->name."' onclick=\"swapladieshsleeper(this,".$y++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$seatsleep[$i][$j][$k]->fare."--></div></td>";
                        } else {
                            echo "<td><div id='c_b' class='seatcontainer' style='font-size:11px;color:#555;padding:5px;text-align:center'><label style='margin-bottom: 0px;' for='hsleep".$i.$j.$k."'><img name='hsleep".$y."'src='assets/images/volvo_sleeper_vacant.jpg' title='Seat Number:".$seatsleep[$i][$j][$k]->name." | Fare: ".$seatsleep[$i][$j][$k]->fare."' class='imagehover'/><input tfare='".$seatsleep[$i][$j][$k]->fare."' type='checkbox' name='chkchk[]' class='checkbox' id='hsleep".$i.$j.$k."' value='".$seatsleep[$i][$j][$k]->name."' onclick=\"swaphsleeper(this,".$y++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$seatsleep[$i][$j][$k]->fare."--></div></td>";
                        }
                    } else {
                        echo "<td style='font-size:11px;color:#555;padding:5px;text-align:center'><div class='container_un'><img src='assets/images/volvo_sleeper_unavailable.jpg'/><!--<br>&nbsp;--></div></td>";
                    } 
            } elseif ($seatsleep[$i][$j][$k]->length==1 && $seatsleep[$i][$j][$k]->width==2) {
                if(!strcmp($seatsleep[$i][$j][$k]->available,'true')) {
                    if(!strcmp($seatsleep[$i][$j][$k]->ladiesSeat,'true')) {
                    echo "<td><div id='c_b' class='container_vert'><label for='vsleep".$i.$j.$k."'><img name='vsleep".$y."'src='assets/images/non_ac_vertical_sleeper_ladies.jpg' title='Seat Number:".$seatsleep[$i][$j][$k]->name." | Fare: ".$seatsleep[$i][$j][$k]->fare."' class='imagehover'/><input tfare='".$seatsleep[$i][$j][$k]->fare."' type='checkbox' class='checkbox' name='chkchk[]' id='vsleep".$i.$j.$k."' value='".$seatsleep[$i][$j][$k]->name."' onclick='swapvsleeper(this,".$y++.")' style='visibility:hidden;display:none;'/></label><!--<br>".$seatsleep[$i][$j][$k]->fare."--></div></td>";
                    } else {
                        echo "<td><div id='c_b' class='container_vert'><label for='vsleep".$i.$j.$k."'><img name='vsleep".$y."'src='assets/images/volvo_sleeper_vertical_vacant.jpg' title='Seat Number:".$seatsleep[$i][$j][$k]->name." | Fare: ".$seatsleep[$i][$j][$k]->fare."' class='imagehover'/><input tfare='".$seatsleep[$i][$j][$k]->fare."' type='checkbox' class='checkbox' name='chkchk[]' id='vsleep".$i.$j.$k."' value='".$seatsleep[$i][$j][$k]->name."' onclick=\"swapvsleeper(this,".$y++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$seatsleep[$i][$j][$k]->fare."--></div></td>";
                    }
                } else {
                echo "<td><div class='container_vert_un'><img src='assets/images/volvo_sleeper_vertical_unavailable.jpg'/><br>&nbsp;</div></td>";
               } 
            } elseif ($seatsleep[$i][$j][$k]->length==1 && $seatsleep[$i][$j][$k]->width==1) {
                $storeseatname=$seatsleep[$i][$j][$k]->name;
                if(!strcmp($seatsleep[$i][$j][$k]->available,'true')) {
                    if(!strcmp($seatsleep[$i][$j][$k]->ladiesSeat,'true')) {
                    echo "<td><div id='c_b'class='seatcontainer' style='font-size:11px;color:#555;;padding:5px;text-align:center'><label for='seat".$j.$k."'><img name='img".$l."' id='".$k.$j."' src='assets/images/non_ac_seater_ladies.jpg' title='Seat Number:".$seatsleep[$i][$j][$k]->name." | Fare: ".$seatsleep[$i][$j][$k]->fare."' class='imagehover'/><input tfare='".$seatsleep[$i][$j][$k]->fare."' type='checkbox' class='checkbox' name='chkchk[]' id='seat".$j.$k."' value='".$seatsleep[$i][$j][$k]->name."' onclick=\"swapladiesseater(this,".$l++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$seatsleep[$i][$j][$k]->fare."--></div></td>" ;
                    } else {
                     echo "<td><div id='c_b'class='seatcontainer' style='font-size:11px;color:#555;;padding:5px;text-align:center'><label for='seat".$j.$k."'><img name='img".$l."' id='".$k.$j."'src='assets/images/ac_semi_sleeper_vacant.jpg' title='Seat Number:".$seatsleep[$i][$j][$k]->name." | Fare: ".$seatsleep[$i][$j][$k]->fare."' class='imagehover' /><input tfare='".$seatsleep[$i][$j][$k]->fare."' type='checkbox' class='checkbox' name='chkchk[]' id='seat".$j.$k."' value='".$seatsleep[$i][$j][$k]->name."' onclick=\"swapseater(this,".$l++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$seatsleep[$i][$j][$k]->fare."--></div></td>";
                    }  
                } else {
                    echo "<td><div class='container_un'><img src='assets/images/ac_semi_sleeper_unavailable.jpg'/><!--<br>&nbsp;--></div></td>";
                }    
            }
        }
        if(empty($seatsleep[$i][$j][$k])) {
            if (empty($seatsleep[$i][$j])) {
                echo "<td><img src='assets/images/no_seat.jpg'/></td>";
            } elseif (!empty($seatsleep[$i][$j])) {
                echo "<td></td>";
            }
        }
    }
    echo "</tr>";
    }
     echo "</tbody></table>";
    }
    function getTime($time) {
            $hour = (int)($time / 60);
            $remainder = $time % 60;
            $remainder = ($remainder == 0) ? "00"  : $remainder;
            return (($hour>23) ? (($hour%24)) :  $hour).":".$remainder;
        }
    function generateLayoutSeater($rowcountseater,$seatperrowcount,$s) {
        if(!empty($s)) { 
            echo "<table frame='box'  style='border:none;border:none; border-collapse: separate; border-spacing: 5;margin-left:10px'><tbody>";
            $k=0;
            for ($i=0; $i <=$rowcountseater ; $i++) { 
                echo "<tr>";
                for ($j=0; $j <= $seatperrowcount ; $j++) { 
                    if(!empty($s[$i][$j])) { 
                        $storeseatname=$s[$i][$j]->name;
                        if(!strcmp($s[$i][$j]->available,'true')) {
                            if(!strcmp($s[$i][$j]->ladiesSeat,'true')) {
                                echo "<td><div id='c_b'class='seatcontainer' style='font-size:11px;color:#555;padding:5px;text-align:center'><label for='seat".$i.$j."'><img name='img".$k."' id='".$j.$i."' src='assets/images/non_ac_seater_ladies.jpg' title='Seat Number:".$s[$i][$j]->name." | Fare: ".$s[$i][$j]->fare."' class='imagehover'/><input tfare='".$s[$i][$j]->fare."' type='checkbox' class='checkbox' name='chkchk[]' id='seat".$i.$j."' value='".$s[$i][$j]->name."' onclick=\"swapladiesseater(this,".$k++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$s[$i][$j]->fare."--></div></td>" ;
                            } else {
                                echo "<td><div id='c_b'class='seatcontainer' style='font-size:11px;color:#555;;padding:5px;text-align:center'><label for='seat".$i.$j."'><img name='img".$k."' id='".$j.$i."' src='assets/images/ac_semi_sleeper_vacant.jpg' title='Seat Number:".$s[$i][$j]->name." | Fare: ".$s[$i][$j]->fare."' class='imagehover' /><input tfare='".$s[$i][$j]->fare."'  type='checkbox' class='checkbox' name='chkchk[]' id='seat".$i.$j."' value='".$s[$i][$j]->name."' onclick=\"swapseater(this,".$k++.",'".$_GET['tripid']."')\" style='visibility:hidden;display:none;'/></label><!--<br>".$s[$i][$j]->fare."--></div></td>"; 
                            }
                        } else {
                            echo "<td><div class='container_un'><img src='assets/images/ac_semi_sleeper_unavailable.jpg'/><!--<br>&nbsp;--></div></td>";
                        }  
                    }
                    if(empty($s[$i][$j])) {
                        if (empty($s[$i])) {
                            echo "<td><img src='assets/images/no_seat.jpg'/></td>";
                        } elseif (!empty($s[$i])) {
                            echo "<td></td>";
                        }
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }

    }
    //782
    function BlockAndBookTicket() {
        global $webservice,$mysqldb;
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
        $numberofseats = explode(",",$_POST['seats']);
    
        for ($i=0; $i <$checkbox_no ; $i++) {
            $user_name[$i]=$_POST['fname_'.$i.''];
            $user_gender[$i]=$_POST['sex_'.$i.''];
            $user_age[$i]=$_POST['age_'.$i.''];
            $user_title[$i]=$_POST['title_'.$i.''];
        }
                
        for ($i=0; $i <$checkbox_no ; $i++) {
            $user_primary[$i] =  ($i==0) ? 'true' : 'false';
        }
       
        $tripdetails = json_decode($webservice->getData("_getTripDetails&tripid=".$_POST['tripid']),true);
        $seats=explode(",", $_POST['seats']);
        $total_fare=0;
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
                    $total_fare+=$v["fare"];
                }                     
            }
        }
        $json['availableTripId'] = $_POST['tripid'];
        $json['boardingPointId'] = $_POST['bpointid'];
        $json['destination']     = $_POST['dpointid'];
        $json['inventoryItems']  = $inventoryItems;
        $json['source']          = $_POST['fromid'];
    
        $balance = getUtilityhWalletBalance($_SESSION['User']['MemberID']);
        //$balance=  $total_fare;  
        if ($total_fare<=$balance) {
            $tripInfo = json_decode($_POST['TripInfo'],true);
            
            foreach($tripInfo['boardingTimes'] as $v) {
                if (is_array($v)) {
                    if ($v['bpId']==$_POST['bpointid']) {
                        $bpName = $v['bpName'];
                        $bpAddress = $v['address'];
                        $bpLandmark = $v['landmark'];
                        $bpContactNumber = $v['contactNumber'];
                        $bpLocation = $v['location'];
                        $bpTime = $v['time'];
                    } 
                } else {
                    $bpName = $tripInfo['boardingTimes']['bpName'];
                    $bpAddress = $tripInfo['boardingTimes']['address'];
                    $bpLandmark = $tripInfo['boardingTimes']['landmark'];
                    $bpContactNumber = $tripInfo['boardingTimes']['contactNumber'];
                    $bpLocation = $tripInfo['boardingTimes']['location'];
                    $bpTime = $tripInfo['boardingTimes']['time'];  
                }
            }
            $reqID = $mysqldb->insert("_bus_booking_requests",array("MemberID"      => $_SESSION['User']['MemberID'],
                                                                    "Requested"     => date("Y-m-d H:i:s"),
                                                                    "SourceID"      => $_POST['fromid'],
                                                                    "SourceName"    => $_POST['From'],
                                                                    "ToID"          => $_POST['toid'],
                                                                    "ToName"        => $_POST['To'],
                                                                    "DateOfJourny"  => $_POST['doj'],
                                                                    "NumberOfSeats" => $_POST['seatscount'],
                                                                    "Seats"         => $_POST['seats'],
                                                                    "TripID"        => $_POST['tripid'],
                                                                    "BookingValue"  => $total_fare,
                                                                    "ServiceCharge" => "0",
                                                                    "RequestJson"   => json_encode($json),
                                                                    "BlockKey"      => "",
                                                                    "PrimarySeatNumber"        => $_POST['seats'],
                                                                    "PrimaryPassengerName"     => $_POST['fname_0'],
                                                                    "PrimaryPassengerEmail"    => $_POST['email_id'],
                                                                    "PrimaryPassengerMobile"   => $_POST['mobile'],
                                                                    "PrimaryPassengerIdType"   => $_POST['id_proof'],
                                                                    "PrimaryPassengerIdNumber" => $_POST['id_no'],
                                                                    "PrimaryPassengerAddress"  => $_POST['address'],
                                                                    "PNR"               => "",
                                                                    "TicketID"          => "",
                                                                    "BookingResponse"   => "",
                                                                    "BookingStatus"     => "",
                                                                    "CancellationPolicy"=> $_POST['CancellationPolicy'],
                                                                    "BusOperatorName"   => $_POST['bus_operator_name'],
                                                                    "BusType"           => $_POST['bus_type'],
                                                                    "BusServiceId"      => $_POST['BusServiceId'],
                                                                    "TripInfo"          => $_POST['TripInfo'],
                                                                    "SeatsInfo"         => json_encode($tripdetails),
                                                                    "BoardingPointID"   => $_POST['bpointid'],
                                                                    "BPName"            => $bpName,
                                                                    "BPLocation"        => $bpLocation,
                                                                    "BPLandmark"        => $bpLandmark,
                                                                    "BPAddress"         => $bpAddress,
                                                                    "BPContactNo"       => $bpContactNumber,
                                                                    "BPTimeValue"       => $bpTime,
                                                                    "BPTime"            => getTime($bpTime),
                                                                    "BTReportingTime"   => getTime($bpTime-15),
                                                                    "DroppingPointID"   => $_POST['dpointid'],
                                                                    "DPLocation"=>"",
                                                                    "DPTime"=>"",
                                                                    "SMSContent"        => "", 
                                                                    "BlockStatus"       => "", 
                                                                    "BookStatus"        => ""));
            /* Block Ticket */
            $resdata =file_get_contents("http://aaranju.in/busticket/api.php?action=_blockTicket&blockparam=".base64_encode(json_encode($json)));
            if (strlen(trim($resdata))>0 && strlen(trim($resdata))<20)  {
                
                $mysqldb->execute("update `_bus_booking_requests` set `BlockKey`='".trim($resdata)."',`BlockStatus`='success' where `BookingID`='".$reqID."'");
                /* Debit Amount */
                $bal = getUtilityhWalletBalance($_SESSION['User']['MemberID'])-$total_fare;
                $id=$mysqldb->insert("_tbl_wallet_utility",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                      "Particulars"      => "Bus Ticket Booking ".$_POST['From']." To ".$_POST['To']." On ".date("l, F d, Y",strtotime($_POST['doj']))." ".getTime($bpTime).", PNR#: ".trim($pnr['pnr']),                    
                                                                      "Credits"          => "0",                    
                                                                      "Debits"           => $total_fare, 
                                                                      "AvailableBalance" => $bal,                   
                                                                      "TxnDate"          => date("Y-m-d H:i:s")));
                $sms_response=MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberCode']," Rs. ".$total_fare." has been debited from Your Utility Wallet. Your Utility Wallet Balance Rs. ".$bal,$_SESSION['User']['MemberID']);
                /* Confirm Ticket */
                $tininfo =file_get_contents("http://aaranju.in/busticket/api.php?action=_confirmTicket&tokenkey=".trim($resdata));
                //$tininfo="A4DCFACA";
                $mysqldb->execute("update `_bus_booking_requests` set `BookingResponse`='".trim($tininfo)."', `TicketID`='".trim($tininfo)."', `BookStatus`='success' where `BookingID`='".$reqID."'");
          
                /* Get Ticket Information*/
                $ticketInfo=file_get_contents("http://aaranju.in/busticket/api.php?action=_getTicket&pnr=".trim($tininfo));
                $pnr=json_decode($ticketInfo,true);
                $mysqldb->execute("update `_bus_booking_requests` set `TicketInfo`='".trim($ticketInfo)."', `PNR`='".trim($pnr['pnr'])."',BookingStatus='Booked'    where `BookingID`='".$reqID."'");
            
                /*SMSDetails*/
                $sms="Ticket Booking Confirmation: ".$_POST['From']." To ".$_POST['To']." On ".date("l, F d, Y",strtotime($_POST['doj']))." ".getTime($bpTime).", PNR#: ".trim($pnr['pnr']).", TIN#: ".$tininfo.", Seat(s): ".$_POST['seats'].", Bus Operator: ".$_POST['bus_operator_name'].", Contact Number: ".$bpContactNumber.", Pickup Location: ".$bpLocation.", Land Mark: ".$bpLandmark.", Total Fare (Rs): ".number_format($total_fare,2);
                $mysqldb->execute("update `_bus_booking_requests` set `SMSContent`='".trim($sms)."'  where `BookingID`='".$reqID."'");
                //$sms_response=SMSController::sendsms("http://www.aaranju.in/sms/api.php?username=Z2djYXNoQGdtY&password=WlsLmNvbQ==&number=".$_POST['mobile']."&sender=GOODGW&message=".urlencode($sms)."&uid=".$reqID);
                $sms_response=MobileSMS::sendSMS($_POST['mobile'],$sms,$_SESSION['User']['MemberID']);
        ?>
            <script>$('#result_<?php echo $_POST['tripid']; ?>').html(""); </script>
            <div style="text-align:center;padding:30px;font-size:25px;;color:green;padding:20px">
                <img src='assets/images/tick.png' style="height:120px;"><br><br>
                Booking Process Completed<Br>
                <div style="font-size:15px;color:#333;padding-top:10px"><a target="blank" href='ticket.php?pnr=<?php echo $pnr['pnr'];?>'>Print Ticket</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='javascript:cancelConfrimBook()'>Continue</a></div>
            </div>
        <?php
        } else {
            $mysqldb->execute("update `_bus_booking_requests` set `BooingResponse`='".$resdata."',`BookingStatus`='Failed' where `BookingID`='".$reqID."'");
        ?>
        <div style="text-align:center;padding:10px;font-size:25px;color:red;padding:20px">
            <img src='assets/images/fail.png' style="height:120px;"><br><br>
            Booking Failed<Br>
            <?php echo $resdata;?>
            <div style="font-size:15px;color:#333;padding-top:10px"><a href='javascript:cancelConfrimBook()'>Continue</a></div>
        </div>
        <?php
      }
    } else {
    ?>
        <div style="text-align:center;padding:10px;font-size:18px;color:red;padding:20px">
            <img src='assets/images/fail.png' style="height:120px;"><br><br>
            Transaction failed. Insufficiant balance.<Br>
            <?php echo $resdata;?>
            <div style="font-size:15px;color:#333;padding-top:10px"><a href='javascript:cancelConfrimBook()'>Continue</a></div>
            
        </div>
    <?php
    }
    }
    
    function ResendBusTicket() {
        global   $mysqldb;
        sleep(5);
          $details = $mysqldb->select("select * from `_bus_booking_requests` where `PNR`='".$_GET['pnr']."'");
    MobileSMS::sendSMS($details[0]['PrimaryPassengerMobile'],$details[0]['SMSContent'],$details[0]['MemberID']);
    echo "Sms has been sent";
    }
?>