<div class="heading1"><span>Join Our Scheme</span></div><bR><br>
<?php $products = $mysql->select("select * from _tbl_Member_Schemes"); ?>
<table  cellpadding="5" cellspacing="0" style="width: 850px;">
    <tr style="font-weight:bold;text-align: center;background:#ccc;">
        <td>Scheme Name</td>
        <td>Months</td>
        <td>Amount Per Month</td>
        <td>Bonus Amount</td>
        <td>Maturity Amtount</td>
        <td>&nbsp;</td>
    </tr>
    <?php foreach($products as $p) { ?>
    <tr>
       <td style="border-bottom:1px solid #ccc"><?php echo $p['SchemeName'];?></td>
       <td style="border-bottom:1px solid #ccc;text-align:center"><?php echo $p['Installments'];?></td>
       <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['InstallmentAmount'],2);?></td>
       <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['Benefits'],2);?></td>
       <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($p['MaturityAmtount'],2);?></td>
       <td style="text-align:right;border-bottom:1px solid #ccc">
       <form action="dashboard.php?action=Scheme/Confirm" method="post">
        <input type="hidden" value="<?php echo $p['SchemeID'];?>" name="SchemeID">
        <input type="submit" value="Join" name="btnSubmit" class="SubmitBtn">
       </form>
       </td>
    </tr>
    <?php } ?>
</table>