<form id="form1" name="form1" method="post" action="">
  <label>
<?php
eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
if($_POST["komu"]){
if(zkuz($_POST["komu"])){

$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM townszpr");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;

$odpoved =mysql_query("select id from townsuziv WHERE meno='".$_POST["komu"]."'");
while ($row = mysql_fetch_array($odpoved)) {	 	 	 
 	$komu = $row["id"];
}

$zpravax = convert($_POST["text"]);
mysql_query("INSERT INTO townszpr VALUES('".$pocet."','".$_SESSION["id"]."', '".$komu."', '0',CURRENT_TIMESTAMP , '".$_POST["predmet"]."', '".$zpravax."')");
//echo(mysql_error());
echo("$xodeslanozp<br />");
}else{
echo("$xneexsist<br />");
}
}


$odpoved =mysql_query("select meno from townsuziv WHERE id='".$_GET["piszpr"]."'");
while ($row = mysql_fetch_array($odpoved)) {	 	 	 
 	$komu = $row["meno"];
}
?>
   <?php echo $xkomuzp; ?><br />
  <input name="komu" type="text" id="komu" value="<?php echo($komu); ?>" size="20" maxlength="20" />
  <br />
  <?php echo $xpredmetzp; ?><br />
  <input name="predmet" type="text" id="predmet" size="20" maxlength="20" />
  <br />
  <?php echo $xtextzp; ?><br />
  <textarea name="text" cols="15" rows="10" id="text"></textarea>
  </label>
  <br />
  <label>
  <input type="submit" name="Submit" value="<?php echo $xodeslatzp; ?>" />
  </label>
</form>
