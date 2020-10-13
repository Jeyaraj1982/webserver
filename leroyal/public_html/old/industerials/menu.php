    <ul id="nav">
         <li style=" margin-left:20px;"><a href="index.php">Home</a></li>
        <li style=" margin-left:20px;"><a href="javascript:void(0)">Pumps & Irrigation Division</a>
            <ul>
                <li><a href="pumps.php">Dealerships</a>
            </ul>
        </li>
        <li style=" margin-left:20px;"><a href="javascript:void(0)">Chemical Division</a>
            <ul>
                <li><a href="biochemicalproducts.php">Bio Chemicals & Products </a>
            </ul>
        </li>
        <li style=" margin-left:20px;"><a href="javascript:void(0)">Construction Division</a>
            <ul>
                <li><a href="pwdcontracts.php">Class 1 Contractors for PWD </a>
                <li><a href="corporationcontracts.php">Class 1 for  Corporation </a>  
            </ul>
        </li>
        <li style=" margin-left:20px;"><a href="electrical.php">Electrical Division</a></li>
        <li style=" margin-left:20px;"><a href="trading.php">Trading Division</a></li>
        <li style=" margin-left:20px;"><a href="javascript:void(0)">Exports & Imports</a>
            <ul>
                <li><a href="exp-biochemicals.php">Bio-chemicals</a></li>
                <li><a href="exp-homemedicines.php">Home Medicines</a>  </li> 
                <li><a href="exp-nuts.php">Nuts & Spices</a></li>
                <li><a href="exp-aquaproducts.php">Aqua Products</a></li>
                <li><a href="exp-grains.php">Grains</a></li>                                                                                                                                         
            </ul>
        </li>
        <li style=" margin-left:20px;"><a href="contactus.php">Contact us</a></li>
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
