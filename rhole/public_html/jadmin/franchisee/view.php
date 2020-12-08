<?php
    include_once("../../config.php"); 
   
      $data = $mysql->select("select * from _tbl_franchisee where userid='".$_GET['frid']."'");                            
?>
 <script src="https://www.klx.co.in/assets/js/jquery.3.2.1.min.js"></script>

<link rel="stylesheet" href="../../assets/css/demo.css">
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
 <body style="margin:0px;">
 <div class="titleBar">View Franchisee</div>
 <table cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td style="vertical-align: top;">
                <form action="" method="post" style="background-color:#fff;" onsubmit="return checkInputs();"> 
                    <table style="margin:0px auto;color: #333;font-family:'Trebuchet MS';font-size: 13px;" cellpadding="3" cellspacing="0" align="left">
                       <tr>
                             <td style="text-align:left;width:122px">Franchisee Name&nbsp;&nbsp;</td>
                             <td><?php echo $data[0]['FranchiseeName'];?></td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;">Email ID&nbsp;&nbsp;</td>
                             <td><?php echo $data[0]['EmailID'];?></td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;">Password&nbsp;&nbsp;</td>
                             <td><?php echo $data[0]['Password'];?></td> 
                       </tr>
                       <tr>
                            <td style="text-align:left;">Country Name</td>
                            <td><?php echo $data[0]['CountryName'];?></td> 
                        </tr> 
                        <tr>
                            <td style="text-align:left;">State Name</td>
                            <td><?php echo $data[0]['StateName'];?></td> 
                        </tr>
                        <tr>
                            <td style="text-align:left;">District Name</td>
                            <td><?php echo $data[0]['DistrictName'];?></td> 
                        </tr>
                        <tr>
                            <td style="text-align:left;">IsActive</td>
                            <td><?php if($data[0]['IsActive']==1){ echo "Active" ;}else { "Deactive";};?></td> 
                        </tr>
                        <tr>
                            <td style="text-align:left;">Created On</td>
                            <td><?php echo $data[0]['CreatedOn'];?></td> 
                        </tr>                                
                       <tr>
                            <td align="left"><a href="list.php">Back</a>  
                       </tr> 
                    </table>
                </form>
              <script>$('#success').hide(3000);</script> 
        </td>
    </tr>
  </table>
  </body>
                    


