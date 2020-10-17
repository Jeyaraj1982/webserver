<?php include_once("../../config.php"); ?>
  <style>
 .mytd {border:1px solid #f1f1f1;padding:3px;color:#444}
 .mytd form{height:0px;}
 .mytdhead{font-weight:bold;text-align:center;color:#222;background:#ccc;padding:5px;font-size:12px;}
 .trodd{background:#fff;}
 .treven{background:#f6f6f6}
 .trodd:hover{background:#e9e9e9;cursor:pointer}
 .treven:hover{background:#e9e9e9;cursor:pointer}
</style>

 <body style="margin:0px;">
    
<?php 
    
    
    if (isset($_POST['deleteBtn'])) {
        $mysql->execute("update _tbl_featured set ispublish='0' where featureadid='".$_POST['fid']."'");
        echo "<script>alert('Feature ad deleted');</script>";
    }                                                 
    if (isset($_GET['f']) && $_GET['f']=="a") {
          $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1' and jad.distcid='".$_SESSION['USER']['DistrictID']."' and date(fad.enddate)>=date('".date("Y-m-d")."') ORDER BY fad.featureadid desc");
         
          
          $title = "Active Ads";
    } elseif (isset($_GET['f']) && $_GET['f']=="e") {
         $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='1'  and jad.distcid='".$_SESSION['USER']['DistrictID']."' and  date(fad.enddate)<date('".date("Y-m-d")."')   ORDER BY fad.featureadid desc");
         $title = "Expire Ads";
     } elseif (isset($_GET['f']) && $_GET['f']=="d") {
         $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid where fad.ispublish='0'  and jad.distcid='".$_SESSION['USER']['DistrictID']."' ORDER BY fad.featureadid desc");
         $title = "Deleted Ads";
    } else {
        $data = $mysql->select("SELECT * FROM _tbl_featured AS fad LEFT JOIN _jpostads AS jad ON fad.adid=jad.postadid  where jad.distcid='".$_SESSION['USER']['DistrictID']."' ORDER BY fad.featureadid desc");    
        $title = "All Ads";
        $_GET['f']='all';                                                                                                                                 
    }
    
?>
<div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>List of <?php echo $title;?></div>
    <table cellspacing='0' cellspadding='3' style="margin:10px;width:100%;font-size:12px;font-family:'Trebuchet MS';">
        <tr>
            <td class="mytdhead" style="width:50px;">Ad ID</td>
            <td class="mytdhead" style="width:120px;">Created</td>
            <td class="mytdhead" style="">Title</td>
            <td class="mytdhead" style="width:60px;">Start Date</td>
            <td class="mytdhead" style="width:60px;">End Date</td>
            <td class="mytdhead" style="width:50px;">Duration</td>
            <td class="mytdhead" style="width:50px;">Amount</td>
            <td class="mytdhead" style="width:110px;">Publish To</td>
            <td class="mytdhead" style="width:50px">Category</td>
            <?php
                   if ($_GET['f']=='all' || $_GET['f']=='a') {
                       ?>
                       <td> </td>
                       <?php
                   }
               ?>
        </tr> <?php
        foreach($data as $r){   
        if ($r['distcid']=$_SESSION['USER']['DistrictID']) {
   ?> 
         <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
               <td class="mytd"><?php echo $r["adid"];?></td>
               <td class="mytd"><?php echo $r["createdon"];?></td>
               <td class="mytd"><?php echo $r["title"];?></td>
               <td class="mytd"><?php echo date("Y-m-d",strtotime($r["startdate"]));?></td>
               <td class="mytd"><?php echo date("Y-m-d",strtotime($r["enddate"]));?></td> 
               <td class="mytd"><?php echo $r["duration"];?></td> 
               <td class="mytd"><?php echo $r["faamount"];?></td> 
               <td class="mytd"><?php echo $r["countryname"];?>, <?php echo $r["statename"];?>, <?php echo $r["districtname"];?></td> 
               <td class="mytd"><?php echo $r["categoryname"];?>, <?php echo $r["subcategoryname"];?></td> 
           
         </tr>
         <?php
        }
         }
     echo"</table>"
   ?>
    

</body>
