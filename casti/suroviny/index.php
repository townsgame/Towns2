<?php
$surky=new index("towns2","SELECT COUNT( xc ) FROM towns2 WHERE ppp AND cas='1' AND obrazok = 'trziste'");
$surkyu = $surky->get("vlastnik = '".$_SESSION["id"]."'");
$typy=array(1,1,1,2,1,1,1);
if($surkyu[0] == 0){
$typy=array(1,2,2,2,1,1,1);
}
//chyba1(budova("banka"));
if(budova("banka") > 0){
$typy[3]=1;
}

/*if(budova("banka") == 0){
$typy[4]=2;	
}*/

submenu(array("Přehled","Poslat suroviny","Poslat suroviny alianci",/*"Tržiště",*/"Výměna<br/> surovin","Těžba surovin","Hry","Zadat kód"),array("casti/suroviny/viac.php","casti/suroviny/poslat.php","casti/suroviny/poslatali.php",/*"casti/suroviny/vymena.php",*/"casti/suroviny/banka.php","casti/suroviny/surowiny.php","casti/stah/index.php","casti/suroviny/kod.php"),$typy,array("","Pro tuto možnost musíte mít postavené tržiště.","Pro tuto možnost musíte mít postavené tržiště.","Pro tuto možnost musíte mít postavenou banku.","Pro tuto možnost musíte mít postavenou banku.","",""));
?>