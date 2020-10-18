<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
    session_start();

//$sessionPath =  realpath(dirname($_SERVER['DOCUMENT_ROOT'])."/webspace/httpdocs/jeetac.com/tmp");
 


// session_save_path($sessionPath); 
  //      session_start();   

if (isset($_POST['logoutbtn'])) {
$_SESSION['adminuser']='-20';
unset($_SESSION);
}
if (isset($_POST['username'])) {

if ($_POST['username']=='admin' && $_POST['password']=='9876543210') {
$_SESSION['adminuser']='20';
}

}
if ($_SESSION['adminuser']>0) {
?>
<form action="" method="post">
<input type="submit" value='Logout' name='logoutbtn'> 
</form>
<?php
    $_SESSION['user']['id']=1;
    include_once("../php/classes/functions.php");
    include_once("../php/classes/mysql.php");
    $mysql = new MySql();
    
    if (isset($_REQUEST['activePost'])) {
 


            $data = $mysql->select("select * from _posts where md5(id)='".$_REQUEST['activePost']."'");
            if ($data[0]['ispublished']==1) {
                echo  "This post is already published. So Couldn't Republish";
            } else {
$mysql->execute("update _posts set ispublished=1 where md5(id)='".$_REQUEST['activePost']."'");

        echo "<a href='http://mserver.indiansvictoryparty.com/i_v_p.php?id=".$data[0]['id']."'>Click To Confrim to Send</a>";
            }
        exit;
    }
    
    if (isset($_REQUEST['isUnPublishBtn'])) {
        $data = $mysql->select("select * from _posts where md5(id)='".$_REQUEST['isUnPublishBtn']."'");
        if ($data[0]['ispublished']==1) {
            echo  "This post is already published. So Couldn't unpublish";
        } else {
            $mysql->execute("update _posts set ispublished=0 where md5(id)='".$_REQUEST['isUnPublishBtn']."'");
            echo "Successfully updated to unpblish";
        }
        exit;
    }

    if (isset($_REQUEST['edit']) && ($_REQUEST['edit']))  {
        editPost();
    } else if (isset($_REQUEST['update']))  {
        if (isset($_POST['updateBtn'])) {
            $mysql->execute("update _posts set title='".$_POST['title']."',description='".$_POST['description']."',categoryid='".$_POST['category']."', postedby = '".$_POST['postedby']."' where id=".$_POST['id']);    


            echo "updated Successfully";
        } 
        if (isset($_POST['isUnPublishBtn'])) {
               // $mysql->execute("update _posts set ispublished=0 where id=".$_POST['id']);
              //  echo "Successfully updated to unpblish";
        }
        if (isset($_POST['isPublishBtn'])) {
            $s = $mysql->select("select * from _posts where ispublished=0 and id=".$_POST['id']);   
           
            if (sizeof($s)==1) {

        $cur_post=$mysql->select("select * from _posts where id=".$_POST['id']);

if ($cur_post[0]['categoryid']>2) {
 $mysql->execute("update _posts set ispublished=1 where id=".$_POST['id']); 
echo "Successfully published";
} else {
    
        $mysql->execute("update _posts set ispublished=2 where id=".$_POST['id']); 
                
        $link  = "<a target='_blank' style='color:#222' href='http://www.indiansvictoryparty.com/ivp-admin/?activePost=".md5($_POST['id'])."'>Active</a>&nbsp;&nbsp;";
        $link .= "<a target='_blank' style='color:#222' href='http://www.indiansvictoryparty.com/ivp-admin/?isUnPublishBtn=".md5($_POST['id'])."'>DeActive</a><br>";

        $pst = $mysql->select("select * from _posts where id=".$_POST['id']);
        $usr = $mysql->select("select * from _user where id=".$pst[0]['postedby']);

        $mail = "<div style='width:900px;'>";
            $mail .= "<div style='background:#00B0F0;color:#FFFFFF;text-align:center;font-family:arial;font-size:23px;font-weight:bold;line-height:26px'>";
                $mail.="<img src='http://www.indiansvictoryparty.com/images/letterpad_logo.png'>";
            $mail .= "</div>";
            $mail .= "<div style='padding:10px;text-align:justify'>";
                $mail .= $pst[0]['description'];
            $mail .= "</div>";
                    
            $img_img = "";
                    
            switch($usr[0]['id']) {
                
                case '1' :
                    $img_img="<img src='http://www.indiansvictoryparty.com/images/justin.jpg' style='width:100px;border:1px solid #ccc;'>";
                    break;
                        
                case '2' :
                    $img_img="<img src='http://www.indiansvictoryparty.com/images/hari.jpg' style='width:100px;border:1px solid #ccc;'>";
                    break;
                        
                case '6' :
                    $img_img="<img src='http://www.indiansvictoryparty.com/images/shalin.png' style='width:100px;border:1px solid #ccc;'>";
                    break;
                        
                default :
                    $img_img = "";
                    break;
            }

            $mail .= "<div style='background:#3ECC1A;color:#FFFFFF;text-align:left;font-family:arial;font-size:23px;padding:10px;padding-left:10px;font-weight:bold;line-height:26px'>";
            $mail .= "<table width='100%' cellpadding=5 cellspacing=0 style='color:white;font-size:28px;'><tr><td>".$img_img."</td><td>";
//               $mail .= "<table width='100%' cellpadding=5 cellspacing=0 style='color:white;font-size:28px;' ><tr><td><img src='http://www.indiansvictoryparty.com/images/shalin.png' style='width:100px;border:1px solid #ccc;'></td><td style='color:white;font-size:28px;'>";


                $mail .= "<div style='font-weight:bold;font-family:arial;color:white;font-size:28px;'>".$usr[0]['username']."</div>";
                $mail .= "<div style='font-family:arial;color:white;font-size:25px'>".$usr[0]['destination']."</div>";
                $mail .= "<div style='font-family:arial;color:white;font-size:20px'>Contact Us : ".$usr[0]['emailid']."</div>";
                $mail .= "<div style='font-size:13px;font-family:arial;color:white;font-size:15px'>Registered Political Party at Election commission of India. Reg. No. 56/172/2001-J.S.111, 950, dd:29-04-2003</div>";
            $mail .= "</td></tr></table>";
            $mail .= "</div>";
                    $mail .= "<div style='font-family:arial;font-size:12px;'>";
                        $mail .= "<br>View original copy of this mail, Please <a href='http://www.indiansvictoryparty.com/?jsessionid=".md5($_POST['id'])."' target='_blank' style='color:#222'>Click here</a><br>";
                    $mail .= "</div>";
                $mail .= "</div>";
                  
                  $mysql->execute("update _posts set `mailcontent`='".base64_encode($mail)."' where id='".$_POST['id']."'");
                  
      
                $headers  = "From: ivp@indiansvictoryparty.com\r\n";
                $headers .= "Content-type: text/html\r\n";
                
                
               // echo $mail;
                mail("nationalsecretary@indiansvictoryparty.com","IVP: POST Waiting for approval",$mail,$headers);
                mail("shalinmedicals@yahoo.com","IVP: POST Waiting for approval",$link."<br>".$mail,$headers);
                mail("srihari.saravana@gmail.com","IVP: POST Waiting for approval",$link."<br>".$mail,$headers);
                mail("jeyaraj_123@yahoo.com","IVP: POST Waiting for approval",$link."<br>".$mail,$headers);
                //mail("indiansvictoryparty@gmail.com","IVP: POST Waiting for approval",$mail,$headers);
        //  mail("srihariindians@yahoo.in","IVP: POST Waiting for approval",$mail,$headers);
               echo "Message sent to administrator.";
}
            } else {
                echo "Already Published";
            }
        }
        listPost(); 
    } else if (isset($_REQUEST['new'])){
        newPost();
    } else if (isset($_REQUEST['isnew'])){
         $id=$mysql->insRow("insert into _posts values (Null,'".$_POST['title']."','".$_POST['description']."','0','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','0',' ','".$_POST['postedby']."','".$_POST['category']."','0,0,0,0,0','','')");    
         if ($id>0){
            echo "Saved Successfully";  
         } else {
             echo "Error saving your data. Try again";
         }
       
         listPost();    
    }else {
        listPost(); 
    }
?>

<?php function editPost() {   
        global $mysql;  
        $post = $mysql->select("select * from _posts where id=".$_REQUEST['id']);
        if ($post[0]['ispublished']==0)  {
?>
        <form action="?update=true" method="post">
            <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
            <script type="text/javascript">
                tinyMCE.init({
                    mode : "textareas",
                    theme : "advanced",
                    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
                    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : true,
                    content_css : "css/content.css",
                    template_external_list_url : "lists/template_list.js",
                    external_link_list_url : "lists/link_list.js",
                    external_image_list_url : "lists/image_list.js",
                    media_external_list_url : "lists/media_list.js",
                    style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],
                    template_replace_values : {username : "Some User",staffid : "991234"}
                });
            </script>
            <input type="hidden" value="<?php echo $_REQUEST['id'];?>" name="id">
            <table cellpadding="5" cellspacing="0" width="100%" style="font-family:arial;font-size:12px;">
                <tr>
                    <td>To</td>
                    <td>
                        <select name="category">
                            <?php 
                                $c = $mysql->select("select * from category"); 
                                foreach($c as $l) {
                                  ?>
                                  <option <?php echo ($l['id']==$post[0]['categoryid'])? 'selected=selected' : '';?> value="<?php echo $l['id'];?>"><?php echo $l['category'];?></option>
                                  <?php  
                                }
                                ?>
                                
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Title</td>
                    <td><input type="text" value="<?php echo $post[0]['title'];?>" name="title" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td valign="top" >Description</td>
                    <td><textarea  name="description" style="width:650px;height:400px;"><?php echo $post[0]['description'];?></textarea></td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td>
                        <table  cellpadding="5" cellspacing="0" width="100%" style="font-family:arial;font-size:12px;">
                            <tr>
                                <td>Posted On</td>
                                <td><?php echo $post[0]['posteddate'];?></td>
                                <td>Updated On</td>
                                <td><?php echo $post[0]['lastupdate'];?></td>
                            </tr>
                            <tr>
                                <td>Viewers</td>
                                <td><?php echo $post[0]['viewers'];?></td>
                                <td>Sent to </td>
                                <td><?php 
                                        if (trim($post[0]['sendmails'])!=0) {
                                            $e=explode(",",$post[0]['sendmails']);
                                            echo sizeof($e);
                                        } else {
                                            echo "0 ";
                                        }
                                    ?> Mail ids</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Posted From
                    </td>
                    <td>
                        <select name="postedby" id="postedby">
                          <?php
                            $user = $mysql->select("select * from _user order by id");
                            foreach($user as $usr) {
?>
                            <option value='<?php echo $usr['id'];?>' <?php echo ($usr['id']==$post[0]['postedby']) ? 'selected=selected' : '';?> ><?php echo $usr['username'];?></option>
<?php
                            }
?>        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="updateBtn" value="Update"> &nbsp;&nbsp;
                    <input type="Submit" name="isPublishBtn" value="Publish"> &nbsp;&nbsp;
                 <!--     <input type="Submit" name="isUnPublishBtn" value="UnPublish">   -->
                    </td>
                </tr>
            </table>
        </form>
        <?php } else {
            listPost();     
        }
        } ?>
        
        <?php
    
   
