<?php
require("casti/funkcie/index.php");
require("casti/funkcie/vojak.php");  
ini_set("max_execution_time",10000);

if($_GET["heslo"] != "hovnokleslo"){
chyba1("spatne heslo");
die();
}

mysql_query("UPDATE towns SET vlastnik = '1' WHERE obrazok = '0'");
//mysql_query("UPDATE towns SET cas=1 WHERE cas=2");
//mysql_query("UPDATE towns SET obrazok = '0', cas = '1' WHERE cas=3");

//drevo----------------------------------------------------
mysql_query("UPDATE townsmes SET townsmes.drevo = townsmes.drevo + 1000*(SELECT COUNT( towns.vlastnik ) from towns where towns.vlastnik = townsmes.id AND towns.obrazok = 'tdrevo' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) GROUP by towns.vlastnik UNION SELECT '0' LIMIT 0,1)");


$odpoved =mysql_query("SELECT (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) from towns where obrazok = 'tdrevo' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'les' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE towns SET obrazok = '0' WHERE xc=".$row[0]." and yc=".$row[1]);
}
$kolko = mysql_num_rows($odpoved);
mysql_free_result($odpoved);

if(rand(1,2) == 1){
$xcxc = "+1";
}else{
$xcxc = "-1";
}
if(rand(1,2) == 1){
$ycyc = "+1";
}else{
$ycyc = "-1";
}


$odpoved =mysql_query("SELECT 1,xc,yc FROM towns WHERE obrazok = '0' AND (SELECT obrazok From towns towns2 WHERE obrazok = 'les' AND towns2.xc = towns.xc$xcxc and towns2.yc = towns.yc$ycyc)='les' UNION SELECT 2,xc,yc FROM towns WHERE obrazok='0' ORDER BY 1,rand() LIMIT 0,$kolko");
while ($row = mysql_fetch_array($odpoved)) {

mysql_query("UPDATE towns SET obrazok = 'les' WHERE xc=".$row["xc"]." and yc=".$row["yc"]);
echo(pxy($row["xc"],$row["yc"]));


}
mysql_free_result($odpoved);
//kamen--------------------------------------------------------
mysql_query("UPDATE townsmes SET townsmes.kamen = townsmes.kamen + 1000*(SELECT COUNT( towns.vlastnik ) from towns where towns.vlastnik = townsmes.id AND towns.obrazok = 'tkamen' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) GROUP by towns.vlastnik UNION SELECT '0' LIMIT 0,1)");


$odpoved =mysql_query("SELECT (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) from towns where obrazok = 'tkamen' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'kamen' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE towns SET obrazok = '0' WHERE xc=".$row[0]." and yc=".$row[1]);
}
$kolko = mysql_num_rows($odpoved);
mysql_free_result($odpoved);

if(rand(1,2) == 1){
$xcxc = "+1";
}else{
$xcxc = "-1";
}
if(rand(1,2) == 1){
$ycyc = "+1";
}else{
$ycyc = "-1";
}


$odpoved =mysql_query("SELECT 1,xc,yc FROM towns WHERE obrazok = '0' AND (SELECT obrazok From towns towns2 WHERE obrazok = 'kamen' AND towns2.xc = towns.xc$xcxc and towns2.yc = towns.yc$ycyc)='kamen' UNION SELECT 2,xc,yc FROM towns WHERE obrazok='0' ORDER BY 1,rand() LIMIT 0,$kolko");
while ($row = mysql_fetch_array($odpoved)) {

mysql_query("UPDATE towns SET obrazok = 'kamen' WHERE xc=".$row["xc"]." and yc=".$row["yc"]);
echo(pxy($row["xc"],$row["yc"]));


}
mysql_free_result($odpoved);
//zelezo----------------------------------------------------------

mysql_query("UPDATE townsmes SET townsmes.zelezo = townsmes.zelezo + 1000*(SELECT COUNT( towns.vlastnik ) from towns where towns.vlastnik = townsmes.id AND towns.obrazok = 'tzelezo' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) GROUP by towns.vlastnik UNION SELECT '0' LIMIT 0,1)");


