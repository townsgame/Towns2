<?php
if($_SESSION["typ"]==7){
chyba1($GLOBALS["disindex1"]);
}

//echo($_SESSION["forum"]);

$_SESSION["uzivatel"] = "ano";
if($_MYGET["forum"]){
$_SESSION["forum"] = $_MYGET["forum"];
}
if(!$_SESSION["forum"]){
$_SESSION["forum"] = 1;
}

if($_SESSION["forum"] == "1"){
chyba1($GLOBALS["disindex2"]);
}

$nadpis=cenzura(convert($_POST['nadpis']));
$pris=cenzura(convert($_POST['pris']));

if ($pris AND $_SESSION['uzivatel']) {       

if ($_SESSION["forum"] != 1 or $_SESSION["typ"]<6) {
if($_SESSION["typ"]==7){
chyba1($GLOBALS["disindex1"]);
}else{
$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_tem");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;


$sql = "INSERT INTO towns2_tem VALUES (".$pocet.",'1','".$_SESSION["forum"]."','".$nadpis."')";
//echo($sql);
mysql_query($sql);

$_SESSION['tema'] = $pocet;







$pris=convert($pris);



$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_dis");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;

//echo("<h3>" . $GLOBALS["disindex2a"] . "</h3>");
$sql = "INSERT INTO towns2_dis VALUES (".$pocet.",'".$_SESSION['tema']."', '".$nadpis."', '".$_SESSION['id']."', '".$pris."', CURRENT_TIMESTAMP)";
logx("new tem $nadpis ".$pris);
//echo($sql);
mysql_query($sql);
//echo (mysql_error());
//echo $sql ;
deletecash("towns2_tem");
}
}else{
chyba1($GLOBALS["disindex2"]);
}}
?>

<a href="<?php echo gv("?dir=casti/diskuse/fora.php"); ?>"><?php echo $GLOBALS["disindex2b"]; ?></a><br />
<a href="<?php echo gv("?dir=casti/diskuse/tema.php"); ?>">
<?php if($_SESSION["uzivatel"]){ echo($GLOBALS["disindex3"]); } ?>
</a><br /> 
<strong><?php echo $GLOBALS["disindex4"]; ?></strong><br />
  <?php
themes("sekce = '".$_SESSION["forum"]."'","0,10000");
?>