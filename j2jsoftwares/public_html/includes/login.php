<?php
    if (isset($_POST['loginBtn'])) {   
        $data = $accounts->select("select * from _customers where CusEmail='".$_POST['jemail']."' and CusPassword='".$_POST['jpassword']."'");
          
        if (sizeof($data)>0) {
            $loginReference=md5(time."j2j".$data[0]['CustomerID']);
            $accounts->insert("_customers_login_logs",array("CustomerID"=>$data[0]['CustomerID'],
                                                         "LoggedOn"=>date("Y-m-d H:i:s"),
                                                         "SessionUpdate"=>"0",
                                                         "LoginReference"=>$loginReference));
            echo "<script>location.href='https://accounts.j2jsoftwaresolutions.com/?loginid=".$loginReference."';</script>";
        } else {
            $errormsg = "Invalid login details";
        }
        
    }
?>
<div id="main-categories" class="section buckets">
    <div class="w-container">
        <div class="w-dyn-list">
            <div class="category-list w-clearfix w-dyn-items w-row">
                <div class="largecategory-wrapper w-dyn-item w-col w-col-12" style="margin:0px auto">
                    <div class="category-text" style="color:#555;text-align:left;text-transform:none;">
                        <div class="row" style="margin-bottom:25px;">
                            <div class="col-sm-12" style="text-align: center;">
                                <h4 class="heading-text" style="text-transform:none;width:100%;text-align:center">Customer Login</h4>
                            </div>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                 <div class="col-sm-4">
                                    <?php if (isset($errormsg)) {?>
                                         <div class="row" style="margin-bottom:10px;">
                                            <div class="col-sm-12">
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-weight:normal">
                                                    <?php echo $errormsg;?>.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="font-size:18px">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                         </div>
                                    <?php } ?>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-sm-12">
                                            <label>Email Address</label>    
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['jemail']) ? $_POST['jemail'] : "";?>" name="jemail" id="jemail" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-sm-12">
                                            <label>Password</label>    
                                            <input type="password" class="form-control" value="<?php echo isset($_POST['jpassword']) ? $_POST['jpassword'] : "";?>" name="jpassword" id="jpassword" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-sm-12">
                                            <input type="submit" name="loginBtn" class="btn btn-primary btn-sm" value="   Login   ">
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                 </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>