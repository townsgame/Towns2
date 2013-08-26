<?php
$root = "../../";
$no_c = "1";
$no_ss = "1";
require("../../casti/funkcie/index.php");
require("../../casti/funkcie/vojak.php");

$mime_type = hnet("towns2_upload","SELECT mime_type FROM towns2_upload WHERE meno = '".$_GET["meno"]."' AND hrac = '".$_GET["hrac"]."'");
$heslo = hnet("towns2_upload","SELECT heslo FROM towns2_upload WHERE meno = '".$_GET["meno"]."' AND hrac = '".$_GET["hrac"]."'");
if(!$mime_type){ echo("neplatný soubor"); }else{

if(!$heslo or $_POST["heslo"] == $heslo){
header('Content-type: '.$mime_type);
$kde_soubor = "data/".$_GET["hrac"]."/".md5($_GET["meno"]).".dat";
//echo($mime_type);
if(file_exists($kde_soubor)){
readfile($kde_soubor);
}else{
echo("neplatný soubor");
}
}else{
echo("<b>heslo: </b><form action=\"\" method=\"POST\"><input type=\"password\" name=\"heslo\"/><input type=\"submit\" value=\"OK\"/></form>");	
}
}
//http://2.towns.cz/casti/upload/soubor.php?hrac=1&meno=trava.gif
?>
