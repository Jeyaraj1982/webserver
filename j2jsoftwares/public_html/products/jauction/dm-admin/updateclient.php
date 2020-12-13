
<h2 style="text-align: left;font-family: arial;">Update Client</h2>

<?php
   include_once("config.php");     
   
  function getrealname($seoname) {
        $seoname = preg_replace('/\%/',' percentage',$seoname);
        $seoname = preg_replace('/\@/',' at ',$seoname);
        $seoname = preg_replace('/\&/',' and ',$seoname);
        $seoname = preg_replace('/[\s\W]+/','',$seoname);    // Strip off spaces and non-alpha-numeric
        $seoname = preg_replace('/[\.]+$/','',$seoname); // // Strip off the ending hyphens
        $seoname = strtolower($seoname);
        return $seoname;
    }
    

    if (isset($_POST['forid'])){
        $sql= "delete from _visitor where id in (";
        foreach($forid as $f) {
            $sql.=$f['id'].",";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= ")";
        
       echo  $mysql->execute($sql)." records deleted successfully";
        
    }
    if (isset($_POST['addComment'])) {
          $data = $mysql->select("select * from _clients where id=".$_POST['clientid']);      
          
          $insArray = array("id"=>'Null',"clientid"=>$_POST['clientid'],"reason"=>$_POST['reason'],"status"=>$_POST['status'],"postedon"=>date("Y-m-d H:i:s"),"postedby"=>$_SESSION['user']['role']);
          
          $mysql->insert("_comments",$insArray);
          echo "Information successfully updated";
        
 
    }
?>


    <?php
    $data = $mysql->select("select * from _clients where id=".$_POST['clientid']);
    
    if ((isset($_POST['update'])) && ($_POST['update']=="Update") ) {
        $sql = "update _clients set password='".$_POST['password']."',mobileno='".$_POST['mobileno']."',plan='".$_POST['plan']."', sex='".$_POST['sex']."', dateofbirth='".$_POST['dateofbirth']."',lastname='".$_POST['lastname']."',firstname='".$_POST['firstname']."' where id=".$_POST['clientid'];
        $mysql->execute($sql);
        echo "Updated Successfull";
    }

    if ((isset($_POST['block'])) && ($_POST['block']=="Block") ) {
        
         $mysql->execute("update _clients set isblock='1' where id=".$_POST['clientid']); 
         echo "Account has blocked.";
    }
    
    if ((isset($_POST['unblock'])) && ($_POST['unblock']=="UnBlock") ) {
        
         $mysql->execute("update _clients set isblock='0' where id=".$_POST['clientid']); 
         echo "Account has unblocked.";
    }
        
    if ((isset($_POST['active'])) && ($_POST['active']=="Active") ) {
        // Update link
        $data = $mysql->select("select * from _clients where id=".$_POST['clientid']);
        $link=$data[0]['id']."-".getrealname($data[0]['firstname']);
        
        $mysql->execute("update _clients set userlink='".$link."' where id=".$_POST['clientid']);
        
        echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>";
        echo "Account Id : ".$data[0]['id']."<br>";
        echo "Updated user link.<br>";
        echo "http://www.dealmaass.in/u/".$link."<br>";
        
       $mysql->execute("update _clients set isblock='0', isactive='1', activatedon='".date("Y-m-d H:i:s")."' where id=".$_POST['clientid']);        
       
       $ref = $mysql->select("select * from _clients where id=".$data[0]['referringby']);
       //$ref_x = $mysql->select("select * from _clients where id=".$ref[0]['referringby']);
       
       /*
       $cramount = 0;
       
       switch($ref[0]['plan']) {
           
           case '1' : 
                        $cramount = 300;
                        $cramount_ref = 100;
                        break;
           case '2' :
                        if ($data[0]['plan']==1) {
                            $cramount = 300;
                            $cramount_ref = 100;
                        } else if ($data[0]['plan']==2) {
                            $cramount = 800;    
                            $cramount_ref = 200;
                        }
                        break;
           case '3' :    if ($data[0]['plan']==1) {
                            $cramount = 300;
                            $cramount_ref = 100; 
                         } else if ($data[0]['plan']==2) {
                            $cramount = 800;
                            $cramount_ref = 200;
                         } else if ($data[0]['plan']==3) {
                            $cramount = 1500;
                            $cramount_ref = 300;
                         } 
                         break;
           case '4' :   $cramount = 150;
                         $cramount_ref = 50;
                         break;                         
       }
       echo "Account Activated.<br>";
       
       $array = array("id"=>'Null',
       "clientid"=>$data[0]['referringby'],
       "date"=>date("Y-m-d H:i:s"),
       "particulars" => "New User Activation",
       "cramount" => $cramount,
       "dramount" => '0',
       "description"=>"New User Activation"
       );
       
       
        $recordId = $mysql->insert("_clients_account",$array);  

       if ((sizeof($ref)>0) && ($ref[0]['referringby']>0)) {    

       $array = array("id"=>'Null',
       "clientid"=>$ref[0]['referringby'],
       "date"=>date("Y-m-d H:i:s"),
       "particulars" => "New User Activation",
       "cramount" => $cramount_ref,
       "dramount" => '0',
       "description"=>"New User Activation"
       );

        $recordId = $mysql->insert("_clients_account",$array);  
        
        }
        
        echo "Added Rs. ".$cramount." in Account Id :".$data[0]['referringby']." <br>";

         if ((sizeof($ref)>0) && ($ref[0]['referringby']>0)) {       
         echo "Added Rs. ".$cramount_ref." in Account Id :".$ref[0]['referringby']." <br>";
         } 
          */
         $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: dealmaass@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        
        $t = "Your account has been activated.<br>";
        $t .= "Your Password : ".$data[0]['password']."<br>";
        $t .= "Your Link : http://www.dealmaass.in/u/".$link."<br>";
        $t .= "Thanks<br>Kejuinfotech Team.";
        
        
         mail("jeyaraj_123@yahoo.com","Dealmaas.in : [PJ] Your account has been activated",$t,$headers);  
         mail(trim($data[0]['emailid']),"Your account has been activated",$t,$headers); 
         mail("dealmaass@gmail.com",trim($data[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
          echo "Activation mail sent to client with login and link information.<br>"; 
           
          
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>";          
        
    }
?>
