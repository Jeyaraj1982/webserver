<?php
 function ViewPost($id,$ispublished) {
     global $mysql;
     $lists = $mysql->select("Select * from _posts where ispublished=".$ispublished." and md5(id)='".$id."'");  
     $l=$lists[0];
     $mysql->execute("update _posts set viewers=viewers+1 where id=".$l['id']);
     $r=explode(",",$l['rating']);

if (strlen(trim($l['thumb']))>2) {
    $profile='http://www.indiansvictoryparty.com/profile/'.$l['thumb'];
    $img = '<img src="'.$profile.'" height=225 width=300 align=right style="margin-left:10px;margin-bottom:10px;margin-top:10px">';

} else {
    
    $imgData = explode("src=",$l['description']);
    $imgData = explode('"',$imgData[1]);
    
    if (strlen(trim($imgData[1]))>0) { 
        $profile = $imgData[1];
	 $img = 'dd<img src="'.$profile.'" height=225 width=300 align=right style="margin-left:10px;margin-bottom:10px;margin-top:10px">';

    } else {
        $profile='http://www.indiansvictoryparty.com/images/v.jpg';
	 $img = 'ee<img src="'.$profile.'" height=225 width=300 align=right style="margin-left:10px;margin-bottom:10px;margin-top:10px">';
	
    }
    
}  

$img = "";
//if (strlen(trim($l['thumb']))>0) {
  //  $img = '<img src="'.$profile.'" height=225 width=300 align=right style="margin-left:10px;margin-bottom:10px;margin-top:10px">';
//} else {
//    $img ='';    
//}
     return '<meta name="medium" content="medium_type" />
             <meta property="og:title" content="'.$l['title'].'" />
             <meta name="title" content="'.$l['title'].'" />
             <meta property="og:description" content="'.strip_tags($l['description']).'">
             <meta property="og:image" content="'.$profile.'">
             <link rel="image_src" href="'.$profile.'" / >
             <div style="padding:10px;line-height:20px;font-size:12px;text-align:justify">
             <!-- <div style="font-weight:bold;color:black;"><a href="?jsessionid='.md5($l['id']).'" style="color:#0163C7;">'.$l['title'].'</a></div>-->
             <div>'.$img.$l['description'].'</div>
             <div><b>Posted On : </b>'.$l['lastupdate'].'</div>
             <div><b>Viewed : </b>'.$l['viewers'].', &nbsp;&nbsp;'.$l['sendmails'].' mails has sent.</div>
             <hr style="border:1px solid #f5f5f5;margin:10px;width:100%">'.(($published==1)? "<div>A=>".($r[4]+$r[3]).",R=>".($r[0]+$r[1])."M=>".$r[2] : "").'
		<a href="http://www.facebook.com/sharer/sharer.php?u=http://www.indiansvictoryparty.com/?jsessionid='.$_REQUEST['jsessionid'].'" target="_new"><img src="images/facebook_icon.png" style="border:0px;"></a>&nbsp;&nbsp;
		<a href="https://plus.google.com/share?url=http://www.indiansvictoryparty.com/?jsessionid='.$_REQUEST['jsessionid'].'"><img src="images/social_google_plus.png" alt="Share on Google+"/></a>&nbsp;&nbsp;
		<a href="http://twitter.com/share?text='.$l['title'].'&url=http://www.indiansvictoryparty.com/?jsessionid='.$_REQUEST['jsessionid'].'" target="_blank" ><img src="images/twitter_icon.png" style="border:0px;"></a>&nbsp;&nbsp;
             <a href="http://www.youtube.com/user/INDIANSVICTORYPARTY?feature=watch" target="_blank"><img src="http://www.audubonaction.org/images/content/pagebuilder/Youtube-Button.jpg" height=32></a>
             </div>';
             
 }

?>