<?php

// require_once(__DIR__ . "/../../" . "general.php");

$_SESSION["uzjeod"]=1;
if($_POST["jmeno"]){
$_SESSION["uzjeod"]=0;
function vysledok($text){
$_SESSION["uzjeod"]=$_SESSION["uzjeod"]+1;
echo("<b/><span style=\"font-size: 15px;\">".$text."<span><b><br />");
}
foreach(str_split($_POST["jmeno"]) as $char){
$ano=0;
if($char == "1"){ $ano=1; }
elseif($char == "2"){ $ano=1; }
elseif($char == "3"){ $ano=1; }
elseif($char == "4"){ $ano=1; }
elseif($char == "5"){ $ano=1; }
elseif($char == "6"){ $ano=1; }
elseif($char == "7"){ $ano=1; }
elseif($char == "8"){ $ano=1; }
elseif($char == "9"){ $ano=1; }
elseif($char == "0"){ $ano=1; }
elseif($char == "+"){ $ano=1; }
elseif($char == "-"){ $ano=1; }
elseif($char == "*"){ $ano=1; }
elseif($char == "/"){ $ano=1; }
elseif($char == "("){ $ano=1; }
elseif($char == ")"){ $ano=1; }
$anoc=$anoc+$ano;
}
if($anoc == strlen($_POST["jmeno"]) and !is_numeric($_POST["jmeno"])){ vysledok($_POST["jmeno"]." = <span id=\"spocitaj\"></span><script> eval('document.getElementById(\"spocitaj\").innerHTML=('+(".$_POST["jmeno"].")+');'); </script>"); }
if(is_numeric($_POST["jmeno"])){ 
$hrac = hnet("towns2_uziv","SELECT meno FROM towns2_uziv WHERE id='".$_POST["jmeno"]."'");	
if($hrac){ vysledok($GLOBALS["find1"] . " ".$_POST["jmeno"].": ".profil($_POST["jmeno"])); }	

$hrac = hnet("towns2_uziv","SELECT id FROM towns2_uziv WHERE poradie='".$_POST["jmeno"]."'");	
if($hrac){ vysledok($GLOBALS["find2"] . " ".$_POST["jmeno"].": ".profil($hrac)); }	

}//else{

foreach(hnet2("towns2_uziv","SELECT id FROM towns2_uziv WHERE meno LIKE '%".$_POST["jmeno"]."%'") as $row){	
vysledok($GLOBALS["find3"] . ": ".profil($row["id"]));
}

foreach(hnet2("towns2_ali","SELECT id FROM towns2_ali WHERE meno LIKE '%".$_POST["jmeno"]."%'") as $row){	
vysledok($GLOBALS["find4"] . ": ".profila($row["id"]));
}

foreach(hnet2("towns2_ali","SELECT id,tema FROM towns2_tem WHERE tema LIKE '%".$_POST["jmeno"]."%'") as $row){	
vysledok($GLOBALS["find5"] . ": <a href=\"".gv("?dir=casti/diskuse/prispevky.php&amp;tema=".$row["id"])."\">".$row["tema"]."</a>");
}

//strpos
$mapa = $_POST["jmeno"];
$z  = array(")","("," ","-",".");
$do = array("","",",","","");
$mapa = str_replace($z,$do,$mapa);
//echo($mapa);
$mapa = split("[,;]",$mapa);
if(is_numeric($mapa[0]) and is_numeric($mapa[1])){ vysledok($GLOBALS["find6"] . ": ".qpxyx($mapa[0],$mapa[1],$GLOBALS["uutoky14"] . ":")); }
	
//}
//if($hrac){ vysledok("téma se jménem : <a href=\"".gv("?dir=casti/diskuse/prispevky.php&amp;tema=".$hrac)."\">".$_POST["jmeno"]."</a>"); }

//}
//echo($vysledok);
}else{
echo("<b/><span style=\"font-size: 15px;\">" . $GLOBALS["find7"] . "<span><b>");	
}

if(!$_SESSION["uzjeod"]){ echo("<b/><span style=\"font-size: 15px;\">" . $GLOBALS["find7"] . "<span><b>"); }
?>