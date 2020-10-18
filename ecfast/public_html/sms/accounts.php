<?php include_once("header.php"); 

 if (!(loginCheck())) {
        echo "<script>location.href='index.php';</script>";
    } 
?> 
 
            <h3>Account Details</h3>
            
             <?php
                  
                   $d = $mysql->select("select sum(smscount) as used from _mobilesms where userid=".$_SESSION['user']['id']);
            
                echo "Used Credits: ".$d[0]['used']."<br>";
            
                echo "Available Credits: ".checkCredits($_SESSION['user']['id']);
 
            ?>
            <br><Br>
            <div >
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead class="theader" style="background: #e9e9e9">
                        <tr>
                            <th>Transaction Date</th>
                            <th>Particulars</th>
                            <th>Credits for</th>
                            <th>From/To</th>
                            <th>Credits</th>
                            <th>Debits</th>
                            <th>Available Credits</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <script>
                $(document).ready(function() {
                    $('#example').DataTable( {
                    "processing": false,
                    "serverSide": false,
                    "ajax": "reqdata.php?request=accountSummary&fdate=<?php echo $_REQUEST['date'];?>&tdate=<?php echo $_REQUEST['date'];?>"
                } );} );
            </script>


          
           
        </td>
    </tr>		
</table>
 
