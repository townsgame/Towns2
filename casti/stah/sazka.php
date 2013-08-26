<?php
$root = "../../";
require("../funkcie/index.php");
//---------------------------------------------------------- 
if(zsur("prachy",$_GET["sazka"])){

if(isok($_GET["sazka"])){
//----------------------------------------------------------
	$rnd = rand(1,4);
	if($rnd == 1){
	echo("".$_GET["sazka"]);
	}elseif($rnd == 2){
	echo("".$_GET["sazka"]/2);
	}elseif($rnd == 3){
	echo("".$_GET["sazka"]/-2);
	}elseif($rnd == 4){
	echo("".$_GET["sazka"]*-1);	
	}
//----------------------------------------------------------
  }else{
	echo("e1"/*Nemůžete vsadit víc než 10% peněz, co máte.*/);
  }
}else{
	echo("e2"/*Nedostatek peněz*/);
}
//http://2.towns.cz/casti/stah/sazka.php
?>