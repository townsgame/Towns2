<?php
if(!$_GET["fakt"]){
echo("$xopravduchcete22 $xot<br/><a href=\"?fakt=1&amp;xc=".$_GET["xc"]."&amp;yc=".$_GET["yc"]."\">$xyes</a> - <a href=\"?dir=casti/mapa/index.php\">$xno</a>");
}else{
echo $xbudovahapala;
echo "<a href=\"?dir=casti/mapa/index.php\">$xzpet</a>";
mysql_query("UPDATE `towns` SET obrazok = '0',zivot='0' WHERE vlastnik = '".$_SESSION["mestoid"]."' AND xc = '".$_GET["xc"]."' AND yc = '".$_GET["yc"]."'");
}
?>