$odpoved =mysql_query("SELECT (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1),(SELECT towns2.yc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) from towns where obrazok = 'tzelezo' AND (SELECT towns2.xc  FROM towns towns2 WHERE sqrt(pow(towns2.xc-towns.xc,2)+pow(towns2.yc-towns.yc,2)) < 10 AND towns2.obrazok = 'zelezo' LIMIT 1) ORDER by towns.xc,towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE towns SET obrazok = '0' WHERE xc=".$row[0]." and yc=".$row[1]);
}
$kolko = mysql_num_rows($odpoved);
mysql_free_result($odpoved);

if(rand(1,2) == 1){
$xcxc = "+1";
}else{
$xcxc = "-1";
}
if(rand(1,2) == 1){
$ycyc = "+1";
}else{
$ycyc = "-1";
}


$odpoved =mysql_query("SELECT 1,xc,yc FROM towns WHERE obrazok = '0' AND (SELECT obrazok From towns towns2 WHERE obrazok = 'zelezo' AND towns2.xc = towns.xc$xcxc and towns2.yc = towns.yc$ycyc)='zelezo' UNION SELECT 2,xc,yc FROM towns WHERE obrazok='0' ORDER BY 1,rand() LIMIT 0,$kolko");
while ($row = mysql_fetch_array($odpoved)) {

mysql_query("UPDATE towns SET obrazok = 'zelezo' WHERE xc=".$row["xc"]." and yc=".$row["yc"]);
echo(pxy($row["xc"],$row["yc"]));


}
mysql_free_result($odpoved);
//---------------------------------------------------
/*
echo("hlaska1");
$odpoved =mysql_query("select towns.vlastnik,towns.obrazok,townssur.odxc,townssur.odyc from townssur,towns WHERE townssur.odxc=towns.xc AND townssur.odyc=towns.yc");
while ($row = mysql_fetch_array($odpoved)) {
if($row["obrazok"] == "tkamen"){
$obrazok = "kamen";
}
if($row["obrazok"] == "tdrevo"){
$obrazok = "drevo";
}
if($row["obrazok"] == "tzelezo"){
$obrazok = "zelezo";
}
echo("hlaska2");
surovinames($row["vlastnik"],$obrazok,"+",1000);
//mysql_query("DELETE from townssur WHERE odxc=".$row["odxc"]." AND odyc= ".$row["odyc"]);
}
mysql_free_result($odpoved);
*/




//--------------------------------------------nullacia---------------------------
mysql_query("UPDATE townsuziv SET body=0");
mysql_query("UPDATE townsmes SET body=0");
mysql_query("UPDATE townsali SET body=0");
mysql_query("UPDATE townsmes SET ludia=0");
mysql_query("UPDATE townsmes SET ludiamax=0");
echo("hlaska3");
//------------------------------------------body a ludia-------------------------
/*
$odpoved =mysql_query("select towns.vlastnik,townsuni.kamen,townsuni.drevo,townsuni.ludia,townsuni.pludia from towns,townsuni WHERE townsuni.obrazok=towns.obrazok AND towns.obrazok != '0'");
//echo(mysql_error());
while ($row = mysql_fetch_array($odpoved)) {
//echo($row["kamen"]);
echo("hlaska4");
//-------------------------------------body---------------
mysql_query("UPDATE townsmes SET  body=body+".($row["drevo"]+$row["kamen"])." WHERE id=".$row["vlastnik"]);
//-------------------------------------ludiamax---------------
mysql_query("UPDATE townsmes SET  ludiamax=ludiamax+".$row["pludia"]." WHERE id=".$row["vlastnik"]);
//-------------------------------------ludia---------------
mysql_query("UPDATE townsmes SET  ludia=ludia+".$row["ludia"]." WHERE id=".$row["vlastnik"]);
}
mysql_free_result($odpoved);
*/
//ludia
//ludiamax
//body
mysql_query("UPDATE townsmes SET ludia = (SELECT SUM(townsuni.ludia) FROM towns,townsuni WHERE towns.vlastnik = id AND towns.obrazok=townsuni.obrazok GROUP BY towns.vlastnik)");
mysql_query("UPDATE townsmes SET ludiamax = (SELECT SUM(townsuni.pludia) FROM towns,townsuni WHERE towns.vlastnik = id AND towns.obrazok=townsuni.obrazok GROUP BY towns.vlastnik)");
mysql_query("UPDATE townsmes SET body = (SELECT SUM(townsuni.drevo) FROM towns,townsuni WHERE towns.vlastnik = id AND towns.obrazok=townsuni.obrazok GROUP BY towns.vlastnik)+(SELECT SUM(townsuni.kamen) FROM towns,townsuni WHERE towns.vlastnik = id AND towns.obrazok=townsuni.obrazok GROUP BY towns.vlastnik)");






