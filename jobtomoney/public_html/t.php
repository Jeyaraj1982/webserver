<body>
    <div id="payment-box">
        <img src="images/camera.jpg" />
        <h4 class="txt-title">A6900 MirrorLess Camera</h4>
        
        <form action="https://www.paypal.com/cgi-bin/webscr"
            method="post" target="_top">
<!--            <input type='hidden' name='business' value='Kasupanamthuttu1@gmail.com'> 
            <input type='hidden' name='business' value='support@j2jsoftwaresolutions.com'>-->
            <input type='hidden' name='business' value='jeyaraj_123@yahoo.com'>
             <input type='hidden' name='item_name' value='Camera'> 
             <input type='hidden'  name='item_number' value='CAM#N1'> 
             <input type='hidden' name='amount' value='25'> 
                <input type='hidden' name='no_shipping' value='1'> 
                <input type='hidden' name='currency_code' value='USD'> 
                <input type='hidden' name='notify_url'
                value='http://sitename/paypal-payment-gateway-integration-in-php/notify.php'>
            <input type='hidden' name='cancel_return'
                value='http://sitename/paypal-payment-gateway-integration-in-php/cancel.php'>
            <input type='hidden' name='return'
                value='http://sitename/paypal-payment-gateway-integration-in-php/return.php'>
            <input type="hidden" name="cmd" value="_xclick"> <input
                type="submit" name="pay_now" id="pay_now"
                Value="Pay Now">
        </form>
    </div>
</body>