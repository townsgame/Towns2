<?php
$vojaci = hnet("towns2_uziv","SELECT vojaci FROM towns2_uziv WHERE id='".$_SESSION["id"]."' AND ppp");
//---------------------
if($_POST["anov"]){
$xcyc = hnet("towns2","SELECT sqrt(pow(".vyberxcyc("1")."-xc,2)+pow(".vyberxcyc("2")."-yc,2)) FROM towns2 WHERE vlastnik=".$_SESSION["id"]." AND obrazok='schromazdiste' ORDER BY sqrt(pow(".vyberxcyc("1")."-xc,2)+pow(".vyberxcyc("2")."-yc,2))","0,1");
$hlbudovaxc = hnet("towns2","SELECT xc FROM towns2 WHERE vlastnik=".$_SESSION["id"]." AND obrazok='schromazdiste' ORDER BY sqrt(pow(".vyberxcyc("1")."-xc,2)+pow(".vyberxcyc("2")."-yc,2))","0,1");
$hlbudovayc = hnet("towns2","SELECT yc FROM towns2 WHERE vlastnik=".$_SESSION["id"]." AND obrazok='schromazdiste' ORDER BY sqrt(pow(".vyberxcyc("1")."-xc,2)+pow(".vyberxcyc("2")."-yc,2))","0,1");
if(budova("schromazdiste") != 0){
if(vojakv(vojakvlozx(),$vojaci)){
$tmp = hnet("towns2","SELECT 1 FROM towns2 WHERE xc=".vyberxcyc("1")." AND yc=".vyberxcyc("2")." AND obrazok!='les' AND obrazok!='0' AND obrazok!='kamen' AND obrazok!='zelezo' AND obrazok!='hlbudova'");
//echo("SELECT 1 FROM towns2_ WHERE xc=".vyberxcyc("1")." AND yc=".vyberxcyc("2")." AND vlastnik!='1' AND obrazok!='hlbudova'");
//echo($_POST["zadajxc"]);
if($tmp){
if(vojakvlozx() != ".1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)"){
if(0<vojakutok(vojakvlozx(), $xcyc )){

mysql_query("UPDATE towns2_uziv SET vojaci = '".(vojakminus($vojaci,vojakvlozx()))."' WHERE id = ".$_SESSION["id"]);
$pocet = hnet2("towns2_utok","SELECT MAX(id) maxId FROM towns2_utok WHERE ppp");
//-------------------------------------
//echo($xcyc);
//echo (vojakrychlost(vojakvlozx(),$xcyc));
mysql_query("INSERT INTO towns2_utok ( `id`, `cas` , `xc` , `yc`, `txc` , `tyc`, `tcas` , `od` , `vojak`,`vzdalenost` ) 
VALUES (
".(hnet("towns2_utok","SELECT MAX(id) FROM towns2_utok")+1).", ".((vojakrychlost(vojakvlozx(),$xcyc)+time()))." , '".vyberxcyc("1")."', '".vyberxcyc("2")."', '".$hlbudovaxc."', '".$hlbudovayc."', '".time()."', '".$_SESSION["id"]."' , '".(vojakvlozx())."','".$xcyc."'
);");
//-------------------------------------
dc("towns2_utok");
dc("towns2_uziv");
}else{
chyba1($GLOBALS["uutoky1"] . " " . (intval($xcyc*10)/10)/*intval(sqrt(pow(($xc-vyberxcyc("1")),2)+pow(($yc-vyberxcyc("2")),2)))*/. " " . $GLOBALS["uutoky1a"] . ".");
}
}else{
chyba1($GLOBALS["uutoky2"]);
}
}else{
chyba1($GLOBALS["uutoky3"]);
}
}else{
chyba1($GLOBALS["uutoky4"]);
}
}else{
chyba1($GLOBALS["uutoky5"]);
}
}
//-------------------------------------------------------------------------------
if($_MYGET["del"]){
$vojaci = hnet("towns2_utok","SELECT vojak FROM towns2_utok WHERE id=".$_MYGET["del"]." AND od=".$_SESSION["id"]);
$vojaci2 = hnet("towns2_uziv","SELECT vojaci FROM towns2_uziv WHERE id='".$_SESSION["id"]."' AND ppp");
mysql_query("UPDATE towns2_uziv SET vojaci = '".(vojakplus($vojaci,$vojaci2))."' WHERE id=".$_SESSION["id"]);
mysql_query("DELETE from towns2_utok WHERE id=".$_MYGET["del"]." AND od=".$_SESSION["id"]);
dc("towns2_uziv");
dc("towns2_utok");
}
//---------------------
$vojaci = hnet("towns2_uziv","SELECT vojaci FROM towns2_uziv WHERE id='".$_SESSION["id"]."' AND ppp");
?>
<h1><?php echo $GLOBALS["uutoky6"]; ?></h1>
<?php vojakzobraz($vojaci); ?>
<h1><?php echo $GLOBALS["uutoky7"]; ?></h1>
<?php

//$docastna_1="select id,cas,xc,yc,xc2,yc2,vojak from towns2_utok where ppp";
//$docastna_2="<tr><td width=\\\"551\\\">\"); vojakzobraz(\$row[\"vojak\"]); //echo (sqrt(pow((\$row[\"xc\"]-\$row[\"xc2\"]),2)+pow((\$row[\"yc\"]-\$row[\"yc2\"]),2))) ; //echo vojakutok(\$row[\"vojak\"], (sqrt(pow((\$row[\"xc\"]-\$row[\"xc2\"]),2)+pow((\$row[\"yc\"]-\$row[\"yc2\"]),2))) ); echo(\"<span id=\\\"pocitadlox\$pocet2\\\">\".(\$row[\"cas\"]).\"</span> na políčko \".(pxy(\$row[\"xc\"],\$row[\"yc\"])).\" (vlastník políčka: \".profilm(vlastnikxcyc(\$row[\"xc\"],\$row[\"yc\"])).\")<hr/></td>     <td width=\\\"69\\\"><a href=\\\"?del=\".\$row[\"id\"].\"\\\"><img src=\\\"casti/desing/no.bmp\\\" alt=\\\"x\\\" width=\\\"20\\\" height=\\\"20\\\" border=\\\"0\\\" /></a></td>   </tr>";
//$vojaci = new index("towns2_mes",$docastna_1,$docastna_2,"<table width=\"551\" border=\"0\">","</table>","Žádné útoky nejsou vyslané.","\$_SESSION["pocet2"] = \$_SESSION["pocet2"] + 1;","\$_SESSION["pocet2"] = 1;");
//$vojaci->show("0,999","1");

//$pocet = $_SESSION["pocet2"];

//echo"<script type=\"text/javascript\">";
//while ($pocet > 0){

//echo"
//theBigDayx$pocet = new Date();
//casx$pocet = Math.ceil((theBigDayx$pocet.getTime()/1000)-0.99999999999999999);
//casx$pocet = document.getElementById(\"pocitadlox$pocet\").innerHTML - casx$pocet;
//window.setInterval(\"casx$pocet=casx$pocet-1; if(casx$pocet < 1){ casx$pocet = '1'; } cas2x$pocet = casx$pocet; hodx$pocet = Math.ceil((cas2x$pocet/3600)-0.99999999999999999); cas2x$pocet=cas2x$pocet-(3600*hodx$pocet); minx$pocet = Math.ceil((cas2x$pocet/60)-0.99999999999999999); cas2x$pocet=cas2x$pocet-(60*minx$pocet); secx$pocet = cas2x$pocet; document.getElementById(\\\"pocitadlox$pocet\\\").innerHTML=hodx$pocet.toString()+\\\":\\\"+(minx$pocet).toString()+\\\":\\\"+(secx$pocet-1).toString(); \", 1000);
//";

//$pocet = $pocet - 1;
//}
//echo "</script>";



foreach(hnet2("towns2_utok","SELECT * FROM towns2_utok WHERE od=".$_SESSION["id"]." ORDER by cas","0,9999",$GLOBALS["uutoky8"]) as $row){
$tmp = hnet2("towns2","SELECT utokna,zivot,(SELECT " . $GLOBALS["name"] . " FROM towns2_uni WHERE towns2.obrazok=towns2_uni.obrazok) FROM towns2 WHERE xc = ".$row["xc"]." AND yc = ".$row["yc"]);
$tmp = $tmp[0];
$utokna = $tmp["utokna"];
$zivot = $tmp["zivot"];
$meno = $tmp[2];
$vzdalenost = $xcyc; // PREM
$vysledok = vojakboj($row["vojak"],$zivot,$utokna,$vzdalenost);
if(is_numeric($vysledok)){ $vysledok=$GLOBALS["uutoky9"]." ".intval($vysledok)." ".$GLOBALS["uutoky10"]." ".$zivot." ".$GLOBALS["uutoky11"]."."; }else{ $vysledok=$GLOBALS["uutoky12"]; }
vojakzobraz($row["vojak"]);
echo("<a href=\"".gv("?del=".$row["id"])."\"><img src=\"casti/desing/no.bmp\" border=\"1\"  width=\"15\" height=\"15\"/></a> ");
echo(pocitadlo($row["cas"]));
echo("<b>" . $GLOBALS["uutoky13"] . ": </b>".qpxyx($row["xc"],$row["yc"],$GLOBALS["uutoky14"].":")." <b>" . $GLOBALS["uutoky15"] . ": </b>".$meno." <b>" . $GLOBALS["uutoky16"] . ": </b>".(intval($row["vzdalenost"]*10)/10)." <br /> ".$vysledok);
}
?>
<form id="form1" name="form1" method="post" action="?del=0">
  <h1><?php echo $GLOBALS["uutoky17"]; ?></h1>
<input name="anov" type="hidden" value="a" checked="checked" />
  <?php echo $GLOBALS["uutoky18"]; ?>: <?php vojakvloz2(vojakvlozx()); ?><br />
  <?php echo $GLOBALS["uutoky19"]; ?>: <?php if($_GET["xc"]){ zadajxcyc($_GET["xc"],$_GET["yc"]); }else{ zadajxcyc(); } ?><br />
  <?php echo $GLOBALS["uutoky20"]; ?><br />
  <input type="submit" name="Submit" value="<?php echo $GLOBALS['uutoky21']; ?>" />
  <br />
</form>
<?php zobraztbl(1); ?>