//-------------------------------------body z mesta na uzivatela---------------
mysql_query("UPDATE townsuziv SET body = (select townsmes.body from townsmesuziv,townsmes where townsmesuziv.mesto = townsmes.id AND townsmesuziv.uzivatel=townsuziv.id LIMIT 0,1)");
echo("hlaska55");
//-------------------------------------body z uziv na ali---------------
mysql_query("UPDATE townsali SET body = (SELECT SUM( body ) FROM townsuziv WHERE ali = townsali.id GROUP BY ali)");
/*$odpoved =mysql_query("select ali,body from townsuziv");
while ($row = mysql_fetch_array($odpoved)) {
mysql_query("UPDATE townsali SET  body = body+".$row["body"]." WHERE id=".$row["ali"]);
}
mysql_free_result($odpoved);  */
echo("hlaska555");
//--------------------------------------poradie------------------------------------------------
$poradie=0;
$odpoved =mysql_query("select id from townsuziv order by body desc,meno");
while ($row = mysql_fetch_array($odpoved)) {
$poradie = $poradie+1;
echo("hlaska5");
mysql_query("UPDATE townsuziv SET  poradie=$poradie WHERE id=".$row["id"]);
}
mysql_free_result($odpoved);
//--------------------------------------------------------------------------------------
$poradie=0;
$odpoved =mysql_query("select id from townsali order by body desc,meno");
while ($row = mysql_fetch_array($odpoved)) {
$poradie = $poradie+1;
echo("hlaska6");
mysql_query("UPDATE townsali SET  poradie=$poradie WHERE id=".$row["id"]);
}
mysql_free_result($odpoved);
//--------------------------------------------------------------------------------------
$poradie=0;
$odpoved =mysql_query("select id from townsmes order by body desc,meno");
while ($row = mysql_fetch_array($odpoved)) {
$poradie = $poradie+1;
echo("hlaska7");
mysql_query("UPDATE townsmes SET  poradie=$poradie WHERE id=".$row["id"]);
}
mysql_free_result($odpoved);
//--------------------------------------------------------------------------------------


deletecash("townsuziv"); 
deletecash("townsali"); 
deletecash("townsmes"); 


$odpoved =mysql_query("select * from townsld");
while ($row = mysql_fetch_array($odpoved)) {

$kod = rand(111111111,999999999);

mysql_query("INSERT INTO townskod ( kod, prachy , seria ) VALUES
('".($kod*$kod)."', '".$row["prachy"]."', '2')");

zprava($row["hrac"],"příjem z anket","Váš dnešní příjem z anket je ".$row["prachy"]." peněz a je připsán na kód ".$kod);

}
mysql_free_result($odpoved);
mysql_query("TRUNCATE TABLE townsld");

echo("hlaska8");

alog("casovi skript vykonany",1);

/*

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

echo("vojak1");


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
$odpoved1 =mysql_query("select napis from towns where xc = ".$row["xc2"]." AND yc = ".$row["yc2"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$vojaci = $row1["napis"];
}
mysql_free_result($odpoved1);
mysql_query("UPDATE towns SET napis='".vojakplus($vysledok,$vojaci)."' WHERE xc=".$row["xc2"]." AND yc=".$row["yc2"]);
echo mysql_error();
mysql_query("UPDATE towns SET obrazok='', cas=1, zivot=0, napis='', budovanas='' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na x:".$row["xc"]." y:".$row["yc"],"Budova byla zničena a vám zůstalo <br/>".vojaktext($vysledok));
zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"obrana x:".$row["xc"]." y:".$row["yc"],"Budova byla zničena a utočníkovi(městu ".profilm(vlastnikxcyc($row["xc2"],$row["yc2"])).") zůstalo <br/>".vojaktext($vysledok));
}
}else{
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"nelze","nevlastni...");
}
mysql_query("DELETE FROM townsutok WHERE id = ".$row["id"]);
}
mysql_free_result($odpoved); 
echo("vojak2");

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
echo("vojak3");

mail("hejpal@post.cz","cas","vojensky skript vykonany");
*/
?>
