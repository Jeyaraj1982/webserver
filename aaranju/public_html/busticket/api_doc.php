<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bus Ticket Booking</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Bus Ticket Booking API</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
                                          
    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
           
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Bus Ticket Booking API</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php if ($_SESSION['user']['busticket']==0)  {?>
              To enable this service please contact administrator
              <?php } else { ?>
               http://www.aaranju.in/busticket/api.php?username=&lt;apiusername>&password=&lt;apipassword&gt;&action=&lt;action&gt; 
               <table class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                    <th>actions</th>
                    <th>description</th>
                    <th>Additional Param</th>
                    <th>Response</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>AllSources</td>
                    <td>Get all sources from Start Place.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Destinations</td>
                    <td>Get all destinations of given Start Place.</td>
                    <td>SourceID</td>
                    <td></td>
                </tr>
                <tr>
                    <td>AvailableTrips</td>
                    <td>Get all Trips of given Start & Destination with particular date</td>
                    <td>SourceID, DestinationID, TravelData</td>
                    <td></td>
                </tr>
                <tr>
                    <td>TripDetails</td>
                    <td>Get Trip information for selected Trip</td>
                    <td>TripID</td>
                    <td></td>
                </tr>
                <tr>
                    <td>BoardingPoints</td>
                    <td>Get all Boarding Points and details</td>
                    <td>BoardingPointID, TripID</td>
                    <td></td>
                </tr>
                <tr>
                    <td>BlockTicket</td>
                    <td>To Block Ticket with pasenger information</td>
                    <td>BookingParam (sample format)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>ConfirmTicket</td>
                    <td>To Confirm Blocked Ticket</td>
                    <td>BlockedKey</td>
                    <td></td>
                </tr>
                <tr>
                    <td>TicketInfo</td>
                    <td>Get Booked Ticket Information</td>
                    <td>PNR</td>
                    <td></td>
                </tr>
                <tr>
                    <td>CancellationData</td>
                    <td>To get Pre Cancellation Information</td>
                    <td>PNR</td>
                    <td></td>
                </tr>
                <tr>
                    <td>CancelTicket</td>
                    <td>To cancel ticket or partial</td>
                    <td>CancelParam  (sample format)</td>
                    <td></td>
                </tr>
                </tbody>
               </table>
              <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
             
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once("../footer.php");?>