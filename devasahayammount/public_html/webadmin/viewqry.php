 <html>    
    <body style="margin:0px;">
 <style>
 .mytd {border:1px solid #f1f1f1;padding:3px;color:#444}
 .mytd form{height:0px;}
 .mytdhead{font-weight:bold;text-align:center;color:#222;background:#ccc;padding:5px;font-size:12px;border:1px solid #ddd;}
 .trodd{background:#fff;}
 .treven{background:#f6f6f6}
 .trodd:hover{background:#e9e9e9;cursor:pointer}
 .treven:hover{background:#e9e9e9;cursor:pointer}
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
    <div style='font-family:"Trebuchet Ms";font-size:13px;border:1px solid #E0E0E0;background:#E0E0E0;padding:3px;font-weight:bold;color:#444;width:100%'>
        <?php
        
        include_once("../config.php");
        
          $count = 0;                     
          $page = (isset($_REQUEST['page']) && $_REQUEST['page']>0) ? $_REQUEST['page'] : 1;
          $rsperpage = 10;  
                
         switch($_REQUEST['view']) {
           
            case 'filter': 
                                $rows   = 0; 
                                if ($_POST['ftype']=="Mass Booking")  {
                                    $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' and date(dateofrequest)=date('".$_POST['filteron']."')  ORDER BY id DESC");    
                                } else if ($_POST['ftype']=="Donate")  {      
                                   $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation' and date(dateofrequest)=date('".$_POST['filteron']."')    ORDER BY id DESC"); 
                                }  else if ($_POST['ftype']=="Mass Booking and Donation")  {      
                                    $result =$mysql->select("SELECT * FROM _massbooking WHERE date(dateofrequest)=date('".$_POST['filteron']."') ORDER BY id DESC"); 
                                }
                                $title = "Filter Result : [".$_POST['ftype']."] [".$_POST['filteron']."]";
                                break;
            
            case 'masstodaypref':
                               // $timing=$mysql->select("SELECT timing FROM _massbooking WHERE id GROUP BY timing");                    
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' and date(dateofpreferred)=date('".date("Y-m-d")."') ORDER BY id DESC"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' and date(dateofpreferred)=date('".date("Y-m-d")."') group by timing ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "MassBooking (Today preferred)";
                                break;
                                 
            case 'massall'      : 
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' ORDER BY id DESC"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "MassBooking (ALL)";      
                                break;
            case 'masssuccess'  :
             
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' AND paymentstatus='SUCCESS' ORDER BY id DESC;"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' AND paymentstatus='SUCCESS' ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "MassBooking (SUCCESS)";      
                                break;
            case 'massreq'      :
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' AND paymentstatus='REQUESTING' ORDER BY id DESC"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor!='Donation' AND paymentstatus='REQUESTING' ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "MassBooking (PENDING)";      
                                break;
            case 'donateall'    :  
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation'  ORDER BY id DESC"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation'  ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "Donation (ALL)";      
                                break;
            case 'donatesuccess':  
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation' AND paymentstatus='REQUESTING' ORDER BY id DESC"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation' AND paymentstatus='SUCCESS' ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "Donation (SUCCESS)";      
                                break; 
            case 'donatereq'    :  
                                $rows   = sizeof($mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation' AND paymentstatus='REQUESTING' ORDER BY id DESC"));
                                $result =$mysql->select("SELECT * FROM _massbooking WHERE bookfor='Donation' AND paymentstatus='REQUESTING' ORDER BY id DESC"." limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                $title = "Donation (PENDING)";      
                                break;  
        }
        
        echo $title; 
        ?> 
          
    </div>
    
        <table cellspacing='0' cellspadding='3' style="margin:5px;width:100%;font-size:12px;font-family:'Trebuchet MS';"> 
            <tr>
                <td class="mytdhead">Recipt Id</td>
                <td class="mytdhead">dateofpreferred</td>
                <td class="mytdhead">bookfor</td>
                <td class="mytdhead">intention</td>
                <td class="mytdhead">donor</td>
                <td class="mytdhead">addressline1</td>
                <td class="mytdhead">addressline2</td>
                <td class="mytdhead">addressline3</td>
                <td class="mytdhead">pincode</td>
                <td class="mytdhead">emailid</td>
                <td class="mytdhead">mobilno</td>
                <td class="mytdhead">amount</td>
                <td class="mytdhead" style="width:80px">dateofrequest</td>
                <td class="mytdhead">paymentstatus</td>
                <td class="mytdhead">Mass timing</td>  
            </tr>
            <?php foreach($result as $n) { ?>
            <tr class="<?php echo (($count%2)==0) ? "trodd" : "treven";?> >">
                <td class="mytd"><?php echo $n['id'];?></td>
                <td class="mytd"><?php echo $n['dateofpreferred'];?></td>
                <td class="mytd"><?php echo $n['bookfor'];?></td>
                <td class="mytd"><?php echo $n['intention'];?></td>
                <td class="mytd"><?php echo $n['donor'];?></td>
                <td class="mytd"><?php echo $n['addressline1'];?></td>
                <td class="mytd"><?php echo $n['addressline2'];?></td>
                <td class="mytd"><?php echo $n['addressline3'];?></td>
                <td class="mytd"><?php echo $n['pincode'];?></td>
                <td class="mytd"><?php echo $n['emailid'];?></td>
                <td class="mytd"><?php echo $n['mobilno'];?></td>
                <td class="mytd"><?php echo $n['amount'];?></td>
                <td class="mytd"><?php echo $n['dateofrequest'];?></td>
                <td class="mytd"><?php echo $n['paymentstatus'];?></td>
                <td class="mytd"><?php echo $n['timing'];?></td>
            </tr>
            <?php
                    $count++;       
            }
            ?>
        </table>
        <?php for($i=1;$i<=intval($rows/$rsperpage);$i++) {?>
            <a href="viewqry.php?view=<?php echo $_REQUEST['view'];?>&page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php } ?>  
</body>
