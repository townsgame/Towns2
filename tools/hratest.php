<?php
if($_GET["hra"]){ $_SESSION["hra"] = $_GET["hra"]; }
if($_SESSION["hra"]){
require("casti/stah/data/".$_SESSION["hra"].".php");
}else{
echo("<b>&amp;hra=</b>");
}
?>