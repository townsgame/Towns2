﻿<?php
$tmp = hnet("towns2_uziv","SELECT drevo FROM towns2_uziv WHERE id=".$_SESSION["ineid"]);
mysql_query2("UPDATE towns2_uziv SET drevo = drevo+".$tmp." WHERE id=".$_SESSION["uid"]);
mysql_query2("UPDATE towns2_uziv SET drevo = 0 WHERE id=".$_SESSION["ineid"]);
$_SESSION["zprava1"] = "Kořist ".$tmp." dřeva.";
$_SESSION["zprava2"] = $_SESSION["zprava1"];
?> 