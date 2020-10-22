<div style="width: 900px;margin:10px;padding:10px;">
    <h2 style="text-align: center;">New Proforma</h2>
</div>

<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'lib/mail/src/Exception.php';
    require 'lib/mail/src/PHPMailer.php';
    require 'lib/mail/src/SMTP.php';
    
    function valid_email($email) {
        if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email)) {
            return false;
        } else {
            $email=trim(strtolower($email));
            if(filter_var($email, FILTER_VALIDATE_EMAIL)!==false) {
                return true;
            } else {
                $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
                return (preg_match($pattern, $email) === 1) ? true : false;
            }
        }
    }
    
    if (isset($_POST['sumbitBtn'])) {
        $error = 0;
        if (!(isset($_POST['BuyerMobile']) && $_POST['BuyerMobile']>6000000000 && $_POST['BuyerMobile']<9999999999)) {
            $error++;
            $error_BuyerMobile="&nbsp;&nbsp;Invalid Mobile Number";
        }
        
        if (!(valid_email($_POST['BuyerEmail']))) {
            $error++;
            $error_BuyerEmail="&nbsp;&nbsp;Invalid Email Address";
        }
        
        if ($error==0) {
            $id= $mysql->insert("_tbl_GoldOrders",array("InvoiceNumber"  => $_POST['InvoiceNumber'],
                                                        "InvoiceDate"    => $_POST['InvoiceDate'],
                                                        "SellerAddress1" => $_POST['SellerAddress1'],
                                                        "SellerAddress2" => $_POST['SellerAddress2'],
                                                        "SellerAddress3" => $_POST['SellerAddress3'],
                                                        "SellerAddress4" => $_POST['SellerAddress4'],
                                                        "SellerEmail"    => $_POST['SellerEmail'],
                                                        "BuyerAddress1"  => $_POST['BuyerAddress1'],
                                                        "BuyerAddress2"  => $_POST['BuyerAddress2'],
                                                        "BuyerAddress3"  => $_POST['BuyerAddress3'],
                                                        "BuyerAddress4"  => $_POST['BuyerAddress4'],
                                                        "BuyerEmail"     => $_POST['BuyerEmail'],
                                                        "BuyerMobile"    => $_POST['BuyerMobile'],
                                                        "Row1"           => $_POST['Row1'],
                                                        "Row2"           => $_POST['Row2'],
                                                        "Row3"           => $_POST['Row3'],
                                                        "Row4"           => $_POST['Row4'],
                                                        "Row5"           => $_POST['Row5'],
                                                        "TotalAmount"    => $_POST['TotalAmount'],
                                                        "Row6"           => $_POST['Row6'],
                                                        "Row7"           => $_POST['Row7'],
                                                        "Row8"           => $_POST['Row8'],
                                                        "Row9"           => $_POST['Row9'],
                                                        "Row10"          => $_POST['Row10'],
                                                        "FirstAmount"    => $_POST['FirstAmount'],
                                                        "DueAmount"      => $_POST['DueAmount'],
                                                        "Row11"          => $_POST['Row11'],
                                                        "CreatedOn"      => date("Y-m-d H:i:s"),
                                                        "IsMailSent"     => "0",
                                                        "MailResponse"   => "0"));
            //Product, Price, Qty, Amount                                                        
            for($i=1;$i<=5;$i++) {
                
                if (strlen($_POST['Product'][$i])>0 || strlen($_POST['Price'][$i])>0 || strlen($_POST['Qty'][$i])>0 || strlen($_POST['Amount'][$i])>0) {
                    $mysql->insert("_tbl_GoldOrders_items",array(
                        "GoldOrderID"=>$id,
                        "ProductName"=>$_POST['Product'][$i],
                        "ProductName"=>$_POST['Product'][$i],
                        "Price"=>$_POST['Price'][$i],
                        "Quantity"=>$_POST['Qty'][$i],
                        "Amount"=>$_POST['Amount'][$i] 
                    ));
                }
                
            }
                                                        
            echo "Proforma invoice has been created successully. ";
            
            $data = $mysql->select("select * from `_tbl_GoldOrders`   where `GoldOrderID`='".$id."'");
            $html = '   <div style="width:100%;background:#222;padding-top:10px;padding-bottom:10px;">
                            <table style="width:100%">
                                <tr>
                                    <td style="left;width:50%"><img src="http://goodgrowth.in/images/logo-gold.png"></td>
                                    <td style="text-align:right"><img src="http://goodgrowth.in/app/assets/images/theperthmint.jpg" style="height:100px"></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div style="background:#ccc;">
                        <table style="width:90%;margin:0px auto;" cellspacing="0">
                            <tr>
                                <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;text-align:left">Proforma Invoice</td>
                                <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;text-align:right;width:120px;">'.$data[0]['InvoiceNumber'].'</td>
                            </tr>
                        </table>
                        </div>
                        <table style="width:90%;margin:0px auto;"  cellspacing="0">
                            <tr>
                                <td style="font-family:arial;font-size:11px;color:#333;">Date</td>
                                <td style="font-family:arial;font-size:11px;color:#333;text-align: right;width:120px;">'.$data[0]['InvoiceDate'].'</td>
                            </tr>
                        </table>
                        <br>
                        <table style="width:90%;margin:0px auto;">
                            <tr>
                                <td style="width:50%;vertical-align:top;font-family:arial;font-size:11px;line-height:15px;">
                                    <b>Seller</b><br><br>'.
                                    $data[0]['SellerAddress1'].'<br>'.
                                    $data[0]['SellerAddress2'].'<br>'.
                                    $data[0]['SellerAddress3'].'<br>'.
                                    $data[0]['SellerAddress4'].'<br>'.
                                    $data[0]['SellerEmail'].'<br>
                                </td>
                                <td style="vertical-align:top;font-family:arial;font-size:11px;line-height:15px;">
                                    <b>Buyer</b><br><br>'.
                                    $data[0]['BuyerAddress1'].'<br>'.
                                    $data[0]['BuyerAddress2'].'<br>'.
                                    $data[0]['BuyerAddress3'].'<br>'.
                                    $data[0]['BuyerEmail'].'<br>'.
                                    $data[0]['BuyerMobile'].'<br>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>                                       
                                <td colspan="2" style="font-family:arial;font-size:11px;line-height:15px;">'.
                                    $data[0]['Row1'].'<br>'.
                                    $data[0]['Row2'].'<br>'.
                                    $data[0]['Row3'].'<br>'.
                                    $data[0]['Row4'].'<br>'.
                                    $data[0]['Row5'].'<br>
                                </td>
                            </tr>
                            <tr>
                                <td><br><br></td>
                            </tr>
                            <tr>
                                <td style="font-family:arial;font-size:11px;line-height:15px;">Set of investment gold bars</td>
                            </tr>
                        </table>
                        <div style="background:#ccc">
                            <table style="width:90%;margin:0px auto;"  cellspacing="0">
                                <tr style="background:#ccc">
                                    <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;text-align:left;width:30px">Name</td>
                                    <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;text-align:left"></td>
                                    <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;width:100px;text-align:right">Price</td>
                                    <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;width:100px;text-align:right">Quantity</td>
                                    <td style="padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;width:120px;text-align:right">Amount</td>
                                </tr>
                            </table>
                        </div>
                        <table style="width:90%;margin:0px auto;"  cellspacing="0">';
                        $products = $mysql->select("select * from _tbl_GoldOrders_items where GoldOrderID='".$data[0]['GoldOrderID']."'");
                        if (sizeof($products)>0) {
                            foreach($products as $p) {
                            $html .= '<tr>
                                        <td style="width:30px;padding-top:3px;padding-bottom:3px;"><img src="http://www.goodgrowth.in/app/assets/images/goldicon.png" style="width:25px"></td>
                                        <td style="color:#333;font-family:arial;font-size:11px;text-align:left">'.$p['ProductName'].'</td>
                                        <td style="color:#333;font-family:arial;font-size:11px;text-align:right;width:100px;bordr-left:1px solid #333">'.$p['Price'].'</td>
                                        <td style="color:#333;font-family:arial;font-size:11px;text-align:right;width:100px;bordr-left:1px solid #333">'.$p['Quantity'].'</td>
                                        <td style="color:#333;font-family:arial;font-size:11px;text-align:right;width:120px;bordr-left:1px solid #333">'.$p['Amount'].'</td>
                                     </tr>';
                            }
                        } else {
                            $html .= '<tr><td colspan="5" style="text-align:center">No Products found</td></tr>';
                        }
                        $html .= '</table>
                        <div style="background:#ccc">
                            <table style="width:90%;margin:0px auto;" cellspacing="0">
                                <tr>
                                    <td style="background:#ccc;padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;text-align:left">Cost of set (including fee)</td>
                                    <td style="background:#ccc;padding-top:5px;padding-bottom:5px;color:brown;font-family:arial;font-size:11px;text-align:right;width:120px">'.$data[0]['TotalAmount'].'    
                                </tr>
                            </table>
                        </div>
                        <table style="width:90%;margin:0px auto;" cellspacing="0">
                            <tr>
                                <td >&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font-family:arial;font-size:11px;line-height:15px;">'.
                                    $data[0]['Row6'].'<br>'.
                                    $data[0]['Row7'].'<br>'.
                                    $data[0]['Row8'].'<br>'.
                                    $data[0]['Row9'].'<br>
                                </td>
                            </tr>
                            <tr>
                                <td><Br><br></td>
                            </tr>
                        </table>
                        <div style="background:#ccc">
                            <table style="width:90%;margin:0px auto;" cellspacing="0">
                                <tr style="background:#ccc;font-weight:bold;">
                                    <td style="padding-top:5px;padding-bottom:5px;background:#ccc;padding:5px;color:brown;font-family:arial;font-size:11px;">Name</td>
                                    <td style="padding-top:5px;padding-bottom:5px;text-align:right;width:120px;background:#ccc;padding:5px;color:brown;font-family:arial;font-size:11px;">Amount</td>
                                </tr>
                            </table>
                        </div>
                        <table style="width:90%;margin:0px auto;" cellspacing="0"> 
                            <tr>
                                <td style="text-algin:left;font-family:arial;font-size:11px;">&nbsp;'.$data[0]['Row10'].'</td>
                                <td style="width:120px;text-align:right;font-family:arial;font-size:11px;border-left:1px solid #444;">'.$data[0]['FirstAmount'].'&nbsp;</td>
                            </tr>
                        </table>
                        <div style="background:#ccc">
                            <table style="width:90%;margin:0px auto;" cellspacing="0">                            
                                <tr>
                                    <td style="padding-top:5px;padding-bottom:5px;background:#ccc;padding:5px;color:brown;font-family:arial;font-size:11px;text-align:left">Total Amount</td>
                                    <td style="padding-top:5px;padding-bottom:5px;text-align:right;width:120px;background:#ccc;padding:5px;color:brown;font-family:arial;font-size:11px;">'.$data[0]['DueAmount'].'</td>  
                                </tr>
                            </table>
                        </div>
                        <table style="width:100%;">
                            <tr>
                                <td><br><BR><br></td>
                            </tr>   
                            <tr>
                                <td colspan="2" style="font-size:11px;font-family:arial;color:#333;text-align:center">'.$data[0]['Row11'].'</td>
                            </tr>
                        </table>'; 
            $pdf_footer = '<hr style="border:none;border-top:1px solid #ccc">
                           <table style="width:90%;margin:0px auto;">
                                <tr>
                                    <td style="font-family:arial;font-size:11px;line-height:15px;">
                                        <b style="font-size:14px;">Good Growth</b><br>
                                        5/3, Kamalam Annamalai Complex,<br>
                                        Mudangiyar Road,<br>
                                        Rajapalayam - 626117.<br>
                                        Email:goodgrowth@gmail.com<br>
                                        Internet:http://www.goodgrowth.in<br><br><br><br><br>
                                    </td>
                                </tr>       
                           </table>';
           
              
            
            $mailbody = '<div style="width:650px;margin:0px auto;">
                             <div style="width:100%;background:#222;padding-top:10px;padding-bottom:10px;">
                              <table style="width:100%">
                                <tr>
                                    <td style="left;width:50%"><img src="http://goodgrowth.in/images/logo-gold.png"></td>
                                    <td style="text-align:right"><img src="http://goodgrowth.in/app/assets/images/theperthmint.jpg" style="height:100px"></td>
                                </tr>
                            </table>
                            </div>
                            <div style="background:#ccc;padding:40px;padding-top:0px;padding-bottom:0px;color:#333;font-family:arial;font-size:13px">
                                    <div style="background:#fff;padding:10px;">
                                    Dear '.$data[0]['BuyerAddress1'].'<br><br>
                                    Thank you for your interest in our products and services. <br><br>
                                    Your order '.$data[0]['InvoiceNumber'].' has been processed. <br><br>
                                    Plase make a payment for your order slecting one of the payment methods available<br><br>
                                    
                                    The goodgrowth marketing incentives program gives you an opportunity to earn with the most exciting market in the world - Goodgrowth<br><br>
                                    Increase your incom, develop your business and make money with Goodgrowth.<br><br>
                                    We wish you th best of success!
                                </div>
                            </div>
                            <div style="width:100%;background:#222;padding-top:10px;color:#fff">
                                    <br><BR><br>
                                   &nbsp;<a href="http://www.goodgrowth.in" style="color:#f1f1f1;text-decoration:none">www.goodgrowth.in</a>
                                </div>
                        </div>';
                        
                         
            include("lib/mpdf/mpdf.php");
            //include("src/Mpdf.php");
            //$mpdf = new \Mpdf\Mpdf();
  
            $mpdf=new mPDF('', 'A4', '', '', 0, 0, 0, 0, 0, 0); 
            $mpdf->WriteHTML($html);
            $fname= "assets/pdf/".$data[0]['InvoiceNumber'].'.pdf';
            $mpdf->charset_in='UTF-8';
            //$mpdf->SetMargins(0, 0, 65);
            //$mpdf->SetHTMLHeader($pdf_header);
            $mpdf->SetHTMLFooter($pdf_footer);
            //$mpdf->SetWatermarkText("GoodGrowth");
            //$mpdf->showWatermarkText = true;
            //$mpdf->watermarkTextAlpha = 0.1;
            $mpdf->Output($fname,'F');
                          
            $mail = new PHPMailer;
            $mail->isSMTP(); 
            $mail->SMTPDebug = 0;
            $mail->Host = "mail.goodgrowth.in";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "support@goodgrowth.in";
            $mail->Password = "GoodGrowth";
            $mail->setFrom("support@goodgrowth.in", "GoodGrowth");
            $mail->addAddress($_POST['BuyerEmail'],"GoodGrowth");
            $mail->Subject = 'Proforma Invoice #: '.$data[0]['InvoiceNumber'];
            $mail->msgHTML($mailbody);
            $mail->AltBody = 'HTML messaging not supported';
            $mail->addAttachment($fname); //Attach an image file
            if(!$mail->send()){
                echo "Mailer Error: " . $mail->ErrorInfo;
                $mysql->execute("update `_tbl_GoldOrders` set `IsMailSent`='0', `MailResponse`='".$mail->ErrorInfo."' where `GoldOrderID`='".$id."'");
            } else {
                $mysql->execute("update `_tbl_GoldOrders` set `IsMailSent`='1', `MailResponse`='Message sent' where `GoldOrderID`='".$id."'");
                echo "Message sent!";
            }
            ?>
                <style>
                    #formd {display:none}
                </style>
            <?php
            
            // $smstxt= "Dear Admin, Your have received order (".$orderID.") with INR. ".$amount."   - Thanks GoodGrowth";
            // file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=9751157370");
            //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=8870832788");
            
            //$_SESSION['items']=array();
            //echo "<style>#msg{display:none}</style>";
            //echo "Your order has been successfully submitted. we will callback shortly";
        
        }                  
    }
