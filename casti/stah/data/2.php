<?php 
if($_POST["kolik"] > 0){
if(zsur("prachy",$_POST["kolik"])){
if(is_numeric($_POST["kolik"])){
if(isok($_POST["kolik"])){

$rnd = rand((-$_POST["kolik"]),$_POST["kolik"]);
	

	if($rnd > 0){
  chyba2("Vyhrál jste ".$rnd." peněz!");
	}elseif($rnd == 0){
  chyba2("Bylo vylosováno číslo 0.");
	}else{
  chyba1("Prohrál jste ".(-$rnd)." peněz!");
  }
  surovinanew($_SESSION["id"],"prachy","+",$rnd);
  
  }else{
	chyba1("Nemůžete vsadit víc než 10% peněz, co máte.");
  }
 }else{
	chyba1("Musíte zadat číslo.");
 }
}else{
	chyba1("Nedostatek peněz");
}
}
?>
<form id="form3" name="form3" method="post" action="">
Kolik?:
<input name="kolik" type="text" id="kolik" />
<input type="submit" name="Submit" value="OK" />
</form>
Varování: Peníze které prohrajete vám nebudu vracet zpět!!!