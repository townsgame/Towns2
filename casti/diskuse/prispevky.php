<?php
if($_SESSION["typ"]==7){
chyba1($GLOBALS["hprispevky1"]);
}

if($_MYGET["tema"]){
$_SESSION["tema"] = $_MYGET["tema"];
}
?>
<a href="<?php echo gv("?dir=casti/diskuse/index.php"); ?>"><?php echo $GLOBALS["hprispevky2"]; ?></a><br />
<a href="<?php echo gv("?dir=casti/diskuse/prispevok.php"); ?>"><?php if($_SESSION["id"]){ echo($GLOBALS["hprispevky3"]); } ?></a>
<SCRIPT LANGUAGE="JavaScript">
<!--
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=400');");
}
-->
</script>


<!-- STEP TWO: Use the following link to open the new window -->
<br />
<?php $locked = new index("towns2_tem","SELECT typ FROM towns2_tem WHERE ppp");  $locked = $locked->get("id = '".$_SESSION['tema']."'");  $locked= $locked[0]; if($locked == 2){ echo($GLOBALS["hprispevky4"]); } ?>
<?php
//ravas lv unger icos kopis ra lv hx vas dx kopij lv
if($_MYGET["del"]){
$odpoved = mysql_query("select meno from towns2_dis where id=".$_MYGET["del"]);
while ($row = mysql_fetch_array($odpoved)) {
$meno = $row["meno"];
}
mysql_free_result($odpoved);
if($meno == $_SESSION["id"] or $_SESSION["id"]==1){
logx("delete ".$_MYGET["del"]);
mysql_query("DELETE from towns2_dis where id=".$_MYGET["del"]);
mysql_query("DELETE FROM towns2_tem WHERE (SELECT count(id) from towns2_dis WHERE tema = towns2_tem.id)= 0");
deletecash("towns2_dis");
deletecash("towns2_tem");
}else{
chyba1($GLOBALS["hprispevky5"]);
}
}
//-----------------------
if($_MYGET["edit_forum"]){
logx("EDIT pris ".$_POST["nadpis_e"]." ".$_POST["pris_e"]);
mysql_query("UPDATE towns2_dis SET nadpis='".cenzura(convert($_POST["nadpis_e"]))."', text='".cenzura(convert($_POST["pris_e"]))."' WHERE id='".$_MYGET["edit_forum"]."' AND meno='".$_SESSION["id"]."'");
dc("towns2_dis");
}
//-----------------------

$nadpis=cenzura(convert($_POST['nadpis']));
$pris=$_POST['pris'];
$meno=$_SESSION['id'];
if ($pris AND $_SESSION['id']) {
if($locked != "2" or $_SESSION["typ"] < 6){
if($_SESSION["typ"]==7){
chyba1($GLOBALS["hprispevky1"]);
}else{
$pris=cenzura(convert($pris));



$odpoved1 = mysql_query("SELECT MAX(id) maxId FROM towns2_dis");
$row1 = mysql_fetch_array($odpoved1);
$pocet1=$row1["maxId"];
mysql_free_result($odpoved1);
$pocet = $pocet1+1;


//echo("<h3>".$GLOBALS['hprispevky6']."</h3>");
logx("new pris $nadpis in ".$_SESSION['tema']." ".$pris);
$sql = "INSERT INTO towns2_dis VALUES (".$pocet.",'".$_SESSION['tema']."', '".$nadpis."', '".$meno."', '".$pris."', CURRENT_TIMESTAMP)";
//echo($sql);
mysql_query($sql);
deletecash("towns2_dis");
deletecash("towns2_tem"); 
//echo (mysql_error());
//echo $sql ;
}
}else{
chyba1($GLOBALS["hprispevky4"]);
}
}
?>
<?php
//echo(hnet("towns2_tem","SELECT 1 FROM towns2_tem WHERE  sekce<50 OR sekce=100+".$_SESSION["ali"]));
if(!hnet("towns2_tem","SELECT 1 FROM towns2_tem WHERE id=".$_SESSION['tema']." AND (sekce<50 OR sekce=100+".$_SESSION["ali"].")")){ chyba3(); }
foreach(hnet2("towns2_dis","SELECT (SELECT towns2_uziv.podpis FROM towns2_uziv WHERE towns2_dis.meno=towns2_uziv.id),id,tema,nadpis,meno,text,cas from towns2_dis WHERE ppp AND tema='".$_SESSION['tema']."' order by id") as $row){
$podpis = "";
if($row[0]){
$podpis = "<br /><div style=\"color: #999999;\" >__________________<br />".convert($row[0],$row["meno"])."</div>";
}
//$odpoved = mysql_query("select * from towns2_dis where tema='".$_SESSION['tema']."' order by id");
//while ($row = mysql_fetch_array($odpoved)) {
$meno = profil($row["meno"]);
$smaz = "";
if($row["meno"] == $_SESSION["id"] or $_SESSION["id"]==1){
$smaz = "<a href=\"".gv("?del=".$row["id"])."\"><img src=\"casti/desing/no.bmp\" width=\"15\" height=\"15\" border=\"1\"></a> <a href=\"".gv("?dir=casti/diskuse/prispevok_edit.php&amp;tema=".$_SESSION['tema']."&amp;edit_forum=".$row["id"]."")."\"><img src=\"casti/desing/edit.png\" width=\"15\" height=\"15\" border=\"1\"></a>";
}

echo("<br /><br /><div align=\"left\"><div id=\"menu3\"><span class=\"submenu\">".$row["nadpis"]." ($xnapsal".$meno." ".(zcas($row["cas"])).") $smaz</span></div></div>".htmlspecialchars_decode($row["text"])."<br />".$podpis."<br />");
}

//mysql_free_result($odpoved);


?>