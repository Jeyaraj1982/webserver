<?php
    session_start();
    include_once("../config.php");
    if (!(isset($_SESSION['islogged']) && $_SESSION['islogged'])) {
        echo "<script>alert('Session expired');location.href='index.php';</script>";
    }
    
    function successMessage($message) {
        return "<div style='margin: 5px; padding: 6px 14px; background: rgb(232, 255, 232) none repeat scroll 0px 0px; border: 1px solid rgb(144, 238, 144); color: rgb(71, 198, 71);font-weight:bold'>".$message."</div>";
    }
    
    function errorMessage($message) {
        return "<div style='margin: 5px; padding: 6px 14px; background:#FFE5E5 none repeat scroll 0px 0px; border: 1px solid #F7605D; color:#F7605D;font-weight:bold'>".$message."</div>";
    }
    if ($_REQUEST['to']=="logout") {
      unset($_SESSION['islogged']);
      sleep(3);
      unset($_SESSION);
      sleep(3);
      echo "<script>location.href='index.php';</script>";
    }
?>
<style>
    div,table,li,ul,td,a,span {font-size:13px;font-family:'Trebuchet MS'}
    body{margin:0px } 
    .hlink {color:#fff;font-weight:bold;text-decoration: none;}
    .hlink:hover{text-decoration: underline;}
    input[type="text"],select,textarea {background:#fff;border:1px solid #FF8E9F;padding:5px;font-size:13px;font-family:'Trebuchet MS';color:#666}
    .submitBtn{cursor:pointer;border:none;background:#F32847;color:#fff;font-size:13px;font-family:'Trebuchet MS';font-weight:bold;padding:5px 10px}
    .submitBtn:hover{background:#EA5268}
    h2{background:#F32847;padding:10px;color:#fff;font-size:15px;margin:0px;margin-bottom:10px;}
    .delete {text-decoration:none;color:#444}
    .deletedisable{color:#ccc}
    .delete:hover{text-decoration: underline;color:#222}
    .listhref {text-decoration: none;color:#F32847}
    .listhref:hover {text-decoration:none;}
</style>
<title>Raiyan Clothing</title>
<table style="width:100%;height:100%;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="width:180px;background:#F32847;vertical-align: top;;padding:5px;">
        <div style="background:#fff;padding:10px"><img src="../images/logo.png" style="width:160px"></div>
            <ul>
                <li style="color:#fff;font-weight:bold;text-decoration: none;">Banner
                    <ul>
                        <li><a class="hlink" href="dashboard.php?to=new_banner">New</a></li>
                        <li><a class="hlink" href="dashboard.php?to=list_banners">List All</a></li>
                    </ul>
                </li> 
                
                <li style="color:#fff;font-weight:bold;text-decoration: none;">Sub Category
                    <ul>
                        <li><a class="hlink" href="dashboard.php?to=new_sc">New</a></li>
                        <li><a class="hlink" href="dashboard.php?to=list_sc">List All</a></li>
                    </ul>
                </li>
                
                <li style="color:#fff;font-weight:bold;text-decoration: none;">Brand Name
                    <ul>
                        <li><a class="hlink" href="dashboard.php?to=new_brand">New</a></li>
                        <li><a class="hlink" href="dashboard.php?to=list_brands">List All</a></li>
                    </ul>
                </li>
                
                <li style="color:#fff;font-weight:bold;text-decoration: none;">Products
                    <ul>
                        <li><a class="hlink" href="dashboard.php?to=new_product&mc=1">New</a></li>
                        <li><a class="hlink" href="dashboard.php?to=list_products">List All</a></li>
                    </ul>
                </li>
                <li style="color:#fff;font-weight:bold;text-decoration: none;">
                    <a class="hlink" href="dashboard.php?to=logout">Logout</a>
                </li>               
            </ul>
        
        </td>
        <td style="vertical-align: top;">
        <?php
            if (isset($_REQUEST['to'])) {
                include_once($_REQUEST['to'].".php");
            }
        ?>
        </td>
    
    </tr>

</table>