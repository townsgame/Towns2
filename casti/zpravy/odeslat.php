<form id="form1" name="form1" method="post" action="<?php gv("?submenu=2"); ?>">
<?php
//eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
if($_POST["ano"]){
if(vyberhraca()){

$komu2 = vyberhraca();
$komu = vyberhraca();
$tmp = hnet("towns2_zpr","SELECT MAX(id) FROM towns2_zpr")+1;

$zpravax = convert($_POST["text"]);
mysql_query("INSERT INTO towns2_zpr VALUES($tmp,'".$_SESSION["id"]."', '".$komu2."', '0',CURRENT_TIMESTAMP , '".convert($_POST["predmet"])."', '".$zpravax."')");
echo(mysql_error());
echo($GLOBALS["zodeslat1"] . "<br />");
deletecash("towns2_zpr");
}else{
echo($GLOBALS["findex30"] . "<br />");
}
}

$komu = hnet("towns2_uziv","select meno from towns2_uziv WHERE id='".$_MYGET["piszpr"]."'");
$textzpr = zpravback(hnet("towns2_zpr","select zprava from towns2_zpr WHERE id = '".$_MYGET["piszpr2"]."'"));
$textzpr = strip_tags(htmlspecialchars_decode($textzpr));
if($textzpr){$textzpr = ("

------------------
").$textzpr;}
$predmet = hnet("towns2_zpr","select predmet from towns2_zpr WHERE id = '".$_MYGET["piszpr2"]."'");
if($predmet){
$predmet = "RE: ".($predmet);
}else{
$predmet = "";
}

?> <input type="hidden" name="ano" value="1">
   <?php echo $GLOBALS["zodeslat2"]; ?>:<br />
   <?php zadajhraca(1,"",1,$komu) ?>
  <br />
  <?php echo $GLOBALS["zodeslat3"]; ?>:<br />
  <input name="predmet" type="text" id="predmet" size="20" maxlength="20" value="<?php echo($predmet); ?>" />
  <br />
  <?php echo $GLOBALS["zodeslat4"]; ?>:<br />
  <textarea name="text" cols="70" rows="10" id="text"><?php echo($textzpr); ?></textarea>
  <br />
  <input type="submit" name="Submit" value="<?php echo $GLOBALS['zodeslat5']; ?>" />
</form>
