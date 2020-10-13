<?php include_once("header.php");?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                        </div>
                        <div>Transfer E-Pins</div>
                    </div>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <?php if (isset($_POST['btnTransfer'])) { ?>                               
                        <?php if (sizeof($_POST['ids'])>=1) {?>
                        <form action="TransferEpinsConfirm.php" method="post" onsubmit="return validateSponsorID()">
                            <input type="hidden" value="<?php echo base64_encode(json_encode($_POST['ids']));?>" name="ids">
                            <table cellpadding="5" cellspacing="0">
                                <tr>
                                    <td style="width:200px">Transfer To (Sponsor ID)</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Transfer To" name="TransferTo" id="TransferTo">
                                        <span style="color:red" id="ErrorTransferTo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Confirm Transfer To</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Transfer To" name="CTransferTo" id="CTransferTo">
                                        <span style="color:red" id="ErrorCTransferTo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Pins</td>
                                    <td><?php echo sizeof($_POST['ids']);?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Transfer" name="btnConfrimTransfer"></td>
                                </tr>
                            </table>
                        </form>
                        <?php 
                        } else {
                            echo "<div style='text-align:center;font-size:18px;color:red;padding:50px;padding:50px'><img src='assets/images/fail.png' style='width:128px'><br><br>epin informatino not found. try again</div>";
                        }
                    } else { 
                        echo "<div style='text-align:center;font-size:18px;color:red;padding:50px;padding:50px'><img src='assets/images/fail.png' style='width:128px'><br><br>Access Denied. Please try later</div>";
                    } ?>            
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateSponsorID() {
            
            $('#ErrorTransferTo').html("");
            $('#ErrorCTransferTo').html("");
            
            if ($('#TransferTo').val().length>10) {
                if ($('#TransferTo').val()==$('#CTransferTo').val()) {
                    return true;
                } else {
                    $('#ErrorCTransferTo').html("Transfer To and Confirm Transfer To must be same");  
                    return false;
                }
            } else {
               $('#ErrorTransferTo').html("Invalid MemberID");
               return false;
            }
        }
    </script>
 <?php include_once("footer.php");?>