<?php
$root = "../../";
require("index.php");
$x = 1;
$y = 1;
while ($x <= 16){
while ($y <= 16){
dcmapa($x,$y);
$y++;
}
$x++;
}
?>