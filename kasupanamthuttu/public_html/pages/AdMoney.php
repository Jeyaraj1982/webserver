<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
                <div id="formwindow" class="formwindow">
                    <h3 style="text-align: left;font-family: arial;">Ad Money</h3><br>
                    <?php
                    
                    function validEmail($email){
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }
    
     //document.newForm.action = "http://google.com";   

    return true;
}

                        if ($_SESSION['USER']['userid']>0) {
                            $error = 0;
                            $errorTxt = "";
                            //if ($_SESSION['USER']['mobileno']>=6000000000 && $_SESSION['USER']['mobileno']<=9999999999) {
                                
                            //} else {
                            //    $error++;
                            //    $errorTxt .= "<br>Invalid Mobile Number";
                            //}
                             
                             if (validEmail($_SESSION['USER']['emailid'])) {
                                
                            } else {
                                $error++;
                                $errorTxt .= "<br>Invalid Email ID";
                            }
                            
                            
                            
                             if ($error==0) {
                    ?>
                    <form action="https://www.kasupanamthuttu.com/walletupdate.php" method="post" onsubmit="return dovalidate()">
                    <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;width: 100%;">
                        <tr>
                            <td>Amount<span class="man">*</span></td>
                            <td><input type="text" name="Amount" id="Amount" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;">
                            Minimum Rs. 100 To Maximum Rs. 1000
                            <div id="erroR" style="color:red"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Payment Using</td>
                            <td><select name="paymentroute" class="form-control">
                                    <option value="1">Payu (Domestic Indian Gateway)</option>
                                    <option value="2">Paypal (International Gateway)</option>
                            
                            </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" class="btn btn-success" name="PayuBtn" value="Continue">&nbsp;   
                            </td>
                        </tr>
                    </table>           
                    </form>
                </div>
                <?php } else {
                      echo "<div style='color:red'>";
                        echo $errorTxt;
                      echo "</div>";
                    
                }
                
                
                        }  else {?>
                          Please login and continue to update 
                <?php } ?>
        </article>
    </div>
</div> 
<script>
    function dovalidate() {
        $('#erroR').html("");
        if (parseInt($('#Amount').val())>=100 && parseInt($('#Amount').val())<=1000) {
            return true;
        } else {
                $('#erroR').html("Invalid amount, amount must have 100 To 1000");    
                return false;
        }
    }
</script>