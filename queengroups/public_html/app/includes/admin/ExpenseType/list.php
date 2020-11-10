 <?php 
    if($_GET['status']=="All"){ 
        $Expenses = $mysql->select("select * from _queen_expensetype order by ExpenseTypeID desc");
        $title="All Expense Types";
    }if($_GET['status']=="Active"){
        $Expenses = $mysql->select("select * from _queen_expensetype where IsActive='1' order by ExpenseTypeID desc");
        $title="Active Expense Types";
    }if($_GET['status']=="Deactive"){
        $Expenses = $mysql->select("select * from _queen_expensetype where IsActive='0' order by ExpenseTypeID desc");
        $title="Blocked Expense Types";
    }
?>
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Manage Expense Types
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=ExpenseType/add" class="btn btn-primary btn-xs">Add Expense Type</a><br>
                                    <a href="dashboard.php?action=ExpenseType/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=ExpenseType/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=ExpenseType/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Block</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Expense Type Code</th>
                                                <th scope="col">Expense Type</th>
                                                <?php if($_GET['status']=="All"){ ?><th scope="col">Status</th><?php } ?>
                                                <th scope="col"></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Expenses as $Expense){ ?>
                                       <tr>
                                                <td><?php echo $Expense['ExpenseTypeCode'];?></td>
                                                <td><?php echo $Expense['ExpenseType'];?></td>
                                                <?php  if($_GET['status']=="All"){ ?><td><?php if($Expense['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></td><?php } ?>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=ExpenseType/edit&id=<?php echo md5($Expense['ExpenseTypeID']);?>" draggable="false">Edit</a>
																<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Expense['ExpenseTypeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($Expenses)=="0"){ ?>
                                            <tr>
												<?php if($_GET['status']=="All"){ ?>
                                                <td style="text-align: center;" colspan="4">No Expense Types found</td>
												<?php } else { ?>
												<td style="text-align: center;" colspan="3">No Expense Types found</td>
												<?php } ?>
                                                </tr>
                                        <?php } ?> 
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(ExpenseTypeID){
    var text = '<form action="" method="POST" id="ExpenseFrm_'+ExpenseTypeID+'">'
                    +'<input type="hidden" value="'+ExpenseTypeID+'" id="ExpenseTypeID" Name="ExpenseTypeID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete expense type?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteExpenseType(\''+ExpenseTypeID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteExpenseType(ExpenseTypeID) {
     var param = $( "#ExpenseFrm_"+ExpenseTypeID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteExpenseType",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="Failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=ExpenseType/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>