<?php
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
//---------------------------------------------------
if($_GET["xc"]){
mysql_query2("UPDATE towns2 SET obrazok = 'ppp' WHERE xc>".$_GET["xc"]."-1 AND xc<".$_GET["xc"]."+1+5 AND yc>".$_GET["yc"]."-1 AND yc<".$_GET["yc"]."+1+5 ");
mysql_query2("UPDATE towns2 SET obrazok = 'sopka', rand='".$_GET["typ"]."' WHERE xc='".$_GET["xc"]."' AND yc='".$_GET["yc"]."' ");
dcmapa($_GET["xc"],$_GET["yc"]);
dc("towns2");
}else{
echo("xc,yc,typ");
}
?>