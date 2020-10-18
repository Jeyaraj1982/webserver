<?php 
    include_once("header.php");
    
    if (!(loginCheck())) {
        echo "<script>location.href='index.php';</script>";
    } 
    
    $senderids = getSenderIds($_SESSION['user']['id']);
    
    //$data = $mysql->select("select * from _senderid where userid='".$_SESSION['user']['id']."'");
    if (sizeof($senderids)>0) {

?> 
 
                <h3>SMS Reports</h3>
                <form action="" method="post">
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>Sender's ID</td>
                        <td>:</td>
                        <td><select name="senderid" id="senderid">
                            <?php foreach($senderids as $d) {?>
                            <option value="<?php echo $d['senderid'];?>"><?php echo $d['senderid'];?></option>
                            <?php } ?>
                            </select>
                        </td>
                        <td>From Date</td>
                        <td>:</td>
                        <td><input value="<?php echo date("Y-m-d");?>" type="Text" name="fdate" id="fdate"></td>
                        <td>To Date</td>
                        <td>:</td>
                        <td><input value="<?php echo date("Y-m-d");?>"  type="Text" name="tdate" id="tdate"></td>
                        <td><input type="submit" value="View Report" name="reptbtn" class="myButton"></td>
                    </tr>
                </table>
                </form>
            </td>
        </tr>	
        <tr>
            <td>
                <?php if (isset($_POST['reptbtn'])) {?>
                <div style="padding-left:20px;padding-right:20px">
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead class="theader" style="background: #e9e9e9">
                            <tr>
                                <th>Date</th>
                                <th>Sender ID</th>
                                <th>Send To</th>
                                <th>Message</th>
                                <th>Count</th>
                                <th>From</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <script>
                    $(document).ready(function() {$('#example').DataTable({"processing": false,"serverSide": false,"ajax": "reqdata.php?request=smsreport&fdate=<?php echo $_POST['fdate'];?>&tdate=<?php echo $_POST['tdate'];?>"});});
                </script>
                <?php } ?>
            </td>
    </tr>	
    </table>
<?php } else { ?>
    Please Contact Administrator
<?php } ?>

                <script>
                    window.onload = function(){new JsDatePick({useMode:2,target:"fdate",dateFormat:"%Y-%m-%d"});new JsDatePick({useMode:2,target:"tdate",dateFormat:"%Y-%m-%d"});};
                </script>



 
