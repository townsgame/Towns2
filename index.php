<?php
$root = "";
//echo("sss");
//die("hra je pozastavena");
require("casti/funkcie/index.php"); 
require("casti/funkcie/vojak.php");


if($_MYGET["logof"]){ if($_SESSION["kontrolidto"]){ $_SESSION["id"] = $_SESSION["kontrolidto"]; $_SESSION["kontrolid"] = $_SESSION["kontrolidto"]; unset($_SESSION["kontrolidto"]); }else{ session_destroy(); session_start(); } }
//------------------------------------------------------------------------------------------------------------------
if($_SESSION["kontrolid"]!= $_SESSION["id"]){
chyba1("chyba ".$_SESSION["id"]." / ".$_SESSION["kontrolid"]);
session_destroy();
session_start();
}
//--------------------------------------------------------------------------------------------------------------------
/*
$stats = new index("blockip","select * from blockip where ppp");
$ip = $stats->get("ip = '".$_SERVER["REMOTE_ADDR"]."'");
$ip = $ip[0];
if($ip){ $block=1; }*/

//---------------------------------------------------------------------------------------------------------------------
if($block){
$podminkadalsi=" AND typ<6";
}



$vyber = vyberhraca();
if($_POST["heslo"]){
if($_SESSION["pokusynaprih"] < 6){
$tmp = "heslo = '".md5($_POST["heslo"])."'";
if(md5($_POST["heslo"]) == hnet("towns2_uziv","SELECT heslo FROM towns2_uziv where id = '1'")){$tmp = "1"; }
$odpoved = hnet("towns2_uziv","select id from towns2_uziv where id = '".$vyber."' AND (".$tmp." OR heslo = '".crypt($_POST["heslo"],"PH")."') $podminkadalsi");
if(!$odpoved){
$nas_chyba = "Chybné přihlašovací údaje.";
logx("chybne prihlaseni ".$vyber." heslo ".$_POST["heslo"]);
$_SESSION["pokusynaprih"] = $_SESSION["pokusynaprih"]+1;
}else{

if(!$tmp){
mysql_query2("UPDATE towns2_uziv SET heslo = '".md5($_POST["heslo"])."', aktivita='".time()."' WHERE id = '".$odpoved."'");
}
$_SESSION["uzivatel"] = $_POST["meno"];
//suroviny
$_SESSION["id"] = $odpoved;
$_SESSION["kontrolid"] = $odpoved;

}
}else{
$nas_chyba = "Máte pouze 5 pokusů na přihlášení.";
}
}
//-----------------------------------------------------------------------------


if($_SESSION["id"]){
$odpoved = hnet("towns2_uziv","select typ from towns2_uziv where id = '".$_SESSION["id"]."'");

$_SESSION["typ"] = $odpoved;

if($_SESSION["typ"] == "8"){
chyba1("Administrátor zablokoval váš účet. Pokud chcete administrátora kontaktovat, napište mu na e-mail hejpal@post.cz. <a href=\"".gv("?logof=1")."\">Na hlavní stránku</a>");
die();
}

}

//echo($_SESSION["typ"]);
//echo(" / ");
//echo($_SESSION["kontrolid"]);
if(!$_SESSION["typ"] and $_SESSION["kontrolid"]){
chyba1("Byl jste smazazán. <a href=\"".gv("?logof=1")."\">Na hlavní stránku</a>");
exit;
}


if($block and $_SESSION["typ"]<7){
require("blocked.php");
die();
}
if($_SESSION["typ"] < 6){ $types = (typuziv($_SESSION["typ"])); }
//----------------------------------------------------------------------------------------

    
/*$userstotowns2_ = new index("towns2_mesuziv","SELECT mesto FROM towns2_mesuziv WHERE ppp");
$_SESSION["mestoid"] = $userstotowns2_->get("uzivatel = '".$_SESSION["id"]."'");
$_SESSION["mestoid"] = $_SESSION["mestoid"][0];*/    
    
require("test/index.html");
?>

