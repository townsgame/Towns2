<br/>
<?php
if($_POST["kod"]){
$tmp = hnet2("towns2_kod","SELECT * FROM towns2_kod WHERE kod='".$_POST["kod"]."'");
$tmp = $tmp[0];
if(!$tmp["kod"]){
chyba1("Neplatný kód!");
}elseif($tmp["hrac"]){
chyba1("Tento kód byl už použit!");
}else{
//===================================
logx("usekod ".$_POST["kod"]);
if($tmp["prachy"]){
chyba2("Přidáno ".$tmp["prachy"]." peněz.");
surovinanew($_SESSION["id"],"prachy","+",$tmp["prachy"]);
}
if($tmp["jedlo"]){
chyba2("Přidáno ".$tmp["jedlo"]." jídla.");
surovinanew($_SESSION["id"],"jedlo","+",$tmp["jedlo"]);
}
if($tmp["kamen"]){
chyba2("Přidáno ".$tmp["kamen"]." kamene.");
surovinanew($_SESSION["id"],"kamen","+",$tmp["kamen"]);
}
if($tmp["zelezo"]){
chyba2("Přidáno ".$tmp["zelezo"]." železa.");
surovinanew($_SESSION["id"],"zelezo","+",$tmp["zelezo"]);
}
if($tmp["drevo"]){
chyba2("Přidáno ".$tmp["drevo"]." dřeva.");
surovinanew($_SESSION["id"],"drevo","+",$tmp["drevo"]);
}
if($tmp["vojaci"]){
vojakzobraz($tmp["vojaci"]);
$tmpi = vojakplus(hnet("towns2_uziv","SELECT vojaci FROM towns2_uziv WHERE id='".$_SESSION["id"]."'"),$tmp["vojaci"]);
mysql_query2("UPDATE towns2_uziv SET vojaci='".$tmpi."' WHERE id='".$_SESSION["id"]."'");
}
if($tmp["typ"] AND $tmp["typ"]!=1){
chyba2("Váš typ byl změněn na ".typuziv($tmp["typ"]).".");
mysql_query2("UPDATE towns2_uziv SET typ=".$tmp["typ"]." WHERE id='".$_SESSION["id"]."'");
//echo("UPDATE towns2_uziv SET typ=".($tmp["typ"])." WHERE id='".$_SESSION["id"]."'");
}


mysql_query2("UPDATE towns2_kod SET hrac='".$_SESSION["id"]."' WHERE kod='".$_POST["kod"]."'");
dc("towns2_uziv");
dc("towns2_kod");
//===================================
}
if($_POST["kod"]=="adminbudova"){
chyba2("adminbudova");
mysql_query2("UPDATE towns2 SET cas='1', casovac='0' WHERE vlastnik=".$_SESSION["id"]);
dc("towns2_uziv");
dc("towns2");
}
}
?>

<form id="form1" name="form1" method="post" action="">
<b>Zadejte kód:</b>
<input name="kod" type="text" id="kod" value="" />

<input type="submit" name="Submit" value="odeslat" />
</form>
