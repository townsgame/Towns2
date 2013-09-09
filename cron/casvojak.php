<?php
if(session_id() == '')
{
    session_save_path(__DIR__ . "/../sessions");
}
$root = __DIR__ . "/../";
require_once(__DIR__ . "/../" . "general.php");
require_once(__DIR__ . "/../casti/funkcie/index.php");
require_once(__DIR__ . "/../casti/funkcie/vojak.php");

// UTOK
foreach(premhnet("SELECT * FROM towns2_utok WHERE ".time().">cas ORDER BY id") as $row){

//------------------------
$odpoved1 = mysql_query("SELECT utokna,zivot,obrazok FROM towns2 WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$utokna = $row1["utokna"];
$zivot = $row1["zivot"];
$obrazok = $row1["obrazok"];
} mysql_free_result($odpoved1);
$odpoved1 = mysql_query("SELECT " . $GLOBALS["name"] . "  FROM towns2_uni WHERE obrazok='".$obrazok."'");
while ($row1 = mysql_fetch_array($odpoved1)) {
$obrazok1 = $obrazok;
$obrazok = $row1[$GLOBALS["name"]];
} mysql_free_result($odpoved1);
//------------------------

$vysledok = vojakboj($row["vojak"],$zivot,$utokna,$row1["obrazok"]/*(sqrt(pow(($row["xc"]-$row["xc2"]),2)+pow(($row["yc"]-$row["yc2"]),2)))*/ );
if(is_string($vysledok)){

$odpoved1 = mysql_query("select vojaci from towns2_uziv where id = ".$row["od"]);
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
$poutok = premhnet("SELECT poutok FROM towns2_uni WHERE obrazok='".$obrazok1."'");
$poutok = $poutok["poutok"];

if($poutok){
	echo($poutok);
$url = $_SESSION["roota"]."casti/jednotky/poutok/".$poutok.".php";
$_SESSION["ineid"] = vlastnikxcyc1($row["xc"],$row["yc"]);
$_SESSION["uid"] = $row["od"];
require($url);
}

//------------------------------------------
zprava1(vlastnikxcyc1($row["xc"],$row["yc"]),"\$GLOBALS[\'zprava2\']" . " ".profil1($row["od"])." " . "\$GLOBALS[\'zprava3\']" . " ".qpxy1($row["xc"],$row["yc"]),"\$GLOBALS[\'zprava4\']" . " (" . "\$GLOBALS[\'zprava5\']" . " $zivot) " . "\$GLOBALS[\'zprava16\']." /*. " ".profil1($row["od"])." ".vojaktext($row["vojak"])." " .  "\$GLOBALS[\'zprava16\']" . " ".vojaktext($vysledok).". "*/.$_SESSION["zprava2"]);
zprava1($row["od"],"\$GLOBALS[\'zprava7\']" . " ".profil1(vlastnikxcyc1($row["xc"],$row["yc"])) . " ". "\$GLOBALS[\'zprava8\']" ." ".qpxy1($row["xc"],$row["yc"]),"\$GLOBALS[\'zprava4\']" . " (" . "\$GLOBALS[\'zprava5\']" . " $zivot) " . "\$GLOBALS[\'zprava16\']." /*. " ".vojaktext($row["vojak"])." " .  "\$GLOBALS[\'zprava16\']." /*. " ".vojaktext($vysledok)."."*/.$_SESSION["zprava1"]);

mysql_query("UPDATE towns2 SET obrazok='0', cas=1, zivot=0, napis='', budovanas='', vlastnik='1' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
dcmapa($row["xc"],$row["yc"]);
}else{

mysql_query("UPDATE towns2 SET zivot=$vysledok WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
dcmapa($row["xc"],$row["yc"]);

zprava1(vlastnikxcyc1($row["xc"],$row["yc"]),"\$GLOBALS[\'zprava2\']" . " ".profil1($row["od"])." " . "\$GLOBALS[\'zprava3\']" . " ".qpxy1($row["xc"],$row["yc"]),"\$GLOBALS[\'zprava10\']" . " (" . "\$GLOBALS[\'zprava5\']" . " $zivot) " . "\$GLOBALS[\'zprava11\']" . " ".intval($vysledok)." " . "\$GLOBALS[\'zprava12\']"  . " " . "\$GLOBALS[\'zprava13\']" . " ".profil1($row["od"])." " . "\$GLOBALS[\'zprava14\']" . ".");
zprava1($row["od"],"\$GLOBALS[\'zprava7\']" . " ".profil1(vlastnikxcyc1($row["xc"],$row["yc"])) . " ". "\$GLOBALS[\'zprava8\']" . " ".qpxy1($row["xc"],$row["yc"]),"\$GLOBALS[\'zprava10\']" . " (" . "\$GLOBALS[\'zprava5\']" . " $zivot) " . "\$GLOBALS[\'zprava11\']" . " ".intval($vysledok)." " . "\$GLOBALS[\'zprava15\']" . ".");
}

mysql_query("DELETE FROM towns2_utok WHERE id = ".$row["id"]);

dcmapa($row["xc"], $row["yc"]);
dc("towns2_utok");
//dc("towns2");

}

$nexttime = premhnet("SELECT MIN(cas) FROM towns2_utok");
$nexttime = $nexttime["cas"]; 

echo("<br />All good.");
?>