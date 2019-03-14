<?php
//$_POST["title"]="dff";
//$_POST["start"]="44";
//$_POST["end"]="xds";
$title=$_POST["title"];
$start=$_POST["start"];
$end=$_POST["end"];
$arr[]=array("title"=>$title,"start"=>$start,"end"=>$end);
echo json_encode($arr);


?>