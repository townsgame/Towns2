<?php  
$kasaren=budova("kyasarny");

if($_POST["anov"]){
//$odpoved = hnet("towns2_uziv","SELECT vojacit FROM towns2_uziv WHERE id='".$_SESSION["id"]."'");
$vojaci = vojakvlozx();

$cena = vojakcena($vojaci);
if(($kasaren*10000) >= $cena){
if(zsur("zelezo",$cena)){
//surovinanew($_SESSION["id"],$row["vlastnik"],"zelezo","-",$cena);
//echo("<b>---------------------------------------------</b>");

//$vojaci = vojakvlozx();
//echo($vojaci);
mysql_query("UPDATE towns2_uziv SET vojacit = '".$vojaci ."' WHERE id=".$_SESSION["id"]);
dc("towns2_uziv");

chyba2($GLOBALS["ukasarny1"]);
}else{
chyba1($GLOBALS["ukasarny2"]);
}
}else{
chyba1($GLOBALS["ukasarny3"] . " ".zformatovat($kasaren*10000)." " . $GLOBALS["skod7"] . ".");
}
}
//----------------------------------------------------------------------------------------------------
$napis = $vojaci = hnet("towns2_uziv","SELECT vojacit FROM towns2_uziv WHERE id='".$_SESSION["id"]."'");
echo("<b>" . $GLOBALS["ukasarny4"] . ": </b>".zformatovat(vojakcena($napis))." " . $GLOBALS["skod7"] . "<br />");
echo("<b>" . $GLOBALS["ukasarny5"] . ": </b>".$kasaren."<br />");
// echo("<b>" . $GLOBALS["ukasarny6"] . ": </b>");
echo($GLOBALS["training"]); //pocitadlodo();
vojakvloz($napis,"OK");
//----------------------------------------------------------------------------------------------------
?>

<?php zobraztbl(1); ?>