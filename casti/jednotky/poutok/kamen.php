<?php
$tmp = hnet("towns2_uziv","SELECT kamen FROM towns2_uziv WHERE id=".$_SESSION["ineid"]);
mysql_query2("UPDATE towns2_uziv SET kamen = kamen+".$tmp." WHERE id=".$_SESSION["uid"]);
mysql_query2("UPDATE towns2_uziv SET kamen = 0 WHERE id=".$_SESSION["ineid"]);
$_SESSION["zprava1"] = "Kořist ".$tmp." kamene.";
$_SESSION["zprava2"] = $_SESSION["zprava1"];
?> 