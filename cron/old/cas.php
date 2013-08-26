<?php
require("casti/funkcie/index.php");
require("casti/funkcie/vojak.php");  
ini_set("max_execution_time",10000);

$odpoved =mysql_query("select * from townsutok WHERE ".time().">cas ORDER BY id");
if(mysql_num_rows($odpoved)){

}
while ($row = mysql_fetch_array($odpoved)) {
//eval(vojakrozloz($row["vojak"]));
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
//------------------------
$odpoved1 = mysql_query("SELECT utokna,zivot,obrazok FROM towns WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);
while ($row1 = mysql_fetch_array($odpoved1)) {
$utokna = $row1["utokna"];
$zivot = $row1["zivot"];
$obrazok = $row1["obrazok"];
} mysql_free_result($odpoved1);
$odpoved1 = mysql_query("SELECT meno FROM townsuni WHERE obrazok='".$obrazok."'");
while ($row1 = mysql_fetch_array($odpoved1)) {
$obrazok = $row1["meno"];
} mysql_free_result($odpoved1);
//------------------------
$vysledok = vojakboj($row["vojak"],$zivot,$utokna,    (sqrt(pow(($row["xc"]-$row["xc2"]),2)+pow(($row["yc"]-$row["yc2"]),2)))    );
if(is_string($vysledok)){

$odpoved1 =mysql_query("select napis from towns where xc = ".$row["xc2"]." AND yc = ".$row["yc2"]);
while ($row1 = mysql_fetch_array($odpoved1)) { $vojaci = $row1["napis"]; }
mysql_free_result($odpoved1);
mysql_query("UPDATE towns SET napis='".vojakplus($vysledok,$vojaci)."' WHERE xc=".$row["xc2"]." AND yc=".$row["yc2"]);
mysql_query("UPDATE towns SET obrazok='0', cas=1, zivot=0, napis='', budovanas='' WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);

//$row["xc2"],$row["yc2"] policko na ktore sa utocilo
//$row["vojak"]na zaciatku
//$vysledok zostali vojaci
//$zivot na zaciatku
//0 zivot na konci

zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"město ".qprofilm(vlastnikxcyc($row["xc2"],$row["yc2"]))."".qpxy($row["xc2"],$row["yc2"])." zaůtočilo na vaši budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budova $obrazok (původně s životem $zivot) byla zničena a z vojska města ".qprofilm(vlastnikxcyc($row["xc2"],$row["yc2"]))."".pxy($row["xc2"],$row["yc2"])."  ".vojaktext($row["vojak"])." zbylo ".vojaktext($vysledok).".");
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na město ".qprofilm(vlastnikxcyc($row["xc"],$row["yc"]))." budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budova $obrazok (původně s životem $zivot) byla zničena a z vašeho vojska ".vojaktext($row["vojak"])." zbylo ".vojaktext($vysledok).".");
}else{

mysql_query("UPDATE towns SET zivot=$vysledok WHERE xc=".$row["xc"]." AND yc=".$row["yc"]);


//$row["xc2"],$row["yc2"] policko na ktore sa utocilo
//$row["vojak"] na zaciatku
//.1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0) zostali vojaci
//$zivot na zaciatku
//$vysledok  zivot na konci

//echo vlastnikxcyc($row["xc"],$row["yc"]);
//echo "město ".qprofilm(vlastnikxcyc($row["xc2"],$row["yc2"]))."".qpxy($row["xc2"],$row["yc2"])." zaůtočilo na vaši budovu $obrazok".qpxy($row["xc"],$row["yc"]);
//echo "Budově $obrazok (původně s životem $zivot) zbylo ".intval($vysledok)." životů a vojsko ".vojaktext($row["vojak"])." města ".qprofilm(vlastnikxcyc($row["xc2"],$row["yc2"]))." bylo zničeno.";

zpravames(vlastnikxcyc($row["xc"],$row["yc"]),"město ".qprofilm(vlastnikxcyc($row["xc2"],$row["yc2"]))."".qpxy($row["xc2"],$row["yc2"])." zaůtočilo na vaši budovu $obrazok".qpxy($row["xc"],$row["yc"]),"Budově $obrazok (původně s životem $zivot) zbylo ".intval($vysledok)." životů a vojsko ".vojaktext($row["vojak"])." města ".qprofilm(vlastnikxcyc($row["xc2"],$row["yc2"]))." bylo zničeno.");
zpravames(vlastnikxcyc($row["xc2"],$row["yc2"]),"útok na město ".qprofilm(vlastnikxcyc($row["xc"],$row["yc"]))." budovu $obrazok","Budově $obrazok (původně s životem $zivot) zbylo ".intval($vysledok)." životů a vaše vojsko bylo zničeno.");
}


mysql_query("DELETE FROM townsutok WHERE id = ".$row["id"]);
}
mysql_free_result($odpoved); 
?>
<?php
mysql_query("UPDATE townsuziv SET aktivita = ".time().", lastip = '".$_SERVER["REMOTE_ADDR"]."' WHERE id = ".$_SESSION["id"]);
mysql_query("UPDATE towns SET cas = '1', casovac=NULL WHERE cas = '2' and casovac < ".time());
?>