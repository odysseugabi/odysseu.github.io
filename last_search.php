<?php
$div = "| # |";
$dat = 'last_search.txt';
$fp=fopen($dat, 'r');
$count=fgets($fp);
fclose($fp);
$search = $q;
$search = str_replace('+', ' ', $search);
$data = explode($div, $count);
if (in_array($search, $data)) 
{
$tulis = implode($div, $data);
$hit=$tulis;
}
else 
{
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div.''.$data[11].''.$div.''.$data[12].''.$div.''.$data[13].''.$div.''.$data[14].''.$div.''.$data[15].''.$div.''.$data[16].''.$div.''.$data[17].''.$div.''.$data[18].''.$div.''.$data[19].''.$div.''.$data[20].''.$div.''.$data[21].''.$div.''.$data[22].''.$div.''.$data[23].''.$div.''.$data[24].''.$div.''.$data[25].''.$div.''.$data[26].''.$div.''.$data[27].''.$div.''.$data[28].''.$div.''.$data[29].''.$div.''.$data[30].''.$div.''.$data[31].''.$div.''.$data[32].''.$div.''.$data[33].''.$div.''.$data[34].''.$div.''.$data[35].''.$div.''.$data[36].''.$div.''.$data[37].''.$div.''.$data[38].''.$div.''.$data[39].''.$div.''.$data[40].''.$div;
$tulis .= $search;
$hit=$tulis;
}
$cuplissayangputri=fopen($dat, 'w');
fwrite($cuplissayangputri,$tulis);
fclose($cuplissayangputri);
$fa=fopen($dat, 'r');
$b=fgets($fa);
fclose($fa);
$c = explode($div, $b);
echo '<div class="group">';
echo '<span class="page">Recent Search : </span>';
foreach(array_reverse($c) as $d)
{
echo '<a style="padding:1px;margin:2px;" href="/category/'.$d.'">'.$d.'</a>|';
}
echo '</div>';
?>
