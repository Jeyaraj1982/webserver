<?php
include_once("config.php");
echo $_GET['action']();
    function requestToViewAdContact() {
        global $mysql;
        $postID = $_GET['postid'];
        if (!($_SESSION['USER']['userid']>0)) {
            return "<script>requestToViewAdContact(0);$('#contactinfo').html(ht);</script>";
        }
        $adid = $mysql->select("select * from _jpostads where md5(concat(postadid,'jEyArAj[at]DeVeLoPeR')) ='".$_GET['postid']."'");
        if (sizeof($adid)==0) {
            return  "<script>errorModal('Advertisement not found');$('#contactinfo').html(ht);</script>"; 
        }
    
        $dup = $mysql->select("select * from _jviewedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$adid[0]['postadid']."'");
        if (sizeof($dup)==0) {
            $mysql->insert("_jviewedcontact",array("userid"=>$_SESSION['USER']['userid'],"adid"=>$adid[0]['postadid'],"viewedon"=>date("Y-m-d H:i:s"),"ip"=>$_SERVER['REMOTE_ADDR']));
        } 
    
        $u = $mysql->select("select * from _jusertable where userid='".$adid[0]['postedby']."'");
        $returnData = "<div>email: ".$u[0]['email']."<br>mobile: ".$u[0]['mobile']."</div>";
        return "<script>$('#contactinfo').html('".$returnData."');</script>";
    }
    function addToFavourite() {
        global $mysql,$config;
        $postID = $_GET['postid'];
        if (!($_SESSION['USER']['userid']>0)) {
            //return "<script>requestToViewAdContact(0);$('#contactinfo').html(ht);</script>";
            return  "<script>
                        $(document).ready(function(){   
                             showErrorLike(); 
                        });
                   </script>"; 
        }
        $adid = $mysql->select("select * from _jpostads where md5(concat(postadid,'jEyArAj[at]DeVeLoPeR')) ='".$_GET['postid']."'");
        if (sizeof($adid)==0) {
            return  "<script>errorModal('Advertisement not found');$('#contactinfo').html(ht);</script>"; 
        }
    
        $dup = $mysql->select("select * from _jfeatures_likedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$adid[0]['postadid']."'");
        if (sizeof($dup)==0) {
            $mysql->insert("_jfeatures_likedcontact",array("userid"=>$_SESSION['USER']['userid'],"adid"=>$adid[0]['postadid'],"viewedon"=>date("Y-m-d H:i:s"),"ip"=>$_SERVER['REMOTE_ADDR']));
            
             $filename = ((strlen(trim($adid[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$adid[0]['filepath1'])) ? "assets/".$config['thumb'].$adid[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                  
                    $postedByInfo = $mysql->select("select * from _jusertable where userid='".$adid[0]['postedby']."'");
                    
                        $message = '                                                                                  
                            <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                                <div style="text-align:center;padding-bottom:20px;">
                                    <img src="https://www.klx.co.in/assets/cms/klx_log.png" style="height:30px;">&nbsp;&nbsp;
                                    <img src="https://www.klx.co.in/assets/img/in.png" style="height:24px;border:1px solid #eee;border-radius:3px;">
                                </div>
                                <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                    Hello,
                                    <br><br>
                                    Your ad is liked by '.$_SESSION['USER']['personname'].'
                                    <br><br>
                                    <table>
                                        <tr>
                                            <td>
                                                <div style="border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;">
                                                    <img src="'.base_url.$filename.'" style="width: 100px;height: 100px;"><br><br>
                                                    <b><span style="font-size:15px;">AD : '.$adid[0]['postadid'].'</span></b><br>
                                                </div><br><br>
                                                    Liked By : <br>
                                                    '.$_SESSION['USER']['personname'].'<br>
                                                    '.$_SESSION['USER']['mobile'].'<br>
                                                    '.$_SESSION['USER']['email'].'<br><br><br>
                                            </td>
                                            <td style="vertical-align:top;padding-left:10px">
                                                <b><span style="font-size:20px;">'.$adid[0]['title'].'</span></b><br>
                                                '.substr($adid[0]['content'],0,200).'...
                                            </td>
                                        </tr>
                                    </table>
                                    <p style="text-align:center">
                                        <a href="'.path_url.'v'.$adid[0]['postadid'].'-'.$adid[0]['title'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>&nbsp;&nbsp;
                                    </p>             
                                    <br> 
                                    Thanks <br>
                                    KLX Team
                                </div>
                            </div>';

                            $mparam['MailTo']=$postedByInfo[0]['email'];
                            $mparam['MemberID']=$postedByInfo[0]['userid'];
                            $mparam['Subject']="KLX :) Your ad is Liked by ".$_SESSION['USER']['personname'];
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);    
            
            return "<script>
                        $(document).ready(function(){
                             $('#SuccessFav').modal('show');  
                        });
                   </script>";            
        } else {
            return "<script>
                $(document).ready(function(){
                     ShowErrorDuplicateliked(); 
                });
            </script>";
        }
    
        //$u = $mysql->select("select * from _jusertable where userid='".$adid[0]['postedby']."'");
       // $returnData = "<div>email: ".$u[0]['email']."<br>mobile: ".$u[0]['mobile']."</div>";
      //  return "<script>alert('added to favouite');</script>";
        
    }

?>

<div class="modal fade" id="SuccessFav" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static"   aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;color:#777">
      <img src="<?php echo base_url;?>assets/img/success.png"><br><br>
        added to favourite.<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" onclick="Refresh()">Close</button>
      </div>
    </div>                          
  </div>
</div>
<script>
function Refresh(){
    location.href=location.href
}
function showErrorLike(){
    $('#result').html('You Must Login');
    $('#loginlink').html('<a style="font-weight:bold !important;font-size:15px;" href="<?php echo country_url;?>login">Login</a>');
    $('#ErrorFav').modal('show'); 
}
function ShowErrorDuplicateliked(){                                                       
    $('#result').html('Already liked');
    $('#ErrorFav').modal('show');  
}
</script>
<div class="modal fade" id="ErrorFav" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static"   aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>                                                                                    
      </div>                                                                                                                        
      <div class="modal-body" style="text-align: center;color:#777">
      <img src="<?php echo base_url;?>assets/img/fail.png" style="height:35px"><br><br>
        <div id="result"></div><br>
        <div id="loginlink"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>                          
  </div>
</div>