?>
<form action="" method="post" id="formd">
<div style="width: 900px;background:#fff;margin:10px;padding:20px;border:1px solid #ccc">
    <table style="width: 100%;" cellspacing="0">
        <tr style="background:#ccc;font-weight:bold;">
            <td>Proforma Invoice</td>
            <td style="text-align: right;" style="width:120px;"><input type="text" name="InvoiceNumber" value="<?php echo isset($_POST['InvoiceNumber']) ? $_POST['InvoiceNumber'] : "";?>" style="min-width:100px"></td>
        </tr>
    </table>
    <table style="width: 100%;" cellspacing="0">
        <tr style="font-weight:bold;">
            <td>Date</td>
            <td style="text-align: right;" style="width:120px;"><input id="datepicker" type="text" name="InvoiceDate" value="<?php echo isset($_POST['InvoiceDate']) ? $_POST['InvoiceDate'] : "";?>"  style="min-width:100px"></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%;">
        <tr>
            <td style="vertical-align:top;">
                <b>Seller</b><br><br>
                <input type="text" name="SellerAddress1" style="width: 294px;" value="<?php echo isset($_POST['SellerAddress1']) ? $_POST['SellerAddress1'] : "Goodgrowth";?>" ><br>
                <input type="text" name="SellerAddress2" style="width: 294px;" value="<?php echo isset($_POST['SellerAddress2']) ? $_POST['SellerAddress2'] : "5/3, Kamalam Annamalai Complex, ";?>" ><br>
                <input type="text" name="SellerAddress3" style="width: 294px;" value="<?php echo isset($_POST['SellerAddress3']) ? $_POST['SellerAddress3'] : "Mudangiyar Road, Rajapalayam - 626117";?>"><br>
                <input type="text" name="SellerAddress4" style="width: 294px;" value="<?php echo isset($_POST['SellerAddress4']) ? $_POST['SellerAddress4'] : "Tamilnadu, India";?>"><br>
                Email:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="SellerEmail"  value="<?php echo isset($_POST['SellerEmail']) ? $_POST['SellerEmail'] : "goodgrowth@gmail.com";?>"><br>
            </td>
            <td style="vertical-align:top;">
                <b>Buyer</b><br><br>
                <input type="text" name="BuyerAddress1" style="width: 294px;" value="<?php echo isset($_POST['BuyerAddress1']) ? $_POST['BuyerAddress1'] : "";?>"><br>
                <input type="text" name="BuyerAddress2" style="width: 294px;" value="<?php echo isset($_POST['BuyerAddress2']) ? $_POST['BuyerAddress2'] : "";?>"><br>
                <input type="text" name="BuyerAddress3" style="width: 294px;" value="<?php echo isset($_POST['BuyerAddress3']) ? $_POST['BuyerAddress3'] : "";?>"><br>
                <!--<input type="text" name="BuyerAddress4" style="width: 294px;" value="<?php echo isset($_POST['BuyerAddress4']) ? $_POST['BuyerAddress4'] : "";?>"><br>-->
                Email:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="BuyerEmail" value="<?php echo isset($_POST['BuyerEmail']) ? $_POST['BuyerEmail'] : "";?>"><span id="error_BuyerEmail" style="color:red"><?php echo isset($error_BuyerMobile)? $error_BuyerEmail : "";?></span><br>
                Mobile:&nbsp;<input type="text" name="BuyerMobile" value="<?php echo isset($_POST['BuyerMobile']) ? $_POST['BuyerMobile'] : "";?>"><span id="error_BuyerMobile" style="color:red"><?php echo isset($error_BuyerMobile)? $error_BuyerMobile : "";?></span><br>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>                                       
            <td colspan="2">
                <input type="text" name="Row1" value="<?php echo isset($_POST['Row1']) ? $_POST['Row1'] : "We thank you for the Order you made and the trust rendered to us.";?>" style="width:100%">
                <input type="text" name="Row2" value="<?php echo isset($_POST['Row2']) ? $_POST['Row2'] : "When ordering products through Goodgrowth online store.";?>" style="width:100%">
                <input type="text" name="Row3" value="<?php echo isset($_POST['Row3']) ? $_POST['Row3'] : "You used the following IP address: auto";?>" style="width:100%">
                <input type="text" name="Row4" value="<?php echo isset($_POST['Row4']) ? $_POST['Row4'] : "Username: ";?>" style="width:100%">
                <input type="text" name="Row5" value="<?php echo isset($_POST['Row5']) ? $_POST['Row5'] : "Order recevied through an Internet - Page: www.goodgrowth.in";?>" style="width:100%">
            </td>
        </tr>
        <tr>
            <td><br><br></td>
        </tr>
        <tr>                                            
            <td>Set of investment gold bars</td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%;">
                    <tr style="text-align: center;font-weight:bold;background:#ccc">
                        <td style="padding:5px;">Product</td>
                        <td width="100px">Price</td>
                        <td width="100px">Quantity</td>
                        <td width="120px">Amount</td>
                    </tr>
                    <?php for($i=1;$i<=5;$i++) {?>         
                    <tr>
                        <td><input type="text" onkeydown="doCalc('<?php echo $i;?>')" id="Product_<?php echo $i;?>"  name="Product[<?php echo $i;?>]" value="<?php echo isset($_POST['Product'][$i]) ? $_POST['Product'][$i]: "";?>" style="width: 100%;"></td>
                        <td><input type="text" onkeydown="doCalc('<?php echo $i;?>')" id="Price_<?php echo $i;?>" name="Price[<?php echo $i;?>]" value="<?php echo isset($_POST['Price'][$i]) ? $_POST['Price'][$i]: "";?>" style="text-align:right;min-width:70px !important;"></td>
                        <td><input type="text" onkeydown="doCalc('<?php echo $i;?>')" id="Qty_<?php echo $i;?>" name="Qty[<?php echo $i;?>]" value="<?php echo isset($_POST['Qty'][$i]) ? $_POST['Qty'][$i]: "";?>" style="text-align: right;min-width:70px !important"></td>
                        <td><input type="text" onkeydown="doCCalc('<?php echo $i;?>')"id="Amount_<?php echo $i;?>" name="Amount[<?php echo $i;?>]" value="<?php echo isset($_POST['Amount'][$i]) ? $_POST['Amount'][$i]: "";?>" style="text-align: right;min-width:70px !important"></td>
                    </tr>
                    <?php } ?>
                </table>
            
            </td>
        </tr>                                          
        <tr>
            <td colspan="2" style="padding-left:3px;padding-right:3px">
                <table style="width: 100%;" cellspacing="0">
                    <tr style="background:#ccc;font-weight:bold;">
                        <td>Cost of set (including fee)</td>
                        <td style="text-align: right;" style="width:120px;"><input id="subtotal" type="text" value="<?php echo isset($_POST['TotalAmount']) ? $_POST['TotalAmount'] : "";?>" name="TotalAmount" style="min-width:100px;text-align:right"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="text" name="Row6" value="<?php echo isset($_POST['Row6']) ? $_POST['Row6'] : "Price and quantity of gold bars in the order may change depending on changes in the price of gold on the worlds market.";?>" style="width:100%">
                <input type="text" name="Row7" value="<?php echo isset($_POST['Row7']) ? $_POST['Row7'] : "The final bill is charged based on the actual purchase and can be divided into two parts. ";?>" style="width:100%">
                <input type="text" name="Row8" value="<?php echo isset($_POST['Row8']) ? $_POST['Row8'] : "Your order is subject to the Goodgrowth Terms and Conditions (including Program Terms where applicable)." ;?>"style="width:100%">
                <input type="text" name="Row9" value="<?php echo isset($_POST['Row9']) ? $_POST['Row9'] : "This order must be paid within 12 months. In case of non-payment during this period, the order my be prolonged.";?>" style="width:100%">
            </td>
        </tr>
        <tr>
            <td><Br><br></td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%;;" cellspacing="0">
                    <tr style="background:#ccc;font-weight:bold;">
                        <td style="padding-top:5px;padding-bottom:5px">Name</td>
                        <td style="text-align:left;width:120px;">Amount</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="Row10" value="<?php echo isset($_POST['Row10']) ? $_POST['Row10'] : "The minimum pre-payment for a set of investment gold bars";?>" style="width:100%"></td>
            <td style="text-align: right;"><input name="FirstAmount" type="text" value="<?php echo (isset($_POST['FirstAmount'])) ? $_POST['FirstAmount'] : "";?>" style="min-width:100px;text-align:right">
        </tr>  
        <tr>
            <td colspan="2">
                <table style="width: 100%;;" cellspacing="0">
                    <tr style="background:#ccc;font-weight:bold;">
                        <td style="padding-top:5px;padding-bottom:5px">Total Amount</td>
                        <td style="text-align:left;width:120px;"><input name="DueAmount" value="<?php echo isset($_POST['DueAmount']) ? $_POST['DueAmount'] : "";?>" type="text" style="min-width:100px;text-align:right"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><br><BR><br></td>
        </tr>   
        <tr>
            <td colspan="2">
                <input type="text" name="Row11" value="<?php echo isset($_POST['Row11']) ? $_POST['Row11'] : "You can choose the payment method in your backoffice in the Table of Orders or My Finances sections.";?>" style="width:100%;text-align:center">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;padding:20px;"><input name="sumbitBtn" type="submit" value="Save and send email" onclick="showConfirmsubmitOrder()"></td>
        </tr>
    </table>
