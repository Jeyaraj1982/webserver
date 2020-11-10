 <?php 
    if($_GET['status']=="All"){ 
        $Expenses = $mysql->select("select * from _queen_expenses order by ExpenseID desc");
        $title="All Expenses";
    }if($_GET['status']=="Active"){
        $Expenses = $mysql->select("select * from _queen_expenses where IsActive='1' order by ExpenseID desc");
        $title="Active Expenses";
    }if($_GET['status']=="Deactive"){
        $Expenses = $mysql->select("select * from _queen_expenses where IsActive='0' order by ExpenseID desc");
        $title="Blocked Expenses";
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
                                        Manage Expenses
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Staff Name</th>
                                                <th scope="col">Expense Type</th>
                                                <th scope="col">Short Description</th>
                                                <th scope="col" style="text-align:right">Expense Amount</th>
                                                <th scope="col"></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Expenses as $Expense){ ?>
										<?php $staff = $mysql->select("select * from _queen_staffs where StaffID='".$Expense['StaffID']."'"); ?>
                                       <tr>
                                                <td><?php echo $staff[0]['StaffName'];?></td>
                                                <td><?php echo $Expense['ExpenseType'];?></td>
                                                <td><?php echo $Expense['ShortDescription'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Expense['ExpenseAmount'],2);?></td>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Expenses/edit&id=<?php echo md5($Expense['ExpenseID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Expenses/view&id=<?php echo md5($Expense['ExpenseID']);?>" draggable="false">View</a>
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="Removecallconfirmation('<?php echo $Expense['ExpenseID'];?>')" draggable="false">Remove</a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($Expenses)=="0"){ ?>
                                            <tr>
												<td style="text-align: center;" colspan="5">No Expenses found</td>
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
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='../assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function Removecallconfirmation(ExpenseID){
    var text = '<form action="" method="POST" id="ExpenseFrm_'+ExpenseID+'">'
                    +'<input type="hidden" value="'+ExpenseID+'" id="ExpenseID" Name="ExpenseID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to remove this expense?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="RemoveExpense(\''+ExpenseID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function RemoveExpense(ExpenseID) {
     var param = $( "#ExpenseFrm_"+ExpenseID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=RemoveExpense",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>