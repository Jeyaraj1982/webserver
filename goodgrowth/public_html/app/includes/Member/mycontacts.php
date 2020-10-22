 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Additional security verification</span></div>
 <Br>
 Due to security reasons, we require additional simple verification procedure to confirm that it is you, the owner of the account, who is performing the requested action. <Br> <Br>
In order to continue, please select one of the verification methods listed below: <Br> <Br>
 
 </div> 
 
 <Br> 
 <div style="padding:10px;border:1px solid #eee;background:#fff">
 
 
  <table cellspacing="0" cellpadding="6" style="width:100%">
    <tr>
        <td colspan="2">Confirmation code will be sent to this address: </td>
    </tr>
    <tr>
        <td colspan="2"><select name="doc2_type" style="width: 100%;" class="valid"><option value="2301"><?php echo $userData['EmailID'];?></option></select></td>
    </tr>
     
    <tr>
        <td  style="padding-top:10px"><a  href="dashboard.php?action=mycontactverify" class="SubmitBtn">Continue</a></td>
        <td style="text-align:right" >
         <a href="dashboard.php?action=mycontactverifytruble" class="hlink">I'm having trouble with this step</a>&nbsp;

        </td>
    </tr>
 </table>
 </div>