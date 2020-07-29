<?php
include 'includes/func.php';
include 'includes/info.php';
$yf=ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$devkey.'&part=snippet,contentDetails,statistics,topicDetails&id='.$_GET['id'].'');
$yf=json_decode($yf);


$video = file_get_contents('http://bdwebs.tk/get/server10/getvideo.php?videoid='.$_GET['id'].'&type=Download');
$mp3 = file_get_contents('http://bdwebs.tk/get/server10/mp3/getvideo.php?videoid='.$_GET['id'].'&type=Download');
$mdlink=str_replace('==== Load player script and execute patterns ====

Loading player ID = vflAAoWvh

==== Player script was not found for id: vflAAoWvh ====',$mdlink); // Span Class Replaceing


if($yf){
foreach ($yf->items as $item)
{

$name=$item->snippet->title;
$des = $item->snippet->description;
$date = dateyt($item->snippet->publishedAt);
$channelId = $item->snippet->channelId;
$chtitle = $item->snippet->channelTitle;
$ctd=$item->contentDetails;
$duration=format_time($ctd->duration);
$hd = $ctd->definition;
$st= $item->statistics;
$views = $st->viewCount;
$likes = $st->likeCount;
$dislike = $st->dislikeCount;
$favoriteCount = $st->favoriteCount;
$commentCount = $st->commentCount;
{$title='Download '.$name.' ('.$duration.') in Mp3, 3GP, MP4, FLV and WEBM Format';}
$tag=$name;
$tag=str_replace(" ",",", $tag);
$dtag=$des;
include 'includes/config.php';
echo '<div class="subheader" align="left">'.$name.'</div>';
echo '<div class="group" align="left">';

echo '<div class="group" align="center">';
echo '<iframe width="300" height="170" src="//www.youtube.com/embed/'.$_GET['id'].'" frameborder="0" allowfullscreen></iframe>';
echo '<br/>';
echo '<img src="http://ytimg.googleusercontent.com/vi/'.$_GET['id'].'/1.jpg"/><img src="http://ytimg.googleusercontent.com/vi/'.$_GET['id'].'/2.jpg"/><img src="http://ytimg.googleusercontent.com/vi/'.$_GET['id'].'/3.jpg"/>';
echo ''.$adb.'</div>';
echo '<div class="group">';
echo '<table>';
echo '<tr valign="top">';
echo '<td width="30%">Title</td>';
echo '<td>:</td>';
echo '<td><a href="">'.$name.'</a></td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Duration</td>';
echo '<td>:</td>';
echo '<td>'.$duration.' Min</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Extensions</td>';
echo '<td>:</td>';
echo '<td>Mp3 / Mp4 /3gp / WebM / Flv VideoType: '.$hd.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Channel</td>';
echo '<td>:</td>';
echo '<td>'.$chtitle.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Uploaded At</td>';
echo '<td>:</td>';
echo '<td>'.$date.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Views</td>';
echo '<td>:</td>';
echo '<td>'.$views.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Likes</td>';
echo '<td>:</td>';
echo '<td>'.$likes.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%">Source</td>';
echo '<td>:</td>';
echo '<td>YouTube.com/watch?v='.$_GET['id'].'</td>';
echo '</table>';
echo '</div>';
echo '
<div class="subheader" align="left">Download Video</div>
<div class="group" align="left">'.$video.'</div>

';

}
}
include'includes/ucweb.php';
include 'related.php';
include 'includes/foot.php';
?>