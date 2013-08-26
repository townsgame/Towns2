<?php
$tmp = hnet("towns2_uziv","SELECT zelezo FROM towns2_uziv WHERE id=".$_SESSION["ineid"]);
mysql_query2("UPDATE towns2_uziv SET zelezo = zelezo+".$tmp." WHERE id=".$_SESSION["uid"]);
mysql_query2("UPDATE towns2_uziv SET zelezo = 0 WHERE id=".$_SESSION["ineid"]);
$_SESSION["zprava1"] = "Kořist ".$tmp." železa.";
$_SESSION["zprava2"] = $_SESSION["zprava1"];
?> 