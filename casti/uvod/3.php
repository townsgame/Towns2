<?php                        
/*
//echo $_SESSION["obrazokk"];
if(1 == 0 and $_POST["menor"] and $_POST["heslor"] and $_POST["mailr"] and $_POST["mestor"]){
if($_POST["kod"] == $_SESSION["obrazokk"]){
if($_POST["heslor"] == $_POST["heslo2r"]){
if($_POST["pravidlar"] == "1"){

$odpoved1 = mysql_query("SELECT id FROM townsuziv WHERE meno = '".$_POST["menor"]."'");
$row1 = mysql_fetch_array($odpoved1);
mysql_free_result($odpoved1);
if(!$row1){
//chyba1("chyba registrace");
//die();
//-------------------------------------------------------------------------
eval(file_get_contents("reg.txt"));
//-------------------------------------------------------------------------
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsuziv");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;
$heslor=crypt($_POST["heslor"],"PH");

mysql_query("
INSERT INTO `townsuziv` ( `id` ,`typ` , `meno`, `ali` , `body` , `poradie`, `heslo` , `popis` , `pohlavie` , `vek` , `mail` , `zmail` , `www`, `mestozal`,  `lista`) 
VALUES (
'$pocet',7 , '".$_POST["menor"]."', '0', '0', '0', '$heslor', '', '0', '0', '".$_POST["mailr"]."', '".$_POST["zmailr"]."', '','0','lista(2); lista(4); lista(6); lista(8); lista(3); lista(5); lista(7);'
);
");
echo(mysql_error());

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townsmes");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet2 = $pocet1+1;
mysql_query("
INSERT INTO `townsmes` ( `id` , `meno` , `popis`, `body` , `poradie`, `hlbudovaxc` , `hlbudovayc` , `prachy` , `jedlo` , `kamen`, `zelezo` , `drevo`, `ludia`, `ludiamax` ) 
VALUES (
'$pocet2', '".$_POST["mestor"]."', '',  '0', '0','$xcreg', '$ycreg', '5000', '5000', '5000', '5000', '5000','0','0'
);
");




mysql_query("
INSERT INTO `townsmesuziv` ( `mesto` , `uzivatel` , `prava`) 
VALUES (
'$pocet2', '$pocet', 'admin'
);
");

mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='hlbudova'), cas=1, obrazok = 'hlbudova', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='dom'), cas=1, obrazok = 'dom', vlastnik = '$pocet2' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='sklad'), cas=1, obrazok = 'sklad', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+0));
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='tdrevo'), cas=1, obrazok = 'tdrevo', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+1));
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from townsuni WHERE townsuni.obrazok='tkamen'), cas=1, obrazok = 'tkamen', vlastnik = '$pocet2' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg-1));

$zpravax = $xdopis1.$_POST["menor"].$xdopis2;
$zpravax = nl2br(htmlspecialchars($zpravax));
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townszpr");
$row1 = mysql_fetch_array($odpoved1);
$pocetz=$row1["maxId"];
mysql_free_result($odpoved1);
$pocetz = $pocetz+1;
mysql_query("INSERT INTO townszpr VALUES('".$pocetz."','1', '$pocet', '0',CURRENT_TIMESTAMP , 'Vítejte v Towns', '".$zpravax."')");

alog("new user ".$_POST["menor"],1);
chyba2($xpodekovani);
}else{
chyba1("uživatel již existuje");
}
}else{
chyba1($xmusitesouhlasit);
}
}else{
chyba1($xheslanicht );
}
}else{
chyba1($xkodneopsany);
}
} 
*/
//---------------------------------------------------------------------------
if($_POST["ano"]){
//-------------------
if(!$_POST["heslor"]){
	chyba1("Nezadali jste heslo.");
}elseif(!$_POST["kod"]){
	chyba1("Musíte opsat kód z obrázku.");
}elseif($_POST["kod"] != $_SESSION["obrazokk"]){
	chyba1("Neopsali jste správně text z obrázku.");
}elseif($_POST["heslor"] != $_POST["heslo2r"]){
	chyba1("Hesla nejsou stejná.");
}elseif(!$_POST["menor"]){
	chyba1("Nezadali jste jméno.");
}elseif(!trim($_POST["menor"])){
	chyba1("Jméno se nedá skládat pouze s mezer.");
}elseif(hnet("towns2_uziv","SELECT id FROM towns2_uziv WHERE meno = '".trim($_POST["menor"])."'")){
	chyba1("Jméno je už obsazeno.");
}elseif(!$_POST["pravidlar"]){
	chyba1("Musíte souhlasit s pravidly hry.");
}elseif(is_numeric($_POST["menor"])){
	chyba1("Jméno nemůže být pouze číslo.");
}elseif(vyberxc() xor vyberyc()){
	chyba1("Musíte zadat x i y nebo ani jedno. (Při nezadání pozice se pozice vygeneruje sama.)");
}elseif(vyberxc() and 25 != hnet("towns2","SELECT COUNT(1) FROM towns2 WHERE obrazok = '0' AND pozadie != '10' AND xc > ".(vyberxc()+0)."-1-2 AND yc > ".(vyberyc()+0)."-1-2 AND xc < ".(vyberxc()+0)."+1+2 AND yc < ".(vyberyc()+0)."+1+2")){
	chyba1("Vedle tohoto políčka není dost místa. (Při nezadání pozice se pozice vygeneruje sama.)");
	//echo("==".vyberxc()."==");
}else{

$pocet = nextid();
$poradie = 1+hnet("towns2_uziv","SELECT MAX(poradie) FROM towns2_uziv");
if(!vyberxc()){
eval(file_get_contents("reg.txt"));
}else{
$xcreg = vyberxc();
$ycreg = vyberyc();
}
//mysql_query("UPDATE towns2 SET pozadie='19' WHERE xc > ".($xcreg+0)."-1-3 AND yc > ".($ycreg+0)."-1-3 AND xc < ".($xcreg+0)."+1+3 AND yc < ".($ycreg+0)."+1+3");
logx("new user ".$_POST["menor"]." heslo ".$_POST["heslor"]." ($xcreg,$ycreg) id:$pocet poradie:$poradie");
mysql_query("INSERT INTO towns2_uziv (id,typ,meno,ali,body,poradie,heslo,lista,aktivita,farba,vojaci,vojacit,hlbudovaxc,hlbudovayc,jedlo,prachy,kamen,zelezo,drevo) 
VALUES ($pocet,7,'".trim($_POST["menor"])."',0,100,$poradie,'".md5($_POST["heslor"])."','".file_get_contents("casti/lavalista/zakladne.txt")."','".time()."','user','.1(v10,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)','.1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)',$xcreg,$ycreg,150,150,150,150,150)");
//echo(mysql_error());
mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='hlbudova'), cas=1, obrazok = 'hlbudova', vlastnik = '$pocet' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+0));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='dom'), cas=1, obrazok = 'dom', vlastnik = '$pocet' WHERE xc = ".($xcreg+0)." AND  yc = ".($ycreg+1));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='sklad'), cas=1, obrazok = 'sklad', vlastnik = '$pocet' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+0));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='tdrevo'), cas=1, obrazok = 'tdrevo', vlastnik = '$pocet' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg+1));
//mysql_query("UPDATE towns2 SET zivot=(SELECT zivot from towns2_uni WHERE towns2_uni.obrazok='tkamen'), cas=1, obrazok = 'tkamen', vlastnik = '$pocet' WHERE xc = ".($xcreg+1)." AND  yc = ".($ycreg-1));
dc("towns2_uziv");
dc("towns2");
dcmapa($xcreg,$ycreg);

