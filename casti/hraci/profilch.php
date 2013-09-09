<?php 
//-------------------------*změna_hesla*-------------
if ($_POST["sheslo"] and $_POST["nheslo"] == $_POST["nheslo2"]){
mysql_query("UPDATE towns2_uziv SET heslo = '".(md5($_POST["nheslo"]))."'   WHERE id = '".$_SESSION["id"]."' AND heslo = '".(md5($_POST["sheslo"]))."'");
dc("towns2_uziv");
if(mysql_affected_rows() > 0){
chyba2($GLOBALS["hprofilch1"]);
}else{
chyba2($GLOBALS["hprofilch2"]);
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
chyba2($GLOBALS["hprofilch3"]);
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
echo($GLOBALS["hprofilch4"] . "<br /><a href=\"".gv("?submenu=4&amp;opravduzrus=".$_POST["heslozrus"]."")."\">" . $GLOBALS["hprofilch5"] . "</a> - <a href=\"?submenu=4\">" . $GLOBALS["hprofilch6"] . "</a>");
}else{
chyba1($GLOBALS["hprofilch2"]);
}
}
if(md5($_MYGET["opravduzrus"]) == $heslozrus2){
smazatuziv($_SESSION["id"]);
session_destroy();
refresh();
}
?>
<h1><?php echo $GLOBALS["hprofilch7"]; ?></h1>

<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>"><input name="ano" type="hidden" id="ano" value="1"  />
<br /><?php echo $GLOBALS["hprofilch8"]; ?>: <input name="menoc" type="text" id="menoc" value="<?php echo $menoc; ?>" size="30" maxlength="200" />
<br /><?php echo $GLOBALS["hprofilch9"]; ?>: <input name="mail" type="text" id="mail" value="<?php echo $mail; ?>" maxlength="50" />
<br /><?php echo $GLOBALS["hprofilch10"]; ?>: <input name="zmail" type="checkbox" id="zmail" value="1" <?php if($zmail){echo "checked=\"checked\"";} ?> />
<br /><?php echo $GLOBALS["hprofilch11"]; ?>: http://<input name="www" type="text" id="www" value="<?php echo $www; ?>" maxlength="50" />/
<br /><?php echo $GLOBALS["hprofil11"]; ?>: <input name="pohlavie" type="radio" value="0" <?php if($pohlavie==0){echo "checked=\"checked\"";} ?>/>
<?php echo $GLOBALS["hprofilch12"]; ?><input name="pohlavie" type="radio" value="1" <?php if($pohlavie==1){echo "checked=\"checked\"";} ?>/>
<?php echo $GLOBALS["hprofil4"]; ?><input name="pohlavie" type="radio" value="2" <?php if($pohlavie==2){echo "checked=\"checked\"";} ?>><?php echo $GLOBALS["hprofil5"]; ?>
<br /><?php echo $GLOBALS["hprofil10"]; ?>: <input name="vek" type="text" id="vek" value="<?php echo $vek; ?>" size="5" maxlength="2" />
<br /><?php echo $GLOBALS["asecond3"]; ?>: <br /><textarea name="popis" rows="10" cols="50" id="popis"><?php echo $popis; ?></textarea>
<br /><?php echo $GLOBALS["hprofilch13"]; ?>: <i><?php echo $GLOBALS["hprofilch14"]; ?></i> <br /><textarea name="podpis" rows="2" cols="50" id="popis"><?php echo $podpis; ?></textarea>
<br /><input type="submit" name="Submit" value="<?php echo $GLOBALS['sbanka11']; ?>" />
</form>

<h1><?php echo $GLOBALS["hprofilch15"]; ?></h1>
<?php
if($_POST["spp"]){
mysql_query("UPDATE towns2_uziv SET glob_sc = ".$_POST["spp"]." WHERE id = '".$_SESSION["id"]."'");
dc("towns2_uziv");
}
?>
<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>">
<?php echo $GLOBALS["hprofilch16"]; ?>: 
<?php $tmp = hnet("towns2_uziv","SELECT glob_sc FROM towns2_uziv WHERE id = '".$_SESSION["id"]."'"); $tmp2 = "selected=\"selected\""; ?>
<select name="spp">
  <option value="1" <?php if($tmp == 1){ echo($tmp2); } ?>><?php echo $GLOBALS["mindex1"]; ?></option>
  <option value="2" <?php if($tmp == 2){ echo($tmp2); } ?>><?php echo $GLOBALS["asecond1"]; ?></option>
  <option value="3" <?php if($tmp == 3){ echo($tmp2); } ?>><?php echo $GLOBALS["hprofilch17"]; ?></option>
  <option value="4" <?php if($tmp == 4){ echo($tmp2); } ?>><?php echo $GLOBALS["hprofilch18"]; ?></option>
  <option value="5" <?php if($tmp == 5){ echo($tmp2); } ?>><?php echo $GLOBALS["hprofilch19"]; ?></option>
  <option value="6" <?php if($tmp == 6){ echo($tmp2); } ?>><?php echo $GLOBALS["hprofilch20"]; ?></option>
  <option value="7" <?php if($tmp == 7){ echo($tmp2); } ?>><?php echo $GLOBALS["hprofilch21"]; ?></option>
</select>
<br />
<br /><input type="submit" name="Submit" value="<?php echo $GLOBALS['sbanka11']; ?>" />
</form>

<h1><?php echo $GLOBALS["hprofilch22"]; ?></h1>

<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>">
<label><?php echo $GLOBALS["hprofilch23"]; ?>: <br />
<input name="sheslo" type="password" id="sheslo" />
<br /><?php echo $GLOBALS["hprofilch24"]; ?>: <br />
<input name="nheslo" type="password" id="nheslo" />
<br /><?php echo $GLOBALS["hprofilch25"]; ?>: <br />
<input name="nheslo2" type="password" id="nheslo2" />
<br /><input type="submit" name="Submit" value="<?php echo $GLOBALS['sbanka11']; ?>" />
</form>

<h1><?php echo $GLOBALS["hprofilch26"]; ?>:</h1>

<form id="form1" name="form1" method="post" action="<?php gv("?submenu=4"); ?>">
<?php echo $GLOBALS["hprofilch27"]; ?>: <input name="heslozrus" type="password" id="heslozrus" />
<input type="submit" name="Submit2" value="<?php echo $GLOBALS['hprofilch28']; ?>" />
</form>