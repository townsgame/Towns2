<?php
require_once(__DIR__ . "/../../../" . "general.php");
require_once(__DIR__ . "/../../funkcie/index.php");

$tmp = premhnet("SELECT kamen FROM towns2_uziv WHERE id=".$_SESSION["ineid"]);
$tmp = $tmp[0]["kamen"];
mysql_query("UPDATE towns2_uziv SET kamen = kamen+".$tmp." WHERE id=".$_SESSION["uid"]);
mysql_query("UPDATE towns2_uziv SET kamen = 0 WHERE id=".$_SESSION["ineid"]);

$_SESSION["zprava1"] = $GLOBALS["poprey"] . " ".$tmp." " . $GLOBALS["skod6"]  . ".";
$_SESSION["zprava2"] = $_SESSION["zprava1"];
?> 