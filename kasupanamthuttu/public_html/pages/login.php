<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <form action="" method="post">  
                <div id="formwindow" class="formwindow">
                    <h3 style="text-align: left;font-family: arial;">Member Login</h3><br>
                    <?php
                        if (isset($loginError)) {
                            echo "<div style='color:red;font-size:13px;padding:0px 15px'>".$loginError."</div>";
                        }
                    ?>
                    <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;width: 100%;">
                        <tr>
                            <td>E-mail ID<span class="man">*</span></td>
                            <td><input type="text" name="username"  value="<?php echo $_POST['username'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                        </tr>
                        <tr>
                            <td width="150">Password <span class="man">*</span></td>
                            <td><input type="Password" name="password" value="<?php echo $_POST['password'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" class="btn btn-success" name="loginBtn" value="Partime Job Login">&nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </article>
    </div>
</div> 