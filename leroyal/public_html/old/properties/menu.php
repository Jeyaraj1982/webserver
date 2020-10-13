                    <style>
                .details {color:#FF007F;text-decoration:none;font-size:12px;}
                .details:hover {color:#666}
                </style>
    <ul id="nav">
        <li style=" margin-left:20px;"><a href="fp-elevations.php">Finished Projects</a></li>
        <li style=" margin-left:20px;"><a href="ogp-elevations.php">On- Going Projects</a></li>
        <li style=" margin-left:20px;"><a href="pro-elevations.php">Proposed Projects</a></li>      

       <!-- <li style=" margin-left:20px;"><a href="javascript:void(0)">Projects</a>
            <ul>
                <li><a href="fp-elevations.php">Finished projects</a>
                    <ul>
                        <li><a href="fp-elevations.php">Elevations</a></li>
                        <li><a href="fp-keyplans.php">Key Plans</a></li>
                        <li><a href="fp-availableflats.php">Available flats: Floor plan</a></li>
                    </ul>
                </li>
                
                <li><a href="ogp-elevations.php">On- Going</a>
                    <ul>
                        <li><a href="ogp-elevations.php">Elevations</a></li>
                        <li><a href="ogp-floorplans.php">Floor plans</a></li>
                        <li><a href="ogp-keyplans.php">Key Pans & Locations</a></li>
                        <li><a href="ogp-specialfeatures.php">Special Features</a></li>
                        <li><a href="ogp-specifications.php">Specifications</a></li>
                        <li><a href="ogp-paymentdetails.php">Payment Details</a></li>
                        <li><a href="ogp-enquires.php">Enquires</a></li>
                        <li><a href="ogp-availableflats.php">Available Flats</a></li>
                    </ul>
                </li>
                
                <li><a href="javascript:void(0)">Proposed</a>
                    <ul>
                        <li><a href="pro-elevations.php">Elevations</a></li>
                        <li><a href="pro-floorplans.php">Floor plans</a></li>
                        <li><a href="pro-keyplans.php">Key Pans & Locations</a></li>
                        <li><a href="pro-enquires.php">Enquires</a></li>
                    </ul>
                </li>
            </ul>
        </li> -->
        <li style=" margin-left:20px;"><a href="availableflats.php">Available Flats</a></li>
        <li style=" margin-left:20px;"><a href="investors.php">Investors</a></li>
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
