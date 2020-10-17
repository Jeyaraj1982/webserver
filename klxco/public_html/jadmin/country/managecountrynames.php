<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
    <?php
        $obj = new CommonController();
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
        $i=1;
    ?>
    <div class="titleBar" style="text-align: center;font-size:20px;padding:10px">List of Country Names</div>
    <table border="1" cellpadding="3" cellspacing="0" align="center" style="font-family:arial;font-size:15px;">
        <tr style="background:#ccc;">
            <td style="padding-left:10px;text-align:left;">No</td>
            <td style="padding-left:10px;text-align:left;width:150px">Country Names</td>
            <td style="padding-right:10px;text-align:right">State Names</td>
            <td style="padding-right:10px;text-align:right">District Names</td>
            <td style="padding-right:10px;text-align:right">City Names</td>
        </tr>
    <?php
        $data = $mysql->select("select * from _jcountrynames order by countryname");
        foreach($data as $d) {
            $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
            $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
            $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
    ?>
        <tr>
            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="managestatenames.php?countryid=<?php echo $d['countryid'];?>" target="rpanel"><?php echo $d['countryname'];?></a></td>
            <td style="padding-right:10px;text-align:right"><?php echo $statenames[0]['cnt'];?></td>
            <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>
        </tr>
       <?php $i++; } ?>         
    </table> 
</body>