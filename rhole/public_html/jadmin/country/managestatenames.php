<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
    <?php
        $obj = new CommonController();
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
        $i=1;
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $data = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' order by statenames");
    ?>
    <div class="titleBar" style="text-align: center;font-size:20px;padding:10px">List of State Names (<?php echo $country[0]['countryname'];?>)</div>
    <table border="1" cellpadding="3" cellspacing="0" align="center" style="font-family:arial;font-size:15px;">
        <tr style="background:#ccc;">
            <td style="padding-left:10px;text-align:left;">No</td>
            <td style="padding-left:10px;text-align:left;width:250px">State Names</td>
            <td style="padding-right:10px;text-align:right">District Names</td>
            <td style="padding-right:10px;text-align:right">City Names</td>
        </tr>
        <?php
            foreach($data as $d) {
                $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where stateid='".$d['stateid']."'");
                $citynames = $mysql->select("select count(*) as cnt from _jcitynames where stateid='".$d['stateid']."'");
        ?>
        <tr>
            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="managedistrictnames.php?countryid=<?php echo $country[0]['countryid'];?>&stateid=<?php echo $d['stateid'];?>" target="rpanel"><?php echo $d['statenames'];?></a></td>
            <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>
        </tr>
        <?php $i++; } ?>         
   </table> 
</body>