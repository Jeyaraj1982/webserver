<?php
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "https://www.gamestorrents.nu/juegos-pc/forager/",
]);
$resp = curl_exec($curl);
curl_close($curl);

$data = explode(' class="post_imagem" src="',$resp);
$imageurl =  explode('"',$data[1]);

$torrent = explode('/wp-content/uploads/files/',$resp);
$torrentulr =  explode('"',$torrent[1]);

$youtube = explode('https://www.youtube.com/embed/',$resp);
$youtubeulr =  explode('"',$youtube[1]);
 
$result = array("image"=>$imageurl[0],
                "torrent"=>"https://www.gamestorrents.nu/wp-content/uploads/files/".$torrentulr[0],
                "youtube"=>"https://www.youtube.com/embed/".$youtubeulr[0]);
print_r($result);
?>