<form action="<?php echo country_url;?>" id="sform" name="sform">
    <div class="row" >
        <div class="col-md-12 col-xs-6 b-r">
            <div>
                 <select class="form-control selectpicker" data-live-search="true" name="sdistrict" id="sdistrict" onchange="location.href='<?php echo country_url;?>'+$(this).val()">
                 <option value="0">India</option>
                 <?php $districtnames = $mysql->select("select * from _jdistrictnames order by districtname"); ?>
                 <?php foreach($districtnames as $dname) {?>
                    <option value="d<?php echo $dname['distcid'];?>-<?php echo $dname['districtname'];?>" <?php echo ($dname['distcid']."-".$dname['districtname']) == $_GET['location']  ? " selected='selected' " : "";?> ><?php echo $dname['districtname'];?></option>
                 <?php } ?>
                  <?php $statenames = $mysql->select("select * from _jstatenames order by statenames"); ?>
                 <?php foreach($statenames as $dname) {?>
                    <option value="s<?php echo $dname['stateid'];?>-<?php echo $dname['statenames'];?>" <?php echo ($dname['stateid']."-".$dname['statenames']) == $_GET['location']  ? " selected='selected' " : "";?> ><?php echo $dname['statenames'];?></option>
                 <?php } ?>
                   </select>
            </div>
            <div class="input-icon">
                <input type="text"  name="searchkey" id="searchkey" class="form-control"  placeholder="find cars, mobile phones and more ..." value="<?php echo isset($_GET['searchkey']) ? $_GET['searchkey'] : "";?>">
                <span class="input-icon-addon" onclick="doSearch();" style="cursor:pointer">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
    </div>
</form>
<script>
function doSearch() {
    
    
    if ($('#sdistrict').val()=="0") {
        var u = '<?php echo country_url;?>'+"q_"+$('#searchkey').val();    
    } else {
        var qstring = $('#sdistrict').val(); 
       // alert(qstring[0]);
        if (qstring[0]=="d") {
            var u = '<?php echo country_url;?>'+$('#sdistrict').val()+"/q_"+$('#searchkey').val();                
        } 
        if (qstring[0]=="s") {
            var u = '<?php echo country_url;?>'+$('#sdistrict').val()+"/q_"+$('#searchkey').val();                
        }
        
        
    }
    
    location.href=u;
    // $('#sform').attr('action',u).submit();
}
</script>
<!--

 <span class="input-icon-addon">
                    <i class="fas fa-map-marker"></i>
                </span>
                
                -->