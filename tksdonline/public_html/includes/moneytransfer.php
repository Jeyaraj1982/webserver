<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Money Transfer</h5>
</div> 
<div class="row">
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="javascript:void(0)" onclick="doSelectIMPS()" class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="assets/img/logo_moneytransfer.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>IMPS
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=moneytranser_tobank_neft" class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="assets/img/logo_moneytransfer.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>NEFT
        </a>
    </div>
</div> 

<div class="modal fade" id="usingIMPS" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                     <a href="dashboard.php?action=moneytranser_tobank" class="btn btn-success  glow w-100 position-relative">New Transfer</a>
                </div>
                <div class="form-group">
                    <a href="dashboard.php?action=moneytranser_beneficiary" class="btn btn-success  glow w-100 position-relative">From Benfichery</a>
                </div>
                <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </div>
        </div>
    </div>
</div>  

<script>
function doSelectIMPS() {
        $('#usingIMPS').modal("show");
}
</script>     