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

chyba2("Zadáno");
}else{
chyba1("Nedostatek železa");
}
}else{
chyba1("Lze vytrénovat pouze vojáky za ".zformatovat($kasaren*10000)." železa.");
}
}
//----------------------------------------------------------------------------------------------------
$napis = $vojaci = hnet("towns2_uziv","SELECT vojacit FROM towns2_uziv WHERE id='".$_SESSION["id"]."'");
echo("<b>Cena: </b>".zformatovat(vojakcena($napis))." železa<br/>");
echo("<b>Kasáren: </b>".$kasaren."<br/>");
echo("<b>Zbývá: </b>");
pocitadlodo();
vojakvloz($napis,"OK");
//----------------------------------------------------------------------------------------------------
?>

<?php zobraztbl(1); ?>