<?php
$root = "";
$nocontroling = 1;
require("casti/funkcie/index.php");


$data="a1,b1;a2,b2;a3,b3;"

foreach(split(";",$data) as $row2){
$row = split(",",$row2);
echo($row[0]." : ".$row[1]);
}
echo("<br/>")
}


?>