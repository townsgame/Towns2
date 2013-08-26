<?php
if(!function_exists("hnet")){
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
}

if($_SESSION["id"]!=1){
die();
}


foreach(hnet2("towns2_help","SELECT meno FROM towns2_help") as $row){
echo();
}
?>