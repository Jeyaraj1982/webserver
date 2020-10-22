  <div class="heading1">
    <span>Registered Schemes</span>
</div>
<br> 
<?php $MemberSchemes = $mysql->select("select * from `_tbl_Members_Schemes` where `MemberID`='".$userData['MemberID']."' order by `MemberSchemeID` desc"); ?>
<table style="width: 1000px;" cellspacing="0" cellpadding="5">
    <tr style="background:#ccc;">
        <td style="width:150px;">A/c Number</td>
        <td style="width:150px;">Registered Date</td>
        <td style="">SchemeName</td>
        <td style="width:150px;text-align:right">Installment Amount</td>
        <td style="width:100px;text-align:right">Installments</td>
        <td style="width:100px;text-align:right">Benefits</td>
        <td style="width:100px;text-align:right">MaturityAmtount</td>
        <td style="width:100px;text-align:right">Paid</td>
        <td style="width:50px;">&nbsp;</td>
    </tr>
    <?php foreach($MemberSchemes as $MemberScheme) {?>
    <tr>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $MemberScheme['MemberSchemeID'];?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo date("Y-m-d",strtotime($MemberScheme['Joined']));?></td>
        <td style="border-bottom:1px solid #ccc;padding:3px;"><?php echo $MemberScheme['SchemeName'];?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo number_format($MemberScheme['InstallmentAmount'],2);?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo $MemberScheme['Installments'];?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo number_format($MemberScheme['Benefits'],2);?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right"><?php echo number_format($MemberScheme['MaturityAmtount'],2);?></td>
        <td style="border-bottom:1px solid #ccc;text-align: right">
        <?php
          $O = $mysql->select("select sum(Amount) as amt from `_tbl_Members_Schemes_Dues` where `MemberSchemeID`='".$MemberScheme['MemberSchemeID']."'");
         echo number_format( (isset($O[0]['amt']) ? $O[0]['amt'] : 0),2);?>
        </td>
        <td style="border-bottom:1px solid #ccc;padding:3px;text-align:center"><a href="dashboard.php?action=Scheme/View&SchemeACNumber=<?php echo $MemberScheme['MemberSchemeID'];?>">View</a></td>
    </tr>
    <?php } ?>
    <?php if (sizeof($MemberSchemes)==0) {?>
    <tr>
        <td colspan="9" style="text-align: center;border-bottom:1px solid #ccc">No registered schemes found</td>
    </tr>
    <?php } ?>
</table> 