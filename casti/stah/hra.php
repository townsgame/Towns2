<?php
if($_MYGET["hra"]){ $_SESSION["hra"] = $_MYGET["hra"]; }
if($_SESSION["hra"]){
require("casti/stah/data/".$_SESSION["hra"].".php");
}
?>