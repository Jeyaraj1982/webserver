 <?php 
    include_once("header.php");
    
    class BusTicket {
        
        function getTime($time) {
            $hour = (int)($time / 60);
            $remainder = $time % 60;
            $remainder = ($remainder == 0) ? "00"  : $remainder;
            return (($hour>23) ? (($hour%24)) :  $hour).":".$remainder;
        }
    
        function CalculateDateTime($doj,$time) {
            $hour = (int)($time / 60);
            $remainder = $time % 60;
            $remainder = ($remainder == 0) ? "00"  : $remainder; 
        
            if (($hour>23)) {
                $day = ((int)$hour/24);
                $days = ($day==0) ? 1 : $day;
                $ndoj = date('Y-m-d', strtotime($doj. ' + '.$days.' days')); 
                $nhour = ($hour%24);
                return $ndoj." ".$nhour.":".$remainder;
            } else {
                return $doj." ".$hour.":".$remainder;
            }  
        }
    
        function CalculateDate($doj,$time) {
            $hour = (int)($time / 60);
            $remainder = $time % 60;
            $remainder = ($remainder == 0) ? "00"  : $remainder; 

            if (($hour>23)) {
                $day = ((int)$hour/24);
                $days = ($day==0) ? 1 : $day;
                $ndoj = date('Y-m-d', strtotime($doj. ' + '.$days.' days')); 
                $nhour = ($hour%24);
                return $ndoj;
            } else {
                return $doj;
            }  
        }
    
        function GetDuration($doj,$btime,$dtime) {
            $datetime1 = new DateTime(BusTicket::CalculateDateTime($doj,$btime));
            $datetime2 = new DateTime(BusTicket::CalculateDateTime($doj,$dtime));
            $interval = $datetime1->diff($datetime2);
            return ($interval->format('%h')<9 ? "0".$interval->format('%h') : $interval->format('%h') )." Hrs ". ($interval->format('%i')<9 ? "0".$interval->format('%i') : $interval->format('%i') )  ." Mins";  
        }
    }

    function farearray($result2)  {
        $fareArr = array();
        if(is_array($result2)) {
            return $result2;  
        } else {
            $fareArr[0]=$result2; 
            return $fareArr;   
        }
    }  
 
    function canPolicy($v1,$fareArr,$departure_time) {
        $STORE='';
        $cancellationcharges = explode(';', $v1);
        $limit = count($cancellationcharges);
         $res = array();
        for ($i=0; $i <$limit ; $i++) { 
            if(!empty($cancellationcharges[$i])) {
                
                $temp = array();

                $val = explode(":",$cancellationcharges[$i]);
                if($i==0) {
                    //$STORE.= $val[1]." hrs to the time of departure ";
                    $temp['string'] = "After ".(date("M d, Y H:i A", strtotime($departure_time) - $val[1] * 3600)) ." & Before ".date("M d, Y H:i A", strtotime($departure_time));
                    $temp['percentage'] = $val[2]."%";
                    $temp['charge'] = ""; 
                    foreach($fareArr as $f) {
                        $temp['charge'] .= number_format( $f * ($val[2]/100),2) ." / ";   
                    }
                    $temp['charge'] = substr($temp['charge'],0,strlen($temp['charge'])-3);
                    $res[]=$temp; 
                } 
                
                if($i==1) {
                    //$STORE " Till ".$val[1]." hrs before the departure time "; 
                    $temp['string'] = "After ".(date("M d, Y H:i A", strtotime($departure_time) - $val[1] * 3600))." & Before ".date("M d, Y H:i A",strtotime($departure_time) - $val[0] * 3600); 
                    $temp['percentage'] = $val[2]."%";
                    $temp['charge'] = ""; 
                    foreach($fareArr as $f) {
                          $temp['charge'] .= number_format( $f * ($val[2]/100),2) ." / ";  
                    }
                    $temp['charge'] = substr($temp['charge'],0,strlen($temp['charge'])-3);
                    $res[]=$temp;
                }
                
                if($i==2) {
                    //$STORE.=  "  Between ".$val[1]." hrs and ".$val[0]." hrs before the departure time";; 
                    $temp['string'] =  "After ".(date("M d, Y H:i A", strtotime($departure_time) - $val[1] * 3600))." & Before ".(date("M d, Y H:i A", strtotime($departure_time) - $val[0] * 3600)); 
                    $temp['percentage'] = $val[2]."%";
                    $temp['charge'] = ""; 
                    foreach($fareArr as $f) {
                         $temp['charge'] .= number_format( $f * ($val[2]/100),2) ." / ";  
                    }
                    $temp['charge'] = substr($temp['charge'],0,strlen($temp['charge'])-3);
                    $res[]=$temp;
                }
                
                if($i==3) {
                    //$STORE.=  "  before  ".$val[0]." hrs the departure time";; 
                    $temp['string'] =  "Before ".(date("M d, Y H:i A", strtotime($departure_time) - $val[0] * 3600));
                    $temp['percentage'] = $val[2]."%";
                    $temp['charge'] = ""; 
                    foreach($fareArr as $f) {
                         $temp['charge'] .= number_format( $f * ($val[2]/100),2) ." / ";   
                    }
                    $temp['charge'] = substr($temp['charge'],0,strlen($temp['charge'])-3);
                    $res[]=$temp; 
                }
            }
        }
          return  array_reverse($res);
    }
