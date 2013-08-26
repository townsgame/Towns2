<?php
$tz = substr(str_shuffle("rtpsdfghjklzcvbnm"),1,rand(3,17));
$ta = substr(str_shuffle("eyuioa"),2,6);

for ($x = 1; $x <= rand(50,1000); $x++){

for ($i = 1; $i <= rand(1,6); $i++) {	
//----
echo substr(str_shuffle($tz),1,1);
echo substr(str_shuffle($ta),1,1);
//----
}
echo(" ");


}

?>