?>
<?php function listPost() { 
    global $mysql;
    $posts = $mysql->select("select * from _posts where id>0 and ispublished<>1 order by id desc");
?>
<a href="?new=new">New Post</a>
<table cellpadding="5" cellspacing="0" width="100%" style="font-family:arial;font-size:12px;" border="1">
    <tr style="font-weight: bold;text-align:center;background:#f1f1f1;">
        <td width="50">
            Slno
        </td>
        <td width="120">
            Posted Date
        </td>
        <td width="75">
            Posted By
        </td>
        <td>
            Title
        </td>
        <td width="100">
            Is Publish
        </td>
    </tr>
    <?php 
        $count = 1;
    foreach($posts as $post) { ?>
         <tr style="font-weight: bold;">
        <td>
            <?php echo $count; ?>
        </td>
        <td>
            <?php echo $post['posteddate']; ?>
        </td>
        <td>
            <?php echo $post['postedby']; ?>
        </td>
        <td>
            <a href="?edit=true&id=<?php echo $post['id'];?>"><?php echo $post['title']; ?></a>
        </td>
        <td>
            <?php 
            switch ($post['ispublished']) {
                case '0' : echo "Un Published";break;
                case '1' : echo "Published"; break;
                case '2' : echo "Wait For Publish";break;
            }; ?>
        </td>
    </tr>
        
    <?php $count++; } ?>
</table>
<?php } ?>