?>
<script src="http://malsup.github.io/jquery.blockUI.js"></script>
<script>
    imgseaterArr=new Array(); 
    imgladiesseaterArr=new Array();
    imgvsleeperArr=new Array();
    imgladiesvsleeperArr=new Array();
    imghsleeperArr=new Array();
    imgladieshsleeperArr=new Array();
    
    for(var i=0;i<100;i++) {
        imgseaterArr[i]=new Array('images/ac_semi_sleeper_vacant.jpg','images/ac_sleeper_selected.jpg'); 
        imgladiesseaterArr[i]=new Array('images/non_ac_seater_ladies.jpg','images/ac_sleeper_selected.jpg'); 
        imgvsleeperArr[i]=new Array('images/volvo_sleeper_vertical_vacant.jpg','images/volvo_sleeper_vertical_selected.jpg');
        imgladiesvsleeperArr[i]=new Array('images/non_ac_vertical_sleeper_ladies.jpg','images/volvo_sleeper_vertical_selected.jpg');
        imghsleeperArr[i]=new Array('images/volvo_sleeper_vacant.jpg','images/volvo_sleeper_selected.jpg');
        imgladieshsleeperArr[i]=new Array('images/non_sleeper_ac_ladies.jpg','images/volvo_sleeper_selected.jpg');
    }

    var allVals=[];
    var maxSeats = 6;
    
    function swapImage(id,primary,secondary) {
        src=document.getElementById(id).src;
        if (src.match(primary)) {
            document.getElementById(id).src=secondary;
        } else {
            document.getElementById(id).src=primary;
        }
    }
    
    function swapladieshsleeper(chk,ind,divid){
        img=document.images['hsleep'+ind]; 
        if(chk.checked){
            if (allVals.length<=maxSeats-1) {
                img.src=imgladieshsleeperArr[ind][1]; 
                img.alt=imgladieshsleeperArr[ind][1]; 
            } else {
                alert("maximum "+maxSeats+" seats per booking");
                document.getElementById(chk.id).checked=false;
            }
        } else { 
            img.src=imgladieshsleeperArr[ind][0]; 
            img.alt=imgladieshsleeperArr[ind][0]; 
        } 
        updateTextArea(divid);
    }
    
    function swapseater(chk,ind,divid){ 
        img=document.images['img'+ind]; 
        if(chk.checked){ 
            if (allVals.length<=(maxSeats-1)) {
                img.src=imgseaterArr[ind][1]; 
                img.alt=imgseaterArr[ind][1]; 
            } else {
                document.getElementById(chk.id).checked=false;
                alert("maximum "+maxSeats+" seats per booking");
            }
        } else { 
            img.src=imgseaterArr[ind][0]; 
            img.alt=imgseaterArr[ind][0]; 
        } 
        updateTextArea(divid);
    }

    function swapladiesseater(chk,ind,divid){
        img=document.images['img'+ind]; 
        if(chk.checked){
            if (allVals.length<=maxSeats-1) { 
                img.src=imgladiesseaterArr[ind][1]; 
                img.alt=imgladiesseaterArr[ind][1];
            } else {
                alert("maximum "+maxSeats+" seats per booking");
                document.getElementById(chk.id).checked=false;
            } 
        } else { 
            img.src=imgladiesseaterArr[ind][0]; 
            img.alt=imgladiesseaterArr[ind][0]; 
        } 
        updateTextArea(divid);
    }

    function swapvsleeper(chk,ind,divid){ 
        img=document.images['vsleep'+ind]; 
        if(chk.checked){ 
            if (allVals.length<=maxSeats-1) {
                img.src=imgvsleeperArr[ind][1]; 
                img.alt=imgvsleeperArr[ind][1]; 
            } else {
                alert("maximum "+maxSeats+" seats per booking");
                document.getElementById(chk.id).checked=false;
            }
        } else { 
            img.src=imgvsleeperArr[ind][0]; 
            img.alt=imgvsleeperArr[ind][0]; 
        } 
        updateTextArea('')
        updateTextArea(divid);
    }

    function swapladiesvsleeper(chk,ind,divid){ 
        img=document.images['vsleep'+ind]; 
        if(chk.checked){
             if (allVals.length<=maxSeats-1) { 
                img.src=imgladiesvsleeperArr[ind][1]; 
                img.alt=imgladiesvsleeperArr[ind][1]; 
            } else {
                alert("maximum "+maxSeats+" seats per booking");
                document.getElementById(chk.id).checked=false;
            }
        } else { 
            img.src=imgladiesvsleeperArr[ind][0]; 
            img.alt=imgladiesvsleeperArr[ind][0]; 
        } 
        updateTextArea(divid);
    }

    function swaphsleeper(chk,ind,divid){
        img=document.images['hsleep'+ind]; 
        if(chk.checked){
            if (allVals.length<=maxSeats-1) { 
                img.src=imghsleeperArr[ind][1]; 
                img.alt=imghsleeperArr[ind][1];
            } else {
                alert("maximum "+maxSeats+" seats per booking");
                document.getElementById(chk.id).checked=false;
            } 
        } else { 
            img.src=imghsleeperArr[ind][0]; 
            img.alt=imghsleeperArr[ind][0]; 
        } 
        updateTextArea(divid);
    }

    function updateTextArea(divid) {
        
        var ticketAmt = 0;
        if (allVals.length>6){
             alert("You have reached maximum allowed");
        }
        allVals = [];
        var tbl="";
        tbl += '<div style="padding:5px;"><input type="hidden" value="'+divid+'" id="tripid" name="tripid"><table style="width:100%">';
        tbl += '<input type="hidden" name="From" value="'+document.getElementById('From').value+'">';
        tbl += '<input type="hidden" name="fromid" value="'+document.getElementById('fromid').value+'">';
        tbl += '<input type="hidden" name="To" value="'+document.getElementById('To').value+'">';
        tbl += '<input type="hidden" name="toid" value="'+document.getElementById('toid').value+'">';
        tbl += '<input type="hidden" name="doj" value="'+document.getElementById('doj').value+'">';
        tbl += '<tr style="background:#ccc;text-align:center;font-weight:bold;"><td>Seat#</td><td></td><td>Passenger Name</td><td>Age</td><td>Sex</td><td>Amount</td></tr>';
        var i=0;
        $('#c_b :checked').each(function() {
                allVals.push($(this).val());
                tbl += '<tr style="background:#fff;">' 
                        + '<td><select name="seat_'+i+'" id="seat_'+i+'"><option value="'+$(this).val()+'">'+$(this).val()+'</option></select></td>'
                        + '<td><select name="title_'+i+'" id="title_'+i+'"><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></td>'
                        + '<td><input name="fname_'+i+'" id="fname_'+i+'" type="text" style="border:1px solid #ccc"></td>'
                        + '<td>'
                            + '<select name="age_'+i+'"  id="age_'+i+'" >';
                            for(j=1;j<80;j++){
                                tbl += '<option value="'+j+'">'+j+'</option>';
                                }
                            tbl += '</select>'
                         + '</td>' 
                        + '<td><select name="sex_'+i+'"  id="sex_'+i+'"><option value="male">Male</option><option value="female">Female</option></select></td>'
                        + '<td style="border-bottom:1px solid #e5e5e5;padding:5px;text-align:right"><input name="fare_'+i+'" id="fare_'+i+'" type="hidden" style="border:1px solid #ccc" value="'+$(this).attr('tfare')+'">'+$(this).attr('tfare')+'</td>'
                    + '</tr>';
                ticketAmt += parseFloat($(this).attr('tfare'));
                i++;
        });
        tbl += '<tr><td style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;font-weight:bold;padding:5px;" colspan="5">Total Fare</td><td style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;font-weight:bold;padding:5px;text-align:right;width:100px;"><input name="t_fare" id="t_fare" type="hidden" style="border:1px solid #ccc" value="'+ticketAmt.toFixed(2)+'">'+ticketAmt.toFixed(2)+'</td></tr>'
             + '</table></div>'
             + '<table style="font-size:11px;">';
        if (allVals.length>1) {
            tbl += '<tr><td colspan="2">Primary Passenger Details</td></tr>'
                 + '<tr><td>Seat #</td><td><select name="">';
            $('#c_b :checked').each(function() {
                tbl += '<option value="'+$(this).val()+'">'+$(this).val()+'</option>';
            });
            tbl += '</td></tr>';
         }
         tbl += '<tr><td>Email ID</td><td><input type="text" name="email_id" id="email_id" style="border:1px solid #ccc"></td>'
              + '<td>Mobile No</td><td><input type="text" name="mobile" id="mobile" maxlength="10" style="border:1px solid #ccc"></td></tr>'
              + '<tr><td>Address</td><td colspan="3"><input type="text" name="address" id="address" style="width:100%" style="border:1px solid #ccc"></td></tr>'
              + '<tr><td>ID Type</td><td><select name="id_proof" id="id_proof"><option ="Pan Card">Pan Card</option><option ="Driving Licence">Driving Licence</option><option ="Voting Card">Voting Card</option><option ="Aadhar Card">Aadhar Card</option></select></td>'
              + '<td>ID Number</td><td><input type="text" name="id_no" id="id_no" style="border:1px solid #ccc"></td></tr>'
              + '<tr><td colspan="4"><span id="input_error" style="color:red;"></span></td></tr>'
              + '</table>';
         if (allVals.length>0) {
             $('#booking_submit_btn').removeAttr("disabled");
             $('#billform_bpdp_'+divid).html(tbl);
             $('#ttfare').val(ticketAmt);
             $('#no_Seats_'+divid).html("<b>&nbsp;No of Seat(s)</b>: " + allVals.length);
             $('#seatscount').val(allVals.length);
             $('#seats').val(allVals);
             
         } else {
            $('#billform_bpdp_'+divid).html("");
            $('#no_Seats_'+divid).html(""); 
            $('#booking_submit_btn').attr("disabled","disabled");
            return; 
         }
    }
    
    function ConfrimBook(tripid) {
        $('#confirmation_box').html("<div style='padding:100px;text-align:center;color:#ea135e;font-size:15px'><img src='assets/images/spinner-gif.gif'><br>loading ....</div>");
        var param = $('#bfrom_'+tripid).serialize();
        //alert(param);
        $.post( "webservice.php?action=BlockAndBookTicket", param,function(data) {
            $('#confirmation_box').html(data);
        });
    }
    function cancelConfrimBook() {
        $.unblockUI();
    }
    
    function ConfrimTicket() {
        
        $('#input_error').html("");
        $("#email_id").css({"border":"1px solid #ccc"});
        $("#mobile").css({"border":"1px solid #ccc"});
        $("#address").css({"border":"1px solid #ccc"});
        $("#id_no").css({"border":"1px solid #ccc"});
        
        for(i=0;i<6;i++) {
            if ($("#fname_"+i).length>0){ 
                if ($("#fname_"+i).val().trim().length==0) {
                    $('#input_error').html("Please enter valid name #"+(i+1));
                    $("#fname_"+i).css({"border":"1px solid red"});
                    return;
                } else {
                    $("#fname_"+i).css({"border":"1px solid #ccc"});
                }
            }
        }
        
        if ($('#email_id').val().trim().length==0) {
            $('#input_error').html("Please enter valid email id");
            $("#email_id").css({"border":"1px solid red"});
            return;
        } else {
             $("#email_id").css({"border":"1px solid #ccc"});
        }
        if (!ValidateEmail($('#email_id').val())) {
            $('#input_error').html("Please enter valid email id");
            $("#email_id").css({"border":"1px solid red"});
            return;
        } else {
            $("#email_id").css({"border":"1px solid #ccc"});
        }
        
        if ($('#mobile').val().trim().length!=10) {
            $('#input_error').html("Please enter valid mobile number");
            $("#mobile").css({"border":"1px solid red"});
            return;
        } else {
             $("#mobile").css({"border":"1px solid #ccc"});
        }
        
        if (!(parseInt($('#mobile').val())<=9999999999 && parseInt($('#mobile').val())>=6000000000)) {
               $('#input_error').html("Please enter valid mobile number");
            $("#mobile").css({"border":"1px solid red"});
            return;
        } else {
              $("#mobile").css({"border":"1px solid #ccc"});
        }
        
        if ($('#address').val().trim().length==0) {
            $('#input_error').html("Please enter valid address");
            $("#address").css({"border":"1px solid red"});
            return;
        } else {
             $("#address").css({"border":"1px solid #ccc"});
        }
        
        if ($('#id_no').val().trim().length==0) {
            $('#input_error').html("Please enter valid id card number");
            $("#id_no").css({"border":"1px solid red"});
            return;
        } else {
            $("#id_no").css({"border":"1px solid #ccc"});
        }
        /* Confirmation Dialog Box */
             var confirmationbox = "";
             confirmationbox='<div style="padding:15px;width:100%;"><table>'
                        + '<tr><td style="text-align:left;font-weight:bold;font-size:18px;" colspan="2">'+document.getElementById('From').value+'&nbsp;&nbsp;→&nbsp;&nbsp;'+document.getElementById('To').value+'</td></tr>'
                        + '<tr><td style="text-align:left" colspan="2">'+document.getElementById('doj_full').value+'</td></tr>'
                        + '<tr><td style="text-align:left">Boarding Point</td><td style="text-align:left">:&nbsp;'+$('#bpointid option:selected').text()+'</td></tr>'
                        + '<tr><td style="text-align:left">Droping Point</td><td style="text-align:left">:&nbsp;'+$('#dpointid option:selected').text()+'</td></tr>'
                        + '</table><table style="width:100%;background:#f9f9f9;border-bottom:1px solid #ccc;margin-bottom:10px"><tr style="font-weight:bold;background:#ccc"><td style="text-align:left">&nbsp;Seat#</td><td style="text-align:left">Passenger Name</td><td>Age</td><td style="text-align:left;width:100px">Sex</td><td style="text-align:right;width:100px">Fare</td></tr>';
                        
                        for(i=0;i<6;i++) {
            if ($("#fname_"+i).length>0){ 
                          confirmationbox += '<tr>'
                                               + '<td style="text-align:left">&nbsp;'+document.getElementById('seat_'+i).value+'</td>'
                                               + '<td style="text-align:left">'+document.getElementById('title_'+i).value+". "+document.getElementById('fname_'+i).value+'</td>'
                                               + '<td style="text-align:center">'+document.getElementById('age_'+i).value+'</td>'
                                               + '<td style="text-align:left">'+document.getElementById('sex_'+i).value+'</td>'
                                               + '<td style="text-align:right">'+document.getElementById('fare_'+i).value+'&nbsp;</td>'
            }                                  + '</tr>'
        }
        
                       confirmationbox += '<tr style="font-weight:bold;"><td colspan="3">&nbsp;</td><td  style="text-align:right;border-top:1px solid #ccc;">Total Fare</td><td style="text-align:right;border-top:1px solid #ccc;">'+document.getElementById('t_fare').value+'&nbsp;</td></tr></table><table style="width:100%"><tr><td style="text-align:left;font-weight:bold;">Email ID</td><td style="text-align:left">:&nbsp;'+document.getElementById("email_id").value+'</td>'
                        
                        + '<td style="text-align:left;font-weight:bold;">Mobile No</td><td style="text-align:left">:&nbsp;'+document.getElementById("mobile").value+'</td></tr>'
                        + '<tr><td style="text-align:left;font-weight:bold;">Address</td><td colspan="3" style="text-align:left">:&nbsp;'+document.getElementById("address").value+'</td></tr>'
                        + '<tr><td style="text-align:left;font-weight:bold;">ID Type</td><td style="text-align:left">:&nbsp;'+document.getElementById("id_proof").value+'</td>'
                        + '<td style="text-align:left;font-weight:bold;">ID Number</td><td style="text-align:left">:&nbsp;'+document.getElementById("id_no").value+'</td></tr></table>'
                        
                        + '<div style="text-align:right;margin-top:10px;padding-top:10px;border-top:1px solid #ccc;"><a href="javascript:cancelConfrimBook()">Cancel</a>&nbsp;&nbsp;'
                        + '<input type="button" onclick="ConfrimBook(\''+document.getElementById("tripid").value+'\')" name="Confirm" value="Confirm to book" class="btn btn-success">'
                        + '</div></div>';
             $('#confirmation_box').html(confirmationbox);    
        $.blockUI({ 
            message: $('#confirmation_box'), 
            css: { top: '10%',width:'60%',left:'20%' } 
        }); 
    }
    function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
