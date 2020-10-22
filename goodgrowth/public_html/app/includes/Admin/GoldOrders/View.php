<?php $data = $mysql->select("select * from `_tbl_GoldOrders`   where `GoldOrderID`='".$_GET['Order']."'");
            $html = '<div style="background:#fff;max-width:800px;">  
                        <div style="width:100%;background:#222;padding-top:10px;padding-bottom:10px;">
                           <img src="http://goodgrowth.in/images/logo-gold.png">
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
                                <td style="width:120px;text-align:right;font-family:arial;font-size:11px;border-left:1px solid #444;">'.$data[0]['FirstAmount'].'</td>
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
                        </table>
                        </div>
                        '; 
         
            echo $html;
            
            ?>
            <br><bR>