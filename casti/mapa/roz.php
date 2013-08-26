<?php
$xc3 = $_GET["xc"];
$yc3 = $_GET["yc"];
$o=intval(abs($_POST["o"]));
if(!$o){ $o=1; }

//echo($_GET["xc"]." / ".$_GET["yc"]." - ");
//echo("SELECT vlastnik FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3);
$vlastnik = hnet("towns2","SELECT vlastnik FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3);
if($vlastnik != $_SESSION["id"]){
$stav = "Vlastník této budovy je ".profil($vlastnik)." .";
}

if(hnet("towns2","SELECT obrazok FROM towns2 WHERE xc=".$xc3." AND yc=".$yc3) == "0"){
$stav = "Na tomto políčku není žádná budova. ";
}

$drevo = hnet("towns2","SELECT drevo FROM towns2_uni WHERE obrazok=(SELECT obrazok FROM towns2 WHERE xc=$xc3 AND yc=$yc3)",1)/2;
$kamen = hnet("towns2","SELECT kamen FROM towns2_uni WHERE obrazok=(SELECT obrazok FROM towns2 WHERE xc=$xc3 AND yc=$yc3)",1)/2;
if(!zsur("drevo",$drevo*$o) or !zsur("kamen",$kamen*$o)){
$stav = "Nedostatek surovin. ";
}

if($stav){
echo($stav);
}else{
echo("Budova rozšířena o ".$o." úrovní.");
surovinanew($_SESSION["id"],"drevo","-",$drevo*$o);
surovinanew($_SESSION["id"],"kamen","-",$kamen*$o);
mysql_query2("UPDATE towns2 SET uroven=uroven+".$o." WHERE xc=$xc3 AND yc=$yc3");
dc("towns2");
dcmapa($xc3,$yc3);
}
?>
 <a href="<?php echo gv("?dir=casti/mapa/drag.php&amp;glob_sc=1"); ?>">zpět</a>
<form method="POST" action="?xc=<?php echo $_GET["xc"]; ?>&amp;yc=<?php echo $_GET["yc"]; ?>">
Rozšířit o dalších <input type="text" size="2" name="o"> úrovní.
<input type="submit" name="Submit" value="OK" />
</form>