<?php
    ini_set('max_execution_time',360);
    
    include_once "seatseller/library/OAuthStore.php";
    include_once "seatseller/library/OAuthRequester.php";
    include_once "seatseller/SSAPICaller.php";
  
    echo $_REQUEST['action']();
   
    function _getAllSources() {
        return getAllSources();
    }
    
    function _getdestinationList() {
        $storesource = $_GET['sourceList'];
        return getAllDestinations($storesource);
    }
    
    function _getAvailableTrips() {
        return getAvailableTrips($_REQUEST['fromid'],$_REQUEST['toid'],$_REQUEST['doj']); 
    }
    
    function _getTripDetails(){
         return getTripDetails($_REQUEST['tripid']); 
    }
               
      function _getBoardingPoint(){
         return getBoardingPoint($_REQUEST['boarding'],$_REQUEST['tripid']); 
    }
    function _blockTicket(){
         return blockTicket((base64_decode($_GET['blockparam']))); 
    }
    
    function _confirmTicket() {
        return confirmTicket($_REQUEST['tokenkey']);
    }
    
    function _getTicket() {
        return invokeGetRequest("ticket?tin=".$_REQUEST['pnr']);
    }

    function _getCancellationData() {
        return getCancellationData("D4NZ3K5N");
        //return invokeGetRequest("cancellationdata?tin=".$cancellationId);
       // echo " <hr>The ticket details are:".$cancellationId."<hr/>";
       //{"cancellable":"true","cancellationCharges":{"entry":{"key":"UF3","value":"25.00"}},"fares":{"entry":{"key":"UF3","value":"262.50"}},"freeCancellationTime":"0","partiallyCancellable":"true","serviceCharge":"0","tatkalTime":"0"}
    }
    
     function _cancelTicket()
    {
        //{"tin":"S436228AS3","seatsToCancel":["12A","12B"]}
        //{"tin":"A4VTVBAP","seatsToCancel":["UF3"]}
                  echo $_REQUEST['cData'];
                  
        //return cancelTicket(json_encode($_REQUEST['cData']);
       // return invokePostRequest("cancelticket",$cancelRequest);
    }
    
     /*
    function AllSources() {
        return getAllSources();
    }
    
    function Destinations() {
        return getAllDestinations($_GET['SourceID']);
    }
    
    function AvailableTrips() {
        return getAvailableTrips($_REQUEST['SourceID'],$_REQUEST['DestinationID'],$_REQUEST['TravelDate']); 
    }
    
    function TripDetails(){
         return getTripDetails($_REQUEST['TripID']); 
    }
    
     function BoardingPoints(){
         return getBoardingPoint($_REQUEST['BoardingPointID'],$_REQUEST['TripID']); 
    }
    
     function BlockTicket(){
         return blockTicket((base64_decode($_GET['BookingParam']))); 
    }
    
     function ConfirmTicket() {
        return confirmTicket($_REQUEST['BlockedKey']);
    }
    
    function TicketInfo() {
        return invokeGetRequest("ticket?tin=".$_REQUEST['PNR']);
    }
    
    function CancellationData() {
        return getCancellationData($_REQUEST['PNR']);
    }
    
    function CancelTicket()
    {
        
    }
    */
?>