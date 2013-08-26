<?php
eval(file_get_contents("casti/jazyk/cz.txt"));

if($_MYGET["forum"]){
$_SESSION["forum"] = $_MYGET["forum"];
}
if(!$_SESSION["forum"]){
die($xchybafora);
}

$nadpis=cenzura(convert($_POST['nadpis']));
$pris=cenzura(convert($_POST['pris']));

if ($pris AND $_SESSION['id']) {       
if ($_SESSION['obrazokk'] == $_POST['kodd']) {	
if ($_SESSION["forum"] != 1 or $_SESSION["typ"]<6) {


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

//echo("<h3>děkuji za váš příspěvek</h3>");
$sql = "INSERT INTO townsdis VALUES (".$pocet.",'".$_SESSION['tema']."', '".$nadpis."', '".$_SESSION['id']."', '".$pris."', CURRENT_TIMESTAMP)";
alog("new tem $nadpis",1);
//echo($sql);
mysql_query($sql);
//echo (mysql_error());
//echo $sql ;
deletecash("towns2_tem"); 
}else{
chyba1($xdoteto);
}

}else{
chyba1($xkodneopsany);
}}
?>

<a href="<?php echo gv("?dir=casti/diskuse/fora.php"); ?>"><?php echo($xzpet); ?></a><br />
<a href="<?php echo gv("?dir=casti/diskuse/tema.php"); ?>">
<?php if($_SESSION["id"]){ echo("přidej nové téma"); } ?>
</a><br /> 
<strong><?php echo($xtemata); ?></strong><br />
  <?php
themes("sekce = '".$_SESSION["forum"]."'",10000);
?>