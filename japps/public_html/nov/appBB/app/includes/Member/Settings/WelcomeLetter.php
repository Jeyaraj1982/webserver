    <div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="background:#f1f1f1;padding-top:50px;padding-bottom:50px;">
                    <div class="row"> 
                        <div class="col-md-8" style="margin:0px auto;background:#fff">
                            <div style="border:1px dashed #ccc;margin:10px;margin-top:30px;margin-bottom:30px;padding:10px"> 
                                <table style="border-collapse: collapse" width="100%" cellpadding="5" bordercolor="#a71b20" border="0">
                                    <tbody>
                                        <tr>
                                            <td width="100%">
                                                <img src="https://wintogether2.com/assets/images/wintogether.png"><br>
                                                No 69, Pillanna Garden, Ist stage 4th Cross St,<br>
                                                Thamas Town Post, Bangalore - 560084.<br>
                                                <br> 
                                                <br> 
                                                <table width="100%">
                                                    <tbody> 
                                                        <tr>
                                                            <td colspan="5"  align="left">
                                                                <div style="text-align:center;font-size:24px"><b>Welcome Letter</b><br><br></div>
                                                                Welcome to <b>WinTogether Marketing Private Limited</b>, now you (<?php echo $_SESSION['User']['MemberName'];?>) can start sponsoring/referring your contacts to share this wonderful opportunity.<Br>
                                                            </td>                         
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style="padding:20px;" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="5">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="60%">
                                                                                <b>Your Membership ID:</b><br>
                                                                                <?php echo $_SESSION['User']['MemberCode'];?></td>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="40%">
                                                                                <b>Sponser's ID:</b><br>
                                                                                <?php echo $_SESSION['User']['SponsorCode'];?>
                                                                            </td>
                                                                        </tr>
                                                                         <tr>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="60%">
                                                                                <b>Name:</b><br>
                                                                                <?php echo $_SESSION['User']['MemberName'];?></td>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="40%">
                                                                                <b>Sponser's Name:</b><br>
                                                                                <?php echo $_SESSION['User']['SponsorName'];?>
                                                                            </td>
                                                                        </tr>
                                                                         <tr>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="60%">
                                                                                <b>Mobile No:</b><br>
                                                                                <?php echo $_SESSION['User']['MobileNumber'];?></td>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="40%">
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="40%">
                                                                                <b>Date of Joining:</b><br>
                                                                                <?php echo date("M d, Y",strtotime($_SESSION['User']['CreatedOn']));?>
                                                                            </td>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" width="40%">
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-left:10px;border-bottom:1px solid #eee;" colspan="2" valign="top">
                                                                                <b>Address:</b><br> 
                                                                                <?php echo $_SESSION['User']['AddressLine1'];?><br> 
                                                                                <?php echo $_SESSION['User']['AddressLine2'];?><br>
                                                                                <?php echo $_SESSION['User']['DistrictName'];?>, 
                                                                                <?php echo $_SESSION['User']['StateName'];?>, 
                                                                                <?php echo $_SESSION['User']['CountryName'];?>-
                                                                                <?php echo $_SESSION['User']['PinCode'];?>.
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="text-align: center;padding-top:20px">
                            <a href="javascript:print()" class="btn btn-primary">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>