<?php 

function newPost() {
     global $mysql;                                                   
    ?>

   <form action="?isnew=true" method="post">
            <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
            <script type="text/javascript">
                tinyMCE.init({
                    mode : "textareas",
                    theme : "advanced",
                    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
                    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : true,
                    content_css : "css/content.css",
                    template_external_list_url : "lists/template_list.js",
                    external_link_list_url : "lists/link_list.js",
                    external_image_list_url : "lists/image_list.js",
                    media_external_list_url : "lists/media_list.js",
                    style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],
                    template_replace_values : {username : "Some User",staffid : "991234"}
                });
            </script>
            <table cellpadding="5" cellspacing="0" width="100%" style="font-family:arial;font-size:12px;">
                <tr>
                    <td>To</td>
                    <td>
                        <select name="category">
                            <?php 
                                $c = $mysql->select("select * from category"); 
                                foreach($c as $l) {
                                  ?>
                                  <option <?php echo ($l['id']==$post[0]['categoryid'])? 'selected=selected' : '';?> value="<?php echo $l['id'];?>"><?php echo $l['category'];?></option>
                                  <?php  
                                }
                                ?>
                                
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Title</td>
                    <td><input type="text" value="<?php echo $post[0]['title'];?>" name="title" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td valign="top" >Description</td>
                    <td><textarea  name="description" style="width:650px;height:400px;"><?php echo $post[0]['description'];?></textarea></td>
                </tr>
                <tr>
                    <td>
                        Posted From
                    </td>
                    <td>
                        <Select name='postedby' id='postedby'>
                        <?php
                            $user = $mysql->select("select * from _user order by id");
                            foreach($user as $usr) {
?>
                            <option value='<?php echo $usr['id'];?>'><?php echo $usr['username'];?></option>
<?php
                            }
?>
                        </Select>
                    </td>
                </tr>
                
                
  
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="newButton" value="Save"></td>
                </tr>
            </table>
        </form>

<?php } ?>


    
<?php }  else { ?>

<form action="" method="post">
<table align="center">
	<tr>
		<td>User Name</td>
		<td><input type='text' name='username'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type='text' name='password'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="Login"></td>
	</tr>
</table>
</form>

<?php } ?>