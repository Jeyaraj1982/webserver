<?php 
    $response = $webservice->getData("Franchisee","ViewMemberOrderInvoiceReceiptDetails");
    $Invoice=$response['data']['Invoice'];
    $Plans= $response['data']['InvoicePlan']; ?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
               <h4 class="card-title">View Invoice</h4>
       <div style="width:770px;border:1px solid #737373;padding: 10px 20px;">
                                    <div class="from-group row" style="margin-bottom: -10px;">
                                        <label class="col-sm-6 col-form-label" style="color:#737373;">Invoice To&nbsp;</label>
                                        <label class="col-sm-6 col-form-label" style="color:#737373;text-align: right">Invoice Details&nbsp;</label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label" style="color:#737373;">
                                            <?php echo $Invoice['MemberName'];?><br><br>
                                            Email  :&nbsp;<?php echo $Invoice['EmailID'];?><br><br>
                                            Mobile :&nbsp;<?php echo $Invoice['MobileNumber'];?>
                                        </label>
                                        <label class="col-sm-6 col-form-label" style="color:#737373;text-align: right">
                                            Invoice #&nbsp;:&nbsp;<?php echo $Invoice['InvoiceNumber'];?><br><br>
                                            Invoice Date&nbsp;:&nbsp;<?php echo $Invoice['InvoiceDate'];?><br>
                                        </label>
                                    </div>
                                    <hr style="margin-right: -22px;margin-left: -19px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Sl No</td>
                                                <td>Particulars</td>
                                                <td>Qty</td>
                                                <td>Amount</td>
                                            </tr>
                                        </thead>
                                         <tbody>
                                         <?php foreach($Plans as $Plan) {?>
                                            <tr>
                                                <td>1</td>
                                                <td><?php echo "Membership Upgrade to ".$Plan['PlanName'];?><br><?php echo $Oreders['Description'];?></td>
                                                <td>1</td>
                                                <td style="text-align: right"><?php echo number_format($Plan['Amount'],2);?></td>
                                            </tr>
                                         <?php } ?>
                                         <tr>
                                            <td colspan="3" style="text-align:right">Total</td>
                                            <td style="text-align:right"><?php echo number_format($Plans[0]['Amount'],2);?></td>
                                         </tr>
                                         </tbody>
                                    </table>
                                </div>
        <div class="form-group row">                                                                                                                                                                                             
            <label class="col-sm-6 col-form-label"><a href="<?php echo GetUrl("Members/ManageInvoices");?>">List Of Invoices</a></label>
            <div class="col-sm-4 col-form-label" style="text-align: right">
                <a href="<?php echo GetUrl("FranchiseeInvoice/".$Invoice['InvoiceNumber'].".htm");?>" data-toggle="tooltip" title="Print Order information" target="_blank"><i class="menu-icon mdi mdi-printer" style="font-size: 15px;color: purple;"></i><label style="background:none;cursor:pointer">Print</label></a> &nbsp;&nbsp;
                <a href="<?php echo GetUrl("DownloadFranchiseeInvoice/".$Invoice['InvoiceNumber'].".pdf");?>"><i class="menu-icon mdi mdi-download" style="font-size: 15px;color: purple;"></i><label style="background:none;cursor:pointer">Download</label></a> </div>                                              
        </div>
            </div>
        </div>
    </div>
   