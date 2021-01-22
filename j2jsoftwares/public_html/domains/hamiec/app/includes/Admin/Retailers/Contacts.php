<?php 
        $sql= $mysql->select("select * from `_tbl_my_contact` where md5(Concat('J!',`MemberID`))='".$_GET['d']."' order by ContactID Desc");
        $title="My Contacts";
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <?php echo $title; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>DTH Number</th>                                                                                           
                                            <th>TNEB Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $s){ ?>
                                        <tr>
                                            <td><?php echo $s['ContactName'];?></td>
                                            <td>+91-<?php echo $s['MobileNumber'];?>&nbsp;(<?php echo $s['MobileOperator'];?>)</td>
                                            <td><?php echo $s['DTHNumber'];?>&nbsp;(<?php echo $s['DTHOperator'];?>)</td>
                                            <td><?php echo $s['TNEBNumber'];?></td>
                                            <td><a href="javascript:void(0);" onclick="ViewContacts('<?php echo $s['ContactName'];?>','<?php echo $s['MobileNumber'];?>','<?php echo $s['MobileOperator'];?>','<?php echo $s['DTHNumber'];?>','<?php echo $s['DTHOperator'];?>','<?php echo $s['TNEBNumber'];?>','<?php echo $TnebRegion[$s['TNEBRegion']]; ?>')">View</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=Members/View&d=<?php echo md5("J!".$s['MemberID']);?>" id="show-signup" class="link">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script>

<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
 <script>
 function ViewContacts(Name,Mobile,MobOperator,DTH,DTHOperator,TNEB,Region) {
     var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Contact Details</h5> <br>'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="padding-left:78px;font-weight:bold;font-size:12px;">Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+Name+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group" style="margin-bottom: -14px;">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="padding-left:86px;font-weight:bold">+91</span>'
                            +'</div>'
                            +'<input type="text" value="'+Mobile+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align:left">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="font-weight:bold;font-size:12px;">Mobile Operator</span>'
                        +'</div>'
                        +'<input type="text" value="'+MobOperator+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:33px;font-weight:bold;font-size:12px;">DTH Number</span>'
                        +'</div>'    
                        +'<input type="text" value="'+DTH+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:25px;font-weight:bold;font-size:12px;">DTH Operator</span>'
                        +'</div>' 
                        +'<input type="text" value="'+DTHOperator+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-top: 4px;margin-bottom: -10px;">'
                   +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:33px;font-weight:bold;font-size:12px;">TNEB Region</span>'
                        +'</div>'
                        +'<input type="text" value="'+Region+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                   +'</div>'
                +'</div>'
                +'<div class="form-group" style="text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:28px;font-weight:bold;font-size:12px;">TNEB Number</span>'
                        +'</div>'
                        +'<input type="text" value="'+TNEB+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                    +'</div>' 
                +'</div>' 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
     $('#ConfirmationPopup').modal("show");
 }
 </script>