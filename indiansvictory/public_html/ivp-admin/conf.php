<?php
    session_start();
        $array = array("post"=>"Post","photo"=>"Photo","video"=>"Video","speech"=>"Speech");
        $arrayid = array("post"=>"1","photo"=>"7","video"=>"8","speech"=>"9");
                
        $_SESSION['user']['id']=1;
        
      //  include_once("../php/classes/mysql.php");
      

  class MySql {
        
     //   var $link; 
      //  var $dbHost = "localhost";
     //   var $dbUser = "ivpyouth";
      //  var $dbPass = "123456789";
      //  var $dbName = "ivpyouth_com";
        
      

    var $link; 
        var $dbHost = "localhost";
        var $dbUser = "nicus79q_nicus";
        var $dbPass = "abcd1234";
        var $dbName = "nicus79q_ivp";
        
        var $qry = "";
        
        function MySql(){
            $this->link = mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
             
            
        }
        
        function select($sql) {
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            $result = mysql_query($sql,$this->link);
            $resultData= array();
            while ($row = mysql_fetch_assoc($result)){
                $resultData[]=$row;
            }
            return $resultData;
        }
        
        function execute($sql) {
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            mysql_query($sql,$this->link);
        }
        
        function insert($tableName,$rowData) {
            $r = "insert into `".$tableName."` (";
            $l = " values (";
            foreach($rowData as $key => $value) {
                $r.="`".$key."`,";
                if ($value=="Null") {
                    $l.="Null,";
                } else {
                    $l.="'".$value."',";    
                }
                
            }
            $r = substr($r,0,strlen($r)-1).")";
            $l = substr($l,0,strlen($l)-1).")";
            $sql = $r.$l;
            
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            $this->qry=$sql;  
            mysql_query($sql,$this->link);
          //  return $sql;
            return mysql_insert_id($this->link);
    
        }
        
        function insRow($sql) {
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            $this->qry=$sql;  
            mysql_query($sql,$this->link);
            if (mysql_affected_rows()==1) {
                return "1";
            } else {
                return "-1";
            }
        //  return mysql_affected_rows();
          //  return mysql_insert_id($this->link); 
        }
    }

 $mysql = new MySql();

