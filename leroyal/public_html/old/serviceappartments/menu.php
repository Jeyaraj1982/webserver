    <ul id="nav" style="font-weight: bold;">
        <li style=" margin-left:20px;"><a href="index.php">Home</a></li>
        <li style=" margin-left:20px;"><a href="guesthouse.php">Guest Houses</a></li>
        <li style=" margin-left:20px;"><a href="serviceappartments.php">Service Appartments</a></li>
        <li style=" margin-left:20px;"><a href="hostel.php">Hostel(ladies)</a></li>
        <li style=" margin-left:20px;"><a href="booking.php">Booking</a></li>
        <li style=" margin-left:20px;"><a href="booking.php">Investors</a></li>
        <li style=" margin-left:20px;"><a href="tariff.php">Tariff Details</a></li>
        <li style=" margin-left:20px;"><a href="../contactus.php">Contact us</a></li>
    </ul>

<script type="text/javascript">
 function mainmenu(){
$(" #nav ul ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
        $(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
        },function(){
        $(this).find('ul:first').css({visibility: "hidden"});
        });
}
 $(document).ready(function(){                    
    mainmenu();
});      
</script>
