<?php
include 'includes/func.php';

/*
THANKS To MobGyan
.................................................................................

Search MobGyan On YouTube

...............................................................................


If you face any problem you may contact with me. 
http://fb.com/mobgyan

*/

$title  = 'MGCodes.Ga Youtube Downloader'; //Edit Homepage Title

include 'includes/config.php';
echo'<div class="subheader">Top Videos</div>';
if($_GET['q']){
$q = $_GET['q'];
} else {
$a = array("mobgyan");
$b = count($a)-1;
$q = $a[rand(0,$b)];
}
$qu=$q;
$qu=str_replace(" ","+", $qu);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu);
if(strlen($_GET['page']) >1){$yesPage=$_GET['page'];}
else{$yesPage='';}
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?key='.$devkey.'&part=snippet&order=relevance&maxResults=10&q='.$qu.'&pageToken='.$yesPage.'&type=video');
$json = json_decode($grab);
$nextpage=$json->nextPageToken;
$prevpage=$json->prevPageToken;
if($json)
{
foreach ($json->items as $sam)
{
$link= $sam->id->videoId;
$name= $sam->snippet->title;
$desc = $sam->snippet->description;
$chtitle = $sam->snippet->channelTitle;
$chid = $sam->snippet->channelId;
$date = dateyt($sam->snippet->publishedAt);
$sam = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$devkey.'&part=contentDetails,statistics&id='.$link.'');
$linkmake = preg_replace("/[^A-Za-z0-9[:space:]]/","$1",$name);
$linkmake = str_replace(' ','-',$linkmake);
$final = strtolower("$linkmake");
$dt=json_decode($sam);
foreach ($dt->items as $dta){
$time=$dta->contentDetails->duration;
$duration= format_time($time);
$views= $dta->statistics->viewCount;   
}
echo '
<div class="link"><table width="100%"><tbody><tr><td width="100" class=""><a href="'.$adt.'"><img src="http://ytimg.googleusercontent.com/vi/'.$link.'/mqdefault.jpg" alt="Thumbnail" height="150px" width="230px" class="thumb"></a><span style="position:relative;bottom:20px;right:0px;background-color:;color:#000000;font-size:10pt;border:0px;margin:0px:padding:5px">MGCodes.Ga</span></td><td valign="top" class=""><a href="/video-download/'.$link.'/'.$final.'.html"><font color="green">'.$name.'</font></a><br/><small>Duration: '.$duration.' Min</small><br/><small>Views: '.$views.'</small></td></tr></tbody></table></div>
';
}
include'includes/ucweb.php';
echo '<div class="subheader" align="center">';
if (strlen($prevpage)>1)
{
echo '<a href="/page/'.$prevpage.'" class="page">&#171;Prev</a> ';}
if (strlen($nextpage)>1)
{
echo '<a href="/page/'.$nextpage.'" class="page">Next&#187;</a>';
}
echo '</div>';
}
include 'last_search.php';
include 'includes/foot.php';
?>
