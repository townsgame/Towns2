<?php

if(!mysql_connect("mysql_host","kostlivec_eu","heslo190077")){
die("Databáze je nefunkèní!");
}
mysql_select_db("kostlivec_eu");

$x = 15000;
while ($x > 0){
//mysql_set_charset("utf8");
//
mysql_query("SELECT debil from usagi");
echo($x."</br>");
$x=$x-1;
}

if(mysql_query("SELECT debil from usagi")){
echo("funguje");
}

?>