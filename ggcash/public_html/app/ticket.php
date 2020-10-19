<title>GG Cash</title>
<?php 
    include_once("../config.php");
    $details = $mysqldb->select("select * from `_bus_booking_requests` where `PNR`='".$_GET['pnr']."'");
?>

<div style="width:820px;margin:0px auto;border:1px solid #ccc;padding:10px;font-family:arial;">
<table>
    <tr>
        <td><img src="../images/logo.png"></td>
    </tr>
</table>
<table  style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666">
    <tr>
        <td >
            <table  style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666">
                <tr>
                    <td style="font-size:20px;"><?php echo $details[0]['SourceName'];?>&nbsp;&nbsp;→&nbsp;&nbsp;<?php echo $details[0]['ToName'];?></td>
                </tr>
                <tr>
                    <td><?php echo $details[0]['BusOperatorName']." (".$details[0]['BusServiceId'].")";?></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="font-weight:Bold;"><?php echo date("l, F d, Y",strtotime($details[0]['DateOfJourny']));?></td>
                </tr>
            </table>         
        </td>
        <td style="width:300px;vertical-align:top">
            <table  style="border:2px solid #aaa; width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666">
                <tr>
                    <td>PNR #</td>
                    <td>:&nbsp;<?php echo $details[0]['PNR'];?></td>
                </tr>
                <tr>
                    <td>Ticket #</td>
                    <td>:&nbsp;<?php echo $details[0]['TicketID'];?></td>
                </tr>
                <tr>
                    <td>Seat(s)</td>
                    <td>:&nbsp;<?php echo $details[0]['NumberOfSeats'];?></td>
                </tr>
            </table>
            <br> 
        </td>
    </tr>
</table>
<table style="background:#f9f9f9;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666" cellpadding="10" cellspacing="0">
    <tr>
        <td><b style="color:#222"><u>Passenger Name</u></b</td>
        <td><b style="color:#222"><u>Seat Name</u></b</td>
        <td><b style="color:#222"><u>Contact Number</u></b</td>
    </tr>
</table>
<table  style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666" cellpadding="10" cellspacing="0">
    <tr>
        <td style="vertical-align:top;width:200px"><b style="color:#222"><u>Bus Type</u></b></td>
        <td style="vertical-align:top;width:110px"><b style="color:#222"><u>Reporting Time</u></b></td>
        <td style="vertical-align:top;width:110px"><b style="color:#222"><u>Boarding Time</u></b></td>
        <td rowspan="4" style="vertical-align:top"><b style="color:#222"><u>Boarding Point</u></b><Br>
        
        <?php echo $details[0]['BPName'];?><br>
        <?php echo $details[0]['BPLocation'];?><br>
        <?php echo $details[0]['BPLandmark'];?><br>
        <?php echo $details[0]['BPAddress'];?><br>
        <?php echo $details[0]['BPContactNo'];?><br>
        
        </td>
    </tr>
    <tr>
        <td><?php echo $details[0]['BusType'];?></td>
        <td><?php echo $details[0]['BTReportingTime'];?></td>
        <td><?php echo $details[0]['BPTime'];?></td>
    </tr>
       <tr>
         <td style="vertical-align:top;width:200px"><b style="color:#222"><u>Total Fare</u></b></td>
        <td style="vertical-align:top;width:110px"><b style="color:#222"><u>Service Charge</u></b></td>
        <td style="vertical-align:top;width:110px"><b style="color:#222"> </b></td>
       </tr>
     
       <tr>
        <td>Rs. <?php echo number_format($details[0]['BookingValue'],2);?></td>
        <td>Rs. <?php echo number_format($details[0]['ServiceCharge'],2);?></td>
        <td>&nbsp; </td>
    </tr>
</table> 
<hr style="border:none;border-bottom:1px solid #ccc">
<table style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666" cellpadding="10" cellspacing="0">
    <tr>
        <td colspan="2" style="text-align:justify">
        <b style="color:#222"><u>Terms and condition</u></b><br><br>
        GG Cash only a bus ticket agent. It does not operate bus services of its own. In order to provide a comprehensive choice of bus operators depature times and prices to customers, it has tied up with many bus operators. GG Cash advice to customers to to choose bus operators they are aware of and whose service they are comfortable with.
        </td>
    </tr>
    <tr>
        <td style="width:45%;vertical-align:top">
        <b style="color:#222"><u>GG Responsible for</u></b>
        <ul>
            <li>Issuing a valid ticket (a ticket that will be accpeted by the bus operator) for it's network bus operator.</li>
            <li>Providing refund and support the event of cancellation</li>
            <li>Providing customer support and information in case of any delays / inconvience</li>
        </ul>
         
        <b style="color:#222"><u>GG not responsible for</u></b>
        <ul>
            <li>The bus operator bus not departing/reaching on time</li>
            <li>The bus operators employees being rude</li>
            <li>The bus operators bus seats etc not being upto the customer;s expectations</li>
            <li>The bus operator canceling the trip due to unavoidable reasons</li>
        </td>
        <td style="width:55%;vertical-align:top;padding-left:20px;">
        <b><u>Cancellation Policy</u></b>
         <table style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666" cellpadding="10" cellspacing="0">
        <?php
           $can_policy=json_decode($details[0]["CancellationPolicy"],true);
            
                                             foreach($can_policy as $cp) {
                                                 ?>
                                                    <tr>
                                                        <td style="padding:5px"><?php echo $cp['string'];?></td>
                                                        <td style="padding:5px"><?php echo $cp['percentage'];?></td>
                                                    </tr>
                                                 <?php
                                             }
        ?>
        </table>
        </td>
    </tr>
</table>
</div>