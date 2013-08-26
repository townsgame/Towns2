<?php 
require("casti/funkcie/index.php");

function dotaz($dotaz){
$_SESSION["a"] = mysql_query($dotaz);
return($_SESSION["a"]);
}

$odpoved = dotaz("SELECT 1");
while ($row = mysql_fetch_array($odpoved)) {
echo $row[0];
}
mysql_free_result($odpoved);
?>