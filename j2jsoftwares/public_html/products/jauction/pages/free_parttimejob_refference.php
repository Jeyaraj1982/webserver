 <?php include_once("pages/pj/header.php");?>
<table>
    <tr>
        <td width="760">
        <?php
        $d = explode("-",$_REQUEST['refference']);
        $usrD  = $mysql->select("select * from _clients where userlink='".$_REQUEST['refference']."'");
        
        
        if (sizeof($usrD)>=0) {
            $_SESSION['refference']=$usrD[0]['id'];        
        } else {
            $_SESSION['refference']=0;
        }
    
?>
<p align="center">
    Please wait ... 
</p>
<script>setTimeout("location.href='http://www.dealmaass.in/p/free_parttimejob_register';",1500);</script>
                 
                                                                      
</td>
<td valign="top">
           <?php include("pages/pj/rightside.php");?>
</td>
</tr>
</table>