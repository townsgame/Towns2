<?php
$root = "../../";
$no_c = "1";
$no_ss = "1";
require("../../casti/funkcie/index.php");
require("../../casti/funkcie/vojak.php");

$meno = $_MYGET["meno"];
$text = hnet("towns2_help","SELECT text FROM towns2_help WHERE meno='".$meno."'");
if($text){
$text = convert($text,1);
echo("<h2>".$meno."</h2><hr/>");
echo($text);	
}
?>