 <?php include_once("case_view_header.php");?>
<?php
     if (isset($_GET['sa'])) {
         include_once($_GET['sa'].".php");
     } else {
 ?> 
<div class="card">
 <div class="card-header">
    <div class="media">
        <h5 style="margin-top:5px">Case Summary</h5>
        <div class="media-body text-end">
            <div class="btn btn-primary"  > <i data-feather="plus-square"></i>Add New</div>
        </div>
    </div>
    </div>

    <div class="card-body file-manager">
        
    </div>
</div>
<div class="card">
    <div class="card-body file-manager">
        <h5 class="mb-3">Client Information</h5>
        <h6>Recently opened files</h6>
    </div>
</div>
<div class="card">
    <div class="card-body file-manager">
        <h5 class="mb-3">Hiring Information</h5>
        <h6>Recently opened files</h6>
    </div>
</div>

<?php } ?>

<?php include_once("case_view_footer.php");?>