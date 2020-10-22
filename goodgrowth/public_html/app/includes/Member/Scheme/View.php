<?php
        $MemberSchemes = $mysql->select("select * from `_tbl_Members_Schemes` where MemberSchemeID='".$_GET['SchemeACNumber']."' and `MemberID`='".$userData['MemberID']."' order by `MemberSchemeID` desc");
        if (sizeof($MemberSchemes)==1) {
        $MemberSchemeDues = $mysql->select("select * from `_tbl_Members_Schemes_Dues` where `MemberSchemeID`='".$MemberSchemes[0]['MemberSchemeID']."'");
        $i=1;
?>
         <div class="heading1">
    <span>Scheme Details</span>
</div><br><br>
    <div style="width:800px;border:1px solid #ccc;padding:10px;">
         <table>
                <tr>
                    <td>Account Number</td>
                    <td>:&nbsp;&nbsp;<?php echo $MemberSchemes[0]['MemberSchemeID'];?></td>
                </tr>
                <tr>
                    <td style="width: 150px;">Scheme Name</td>
                    <td>:&nbsp;&nbsp;<?php echo $MemberSchemes[0]['SchemeName'];?></td>
                </tr>
                <tr>
                    <td>Monthly Amount</td>
                    <td>:&nbsp;&nbsp;Rs. <?php echo $MemberSchemes[0]['InstallmentAmount'];?></td>
                </tr>
                 <tr>
                    <td>Installment</td>
                    <td>:&nbsp;&nbsp;<?php echo $MemberSchemes[0]['Installments'];?> Months</td>
                </tr>
                                 <tr>
                    <td>Bonus</td>
                    <td>:&nbsp;&nbsp;Rs. <?php echo $MemberSchemes[0]['Benefits'];?></td>
                </tr>
                <tr>
                    <td>Maturity Amount</td>
                    <td>:&nbsp;&nbsp;Rs. <?php echo $MemberSchemes[0]['MaturityAmtount'];?></td>
                </tr>
                <tr>
                    <td>A/C Opened</td>
                    <td>:&nbsp;&nbsp;<?php echo date("Y-m-d",strtotime($MemberSchemes[0]['Joined']));?></td>
                </tr>
                <tr>
                    <td>Matured Date</td>
                    <td>:&nbsp;&nbsp;<?php echo date("Y-m-d",strtotime($MemberSchemeDues[sizeof($MemberSchemeDues)-1]['DueDate']));?></td>
                </tr>
            </table>
        <br>
        <table cellpadding="5" cellspacing="0" style="width: 800px;clear:both;">
            <tr style="font-weight:bold;text-align: center;background:#ccc;">
                <td style="text-align: right;width:25px">Installment</td>
                <td style="text-align: right;width:75px">Due Date</td>
                <td style="text-align: right;width:75px">Due Amount</td>
                <td style="text-align: right;width:75px">Txn ID</td>
                <td style="text-align: left;">Txn Date</td>
                <td style="text-align: right;width:75px">Paid Amount</td>
            </tr>
            <?php foreach($MemberSchemeDues as $item) { ?>
            <tr>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $i;?>.</td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo date("Y-m-d",strtotime($item['DueDate']));?>&nbsp;</td>
                <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo number_format($item['DueAmount'],2);?></td>
                <td style="border-bottom:1px solid #ccc;text-align:right"><?php echo $item['ActTxnID'];?>&nbsp;</td>
                <td style="border-bottom:1px solid #ccc"><?php echo $item['PaidOn'];?></td>
                <td style="text-align:right;border-bottom:1px solid #ccc"><?php echo strlen(trim($item['Amount']))==0 ? "" : number_format($item['Amount'],2);?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
<?php } else { ?>
Invalid Access
<?php } ?>