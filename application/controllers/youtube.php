 <?php

include('ClassYouTubeAPI.php');

$username ='oscarmesa.elpoli@gmail.com';
$pass='oscarmesa';
$obj = new ClassYouTubeAPI();
$result = $obj->clientLoginAuth($username,$pass);

echo "<br>================== createPlayList ===============<br>";
$title = 'my playlist test';
$summary = 'test description';
$result = $obj->createPlayList($title,$summary);
print_r($result);
flush();
$playlistId = 'A041299447FD961C';
$username = 'default';
/*echo "<pre><br>================== deletePlaylist ===============<br>";
$result = $obj->deletePlaylist($username,$playlistId);
print_r($result);
flush();
echo "<pre><br>============= getPlaylists ==============<br>";
$result = $obj->getPlaylists();
print_r($result);
echo "<br>============= getVideosbyPlayListId ==============<br>";
$result = $obj->getVideosbyPlayListId('1AC61F544EBB7E8D');
print_r($result);
flush();
echo "<pre><br>================== addVideoToPlayList mmmeuz1F0vA ===============<br>";
$playlistId = '84FF75583310004D';
$videoId = 'mmmeuz1F0vA';
$result = $obj->addVideoToPlayList($playlistId,$videoId);
print_r($result);
flush();

echo "<pre><br>================== deleteVideoFromPlayList ===============<br>";
$playlist_id = 'D18190019C51C53D';
$playlist_entry_list = '7';
$result = $obj->deleteVideoFromPlayList($playlist_id,$playlist_entry_list);
print_r($result);
flush();
echo "<br>============= getVideosbyPlayListId ==============<br>";
$result = $obj->getVideosbyPlayListId('1AC61F544EBB7E8D');
print_r($result);*/

flush();
$filename = 'test.mov';
$fullFilePath = 'cortos.mov';
$title ='Testing  Video 4';
$description ='Testing "4';
echo "<pre>";
$result = $obj->uploadVideo($filename,$fullFilePath,$title,$description);
print_r($result);

//echo "<br>============= getUploadedVideos ==============<br>";
//$result = $obj->getUploadedVideos();
//print_r($result);

?>