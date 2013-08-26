<?php
require("casti/funkcie/index.php"); 
ini_set("max_execution_time",10000);


$odpoved1 = mysql_query("SELECT id FROM townsuziv WHERE typ='9'");
$pocetz = mysql_num_rows($odpoved1);

$x = intval((time()-file_get_contents("lastbot.txt"))/500)*$pocetz; 
echo($x);
while ($x > 0){
file_put_contents("lastbot.txt",time());
mysql_query("UPDATE townsuziv SET aktivita = ".time()."-(RAND()*172800) WHERE typ = '9' AND RAND() > 0.999 ");

$odpoved =mysql_query("select townsmesuziv.mesto from townsuziv,townsmesuziv where townsuziv.typ = '9' AND townsmesuziv.uzivatel = townsuziv.id");
$pocet = rand(1,mysql_num_rows($odpoved));
//echo(mysql_error());
while ($row = mysql_fetch_array($odpoved)) { $pocet = $pocet-1; if($pocet==0){ $skript = "vlastnik = '".$row["mesto"]."' AND "; }}
mysql_free_result($odpoved);
echo $skript;
//$hrac = "61";
$akce = 1;
// 1 - stavba
// 2 - utoky
mysql_query("UPDATE townsuziv SET aktivita = ".time()." $skript 1");
if($akce == "1"){
//echo("ddddd");
//------------------------------------------------------------------------------------------
// sklad >>->> tdrevo,tkamen,tzelezo,pole
// tdrevo >>->> vlajka,banka
// tkamen >>->> dom,velkydom
// tzelezo >>->> schromazdiste,kasarny
// pole >>->> sklad
// vlajka >>->> veza
// banka >>->> ambasada,trziste
// schromazdiste >>->> veza
// kasarny >>->> vez
// veza >>->> sklad
// ambasada >>->> sklad
// trziste >>->> veza
// dom >>->> veza
// velkydom >>->> veza
$odpoved = mysql_query("SELECT obrazok,xc,yc,vlastnik FROM towns WHERE $skript (obrazok = 'sklad' or obrazok = 'tdrevo' or obrazok = 'tkamen' or obrazok = 'tzelezo' or obrazok = 'pole' or obrazok = 'vlajka' or obrazok = 'banka' or obrazok = 'schromazdiste' or obrazok = 'kasarny' or obrazok = 'vez' or obrazok = 'ambasada' or obrazok = 'trziste' or obrazok = 'dom' or obrazok = 'velkydom')");
while ($row = mysql_fetch_array($odpoved)) {
if(rand(1,5) == 3 and !$q){

if($row['obrazok'] == "sklad"){
$rnd = rand(1,4);
if($rnd == 1){ $postavit = "tdrevo"; }
if($rnd == 2){ $postavit = "tkamen"; }
if($rnd == 3){ $postavit = "tzelezo"; }
if($rnd == 4){ $postavit = "pole"; }
}
if($row['obrazok'] == "tdrevo"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "vlajka"; }
if($rnd == 2){ $postavit = "banka"; }
}
if($row['obrazok'] == "tkamen"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "dom"; }
if($rnd == 2){ $postavit = "velkydom"; }
}
if($row['obrazok'] == "tzelezo"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "schromazdiste"; }
if($rnd == 2){ $postavit = "kasarny"; }
}
if($row['obrazok'] == "pole"){
$postavit = "sklad";
}
if($row['obrazok'] == "vlajka"){
$postavit = "veza";
}
if($row['obrazok'] == "banka"){
$rnd = rand(1,2);
if($rnd == 1){ $postavit = "ambasada"; }
if($rnd == 2){ $postavit = "trziste"; }
}
if($row['obrazok'] == "schromazdiste"){
$postavit = "veza";
}
if($row['obrazok'] == "kasarny"){
$postavit = "veza";
}
if($row['obrazok'] == "veza"){
$postavit = "sklad";
}
if($row['obrazok'] == "ambasada"){
$postavit = "sklad";
}
if($row['obrazok'] == "trziste"){
$postavit = "veza";
}
if($row['obrazok'] == "dom"){
$postavit = "veza";
}
if($row['obrazok'] == "velkydom"){
$postavit = "veza";
}
//------------------------------------------
$odpoved1 =mysql_query("select xc,yc from towns where xc = ".($row["xc"]+1)." AND yc = ".$row["yc"]." AND obrazok='0'");
//echo(mysql_error());
while ($row1 = mysql_fetch_array($odpoved1)) { $xc = $row1["xc"]; $yc = $row1["yc"]; }
mysql_free_result($odpoved1);
//------------------------------------------
$odpoved1 =mysql_query("select xc,yc from towns where xc = ".($row["xc"]-1)." AND yc = ".$row["yc"]." AND obrazok='0'");
while ($row1 = mysql_fetch_array($odpoved1)) { $xc = $row1["xc"]; $yc = $row1["yc"]; }
mysql_free_result($odpoved1);
//------------------------------------------
$odpoved1 =mysql_query("select xc,yc from towns where xc = ".$row["xc"]." AND yc = ".($row["yc"]+1)." AND obrazok='0'");
while ($row1 = mysql_fetch_array($odpoved1)) { $xc = $row1["xc"]; $yc = $row1["yc"]; }
mysql_free_result($odpoved1);
//------------------------------------------
$odpoved1 =mysql_query("select xc,yc from towns where xc = ".$row["xc"]." AND yc = ".($row["yc"]-1)." AND obrazok='0'");
while ($row1 = mysql_fetch_array($odpoved1)) { $xc = $row1["xc"]; $yc = $row1["yc"]; }
mysql_free_result($odpoved1);
//------------------------------------------

//echo("5555555555555555");
mysql_query/*echo*/("UPDATE towns SET vlastnik='".$row["vlastnik"]."', obrazok='$postavit',cas=2, casovac = (SELECT casovac2 From townsuni Where obrazok = '$postavit') + ".(time()).", zivot=100 WHERE xc='$xc' AND yc='$yc'");


$zprava = ($row["obrazok"].">>".$postavit." ".$row["xc"]." - ".$row["yc"].">>".$xc." - ".$yc." ").$zprava;
$q = 1;
}
}
mysql_free_result($odpoved);


