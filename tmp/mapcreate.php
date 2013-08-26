<?php
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php"); 

$a = array("les","kamen","zelezo","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
$xx = 150;
$yy = 120;
$x = 150;
while ($x > 0){
$y = 150;
while ($y > 0){

if($x > $xx or $y > $yy){

$obrazok = $a[shuffle($a)];
$rand = rand(1,5);

mysql_query("INSERT INTO `towns` VALUE('$x', '$y', '$obrazok', NULL , '$rand', 'trava' , '1', '1', '0' , '' , '1', NULL , '1', '0')");
echo(mysql_error());

}



$y=$y-1;
}
$x=$x-1;
}


?>
