<h2 style="text-align: left;font-family: arial;">Online Jobs</h2>   
<b style='color:#EA4E00;font-size:14px;'>Online Ad Posting Job</b><Br><br>
 <img src='images/data_entry.jpg' align="left" style="width: 200px;height:150px">
     <b>Plan 1 : </b>Rs. 900 <br>
     <b>Plan 2 : </b>Rs. 2,100  <br>
     <b>Plan 3 : </b>Rs. 3,600 <br><br><Br><Br><br> <br>
 
        
              
   <hr style='border:1px solid #f3f3f3' >
      <br>
<b style='color:#EA4E00;font-size:14px;'>Online Data Typing</b><Br> <br>
<img src='images/onlinetyping.jpg?id=2' align="left"  style="width: 200px;"> 
<!--<b>Deposit&nbsp;:&nbsp;</b> Rs. 3,000 <br>
    <b>Validity&nbsp;:&nbsp;</b>Life Time <br>
    <b>Earn Money&nbsp;:&nbsp;</b>Rs. 8,000.00/Month <br> --><br><br><br>
    <bR><Br><Br>     <bR><Br><Br> 
      <br>
        <div style='border:1px solid #f1f1f1;font-size:12px;font-family:arial;padding:5px;margin:5px;background:#F8FFF2'>
        
        <?php if(isset($_POST['mnumber'])) { ?>
        
        <?php
    $sof = $mysql->select("select * from _softwares where mobileno='".$_POST['mnumber']."'");
    
    if (sizeof($sof)>0) {
        echo "Your Download Link  <a target='new' href='software/".$sof[0]['software']."'>Download</a>";
    } else {
        echo "<p align='center' style='color:red'>Invalid Access</p><br><br>";
       ?>
           <b>Software Download</b>
                <form action="" method="post">
                    <table align="center" cellpadding="5" cellspacing="0" style="font-size:12px;font-family:arial;">
                        <tr>
                            <td>Enter Mobile No</td>
                            <td><input type='text' name='mnumber' style="padding:8px;border:1px solid #87DC39;font-size:18px;font-weight:bold;width:180px" maxlength="10"></td>
                            <td><input type='image' src='images/downloadfile.jpg'></td>
                        </tr>
                    </table>
                </form>
       <?php
    }
    
?>
            
        <?php } else {
            ?>
         <b>Software Download</b>
                <form action="" method="post">
                    <table align="center" cellpadding="5" cellspacing="0" style="font-size:12px;font-family:arial;">
                        <tr>
                            <td>Enter Mobile No</td>
                            <td><input type='text' name='mnumber' style="padding:8px;border:1px solid #87DC39;font-size:18px;font-weight:bold;width:180px" maxlength="10"></td>
                            <td><input type='image' src='images/downloadfile.jpg'></td>
                        </tr>
                    </table>
                </form>      
            <?php
        } ?>
        
         
        </div>
    <br><br><br>
        <iframe width="480" height="360" src="http://www.youtube.com/embed/wgpEhsPpXbI" frameborder="0" allowfullscreen></iframe>                                </div>