</div>
</form>
<div class="modal" id="SaveandSend" data-backdrop="static" style="padding-top:177px;padding-right:0px;background:rgba(9, 9, 9, 0.13) none repeat scroll 0% 0%;">
            <div class="modal-dialog" style="width: 367px;">
                <div class="modal-content" id="SaveandSend_body" style="height:315px">
            
                </div>
            </div>
        </div>
<script>
function showConfirmsubmitOrder() {
      $('#SaveandSend').modal('show'); 
      var content = '<div class="SaveandSend_body" style="padding:20px">'
                    + '<div  style="height: 315px;">'                                                                              
                      + '<form method="post" >'
                        + '<button type="button" class="close" data-dismiss="modal">&times;</button>'
                        + '<h4 class="modal-title">Save and Send</h4> <br>'
                            +'<div style="text-align:left">Are you want save and send email<br><br>'
                            + '<button type="button" class="btn btn-primary" style="font-family:roboto">Yes, send</button>&nbsp;&nbsp;&nbsp;'
                            + '<a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>'
                        + '</div><br>'
                        + '</form>'                                                                                                          
                      +  '</div>'
                    +  '</div>';
            $('#SaveandSend_body').html(content);
}
  $( function() {
    $( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});
  } );
  function doCalc(row) {
      //Product_   Price_    Qty_    Amount_
      
      var total=0;
      
      var row_price = parseFloat($('#Price_'+row).val().replace('$', ''));
      if (row_price > 0 && parseFloat($('#Qty_'+row).val())>0) {
        $('#Price_'+row).val("$"+row_price.toFixed(2));    
        $('#Amount_'+row).val("$"+ parseFloat($('#Qty_'+row).val() * row_price).toFixed(2)); 
      }
             
      for(i=1;i<=5;i++) {
          var price = parseFloat($('#Price_'+i).val().replace('$', ''));
          
          if ( price > 0 && parseFloat($('#Qty_'+i).val())>0 )  {
              var subtotal = parseFloat($('#Qty_'+i).val() * price);
            //$('#Price_'+i).val("$"+price.toFixed(2));    
            //$('#Amount_'+i).val("$"+subtotal.toFixed(2));    
            total+=subtotal;
          } else {
            $('#Amount_'+i).val("")  ;
          }
         $('#subtotal').val("$"+total.toFixed(2)); 
      }  
  }
      
      function doCCalc(row) {
      //Product_   Price_    Qty_    Amount_
       var total=0;
       
      for(i=1;i<=5;i++) {
       
        var amt = parseFloat($('#Amount_'+i).val().replace('$', ''));
           
          if ( amt > 0)  {
              
            total+=amt;
          } else {
            $('#Amount_'+i).val("")  ;
          }
         $('#subtotal').val("$"+total.toFixed(2)); 
      }
  }
  </script>