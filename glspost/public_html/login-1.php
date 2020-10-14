<?php 
 
    include_once("header.php");
   
      
    if (isset($_SESSION['User']) && $_SESSION['User']['MemberID']>0) {    
            echo "<script>location.href='app/dashboard.php';</script>";
        } 
        if (isset($_POST['btnLogin'])) {
            $data=$mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_POST['MemberCode']."' and `MemberPassword`='".$_POST['Password']."'");
            if (sizeof($data)>0) {
                   $data[0]['Role']="Member";
                $data[0]['PackageIcon']=$package[0]['FileName'];
                  $_SESSION['User']=$data[0];
                  echo "<script>location.href='app/dashboard.php';</script>";
            } else {                               
                $error = "Invalid username or password";
            }
        }
    ?>
     <div class="content">
<div class="wrap">

<h6>Business Plan</h6>   
         <div class="one_half ">  
       <form action="" method="post" >
                                    <p style="text-transform: none;">Member Code<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="MemberCode" id="MemberCode" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required wpcf7-not-valid" style="border:1px solid #888;width:100%" aria-required="true" aria-invalid="false"  Placeholder="Member Code Here..." >
                                            <span class="errorstring" id="ErrMemberCode"><?php echo isset($ErrMemberCode)? $ErrMemberCode : "";?></span>
                                        </span> 
                                    </p>
                                    <p style="text-transform: none;">Password<br />
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="password" name="Password" id="Password" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required wpcf7-not-valid" style="border:1px solid #888;width:100%"  aria-required="true" aria-invalid="false"   Placeholder="Password Here..." >
                                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                        </span> 
                                    </p>
                                     <p style="color:red"><?php echo $error;?></p>
                                    <p><input type="submit" name="btnLogin" class="wpcf7-form-control wpcf7-submit" value="Login"></p>
                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                </form>
       </div>
         <div class="one_half last">
         </div>
         <div class="clear"></div>
                            
     </div>
     </div>
 

<?php include_once("footer.php");?>