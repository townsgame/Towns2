<?php
$root = "../";
require("../casti/funkcie/index.php"); 
require("../casti/funkcie/vojak.php");
//---------------------------------------------------
mysql_query(file_get_contents("sql.txt"));  
echo(mysql_error());
?>