<?php
foreach(hnet2("towns2_utok","select * from towns2_utok WHERE ".time().">cas ORDER BY id") as $row){
//------------------------
$odpoved1 = mysql_query("SELECT utokna,zivot,obrazok FROM towns2 WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$utokna = $row1["utokna"];
$zivot = $row1["zivot"];
$obrazok = $row1["obrazok"];
} mysql_free_result($odpoved1);
$odpoved1 = mysql_query("SELECT meno FROM towns2_uni WHERE obrazok='".$obrazok."'");
while ($row1 = mysql_fetch_array($odpoved1)) {
$obrazok1 = $obrazok;
$obrazok = $row1["meno"];
} mysql_free_result($odpoved1);
//------------------------
$vysledok = vojakboj($row["vojak"],$zivot,$utokna,$row1["obrazok"]/*(sqrt(pow(($row["xc"]-$row["xc2"]),2)+pow(($row["yc"]-$row["yc2"]),2)))*/ );
if(is_string($vysledok)){

$odpoved1 =mysql_query("select vojaci from towns2_uziv where id = ".$row["od"]);
while ($row1 = mysql_fetch_array($odpoved1)) { $vojaci = $row1["vojaci"]; }
mysql_free_result($odpoved1);
echo($vysledok."/".$vojaci);
mysql_query("UPDATE towns2_uziv SET vojaci='".vojakplus($vysledok,$vojaci)."' WHERE id = ".$row["od"]);
//mysql_query("UPDATE towns2 SET obrazok='0', cas=1, zivot=0, napis='', budovanas='', vlastnik='1' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
dc("towns2_uziv");
//dcmapa($row["xc"],$row["yc"]);

//$row["xc2"],$row["yc2"] policko na ktore sa utocilo
//$row["vojak"]na zaciatku
//$vysledok zostali vojaci
//$zivot na zaciatku
//0 zivot na konci
//-------------------/poutok/---------------
$_SESSION["zprava1"] = "";
$_SESSION["zprava2"] = "";
$poutok = hnet("towns2_uni","SELECT poutok FROM towns2_uni WHERE obrazok='".$obrazok1."'");
if($poutok){
	echo($poutok);
$url = $_SESSION["roota"]."casti/jednotky/poutok/".$poutok.".php";
$_SESSION["ineid"] = vlastnikxcyc($row["xc"],$row["yc"]);
$_SESSION["uid"] = $row["od"];
require($url);
}
//------------------------------------------
zprava(vlastnikxcyc($row["xc"],$row["yc"]),"Hráč ".profil($row["od"])." zaútočil na vaši budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budova $obrazok (původně s životem $zivot) byla zničena a z vojska hráče ".profil($row["od"])." ".vojaktext($row["vojak"])." zbylo ".vojaktext($vysledok).". ".$_SESSION["zprava2"]);
zprava($row["od"],"Útok na hráče ".profil(vlastnikxcyc($row["xc"],$row["yc"]))." budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budova $obrazok (původně s životem $zivot) byla zničena a z vašeho vojska ".vojaktext($row["vojak"])." zbylo ".vojaktext($vysledok).".".$_SESSION["zprava1"]);

mysql_query("UPDATE towns2 SET obrazok='0', cas=1, zivot=0, napis='', budovanas='', vlastnik='1' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
dcmapa($row["xc"],$row["yc"]);
}else{

mysql_query("UPDATE towns2 SET zivot=$vysledok WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
dcmapa($row["xc"],$row["yc"]);

zprava(vlastnikxcyc($row["xc"],$row["yc"]),"Hráč ".profil($row["od"])." zaútočil na vaši budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budově $obrazok (původně s životem $zivot) zbylo ".intval($vysledok)." životů a vojsko ".vojaktext($row["vojak"])." hráče ".profil($row["od"])." bylo zničeno.");
zprava($row["od"],"Útok na hráče ".profil(vlastnikxcyc($row["xc"],$row["yc"]))." budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budově $obrazok (původně s životem $zivot) zbylo ".intval($vysledok)." životů a vaše vojsko bylo zničeno.");
}


mysql_query("DELETE FROM towns2_utok WHERE id = ".$row["id"]);
dc("towns2_utok");
}
$nexttime = hnet("towns2_utok","SELECT MIN(cas) FROM towns2_utok");
?>