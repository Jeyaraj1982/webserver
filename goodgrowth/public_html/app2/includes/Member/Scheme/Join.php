<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
          Join Our Scheme
        </div>
        <div class="panel-body list">
        <?php $products = $mysql->select("select * from _tbl_Member_Schemes"); ?>
            <?php foreach($products as $p) { ?>
            <div class="row">
                <div class="col-sm-2"><?php echo $p['SchemeName'];?></div>
                <div class="col-sm-2">Installment: <?php echo $p['Installments'];?></div>
                <div class="col-sm-2">EMI: <?php echo number_format($p['InstallmentAmount'],2);?></div>
                <div class="col-sm-2">Bonus: <?php echo number_format($p['Benefits'],2);?></div>
                <div class="col-sm-2">Maturity: <?php echo number_format($p['MaturityAmtount'],2);?></div>
                <div class="col-sm-2">
                    <form action="dashboard.php?action=Scheme/Confirm" method="post">
                    <input type="hidden" value="<?php echo $p['SchemeID'];?>" name="SchemeID">
                    <input type="submit" value="Join" name="btnSubmit" class="btn btn-outline btn-success">
                   </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12"><hr></div>
            </div>
          <?php } ?>
        </div>
    </div>
</div>


