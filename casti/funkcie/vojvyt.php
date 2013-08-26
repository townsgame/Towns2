<?php
$root = "../";
require("../casti/funkcie/index.php");
require("../casti/funkcie/vojak.php");  
ini_set("max_execution_time",10000);

foreach(hnet2("towns2_uziv","SELECT id,vojaci,vojacit FROM towns2_uziv WHERE vojacit != '.1(v0,s0,k0,r0,j0,t0,z0,b0,a0,e0,n0,d0,m0)' and vojacit") as $row){
//echo(zobrazsur($row["prachy"],$row["jedlo"],$row["kamen"],$row["zelezo"],$row["drevo"]));


echo(vojakcena($row["vojacit"]));
echo("<br/>");
}
$nexttime = (intval((time()+3600)/3600)*3600);
//od  kam  cas  prachy  jedlo  kamen  zelezo  drevo  protect  
?>