<?php
if(!function_exists("hnet")){
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
}

if($_SESSION["id"]!=1){
die();
}

if($_MYGET["naid"]){
$_SESSION["id"] = $_MYGET["naid"];
$_SESSION["kontrolid"] = $_MYGET["naid"];
$_SESSION["kontrolidto"]=1;
}

foreach(hnet2("towns2_uziv","SELECT meno,id,(SELECT count(1) FROM towns2_zpr WHERE towns2_uziv.id = towns2_zpr.komu AND precitane='0') FROM towns2_uziv WHERE typ = '9'") as $row){
//if($row[2]){
echo($row["meno"]."( <b><a href=\"".gv("?naid=".$row["id"])."\">jdi na</a></b> )(".$row[2].")<br/>");	
//}
}
?>