if(!$_POST["regpr"]){
	chyba2("Vaše registrace proběhla úspěšně. <a href=\"".gv("?dirn=1&amp;glob_sc=1")."\">přihlásit se</a>");
}else{
	$_SESSION["id"] = $pocet;
	$_SESSION["kontrolid"] = $pocet;
	refresh();
}
}
//-------------------
}
?>
<form id="form4" name="form4" method="post" action="<?php echo gv("?logof=0"); ?>">
<table>
<tr align="left"><th>*Jméno:</th><th> <input name="menor" type="text" id="menor" maxlength="20" value="<?php echo $_POST["menor"]; ?>" /></th></tr>
<tr align="left"><th>*Heslo:</th><th> <input name="heslor" type="password" id="heslor" value="<?php echo $_POST["heslor"]; ?>" /></th></tr>
<tr align="left"><th>*Heslo znovu:</th><th> <input name="heslo2r" type="password" id="heslo2r" value="<?php echo $_POST["heslo2r"]; ?>" /></th></tr>
<tr align="left">
  <td><span style="font-weight: bold">Začáteční pozice<sup>1</sup></span>:
    <br />
    <br /></td>
  <th align="left" valign="top"><?php zadajxcyc()?> <i>nepovinné</i></th>
</tr>
<tr align="left"><th colspan="2"><textarea name="textarea" cols="50" rows="10" readonly="readonly">1)Hra
1.1) Všechny herní chyby (tzn. Bugy) musí být okamžitě nahlášeny administrátorovi a nesmí se používat ke zvýhodňování účtu nebo poškozování hry. Porušení může vést k potrestání hráče.
1.2) Každý hráč musí dbát na slušné chování. Admin může změnit(nebo smazat) nevhodné názvy účtů, aliancí, nadpisů, atd. či bez jakéhokoliv upozornění.
1.3) Admin má neomezené pravomoci a vyhrazuje si možnost změnit tato pravidla.
2)Hráči
2.2)Každý člověk může vlastnit maximálně 5 účtů.</textarea></th></tr>
<tr align="left">
  <th colspan="2">*
  <input <?php if($_POST["pravidlar"]){ echo("checked"); } ?> name="pravidlar" type="checkbox" id="pravidlar" value="1" />Přečetl jsem pravidla hry.</th></tr>
<tr align="left"><th colspan="2">*Opište kód z obrázku: <img src="obrazok.php<?php if($_POST["kod"] == $_SESSION["obrazokk"] and $_SESSION["obrazokk"]){ $kodmus = rand(1000,9999); echo "?kodmus=".$kodmus; } ?>" width="52" height="25" border="2" /> <input name="kod" type="text" id="kod" value="<?php echo($kodmus); ?>"/></th></tr>  
<tr align="left"><th colspan="2"><input name="ano" type="hidden" id="ano" value="1" /><input type="submit" name="Submit2" value="registrovat" /></th></tr>
<tr align="left"><th colspan="2"><input <?php if($_POST["regpr"]){ echo("checked"); } ?> name="regpr" type="checkbox" id="regpr" value="1" />
  Po registraci se hned přihlásit. 
</tr>
</table>
<br />
<span style="font-style: italic"><sup>1</sup>Pokud máte vybranou pozici na mapě kde chcete začínat napište ji sem.</span>