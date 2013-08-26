<?php
if(!function_exists("hnet")){
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
}

if($_SESSION["id"]!=1){
die();
}
if($_MYGET["schval"]){
mysql_query2("UPDATE towns2_uziv SET typ='6' WHERE id=".$_MYGET["schval"]);
dc("towns2_uziv");
}
if($_MYGET["heslo"]){
mysql_query2("UPDATE towns2_uziv SET heslo='81dc9bdb52d04dc20036dbd8313ed055' WHERE id=".$_MYGET["heslo"]);
dc("towns2_uziv");
}
if($_MYGET["smazat"]){
smazatuziv($_MYGET["smazat"]);
}

foreach(hnet2("towns2_uziv","SELECT meno,id FROM towns2_uziv WHERE typ = '7'") as $row){
echo($row["meno"]."( <b><a href=\"".gv("?schval=".$row["id"])."\">ano</a></b> / <b><a href=\"".gv("?smazat=".$row["id"])."\">ne</a></b> )<br/>");	
}
echo("<hr/>");
foreach(hnet2("towns2_uziv","SELECT meno,id FROM towns2_uziv WHERE typ != '7'") as $row){
echo($row["meno"]."( <b><a href=\"".gv("?smazat=".$row["id"])."\">ne</a></b> / <b><a href=\"".gv("?heslo=".$row["id"])."\">heslo</a></b>)<br/>");	
}
?>