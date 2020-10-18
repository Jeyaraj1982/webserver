<?php include_once("header.php"); ?>

<br><Br><Br><br><Br><Br><br><Br><Br>
<form action="" method="post">
    <table align="center" width="330">
	    <tr>
		    <td style="width:80px;text-align:right">E-Mail&nbsp;:&nbsp;</td>
		    <td><input type="text" name="emailid" autocomplete="off" placeholder="Registered Email ID"></td>
	    </tr>
	    <tr>
		    <td style="text-align:right">Password&nbsp;:&nbsp;</td>
		    <td><input type="Password" name="loginpassword" autocomplete="off" Placeholder="Web Login Password"></td>
	    </tr>
	    <tr>
		    <td style="text-align:right">Role&nbsp;:&nbsp;</td>
		    <td><select name="role" style="width:101px">
			        <option value="User">User</option>
			        <option value="Reseller">Reseller</option>
                 </select>
                &nbsp;&nbsp;
                <input type="submit" value="Login" class="myButton" name="loginBtn">
		    </td>
	    </tr>
	    <tr>
            <td></td>
		    <td style="color:#BD0808;"><?php echo isset($msg) ? $msg : "&nbsp;";?></td>
	    </tr>
    </table>
</form> 