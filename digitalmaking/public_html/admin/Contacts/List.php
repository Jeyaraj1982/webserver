
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Contacts
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Contacts/Add" class="btn btn-primary btn-xs">Add Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Reference Name</th>
                                                 
                                                <th scope="col">Created On</th>
                                                <th scope="col" style="text-align: right;padding-right:0px !important"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if (isset($_POST['btnDelete'])) {
                                            $mysql->execute("update _tbl_Contacts set IsDelete='1' where ContactID='".$_POST['ContactID']."'");
                                            ?>
                                             <script>
                     $(document).ready(function () {
                         SuccessPopup('<?php echo $id;?>');
                     });
                     </script>
                                            <?php
                                        }
                                        
                                        $Contacts = $mysql->select("select * from _tbl_Contacts where IsDelete='0' order by ContactID desc");?>
                                        <?php foreach($Contacts as $Contact){ ?>
                                       
                                            <tr>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo $Contact['ReferneceName'];?></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><img src="<?php echo "../contacts/".$Contact['ContactImage'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo $Contact['CreatedOn'];?></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important">
                                                <form accept="" method="post">
                                                    <input type="hidden" value="<?php echo $Contact['ContactID'];?>" name="ContactID">
                                                    <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger btn-sm">
                                                </form>
                                                
                                                
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Contact)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Contacts Found</td>
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
    function SuccessPopup(ResumeID){
        html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>Concat Deleted<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a   data-dismiss='modal'  class='btn btn-outline-success'>Close</a></div>"; 
        
        $("#xconfrimation_text").html(html);
        $('#ConfirmationPopup').modal("show");
        
    }
</script>