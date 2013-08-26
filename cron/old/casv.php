<?php
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php"); 
ini_set("max_execution_time",10000);

if($_GET["heslo"] != "hovnokleslo"){
chyba1("spatne heslo");
die();
}

$odpoved = mysql_query("SELECT napis,budovanas,vlastnik FROM towns WHERE napis != '' AND obrazok = 'kasarny' AND budovanas != ''");
while ($row = mysql_fetch_array($odpoved)) {
$cena = vojakcena($row["napis"]);
if(zsur2("zelezo",$cena,$row["vlastnik"])){
surovinames($row["vlastnik"],"zelezo","-",$cena);
//--------------------------
eval($row["budovanas"]);
$odpoved1 = mysql_query("SELECT napis FROM towns WHERE xc=$xcc AND yc=$ycc");
while ($row1 = mysql_fetch_array($odpoved1)) {
$vojaci = vojakplus($row["napis"],$row1["napis"]);
}
mysql_free_result($odpoved1);
mysql_query("UPDATE towns set napis = '".$vojaci."' WHERE xc=$xcc AND yc=$ycc");
//--------------------------
zpravames($row["vlastnik"],"trénink vojáků","vytrénováno <br/>".vojaktext($row["napis"])."<br/> za $cena železa");
}else{
zpravames($row["vlastnik"],"trénink vojáků","Nedostatek železa.");
}
}
mysql_free_result($odpoved);




$odpoved =mysql_query("select * from townsutok ORDER BY id");
while ($row = mysql_fetch_array($odpoved)) {
if(vlastnikxcyc($row["xc"],$row["yc"]) == vlastnikxcyc($row["xczo"],$row["yczo"])){
//------------------------
$odpoved1 = mysql_query("SELECT utokna,zivot FROM towns WHERE xc=".$row["xczo"]." AND yc=".$row["yczo"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$utokna = $row1["utokna"];
$zivot = $row1["zivot"];
} mysql_free_result($odpoved1);
//------------------------
$vysledok = vojakboj($row["vojak"],$zivot,$utokna,    (sqrt(pow(($row["xczo"]-$row["xc2"]),2)+pow(($row["yczo"]-$row["yc2"]),2)))    );
if(!is_string($vysledok)){
mysql_query("UPDATE towns SET zivot=$vysledok WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na x:".$row["xc"]." y:".$row["yc"]," Ztratil jste všechny jednotky a budově zůstalo $vysledok životů.");
zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"obrana x:".$row["xc"]." y:".$row["yc"],"Útočník(město ".profilm(vlastnikxcyc($row["xc2"],$row["yc2"])).") Ztratil všechny jednotky a budově zůstalo $vysledok životů.");
}else{
$odpoved1 =mysql_query("select napis from towns where xc = ".$row["xc"]." AND yc = ".$row["yc"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$vojaci = $row1["napis"];
}
mysql_free_result($odpoved1);
//mysql_query("UPDATE towns SET napis=".vojakplus($vysledok,$vojaci)." WHERE xc=".$row["xc2"]." AND yc=".$row["yc2"]);
mysql_query("UPDATE towns SET obrazok='', cas=1, zivot=0, napis='', budovanas='' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na x:".$row["xc"]." y:".$row["yc"],"Budova byla zničena a vám zůstalo <br/>".vojaktext($vysledok));
zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"obrana x:".$row["xc"]." y:".$row["yc"],"Budova byla zničena a utočníkovi(městu ".profilm(vlastnikxcyc($row["xc2"],$row["yc2"])).") zůstalo <br/>".vojaktext($vysledok));
}
}else{
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"nelze","nevlastni...");
}
//mysql_query("DELETE FROM townsutok WHERE id = ".$row["id"]);
}
mysql_free_result($odpoved);


mysql_query("UPDATE towns SET utokna = 
(SELECT celkovyUtok
FROM 
(SELECT b.xc,b.yc, sum(townsuni.utok) celkovyUtok
FROM towns a,towns b,townsuni
WHERE a.vlastnik = b.vlastnik AND
 townsuni.utok != 0 AND
 townsuni.obrazok = a.obrazok AND
 ABS(a.xc - b.xc) <= townsuni.vutok AND
 ABS(a.yc - b.yc) <= townsuni.vutok AND
 pow(townsuni.vutok,2) >= pow(a.xc - b.xc,2) + pow(a.yc - b.yc,2)
GROUP BY b.xc,b.yc
) xtownstmp 
WHERE xtownstmp.xc=towns.xc AND xtownstmp.yc=towns.yc)");



echo("hotovo");
mail("hejpal@post.cz","cas","vojensky skript vykonany");
?>