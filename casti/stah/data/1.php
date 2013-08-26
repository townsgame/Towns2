<?php 
if($_POST["v1"] > 0){
if(zsur("prachy",$_POST["v1"])){
if($_POST["v2"] == "1" or $_POST["v2"] == "2" or $_POST["v2"] == "3"){

if(isok($_POST["v1"])){
	$rnd = rand(1,3);
	if($_POST["v2"] == $rnd){
  chyba2("Vyhrál jste ".$_POST["v1"]." peněz!");
	surovinanew($_SESSION["id"],"prachy","+",$_POST["v1"]);	
	}else{
  chyba2("Sázené číslo bylo ".$_POST["v2"]." a vylosované $rnd, je mi líto, ale prohrál jste.");
	surovinanew($_SESSION["id"],"prachy","-",$_POST["v1"]);
  }
  
  }else{
	chyba1("Nemůžete vsadit víc než 10% peněz, co máte.");
  }
 }else{
	chyba1("Musíte zadat číslo od 1 do 3");
 }
}else{
	chyba1("Nedostatek peněz");
}
}
?>
<form id="form3" name="form3" method="post" action="">
	
vsadit 
<input name="v1" type="text" id="v1" /> peněz
na číslo <input name="v2" type="text" id="v2" />

<input type="submit" name="Submit" value="OK" />



</form>
Varování: Peníze které prohrajete vám nebudu vracet zpět!!!