<?php
include 'includes/info.php';
echo '<div class="subheader" align="center">Related videos</div>';
echo ''.$yllix.'';
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?key='.$devkey.'&part=snippet&maxResults=5&relatedToVideoId='.$_GET['id'].'&type=video');
$json = json_decode($grab);
if($json)
{
foreach($json->items as $hasil) 
{
$name = $hasil->snippet->title;
$link = $hasil->id->videoId;
$tgl = $hasil->snippet->publishedAt;
$date = dateyt($tgl);
$des = $hasil->snippet->description;
$chid = $hasil->snippet->channelId;
$linkmake = preg_replace("/[^A-Za-z0-9[:space:]]/","$1",$name);
$linkmake = str_replace(' ','-',$linkmake);
$final = strtolower("$linkmake");
echo '
<div class="link"><table width="100%"><tbody><tr><td width="100" class=""><a href="'.$adt.'"><img src="http://ytimg.googleusercontent.com/vi/'.$link.'/mqdefault.jpg" alt="Thumbnail" height="150px" width="230px" class="thumb"></a><span style="position:relative;bottom:20px;right:0px;background-color:;color:#000000;font-size:10pt;border:0px;margin:0px:padding:5px">MGCodes.Ga</span></td><td valign="top" class=""><a href="/video-download/'.$link.'/'.$final.'.html"><font color="green">'.$name.'</font></a><br/></td></tr></tbody></table></div>';
}
}
?>