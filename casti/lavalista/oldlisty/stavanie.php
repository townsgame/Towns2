<?php
if($_MYGET["zrusstavbuxc"]){
mysql_query("UPDATE towns2 SET obrazok = '0',cas='1', casovac=NULL WHERE vlastnik = ".$_SESSION["mestoid"]." AND xc = ".$_GET["zrusstavbuxc"]." AND yc = ".$_GET["zrusstavbuyc"]); 
dc("towns");
}
foreach(hnet2("townsuni","select * from towns JOIN townsuni ON towns.obrazok=townsuni.obrazok WHERE cas='2' AND vlastnik=".$_SESSION["id"]." ORDER by casovac","žádné budovy se vám nestaví") as $row){
echo "<a href=\"?zrusstavbuxc=".$row["xc"]."&amp;zrusstavbuyc=".$row["yc"]."\"><img src=\"casti/desing/no.bmp\" width=\"12\" height=\"12\" /></a><b>".$row["meno"]."</b>  ".(pxy($row["xc"],$row["yc"]))."<br />".pocitadlo($row["casovac"])."<br />";
}    
?>



<?php
if($_MYGET["zrusstavbuxc"]){
mysql_query("UPDATE towns2 SET obrazok = '0',cas='1' ,casovac=NULL WHERE vlastnik = ".$_SESSION["mestoid"]." AND xc = ".$_GET["zrusstavbuxc"]." AND yc = ".$_GET["zrusstavbuyc"]); 
dc("towns");
}

foreach(hnet2("townsuni","select * from towns JOIN townsuni ON towns.obrazok=townsuni.obrazok WHERE cas='2' AND vlastnik=".$_SESSION["id"]." ORDER by casovac","žádné budovy se vám nestaví") as $row){
//$odpoved =mysql_query("select * from towns JOIN townsuni ON towns.obrazok=townsuni.obrazok WHERE cas='2' AND vlastnik=".$_SESSION["mestoid"]." ORDER by casovac");  
//$pocet = mysql_num_rows($odpoved);
//if($pocet == 0){ echo("žádné budovy se vám nestaví"); }  
//$//pocet2 = 1;
//while ($row = mysql_fetch_array($odpoved)) {

echo "<a href=\"?zrusstavbuxc=".$row["xc"]."&amp;zrusstavbuyc=".$row["yc"]."\"><img src=\"casti/desing/no.bmp\" width=\"12\" height=\"12\" /></a><b>".$row["meno"]."</b>  ".(pxy($row["xc"],$row["yc"]))."<br />".pocitadlo($row["casovac"])."<br />";

//$pocet2 = $pocet2 + 1;
}    
/*echo"<script type=\"text/javascript\">";

while ($pocet > 0){

echo();
echo"
theBigDayx$pocet = new Date();
casx$pocet = Math.ceil((theBigDayx$pocet.getTime()/1000)-0.99999999999999999);
casx$pocet = document.getElementById(\"pocitadlox$pocet\").innerHTML - casx$pocet;
window.setInterval(\"casx$pocet=casx$pocet-1; if(casx$pocet < 1){ casx$pocet = '1'; } cas2x$pocet = casx$pocet; hodx$pocet = Math.ceil((cas2x$pocet/3600)-0.99999999999999999); cas2x$pocet=cas2x$pocet-(3600*hodx$pocet); minx$pocet = Math.ceil((cas2x$pocet/60)-0.99999999999999999); cas2x$pocet=cas2x$pocet-(60*minx$pocet); secx$pocet = cas2x$pocet; document.getElementById(\\\"pocitadlox$pocet\\\").innerHTML=hodx$pocet.toString()+\\\":\\\"+(minx$pocet).toString()+\\\":\\\"+(secx$pocet-1).toString(); \", 1000);
";

$pocet = $pocet - 1;
}*/
//mysql_free_result($odpoved);
//echo "</script>";
?>