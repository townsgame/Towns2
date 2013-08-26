<?php 
//-------------------------*změna_hesla*-------------
if ($_POST["sheslo"] and $_POST["nheslo"] == $_POST["nheslo2"]){
mysql_query("UPDATE towns2_uziv SET heslo = '".(md5($_POST["nheslo"]))."'   WHERE id = '".$_SESSION["id"]."' AND heslo = '".(md5($_POST["sheslo"]))."'");
dc("towns2_uziv");
if(mysql_affected_rows() > 0){
chyba2("Heslo změněno");
}else{
chyba2("Špatné heslo");
}
}
//-------------------------*změna_profilu*-----------
if ($_POST["ano"]){
mysql_query("UPDATE `towns2_uziv` SET "
."popis = '".($_POST["popis"])."' , "
."podpis = '".($_POST["podpis"])."' , "
."pohlavie = '".($_POST["pohlavie"])."' , "
."vek = '".($_POST["vek"])."' , "
."mail = '".($_POST["mail"])."' , "
."zmail = '".($_POST["zmail"])."' , "
."www = '".($_POST["www"])."' , "
."menoc = '".($_POST["menoc"])."'
 WHERE id = '".$_SESSION["id"]."'");
dc("towns2_uziv");
dc("towns2_dis");
chyba2("Nastavení změněno");
}
//-------------------------*info_zisk*-----------
$tmp = hnet2("towns2_uziv","select * from towns2_uziv WHERE id='".$_SESSION["id"]."'");
$row = $tmp[0];
 	$popis = $row["popis"];
 	$podpis = $row["podpis"];
 	$pohlavie = $row["pohlavie"];
 	$vek = $row["vek"];
 	$mail = $row["mail"];
 	$zmail = $row["zmail"];
 	$www = $row["www"];
 	$menoc = $row["menoc"];
//-------------------------*zruš učet*-----------
$heslozrus2 = hnet("towns2_uziv","SELECT heslo FROM towns2_uziv WHERE id='".$_SESSION["id"]."'");

if($_POST["heslozrus"]){
if(md5($_POST["heslozrus"]) == $heslozrus2){
echo("Opravdu chcete zrušit účet?<br /><a href=\"".gv("?submenu=4&amp;opravduzrus=".$_POST["heslozrus"]."")."\">ano</a> - <a href=\"?submenu=4\">ne</a>");
}else{
chyba1("špatné heslo");
}
}
if(md5($_MYGET["opravduzrus"]) == $heslozrus2){
smazatuziv($_SESSION["id"]);
session_destroy();
refresh();
}
?>
<h1>Změna profilu</h1>

<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>"><input name="ano" type="hidden" id="ano" value="1"  />
<br/>Celé jméno: <input name="menoc" type="text" id="menoc" value="<?php echo $menoc; ?>" size="30" maxlength="200" />
<br/>Váš e-mail: <input name="mail" type="text" id="mail" value="<?php echo $mail; ?>" maxlength="50" />
<br/>Zobrazovat váš e-mail jiným uživatelům: <input name="zmail" type="checkbox" id="zmail" value="1" <?php if($zmail){echo "checked=\"checked\"";} ?> />
<br/>Váš web: http://<input name="www" type="text" id="www" value="<?php echo $www; ?>" maxlength="50" />/
<br/>Pohlaví: <input name="pohlavie" type="radio" value="0" <?php if($pohlavie==0){echo "checked=\"checked\"";} ?>/>
nevyplněno<input name="pohlavie" type="radio" value="1" <?php if($pohlavie==1){echo "checked=\"checked\"";} ?>/>
muž<input name="pohlavie" type="radio" value="2" <?php if($pohlavie==2){echo "checked=\"checked\"";} ?>>žena
<br/>Věk: <input name="vek" type="text" id="vek" value="<?php echo $vek; ?>" size="5" maxlength="2" />
<br/>Popis: <br/><textarea name="popis" rows="10" cols="50" id="popis"><?php echo $popis; ?></textarea>
<br/>Podpis: <i>Bude se zobrazovat ve fóru.</i> <br/><textarea name="podpis" rows="2" cols="50" id="popis"><?php echo $podpis; ?></textarea>
<br/><input type="submit" name="Submit" value="změnit" />
</form>

<h1>Změna nastavení</h1>
<?php
if($_POST["spp"]){
mysql_query("UPDATE towns2_uziv SET glob_sc = ".$_POST["spp"]." WHERE id = '".$_SESSION["id"]."'");
dc("towns2_uziv");
}
if($_POST["spp_2"]){
mysql_query("UPDATE towns2_uziv SET typ_menu = ".$_POST["spp_2"]." WHERE id = '".$_SESSION["id"]."'");
dc("towns2_uziv");
}
?>
<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>">
Sekce po přihlášení: 
<?php $tmp = hnet("towns2_uziv","SELECT glob_sc FROM towns2_uziv WHERE id = '".$_SESSION["id"]."'"); $tmp2 = "selected=\"selected\""; ?>
<select name="spp">
  <option value="1" <?php if($tmp == 1){ echo($tmp2); } ?>>Mapa</option>
  <option value="2" <?php if($tmp == 2){ echo($tmp2); } ?>>Aliance</option>
  <option value="3" <?php if($tmp == 3){ echo($tmp2); } ?>>Statistika</option>
  <option value="4" <?php if($tmp == 4){ echo($tmp2); } ?>>F&oacute;rum</option>
  <option value="5" <?php if($tmp == 5){ echo($tmp2); } ?>>Suroviny</option>
  <option value="6" <?php if($tmp == 6){ echo($tmp2); } ?>>&Uacute;toky</option>
  <option value="7" <?php if($tmp == 7){ echo($tmp2); } ?>>Zpr&aacute;vy</option>
</select>
<br/>
Typ menu: 
<?php $tmp = hnet("towns2_uziv","SELECT typ_menu FROM towns2_uziv WHERE id = '".$_SESSION["id"]."'"); $tmp2 = "selected=\"selected\""; ?>
<select name="spp_2">
  <option value="1" <?php if($tmp == 1){ echo($tmp2); } ?>>HTML</option>
  <option value="2" <?php if($tmp == 2){ echo($tmp2); } ?>>Flash</option>
</select>
<br/><input type="submit" name="Submit" value="změnit" />
</form>

<h1>Změna hesla</h1>

<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>">
<label>Staré heslo: <br />
<input name="sheslo" type="password" id="sheslo" />
<br />Nové heslo: <br />
<input name="nheslo" type="password" id="nheslo" />
<br />Nové heslo potvrzení: <br />
<input name="nheslo2" type="password" id="nheslo2" />
<br/><input type="submit" name="Submit" value="změnit" />
</form>

<h1>Zrušit účet:</h1>

<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>">
Heslo: <input name="heslozrus" type="password" id="heslozrus" />
<input type="submit" name="Submit2" value="zruš" />
</form>