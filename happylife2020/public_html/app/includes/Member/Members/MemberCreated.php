<?php
    $_SESSION['param']=array();
?>
<div class="container-fluid" style="padding:25px;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="text-align:center;padding:100px;">
                                    <img src="assets/images/shield.png"><br><br>
                                    <span style='color:green'>Member Created Successfully.</span> 
                                    <br><br>
                                    <table align="center">
                                        <tr>
                                            <td style="text-align: right;">Your Member ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $_GET['MemID'];?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right;">Your Sponsor ID</td>
                                            <td style="text-align: left">:&nbsp;<?php echo trim($_GET['SpnID']);?></td>
                                        </tr>
                                          <tr>
                                            <td style="text-align: right;">Your Upline ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $_GET['UpnCode'];?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>            