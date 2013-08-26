<?php
$root = "";
//echo("sss");
//die("hra je pozastavena");
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php");

eval(file_get_contents("reg.txt"));

echo($xcreg." , ".$ycreg);
?>