</script>
<div id='confirmation_box' style='display:none'></div>
    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Available Buses</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Available Buses</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>      
        <input type="hidden" id="From" name="_From" value="<?php echo $_GET['From'];?>">
        <input type="hidden" id="fromid" name="_fromid" value="<?php echo $_GET['fromid'];?>">
        <input type="hidden" id="To" name="_To" value="<?php echo $_GET['To'];?>">
        <input type="hidden" id="toid" name="_toid" value="<?php echo $_GET['toid'];?>">
        <input type="hidden" id="doj" name="_doj" value="<?php echo $_GET['doj'];?>">
        <input type="hidden" id="doj_full" name="_doj_full" value="<?php echo date("l, F d, Y",strtotime($_GET['doj']));?>">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                             <?php $datas = $webservice->getData("_getAvailableTrips&fromid=".$_GET['fromid']."&toid=".$_GET['toid']."&doj=".$_GET['doj']); ?>
                             <?php  //print_r($datas);?>
                             <div class="row">
                                    <div class="col-md-1 col-xs-1 b-r"> <strong>From</strong></div>
                                    <div class="col-md-3 col-xs-6 b-r"><?php echo $_GET['From'];?></div>
                                    <div class="col-md-1 col-xs-1 b-r"> <strong>To</strong></div>
                                     <div class="col-md-3 col-xs-6 b-r"><?php echo $_GET['To'];?></div>
                                     <div class="col-md-1 col-xs-1 b-r"> <strong>Date</strong></div>
                                     <div class="col-md-3 col-xs-6 b-r"><?php echo $_GET['doj'];?></div>
                              </div> 
                             <br><br>
                             <?php $datas = $webservice->getData("_getAvailableTrips&fromid=".$_GET['fromid']."&toid=".$_GET['toid']."&doj=".$_GET['doj']);
                              // print_r($datas);
                              ?>
                             <?php  
                                foreach($datas['availableTrips'] as $data) {
                                    if ( $data['availableSeats']>0) {
                                        if (isset($data['boardingTimes'][0])) {
                                            $bTime = $data['boardingTimes'][0]['time'];
                                        } else {
                                            $bTime = $data['boardingTimes']['time'];
                                        } 
                                        
                                        if (isset($data['droppingTimes'][0])) {
                                            $dTime =  $data['droppingTimes'][0]['time'];
                                        } else {
                                            $dTime  =  $data['droppingTimes']['time'];
                                        }
                                        $duration = BusTicket::GetDuration($_GET['doj'],$bTime,$dTime); 
                                        $can_policy=canPolicy($data['cancellationPolicy'],farearray($data['fares']),$_GET['doj']." ".BusTicket::getTime($bTime));
                               ?>
                                <div style="border: 1px solid #ddd;margin-top: 20px;padding: 10px;padding-bottom:0px;" >
                                    <div class="col-sm-12">                                                                                                   
                                        <div class="form-group row" style="margin-bottom: 0px;">
                                            <div class="col-sm-3"><h5><?php echo $data['travels'];?> <?php if(sizeof($data['busServiceId'])>0){// echo "(".$data['busServiceId'].")";
                                            }?></h5><br></div>
                                            <div class="col-sm-2">
                                                <p style="font-size: 19px;font-weight: 700;color: #3e3e52;"><?php echo BusTicket::getTime($bTime); ?></p>
                                            </div>       
                                            <div class="col-sm-1">
                                                <p style="line-height: 24px;color: #7e7e8c;"><?php echo $duration;?></p>
                                            </div>       
                                            <div class="col-sm-2">
                                                  <p style="font-size: 19px;font-weight: 700;color: #3e3e52;"><?php echo BusTicket::getTime($dTime); ?></p>
                                            </div> 
                                            <div class="col-sm-2">
                                                    <?php if (is_array($data['fares'])) { ?>
                                                        <p style="font-size:14px;font-weight:400;color:#7e7e8c;margin-bottom:0px">Starts from</p>
                                                        <p style="font-size:19px;font-weight:700;color:#3e3e52;margin-bottom:0px"><span style="color:#7e7e8c;font-size: 14px;font-weight:100;">INR</span>&nbsp;<?php echo $data['fares'][(sizeof($data['fares'])-1)];?></p>
                                                    <?php } else {?>
                                                       <p style="font-size:19px;font-weight:700;color:#3e3e52;"><span style="color:#7e7e8c;font-size: 14px;font-weight:100;">INR</span>&nbsp;<?php echo $data['fares'];?></p>
                                                    <?php } ?>
                                            </div>           
                                            <div class="col-sm-2">
                                                <p style="font-size:14px;font-weight:400;color:#7e7e8c;"><?php echo $data['availableSeats']; ?> Seats available </p>
                                                <p style="font-size:14px;font-weight:400;color:#7e7e8c;"><?php echo ($data['avlWindowSeats']<0) ? 0 : $data['avlWindowSeats'] ;?>  Window</p>
                                            </div>           
                                        </div>
                                    </div>                                                           
                                    <div class="col-sm-12">
                                        <div class="form-group row" style="margin-bottom: 0px;">
                                            <div class="col-sm-3"><p style="color: #7e7e8c;"><?php echo $data['busType'];?><!--&nbsp;(<?php echo $data['id'];?>)--></p></div>
                                            <div class="col-sm-2">
                                                <div style="width:94px;overflow:hidden">
                                                    <p style="color: #7e7e8c;">
                                                          <?php 
                                                        if (isset($data['boardingTimes'][0])) {
                                                            echo $data['boardingTimes'][0]['location'];
                                                        } else {
                                                           echo $data['boardingTimes']['location'];
                                                        }    
                                                    ?>
                                                    </p>
                                                </div> 
                                            </div>  
                                            <div class="col-sm-1">
                                            </div>    
                                            <div class="col-sm-2">
                                                <p style="color: #7e7e8c;">
                                                          <?php 
                                                        if (isset($data['droppingTimes'][0])) {
                                                            echo $data['droppingTimes'][0]['location'];
                                                        } else {
                                                            echo $data['droppingTimes']['location'];
                                                        }    
                                                    ?>
                                                    </p>
                                            </div>       
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="text-align: right;height: 35px;">
                                          <div class="scrollmenu">
                                              <a  onclick="toggle_bpdp('<?php echo $data['id'];?>');"  class="btn btn-default" style="cursor:pointer;background-color:white;margin-bottom: -10px;">Boarding & Dropping Points</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                              <a onclick="toggle_bpolicy('<?php echo $data['id'];?>');" class="btn btn-default"  data-toggle="collapse" data-target="#Bookingpolicies"style="cursor:pointer;background-color:white;margin-bottom: -10px;">Cancellation Policy</a>&nbsp;&nbsp;
                                              <a onclick="ViewSeats('<?php echo $data['id'];?>')"  class="btn btn-danger" style="cursor:pointer;color: white;margin-bottom: -10px;margin-right: -20px;">View Seats</a>
                                            </div>    
                                    </div>
                                    <div style="display:none" id="from_dpbp_<?php echo $data['id'];?>">
                                        <input type="hidden" name="BusServiceId" value="<?php echo $data['busServiceId'];?>" >
                                        <input type="hidden" name="bus_operator_name" value="<?php echo $data['travels'];?>" >
                                        <input type="hidden" name="bus_type" value="<?php echo $data['busType'];?>"> 
                                        <textarea name="TripInfo" style="display:none"><?php echo json_encode($data); ?></textarea>
                                        <textarea name="CancellationPolicy" style="display:none"><?php echo json_encode($can_policy); ?></textarea>
                                        <table  style="width:100%">
                                            <tr>
                                                <td style="padding:5px;">Boarding Point</td>
                                            </tr>
                                            <tr>
                                                <td  style="padding:5px;">
                                                <select name="bpointid" id="bpointid" style="width:100%"> 
                                                    <?php if (isset($data['boardingTimes'][0])) { ?>
                                                        <?php foreach($data['boardingTimes'] as $location) { ?>
                                                            <option value="<?php echo $location['bpId'];?>"><?php echo BusTicket::getTime($location['time']) ." - ". $location['location']; ?></option>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $data['boardingTimes']['bpId'];?>"><?php echo  BusTicket::getTime($data['boardingTimes']['time']) ." - ". $data['boardingTimes']['location']; ?></option>
                                                    <?php  }   ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  style="padding:5px;">Dropping Point</td>
                                            </tr>
                                            <tr>
                                                <td  style="padding:5px;">
                                                <select name="dpointid" id="dpointid"  style="width:100%"> 
                                                  <?php if (isset($data['droppingTimes'][0])) {?>
                                                  <?php foreach($data['droppingTimes'] as $dropinglocation) { ?>
                                                    <option value="<?php echo $location['bpId'];?>"><?php echo  BusTicket::getTime($dropinglocation['time'])." - ". $dropinglocation['location']; ?></option>
                                                  <?php } ?>
                                                  <?php } else { ?>
                                                    <option value="<?php echo $data['droppingTimes']['bpId'];?>"><?php echo  BusTicket::getTime($data['droppingTimes']['time']) ." - ". $data['droppingTimes']['location']; ?></option>
                                                  <?php  }   ?>
                                                  </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="dpbp_<?php echo $data['id'];?>" style="background-color: #f0f0f0;width: 100%;padding: 20px 30px;margin:-10px;margin-top:0px;"  class="collapse">
                                        <div class="col-sm-12" style="padding: 0 20px;">
                                            <div class="form-group row">
                                               <div class="col-sm-5">
                                                    <div style="text-align: center;"><h5>BOARDING POINT</h5></div>
                                                    <div class="col-sm-12" style="text-align: left;">
                                                    <?php if (isset($data['boardingTimes'][0])) { ?>
                                                            <?php foreach($data['boardingTimes'] as $location) { ?>
                                                            <table>
                                                                <tr>
                                                                    <td style="width: 55px;vertical-align: top;font-weight: 700;">
                                                                        <?php
                                                                            echo BusTicket::getTime($location['time']); 
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $location['location']; ?><br>
                                                                        <?php echo $location['landmark']; ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                    <?php } ?>
                                                    <?php    } else {       ?>
                                                            <table>
                                                                <tr>
                                                                    <td style="width: 55px;vertical-align: top;font-weight: 700;">
                                                                        <?php 
                                                                            echo  BusTicket::getTime($data['boardingTimes']['time']); 
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $data['boardingTimes']['location']; ?><br>
                                                                        <span style="font-size: 13px;color: #737373;"><?php echo $data['boardingTimes']['landmark']; ?></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <?php  }   ?>
                                               </div>
                                              </div>  
                                               <div class="col-sm-7">
                                                    <div style="text-align: center;"><h5>DROPPING POINT</h5></div>
                                                    <div class="col-sm-12" style="text-align: left;">
                                                    <?php
                                                          if (isset($data['droppingTimes'][0])) {
                                                           ?>
                                                            <?php foreach($data['droppingTimes'] as $dropinglocation) { ?>
                                                            <table>
                                                                <tr>
                                                                    <td style="width: 55px;vertical-align: top;font-weight: 700;"><?php echo  BusTicket::getTime($dropinglocation['time']); ?></td>
                                                                    <td>
                                                                        <?php echo $dropinglocation['location']; ?><br>
                                                                        <span style="font-size: 13px;color: #737373;"><?php echo $dropinglocation['landmark']; ?></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                    <?php } ?>
                                                    <?php    } else {       ?>
                                                            <table>
                                                                <tr>
                                                                    <td style="width: 55px;vertical-align: top;font-weight: 700;"><?php echo  BusTicket::getTime($data['droppingTimes']['time']); ?></td>
                                                                    <td>
                                                                        <?php echo $data['droppingTimes']['location']; ?><br>
                                                                        <span style="font-size: 13px;color: #737373;"><?php echo $data['droppingTimes']['landmark']; ?></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <?php  }   ?>
                                               </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="dpolicy_<?php echo $data['id'];?>" style="background-color: #f0f0f0;width: 100%;padding: 20px 30px;margin:-10px;margin-top:0px;"  class="collapse">
                                        <div class="col-sm-12" style="padding: 0 20px;">
                                            <div class="form-group row">
                                                <table style="width:80%" align="center">
                                                    <tr style="font-weight:bold;">
                                                        <td style="padding:5px;padding-bottom:10px">Time of Cancellation</td>
                                                        <td style="width:20%;padding:5px;padding-bottom:10px">Deduction Percentage</td>
                                                        <td style="width:30%;padding:5px;padding-bottom:10px">Cancellation Charges</td>
                                                    </tr>
                                                
                                             <?php  
                                             
                                             foreach($can_policy as $cp) {
                                                 ?>
                                                    <tr>
                                                        <td style="padding:5px"><?php echo $cp['string'];?></td>
                                                        <td style="padding:5px"><?php echo $cp['percentage'];?></td>
                                                        <td style="padding:5px">Rs. <?php echo $cp['charge'];?></td>
                                                    </tr>
                                                 <?php
                                             }
                                               if ($data['partialCancellationAllowed']) {
                                             ?>
                                             <tr>
                                                <td colspan="3" style="padding:5px;padding-top:10px;font-weight:bold">Partial cancellation allowed. Please note that primary passenger booking cannot be cancelled</td>
                                             </tr>
                                             <?php } ?>
                                             </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="result_<?php echo $data['id'];?>" style="background-color: #f0f0f0;padding: 20px 30px;margin:-10px;margin-top:0px;"  class="collapse">
                                        <div class="col-sm-12" style="padding: 0 20px;">
                                            <div class="form-group row"></div>
                                        </div>
                                    </div>
                                </div>
                             <?php }?>
                             <?php }?>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>  
                function toggle_bpdp(id) {
                    $('#result_'+id).html();
                    $('#result_'+id).show();
                    $('#result_'+id).html("<div style='float:right;cursor:pointer;font-size:16px' onclick=\"hidediv('"+id+"')\"><i class='mdi mdi-close-circle-outline'></i></div><div style='clear:both'>"+$('#dpbp_'+id).html()+"</div>");
                }
                
                function toggle_bpolicy(id) {
                    $('#result_'+id).html();
                    $('#result_'+id).show();  
                    $('#result_'+id).html("<div style='float:right;cursor:pointer;font-size:16px' onclick=\"hidediv('"+id+"')\"><i class='mdi mdi-close-circle-outline'></i></div><div style='clear:both'>"+$('#dpolicy_'+id).html()+"</div>");
                }
                var viewedTrip="";
                function ViewSeats(tripid) {
                    allVals=[];
                    if (viewedTrip.length>0) {
                        $('#result_'+viewedTrip).html("");
                        $('#result_'+viewedTrip).hide("");
                    }
                    viewedTrip=tripid;
                    $('#result_'+tripid).html("");   
                    $('#result_'+tripid).html("<div style='text-align:center'>Loading....</div>'");
                    $('#result_'+tripid).show();
                    $.ajax({url:"webservice.php?action=ViewSeats&tripid="+tripid, 
                        success: function(result){
                            allVals=[];
                            $('#result_'+tripid).html("<div style='float:right;cursor:pointer;font-size:16px' onclick=\"hidediv('"+tripid+"')\"><i class='mdi mdi-close-circle-outline'></i></div><div style='clear:both'><div>"+result+"</div></div>"); 
                            $('#display_bpdp_'+tripid).html($('#from_dpbp_'+tripid).html())
                            updateTextArea('');
                            $('#confirmation_box').html();
                    }});
                }
                
                function hidediv(id) {
                     $('#result_'+id).html("");   
                     $('#result_'+id).hide();   
                }
            </script>            
         <?php include_once("footer.php"); //687?>