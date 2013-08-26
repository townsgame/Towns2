<?php eval(file_get_contents("casti/jazyk/cz.txt")); ?>
<?php
if($_POST["hrac"]){
if(md5($_POST["heslo_a"]) == hnet("towns2_uziv","SELECT heslo FROM towns2_uziv WHERE id=".$_SESSION["id"])){
if($_POST["hrac"] != $_SESSION["id"]){
mysql_query("UPDATE towns2_uziv SET ali=0, hodnost='', pravomoci='0,0,0,0,0,0' WHERE ali = ".$_SESSION["ali"]." AND id = ".$_POST["hrac"]);
chyba2("Hráč ".profil($_POST["hrac"])." byl vyhozen.");
dc("towns2_uziv");
}else{
chyba1("nemůžete vyhodit sebe");
}
}else{
chyba1("chybné heslo");
}
}
?>
<br/><form action="<?php gv("?submenu=6"); ?>" method="post">
 	<select name="hrac" size="0">
	 <option value="" selected="selected">---</option>
<?php
foreach(hnet2("towns2_uziv","SELECT id,meno FROM towns2_uziv WHERE ppp AND ali = ".$_SESSION["aliance"]) as $row){
$profil = profil($row["hrac"]);
echo(" 	<option value=\"".$row["id"]."\">".$row["meno"]."</option>");
}
?>
</select>
<b>vaše heslo:</b>
<input type="password" name="heslo_a">
<input type="submit" value="OK">
</form>