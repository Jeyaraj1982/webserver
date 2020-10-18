    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <body style="margin:0px">
    <?php 
        include_once("conf.php");  
   
            
        if (isset($_REQUEST['listpublishedpost'])) {
            $posts = $mysql->select("select p.*,u.username from _posts as p, _user as u where p.categoryid=".$arrayid[$_REQUEST['listpublishedpost']]." and p.postedby=u.id and p.ispublished=1 order by p.id desc"); 
            $content_title="Published ".$array[$_REQUEST['listpublishedpost']];
            $tdWidth="195";
        }
    
        if (isset($_REQUEST['listunpublishedpost'])) {
            $posts = $mysql->select("select p.*,u.username from _posts as p, _user as u where p.categoryid=".$arrayid[$_REQUEST['listunpublishedpost']]." and p.postedby=u.id and p.ispublished<>1 order by p.id desc"); 
            $content_title="Un Published ".$array[$_REQUEST['listunpublishedpost']];   
             $tdWidth="171";
        }
        
        $count = 1;
//$posts = $mysql->select("select p.*,u.username from _posts as p, _user as u where p.categoryid=".$arrayid[$_REQUEST['listpublishedpost']]." and p.postedby=u.id and p.ispublished=1 order by p.id desc");
 
    ?>
    <div class='ContainerTitle'><?php echo $content_title; ?></div>
        <table cellpadding="3" cellspacing="0" width="100%" style="font-family:arial;font-size:11px;" border="0">
            <tr style="font-weight: bold;text-align:center;background:#f1f1f1;">
                <td width="40">Slno</td>
                <td width="70">Posted Date</td>
                <td width="160">Posted By</td>
                <td>Title</td>
                <td width="100">Is Publish</td>
                <td width="50">Sent Mail</td>
                <td width="50">From Web</td>
                <td width="50">From Mail</td>
                <td width="<?php echo $tdWidth;?>"></td>
            </tr>
            <?php foreach($posts as $post) { ?>
            <tr class="tr">
                <td class='td' style="text-align: right;"><?php echo $post['id']; ?></td>
                <td class='td' style="text-align: center;"><?php echo  date("Y-m-d",strtotime($post['posteddate'])); ?></td>
                <td class='td' ><?php echo strlen($post['username'])>26 ? substr($post['username'],0,26)." ..." : $post['username']; ?></td>
                <td class='td' ><?php echo $post['title']; ?></td>
                <td class='td' >
                    <?php switch ($post['ispublished']) {
                            case '0' : echo "Un Published";break;
                            case '1' : echo "Published"; break;
                            case '2' : echo "Wait For Publish";break;
                        }; ?>
                </td>
                <td class='td' style="text-align: right"><?php echo $post['sendmails'];?></td>
                <td class='td' style="text-align: right"><?php echo $post['viewers'];?></td>
                <td class='td' style="text-align: right"><?php echo $post['rating'];?></td>
                <td class='td' >
                    <?php if ($post['ispublished']==1) { ?>
                        <form action="" method="post" style="height: 11px;">
                            <input type="hidden" value="<?php echo md5($post['id']);?>" name="postid">
                            <input type="submit" value="View" name="viewbtn" style="font-size:11px">
                            <input type="submit" value="Un Publish" name="unPublishbtn" style="font-size:11px">
                            <input type="submit" value="Print" name="printbtn" style="font-size:11px">
                        </form>
                    <?php } else {   ?>
                         <form action="" method="post" style="height: 11px;">
                            <input type="hidden" value="<?php echo md5($post['id']);?>" name="postid">
                            <input type="submit" value="Edit" name="editbtn" style="font-size:11px">
                            <input type="submit" value="Publish" name="publishbtn" style="font-size:11px">
                            <input type="submit" value="Delete" name="deletebtn" style="font-size:11px">
                        </form> 
                    <?php }?>
                </td>
            </tr>
        <?php $count++; } ?>
    </table>
 </body>
 