//------------------------------------------------------------------------------------------
}else{

$odpoved1 = mysql_query("SELECT xc,yc FROM towns WHERE $skript obrazok = 'schromazdiste' LIMIT 0,1");
while ($row1 = mysql_fetch_array($odpoved1)) {
$xc = $row1["xc"];
$yc = $row1["yc"];
}
mysql_free_result($odpoved1);

$odpoved1 = mysql_query("SELECT xc,yc FROM towns WHERE obrazok != '0' LIMIT ".rand(0,1000).",1");
while ($row1 = mysql_fetch_array($odpoved1)) {
$xc1 = $row1["xc"];
$yc1 = $row1["yc"];
}
mysql_free_result($odpoved1);

$v = rand(1,50);
$s = rand(0,20);
$k = rand(0,22);
$r = rand(0,20);
$j = rand(0,20);
$t = rand(0,10);
$z = rand(0,10);
$b = rand(0,5);
$a = rand(0,5);
$e = rand(0,4);
$n = rand(0,4);
$d = rand(0,4);
$m = rand(0,2);
$asa=("(v$v,s$s,k$k,r$r,j$j,t$t,z$z,b$b,a$a,e$e,n$n,d$d,m$m)");



$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsutok");
$row1 = mysql_fetch_array($odpoved1);
$pocetz=$row1["maxId"];
mysql_free_result($odpoved1);
$pocetz = $pocetz+1;
   
mysql_query("INSERT INTO `townsutok` ( `id` , `cas` , `xc` , `yc` , `xczo` , `yczo` , `xc2` , `yc2` , `vojak` )
VALUES (
$pocetz, 1, $xc1 , $yc1 , $xc1 , $yc1 , $xc , $yc , '$asa'
);");   





$zprava = ("zautoceno ".$asa).$zprava;
}
$x=$x-1;
}

alog("bot skript vykonany ".$zprava,0);

echo("hotovo ".$zprava);
?>
