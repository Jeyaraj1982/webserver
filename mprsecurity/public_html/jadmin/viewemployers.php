<h3>View Employers</h3>
<?php
   include_once("../config.php");
    if (isset($_POST['isadd'])) {
        
        $ins_array = array("name"=>$_POST['name'],
                           "companyname"=>$_POST['companyname'],
                           "address"=>$_POST['address'],
                           "telephoneno"=>$_POST['telephoneno'],
                           "fax"=>$_POST['fax'],
                           "emailid"=>$_POST['emailid'],
                           "website"=>$_POST['website'],
                           "createdon"=>date("Y-m-d H:i:s"),
                           "isactive"=>"1");
                           
        $id = $mysql->insert("_employers",$ins_array);
             if ($id>0) {
            echo "Successfully Added";
        } else {
            echo "Error Adding Data";
        }
    }
     $employer = $mysql->select("select * from _employers");   
   ?>
<table style="font-size:14px;font-family:'Trebuchet MS';color:#222;line-height:20px;vertical-align: top;width:100%;" cellpadding="5" cellspacing="0" border="1px">

    <tr style="text-align: center;font-weight:bold;background:#ccc;">
        <td>Name</td>
        <td>Company Name</td>
        <td>Address</td>
        <td>Telephone No</td>
        <td>Fax</td>
        <td>Email ID</td>
        <td>Website</td>
        <td>Created On</td>
        <td>Is Active</td>
    </tr>
    
    <?php foreach($employer as $employers) { ?>
    <tr>
       <td><?php echo $employers['name'];?></td>
       <td><?php echo $employers['companyname'];?></td>
       <td><?php echo $employers['address'];?></td>
       <td><?php echo $employers['telephoneno'];?></td>
       <td><?php echo $employers['fax'];?></td>
       <td><?php echo $employers['emailid'];?></td>
       <td><?php echo $employers['website'];?></td>
       <td><?php echo $employers['createdon'];?></td>
       <td><?php echo $employers['isactive'];?></td>
    </tr>
    <?php } ?>
    
    
</table>