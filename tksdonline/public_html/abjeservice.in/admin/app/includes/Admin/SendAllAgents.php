<?php
    $subscribed_agents = $mysql->select("select * from _tbl_member where IsMember=1 AND TelegramID>0 and MapedTo<>3");
    if (isset($_POST['sendMessage'])) {
        
        $error=0;
        foreach($subscribed_agents as $agent) {
            TelegramMessageController::sendSMS($agent['TelegramID'],$_POST['Message'],$agent['MemberID'],0);  
        }
        
        if ($error==0) {
            ?>
            <script>
                swal("<?php echo sizeof($subscribed_agents). " messages sent";?> ", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=SendAllAgents'
                });
            </script>
        <?php } else { ?>
             <script>
              $(document).ready(function() {
                    swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
            <?php
        }
    }
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Telegram Service</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Send Message All Agents</a></li>
        </ul>
    </div>    
        
       <style>
       .btn-light{border:1px solid #ccc !important}
       </style> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Message Send All Telegram Members</div>
                </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Agents</strong>
                            <br>
                            <input type="text" readonly="readonly" value="<?php echo sizeof($subscribed_agents);?>"  class="form-control" disabled="disabled">
                        </div>
                    </div>   
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Message</strong>
                            <br>
                            <input type="text" name="Message" id="Message"  class="form-control" required="required" style="border:1px solid #ccc">
                        </div>
                    </div>          
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="sendMessage" id="sendMessage" class="btn btn-primary" >Send Messages</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?> 