<?php
include 'includes/func.php';
if(!empty($_GET['q']))
{
$url='/category/'.preg_replace("/[^A-Za-z0-9[:space:]]/","$1",$_GET['q']).'';
}
else
{
$url='/';
}
header('location:'.$url.''); 
?>
