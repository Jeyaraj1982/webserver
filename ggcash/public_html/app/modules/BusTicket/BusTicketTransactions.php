<?php include_once("header.php");?>
<script src="http://malsup.github.io/jquery.blockUI.js"></script>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">Bust Ticket Transactions</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bus Ticket Transactions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                 <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="tablesaw-bar tablesaw-mode-stack"><h4 class="card-title text-orange">Recent Bus Transactions</h4></div>
                            <div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>PNR/Ticket No</b></th>
                                                <th class="border-top-0"><b>DateTime of Journey</b></th>
                                                <th class="border-top-0"><b>From</b></th>
                                                <th class="border-top-0"><b>To</b></th>
                                                <th class="border-top-0"><b>Passenger Name</b></th>
                                                <th class="border-top-0"><b>Seats</b></th>
                                                <th class="border-top-0"><b>Fare</b></th>
                                                <th class="border-top-0"><b>Booked On</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Transactions = $mysqldb->select("Select * From _bus_booking_requests  where MemberID='".$_SESSION['User']['MemberID']."' order by BookingID DESC");?>
                                          <?php foreach ($Transactions as $Transaction){ ?>
                                            <tr>
                                                <td><?php echo $Transaction['PNR'];?></td>
                                                <td>
                                                    <?php echo $Transaction['DateOfJourny'];?>
                                                    <?php echo $Transaction['BPTime'];?>
                                                </td>
                                                <td><?php echo $Transaction['SourceName'];?></td>
                                                <td><?php echo $Transaction['ToName'];?></td>
                                                <td><?php echo $Transaction['PrimaryPassengerName'];?></td>
                                                <td><?php echo $Transaction['Seats'];?></td>
                                                <td><?php echo number_format($Transaction['BookingValue'],2);?></td>
                                                <td><?php echo $Transaction['Requested'];?></td>
                                                <td style="line-height:20px;">
                                                <?php echo $Transaction['BookingStatus'];?>
                                                </td>
                                                <td>
                                                 <?php if ($Transaction['BookingStatus']=="Booked") {?>
                                                <?php if (strtotime(date("Y-m-d H:i:s"))<strtotime($Transaction['DateOfJourny']." ".$Transaction['BPTime'])) { ?>
                                                <a target="blank" href="ticket.php?pnr=<?php echo $Transaction['PNR'];?>" ><button style="background:Green;border:1px solid #fff;color:white;width:120px;text-align:center">Print Ticket</button></a>
                                                <br><a href="javascript:void(0)" onclick="ResendBusTicket('<?php echo $Transaction['PNR'];?>')"><button style="background:#4994b2;border:1px solid #fff;color:white;width:120px;text-align:center" >Resend SMS</button></a>
                                                <br><a target="blank" href="dashboard.php?action=BusTicket/cancelticket&pnr=<?php echo $Transaction['PNR'];?>" ><button style="background:Red;border:1px solid #fff;color:white;width:120px;text-align:center" >Cancel Ticket</button></a>
                                                <?php } ?>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                         <?php }?>
                                         <?php if(sizeof($Transactions)==0){?>
                                                <tr>
                                                    <td colspan="10" style="text-align: center;">No Datas Found</td>
                                                </tr>
                                         <?php }?>  
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                 </div>
            </div>
            <div id="sms_confirmation_box" style="text-align:center;display:none">
                Sending Sms ....
            </div>
            <script>
            function ResendBusTicket(pnr) {
                $('#sms_confirmation_box').html("<div style='padding:100px;text-align:center;color:#ea135e;font-size:15px'><img src='assets/images/spinner-gif.gif'><br>loading ....</div>");
                  $.blockUI({ 
            message: $('#sms_confirmation_box'), 
            css: { top: '10%',width:'300px',height:'300px'} 
        }); 
                $.ajax({url:"webservice.php?action=ResendBusTicket&pnr="+pnr, 
                        success: function(result){
                            $('#sms_confirmation_box').html("<div style='padding:35px'><img src='assets/images/sms-message.png'><br><br>SMS has been sent.<bR><br><a href='javascript:closePopup()'>Close</a></div>");
                    }});
            }
            
            function closePopup() {
                 $.unblockUI();
            }
            </script>
            <script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <!-- start - This is for export functionality only -->
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
            <script>
                //=============================================//
                //    File export                              //
                //=============================================//
                $('#file_export').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
            </script>
        </div>

        <?php include_once("footer.php"); ?>