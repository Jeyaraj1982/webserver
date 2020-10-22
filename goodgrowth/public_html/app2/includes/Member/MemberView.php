<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           Member Information
        </div>
        <div class="panel-body list">
        <?php $member = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."'"); ?>
            <div class="from-group row">
                <label class="col-sm-2 control-label">Member Code</label>
                <div class="col-sm-9"><?php echo $member[0]['MemberCode'];?></div>
            </div>
            <div class="from-group row">
                <label class="col-sm-2 control-label">Member Name</label>
                <div class="col-sm-9"><?php echo $member[0]['FirstName'];?></div>
            </div>
            <div class="from-group row">
                <label class="col-sm-2 control-label">Nick Name</label>
                <div class="col-sm-9"><?php echo $member[0]['NickName'];?></div>
            </div>
            <div class="from-group row" >
                <label class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-9"><?php echo $member[0]['Sex'];?></div>
            </div>
            <div class="from-group row">
                <label class="col-sm-2 control-label">Plan</label>
                <div class="col-sm-9"><?php echo $member[0]['PlanString'];?></div>
            </div>
        </div>
     </div>
</div>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd",
    
    });
    
  } );
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script> 
  
   