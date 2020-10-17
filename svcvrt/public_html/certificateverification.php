<?php $isISO=true; ?>
<?php include_once("header.php"); ?>
<div class="w3-row">
    <div class="w3-container w3-threequarter" style="color:#444;padding-top:10px;text-align:justify">
        <h2>Online Certificate Verification</h2><br>
        <form action="" method="post">
        <?php
            if (isset($_POST['btnVerify'])) {
                
             include_once("tncvrt/config.php");
             $dob = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
             $data = $mysql->select("select * from `_tbl_upload_certificates` where date(DateOfBirth)=date('".$dob."') and RegisterNumber='".$_POST['CNumber']."'");
             //echo "select * from `_tbl_upload_certificates` where RegisterNumber='".$_POST['CNumber']."'";
             if (sizeof($data)>0) {
                 $mysql->insert("_tblHistory",array("RegisterNumber"=>$_POST['CNumber'],"ViewedOn"=>date("Y-m-d H:i:s")));
                ?>
                <table>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $data[0]['Name'];?></td>
                    </tr>
                     <tr>
                        <td>Register Number</td>
                        <td><?php echo $data[0]['RegisterNumber'];?></td>
                    </tr>  
                    <tr>
                        <td><br><br></td>
                    </tr>
                    <tr>
                        <td><a href="tncvrt/uploads/<?php echo $data[0]['FileName'];?>" target="blank" style="color:green">Click here to view</a></td>
                    </tr>
                </table>
                <style>
                #tb{display:none};
                </style>
                <?php
             } else {    
                $error_message = "Incorrect register number or date of birth";
            }
            }
        ?>
        <table id="tb">
            <tr>
                <td>Register Number</td>
            </tr>
            <tr>
                <td><input type="text" name="CNumber" style="width:210px" value="<?php echo isset($_POST['CNumber']) ? $_POST['CNumber'] : "";?>" ></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
            </tr>
            <tr>
                <td>
                    <select name="date">
                        <option value="01" <?php echo ($_POST['date']==1) ? " selected='selected' " : "";?> >01</option>
                        <option value="02" <?php echo ($_POST['date']==2) ? " selected='selected' " : "";?> >02</option>
                        <option value="03" <?php echo ($_POST['date']==3) ? " selected='selected' " : "";?> >03</option>
                        <option value="04" <?php echo ($_POST['date']==4) ? " selected='selected' " : "";?> >04</option>
                        <option value="05" <?php echo ($_POST['date']==5) ? " selected='selected' " : "";?> >05</option>
                        <option value="06" <?php echo ($_POST['date']==6) ? " selected='selected' " : "";?> >06</option>
                        <option value="07" <?php echo ($_POST['date']==7) ? " selected='selected' " : "";?> >07</option>
                        <option value="08" <?php echo ($_POST['date']==8) ? " selected='selected' " : "";?> >08</option>
                        <option value="09" <?php echo ($_POST['date']==9) ? " selected='selected' " : "";?> >09</option>
                        <option value="10" <?php echo ($_POST['date']==10) ? " selected='selected' " : "";?> >10</option>
                        <option value="11" <?php echo ($_POST['date']==11) ? " selected='selected' " : "";?> >11</option>
                        <option value="12" <?php echo ($_POST['date']==12) ? " selected='selected' " : "";?> >12</option>
                        <option value="13" <?php echo ($_POST['date']==13) ? " selected='selected' " : "";?> >13</option>
                        <option value="14" <?php echo ($_POST['date']==14) ? " selected='selected' " : "";?> >14</option>
                        <option value="15" <?php echo ($_POST['date']==15) ? " selected='selected' " : "";?> >15</option>
                        <option value="16" <?php echo ($_POST['date']==16) ? " selected='selected' " : "";?> >16</option>
                        <option value="17" <?php echo ($_POST['date']==17) ? " selected='selected' " : "";?> >17</option>
                        <option value="18" <?php echo ($_POST['date']==18) ? " selected='selected' " : "";?> >18</option>
                        <option value="19" <?php echo ($_POST['date']==19) ? " selected='selected' " : "";?> >19</option>
                        <option value="20" <?php echo ($_POST['date']==20) ? " selected='selected' " : "";?> >20</option>
                        <option value="21" <?php echo ($_POST['date']==21) ? " selected='selected' " : "";?> >21</option>
                        <option value="22" <?php echo ($_POST['date']==22) ? " selected='selected' " : "";?> >22</option>
                        <option value="23" <?php echo ($_POST['date']==23) ? " selected='selected' " : "";?> >23</option>
                        <option value="24" <?php echo ($_POST['date']==24) ? " selected='selected' " : "";?> >24</option>
                        <option value="25" <?php echo ($_POST['date']==25) ? " selected='selected' " : "";?> >25</option>
                        <option value="26" <?php echo ($_POST['date']==26) ? " selected='selected' " : "";?> >26</option>
                        <option value="27" <?php echo ($_POST['date']==27) ? " selected='selected' " : "";?> >27</option>
                        <option value="28" <?php echo ($_POST['date']==28) ? " selected='selected' " : "";?> >28</option>
                        <option value="29" <?php echo ($_POST['date']==29) ? " selected='selected' " : "";?> >29</option>
                        <option value="30" <?php echo ($_POST['date']==30) ? " selected='selected' " : "";?> >30</option>
                        <option value="31" <?php echo ($_POST['date']==31) ? " selected='selected' " : "";?> >31</option>
                    </select>
                    -
                     <select name="month">
                        <option value="01" <?php echo ($_POST['month']==1) ? " selected='selected' " : "";?> >JAN</option>
                        <option value="02" <?php echo ($_POST['month']==2) ? " selected='selected' " : "";?> >FEB</option>
                        <option value="03" <?php echo ($_POST['month']==3) ? " selected='selected' " : "";?> >MAR</option>
                        <option value="04" <?php echo ($_POST['month']==4) ? " selected='selected' " : "";?> >APR</option>
                        <option value="05" <?php echo ($_POST['month']==5) ? " selected='selected' " : "";?> >MAY</option>
                        <option value="06" <?php echo ($_POST['month']==6) ? " selected='selected' " : "";?> >JUN</option>
                        <option value="07" <?php echo ($_POST['month']==7) ? " selected='selected' " : "";?> >JLY</option>
                        <option value="08" <?php echo ($_POST['month']==8) ? " selected='selected' " : "";?> > AUG</option>
                        <option value="09" <?php echo ($_POST['month']==9) ? " selected='selected' " : "";?> >SEP</option>
                        <option value="10" <?php echo ($_POST['month']==10) ? " selected='selected' " : "";?> >OCT</option>
                        <option value="11" <?php echo ($_POST['month']==11) ? " selected='selected' " : "";?> >NOV</option>
                        <option value="12" <?php echo ($_POST['month']==12) ? " selected='selected' " : "";?> >DEC</option>
                    </select>
                    -
                    <select name="year">
                        <?php for($i=date("Y")-60;$i<date("Y")-15;$i++) {?>
                                <option value="<?php echo $i;?>" <?php echo ($_POST['year']==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="submit" name="btnVerify" value="View Certificate"></td>
            </tr>
            <?php
                if (isset($error_message )) {
                    ?>
                    <tr>
                        <td style="color:red"><?php echo $error_message ;?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        </form>
    </div>
    <div class="w3-container w3-quarter">
        <?php include_once("latestnews.php");?>
    </div>
</div>      
<?php include_once("footer.php");?>