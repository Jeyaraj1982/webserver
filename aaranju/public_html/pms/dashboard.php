<?php
include_once("config.php");
if ($_SESSION['User']['UserID']>0) {
    
} else {
    echo "<script>alert('session may be expired');location.href='index.php';</script>";
}
?>

<?php
function getTotalTimeWorked($TaskID) {
    global $mysql;
    $works = $mysql->select("select * from _tblPStakeHolderTaskItems where IsActive=1 and TaskID='".$TaskID."' order by TaskID desc ");
    $hrs = 0;
    $min = 0;
    foreach($works as $w) {
        $hrs += $w['Hrs'];
        $min += $w['Mins'];
    }
    if ($min<=55) {
        return $hrs." : ". (strlen($min)==1 ? "0".$min : $min);
    } else {
        $newhrs = floor($min / 60);
        $newmin = $min - ($newhrs * 60);
         return ($hrs+$newhrs)." : ". (strlen($newmin)==1 ? "0".$newmin : $newmin);
    }
}
                                                                                  
   
?>

<style>
div,span { }
    .mnu {text-decoration: none;color:#222}
    .mnu:hover {text-decoration: underline;color:#444}
    input[type="text"] {padding:4px;}
</style>
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
<style>
    span, div, td, tr, p, ul, li, a {font-family:'Titillium Web'}
    a {color:#D83908;text-decoration: none;}
    a:hover {text-decoration:underline;}
</style>
  <script src="assets/jquery.min.js" type="text/javascript"></script>

   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
   <style>
   input[type="text"] {font-family:'Titillium Web';padding:5px;border:1px solid #ccc;padding-left:10px}
   input[type="password"] {font-family:'Titillium Web';padding:5px;border:1px solid #ccc;padding-left:10px}
   select,textarea {font-family:'Titillium Web';padding:5px;border:1px solid #ccc;padding-left:10px}
input[type="submit"] {-moz-box-shadow:inset 0px 1px 0px 0px #cf866c;-webkit-box-shadow:inset 0px 1px 0px 0px #cf866c;box-shadow:inset 0px 1px 0px 0px #cf866c;background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d0451b), color-stop(1, #bc3315));background:-moz-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-webkit-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-o-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-ms-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:linear-gradient(to bottom, #d0451b 5%, #bc3315 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d0451b', endColorstr='#bc3315',GradientType=0);background-color:#d0451b;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;border:1px solid #942911;display:inline-block;cursor:pointer;color:#ffffff;font-family:Arial;font-size:12px;padding:2px 24px 3px;text-decoration:none;text-shadow:0px 1px 0px #854629;}
input[type="submit"]:hover {background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc3315), color-stop(1, #d0451b));background:-moz-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-webkit-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-o-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-ms-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:linear-gradient(to bottom, #bc3315 5%, #d0451b 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc3315', endColorstr='#d0451b',GradientType=0);background-color:#bc3315;}
input[type="submit"]:active {position:relative;top:1px;}  
legend {color:#00B24F;font-size:15px}
.attachments {float:left;border:1px solid #ccc;margin-left:10px;text-align:center;padding:10px;}
.attachments:hover {background:#f1f1f1;border:1px solid #888}
</style>
<?php
    if (!(isset($_GET['action']))) {
      // $_GET['action']="listAIssue"; 
    }
?>
<body style="margin:0px;background:#999">
     <div style="width:1320px;margin:0px auto;background:#386FC7;color:#fff;padding:10px;text-align:right">
      
            <?php echo ucfirst($_SESSION['User']['EmployeeName']);?>, &nbsp;
            <a href="dashboard.php?action=logout" class="mnu" style="color:#fff">Logout</a> 
        </div>
        <div style="width:1320px;margin:0px auto;background:#f1f1f1;color:#555;padding:10px">
    <?php if ($_SESSION['User']['IsTester']==1 || $_SESSION['User']['IsDeveloper']==1 || $_SESSION['User']['IsStakeHolder']==1) {?>
        
            <table cellpadding="0" cellspacing="0" style="width:100%;" >
              <tr>
                    <td colspan="3" style="text-align: center;background: #ccc;">Issue fix Process</td>
                    <td style="width:10px"></td>
                    <td colspan="2" style="text-align: center;background: #ccc;">Prototypes</td>
                    <td style="width:10px"></td>
                    <td colspan="2" style="text-align: center;background: #ccc;">Developer Process</td>
                    <td style="width:10px"></td>
                    <td colspan="2" style="text-align: center;background: #ccc;">Stake Holder Process</td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="listAIssue") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listAIssue" class="mnu">All issues</a></td>
                    <td style="width:100px;text-align:center;<?php echo (isset($_GET['action']) && $_GET['action']=="listIssue") ? ";background:#aaa;font-weight:bold" : ""; ?>"><a href="dashboard.php?action=listIssue" class="mnu">My list</a></td>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="newIssue") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=newIssue" class="mnu">Add issue</a></td>
                    <td></td>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="listPrototypes" || $_GET['action']=="listPrototypes")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listPrototypes" class="mnu">All Lists</a></td>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="newPrototype" || $_GET['action']=="newPrototype")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=newPrototype" class="mnu">Create</a></td>
                    <td></td>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="listAllTasks" || $_GET['action']=="listAllTasks")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listAllTasks" class="mnu">All Tasks</a></td>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="listMylTasks" || $_GET['action']=="listMylTasks")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listMylTasks" class="mnu">My Tasks</a></td>
                    <td></td>
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="StakeHolder/MyTasks") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=StakeHolder/MyTasks" class="mnu">My Tasks</a></td>
                    <td style="width:100px;text-align:center;<?php echo (isset($_GET['action']) && $_GET['action']=="StakeHolder/CreatTask") ? ";background:#aaa;font-weight:bold" : ""; ?>"><a href="dashboard.php?action=StakeHolder/CreatTask" class="mnu">Create Task</a></td>
                  
                  
                   <!-- <td> <a href="dashboard.php?action=listIssue" class="mnu">List issues</a></td>-->
                    <td style="text-align: right;"> </td>
                </tr>
            </table>
         
   <?php } ?>
    
    <?php if ($_SESSION['User']['IsAdmin']==1) {?>
        
         <table cellpadding="0" cellspacing="0" style="width:100%;" >
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="4" style="text-align: center;background: #ccc;">Developer Process</td>
                    <td style="width:10px"></td>
                    <td colspan="3" style="text-align: center;background: #ccc;">Stake Holder Process</td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td style="width:120px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="listAIssue") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listAIssue" class="mnu"> All issues</a></td>
                    <td style="width:120px;text-align:center;<?php echo (isset($_GET['action']) && $_GET['action']=="listIssue") ? ";background:#aaa;font-weight:bold" : ""; ?>"><a href="dashboard.php?action=listIssue" class="mnu">My list</a></td>
                    <td style="width:120px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="listAUsers") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listAUsers" class="mnu">List Users</a></td>
                    
                    <td style="width:120px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="newIssue") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=newIssue" class="mnu">Add issue</a></td>
                    <td style="width:120px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="listPrototypes" || $_GET['action']=="newPrototype")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listPrototypes" class="mnu">Prototypes</a></td>
                    
                    <td style="width:120px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="listPrototypes" || $_GET['action']=="newPrototype")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listMylTasks" class="mnu">My Tasks</a></td>
                    <td style="width:120px;text-align:center;;<?php echo (isset($_GET['action']) && ($_GET['action']=="listPrototypes" || $_GET['action']=="newPrototype")) ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=listAllTasks" class="mnu">All Tasks</a></td>
                    
                    <td style="width:10px"></td>
                    
                    <td style="width:100px;text-align:center;;<?php echo (isset($_GET['action']) && $_GET['action']=="StakeHolder/MyTasks") ? ";background:#aaa;font-weight:bold" : ""; ?>" ><a href="dashboard.php?action=StakeHolder/MyTasks" class="mnu">My Tasks</a></td>
                    <td style="width:100px;text-align:center;<?php echo (isset($_GET['action']) && $_GET['action']=="StakeHolder/CreatTask") ? ";background:#aaa;font-weight:bold" : ""; ?>"><a href="dashboard.php?action=StakeHolder/CreatTask" class="mnu">New Task</a></td>
                    <td style="width:100px;text-align:center;<?php echo (isset($_GET['action']) && $_GET['action']=="StakeHolder/AllTasks") ? ";background:#aaa;font-weight:bold" : ""; ?>"><a href="dashboard.php?action=StakeHolder/AllTasks" class="mnu">All Tasks</a></td>
                    
                    
                    <td style="text-align: right;">Role: Administrator</td>
                </tr>
            </table>
      
   <?php } ?>
 
     </div>
   <div style="width:1340px;margin:0px auto;padding-top:20;background:#fff;min-height:800px;">
<?php

    if (isset($_GET['action'])) {
        
        include_once("includes/".$_GET['action'].".php");
        
    } else {                     
          
       include_once("includes/listAIssue.php"); 
       
         
    }
?>
</div>
</body>