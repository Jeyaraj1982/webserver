<?php  include("file/header.php");?>

	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg);">
    	<div class="auto-container">
        	<div class="inner-box">
                <h1>Order Now</h1>
                <ul class="bread-crumb">
                	<li><a href="index.php">Home</a></li>
                    <li>Order Now</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
   <section class="faq-section" style="padding-top:50px;">
    	<div class="auto-container">
        	<!--Faq Title-->
            <?php
             use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

                require 'app/lib/mail/src/Exception.php';
                require 'app/lib/mail/src/PHPMailer.php';
                require 'app/lib/mail/src/SMTP.php';
                
                if (isset($_POST['SendOrderBtn'])) {
                                             
             
                    $id = $mysql->insert("_tb_Orders",array("OrderDate"=>date("Y-m-d H:i:s"),
                                                            "PersonName"=>$_POST['PersonName'],
                                                            "MobileNumber"=>$_POST['MobileNumber'],
                                                            "EMailAddress"=>$_POST['EmailAddress']));
                    $orderID = "1900".$id;
                    $cart = '<div style="width:650px;margin:0px auto">
                                <table style="width:100%">
                                    <tr>
                                        <td><img src="http://goodgrowth.in/images/logo.png"></td>
                                        <td style="width:300px;text-align:right">
                                            5/3, Kamalam Annamalai Complex,<br>
                                            Mudangiyar Road,<br>
                                            Rajapalayam - 626117.<br>
                                            Ph: +91-9751157370, 8870832788<br>
                                            Mail: goodgrowth@gmail.com.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Order Information</td>
                                    </tr>
                                    <tr>
                                        <td> '.$_POST['PersonName'].'<br>'.nl2br($_POST['address']).'<br>Mobile No: '.$_POST['MobileNumber'].'<bR>Mail '.$_POST['EmailAddress'].'
                                        
                                        </td>
                                        <td style="width:300px;text-align:right">
                                            Order # :'.$orderID.'<br>
                                            Order Date:'.date("Y-m-d H:i").'<br>
                                        </td>
                                    </tr>
                                </table>
                                
                             <table style="width:100%">
                                <tr>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:30px">SL</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc">Product Name</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:50px;text-align:right">Qty</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100px;text-align:right">Amount</td>
                                </tr>';
                                $i=1;
                                $amount = 0;
                                foreach($_SESSION['items'] as $item) {
                                    $cart .= '<tr>
                                                <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;text-align:right">'.$i.'.</td>
                                                <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;">'.$item['PName'].'</td>
                                                <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">'.$item['PQty'].'</td>
                                                <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">'.number_format($item['Price'],2).'</td>
                                              </tr>';            
                                    $i++;
                                    $amount += $item['Price'];
                                } 
                                $cart .= '<tr>
                                            <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:5px;text-align:right"></td>
                                            <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;" colspan="2">Total</td>
                                            <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;">'.number_format($amount,2).'</td>
                                        </tr> 
                                     </table>
                                </div>';
                          $mysql->execute("update _tb_Orders set orderCode='".$orderID."', Ordered='".$cart."' where OrderID='".$id."'");
                          // Generate pdf
                          include("app/lib/mpdf/mpdf.php");
                          $mpdf=new mPDF(); 
                          $mpdf->WriteHTML($cart);
                          $fname= "app/assets/pdf/".$orderID.'.pdf';
                          $fname= $orderID.'.pdf';
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
                          $mail->addAddress($_POST['EmailAddress'],"GoodGrowth");
                          $mail->Subject = 'Order ID: '.$orderID;
                          $mail->msgHTML($cart);
                          $mail->AltBody = 'HTML messaging not supported';
                          $mail->addAttachment($fname); //Attach an image file
                          if(!$mail->send()){
                            echo "Mailer Error: " . $mail->ErrorInfo;
                          } else {
                            //echo "Message sent!";
                          }

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
                          $mail->addAddress("goodgrowth@gmail.com", "Order");
                          $mail->Subject = 'Order ID: '.$orderID;
                          $mail->msgHTML($cart); 
                          $mail->AltBody = 'HTML messaging not supported';
                          $mail->addAttachment($fname); //Attach an image file
                          $mail->send(); 
                          
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
                          $mail->addAddress("sales@j2jsoftwaresolutions.com", "Order");
                          $mail->Subject = 'Order ID: '.$orderID;
                          $mail->msgHTML($cart); 
                          $mail->AltBody = 'HTML messaging not supported';
                          $mail->addAttachment($fname); //Attach an image file
                          $mail->send(); 
                          
                          $smstxt= "Dear Admin, Your have received order (".$orderID.") with INR. ".$amount."   - Thanks GoodGrowth";
                          file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=9751157370");
                          file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=8870832788");
                          
                          $_SESSION['items']=array();
                          echo "<style>#msg{display:none}</style>";
                          echo "Your order has been successfully submitted. we will callback shortly";
                } 
            ?>
            <!--Faq Form-->
             <?php if (sizeof($_SESSION['items'])>0) {?>
            <div class="faq-form-section">
            	<h2> Submit Your Orders Now.</h2>
                <div>
                    <h4 class="modal-title">Order Request</h4>
                    <div class="modal-body">
                    <form action="order.php" method="post">
                        <button type="submit" name="emptyCart"  class="theme-btn btn-style-one add-to-cart">Empty Cart</button> 
                    </form>
                    <table style="width:100%">
                        <tr>
                            <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:30px">SL</td>
                            <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc">Product Name</td>
                            <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:50px;text-align:right">Qty</td>
                            <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100px;text-align:right">Amount</td>
                        </tr>
                        <?php
                            $i=1;
                            $amount = 0;
                            foreach($_SESSION['items'] as $item) {
                        ?>
                        <tr>
                            <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;text-align:right"><?php echo $i;?>.</td>
                            <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;"><?php echo $item['PName'];?></td>
                            <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">1</td>
                            <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;"><?php echo number_format($item['Price'],2);?></td>
                        </tr>            
                        <?php
                            $i++;
                            $amount += $item['Price'];
                            } 
                        ?>
                        <tr>
                            <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:5px;text-align:right"></td>
                            <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;" colspan="2">Total</td>
                            <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;"><?php echo number_format($amount,2);?></td>
                        </tr> 
                    </table>
                </div>
            </div>
           		<!--Contact Form-->
                <form method="post" action="#">
                    <div class="row clearfix">
                            
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="PersonName" value=""   placeholder="Your Name *" required="">
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="" name="MobileNumber" placeholder="Your Mobile *" required="">
                        </div>
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="email"   value="" name="EmailAddress" placeholder="Your Email *" required="">
                        </div>
                       
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
						   <textarea  name="address" placeholder="Enter Your address"></textarea>
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" name="SendOrderBtn" class="theme-btn btn-style-five">Submit Order</button>
                        </div>
                    </div>
                </form>
                <?php } else { ?>
                <div id="msg">
                    Please select product and continue cart.
                </div>
                <?php } ?>
                <!--End Contact Form-->
            </div>
            <!--End Faq Form-->
        </div>
    </section> 
   <?php  include("file/footer.php");?>