include_once("../php/classes/functions.php");
        
       
        
        ?>
        <style>
        .tr:hover {background:#f3f3f3;color:#FF5F49}
        .td {border:1px solid #f3f3f3}
        .ContainerTitle{background:#45D4FF;font-weight: bold;font-size:20px;padding:5px;font-family:arial;}
        </style>
        
        <?php
            
            if (isset($_POST['printbtn'])) {
                $data = $mysql->select("select p.*,u.username,u.emailid,u.destination,u.photo from _posts as p, _user as u where md5(p.id)='".$_REQUEST['postid']."' and p.postedby=u.id"); 
                echo  base64_decode($data[0]['mailcontent']);
                echo "<script>window.print();</script>";
                exit;
            }
            
            if (isset($_POST['viewbtn'])) {
                $data = $mysql->select("select p.*,u.username,u.emailid,u.destination,u.photo from _posts as p, _user as u where md5(p.id)='".$_REQUEST['postid']."' and p.postedby=u.id"); 
                echo  base64_decode($data[0]['mailcontent']);
                exit;
            }
    
            if (isset($_POST['unPublishbtn'])) {
                $mysql->execute("update _posts set ispublished=0 where md5(id)='".$_REQUEST['postid']."'");
                echo  "<script>alert('Successfully unpblished');</script>";
            }
            
            if (isset($_POST['update'])) {
                $mysql->execute("update _posts set title='".$_POST['title']."',description='".$_POST['description']."',categoryid='".$_POST['category']."', postedby = '".$_POST['postedby']."' where id=".$_POST['id']);    
                echo  "<script>alert('Successfully updated');</script>";    
                 
            }
    
            if (isset($_POST['editbtn'])) {
                $post = $mysql->select("select p.*,u.username,u.emailid,u.destination,u.photo from _posts as p, _user as u where md5(p.id)='".$_REQUEST['postid']."' and p.postedby=u.id"); 
    ?>
            <form action="" method="post">
                <input type="hidden" value="update" name="update">    
                <input type="hidden" value="<?php echo $post[0]['id'];?>" name="id">    
                <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
                <script type="text/javascript">tinyMCE.init({mode : "textareas",theme : "advanced",plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",theme_advanced_toolbar_location : "top",theme_advanced_toolbar_align : "left",theme_advanced_statusbar_location : "bottom",theme_advanced_resizing : true,content_css : "css/content.css",template_external_list_url : "lists/template_list.js",external_link_list_url : "lists/link_list.js",external_image_list_url : "lists/image_list.js",media_external_list_url : "lists/media_list.js",style_formats : [{title : 'Bold text', inline : 'b'},{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},{title : 'Example 1', inline : 'span', classes : 'example1'},{title : 'Example 2', inline : 'span', classes : 'example2'},{title : 'Table styles'},{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}],template_replace_values : {username : "Some User",staffid : "991234"}});</script>
                <table cellpadding="5" cellspacing="0" width="100%" style="font-family:arial;font-size:12px;">
                    <tr>
                        <td>To</td>
                        <td>
                            <select name="category">
                            <?php foreach($mysql->select("select * from category") as $l) { ?>
                                <option <?php echo ($l['id']==$post[0]['categoryid'])? 'selected=selected' : '';?> value="<?php echo $l['id'];?>"><?php echo $l['category'];?></option>
                            <?php } ?>
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
                        <td>Posted From</td>
                        <td>
                            <select name="postedby" id="postedby">
                            <?php foreach($mysql->select("select * from _user order by id") as $usr) { ?>
                                <option value='<?php echo $usr['id'];?>' <?php echo ($usr['id']==$post[0]['postedby']) ? 'selected=selected' : '';?> ><?php echo $usr['username'];?></option>
                            <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="updateBtn" value="Update"> &nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </form>
<?php 
            exit;
            }
    
            if (isset($_POST['publishbtn'])) {
            
                $mysql->execute("update _posts set ispublished=1 where md5(id)='".$_REQUEST['postid']."'");
                $data = $mysql->select("select p.*,u.username,u.emailid,u.destination,u.photo from _posts as p, _user as u where md5(p.id)='".$_REQUEST['postid']."' and p.postedby=u.id"); 

                $mail = "<div style='width:900px;'>";
                    $mail .= "<div style='background:#FFF;color:#FFFFFF;text-align:center;font-family:arial;font-size:23px;font-weight:bold;line-height:26px'>";
                        $mail.="<img src='http://www.indiansvictoryparty.com/images/letterpad_logo.png'>";
                    $mail .= "</div>";
                    $mail .= "<div style='padding:10px;text-align:justify'>";
                        $mail .= $data[0]['description'];
                    $mail .= "</div>";
                    $mail .= "<div style='background:url(http://www.indiansvictoryparty.com/images/letterpadbackground.png);background-image:url(http://www.indiansvictoryparty.com/images/letterpadbackground.png);color:#FFFFFF;text-align:left;font-family:arial;font-size:23px;padding:10px;padding-left:10px;font-weight:bold;line-height:26px'>";
                        $mail .= "<table width='100%' cellpadding=5 cellspacing=0 style='color:white;font-size:28px;'>";
                            $mail .= "<tr>";
                                $mail .= "<td><img src='http://www.indiansvictoryparty.com/assets/".$data[0]['photo']."' style='width:100px;border:1px solid #ccc;'></td>";
                                $mail .= "<td>";
                                    $mail .= "<div style='font-weight:bold;font-family:arial;color:white;font-size:28px;'>".$data[0]['username']."</div>";
                                    $mail .= "<div style='font-family:arial;color:white;font-size:25px'>".$data[0]['destination']."</div>";
                                    $mail .= "<div style='font-family:arial;color:white;font-size:20px'>Contact Us : ".$data[0]['emailid']."</div>";
                                    $mail .= "<div style='font-size:13px;font-family:arial;color:white;font-size:15px'>Registered Political Party at Election commission of India. Reg. No. 56/172/2001-J.S.111, 950, dd:29-04-2003</div>";
                                $mail .= "</td>";
                            $mail .= "</tr>";
                        $mail .= "</table>";
                    $mail .= "</div>";
                    
                    $mail .= "<div style='font-family:arial;font-size:12px;'>";
                        $mail .= "<br>View original copy of this mail, Please <a href='http://www.indiansvictoryparty.com/?jsessionid=".md5($data[0]['id'])."' target='_blank' style='color:#222'>Click here</a><br>";
                    $mail .= "</div>";
                $mail .= "</div>";
                          
                $mysql->execute("update _posts set mailcontent='".base64_encode($mail)."' where md5(id)='".$_POST['postid']."'");
                          
                $headers  = "From: ivp@indiansvictoryparty.com\r\n";
                $headers .= "Content-type: text/html\r\n";
                        
                mail("shalinmedicals@yahoo.com","IVP: POST Waiting for approval",$link."<br>".$mail,$headers);
                mail("jeyaraj_123@yahoo.com","IVP: POST Waiting for approval",$link."<br>".$mail,$headers);

                echo  "<script>alert('Successfully published');</script>";
                
                echo $mail;
                exit;

            }
    
            if (isset($_POST['deletebtn'])) {
                //deletebtn
            }
    ?>